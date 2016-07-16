<html>
<head>
    <meta charset="utf-8">
    <title>編集画面</title>
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

            if ($row['user_id'] == $_SESSION['id']) :?>
                <form method="post" action="update.php">
                <p>編集したい内容をどうぞ！</p>
                <input type="message" name="contents" size="75" maxlength="300">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="post_id" value="<?php echo $post_id;?>">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <input type="submit" value="編集する">
                </form>
                 <?php else: echo 'この投稿をした方以外は削除できません'; ?>
                 <?php endif?>

    <?php   }

    }else {//ログインしていない
        header('Location: login.php');
        exit();
    }

}catch(PDOException $e){
    die("エラーメッセージ:{$e->getMessage()}");
}

?>
</body>
</html>