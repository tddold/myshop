<div id="leftCulumn">
    <div id="leftMenu">
        <div class="menuCaption"><a href="/"<h2>Меню</h2></a>:</div>
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

    {if isset($arUser)}
        <div id="userBox">
            <a href="/user/" id="userLink">{$arUser['displayName']}</a><br/>
            <a href="/user/logout/" onclick="logout();">Изход</a>
        </div>

    {else}

        <div id="userBox" class="hideme">
            <a href="#" id="userLink"></a><br/>
            <a href="#" onclick="logout();">Изход</a>
        </div>

        {if ! isset($hideLoginBox)}
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
        {/if}
    {/if}

    <div class="menuCaption">Кошница</div>
    <a href="/cart/" title="Add to cat">Количество</a>
    <span id="cartCntItems">
        {if $cartCntItems > 0}
            {$cartCntItems}
        {else}
            0
        {/if}
    </span>

</span>
</div> {*/leftColumn*}