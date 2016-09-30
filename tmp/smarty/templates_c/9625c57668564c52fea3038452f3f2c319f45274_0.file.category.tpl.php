<?php
/* Smarty version 3.1.30, created on 2016-09-29 15:32:06
  from "D:\xampp\htdocs\myshop\views\default\category.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57ed17d6b91019_33369090',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9625c57668564c52fea3038452f3f2c319f45274' => 
    array (
      0 => 'D:\\xampp\\htdocs\\myshop\\views\\default\\category.tpl',
      1 => 1475155918,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57ed17d6b91019_33369090 (Smarty_Internal_Template $_smarty_tpl) {
?>

<h1>Продукти в категория <?php echo $_smarty_tpl->tpl_vars['rsCategory']->value['name'];?>
</h1>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
    <div style="float: left; padding: 0px 30px 40px 0px">
        <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/">
            <img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" width='100'/>
        </a><br/>
        <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
    </div>

    <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null) % 3 == 0) {?>
        <div style="clear: both"></div>
    <?php }?>

<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsChildCats']->value, 'item', false, NULL, 'childCats', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
        <h2><a href="/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></h2>
        <?php
}
} else {
?>

    <div >
        Липсват продукти в тази категория!
    </div>
       <br/>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
}
}
