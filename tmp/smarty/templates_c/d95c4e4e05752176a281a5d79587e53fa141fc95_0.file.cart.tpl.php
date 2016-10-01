<?php
/* Smarty version 3.1.30, created on 2016-10-01 21:32:55
  from "D:\xampp\htdocs\myshop\views\default\cart.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57f00f675fda81_97464046',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd95c4e4e05752176a281a5d79587e53fa141fc95' => 
    array (
      0 => 'D:\\xampp\\htdocs\\myshop\\views\\default\\cart.tpl',
      1 => 1475350358,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57f00f675fda81_97464046 (Smarty_Internal_Template $_smarty_tpl) {
?>


<h1>Кошница</h1>

<?php if (!$_smarty_tpl->tpl_vars['rsProducts']->value) {?>
    Кошницата е празна.

<?php } else { ?>
    <h2>Данни за поръчката</h2>
    <table>
        <tr>
            <td>N:</td>
            <td>Наименование</td>
            <td>Количество</td>
            <td>Еденична цена</td>
            <td>Цена</td>
            <td>Действие</td>
        </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
            <tr>
                <td>
                    <?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>

                </td>
                <td>
                    <a href='/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/'><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
                </td>
                <td>
                    <input name="itemCn_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="text" value="1" onchange="conversionPrise(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);"/>
                </td>
                <td>
                    <span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
">
                        <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

                    </span>
                </td>
                <td>
                    <span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                        <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

                    </span>
                </td>  
                <td>
                    <a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"  href="#" onClick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);
                            return false;" alt='Delete'>Delete</a>
                        <a id="addCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="hideme"  href="#" onClick="addToCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);
                            return false;" alt='Restore'>Restore</a>
                </td>


            </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </table>
<?php }
}
}
