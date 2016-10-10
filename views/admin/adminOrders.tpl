<h2>Поръчки</h2>

{if ! $rsOrders}
    Няма поръчки
{else}
    <table border="1" cellpadding="1" sellspacing="1">
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
        {foreach $rsOrders as $item name=orders}
            <tr>
                <td>{$smarty.foreach.orders.iteration}</td>
                <td>
                    <a href="#" onclick="showProducts('{$item['id']}');
                            return false;">Показва съдържанието на поръчката</a>
                </td>       
                <td>{$item['id']}</td>
                <td>
                    <input type="checkbox" id="itemStatus_{$item['id']}" {if $item['status']}checked=="checked"{/if} onclick="updateOrderStatus('{$item['id']}');"/>Обработен
                </td>
                <td>{$item['date_created']}</td>
                <td>
                    <input id="datePayment_{$item['id']}" type="text" value="{$item['date_payment']}"/>
                    <input type="button" value="Запази" onclick="updateDatePayment('{$item['id']}');"/>
                </td>
                <td>{$item['comment']}</td>
                <td>{$item['date_modification']}</td>
            </tr>

            <tr class="hideme" id="purchasesForOrderId_{$item['id']}">
                <td colspan="8">
                    {if $item['children']}
                        <table border='1' cellpadding='1' cellspacing='1' width='100%'>
                            <tr>
                                <th>N:</th>
                                <th>ID</th>
                                <th>Име</th>
                                <th>Цена</th>
                                <th>Количество</th>
                            </tr>
                            {foreach $item['children'] as $itemChild name=products}
                                <tr colspan="8">
                                    <td>{$smarty.foreach.products.iteration}</td>
                                    <td>{$itemChild['id']}</td>
                                    <td>
                                        <a href="/product/{$itemChild['id']}/">{$itemChild['name']}</a>
                                    </td>
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