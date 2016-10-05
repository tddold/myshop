{*home admin*}

<div id="blockNewCategory">
    Нова категория
    <input name="newCategoryName" id="newCategoryName" type="text" value=""/>
    <br/>

    Подкатегория на
    <select name="generalCatId">
        <option value="0">
            Главна категория
            {foreach $rsCategories as $item}
            <option value="{$item['id']}">{$item['name']}</option>
        {/foreach}

        </option>
    </select>
    <br/>
    <input type="button" onclick="newCategory();" value="Нова категория"/>
</div>