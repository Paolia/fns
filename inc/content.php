<?php
session_start();
$name = $_SESSION['name'];
$id = $_GET['id'];
include ("functions.php");
check_session_id();

$pdo = connect_to_db();

$sql = 'SELECT * FROM posts WHERE id=' . $id . ' ORDER BY updated_at ASC';

$stmt = $pdo->prepare($sql);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$output = "";
foreach ($result as $record) {
    $udate = substr($record["updated_at"], 2, 8);

    $output .= "
    <tr>
      <td>{$record["name"]}</td>
      <td><a href='post_view.php?post_content={$record["post_content"]}'>{$record["headline"]}</a></td>
      <td><a href='delete_post.php?id={$record["pic_link"]}'>Show</a></td>
      <td>&#39;{$udate}</td>
      </tr>
    <tr>
      <td colspan='4'>{$record["post_content"]}</td>   
    </tr>
  ";
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>倉冨さんちの家庭内SNS☆一覧画面</title>
</head>

<body>
    <fieldset class="login">
        <legend>倉冨さんちの家庭内SNS☆一覧画面<?= $name ?></legend>
        <table>
            <thead>
                <tr>
                    <th>記入者</th>
                    <th>タイトル</th>
                    <th>リンク</th>
                    <th>更新日</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?= $output ?>
                <tr>
                    <td colspan="2"><a href="post_input.php">入力画面</a></td>
                    <td colspan="2"><a href="logoff.php">ログアウト</a></td>
                </tr>
            </tbody>
        </table>
    </fieldset>
</body>

</html>