<?php
/* Smarty version 3.1.30, created on 2016-10-06 17:58:28
  from "D:\xampp\htdocs\myshop\views\admin\adminCategory.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57f674a4971628_86523246',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e8c1241383485f171f828be1d4d60655920b1cb3' => 
    array (
      0 => 'D:\\xampp\\htdocs\\myshop\\views\\admin\\adminCategory.tpl',
      1 => 1475769504,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57f674a4971628_86523246 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h2>Категории</h2>
<table>
    <tr>
        <th>N:</th>
        <th>ID</th>
        <th>Име</th>
        <th>Родителска категория</th>
        <th>Действие</th>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item', false, NULL, 'categories', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_categories']->value['iteration']++;
?>
        <tr>
            <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_categories']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_categories']->value['iteration'] : null);?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
            <td>
                <input type="edit" id="itemName_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"/>
            </td>
            <td>
                <select id="parentId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
                    <option value="0"/>
                        Главна категория
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsMainCategories']->value, 'mainItem');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mainItem']->value) {
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['mainItem']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['parent_id'] == $_smarty_tpl->tpl_vars['mainItem']->value['id']) {?> selected<?php }?>/><?php echo $_smarty_tpl->tpl_vars['mainItem']->value['name'];?>

                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


                </select>
            </td>
            <td>
                <input type="button" value="Запамети" onclick="updateCat(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);"/>
            </td>
        </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</table><?php }
}
