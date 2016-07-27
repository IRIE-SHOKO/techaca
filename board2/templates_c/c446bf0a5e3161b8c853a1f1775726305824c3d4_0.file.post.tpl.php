<?php
/* Smarty version 3.1.28, created on 2016-07-27 11:10:59
  from "C:\xampp\htdocs\techaca2\board2\post.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_57987aa35a8441_54686305',
  'file_dependency' => 
  array (
    'c446bf0a5e3161b8c853a1f1775726305824c3d4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\techaca2\\board2\\post.tpl',
      1 => 1469610656,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57987aa35a8441_54686305 ($_smarty_tpl) {
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>掲示板2</title>
</head>

<body>


<!--投稿フォームの作成-->
<table>

        <form method="post" action="post.php">
            <p>メッセージをどうぞ！</p>
            <input type="message" name="contents" size="75" maxlength="300"></dd>
            <br>
            <br>
            <input type="submit" value="投稿する"></dd>
        </form>
    </td>

    <td>
        <form method="post" action="logout.php">
            <p><input type="submit" value="ログアウトする"></p>
        </form>
    </td>
</table>

<?php if (isset($_smarty_tpl->tpl_vars['id']->value) && isset($_smarty_tpl->tpl_vars['user_id']->value)) {?>

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
                <br>
                <?php echo $_smarty_tpl->tpl_vars['i']->value['name'];?>

                <br>
                <?php echo $_smarty_tpl->tpl_vars['i']->value['contents'];?>

                <br>

                       <?php if ($_smarty_tpl->tpl_vars['id']->value == $_smarty_tpl->tpl_vars['i']->value['post_user_id']) {?>
                        <table>
                        <td>
                        <form method="post" action="delete.php">
                        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                        <input type="hidden" name="post_id" value="<?php echo $_smarty_tpl->tpl_vars['i']->value['post_id'];?>
">
                        <input type="hidden" name="user_id" value="<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
">
                        <input type="submit" name="delete" value="削除する">
                        </form>
                        </td>

                        <td>
                        <form method="post" action="edit.php">
                        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                        <input type="hidden" name="post_id" value="<?php echo $_smarty_tpl->tpl_vars['i']->value['post_id'];?>
">
                        <input type="hidden" name="user_id" value="<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
">
                        <input type="submit" name="edit" value="編集する">
                        </form>
                        </td>
                        </table>
                        <?php }?>
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
}?>

</body>
</html>
<?php }
}
