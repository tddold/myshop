{*template cart*}

<h1>Кошница</h1>

{if ! $rsProducts}
    Кошницата е празна.

{else}
    <form action="/cart/order/" method="POST">
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
            {foreach $rsProducts as $item name=products}
                <tr>
                    <td>
                        {$smarty.foreach.products.iteration}
                    </td>
                    <td>
                        <a href='/product/{$item['id']}/'>{$item['name']}</a>
                    </td>
                    <td>
                        <input name="itemCn_{$item['id']}" id="itemCnt_{$item['id']}" type="text" value="1" onchange="conversionPrise({$item['id']});"/>
                    </td>
                    <td>
                        <span id="itemPrice_{$item['id']}" value="{$item['price']}">
                            {$item['price']}
                        </span>
                    </td>
                    <td>
                        <span id="itemRealPrice_{$item['id']}">
                            {$item['price']}
                        </span>
                    </td>  
                    <td>
                        <a id="removeCart_{$item['id']}"  href="#" onClick="removeFromCart({$item['id']});
                                return false;" alt='Delete'>Delete</a>
                        <a id="addCart_{$item['id']}" class="hideme"  href="#" onClick="addToCart({$item['id']});
                                return false;" alt='Restore'>Restore</a>
                    </td>


                </tr>
            {/foreach}
        </table>

        <input type="submit" value="Оформяне поръчката"/>
    </form>
{/if}