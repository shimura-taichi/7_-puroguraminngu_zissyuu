<?php
// データベース接続情報
$host = ''; // ローカルホスト
$dbname = 'lesson2'; // データベース名
$username = 'root'; // ユーザー名（環境に応じて変更）
$password = ''; // パスワード（環境に応じて変更）

try {
    // PDOを使ってデータベースに接続
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQLクエリの作成（IDの降順）
    $sql = "SELECT id,family_name,last_name,mail,gender,authority,delete_flag,registered_time,update_time FROM registration ORDER BY id DESC"; // IDの降順で取得
    // クエリの実行
    $stmt = $pdo->query($sql);

} catch (PDOException $e) {
    die("データベース接続失敗: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アカウント一覧</title>
    <link rel="stylesheet" href="style_account_list.css">
</head>
<body>
    <h1>アカウント一覧</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>名前（姓）</th>
            <th>名前（名）</th>
            <th>メールアドレス</th>
            <th>性別</th>
            <th>アカウント権限</th>
            <th>削除フラグ</th>
            <th>登録日時</th>
            <th>更新日時</th>
            <th>更新</th>
            <th>削除</th>
        </tr>

        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['family_name']) ?></td>
            <td><?= htmlspecialchars($row['last_name']) ?></td>
            <td><?= htmlspecialchars($row['mail']) ?></td>
            <td><?= $row['gender'] == 0 ? '男' : '女' ?></td>
            <td><?= $row['authority'] == 1 ? '管理者' : '一般' ?></td>
            <td><?= $row['delete_flag'] == 0 ? '有効' : '無効' ?></td>
            <td><?= date('Y-m-d', strtotime($row['registered_time'])) ?></td>
            <td><?= date('Y-m-d', strtotime($row['update_time'])) ?></td>
            <td>
                <a class="button" href="account_update.php?id=<?= $row['id'] ?>">更新</a>
            </td>
            <td>
                <a class="button delete" href="account_delete.php?id=<?= $row['id'] ?>">削除</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
