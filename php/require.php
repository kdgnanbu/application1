  <?php
session_start();
  $user = 'root';
  $password = 'root';
  // 利用するデータベース
  $dbName = 'nanbu';
  // MySQLサーバ
  $host = 'localhost';
  // MySQLのDSN文字列
  $dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";

    if(isset($_SESSION['member_id'])){
        $member_id = $_SESSION['member_id'];
        echo "あなたのIDは" ,$member_id;
    }else {
        echo "エラーがありました";
    }
?>
