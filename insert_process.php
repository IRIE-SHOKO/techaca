<?php
require_once 'DbManager.php';

try {
    //データベースへの絶族を確立
    $db = getDb();
    //INSERT命令の準備

    $stt = $db->prepare('INSERT INTO builtinboard ("name", "contents") VALUES(":name", ":contents")');
    //INSERT命令にポストデータの内容をセット
    $stt->bindValue(':name', $_POST['name']);
    $stt->bindValue(':contents', $_POST['contents']);
    //実行
    $stt->execute();

    $result= $db->prepare('SELECT * from builtinboard ORDER BY id DESC');
    $result->execute();

        while ($row = $stt->fetch(PDO::FETCH_ASSOC)){
                echo $row['name'];
                echo"<br>";
                echo $row['contents'];
                echo"<br><br>";
        };

}   catch (PDOException $e){
    die("エラーメッセージ:{$e->getMessage()}");
    }

//heade('Location: localhost/'.$_SERVER['HTTP_HOST'])
    //.dirname($_SERVER['PHP_SELF']).'/insert_form.php';