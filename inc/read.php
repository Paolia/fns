<?php
session_start();
$name = $_SESSION['name'];
$user_id = $_SESSION['user_id'];
include ("functions.php");
check_session_id();

$pdo = connect_to_db();

//$sql = 'SELECT * FROM posts ORDER BY updated_at ASC';
$sql = 'SELECT * FROM posts LEFT OUTER JOIN
    (SELECT post_id, COUNT(id) AS yoka_kazu FROM yoka_yoka GROUP BY post_id ) AS result_table ON  posts.id = result_table.post_id';
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
      <td><a href='post_view.php?id={$record["id"]}'>{$record["headline"]}</a></td>
      <td>&#39;{$udate}</td>
      <!--<td><a href='yoka_yoka.php?user_id={$user_id}&post_id={$record["id"]}'>よか！</a></td>-->
      <td><a href='yoka_yoka.php?user_id={$user_id}&post_id={$record["id"]}'>よか！{$record["yoka_kazu"]}</a></td>
      <td><a href='edit_post.php?id={$record["id"]}'>編集</a></td>
      <td><a href='delete_post.php?id={$record["id"]}'>削除</a></td>
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
                    <th>最終更新日</th>
                    <th>よか</th>
                    <th>編集リンク</th>
                    <th>削除リンク</th>
                </tr>
            </thead>
            <tbody>
                <?= $output ?>
                <tr>
                    <td colspan="3"><a href="post_input.php">入力画面</a></td>
                    <td colspan="3"><a href="logoff.php">ログアウト</a></td>
                </tr>
            </tbody>
        </table>
    </fieldset>
</body>

</html>