<?php

namespace Customization;

class PostEdit
{

	private $referer = "";
	private $addr = "";
	private $host = "";
	private $agent = "";
	private $javascript_comment = "";
	private $now_url = "";
	private $before_url = "";
	private $replay_mail_address = "";
	private $mail_body = "";
	private $senderName = "";

	private $keyLabels = [
		'name' => '名前',
		'email' => 'メールアドレス',
		'gender' => '性別',
		'address' => '住所',
		'zipCode' => '郵便番号',
		'phoneNumber' => '電話番号',
		'shop' => '店舗',
		'content' => 'お問い合わせ内容'
	];

	public function __construct($json)
	{
		$this->post_check('');
		$this->setMailInfo($json);
		$this->createMailBody($json);
	}


	private function post_check($mode)
	{

		if (isset($_SERVER['HTTP_REFERER'])) {
			$this->referer = $this->sanitize_post($_SERVER['HTTP_REFERER'], $mode);
		}


		if (isset($_SERVER['REMOTE_ADDR'])) {
			$this->addr = $this->sanitize_post($_SERVER['REMOTE_ADDR'], $mode);
		}


		if (isset($_SERVER['REMOTE_HOST'])) {
			$this->host = $this->sanitize_post($_SERVER['REMOTE_HOST'], $mode);
		} else {
			$this->host = $this->sanitize_post(gethostbyaddr($_SERVER['REMOTE_ADDR']), $mode);
		}


		if (isset($_SERVER['HTTP_USER_AGENT'])) {
			$this->agent = $this->sanitize_post($_SERVER['HTTP_USER_AGENT'], $mode);
		}


		if (isset($_POST['javascript_action']) && $_POST['javascript_action'] === 'true') {
			$this->javascript_comment = '送信前の入力チェックは正常に動作しました。';
		}


		if (isset($_POST['now_url']) && $_POST['now_url'] !== '') {
			$this->now_url = $this->sanitize_post($_POST['now_url'], $mode);
			$this->now_url = mb_convert_kana($this->now_url, 'as');
		}


		if (isset($_POST['before_url']) && $_POST['before_url'] !== '') {
			$this->before_url = $this->sanitize_post($_POST['before_url'], $mode);
			$this->before_url = mb_convert_kana($this->before_url, 'as');
		}
	}

	//フォームからの送信者情報セット
	private function setMailInfo($json)
	{
		foreach ($json as $key => $value) {
			if ($key === 'email') {
				$address = $this->sanitize_post($value, 'confirm');
				$address = mb_convert_kana($address);

				$this->replay_mail_address = $address;
			}
			if ($key === 'name') {

				$this->senderName = $value;
			}
		}
	}

	//フォームからの情報をメール本文にセット/作成
	private function createMailBody($json)
	{
		$set_body = PHP_EOL;

		foreach ($json as $key => $value) {
			if ($value !== "") {
				$set_body .= PHP_EOL;
				$set_body .= '【' . $this->keyLabels[$key] . '】' . PHP_EOL;
				$set_body .= $this->sanitize_post($value, 'confirm');
				$set_body .= PHP_EOL;
			}
		}

		$this->mail_body = $set_body;
	}


	//メール本文出力　$mode=reserve:返信用 $mode=send:送信用 
	public function getMailBody($mode)
	{
		$set_body = PHP_EOL;
		//お客様控え用メール
		if ($mode === "reserve") {
			$set_body .= <<<EOT

この度はお問い合わせをいただき、ありがとうございました。
折り返し担当者から返信が行きますので、しばらくお待ちください。
以下の内容でお問い合わせをお受けいたしました。
EOT;

           $set_body .= $this->mail_body;
		   $set_body .= <<<EOT
		   
		 
この度はお問い合わせを頂き、重ねてお礼申し上げます。
-----------------------------------------------------------------------------------

	とんきゅう株式会社
	〒305-0045 茨城県つくば市梅園2-17-4
	TEL : 029-852-1085
	Web Site URL : http://ton-q.com/
		   
 -----------------------------------------------------------------------------------
		   
				   
EOT;
		}
		
		//送信メール
		if ($mode === 'send') {
			$set_body .= <<<EOT

メールフォームからお問い合わせがありました。
お問い合わせの内容は以下の通りです。

EOT;
            
            $set_body .= $this->mail_body;
			$set_body .= $this->getSenderInfo();
		}

		return $set_body;
	}

	//返信用メールアドレス（お客様宛）
	public function getMailAddress()
	{
		return $this->replay_mail_address;
	}

	//返信用メールお名前（お客様宛）
	public function getSenderName()
	{
		return $this->senderName;
	}

	// 送信者情報作成
	private function getSenderInfo()
	{

		$send_date = date('Y年m月d日　H時i分s秒');

		$set_body  = PHP_EOL;
		$set_body .= '-----------------------------------------------------------------------------------' . PHP_EOL;
		$set_body .= PHP_EOL;
		$set_body .= '【送信時刻】' . PHP_EOL;
		$set_body .= $send_date;



		$set_body .= PHP_EOL;
		$set_body .= PHP_EOL;
		$set_body .= '-----------------------------------------------------------------------------------' . PHP_EOL;
		$set_body .= PHP_EOL;
		$set_body .= '【送信者のIPアドレス】' . PHP_EOL;
		$set_body .= $this->addr . '' . PHP_EOL;
		$set_body .= PHP_EOL;
		$set_body .= '【送信者のホスト名】' . PHP_EOL;
		$set_body .= $this->host . '' . PHP_EOL;
		$set_body .= PHP_EOL;
		$set_body .= '【送信者のブラウザ】' . PHP_EOL;
		$set_body .= $this->agent . '' . PHP_EOL;
		$set_body .= PHP_EOL;
		$set_body .= '【送信前の入力チェック】' . PHP_EOL;
		$set_body .= $this->javascript_comment . '' . PHP_EOL;
		$set_body .= PHP_EOL;
		$set_body .= '【メールフォームのURL】' . PHP_EOL;
		$set_body .= $this->now_url . '' . PHP_EOL;
		$set_body .= PHP_EOL;
		$set_body .= '【メールフォームのページの直前に見たURL】' . PHP_EOL;
		$set_body .= $this->before_url . '' . PHP_EOL;
		$set_body .= PHP_EOL;

		return $set_body;
	}

	// テキスト消毒
	public function sanitize_post($p, $mode)
	{

		if ($mode === 'confirm') {
			$p = htmlspecialchars($p, ENT_QUOTES, 'UTF-8');
			str_replace(array("\r\n", "\r", "\n"), '', $p);
		}

		return $p;
	}
}
