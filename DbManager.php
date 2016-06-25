<?php
function getDb(){
    $dsn = 'mysql:dbname=board;host=127.0.0.1';
    $usr = 'root';
    $passwd = '224335Eri';
    try {
        //データベースへの接続を設立
        $db = new PDO($dsn, $usr, $passwd);
        //データベース接続時に使用する文字コードをutf8に設定
        $db->exec('SET NAMES utf8');
    }catch (PDOException $e){
     die("接続エラー:{$e->getMessage()}");
    }
    return $db;
}