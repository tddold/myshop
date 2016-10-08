<?php
/* Smarty version 3.1.30, created on 2016-10-08 14:18:03
  from "D:\xampp\htdocs\myshop\views\admin\adminOrders.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57f8e3fbb2a4b2_37266925',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '22db4e40ad43d427fd3adc07b13f95d5bad75e30' => 
    array (
      0 => 'D:\\xampp\\htdocs\\myshop\\views\\admin\\adminOrders.tpl',
      1 => 1475929073,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57f8e3fbb2a4b2_37266925 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h2>Поръчки</h2>

<?php if (!$_smarty_tpl->tpl_vars['rsOrders']->value) {?>
    Няма поръчки
<?php } else { ?>
    <table border="1", cellpadding="1" sellspacing="1">
        <tr>
            <th>N:</th>
            <th>Действие</th>
            <th>ID на поръчката</th>
            <th width="100">Статус</th>
            <th>Дата на създаване</th>
            <th>Дата на плащане</th>
            <th>Допълнителна информация</th>
            <th>Дата на промяна</th>
        </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsOrders']->value, 'item', false, NULL, 'orders', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']++;
?>
            <tr>
                <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration'] : null);?>
</td>
                <td>Cell</td>       
                <td>Cell</td>
                <td>Cell</td>
                <td>Cell</td>
                <td>Cell</td>
                <td>Cell</td>
                <td>Cell</td>
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
