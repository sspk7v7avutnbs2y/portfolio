<?php
/* Smarty version 4.3.2, created on 2023-12-07 10:57:19
  from '/var/www/html/projectEx/html/importJson.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6571267fab9bb3_40497376',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '223328ca2be80551de8cec6eb68d3c4c60eef7fe' => 
    array (
      0 => '/var/www/html/projectEx/html/importJson.html',
      1 => 1701914182,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.html' => 1,
    'file:tail.html' => 1,
  ),
),false)) {
function content_6571267fab9bb3_40497376 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:head.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo $_smarty_tpl->tpl_vars['result']->value;?>

<form class="m-5" action="../php/importJson.php" method="POST" enctype="multipart/form-data">
    <div>
        <label for="json" class="form-label">Jsonファイル</label>
        <input type="file" name="json">
    </div>    
    <input class="btn btn-success" type="submit" value="Upload">
</form>
<?php $_smarty_tpl->_subTemplateRender('file:tail.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
