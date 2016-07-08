<html>
<head>
    <meta charset="utf-8">
    <title>登録内容確認</title>
</head>
<body>
<?php
session_start();
//データベースに接続する
require_once 'dbconnect.php';


//直接check.phpが呼び出された場合は、入力画面("index.php")に移動させる。
try{if (!isset($_POST)){
   header('Location: join.index.php');
   exit();
   }

        $db = getDb();
        //$_POSTの中身が空ではない場合、情報をデータベースに登録する
        $stt = $db->prepare('INSERT INTO members (name, user_id, password) VALUES(:name, :user_id, :password)');
        $stt->bindValue(':name', $_SESSION['join']['name']);
        $stt->bindValue(':user_id', $_SESSION['join']['user_id']);
        $stt->bindValue(':password', $_SESSION['join']['password']);
        $stt->execute();
}       catch (PDOException $e){
        die("エラーメッセージ:{$e->getMessage()}");
        }
?>

<form action="thanks.php" method="post">
        <dl>
            <dt>ニックネーム</dt>
            <dd>
            <?php echo htmlspecialchars($_SESSION['join']['name'], ENT_QUOTES, 'UTF-8');?>
            </dd>
            <br>
            <dt>ユーザーID</dt>
            <dd>
            <?php echo htmlspecialchars($_SESSION['join']['user_id'], ENT_QUOTES, 'UTF-8');?>
            </dd>
            <br>
            <dt>パスワード</dt>
            <dd>
            【表示されません】
            </dd>
        </dl>
    <div><a href="join.index.php?action=rewrite">&laquo;&nbsp;書き直す</a>
    <input type="submit" value="登録する"></div>
</form>


</body>
</html>
