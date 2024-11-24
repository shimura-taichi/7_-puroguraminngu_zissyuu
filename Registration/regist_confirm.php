
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アカウント登録確認画面</title>
    <link rel="stylesheet" type="text/css" href="style regist_confirm.css">
</head>
<body>
    <div class="confirm">
        <h1>登録確認画面</h1>

        
            
            <div class="form-group">
                <label>名前 (姓):</label>
                <?php echo $_POST['family_name']; ?>
            </div>

            <div class="form-group">
                <label>名前 (名):</label>
                <?php echo $_POST['last_name']; ?> 
            </div>

            <div class="form-group">
                <label>カナ (姓):</label>
                <?php echo $_POST['family_name_kana']; ?>
            </div>

            <div class="form-group">
                <label>カナ (名):</label>
                <?php echo $_POST['last_name_kana']; ?>
            </div>

            <div class="form-group">
                <label>メールアドレス:</label>
                <?php echo $_POST['mail']; ?>
            </div>

            <div class="form-group">
                <label>パスワード:</label>
                <?php echo str_repeat("●", strlen($_POST['password'])); ?>
            </div>

            <div class="form-group">
                <label>性別:</label>
                <?php echo $_POST['gender'] ?? '未選択'; ?>
            </div>

            <div class="form-group">
                <label>郵便番号:</label>
                <?php echo $_POST['postal_code']; ?>
            </div>

            <div class="form-group">
                <label>住所 (都道府県):</label>
                <?php echo $_POST['prefecture'] ?? '未選択'; ?>
            </div>

            <div class="form-group">
                <label>住所（市区町村）:</label>
                <?php echo $_POST['address_1']; ?>
            </div>

            <div class="form-group">
                <label>住所（番地）:</label>
                <?php echo $_POST['address_2']; ?>
            </div>

            <div class="form-group">
                <label>アカウント権限:</label>
                <?php echo $_POST['authority'] == '一般' ? '一般' : '管理者'; ?>
            </div>


            <form action="regist_complete.php" method="POST">
                <button type="submit" class="btn-submit">登録する</button>
                    <input type="hidden" name="family_name" value="<?php echo $_POST['family_name']; ?>">
                    <input type="hidden" name="last_name" value="<?php echo $_POST['last_name']; ?>">
                    <input type="hidden" name="family_name_kana" value="<?php echo $_POST['family_name_kana']; ?>">
                    <input type="hidden" name="last_name_kana" value="<?php echo $_POST['last_name_kana']; ?>">
                    <input type="hidden" name="mail" value="<?php echo $_POST['mail']; ?>">
                    <input type="hidden" name="password" value="<?php echo $_POST['password']; ?>">
                    <input type="hidden" name="gender" value="<?php echo $_POST['gender']?? ''; ?>">
                    <input type="hidden" name="postal_code" value="<?php echo $_POST['postal_code']?? ''; ?>">
                    <input type="hidden" name="prefecture" value="<?php echo $_POST['prefecture']?? ''; ?>">
                    <input type="hidden" name="address_1" value="<?php echo $_POST['address_1']; ?>">
                    <input type="hidden" name="address_2" value="<?php echo $_POST['address_2']; ?>">
                    <input type="hidden" name="authority" value="<?php echo $_POST['authority']; ?>">
            </form>
            
        <form action="regist.php" method="POST">
            <button type="button" onclick="history.back();">前に戻る</button>
        </form>
        
</body>