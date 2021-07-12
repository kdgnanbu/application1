<!DOCTYPE html>
<html>
<head>
    <title>ログイン画面</title>
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="../css/bace.css">
    <link rel="stylesheet" href="../css/login.css">
    <title>ログイン画面</title>
</head>
<body>
    <div class="box">
        <div class="title">
            <p>ログイン</p>
        </div>
        <div class="wrapper">
            <form action="../php/login.php" method="POST">
                <div>
                    <label for="email"></label>
                    <input type="email" id="email" name="email" placeholder="メールアドレス">
                </div>
                <div>
                    <label for="pass"></label>
                    <input type="password" id="pass" name="password" placeholder="パスワード">
                </div>
                <div class="position">
                    <button type="submit">ログイン</button>
                </div>
            </form>
        </div>
        <div class="border"></div>
        <div class="text">
            <p>アカウントをお持ちでない方は<a href="../php/new.php">こちら</a></p>
        </div>
    </div>
</body>
</html>
