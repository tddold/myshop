<?php
/* Smarty version 3.1.30, created on 2016-10-05 17:34:40
  from "D:\xampp\htdocs\myshop\views\admin\adminHeader.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57f51d9035a986_04741045',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '454792ab593db47e46eba52fb4e7a53e59271be6' => 
    array (
      0 => 'D:\\xampp\\htdocs\\myshop\\views\\admin\\adminHeader.tpl',
      1 => 1475681677,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:adminLeftColumn.tpl' => 1,
  ),
),false)) {
function content_57f51d9035a986_04741045 (Smarty_Internal_Template $_smarty_tpl) {
?>



<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/main.css" type="text/css">
        <?php echo '<script'; ?>
 src="../../js/jquery-3.1.1.js" type="text/javascript"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
js/admin.js" type="text/javascript"><?php echo '</script'; ?>
>
    </head>

    <body>
        <div id="header">
            <h1>Администрация на сайта</h1>
        </div>
        <?php $_smarty_tpl->_subTemplateRender("file:adminLeftColumn.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        
        <div id='centerColumn'>

<?php }
}
