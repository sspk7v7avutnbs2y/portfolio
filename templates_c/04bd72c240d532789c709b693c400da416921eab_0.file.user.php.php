<?php
/* Smarty version 4.3.2, created on 2023-12-17 10:45:38
  from '/var/www/html/projectEx/php/user.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_657e52c2a26e93_06763052',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '04bd72c240d532789c709b693c400da416921eab' => 
    array (
      0 => '/var/www/html/projectEx/php/user.php',
      1 => 1702609547,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_657e52c2a26e93_06763052 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php'; ?>

// user.php
include 'smarty.php';
include 'db.php';
include 'logInCheck.php';


// セッション変数からユーザ情報を取得
$userID = $s_user_id;
$username = $s_name;

// Smartyに変数をアサイン
$smarty->assign('username', $username);

// テンプレートを表示
$smarty->display('user.html');
<?php echo '?>'; ?>

<?php }
}
