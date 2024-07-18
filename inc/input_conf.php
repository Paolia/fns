<?php
session_start();
include ('inc/functions.php');
check_session_id();
$name = $_SESSION['name'];
$pic_link = $_POST['pic_link'];
?>
<main class="login">
    <fieldset>
        <legend>投稿内容</legend>
        <div><?= $name ?>さん、</div>
        <div>以下の内容で登録します。よろしいですか？</div>
        <div>
            <table class="post_conf_table">
                <tr>
                    <th>タイトル：</th>
                    <th>内容：</th>
                </tr>
                <tr>
                    <td><?php echo $_POST["headline"]; ?></td>
                    <td><?php echo $_POST["post_content"]; ?></td>
                </tr>
            </table>
            <?php
            echo
                '<form id="form2" action="post_register.php" method="POST">
                <input type="hidden" name="headline" value="' . $_POST["headline"] . '">
                <input type="hidden" name="post_content" value="' . $_POST["post_content"] . '">
                <input type="hidden" name="pic_link" value="' . $_POST["pic_link"] . '">
                <button type="submit" id="registar">登録</button>
                </form>'
                ?>
        </div>
    </fieldset>
</main>