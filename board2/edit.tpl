<html>
<head>
    <meta charset="utf-8">
    <title>編集画面</title>
</head>
<body>

{*membersテーブルのIDとpostテーブルのユーザIDが一致するか確認し、ユーザ認証*}
{if $id == $post_user_id}
<form method="post" action="update.php">
    <p>編集したい内容をどうぞ！</p>
    <input type="message" name="contents" size="75" maxlength="300">
    <input type="hidden" name="id" value={$id}>
    <input type="hidden" name="post_id" value={$post_id}>
    <input type="hidden" name="user_id" value={$user_id}>
    <input type="submit" value="編集する">
</form>
{else}この投稿をした方以外は削除できません
{/if}
</body>
</html>