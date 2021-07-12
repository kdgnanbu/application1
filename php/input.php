<?php
 require_once "../php/require.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>収入、支出入力ページ</title>
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
     <link rel="stylesheet" href="../css/bace.css">
    <link rel="stylesheet" href="../css/input.css">
</head>
<body>
    <div class="title">収入、支出入力ページ</div>
<div>
 <form method="POST" action="insert_deta.php">
<table border="1" style="border-collapse: collapse">
    <tr>
        <td class="title2">日付</td>
        <td class="title2">収入、支出選択</td>
        <td class="title2">金額</td>
    </tr>
    <tr class="sample">
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
        月
        <select name="day">
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
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
        </select>
        日
         </td>
        <td><select class="text" name="payment_cd">
            <option value="1">収入</option>
            <option value="0">支出</option></select>
        </td>
        <td>
        <div class="text">
            <label for="money"></label>
            <input type="text" style="text-align:right" id="money"  name="price" placeholder="¥0">
        </div></td>
        </tr>
    </table>
   <div class="positions"><button type="submit">追加する</button></div>
</form>
    <div class="menu">
        <a class="button" type="submit" href="../php/choice.php">戻る</a>
    </div>
</div>
</body>
</html>
