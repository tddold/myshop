<?php
/* Smarty version 3.1.30, created on 2016-10-03 03:07:41
  from "D:\xampp\htdocs\myshop\views\default\leftcolumn.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57f1af5d9c2411_60849432',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ff32f39ddca4197d29693a75d8196953f0351d3' => 
    array (
      0 => 'D:\\xampp\\htdocs\\myshop\\views\\default\\leftcolumn.tpl',
      1 => 1475456857,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57f1af5d9c2411_60849432 (Smarty_Internal_Template $_smarty_tpl) {
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

    <?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)) {?>
        <div id="userBox">
            <a href="/user/" id="userLink"><?php echo $_smarty_tpl->tpl_vars['arUser']->value['displayName'];?>
</a><br/>
            <a href="/user/logout/" onclick="logout();">Изход</a>
        </div>

    <?php } else { ?>

        <div id="userBox" class="hideme">
            <a href="#" id="userLink"></a><br/>
            <a href="#" onclick="logout();">Изход</a>
        </div>

        <div id="loginBox">
            <div class="menuCaption">Вход</div>
            <input type="text" id="loginEmail" name="loginEmail" value=""/><br/>
            <input type="password" id="loginPwd" name="loginPwd" value=""/><br/>
            <input type="button" onclick="login();" value="Вход"/><br/>

        </div>

        <div id="registerBox">
            <div class="menuCaption showHidden" onclick="showRegisterBox();">Регистрация</div>
            <div id="registerBoxHidden">
                email:<br/>
                <input type="text" id="email" name="email" value=""/><br/>
                парола:<br/>
                <input type="password" id="pwd1" name="pwd1" value=""/><br/>
                певтори парола:<br/>
                <input type="password" id="pwd2" name="pwd2" value="" /><br/>
                <input type="button" onclick="registerNewUser();" value="Регистрирай се!"/>            
            </div>
        </div>
    <?php }?>

    <div class="menuCaption">Кошница</div>
    <a href="/cart/" title="Add to cat">Количество</a>
    <span id="cartCntItems">
        <?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value > 0) {?>
            <?php echo $_smarty_tpl->tpl_vars['cartCntItems']->value;?>

        <?php } else { ?>
            0
        <?php }?>
    </span>

</span>
</div> <?php }
}
