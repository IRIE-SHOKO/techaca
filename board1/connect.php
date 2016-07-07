<?php
$dsn = 'mysql: dbname = board; host = 127.0.0.1';
$user = 'root';
$passwd = '224335Eri';

try{
    $db = new PDO($dsn, $user, $passwd);
    print '接続に成功しました。';
    $db = NULL;
}   catch (PDOException $e){
    die("接続エラー:{$e->getMessage()}");
}





