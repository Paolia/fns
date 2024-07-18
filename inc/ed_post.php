<?php
// 受け取ったデータを確認
// var_dump($_GET);
// exit();
session_start();
// id受け取り
include ('functions.php');
check_session_id();
$id = $_GET['id'];

// DB接続
$pdo = connect_to_db();

// SQL実行
$sql = 'SELECT * FROM posts WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

$record = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<main class="login">
    <fieldset>
        <form action="fns_update.php" method="POST" id="post_update">

            <legend>倉冨さんちの家庭内SNS☆編集画面</legend>

            <div><?= $record['name'] ?>さん、あなたの投稿を編集しますよ</div>
            <table class="post_edit_table">
                <tr>
                    <th>タイトル</th>
                    <th>内容</th>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <input type="text" name="headline" value="<?= $record['headline'] ?>">
                    </td>
                    <td>
                        <input type="text" name="post_content" value="<?= $record['post_content'] ?>">
                    </td>
                <tr>
                    <th>画像リンク</th>
                    <th>最終更新日</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="pic_link" value="<?= $record['pic_link'] ?>">
                    </td>
                    <td>
                        <?= $record['updated_at'] ?>
                    </td>
                </tr>
                <td>
                    <a href="fns_read.php">一覧画面</a>
                </td>
                <td>
                    <button>submit</button>
                </td>
                </tr>
            </table>
        </form>
    </fieldset>
</main>
</body>

</html>