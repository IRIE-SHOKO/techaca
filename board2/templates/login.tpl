<html>
<head>
    <meta charset="utf-8">
    <title>ログイン画面</title>
</head>
<body>

<p>パスワードとユーザーIDを記入してログインしてください</p>
<p>会員登録がまだの方はこちらからどうぞ</p>
<form method="post" action="../join.php">
    <p><input type="submit" value="会員登録をする"></p>
</form>

<!--ログインフォームを作成-->
<form action="../login.php" method="post">
    <dl>
        {if isset($errors)}
            {if $errors == 'blank'}
            <p class="errors">*ユーザIDとパスワードをご記入ください</p>
            {/if}
        {/if}

        <dt>ユーザーID</dt>
        <dd>
            <input type="text" name="user_id" size="35" maxlength="255"
                   value="{if isset($user_id)}echo htmlspecialchars({$user_id});{/if}">

            {if isset($errors)}
                {if $errors == 'failed'}
                <p class="errors">ログインに失敗しました。正しくご記入ください</p>
                {/if}
            {/if}
        </dd>

        <br>

        <dt>パスワード</dt>
        <dd>
            <input type="password" name="password" size="35" maxlength="255"
                   value="{if isset($password)}echo htmlspecialchars({$password});{/if}">
        </dd>
    </dl>

    <div><input type="submit" value="ログインする"></div>
</form>
</body>
</html>