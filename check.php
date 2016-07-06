<html>
<head>
    <meta charset="utf-8">
    <title>登録内容確認</title>
</head>
<body>
<?php
session_start();

//入力画面で記録した情報が空の場合、入力画面に移動させる
if(!isset($_SESSION['join'])){
    header('Location: join.index.php');
    exit();
}
?>

<form action="" method="post">
        <dl>
            <dt>ニックネーム</dt>
            <dd>
            <?php echo htmlspecialchars($_SESSION['join']['name'], ENT_QUOTES, 'UTF-8');?>
            </dd>
            <br>
            <dt>ユーザーID</dt>
            <dd>
            <?php echo htmlspecialchars($_SESSION['join']['id'], ENT_QUOTES, 'UTF-8');?>
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
