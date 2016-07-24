<?php

require(dirname(__FILE__) . '/libs/Smarty.class.php');

$smarty = new Smarty();

$smarty->template_dir = '../templates';
$smarty->compile_dir  = '../templates_c';