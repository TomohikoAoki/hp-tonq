<?php
// HPMailer のクラスをグローバル名前空間（global namespace）にインポート
// スクリプトの先頭で宣言する必要があります

use Customization\PostEdit;
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Valitron\Validator;

// Composer のオートローダーの読み込み
require(dirname(__FILE__) . '/../vendor/autoload.php');
//エラーメッセージ用日本語言語ファイルを読み込む場合（25行目の指定も必要）
require(dirname(__FILE__) . '/../vendor/phpmailer/phpmailer/language/phpmailer.lang-ja.php');

//言語、内部エンコーディングを指定
mb_language("japanese");
mb_internal_encoding("UTF-8");
date_default_timezone_set('Asia/Tokyo');

//.envを取得
$dotenv = Dotenv\Dotenv::createImmutable((__DIR__ . '/..'));
$dotenv->load();

//POSTされたデータ取得　連想配列で
$postBody = json_decode(file_get_contents('php://input'), true);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    //バリデーションして整えて確認画面表示用データを返す
    if ($postBody['mode'] === 'confirm') {

        //サーバーサイドのバリデーション
        Validator::lang('ja');

        $validator = new Validator($postBody);

        $validator->labels([
            'lastName' => '氏名',
            'firstName' => '名前',
            'email' => 'メールアドレス',
            'emailConfirmed' => '確認用メールアドレス',
            'zipCode' => '郵便番号',
            'phoneNumber' => '電話番号',
            'shop' => '店舗',
            'content' => 'お問い合わせ内容'
        ]);

        $validator->rule('required', ['lastName', 'firstName', 'email', 'emailConfirmed', 'zipCode', 'shop', 'content'])->message('{field}は必須項目です。');
        $validator->rule('lengthMax', ['lastName', 'firstName'], 10)->message('入力可能な文字数は10字までです。');
        $validator->rule('email', 'email')->message('正しいメール形式で入力してください。');
        $validator->rule('equals', 'email', 'emailConfirmed')->message('メールアドレスと確認用メールアドレスが違います。');
        $validator->rule('regex', 'phoneNumber', '/^0[0-9]{9,10}$/')->message('ハイフンを入れず数字９桁or10桁の半角数字で市外局番から入力してください。');
        $validator->rule('regex', 'zipCode', '/^[0-9]{7}$/')->message('ハイフンを入れず数字7桁の半角数字で入力してください。');

        //バリデーション通ったら
        if ($validator->validate()) {
            //SESSION変数に格納
            //formDataを見やすい用整形
            //名前結合＆新規作成
            $postBody['name'] = $postBody['lastName'] . ' ' . $postBody['firstName'];
            //住所結合＆新規作成
            $postBody['address'] = $postBody['addI'] . $postBody['addII'];
            //不要になった要素削除
            unset($postBody['emailConfirmed']);
            unset($postBody['mode']);
            unset($postBody['lastName']);
            unset($postBody['firstName']);
            unset($postBody['addI']);
            unset($postBody['addII']);
            //元の順番にソート
            $sorter = ['name', 'email', 'phoneNumber', 'gender', 'zipCode', 'address', 'shop', 'content'];
            uksort($postBody, function ($x, $y) use ($sorter) {
                $k = array_flip($sorter);
                return $k[$x] > $k[$y];
            });
            //SESSIONに登録
            $_SESSION['formdata'] = json_encode($postBody, JSON_UNESCAPED_UNICODE);
            //SESSIONデータを返却
            echo  $_SESSION['formdata'];

            exit;
        }
        //バリデーション通らなかったら
        //エラーメッセージを返却

        http_response_code(422);
        echo json_encode($validator->errors());

        exit;
    }
    //格納されたSESSION変数を使ってメールを送る
    if ($postBody['mode'] === 'send' && isset($_SESSION['formdata'])) {
        require(dirname(__FILE__) . '/PostEdit.php');

        $mailBody = new PostEdit(json_decode($_SESSION['formdata'], true));

        // インスタンスを生成（引数に true を指定して例外 Exception を有効に）
        $mail = new PHPMailer(true);

        //日本語用設定
        $mail->CharSet = "UTF-8";
        $mail->Encoding = "base64";

        try {
            //サーバの設定
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;  // デバグの出力を有効に（テスト環境での検証用）
            $mail->isSMTP();   // SMTP を使用
            $mail->Host       = $_ENV["MAIL_HOST"];  // SMTP サーバーを指定
            $mail->SMTPAuth   = true;   // SMTP authentication を有効に
            $mail->Username   = $_ENV["MAIL_USERNAME"];  // SMTP ユーザ名
            $mail->Password   = $_ENV["MAIL_PASSWORD"];  // SMTP パスワード
            $mail->SMTPSecure = false;  // 暗号化を有効に
            $mail->Port       = 587;  // TCP ポートを指定

            //※名前などに日本語を使う場合は文字エンコーディングを変換
            //差出人アドレス, 差出人名
            $mail->setFrom('honbu@ton-q.com', 'とんきゅう株式会社 本部');
            $mail->addAddress('aoki@ton-q.com', '青木智彦');
            $mail->Subject = mb_encode_mimeheader('メールフォームからお問い合わせがありました。', 'ISO-2022-JP');
            $mail->isHTML(false);
            $mail->Body = $mailBody->getMailBody('send');

            //メッセージ送信
            if (!$mail->send()) {
                //エラーの場合セッション・クッキーformData削除
                unset($_SESSION['formdata']);
                if (isset($_COOKIE['PHPSESSID'])) {
                    setcookie('PHPSESSID', '', time() - 1000, '/');
                }
                http_response_code(500);
                echo '申し訳ありませんが、サーバーエラーで送信できませんでした。 後でもう一度お試しください。';

                exit;
            } else {
                $mail->clearAddresses();

                //お客様宛ての控えメール
                $mail->addAddress($mailBody->getMailAddress(), $mailBody->getSenderName());
                //メールサブジェクト
                $mail->Subject = mb_encode_mimeheader('お問い合わせありがとうございました。', 'ISO-2022-JP');
                //メッセージ本文
                $mail->Body = $mailBody->getMailBody('reserve');

                //メッセージ送信
                if (!$mail->send()) {
                    //エラーの場合セッション・クッキーformData削除
                    unset($_SESSION['formdata']);
                    if (isset($_COOKIE['PHPSESSID'])) {
                        setcookie('PHPSESSID', '', time() - 1000, '/');
                    }
                    http_response_code(500);
                    echo '申し訳ありませんが、サーバーエラーで送信できませんでした。 後でもう一度お試しください。';

                    exit;
                } else {
                    unset($_SESSION['formdata']);
                    if (isset($_COOKIE['PHPSESSID'])) {
                        setcookie('PHPSESSID', '', time() - 1000, '/');
                    }
                    http_response_code(200);
                    echo '<div class="v-html-create">
                メッセージが送信されました！ <br>
                お問い合わせいただきありがとうございます。<br>
                <br>
                お問い合わせいただいた内容を確認し、<br>
                数日中に担当者からご連絡させていただきます。<br>
                <br>
                1週間ほど経っても連絡がない場合は、<br>
                お手数ではございますが、<br>
                【honbu@ton-kyu.com】宛にご連絡いただくか、<br>
                お電話にて【0120-917-163】宛に<br>
                お問い合せください。
                </div>';

                    exit;
                }
            }
        } catch (Exception $e) {
            //エラー（例外：Exception）が発生した場合
            $_SESSION = array();
            http_response_code(500);
            echo '申し訳ありませんが、サーバーエラーで送信できませんでした。 後でもう一度お試しください。';
        }
    } else {
        http_response_code(500);
        echo '送信するデータが存在しません。フォームより再度お試しください。';
        exit;
    }
}

if (isset($_SESSION['formdata'])) {
    unset($_SESSION['formdata']);
}
echo 'cookieのtokenは通ってpostでないのでSESSIONのformDataは削除';
exit;









// 改行を消す(メールヘッダ・インジェクション対策);
function rm($str)
{
    if (isset($str)) {
        str_replace(array("\r\n", "\r", "\n"), '', $str);
    }
    return $str;
}
// エスケープ処理
function esc($value, $enc = 'UTF-8')
{
    if (is_array($value)) {
        return array_map('escape', $value);
    }
    return htmlspecialchars($value, ENT_QUOTES, $enc);
}
