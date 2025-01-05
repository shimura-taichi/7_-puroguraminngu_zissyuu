<?php
 mb_internal_encoding("utf8");

 $error_message = ""; // エラーメッセージを初期化

try{

// データベース接続
    $pdo = new PDO("mysql:dbname=lesson2;host=localhost;","root","");

 // パスワードをハッシュ化
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

 // delete_flagのデフォルト値を設定
 $delete_flag = (isset($_POST['delete_flag']) && $_POST['delete_flag'] !== '') ? (int)$_POST['delete_flag'] : 0;

 // registered_timeのデフォルト値を設定（現在の日時）
 $registered_time = !empty($_POST['registered_time']) ? $_POST['registered_time'] : date('Y-m-d H:i:s');

 // update_timeのデフォルト値を設定（現在の日時）
 $update_time = date('Y-m-d H:i:s');

 // SQL文の準備
    $sql = "INSERT INTO registration(
                    id, family_name,last_name,mail,password,gender,postal_code,prefecture,address_1,address_2,authority,delete_flag,registered_time,update_time
                    )VALUES(
                    :id,:family_name,:last_name,:mail,:password,:gender,:postal_code,:prefecture,:address_1,:address_2,:authority,:delete_flag,:registered_time,:update_time
                )";

// プリペアドステートメントの作成
    $stmt = $pdo->prepare($sql);

// パラメータのバインド
    $stmt->bindParam(':id', $_POST['id']);
    $stmt->bindParam(':family_name', $_POST['family_name']);
    $stmt->bindParam(':last_name', $_POST['last_name']);
    $stmt->bindParam(':mail', $_POST['mail']);
    // ハッシュ化されたパスワードを使用
    $stmt->bindParam(':password', $hashed_password); 
    $stmt->bindParam(':gender', $_POST['gender']);
    $stmt->bindParam(':postal_code', $_POST['postal_code']);
    $stmt->bindParam(':prefecture', $_POST['prefecture']);
    $stmt->bindParam(':address_1', $_POST['address_1']);
    $stmt->bindParam(':address_2', $_POST['address_2']);
    $stmt->bindParam(':authority', $_POST['authority']);

    //削除フラグ
    $stmt->bindParam(':delete_flag', $delete_flag, PDO::PARAM_INT); 
    //登録日時
    $stmt->bindParam(':registered_time', $registered_time);
    //更新日時
    $stmt->bindParam(':update_time', $update_time);

    // クエリの実行
    $stmt->execute();


}catch(PDOException $e){
    // エラーメッセージを設定
    $error_message = "エラーが発生したためアカウント登録できません。<br>エラー内容：" . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アカウント登録完了画面</title>
    <link rel="stylesheet" type="text/css" href="style_regist_complete.css">

    <style>
        .error{
            color: red;
        }
    </style>   

</head>

<body>
    <h1>アカウント登録完了画面</h1>

    <?php if (!empty($error_message)) : ?>
        <p class="error"><?php echo htmlspecialchars($error_message, ENT_QUOTES, 'UTF-8'); ?></p>
    <?php else : ?>
        <div class="complete">
            <p>登録完了しました</p>
        </div> 
    <?php endif; ?>
</body>
    <a href="index_diblog_registration.html">
        <button type="button">TOPページに戻る</button>
    </a>
</html>