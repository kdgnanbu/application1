<?php
  require_once('config.php');
  $pdo = new PDO(DSN, DB_USER, DB_PASS);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//正しいメールアドレスでなければエラーを出す
if (!$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  echo '入力された値が不正です。';
  require "../php/new.php";
  return false;
}
//パスワードが八文字以上かつ半角英数字を一文字以上含んでいない場合エラーを出す
if (preg_match('/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,100}+\z/i', $_POST['password'])) {
  $password = $_POST['password'];
} else {
  echo 'パスワードは半角英数字をそれぞれ1文字以上含んだ8文字以上で設定してください。';
  require "../php/new.php";
  return false;
}
//登録処理
try {
  $stmt = $pdo->prepare("insert into member_m(email, password) value(?, ?)");
  $stmt->execute([$email, $password]);
  require "../php/completion.php";
} catch (\Exception $e) {
  echo '登録済みのメールアドレスです。ログインしてください。';
    require "../php/signUp.php";
}
