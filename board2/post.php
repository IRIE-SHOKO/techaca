<?php

try {session_start();
    
    require_once 'MySmartyClass.php';
    require_once 'dbconnect.php';

    //セッション情報からmembersテーブルのIDとユーザーIDを取り出し変数に格納
    $id = $_SESSION['id'];
    $user_id = $_SESSION['user_id'];

    $smarty->assign('id', $id);
    $smarty->assign('user_id', $user_id);

    
    if (isset($_POST['contents'])) {
        //データベースへの接続を確立
        $db = getDb();

        // {投稿が空白になっていないか確認
        if ($_POST['contents'] !== "") {
            $stt = $db->prepare('INSERT INTO post (contents, user_id) VALUES (:contents, :user_id)');

            //INSERT命令にポストデータとmemberテーブルのIDの内容をセット
            $stt->bindValue(':contents', $_POST['contents']);
            $stt->bindValue(':user_id', $id);
            $stt->execute();

        } else echo '*メッセージを入力してください';

    }

    //ログイン状態であるか確認
    if (isset($id) && isset($user_id)) {
        //ログインしている
        //データベースへの接続を確立
        $db = getDb();
        $sql = $db->prepare("SELECT * FROM members WHERE user_id = '$user_id'");
        $sql->execute();
        //$members = $sql->fetch(PDO::FETCH_ASSOC);

        //memberテーブルとpostテーブルを内部結合
        //postのID、投稿内容、名前、postのユーザIDを選択
        $join = $db->prepare('SELECT post.id as post_id, contents, name, post.user_id as post_user_id
            FROM post INNER JOIN members ON post.user_id = members.id ORDER BY post.id DESC');
        $join->execute();


        //配列を定義し、初期化
        $items_list = array();
        while ($row = $join->fetch(PDO::FETCH_ASSOC)) {
                $items_list[] = array('post_id' => $row['post_id'], 'name' => $row['name'],
                'contents' => $row['contents'], 'post_user_id' => $row['post_user_id']);
        }

        $smarty->assign('items', $items_list);


    }else {
            //ログインしていない
            header('Location: login.php');
            exit();
        }
    


} catch (PDOException $e){
  die("エラーメッセージ:{$e->getMessage()}");
  }

$smarty->display('post.tpl');