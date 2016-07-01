<?php
require_once 'DbManager.php';

try {
    //データベースへの接続を確立
    $db = getDb();
    //INSERT命令の準備
    $stt = $db->prepare('INSERT INTO builtinboard (name, contents) VALUES(:name, :contents)');
    //INSERT命令にポストデータの内容をセット
    $stt->bindValue(':name', $_POST['name']);
    $stt->bindValue(':contents', $_POST['contents']);
    //実行
    $stt->execute();

    $result= $db->prepare('SELECT * from builtinboard ORDER BY id DESC');
    $result->execute();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                echo "名前：";
                echo $row['name'];
                echo"<br>";
                echo $row['contents'];
                echo"<br>";
                echo"<br>";
        };

}   catch (PDOException $e){
    die("エラーメッセージ:{$e->getMessage()}");
    }

