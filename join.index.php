<html>
<head>
    <meta charset="utf-8">
    <title>会員登録</title>
</head>
<body>
<?php
session_start();

//POSTしたものを受け取る
if(isset($_POST["name"]) && isset($_POST["id"]) && isset($_POST["password"])) {
    $name = $_POST["name"];
    $id = $_POST["id"];
    $password = $_POST["password"];

//フォームが送信されているか確認
//送信されている場合、次の処理に進む
    if (!empty($_POST)) {
            //送信されていた場合のエラー項目の確認
            if ($name == '') {
                $error['name'] = 'blank';
            }
            if ($id == '') {
                $error['id'] = 'blank';
            }
            if (strlen($id) < 4) {
                $error['password'] = 'length';
            }
            if ($password == '') {
                $error['password'] = 'blank';
            }
            if (empty($error)) {
                $_SESSION['join'] = $_POST;
                header('Location: check.php');
                exit();
            }
    }
}
?>

<!--入力フォームを作成-->
<p>次のフォームに必要事項をご記入ください。</p>
<form method="post" action="">
        <dl>
            <dt>お名前<span class="required">【必須】</span></dt>
            <dd><input type="text" name="name" size="35" maxlength="255"
                 value="<?php if(isset($name)){
                 echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
                 }?>"/>

            <?php if (isset($error['name'])){
                if ($error['name'] == 'blank') :?>
                <p class="error">*お名前を入力してください</p>
                <?PHP endif;} ?>
            </dd>
<br>
            <dt>ユーザID<span class="required">【必須】</span></dt>
            <dd><input type="text" name="id" size="20" maxlength="45"
                 value="<?php if(isset($id)){
                 echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8');
                 }?>"/>

            <?php if (isset($error['id'])){
                 if ($error['id'] == 'blank') :?>
                 <p class="error">*ユーザーIDを入力してください</p>
                 <?PHP endif;} ?>
            </dd>
<br>
            <dt>パスワード<span class="required">【必須】</span></dt>
            <dd><input type="password" name="password" size="10" maxlength="35"
                 value="<?php if(isset($password)){
                 echo htmlspecialchars($password, ENT_QUOTES, 'UTF-8');
                 }?>"/>

                <?php if (isset($error['password'])){
                    if ($error['password'] == 'length') :?>
                        <p class="error">*パスワードは4文字以上にしてください</p>
                    <?PHP endif;} ?>
                <?php if (isset($error['password'])){
                    if ($error['password'] == 'blank') :?>
                        <p class="error">*パスワードを設定してください</p>
                    <?PHP endif;} ?>
            </dd>
        </dl>
    <div><input type="submit" value="入力内容を確認する"></div>
</form>
</body>
</html>