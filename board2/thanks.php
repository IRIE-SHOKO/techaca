<html>
<head>
    <meta charset="utf-8">
    <title>登録しました</title>
</head>
<body>
<p>ユーザー登録が完了しました</p>
<br>
<p><a href="../../">ログインする</a></p>
<?php
session_start();

require_once 'dbconnect.php';
//セッション情報を破棄する
$_SESSION['join'] = array();
session_destroy();
?>
</body>
</html>