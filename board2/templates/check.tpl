<html>
<head>
    <meta charset="utf-8">
    <title>登録内容確認</title>
</head>
<body>

<form action="thanks.php" method="post">
    <dl>
        <dt>ニックネーム</dt>
        <dd>
            {$session_name}
        </dd>
        <br>
        <dt>ユーザーID</dt>
        <dd>
            {$session_user_id}
        </dd>
        <br>
        <dt>パスワード</dt>
        <dd>
            【表示されません】
        </dd>
    </dl>
    <div><input type="submit" value="登録する"></div>
    <br>
</form>

</body>
</html>
