<html>
<head>
    <meta charset="UTF-8">
    <title>削除完了</title>
</head>
<body>
<?php
try {
    session_start();
    require_once 'dbconnect.php';

    //ポストされたmembersテーブルのIDとユーザーIDを格納
    $user_id = $_POST['user_id'];
    $id = $_POST['id'];
    $post_id = $_POST['post_id'];
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

            if ($row['user_id'] == $_SESSION['id']) {
                //投稿を削除
                $sql = $db->prepare("DELETE FROM post WHERE id = '$post_id'");
                $sql->execute();
                $db = NULL;

            }else 'この投稿をした方以外は削除できません';
        
        }
        
    }else {//ログインしていない
            header('Location: login.php');
            exit();
    }

}catch(PDOException $e){
    die("エラーメッセージ:{$e->getMessage()}");
}

?>

<p>投稿を削除しました</p>
<br>
<form method="post" action="post.php">
<p><input type="submit" value="投稿画面に戻る"></p>
</form>
</body>
</html>
