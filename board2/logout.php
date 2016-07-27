<?php
require_once 'MySmartyClass.php';
session_start();

require_once 'dbconnect.php';
//セッション情報を破棄する
$_SESSION['user_id'] = array();
$_SESSION['id'] = array();
session_destroy();

$smarty->display('logout.tpl');
