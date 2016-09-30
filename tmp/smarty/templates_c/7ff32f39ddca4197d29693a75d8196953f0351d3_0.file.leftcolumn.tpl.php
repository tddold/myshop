<?php
/* Smarty version 3.1.30, created on 2016-09-29 23:57:31
  from "D:\xampp\htdocs\myshop\views\default\leftcolumn.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57ed8e4b481747_23671802',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ff32f39ddca4197d29693a75d8196953f0351d3' => 
    array (
      0 => 'D:\\xampp\\htdocs\\myshop\\views\\default\\leftcolumn.tpl',
      1 => 1475185619,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57ed8e4b481747_23671802 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="leftCulumn">
    <div id="leftMenu">
        <div class="menuCaption">Меню:</div>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
            <a href="/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
            <br/>

            <?php if (isset($_smarty_tpl->tpl_vars['item']->value['children'])) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'itemChild');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->value) {
?>
                    --<a href="/category/<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a><br/>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <?php }?>

        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </div>

    <div class="menuCaption">Количка</div>
    <a hret="/cart/" title="Add to cat">В количкат</a>
    <span id="cartCntItems">
        <?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value > 0) {?>
            <?php echo $_smarty_tpl->tpl_vars['cartCntItems']->value;?>

        <?php } else { ?>
            празно
        <?php }?>
    </span>

</span>
</div> <?php }
}
