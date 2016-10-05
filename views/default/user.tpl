{*Page users*}

<h1>Ваште регистрационни данни:</h1>
<table border="0">
    <tr>
        <td>Вход (email)</td>
        <td>{$arUser['email']}</td>
    </tr>
    <tr>
        <td>Име</td>
        <td><input type="text" id="newName" value="{$arUser['name']}"/></td>
    </tr>
    <tr>
        <td>Тел</td>
        <td><input type="text" id="newPhone" value="{$arUser['phone']}"/></td>
    </tr>
    <tr>
        <td>Адрес</td>
        <td><textarea id="newAdress">{$arUser['adress']}</textarea></td>
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
{if ! $rsUserOrders}
    Няма поръчки
{else}
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
        {foreach $rsUserOrders as $item name=order}
            <tr>
                <td>{$smarty.foreach.order.iteration}</td>
                <td>
                    <a href="#" onclick="showProducts('{$item['id']}');
                            return false;"/>
                    Показва продукта в заявката</a>
                </td>
                <td>{$item['id']}</td>
                <td>{$item['status']}</td>
                <td>{$item['date_created']}</td>
                <td>{$item['date_payment']}&nbsp;</td>
                <td>{$item['comment']}</td>

            </tr>

            <tr class="hideme"  id="purchasesForOrderId_{$item['id']}">
                <td colspan="7">
                    {if $item['children']}
                        <table border='1' cellpadding='1' cellspacing='1' width='100%'>
                            <tr>
                                <th>N:</th>
                                <th>ID</th> 
                                <td>Название</td>
                                <td>Цена</td>
                                <td>Количество</td>
                            </tr>
                            {foreach $item['children'] as $itemChild name=products}
                                <tr>
                                    <td>{$smarty.foreach.products.iteration}</td>                                
                                    <td>{$itemChild['product_id']}</td>
                                    <td><a href="/product/{$itemChild['product_id']}/"/>{$itemChild['name']}</td>
                                    <td>{$itemChild['price']}</td>
                                    <td>{$itemChild['amount']}</td>
                                </tr>
                            {/foreach}
                        </table>
                    {/if}
                </td>
            </tr>
        {/foreach}
    </table>
{/if}
