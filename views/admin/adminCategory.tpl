<h2>Категории</h2>
<table>
    <tr>
        <th>N:</th>
        <th>ID</th>
        <th>Име</th>
        <th>Родителска категория</th>
        <th>Действие</th>
    </tr>
    {foreach $rsCategories as $item name=categories}
        <tr>
            <td>{$smarty.foreach.categories.iteration}</td>
            <td>{$item['id']}</td>
            <td>
                <input type="edit" id="itemName_{$item['id']}" value="{$item['name']}"/>
            </td>
            <td>
                <select id="parentId_{$item['id']}" value="{$item['name']}">
                    <option value="0"/>
                        Главна категория
                        {foreach $rsMainCategories as $mainItem}
                        <option value="{$mainItem['id']}" {if $item['parent_id'] == $mainItem['id']} selected{/if}/>{$mainItem['name']}
                        {/foreach}

                </select>
            </td>
            <td>
                <input type="button" value="Запамети" onclick="updateCat({$item['id']});"/>
            </td>
        </tr>
    {/foreach}
</table>