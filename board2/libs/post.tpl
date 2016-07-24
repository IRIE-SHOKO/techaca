<html>
<head>
    <meta charset="UTF-8">
    <title>掲示板2</title>
</head>

<body>


<!--投稿フォームの作成-->
<table>

        <form method="post" action="../post.php">
            <p>メッセージをどうぞ！</p>
            <input type="message" name="contents" size="75" maxlength="300"></dd>
            <br>
            <br>
            <input type="submit" value="投稿する"></dd>
        </form>
    </td>

    <td>
        <form method="post" action="../logout.php">
            <p><input type="submit" value="ログアウトする"></p>
        </form>
    </td>
</table>

{if isset($id) && isset($user_id)}

            {foreach from=$items key=myId item=i}
                <br>
                {$i.name}
                <br>
                {$i.contents}
                <br>

                       {if $id == $i.post_user_id}
                        <table>
                        <td>
                        <form method="post" action="../delete.php">
                        <input type="hidden" name="id" value="{$id}">
                        <input type="hidden" name="post_id" value="{$i.post_id}">
                        <input type="hidden" name="user_id" value="{$user_id}">
                        <input type="submit" name="delete" value="削除する">
                        </form>
                        </td>

                        <td>
                        <form method="post" action="../edit.php">
                        <input type="hidden" name="id" value="{$id}">
                        <input type="hidden" name="post_id" value="{$i.post_id}">
                        <input type="hidden" name="user_id" value="{$user_id}">
                        <input type="submit" name="edit" value="編集する">
                        </form>
                        </td>
                        </table>
                        {/if}
            {/foreach}
{/if}

</body>
</html>
