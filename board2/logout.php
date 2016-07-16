<html>
<head>
    <meta charset="utf-8">
    <title>ログアウトしました</title>
</head>
<body>
<p>ログアウトしました</p>
<br>

<?php
session_start();

require_once 'dbconnect.php';
//セッション情報を破棄する
$_SESSION['user_id'] = array();
$_SESSION['id'] = array();
session_destroy();

?>

<form method="post" action="login.php">
    <p><input type="submit" value="ログインする"></p>
</form>
</body>
</html>