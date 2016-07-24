<?php

require_once 'Smarty.class.php';

$smarty = new Smarty;
$smarty ->assign('name', '桃太郎');
$smarty ->display('./hoge.tpl');