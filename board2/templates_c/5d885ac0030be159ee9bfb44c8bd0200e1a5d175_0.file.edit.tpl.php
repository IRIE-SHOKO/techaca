<?php
/* Smarty version 3.1.28, created on 2016-07-24 04:33:06
  from "C:\xampp\htdocs\techaca2\board2\edit.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_579428e20bd783_79038292',
  'file_dependency' => 
  array (
    '5d885ac0030be159ee9bfb44c8bd0200e1a5d175' => 
    array (
      0 => 'C:\\xampp\\htdocs\\techaca2\\board2\\edit.tpl',
      1 => 1469327553,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_579428e20bd783_79038292 ($_smarty_tpl) {
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
