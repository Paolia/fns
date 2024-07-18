<?php
session_start();
include ('inc/functions.php');
//check_session_id();
$pdo = connect_to_db('kuratomi_fns');

?>

<form class="login" action="fns_login.php" method="POST">
  <fieldset>
    <legend>倉冨さんちの家庭内SNS☆ログイン画面</legend>
    <div>
      username: <input type="text" name="name">
    </div>
    <div>
      password: <input type="password" name="password">
    </div>
    <div>
      <button>Login</button>
    </div>
    <div>
      <a href="family_reg.php">→登録ページ</a>
    </div>
  </fieldset>
</form>