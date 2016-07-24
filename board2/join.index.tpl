<html>
<head>
    <meta charset="utf-8">
    <title>会員登録</title>
</head>
<body>

<!--入力フォームを作成-->
<!--エラー項目をユーザーに知らせる-->
<p>次のフォームに必要事項をご記入ください。</p>
<form method="post" action=''>
    <dl>
        <dt>お名前<span class="required">【必須】</span></dt>
        <dd><input type="text" name="name" size="35" maxlength="255">


            <!--名前が入力されていない場合、エラーメッセージを出力-->
            {if isset($error_name)}
            {if $error_name == 'blank'}
            　<p class="error">*お名前を入力してください</p>
            {/if}　
            {/if}
        </dd>

        <br>

        <dt>ユーザID<span class="required">【必須】</span></dt>
        <dd><input type="text" name="user_id" size="20" maxlength="45">
            <!--ユーザーIDが入力されていない場合、エラーメッセージを出力-->

            　{if isset($error_user_id_blank)}
                {if $error_user_id_blank == 'blank'}
            <p class="error">*ユーザーIDを入力してください</p>
            {/if}
            {/if}

            {if isset($error_user_id_duplicate)}
                {if $error_user_id_duplicate == 'duplicate'}
            <p class="error">指定されたユーザーIDはすでに登録されています</p>
            {/if}
            {/if}
        </dd>

        <br>

        <dt>パスワード<span class="required">【必須】</span></dt>
        <dd><input type="password" name="password" size="10" maxlength="35">

            <!--パスワードが4文字以上でない場合、エラーメッセージを出力-->
            {if isset($error_password_length)}
            {if $error_password_length == 'length'}
            <p class="error">*パスワードは4文字以上にしてください</p>
            {/if}
            {/if}

            <!--パスワードが入力されていない場合、エラーメッセージを出力-->
            {if isset($error_password_blank)}
                {if $error_password_blank == 'blank'}
            <p class="error">*パスワードを設定してください</p>
            {/if}
            {/if}
        </dd>

    </dl>
    <div><input type="submit" value="入力内容を確認する"></div>
</form>
</body>
</html>