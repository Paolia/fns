<?php
session_start();
include ('inc/functions.php');

if (
  !isset($_POST['name']) || $_POST['name'] === '' ||
  !isset($_POST['password']) || $_POST['password'] === ''
) {
  exit('paramError');
}

$name = $_POST["name"];
$password = $_POST["password"];
$pwd = password_hash($password, PASSWORD_DEFAULT);

$pdo = connect_to_db();
$sql = 'SELECT COUNT(*) FROM family WHERE name=:name';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

if ($stmt->fetchColumn() > 0) {
  echo '<div class="alert"><p>すでに登録されているユーザです．</p><p><a href="index.php">login</a></p></div';
  exit();
}

$sql = 'INSERT INTO family(id, name, password, admin, suspended, created_at, last_updated) VALUES(NULL, :name, :pwd, 0, 0, now(), now())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':pwd', $pwd, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:index.php");
exit();
