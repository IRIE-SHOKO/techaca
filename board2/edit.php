
<?php
try {
    session_start();
    require_once 'MySmartyClass.php';
    require_once 'dbconnect.php';

    //ポストされたmembersテーブルのユーザーIDとIDと、postテーブルのIDを格納
    $user_id = $_POST['user_id'];
    $id = $_POST['id'];
    $post_id = $_POST['post_id'];

    $smarty->assign('user_id', $user_id);
    $smarty->assign('id', $id);
    $smarty->assign('post_id', $post_id);

    //ログイン状態であるか確認(直接アドレスを入力してdelete.phpに来ていないかを確認)
    if (isset($id) && isset($user_id)) {
        //ログインしている
        //データベースへの接続を確立
        $db = getDb();

        // 投稿した人と削除する人が同じか検査
        //post テーブルの user_id = member テーブルの IDか検査
        $stt = $db->prepare("SELECT * FROM post WHERE user_id = '$id'");
        $stt->execute();
            if($row = $stt->fetch(PDO::FETCH_ASSOC)) {

                //postテーブルのユーザIDをアサインしedit.tplに渡す
                $smarty->assign('post_user_id', $row['user_id']);
            }

    }else {//ログインしていない
        header('Location: login.php');
        exit();
    }

}catch(PDOException $e){
    die("エラーメッセージ:{$e->getMessage()}");
}
$smarty->display('edit.tpl');
