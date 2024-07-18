<?php
// 受信データを確認。
//var_dump($_POST);
//exit();
session_start();
include ('inc/functions.php');
check_session_id();
$pdo = connect_to_db('kuratomi_kakeibo');
// POSTデータ確認
if (
    !isset($_POST['headline']) || $_POST['headline'] === '' ||
    !isset($_POST['post_content']) || $_POST['post_content'] === ''
) {
    exit('ParamError');
}

// $_POSTより各項目データを取得
$id = $_POST['id'];
$headline = $_POST['headline'];
$post_content = $_POST['post_content'];
$pic_link = $_POST['pic_link'];

// SQL実行
$sql = 'UPDATE posts SET headline=:headline, post_content=:post_content, pic_link=:pic_link, updated_at=now() WHERE id = :id';
// phpMyAdminのSQLウィンドウで確認後コピペ＆バインド関数設定
$stmt = $pdo->prepare($sql);
// バインド変数を設定、毎回同じだそうなので、これもコピペ
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
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