<?php
session_start();
require_once('config.php');
//emailがデータベース内に存在している確認　
$pdo = new PDO(DSN, DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $pdo->prepare('select * from member_m where email = ?');
$stmt->execute([$_POST['email']]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
//emailがDB内に存在しているか確認
if (!isset($row['email'])) {
  echo 'メールアドレスが間違っているかアカウントが存在しません。もう一度確認の上、入力してください。';
  require "../php/signUp.php";
  return false;
}
//メールアドレスとパスワードが一致するIDを見つけ見つけた場合そのIDをセッションし、次の画面に渡す
else {
    if($_POST){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql = 'SELECT member_id FROM member_m';
    $sql .= 'WHERE email="'.$email.'" AND password = "'.$password .'"';
    $member_id = $row['member_id'];
    if($member_id > 0){
        if($row['email'] == $email && $row['password'] == $password){
              $_SESSION['member_id'] = $member_id;
        }else{
            echo "入力された値が一致しませんでした";
            require "../php/signUp.php";
            return false;
        }
    }else{
       echo"エラーがありました";
    }
}
    if($_SESSION["member_id"] > 0) {
    //セッション成功したら選択画面へ
     require"../php/choice.php";
    }else{
        echo 'エラーがありました';
    }
}
?>
