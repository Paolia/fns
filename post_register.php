<?php
session_start();
// 受信データを確認。
//var_dump($_POST);
//exit();

include ('inc/functions.php');
check_session_id();
$pdo = connect_to_db('kuratomi_fns');

// POSTデータ確認
if (
    !isset($_POST['headline']) || $_POST['headline'] === '' ||
    !isset($_POST['post_content']) || $_POST['post_content'] === ''
) {
    exit('ParamError');
}
// $_POSTより各項目データを取得
$headline = $_POST['headline'];
$post_content = $_POST['post_content'];
$pic_link = $_POST['pic_link'];
$name = $_SESSION['name'];

// SQL実行
$sql = 'INSERT INTO posts (id, name, headline, post_content, pic_link, posted_at, updated_at, deleted) VALUES  (NULL, :name, :headline, :post_content, :pic_link, now(), now(), 0)';
// phpMyAdminのSQLウィンドウで確認後コピペ＆バインド関数設定
$stmt = $pdo->prepare($sql);

// バインド変数を設定、毎回同じだそうなので、これもコピペ
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':headline', $headline, PDO::PARAM_STR);
$stmt->bindValue(':post_content', $post_content, PDO::PARAM_STR);
$stmt->bindValue(':pic_link', $pic_link, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

// 入力トップページに戻る
header('Location: fns_read.php', true, 307);
exit();
?>