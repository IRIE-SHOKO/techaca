<?php
require_once 'MySmarty.class.php';

session_start();

require_once 'dbconnect.php';
//セッション情報を破棄する
$_SESSION['join'] = array();
session_destroy();

$smarty->display('thanks.tpl');
