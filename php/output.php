<?php
  require_once "../php/require.php";
//セッションした値を取り出し変数化
if(isset($_SESSION['member_id'])){
    $member_id = $_SESSION['member_id'];
}else {
    echo "エラーがありました";
}
if(isset($_SESSION['month'])){
    $month = $_SESSION['month'];
}else {
    echo "エラーがありました";
}
if(isset($_SESSION['price'])){
    $price = $_SESSION['price'];
}else {
    echo "エラーがありました";
}
if(isset($_SESSION['payment_cd'])){
    $payment_cd = $_SESSION['payment_cd'];
}else {
    echo "エラーがありました";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>出力画面</title>
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="../css/bace.css">
    <link rel="stylesheet" href="../css/output.css">
</head>
<body>
    <div class="title">出力ページ</div>
    <div class="box">
<?php
    session_start();
    //入力された月を表示する
    if($_POST){
        $month=$_POST['month'];
        echo $month,"月の合計";
    }else if(isset($_SESSION['month'])){
        echo $month,"月の合計";
    }else {
        echo "エラーがありました";
    }
?>
    </div>
    <div class="box1">
        <div class="text">
<?php
    //入力されたIDの指定月を抽出する
    $pdo = new PDO('mysql:host=localhost;dbname=nanbu;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_EMULATE_PREPARES => false,PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
    $sql = 'SELECT * FROM details_s';
    $query = "SELECT SUM(price) FROM details_s WHERE member_id = $member_id AND month = $month";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    //月ごとの合計値
    $A_sum = $row['SUM(price)'];
    $_SESSION['A_sum'] = $A_sum;
    if($A_sum == 0){
        echo "0円";
    }else {
        $A_sum = number_format($A_sum);
        echo $A_sum,"円";
    };
?>
</div>
    </div>
    <div class="menu">
        <a class="button" href="../php/choice.php">選択画面へ戻る</a>
    </div>
</body>
</html>
