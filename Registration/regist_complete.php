<?php
 mb_internal_encoding("utf8");

 $pdo = new PDO("mysql:dbname=lesson2;host=localhost;","root","");

 $pdo -> exec("insert into registration(id,family_name,last_name,mail,password,gender,postal_code,prefecture,address_1,address_2,authority,delete_flag,registered_time,update_time)
 values('".$_POST['id']."','".$_POST['family_name']."','".$_POST['last_name']."','".$_POST['mail']."','".$_POST['password']."','".$_POST['gender']."','".$_POST['postal_code']."','".$_POST['prefecture']."','".$_POST['address_1']."','".$_POST['address_2']."','".$_POST['authority']."','".$_POST['delete_flag']."','".$_POST['registered_time']."','".$_POST['update_time']."');");

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アカウント登録完了画面</title>
    <link rel="stylesheet" type="text/css" href="style_regist_complete.css">
</head>

<body>
    <h1>アカウント登録完了画面</h1>

    <div class="complete">
        <p>登録完了しました</p>
    </div>
</body>
    <a href="index_diblog_registration.html">
        <button type="button">TOPページに戻る</button>
    </a>
</html>