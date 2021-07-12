<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="../css/bace.css">
    <link rel="stylesheet" href="../css/registration.css">
    <title>新規登録画面</title>
</head>
<body>
    <div class="box">
        <div class="title">
            <p>新規登録</p>
        </div>
        <div class="wrapper">
                <form action="../php/registration.php" method="POST">
                <div>
                    <label for="email"></label>
                    <input type="email" id="email" name="email" placeholder="メールアドレス">
                </div>
                <div>
                    <label for="pass"></label>
                    <input type="password" id="pass"
                    name="password" placeholder="パスワード">
                </div>
                  <div class="position">
                     <button type="submit">登録</button>
            </div>
            </form>
        </div>
        <div class="border"></div>
        <div class="text">
            <p>アカウントをお持ちのかたは<a href="../php/signUp.php">こちら</a></p>
            <p>*パスワードは半角英数字をそれぞ一文字以上含んだ、八文字以上で設定してください。</p>
        </div>
    </div>
</body>
</html>
