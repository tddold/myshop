{*index template*}


<div class="joomcat">

    <div class="joomcat65_row">
        {foreach $rsProducts as $item name=products}
            <div class="joomcat65_imgct" style="width:220px !important;margin-right:10px;">
                <div class="joomcat65_img cat_img">
                    <a href="/product/{$item['id']}/">
                        <img src="/images/products/{$item['image']}"/>
                    </a>
                </div>
                <div class="joomcat65_txt" style="padding-bottom:10px;padding-top:0px;">
                    <ul>
                        <li>
                            <a href="/product/{$item['id']}/">{$item['name']}</a>
                        </li>
                    </ul>
                </div>  
            </div>

            {if $smarty.foreach.products.iteration mod 3 == 0}
                <div class="joomcat65_clr"></div>
            </div>


            <div class="joomcat65_row">            
            {/if}
        {/foreach}
    </div>
</div>

