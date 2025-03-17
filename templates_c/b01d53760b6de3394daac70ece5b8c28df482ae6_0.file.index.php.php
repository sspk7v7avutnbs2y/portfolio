<?php
/* Smarty version 4.3.2, created on 2023-12-17 10:46:07
  from '/var/www/html/projectEx/php/index.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_657e52df7c40f1_48850055',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b01d53760b6de3394daac70ece5b8c28df482ae6' => 
    array (
      0 => '/var/www/html/projectEx/php/index.php',
      1 => 1702538087,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_657e52df7c40f1_48850055 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php'; ?>

    include 'smarty.php';
    include 'logInCheck.php';

    header('Location:../php/user.php');
<?php echo '?>'; ?>


<?php }
}
