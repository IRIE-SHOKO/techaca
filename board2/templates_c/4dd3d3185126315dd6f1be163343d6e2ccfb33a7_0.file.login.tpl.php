<?php
/* Smarty version 3.1.28, created on 2016-07-27 11:30:45
  from "C:\xampp\htdocs\techaca2\board2\login.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_57987f45434c63_12759932',
  'file_dependency' => 
  array (
    '4dd3d3185126315dd6f1be163343d6e2ccfb33a7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\techaca2\\board2\\login.tpl',
      1 => 1469611839,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57987f45434c63_12759932 ($_smarty_tpl) {
?>
<html>
<head>
    <meta charset="utf-8">
    <title>ログイン画面</title>
</head>
<body>

<p>パスワードとユーザーIDを記入してログインしてください</p>
<p>会員登録がまだの方はこちらからどうぞ</p>
<form method="post" action="join.php">
    <p><input type="submit" value="会員登録をする"></p>
</form>

<!--ログインフォームを作成-->
<form action="login.php" method="post">
    <dl>
        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value)) {?>
            <?php if ($_smarty_tpl->tpl_vars['errors']->value == 'blank') {?>
            <p class="errors">*ユーザIDとパスワードをご記入ください</p>
            <?php }?>
        <?php }?>

        <dt>ユーザーID</dt>
        <dd>
            <input type="text" name="user_id" size="35" maxlength="255"
                   value="<?php if (isset($_smarty_tpl->tpl_vars['user_id']->value)) {?>echo htmlspecialchars(<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
);<?php }?>">

            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value)) {?>
                <?php if ($_smarty_tpl->tpl_vars['errors']->value == 'failed') {?>
                <p class="errors">ログインに失敗しました。正しくご記入ください</p>
                <?php }?>
            <?php }?>
        </dd>

        <br>

        <dt>パスワード</dt>
        <dd>
            <input type="password" name="password" size="35" maxlength="255"
                   value="<?php if (isset($_smarty_tpl->tpl_vars['password']->value)) {?>echo htmlspecialchars(<?php echo $_smarty_tpl->tpl_vars['password']->value;?>
);<?php }?>">
        </dd>
    </dl>

    <div><input type="submit" value="ログインする"></div>
</form>
</body>
</html><?php }
}
