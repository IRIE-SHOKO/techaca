<?php
require 'MySmarty.class.php';
try{session_start();
//データベースに接続する
    require_once 'dbconnect.php';

    //直接check.phpが呼び出された場合は、登録画面("index.php")に移動させる。
    if (!isset($_SESSION['join'])){
   header('Location: join.index.php');
   exit();
   }    else {
        $db = getDb();

        //セッション情報をcheck.tplに渡す
        $smarty->assign('session_name', $_SESSION['join']['name']);
        $smarty->assign('session_user_id', $_SESSION['join']['user_id']);
        
        //$_POSTの中身が空ではない場合、セッション情報をデータベースに登録する
        $stt = $db->prepare('INSERT INTO members (name, user_id, password) VALUES(:name, :user_id, :password)');
        $stt->bindValue(':name', $_SESSION['join']['name']);
        $stt->bindValue(':user_id', $_SESSION['join']['user_id']);
        $stt->bindValue(':password', $_SESSION['join']['password']);
        $stt->execute();
        }
}       catch (PDOException $e){
        die("エラーメッセージ:{$e->getMessage()}");
        }

$smarty->display('check.tpl');