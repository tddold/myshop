<h2>Продукти</h2>

<table border="1" cellpadding="1" cellspacing="1">
    <caption>Добавяне на продукти</caption>
    <tr>
        <th>Име</th>
        <th>Цена</th>
        <th>Категория</th>
        <th>Описание</th>
        <th>Запамети</th>
    </tr>
    <tr>
        <td>
            <input type="edit" id="newItemName" value=""/>
        </td>
        <td>
            <input type="edit" id="newItemPrice" value=""/>
        </td>
        <td>
            <select id="newItemCatId">
                <option value="0">Главна категория</option>
                {foreach $rsCategories as $itemCat}
                    <option value="{$itemCat['id']}">{$itemCat['name']}</option>
                {/foreach}


            </select>
        </td>
        <td>
            <textarea id="newItemDesc"></textarea>
        </td>
        <td>
            <input type="button" value="Запамети" onclick="addProduct();"/>
        </td>
    </tr>

</table>

<table border="1" cellpadding="1" cellspacing="1">
    <tr>
        <th>N:</th>
        <th>ID</th>
        <th>Име</th>
        <th>Цена</th>
        <th>Категория</th>
        <th>Описание</th>
        <th>Изтрит</th>
        <th>Изображение</th>
        <th>Съхранение</th>
    </tr>
    {foreach $rsProducts as $item name=products}
        <tr>
            <td>{$smarty.foreach.products.iteration}</td>
            <td>{$item['id']}</td>
            <td>
                <input type="edit" id="itemName_{$item['id']}" value="{$item['name']}"/>
            </td>
            <td>
                <input type="edit" id="itemPrice_{$item['id']}" value="{$item['price']}"/>
            </td>
            <td>
                <select id="itemCatId_{$item['id']}">
                    <option value="0">Главна категория</option>
                    {foreach $rsCategories as $itemCat}
                        <option value="{$itemCat['id']}" {if $item['category_id'] == $itemCat['id']}selected{/if}>{$itemCat['name']}</option>
                    {/foreach}


                </select>
            </td>
            <td>
                <textarea id="itemDesc_{$item['id']}">
                    {$item['description']}
                </textarea>
            </td>
            <td>
                <input type="checkbox" id="itemStatus_{$item['id']}" {if $item['status'] == 0}checked{/if}/> 
            </td>
            <td>
                {if $item['image']}
                    <img src='/images/products/{$item['image']}' width="100"/>
                {/if}
                <form action="/admin/upload/" method="POST" enctype="multipart/form-data">
                    <input type="file" name="filename" value="{$item['name']}"/><br/> 
                    <input type="hidden" name="itemId" value="{$item['id']}"/><br/>
                    <input type="submit" value="Качване"/><br/>
                </form>
            </td>
            <td>
                <input type="button" value="Запамети" onclick="updateProduct('{$item['id']}');"/>
            </td>
        </tr>
    {/foreach}

</table>