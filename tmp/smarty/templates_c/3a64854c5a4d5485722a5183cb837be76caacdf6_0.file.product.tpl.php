<?php
/* Smarty version 3.1.30, created on 2016-10-01 16:45:41
  from "D:\xampp\htdocs\myshop\views\default\product.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57efcc15264987_23925463',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a64854c5a4d5485722a5183cb837be76caacdf6' => 
    array (
      0 => 'D:\\xampp\\htdocs\\myshop\\views\\default\\product.tpl',
      1 => 1475333139,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57efcc15264987_23925463 (Smarty_Internal_Template $_smarty_tpl) {
?>

<h3><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value[0]['name'];?>
</h3>

<img width="575" src="/images/products/<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value[0]['image'];?>
"/>
<br/>
Цена: <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value[0]['price'];?>

<br/>

<a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value[0]['id'];?>
" <?php if (!$_smarty_tpl->tpl_vars['itemInCart']->value) {?>class="hideme"<?php }?> href="#" onClick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value[0]['id'];?>
);
        return false;" alt='Remove from cart'>Remove from cart</a>
<a id="addCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value[0]['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['itemInCart']->value) {?>class="hideme"<?php }?> href="#" onClick="addToCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value[0]['id'];?>
); return false;" alt='Add to cart'>Add to cart</a>
<p>Описание: <br /><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value[0]['description'];?>
</p>
<?php }
}
