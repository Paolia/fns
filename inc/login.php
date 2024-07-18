<?php
// データ受け取り
//var_dump($_POST);
//exit();
session_start();
include ('inc/functions.php');

$name = $_POST['name'];
$pwd = $_POST['password'];

// DB接続
$pdo = connect_to_db();

// SQL実行
$sql = 'SELECT * FROM family WHERE name=:name'; 
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

// ユーザ有無で条件分岐
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user == false) {
    echo '<div class="alert"><p>ユーザーが登録されていません。登録ページで登録してください。</p>';
    echo '<p><a href="family_reg.php">→登録ページ</a></p></div>';
}

if (password_verify($pwd, $user["password"]) && isset($user["name"]) && $user["suspended"] == 0) {
    $_SESSION = array();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['session_id'] = session_id();
    $_SESSION['is_admin'] = $user['is_admin'];
    $_SESSION['name'] = $user['name'];
    header("Location:fns_read.php");
    exit();
} else {
    echo '<div class="alert"><p>ログイン情報に誤りがあります</p>';
    echo '<p><a href="index.php">ログイン</a></p></div>';
    exit();
}
?>