<div id="leftCulumn">
    <div id="leftMenu">
        <div class="menuCaption">Меню:</div>
        {foreach $rsCategories as $item}
            <a href="/category/{$item['id']}/">{$item['name']}</a>
            <br/>

            {if isset($item['children'])}
                {foreach $item['children'] as $itemChild}
                    --<a href="/category/{$itemChild['id']}/">{$itemChild['name']}</a><br/>
                {/foreach}
            {/if}

        {/foreach}
    </div>

    <div class="menuCaption">Количка</div>
    <a href="/cart/" title="Add to cat">Количество</a>
    <span id="cartCntItems">
        {if $cartCntItems > 0}
            {$cartCntItems}
        {else}
            празно
        {/if}
    </span>

</span>
</div> {*/leftColumn*}