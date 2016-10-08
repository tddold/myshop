<h2>Поръчки</h2>

{if ! $rsOrders}
    Няма поръчки
{else}
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
        {foreach $rsOrders as $item name=orders}
            <tr>
                <td>{$smarty.foreach.orders.iteration}</td>
                <td>
                    <a href="#" onclick="showProducts('{$item['id'']}'); return false;">Показва съдържанието на поръчката</a>
                </td>       
                <td>Cell</td>
                <td>Cell</td>
                <td>Cell</td>
                <td>Cell</td>
                <td>Cell</td>
                <td>Cell</td>
            </tr>
        {/foreach}

    </table>
{/if}