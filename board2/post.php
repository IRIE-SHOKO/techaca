<?php
session_start();
require_once 'dbconnect.php';

//ログインしているユーザーしか見られないようにする
try {//データベースへの接続を確立
    $db = getDb();
    $id = $_SESSION['id'];
    //ログイン状態であるか確認
    if (isset($id)){
        //ログインしている
        $sql = $db->prepare("SELECT * FROM members WHERE id = '$id'");
        $sql->execute();
        $members = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        //ログインしていない
        header('Location: login.php');
        exit();
    }
}   catch (PDOException $e){
    die("メッセージ:$e->getMessage()");
    }

    ?>

<html>
<head>
    <meta charset="UTF-8">
    <title>掲示板2</title>
</head>
    <body>
        <form method="post" action="">
            <p>
            メッセージをどうぞ！
            <input type="text" name="contents" size="150" maxlength="300">
            </p>
            <br>
            <p>
            <input type="submit" value="投稿する">
            </p>
        </form>
    </body>
</html>

<?php

require_once 'dbconnect.php';

try {//データベースへの接続を確立
    $db = getDb();

    if (isset($_POST['contents'])){

        if ($_POST['contents'] !== "") {
            //INSERT命令の準備
            $stt = $db->prepare('INSERT INTO post (contents, user_id) VALUES (:contents, :user_id)');
            //INSERT命令にポストデータとIDの内容をセット
            $stt->bindValue(':contents', $_POST['contents']);
            $stt->bindValue(':user_id', $id);
            //実行
            $stt->execute();
            $join = $db->prepare('SELECT * FROM post INNER JOIN members ON post.user_id = members.id ORDER BY post.id DESC');
            $join->execute();


                //$result = $db->prepare('SELECT contents, name FROM post ORDER BY id DESC');
                //var_dump($result->execute());
                while ($row = $join->fetch(PDO::FETCH_ASSOC)) {
                    echo $row['name'];
                    echo "<br>";
                    echo $row['contents'];
                    echo "<br>";
                    echo "<br>";
                }
            }
        }else print "メッセージを入力してください";

}   catch (PDOException $e){
    die("エラーメッセージ:{$e->getMessage()}");
}

