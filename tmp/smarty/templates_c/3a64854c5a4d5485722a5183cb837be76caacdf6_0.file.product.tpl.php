<?php
/* Smarty version 3.1.30, created on 2016-09-30 00:24:03
  from "D:\xampp\htdocs\myshop\views\default\product.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57ed9483575b83_78796587',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a64854c5a4d5485722a5183cb837be76caacdf6' => 
    array (
      0 => 'D:\\xampp\\htdocs\\myshop\\views\\default\\product.tpl',
      1 => 1475187837,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57ed9483575b83_78796587 (Smarty_Internal_Template $_smarty_tpl) {
?>

<h3><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value[0]['name'];?>
</h3>

<img width="575" src="/images/products/<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value[0]['image'];?>
"/>
<br/>
Цена: <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value[0]['price'];?>

<br/>

<a id="addCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value[0]['id'];?>
" href="#" onClick="addToCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value[0]['id'];?>
);
        return false;" alt='Add to cart'>Add to cart</a>
<p>Описание: <br /><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value[0]['description'];?>
</p>
<?php }
}
