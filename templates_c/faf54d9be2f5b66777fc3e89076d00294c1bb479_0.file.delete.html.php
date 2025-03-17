<?php
/* Smarty version 4.3.2, created on 2024-02-05 10:30:09
  from '/var/www/html/projectEx/html/delete.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_65c03a21aad986_92630037',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'faf54d9be2f5b66777fc3e89076d00294c1bb479' => 
    array (
      0 => '/var/www/html/projectEx/html/delete.html',
      1 => 1707096565,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65c03a21aad986_92630037 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
    </head>

    <body>
        <p><a href="../php/user.php">ユーザー画面トップへ</a></p>
        <p><a href="../php/archive.php">入力履歴に戻る</a></p>
        <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

    </body>
</html><?php }
}
