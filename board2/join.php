<?php
try {session_start();
    //データベースに接続
    require_once 'MySmartyClass.php';
    require_once 'dbconnect.php';

    //データベースへの接続を確立
    $db = getDb();
    //POSTしたものを受け取り、それぞれの関数に格納
    if (isset($_POST['name']) && isset($_POST['user_id']) && isset($_POST['password'])) {
        $name = $_POST['name'];
        $user_id = $_POST['user_id'];
        $password = $_POST['password'];
        $smarty->assign('name', $name);
        $smarty->assign('user', $user_id);
        $smarty->assign('name', $password);

        //フォームが送信されているか確認
        //送信されている場合、次の処理に進む
        if (!empty($_POST)) {
            //送信されていた場合、それぞれのフォーム欄が空白になっていないか、パスワードは4文字以上か確認
            if ($name == '') {
                $error['name'] = 'blank';
                $smarty->assign('error_name', $error['name']);
            }
            if ($user_id == '') {
                $error['user_id'] = 'blank';
                $smarty->assign('error_user_id_blank', $error['user_id']);
            }
            if (strlen($password) < 4) {
                $error['password'] = 'length';
                $smarty->assign('error_password_length', $error['password']);
            }
            if ($password == '') {
                $error['password'] = 'blank';
                $smarty->assign('error_password_blank', $error['password']);
            }
            //ユーザーIDが重複していないか確認
            if (empty($error)) {
                $stt = $db->prepare("SELECT user_id FROM members WHERE user_id = '$user_id'");
                $stt->execute();
                //選択された行数を返す
                $count = $stt->rowCount();
                if ($count > 0){
                    $error['user_id'] = 'duplicate';
                    $smarty->assign('error_user_id_duplicate', $error['user_id']);
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

$smarty->display('join.tpl');