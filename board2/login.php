<?php
try {
require_once 'dbconnect.php';

session_start();

    //データベースへの接続を確立
    $db = getDb();

    //POSTしたものを受け取り、それぞれの関数に格納
    if (isset($_POST['user_id']) && isset($_POST['password'])){
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];

        //フォームが送信されているか確認
        //送信されている場合、次の処理に進む
        if($user_id !== "" && $password !== ""){

            //ログインの処理
            $stt = $db->prepare("SELECT * FROM members WHERE user_id = '$user_id' AND password = '$password'");
            $stt->execute();
                //ログイン成功
                if($row = $stt->fetch(PDO::FETCH_ASSOC)) {
                    //ユーザIDとmembersのIDをセッション情報で渡す
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['id'] = $row['id'];
                    header('Location: post.php');
                    exit();
                }
                else{
                     //ログイン失敗
                     $errors['login'] = 'failed';
                };
        }
        //ユーザーIDとパスワードのフィールドがどちらも入力されているか確認
        else{//ログイン失敗
              $errors['login'] = 'blank';
             };
    }
}   catch (PDOException $e){
    die("エラーメッセージ:{$e->getMessage()}");
    };
?>


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

<form action="" method="post">
    <dl>
        <?php if(isset($errors['login'])){if ($errors['login'] == 'blank') :?>
        <p class="errors">*メールアドレスとパスワードをご記入ください</p>
        <?php endif;}?>
    <dt>ユーザーID</dt>
    <dd>
        <input type="text" name="user_id" size="35" maxlength="255"
        value="<?php if(isset($user_id)){echo htmlspecialchars($user_id);}?>"/>
        <?php if(isset($errors['login'])){if($errors['login'] == 'failed') :?>
            <p class="errors">ログインに失敗しました。正しくご記入ください</p>
        <?php endif;}?>
    </dd>

<br>

    <dt>パスワード</dt>
    <dd>
        <input type="password" name="password" size="35" maxlength="255"
        value="<?php if(isset($password)){echo htmlspecialchars($password);}?>"/>
    </dd>
    </dl>

<div><input type="submit" value="ログインする"></div>
</form>
</body>
</html>