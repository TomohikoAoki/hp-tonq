<?php
//ini_set("display_errors", 1);
//error_reporting(E_ALL);
header('Access-Control-Allow-Origin: http://localhost:3000/');
header('Access-Control-Allow-Methods: GET,POST');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Credentials: true');
header('Content-Type: application/json');

//直接このファイルにアクセスは禁止
$currentPage = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

if (strcmp(basename($currentPage), basename(__FILE__)) == 0) {
    exit;
} else {
    session_start();
}


$csrfCookieName = 'X-XSRF-TOKEN';
$varified = !empty($_SESSION['csrfToken']) &&
    !empty($_COOKIE[$csrfCookieName]) &&
    ($_SESSION['csrfToken'] === $_COOKIE[$csrfCookieName]);

    
//SESSIONのトークンとcookieのトークンが存在して合っていなければ
if (!$varified) {
    session_regenerate_id(true);
    $csrfToken = rtrim(base64_encode(openssl_random_pseudo_bytes(32)), '=');
    setcookie($csrfCookieName, $csrfToken);
    $_SESSION['csrfToken'] = $csrfToken;

    exit;
}

//SESSIONのトークンとcookieのトークンが存在して合っていれば
//メーラー本体呼び出し

require '../script/sendmail/mailer.php';




