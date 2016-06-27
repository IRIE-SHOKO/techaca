<?php
require_once 'DbManager.php';

try {
    //データベースへの絶族を確立
    $db = getDb();
    //INSERT命令の準備

    $stt = $db->prepare('INSERT INTO board ("name", "contents") VALUES(":name", ":contents")');
    //INSERT命令にポストデータの内容をセット
    $stt->bindValue(':name', $_POST['name']);
    $stt->bindValue(':contents', $_POST['contents']);
    $db = NULL;
}   catch (PDOException $e){
    die("エラーメッセージ:{$e->getMessage()}");

}

//heade('Location: localhost/'.$_SERVER['HTTP_HOST'])
    //.dirname($_SERVER['PHP_SELF']).'/insert_form.php';