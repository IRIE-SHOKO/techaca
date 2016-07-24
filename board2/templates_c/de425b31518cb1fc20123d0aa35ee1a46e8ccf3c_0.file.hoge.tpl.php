<?php
/* Smarty version 3.1.28, created on 2016-07-23 14:58:55
  from "C:\xampp\htdocs\techaca2\board2\hoge.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_57936a0f22c951_24186193',
  'file_dependency' => 
  array (
    'de425b31518cb1fc20123d0aa35ee1a46e8ccf3c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\techaca2\\board2\\hoge.tpl',
      1 => 1469278731,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57936a0f22c951_24186193 ($_smarty_tpl) {
?>
<html>
<head>
    <title>Smartyのテスト</title>
</head>
<body>
    <?php
$_from = $_smarty_tpl->tpl_vars['items']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_i_0_saved_item = isset($_smarty_tpl->tpl_vars['i']) ? $_smarty_tpl->tpl_vars['i'] : false;
$__foreach_i_0_saved_key = isset($_smarty_tpl->tpl_vars['myId']) ? $_smarty_tpl->tpl_vars['myId'] : false;
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable();
$__foreach_i_0_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_i_0_total) {
$_smarty_tpl->tpl_vars['myId'] = new Smarty_Variable();
foreach ($_from as $_smarty_tpl->tpl_vars['myId']->value => $_smarty_tpl->tpl_vars['i']->value) {
$__foreach_i_0_saved_local_item = $_smarty_tpl->tpl_vars['i'];
?>
       <?php echo $_smarty_tpl->tpl_vars['i']->value['name'];?>

        <br>
       <?php echo $_smarty_tpl->tpl_vars['i']->value['contents'];?>

        <br>
    <?php
$_smarty_tpl->tpl_vars['i'] = $__foreach_i_0_saved_local_item;
}
}
if ($__foreach_i_0_saved_item) {
$_smarty_tpl->tpl_vars['i'] = $__foreach_i_0_saved_item;
}
if ($__foreach_i_0_saved_key) {
$_smarty_tpl->tpl_vars['myId'] = $__foreach_i_0_saved_key;
}
?>

</body>
</html><?php }
}
