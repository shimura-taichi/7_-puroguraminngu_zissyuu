<?php
    session_start();

    $errors = [];

      
      //↓未記入、未選択の場合、メッセージが表示される

      if (empty($_POST['family_name'])){
        $errors['family_name'] = '名前（姓）が未入力です';
      }elseif(!preg_match("/[\p{Hiragana}\p{Han}]+/u", $_POST['family_name'])){
        $errors['family_name'] = '名前（姓）を正しく入力してください。';
      }
  
      if(empty($_POST['last_name'])){
        $errors['last_name'] = '名前（名）が未入力です';
      }elseif(!preg_match("/[\p{Hiragana}\p{Han}]+/u", $_POST['last_name'])){
        $errors['last_name'] = '名前（名）を正しく入力してください。';
      }
  
      if(empty($_POST['family_name_kana'])){
        $errors['family_name_kana'] = 'カナ（姓）が未入力です';
      }elseif(!preg_match("/[\p{Katakana}]+/u", $_POST['family_name_kana'])){
        $errors['family_name_kana'] = 'カナ（姓）は全角カタカナで入力してください。';
      }
  
      if(empty($_POST['last_name_kana'])){
        $errors['last_name_kana'] = 'カナ（名）が未入力です';
      }elseif(!preg_match("/[\p{Katakana}]+/u", $_POST['last_name_kana'])){
        $errors['last_name_kana'] = 'カナ（名）は全角カタカナで入力してください。';
      }
  
      if(empty($_POST['mail'])){
        $errors['mail'] = 'メールアドレスが未入力です';
      }elseif(!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
        $errors['mail'] = 'メールアドレスを正しく入力してください。';
      }
  
      if(empty($_POST['password'])){
        $errors['password'] = 'パスワードが未入力です';
      }elseif(!preg_match("/[A-Za-z0-9]+/", $_POST['password'])){
        $errors['password'] = 'パスワードは半角英数字で入力してください。';
      }
  
      if(empty($_POST['gender'])){
        $errors['gender'] = '性別を選択してください';
      }
  
      if(empty($_POST['postal_code'])){
        $errors['postal_code'] = '郵便番号が未入力です';
      }elseif(!preg_match("/^\d{7}$/", $_POST['postal_code'])){
        $errors['postal_code'] = '郵便番号は7桁の数字で入力してください。';
      }
  
      if(empty($_POST['prefecture'])){
        $errors['prefecture'] = '住所（都道府県）が未選択です';
      }
  
      if(empty($_POST['address_1'])){
        $errors['address_1'] = '住所（市区町村）が未入力です';
      }elseif(!preg_match("/^[\p{Hiragana}\p{Katakana}\p{Han}0-9ー\s]+$/u", $_POST['address_1'])) {
        $errors['address_1'] = '住所（市区町村）はひらがな、漢字、カタカナ、数字、記号（ハイフンとスペース）のみ入力可能です。';
      }
      if(empty($_POST['address_2'])){
        $errors['address_2'] = '住所（番地）が未入力です';
      }elseif(!preg_match("/^[\p{Hiragana}\p{Katakana}\p{Han}0-9ー\s]+$/u", $_POST['address_2'])) {
        $errors['address_2'] = '住所（市区町村）はひらがな、漢字、カタカナ、数字、記号（ハイフンとスペース）のみ入力可能です。';
      }
  
      if(empty($_POST['authority'])){
        $errors['authority'] = 'アカウント権限を選択してください';
      }
      
        // エラーがなければセッションにデータを保存し確認画面へリダイレクト
        if (empty($errors)) {
          $_SESSION['form_data'] = $_POST;
           header("Location: regist_confirm.php");
            exit;
        }
  ?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>アカウント登録画面</title>
  <link rel="stylesheet"type="text/css" href="style regist.css">
</head>
<body>
  <div class="container">
    <h1>アカウント登録画面</h1>


    <form action="" method="POST"  novalidate>

      <div class="form-group">
        <label for="family_name">名前（姓）</label>
        <input type="text" id="family_name" name="family_name" maxlength="10" value="<?php echo htmlspecialchars($_POST['family_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required pattern="[\u3040-\u309F\u4E00-\u9FFF]+">
        <?php if (!empty($errors['family_name'])): ?>
          <p class="error" style="color: red;"><?php echo $errors['family_name']; ?></p>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label for="last_name">名前（名）</label>
        <input type="text" id="last_name" name="last_name" maxlength="10" value="<?php echo htmlspecialchars($_POST['last_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required pattern="[\u3040-\u309F\u4E00-\u9FFF]+">

        <?php if (!empty($errors['last_name'])): ?>
          <p class="error" style="color: red;"><?php echo $errors['last_name']; ?></p>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label for="family_name_kana">カナ（姓）</label>
        <input type="text" id="family_name_kana" maxlength="10" value="<?php echo htmlspecialchars($_POST['family_name_kana'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" name="family_name_kana" required pattern="[\u30A0-\u30FF]+">
        
        <?php if (!empty($errors['family_name_kana'])): ?>
          <p class="error" style="color: red;"><?php echo $errors['family_name_kana']; ?></p>
        <?php endif; ?>
        
      </div>

      <div class="form-group">
        <label for="last_name_kana">カナ（名）</label>
        <input type="text" id="last_name_kana" maxlength="10" value="<?php echo htmlspecialchars($_POST['last_name_kana'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" name="last_name_kana" required pattern="[\u30A0-\u30FF]+">

        <?php if (!empty($errors['last_name_kana'])): ?>
          <p class="error" style="color: red;"><?php echo $errors['last_name_kana']; ?></p>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label for="mail">メールアドレス</label>
        <input type="mail" id="mail" name="mail" maxlength="100" value="<?php echo htmlspecialchars($_POST['mail'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}">

        <?php if (!empty($errors['mail'])): ?>
          <p class="error" style="color: red;"><?php echo $errors['mail']; ?></p>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label for="password">パスワード</label>
        <input type="password" id="password" name="password" maxlength="10" value="<?php echo htmlspecialchars($_POST['password'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required pattern="[A-Za-z0-9]+">

        <?php if (!empty($errors['password'])): ?>
          <p class="error" style="color: red;"><?php echo $errors['password']; ?></p>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label>性別</label>
          <span class="gender">
            <input type="radio" id="gender" name="gender" value="男" <?php echo (!empty($_POST['gender']) && $_POST['gender'] === '男') ? 'checked' : ''; ?> required> 男
          </span>
          <span class="gender">
            <input type="radio" id="gender" name="gender" value="女" <?php echo (!empty($_POST['gender']) && $_POST['gender'] === '女') ? 'checked' : ''; ?> required> 女
          </span>

        <?php if (!empty($errors['gender'])): ?>
          <p class="error" style="color: red;"><?php echo $errors['gender']; ?></p>
        <?php endif; ?>
      </div>

      <div class="form-group">
      <label for="postal_code">郵便番号</label>
        <input type="text" id="postal_code" name="postal_code" maxlength="7" value="<?php echo htmlspecialchars($_POST['postal_code'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required pattern="\d{7}">

        <?php if (!empty($errors['postal_code'])): ?>
          <p class="error" style="color: red;"><?php echo $errors['postal_code']; ?></p>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label for="prefecture">住所（都道府県）</label>
        <select id="prefecture" name="prefecture" required>
        <option value="" disabled <?php echo empty($_POST['prefecture']) ? 'selected' : ''; ?>>都道府県を選択してください</option>
          <option value="北海道" <?php echo ($_POST['prefecture'] ?? '') === '北海道' ? 'selected' : ''; ?>>北海道</option>
          <option value="青森県" <?php echo ($_POST['prefecture'] ?? '') === '青森県' ? 'selected' : ''; ?>>青森県</option>
          <option value="岩手県" <?php echo ($_POST['prefecture'] ?? '') === '岩手県' ? 'selected' : ''; ?>>岩手県</option>
          <option value="宮城県" <?php echo ($_POST['prefecture'] ?? '') === '宮城県' ? 'selected' : ''; ?>>宮城県</option>
          <option value="秋田県" <?php echo ($_POST['prefecture'] ?? '') === '秋田県' ? 'selected' : ''; ?>>秋田県</option>
          <option value="山形県" <?php echo ($_POST['prefecture'] ?? '') === '山形県' ? 'selected' : ''; ?>>山形県</option>
          <option value="福島県" <?php echo ($_POST['prefecture'] ?? '') === '福島県' ? 'selected' : ''; ?>>福島県</option>
          <option value="茨城県" <?php echo ($_POST['prefecture'] ?? '') === '茨城県' ? 'selected' : ''; ?>>茨城県</option>
          <option value="栃木県" <?php echo ($_POST['prefecture'] ?? '') === '栃木県' ? 'selected' : ''; ?>>栃木県</option>
          <option value="群馬県" <?php echo ($_POST['prefecture'] ?? '') === '群馬県' ? 'selected' : ''; ?>>群馬県</option>
          <option value="埼玉県" <?php echo ($_POST['prefecture'] ?? '') === '埼玉県' ? 'selected' : ''; ?>>埼玉県</option>
          <option value="千葉県" <?php echo ($_POST['prefecture'] ?? '') === '千葉県' ? 'selected' : ''; ?>>千葉県</option>
          <option value="東京都" <?php echo ($_POST['prefecture'] ?? '') === '東京都' ? 'selected' : ''; ?>>東京都</option>
          <option value="神奈川県" <?php echo ($_POST['prefecture'] ?? '') === '神奈川県' ? 'selected' : ''; ?>>神奈川県</option>
          <option value="新潟県" <?php echo ($_POST['prefecture'] ?? '') === '新潟県' ? 'selected' : ''; ?>>新潟県</option>
          <option value="富山県" <?php echo ($_POST['prefecture'] ?? '') === '富山県' ? 'selected' : ''; ?>>富山県</option>
          <option value="石川県" <?php echo ($_POST['prefecture'] ?? '') === '石川県' ? 'selected' : ''; ?>>石川県</option>
          <option value="福井県" <?php echo ($_POST['prefecture'] ?? '') === '福井県' ? 'selected' : ''; ?>>福井県</option>
          <option value="山梨県" <?php echo ($_POST['prefecture'] ?? '') === '山梨県' ? 'selected' : ''; ?>>山梨県</option>
          <option value="長野県" <?php echo ($_POST['prefecture'] ?? '') === '長野県' ? 'selected' : ''; ?>>長野県</option>
          <option value="岐阜県" <?php echo ($_POST['prefecture'] ?? '') === '岐阜県' ? 'selected' : ''; ?>>岐阜県</option>
          <option value="静岡県" <?php echo ($_POST['prefecture'] ?? '') === '静岡県' ? 'selected' : ''; ?>>静岡県</option>
          <option value="愛知県" <?php echo ($_POST['prefecture'] ?? '') === '愛知県' ? 'selected' : ''; ?>>愛知県</option>
          <option value="三重県" <?php echo ($_POST['prefecture'] ?? '') === '三重県' ? 'selected' : ''; ?>>三重県</option>
          <option value="滋賀県" <?php echo ($_POST['prefecture'] ?? '') === '滋賀県' ? 'selected' : ''; ?>>滋賀県</option>
          <option value="京都府" <?php echo ($_POST['prefecture'] ?? '') === '京都府' ? 'selected' : ''; ?>>京都府</option>
          <option value="大阪府" <?php echo ($_POST['prefecture'] ?? '') === '大阪府' ? 'selected' : ''; ?>>大阪府</option>
          <option value="兵庫県" <?php echo ($_POST['prefecture'] ?? '') === '兵庫県' ? 'selected' : ''; ?>>兵庫県</option>
          <option value="奈良県" <?php echo ($_POST['prefecture'] ?? '') === '奈良県' ? 'selected' : ''; ?>>奈良県</option>
          <option value="和歌山県" <?php echo ($_POST['prefecture'] ?? '') === '和歌山県' ? 'selected' : ''; ?>>和歌山県</option>
          <option value="鳥取県" <?php echo ($_POST['prefecture'] ?? '') === '鳥取県' ? 'selected' : ''; ?>>鳥取県</option>
          <option value="島根県" <?php echo ($_POST['prefecture'] ?? '') === '島根県' ? 'selected' : ''; ?>>島根県</option>
          <option value="岡山県" <?php echo ($_POST['prefecture'] ?? '') === '岡山県' ? 'selected' : ''; ?>>岡山県</option>
          <option value="広島県" <?php echo ($_POST['prefecture'] ?? '') === '広島県' ? 'selected' : ''; ?>>広島県</option>
          <option value="山口県" <?php echo ($_POST['prefecture'] ?? '') === '山口県' ? 'selected' : ''; ?>>山口県</option>
          <option value="徳島県" <?php echo ($_POST['prefecture'] ?? '') === '徳島県' ? 'selected' : ''; ?>>徳島県</option>
          <option value="香川県" <?php echo ($_POST['prefecture'] ?? '') === '香川県' ? 'selected' : ''; ?>>香川県</option>
          <option value="愛媛県" <?php echo ($_POST['prefecture'] ?? '') === '愛媛県' ? 'selected' : ''; ?>>愛媛県</option>
          <option value="高知県" <?php echo ($_POST['prefecture'] ?? '') === '高知県' ? 'selected' : ''; ?>>高知県</option>
          <option value="福岡県" <?php echo ($_POST['prefecture'] ?? '') === '福岡県' ? 'selected' : ''; ?>>福岡県</option>
          <option value="佐賀県" <?php echo ($_POST['prefecture'] ?? '') === '佐賀県' ? 'selected' : ''; ?>>佐賀県</option>
          <option value="長崎県" <?php echo ($_POST['prefecture'] ?? '') === '長崎県' ? 'selected' : ''; ?>>長崎県</option>
          <option value="熊本県" <?php echo ($_POST['prefecture'] ?? '') === '熊本県' ? 'selected' : ''; ?>>熊本県</option>
          <option value="大分県" <?php echo ($_POST['prefecture'] ?? '') === '大分県' ? 'selected' : ''; ?>>大分県</option>
          <option value="宮崎県" <?php echo ($_POST['prefecture'] ?? '') === '宮崎県' ? 'selected' : ''; ?>>宮崎県</option>
          <option value="鹿児島県" <?php echo ($_POST['prefecture'] ?? '') === '鹿児島県' ? 'selected' : ''; ?>>鹿児島県</option>
          <option value="沖縄県" <?php echo ($_POST['prefecture'] ?? '') === '沖縄県' ? 'selected' : ''; ?>>沖縄県</option>
        </select>
        
        <?php if (!empty($errors['prefecture'])): ?>
          <p class="error" style="color: red;"><?php echo $errors['prefecture']; ?></p>
        <?php endif; ?>
      </div>
        
      <div class="form-group">
        <label for="address_1">住所（市区町村）</label>
        <input type="text" id="address_1" name="address_1" maxlength="10" value="<?php echo htmlspecialchars($_POST['address_1'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required pattern="[\u3040-\u309F\u4E00-\u9FFF\u30A0-\u30FF0-9ー\s]+">

        <?php if (!empty($errors['address_1'])): ?>
          <p class="error" style="color: red;"><?php echo $errors['address_1']; ?></p>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label for="address_2">住所（番地）</label>
        <input type="text" id="address_2" name="address_2" maxlength="100" value="<?php echo htmlspecialchars($_POST['address_2'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required pattern="[\u3040-\u309F\u4E00-\u9FFF\u30A0-\u30FF0-9ー\s]+">

        <?php if (!empty($errors['address_2'])): ?>
          <p class="error" style="color: red;"><?php echo $errors['address_2']; ?></p>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label for="authority">アカウント権限</label>
        <select id="authority" name="authority" required>
        <option value="一般" <?php echo ($_POST['authority'] ?? '') === '一般' ? 'selected' : ''; ?>>一般</option>
        <option value="管理者" <?php echo ($_POST['authority'] ?? '') === '管理者' ? 'selected' : ''; ?>>管理者</option>
        </select>

        <?php if (!empty($errors['authority'])): ?>
          <p class="error" style="color: red;"><?php echo $errors['authority']; ?></p>
        <?php endif; ?>
      </div>

      <div class="submit-btn">
        <input type="submit" value="確認する">
      </div>

    </form>
  </div>
</body>
</html>

