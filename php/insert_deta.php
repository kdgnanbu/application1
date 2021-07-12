<!DOCTYPE html>
  <html>
      <head>
      </head>
      <body>
<?php
    require_once "../php/require.php";
    //ポストされた値をセッション化する
    $month = $_POST["month"];
    $day = $_POST["day"];
    $payment_cd = $_POST["payment_cd"];
    $price = $_POST["price"];
    $count = $row['count'];
    $_SESSION['month'] = $month;
    $_SESSION['price'] = $price;
    $_SESSION['payment_cd'] = $payment_cd;
    $_SESSION['count'] = $count;
    //カウントの抽出と加算
    $pdo = new PDO('mysql:host=localhost;dbname=nanbu;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_EMULATE_PREPARES => false,PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
    $sql = 'SELECT * FROM details_s';
    $query = "SELECT COUNT( * ) FROM details_s WHERE member_id = $member_id and month = $month and day = $day";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    //抽出された値の格納
    $A_count = $row['COUNT( * )'];
    $count = $A_count;
    //加算処理
    $count = ++$count;
    //金額が100万以上の時はエラーを出す
    if($price > 999999){
        echo "<br />100万円以上の金額を一度に登録できません。";
        require"../php/input.php";
        return false;
    }
    //金額が正しく入力されなかった時の処理
    if($price > 0){
        if(isset($_SESSION['member_id'])){
            $member_id = $_SESSION['member_id'];
            $price = floor($price);
        }else {
            echo "エラーがありました";
        }
    }else {
    echo "<br />金額が設定されていません。正しく入力してください。";
    require_once "../php/input.php";
    return false;
    }
    //インサート文の発行
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    // 例外がスローされる設定にする
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // SQL文を作る
    $sql = "INSERT INTO details_s (member_id, month, day, count, payment_cd, price) VALUES (:member_id, :month, :day, :count, :payment_cd, :price)";
    $stm = $pdo->prepare($sql);
    //payment_cdが0の時、登録する符号を反転させる
    if($payment_cd == 0){
        $var = -$price;
        $price = $var;
    }
    // プレースホルダに値をバインドする
    $stm->bindValue(':member_id', $member_id, PDO::PARAM_INT);
    $stm->bindValue(':month', $month, PDO::PARAM_INT);
    $stm->bindValue(':day', $day, PDO::PARAM_INT);
    $stm->bindValue(':count', $count, PDO::PARAM_INT);
    $stm->bindValue(':payment_cd', $payment_cd, PDO::PARAM_INT);
    $stm->bindValue(':price', $price, PDO::PARAM_INT);
    //レコードに追加できた場合は、次の画面へ移動
    if ($stm->execute()){
        require "../php/output.php";
    } else {
        echo '<span class="error">追加エラーがありました。</span><br>';
    };
?>
     </body>
  </html>
