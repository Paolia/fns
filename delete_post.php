<?php
//var_dump($_GET);
//exit();
session_start();
// データ受け取り
$id = $_GET['id'];

// DB接続
include ('inc/functions.php');
check_session_id();
$pdo = connect_to_db();

// SQL実行
$sql = 'DELETE FROM posts WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header('Location: fns_read.php?' . $_SERVER['QUERY_STRING'], true, 307);
exit();
?>