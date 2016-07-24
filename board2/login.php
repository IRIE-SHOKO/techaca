<?php
try {
require_once 'MySmarty.class.php';
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
            //打ち込んだユーザiDとパスワードを使用し、照合
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
                     $smarty->assign('errors', $errors['login']);
                };
        
        } //ユーザーIDとパスワードのフィールドがどちらも入力されているか確認
        else{//ログイン失敗
              $errors['login'] = 'blank';
              $smarty->assign('errors', $errors['login']);
             };
    }
}   catch (PDOException $e){
    die("エラーメッセージ:{$e->getMessage()}");
    };

$smarty->display('login.tpl');