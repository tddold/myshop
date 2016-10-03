<?php
/* Smarty version 3.1.30, created on 2016-10-03 16:21:39
  from "D:\xampp\htdocs\myshop\views\default\user.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57f2697331df98_09286381',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e4f5c66ad6290936a89514abb2ff0549beef3a1d' => 
    array (
      0 => 'D:\\xampp\\htdocs\\myshop\\views\\default\\user.tpl',
      1 => 1475504490,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57f2697331df98_09286381 (Smarty_Internal_Template $_smarty_tpl) {
?>


<h1>Ваште регистрационни данни:</h1>
<table border="0">
    <tr>
        <td>Вход (email)</td>
        <td><?php echo $_smarty_tpl->tpl_vars['arUser']->value['email'];?>
</td>
    </tr>
    <tr>
        <td>Име</td>
        <td><input type="text" id="newName" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['name'];?>
"/></td>
    </tr>
    <tr>
        <td>Тел</td>
        <td><input type="text" id="newPhone" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['phone'];?>
"/></td>
    </tr>
    <tr>
        <td>Адрес</td>
        <td><textarea id="newAdress"><?php echo $_smarty_tpl->tpl_vars['arUser']->value['adress'];?>
</textarea></td>
    </tr>
    <tr>
        <td>Нова парола</td>
        <td><input type="password" id="newPwd1" value=""/></td>
    </tr>
    <tr>
        <td>Повтори парола</td>
        <td><input type="password" id="newPwd2" value=""/></td>
    </tr>
    <tr>
        <td>За да запомните данните въведете текущата парола</td>
        <td><input type="password" id="curPwd" value=""/></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><input type="button" id="newPwd2" value="Запамети промените" onclick="updateUserData();"/></td>
    </tr>
</table><?php }
}
