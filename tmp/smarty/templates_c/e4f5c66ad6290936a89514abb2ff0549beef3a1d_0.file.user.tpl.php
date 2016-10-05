<?php
/* Smarty version 3.1.30, created on 2016-10-05 12:10:44
  from "D:\xampp\htdocs\myshop\views\default\user.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57f4d1a4599460_24039197',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e4f5c66ad6290936a89514abb2ff0549beef3a1d' => 
    array (
      0 => 'D:\\xampp\\htdocs\\myshop\\views\\default\\user.tpl',
      1 => 1475662234,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57f4d1a4599460_24039197 (Smarty_Internal_Template $_smarty_tpl) {
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
</table>

<h2>Поръчки</h2>
<?php if (!$_smarty_tpl->tpl_vars['rsUserOrders']->value) {?>
    Няма поръчки
<?php } else { ?>
    <table border='1' cellpadding='1' cellspacing='1'>
        <tr>
            <th>N:</th>
            <th>Действие</th>
            <th>ID на поръчката</th>
            <th>Статус</th>
            <th>Дата на създаване</th>
            <th>Дата на плащане</th>
            <th>Допълнителна информация</th>
        </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsUserOrders']->value, 'item', false, NULL, 'order', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_order']->value['iteration']++;
?>
            <tr>
                <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_order']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_order']->value['iteration'] : null);?>
</td>
                <td>
                    <a href="#" onclick="showProducts('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
');
                            return false;"/>
                    Показва продукта в заявката</a>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_created'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_payment'];?>
&nbsp;</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['comment'];?>
</td>

            </tr>

            <tr class="hideme"  id="purchasesForOrderId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                <td colspan="7">
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['children']) {?>
                        <table border='1' cellpadding='1' cellspacing='1' width='100%'>
                            <tr>
                                <th>N:</th>
                                <th>ID</th> 
                                <td>Название</td>
                                <td>Цена</td>
                                <td>Количество</td>
                            </tr>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'itemChild', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
                                <tr>
                                    <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</td>                                
                                    <td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['product_id'];?>
</td>
                                    <td><a href="/product/<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['product_id'];?>
/"/><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['price'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['amount'];?>
</td>
                                </tr>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        </table>
                    <?php }?>
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
