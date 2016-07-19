<html>
<head>
    <meta charset="utf-8">
    <title>ログイン画面</title>
</head>
<body>

<p>パスワードとユーザーIDを記入してログインしてください</p>
<p>会員登録がまだの方はこちらからどうぞ</p>
<!--ここの部分を相対パスに直しておくこと-->
<p>&raquo<a href="http://localhost/techaca2/board2/join.index.php">会員登録をする</a></p>

<!--ログインフォームを作成-->
<form action="" method="post">
    <dl>
        {if isset($errors['login'])}
            {if $errors['login'] == 'blank'}
            <p class="errors">*メールアドレスとパスワードをご記入ください</p>
            {/if}
        {/if}

        <dt>ユーザーID</dt>
        <dd>
            <input type="text" name="user_id" size="35" maxlength="255"
                   value="{if isset($user_id)}echo htmlspecialchars({$user_id});{/if}">
            {if isset($errors['login'])}
                {if $errors['login'] == 'failed'}
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