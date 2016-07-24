<?php
/* Smarty version 3.1.28, created on 2016-07-24 10:34:54
  from "C:\xampp\htdocs\techaca2\board2\join.index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_57947dae76b396_23696956',
  'file_dependency' => 
  array (
    'b83b4be21ed2f4bc2f9c13c6d8488dde8917caad' => 
    array (
      0 => 'C:\\xampp\\htdocs\\techaca2\\board2\\join.index.tpl',
      1 => 1469349281,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57947dae76b396_23696956 ($_smarty_tpl) {
?>
<html>
<head>
    <meta charset="utf-8">
    <title>会員登録</title>
</head>
<body>

<!--入力フォームを作成-->
<!--エラー項目をユーザーに知らせる-->
<p>次のフォームに必要事項をご記入ください。</p>
<form method="post" action=''>
    <dl>
        <dt>お名前<span class="required">【必須】</span></dt>
        <dd><input type="text" name="name" size="35" maxlength="255">


            <!--名前が入力されていない場合、エラーメッセージを出力-->
            <?php if (isset($_smarty_tpl->tpl_vars['error_name']->value)) {?>
                <?php if ($_smarty_tpl->tpl_vars['error_name']->value == 'blank') {?>
                    　<p class="error">*お名前を入力してください</p>
                <?php }?>　
            <?php }?>
        </dd>

        <br>

        <dt>ユーザID<span class="required">【必須】</span></dt>
        <dd><input type="text" name="user_id" size="20" maxlength="45">
            <!--ユーザーIDが入力されていない場合、エラーメッセージを出力-->

            　<?php if (isset($_smarty_tpl->tpl_vars['error_user_id_blank']->value)) {?>
            <?php if ($_smarty_tpl->tpl_vars['error_user_id_blank']->value == 'blank') {?>
                <p class="error">*ユーザーIDを入力してください</p>
            <?php }?>
            <?php }?>

            <?php if (isset($_smarty_tpl->tpl_vars['error_user_id_duplicate']->value)) {?>
                <?php if ($_smarty_tpl->tpl_vars['error_user_id_duplicate']->value == 'duplicate') {?>
                    <p class="error">指定されたユーザーIDはすでに登録されています</p>
                <?php }?>
            <?php }?>
        </dd>

        <br>

        <dt>パスワード<span class="required">【必須】</span></dt>
        <dd><input type="password" name="password" size="10" maxlength="35">

            <!--パスワードが4文字以上でない場合、エラーメッセージを出力-->
            <?php if (isset($_smarty_tpl->tpl_vars['error_password_length']->value)) {?>
                <?php if ($_smarty_tpl->tpl_vars['error_password_length']->value == 'length') {?>
                    <p class="error">*パスワードは4文字以上にしてください</p>
                <?php }?>
            <?php }?>

            <!--パスワードが入力されていない場合、エラーメッセージを出力-->
            <?php if (isset($_smarty_tpl->tpl_vars['error_password_blank']->value)) {?>
                <?php if ($_smarty_tpl->tpl_vars['error_password_blank']->value == 'blank') {?>
                    <p class="error">*パスワードを設定してください</p>
                <?php }?>
            <?php }?>
        </dd>

    </dl>
    <div><input type="submit" value="入力内容を確認する"></div>
</form>
</body>
</html><?php }
}
