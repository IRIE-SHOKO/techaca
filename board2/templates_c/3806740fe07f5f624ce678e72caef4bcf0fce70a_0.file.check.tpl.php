<?php
/* Smarty version 3.1.28, created on 2016-07-20 07:33:50
  from "C:\xampp\htdocs\techaca2\board2\check.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_578f0d3eebb019_98295612',
  'file_dependency' => 
  array (
    '3806740fe07f5f624ce678e72caef4bcf0fce70a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\techaca2\\board2\\check.tpl',
      1 => 1468992813,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578f0d3eebb019_98295612 ($_smarty_tpl) {
?>
<html>
<head>
    <meta charset="utf-8">
    <title>登録内容確認</title>
</head>
<body>

<form action="thanks.php" method="post">
    <dl>
        <dt>ニックネーム</dt>
        <dd>
            <?php echo $_smarty_tpl->tpl_vars['session_name']->value;?>

        </dd>
        <br>
        <dt>ユーザーID</dt>
        <dd>
            <?php echo $_smarty_tpl->tpl_vars['session_user_id']->value;?>

        </dd>
        <br>
        <dt>パスワード</dt>
        <dd>
            【表示されません】
        </dd>
    </dl>
    <div><a href="join.index.php?action=rewrite">&laquo;&nbsp;書き直す</a>
        <input type="submit" value="登録する"></div>
</form>

</body>
</html>
<?php }
}
