<?php
/* Smarty version 3.1.30, created on 2016-10-10 00:41:45
  from "D:\xampp\htdocs\myshop\views\texturia\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57fac7a92b0043_56483906',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c9244cdcb17cbd4df44e0913c2b419f3dfaf4cb' => 
    array (
      0 => 'D:\\xampp\\htdocs\\myshop\\views\\texturia\\index.tpl',
      1 => 1476052844,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57fac7a92b0043_56483906 (Smarty_Internal_Template $_smarty_tpl) {
?>



<div class="joomcat">

    <div class="joomcat65_row">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
            <div class="joomcat65_imgct" style="width:220px !important;margin-right:10px;">
                <div class="joomcat65_img cat_img">
                    <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/">
                        <img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
"/>
                    </a>
                </div>
                <div class="joomcat65_txt" style="padding-bottom:10px;padding-top:0px;">
                    <ul>
                        <li>
                            <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
                        </li>
                    </ul>
                </div>  
            </div>

            <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null) % 3 == 0) {?>
                <div class="joomcat65_clr"></div>
            </div>


            <div class="joomcat65_row">            
            <?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </div>
</div>

<?php }
}
