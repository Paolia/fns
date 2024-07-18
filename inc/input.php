<?php
session_start();
$name = $_SESSION['name'];
include ("functions.php");
check_session_id();

$pdo = connect_to_db();

$sql = 'SELECT * FROM posts ORDER BY updated_at ASC';

$stmt = $pdo->prepare($sql);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<main class="login">

    <form action="post_input_conf.php" method="POST" id="add_records">
        <fieldset>
            <legend>投稿</legend>
            <table>
                <tr>
                    <td>
                        <div>タイトル: </div>
                        <div><input type="text" name="headline"></div>
                    </td>
                    <td>
                        <div>内容: </div>
                        <div><textarea id="post_content" name="post_content" rows="4" cols="40"></textarea></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>リンク: </div>
                        <div><input type="file" name="pic_link"></div>
                    </td>

                    <td>
                        <button>submit</button>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href="fns_read.php">一覧画面</a>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</main>