<?php
/**
 * Created by PhpStorm.
 * User: shoko
 * Date: 2016/06/28
 * Time: 23:55
 */

require_once 'Smarty.class.php';

$smarty = new Smarty;
$smarty->assign('name','桃太郎');
$smarty->display('index.tpl');