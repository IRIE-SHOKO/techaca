<?php

try {
    //ログインしているユーザーしか見られないようにする
    session_start();
    require_once 'dbconnect.php';
    //membersテーブルのIDとユーザーIDを格納
    $user_id = $_SESSION['user_id'];
    $id = $_SESSION['id'];
    
    //ログイン状態であるか確認
    if (isset($_SESSION['id']) && isset($_SESSION['user_id'])){
        //ログインしている
        //データベースへの接続を確立
        $db = getDb();
        $sql = $db->prepare("SELECT * FROM members WHERE user_id = '$user_id'");
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
    <dl>
        <dt>メッセージをどうぞ！</dt>
        <dd><input type="message" name="contents" size="75" maxlength="300"></dd>
        <br>
        <dd><input type="submit" value="投稿する"></dd>
    </dl>
</form>

<?php

require_once 'dbconnect.php';

try {//データベースへの接続を確立
    $db = getDb();

    if (isset($_POST['contents'])) {

        if ($_POST['contents'] !== "") {
            $stt = $db->prepare('INSERT INTO post (contents, user_id) VALUES (:contents, :user_id)');
            //INSERT命令にポストデータとmemberテーブルのIDの内容をセット
            $stt->bindValue(':contents', $_POST['contents']);
            $stt->bindValue(':user_id', $id);
            //実行
            $stt->execute();
            $join = $db->prepare('SELECT * FROM post INNER JOIN members ON post.user_id = members.id ORDER BY post.id DESC');
            $join->execute();

            while ($row = $join->fetch(PDO::FETCH_ASSOC)) {
                echo "名前：";
                echo $row['name'];
                echo "<br>";
                echo $row['contents']; ?>

                <table>
                    <td>
                        <form method="post" action="delete.php">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                            <input type="submit" name="delete" value="削除する">
                        </form>
                    </td>
                    <td>
                        <form method="post" action="edit.php">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                            <input type="submit" name="edit" value="編集する">
                        </form>
                    </td>
                </table>

                <?php echo "<br>";
                echo "<br>"; ?>
            <?php }
        }else print "*メッセージを入力してください";
    }
} catch (PDOException $e){
  die("エラーメッセージ:{$e->getMessage()}");
  }

?>
