<?php
 mb_internal_encoding("utf8");

 $pdo = new PDO("mysql:dbname=lesson2;host=localhost;","root","");


?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アカウント登録完了画面</title>
    <link rel="stylesheet" type="text/css" href="style regist_complete.css">
</head>

<body>
    <h1>アカウント登録完了画面</h1>

    <div class="complete">
        <p>登録完了しました</p>
    </div>
</body>
    <a href="index diblog registration.html">
        <button type="button">TOPページに戻る</button>
    </a>
</html>