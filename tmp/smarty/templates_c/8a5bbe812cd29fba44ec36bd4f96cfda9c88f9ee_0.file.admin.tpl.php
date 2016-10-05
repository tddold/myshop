<?php
/* Smarty version 3.1.30, created on 2016-10-05 17:36:55
  from "D:\xampp\htdocs\myshop\views\admin\admin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57f51e17cd5c63_71749764',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8a5bbe812cd29fba44ec36bd4f96cfda9c88f9ee' => 
    array (
      0 => 'D:\\xampp\\htdocs\\myshop\\views\\admin\\admin.tpl',
      1 => 1475681812,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57f51e17cd5c63_71749764 (Smarty_Internal_Template $_smarty_tpl) {
?>


<div id="blockNewCategory">
    Нова категория
    <input name="newCategoryName" id="newCategoryName" type="text" value=""/>
    <br/>

    Подкатегория на
    <select name="generalCatId">
        <option value="0">
            Главна категория
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


        </option>
    </select>
    <br/>
    <input type="button" onclick="newCategory();" value="Нова категория"/>
</div><?php }
}
