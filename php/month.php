<?php
 require_once "../php/require.php";
try {
  $pdo = new PDO(DSN, DB_USER, DB_PASS);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $_SESSION['month'] = $month;
} catch (Exception $e) {
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>指定月の確認ページ</title>
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="../css/bace.css">
    <link rel="stylesheet" href="../css/month.css">
</head>

<body>
   <div>
       <div class="title">指定月の確認</div>
<form method="POST" action="../php/output.php">

<table border="1" style="border-collapse: collapse">
    <tr>
        <td><select class="text" name="month">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
        </select>
      月の結果をみる
        </td>
    </tr>
</table>
<div class="positions"> <button type="submit">進む</button></div>
</form>
    <div class="menu">
           <a class="button" type="submit" href="../php/choice.php">選択画面へ戻る</a>
    </div>
</div>
</body>
</html>
