<?php
try {
    session_start();
    require_once 'MySmarty.class.php';
    require_once 'dbconnect.php';

    if ($_POST['contents'] != "") {

//ポストされたmembersテーブルのIDとユーザーIDを格納
        $user_id = $_POST['user_id'];
        $id = $_POST['id'];
        $post_id = $_POST['post_id'];
        $contents = $_POST['contents'];

        if ($user_id == $_SESSION['user_id']) {
//データベースの接続を確立
            $db = getDb();
//データベースの本文を更新
            $sql = $db->prepare("UPDATE post SET contents = '$contents' WHERE id = $post_id");
            $sql->execute();
            $db = NULL;

        } else echo 'この投稿をした方以外は削除できません';

    } else echo '本文を入力してください';

}catch (PDOException $e){
    die("エラーメッセージ:{$e->getMessage()}");
}

$smarty->display('update.tpl');