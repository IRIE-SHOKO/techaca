<html>
<head>
    <meta charset="utf-8">
    <title>会員登録</title>
</head>
<body>
<?php
session_start();
//データベースに接続
require_once 'dbconnect.php';

try {
     //データベースへの接続を確立
     $db = getDb();

    //POSTしたものを受け取り、それぞれの関数に格納
    if (isset($_POST['name']) && isset($_POST['user_id']) && isset($_POST['password'])) {
        $name = $_POST['name'];
        $user_id = $_POST['user_id'];
        $password = $_POST['password'];
        //フォームが送信されているか確認
        //送信されている場合、次の処理に進む
        if (!empty($_POST)) {
            //送信されていた場合、それぞれのフォーム欄が空白になっていないか、パスワードは4文字以上か確認
            if ($name == '') {
                $error['name'] = 'blank';
            }
            if ($user_id == '') {
                $error['user_id'] = 'blank';
            }
            if (strlen($password) < 4) {
                $error['password'] = 'length';
            }
            if ($password == '') {
                $error['password'] = 'blank';
            }

            //ユーザーIDが重複していないか確認
            if (empty($error)) {
                $result = $db->prepare("SELECT user_id FROM members WHERE user_id = '$user_id'");
                $result->execute();
                //選択された行数を返す
                $count = $result->rowCount();
                if ($count > 0){
                $error['user_id'] = 'duplicate';
                }
            }

            //エラー項目がない場合、セッション情報をcheck.phpに送信
            if (empty($error)) {
                $_SESSION['join'] = $_POST;
                $_SESSION['name'] = $name;
                $_SESSION['user_id'] = $user_id;
                $_SESSION['password'] = $password;
                header('Location: check.php');
                exit();
            }
        }
    }
}catch (PDOException $e){
 die("エラーメッセージ:{$e->getMessage()}");
 }
?>

<!--入力フォームを作成-->
<!--入力内容を常に再現-->
<!--エラー項目をユーザーに知らせる-->
<p>次のフォームに必要事項をご記入ください。</p>
<form method="post" action=''>
    <dl>
        <dt>お名前<span class="required">【必須】</span></dt>
        <dd><input type="text" name="name" size="35" maxlength="255"
                   value="<?php if(isset($name)){
                       echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
                   }?>"/>

            <!--名前が入力されていない場合、エラーメッセージを出力-->
            <?php if (isset($error['name'])){
                if($error['name'] == 'blank') :?>
                    　<p class="error">*お名前を入力してください</p>
                    　<?PHP endif;} ?>
        </dd>

        <br>

        <dt>ユーザID<span class="required">【必須】</span></dt>
        <dd><input type="text" name="user_id" size="20" maxlength="45"
                   value="<?php if(isset($user_id)){
                       echo htmlspecialchars($user_id, ENT_QUOTES, 'UTF-8');
                   }?>"/>
<!--ユーザーIDが入力されていない場合、エラーメッセージを出力-->
            　<?php if (isset($error['user_id'])){
                if ($error['user_id'] == 'blank') :?>
                    <p class="error">*ユーザーIDを入力してください</p>
                <?PHP endif;} ?>

            <?php if (isset($error['user_id'])){
                if($error['user_id'] == 'duplicate') :?>
            <p class="error">指定されたユーザーIDはすでに登録されています</p>
            <?php endif;} ?>
        </dd>

        <br>

        <dt>パスワード<span class="required">【必須】</span></dt>
        <dd><input type="password" name="password" size="10" maxlength="35"
                   value="<?php if(isset($password)){
                       echo htmlspecialchars($password, ENT_QUOTES, 'UTF-8');
                   }?>"/>

<!--パスワードが4文字以上でない場合、エラーメッセージを出力-->
            <?php if (isset($error['password']))
            {if ($error['password'] == 'length') :?>
                　<p class="error">*パスワードは4文字以上にしてください</p>
                　<?PHP endif;} ?>

<!--パスワードが入力されていない場合、エラーメッセージを出力-->
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