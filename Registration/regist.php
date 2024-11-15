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

    <form action="regist_confirm.php" method="POST">

      <div class="form-group">
        <label for="family_name">名前（姓）:</label>
        <input type="text" id="family_name" name="family_name" maxlength="10" value="" required pattern="[\u3040-\u309F\u4E00-\u9FFF]+">
      </div>

      <div class="form-group">
        <label for="last_name">名前（名）:</label>
        <input type="text" id="last_name" name="last_name" maxlength="10" value="" required pattern="[\u3040-\u309F\u4E00-\u9FFF]+">
      </div>

      <div class="form-group">
        <label for="family_name_kana">カナ（姓）:</label>
        <input type="text" id="family_name_kana" maxlength="10" value="" name="family_name_kana" required pattern="[\u30A0-\u30FF]+">
      </div>

      <div class="form-group">
        <label for="last_name_kana">カナ（名）:</label>
        <input type="text" id="last_name_kana" maxlength="10" value="" name="last_name_kana" required pattern="[\u30A0-\u30FF]+">
      </div>

      <div class="form-group">
        <label for="mail">メールアドレス:</label>
        <input type="mail" id="mail" name="mail" maxlength="100" value="" required pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}">
      </div>

      <div class="form-group">
        <label for="password">パスワード:</label>
        <input type="password" id="password" name="password" maxlength="10" value="" required pattern="[A-Za-z0-9]+">
      </div>

      <div class="form-group">
        <label>性別:</label>
          <span class="gender">
            <input type="radio" id="male" name="gender" value="男" required> 男
          </span>
          <span class="gender">
            <input type="radio" id="male" name="gender" value="女" required> 女
          </span>
      </div>

      <div class="form-group">
      <label for="postal_code">郵便番号:</label>
        <input type="text" id="postal_code" name="postal_code" maxlength="7" value="" required>
      </div>

      <div class="form-group">
        <label for="prefecture">住所（都道府県）:</label>
        <select id="prefecture" name="prefecture" required>
          <option value="" disabled selected>都道府県を選択してください</option>
            <option value="北海道">北海道</option>
            <option value="青森県">青森県</option>
            <option value="岩手県">岩手県</option>
            <option value="宮城県">宮城県</option>
            <option value="秋田県">秋田県</option>
            <option value="山形県">山形県</option>
            <option value="福島県">福島県</option>
            <option value="茨城県">茨城県</option>
            <option value="栃木県">栃木県</option>
            <option value="群馬県">群馬県</option>
            <option value="埼玉県">埼玉県</option>
            <option value="千葉県">千葉県</option>
            <option value="東京都">東京都</option>
            <option value="神奈川県">神奈川県</option>
            <option value="新潟県">新潟県</option>
            <option value="富山県">富山県</option>
            <option value="石川県">石川県</option>
            <option value="福井県">福井県</option>
            <option value="山梨県">山梨県</option>
            <option value="長野県">長野県</option>
            <option value="岐阜県">岐阜県</option>
            <option value="静岡県">静岡県</option>
            <option value="愛知県">愛知県</option>
            <option value="三重県">三重県</option>
            <option value="滋賀県">滋賀県</option>
            <option value="京都府">京都府</option>
            <option value="大阪府">大阪府</option>
            <option value="兵庫県">兵庫県</option>
            <option value="奈良県">奈良県</option>
            <option value="和歌山県">和歌山県</option>
            <option value="鳥取県">鳥取県</option>
            <option value="島根県">島根県</option>
            <option value="岡山県">岡山県</option>
            <option value="広島県">広島県</option>
            <option value="山口県">山口県</option>
            <option value="徳島県">徳島県</option>
            <option value="香川県">香川県</option>
            <option value="愛媛県">愛媛県</option>
            <option value="高知県">高知県</option>
            <option value="福岡県">福岡県</option>
            <option value="佐賀県">佐賀県</option>
            <option value="長崎県">長崎県</option>
            <option value="熊本県">熊本県</option>
            <option value="大分県">大分県</option>
            <option value="宮崎県">宮崎県</option>
            <option value="鹿児島県">鹿児島県</option>
            <option value="沖縄県">沖縄県</option>
        </select>
      </div>
        
      <div class="form-group">
        <label for="address_1">住所（市区町村）:</label>
        <input type="text" id="address_1" name="address_1" maxlength="10" value="" required>
      </div>

      <div class="form-group">
        <label for="address_2">住所（番地）:</label>
        <input type="text" id="address_2" name="address_2" maxlength="100" value="" required>
      </div>

      <div class="form-group">
        <label for="authority">アカウント権限:</label>
        <select id="authority" name="authority" required>
          <option value="一般" selected>一般</option>
          <option value="管理者">管理者</option>
        </select>
      </div>

      <div class="submit-btn">
        <input type="submit" value="確認する">
      </div>

    </form>
  </div>
</body>
</html>