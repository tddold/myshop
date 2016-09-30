<?php
/* Smarty version 3.1.30, created on 2016-09-30 11:11:24
  from "D:\xampp\htdocs\myshop\views\default\header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57ee2c3ca85a43_49656449',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '38ccaccf2f74a48cf6c89b3e8653336001b4ef5f' => 
    array (
      0 => 'D:\\xampp\\htdocs\\myshop\\views\\default\\header.tpl',
      1 => 1475226681,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:leftcolumn.tpl' => 1,
  ),
),false)) {
function content_57ee2c3ca85a43_49656449 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
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
 src="../../js/main.js" type="text/javascript"><?php echo '</script'; ?>
>
    </head>
    <body>
        <div id="header">
            <h1>my shop - магазин</h1>
        </div>
        <div id='container'>
            <?php $_smarty_tpl->_subTemplateRender("file:leftcolumn.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


            <div id="centerColumn"><?php }
}
