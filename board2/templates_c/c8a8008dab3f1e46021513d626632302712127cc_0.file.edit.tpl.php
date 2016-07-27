<?php
/* Smarty version 3.1.28, created on 2016-07-27 11:57:13
  from "C:\xampp\htdocs\techaca2\board2\templates\edit.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_579885794683c2_41614478',
  'file_dependency' => 
  array (
    'c8a8008dab3f1e46021513d626632302712127cc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\techaca2\\board2\\templates\\edit.tpl',
      1 => 1469613076,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_579885794683c2_41614478 ($_smarty_tpl) {
?>
<html>
<head>
    <meta charset="utf-8">
    <title>編集画面</title>
</head>
<body>


<?php if ($_smarty_tpl->tpl_vars['id']->value == $_smarty_tpl->tpl_vars['post_user_id']->value) {?>
<form method="post" action="update.php">
    <p>編集したい内容をどうぞ！</p>
    <input type="message" name="contents" size="75" maxlength="300">
    <input type="hidden" name="id" value=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
>
    <input type="hidden" name="post_id" value=<?php echo $_smarty_tpl->tpl_vars['post_id']->value;?>
>
    <input type="hidden" name="user_id" value=<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
>
    <input type="submit" value="編集する">
</form>
<?php } else { ?>この投稿をした方以外は削除できません
<?php }?>
</body>
</html><?php }
}
