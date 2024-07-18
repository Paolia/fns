<?php
session_start();
include ('inc/functions.php');

$user_id = $_GET['user_id'];
$post_id = $_GET['post_id'];

$pdo = connect_to_db();


// ここに追加
$sql = 'SELECT COUNT(*) FROM yoka_yoka WHERE user_id=:user_id AND post_id=:post_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':post_id', $post_id, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

$yoka_kazu = $stmt->fetchColumn();
// まずはデータ確認
// var_dump($yoka_kazu);
// exit();
if ($yoka_kazu !== 0) {
    // いいねされている状態
    $sql = 'DELETE FROM yoka_yoka WHERE user_id=:user_id AND post_id=:post_id';
} else {
    // いいねされていない状態
    $sql = 'INSERT INTO yoka_yoka (id, user_id, post_id, updated_at) VALUES (NULL, :user_id, :post_id, now())';
}
// ここまで追加


// $sql = 'INSERT INTO yoka_yoka (id, user_id, post_id, updated_at) VALUES (NULL, :user_id, :post_id, now())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':post_id', $post_id, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header("Location:fns_read.php");
exit();
