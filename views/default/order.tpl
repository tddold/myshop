{*Page order*}

<h2>Данни за поръчката</h2>
<form id="formOrder" action="/cart/saveorder/" method="POST">
    <table>
        <tr>
            <td>N:</td>
            <td>Наименование</td>
            <td>Количество</td>
            <td>Единична цена</td>
            <td>Стойност</td>
        </tr>

        {foreach $rsProducts as $item name=products}
            <tr>
                <td>{$smarty.foreach.products.iteration}</td>
                <td><a href="/product/{$item['id']}/">{$item['name']}</a></td>
                <td>
                    <span id="itemCnt_{$item['id']}">
                        <input type="hidden" name="itemCnt_{$item['id']}" value="{$item['cnt']}"/>
                        {$item['cnt']}
                    </span>
                </td>
                <td>
                    <span id="itemPrice_{$item['id']}">
                        <input type="hidden" name="itemPrice_{$item['id']}" value="{$item['price']}"/>
                        {$item['price']}
                    </span>
                </td>
                <td>
                    <span id="itemRealPrice_{$item['id']}">
                        <input type="hidden" name="itemRealPrice_{$item['id']}" value="{$item['realPrice']}"/>
                        {$item['realPrice']}
                    </span>
                </td>
            </tr>
        {/foreach}

    </table>

    {if isset($arUser)}
        {$buttonClass = ""}
        <h2>Данни за копувача</h2>
        <div id="orderUserInfoBox" {$buttonClass}>
            {$name = $arUser['name']}
            {$phone = $arUser['phone']}
            {$adress = $arUser['adress']}
            <table>
                <tr>
                    <td>Име*</td>
                    <td>
                        <input type="text" id="name" name="name" value="{$name}"/>
                    </td>
                </tr>
                <tr>
                    <td>Тел*</td>
                    <td>
                        <input type="text" id="phone" name="phone" value="{$phone}"/>
                    </td>
                </tr>
                <tr>
                    <td>Адрес*</td>
                    <td>
                        <textarea id="adress" name="adress">{$adress}</textarea>
                    </td>
                </tr>
            </table>        
        </div>

    {else}

        <div id="loginBox">
            <div class="menuCaption">Оторизация</div>
            <table>
                <tr>
                    <td>Логин</td>
                    <td>
                        <input type="text" id="loginEmail" name="loginEmail" value=""/>
                    </td>
                </tr>
                <tr>
                    <td>Парола</td>
                    <td>
                        <input type="password" id="loginPwd" name="loginPwd" value=""/>
                    </td>
                </tr>  
                <tr>
                    <td></td>
                    <td>
                        <input type="button" onclick="login();" value="Вход"/>
                    </td>
                </tr>  
            </table>        
        </div>

        <div id="registerBox">или <br/>
            <div class="menuCaption">Регистрация на нов потребител</div>            
            email*:<br/>
            <input type="text" id="email" name="email" value=""/><br/>
            парола*:<br/>
            <input type="password" id="pwd1" name="pwd1" value=""/><br/>
            повтори парола*:<br/>
            <input type="password" id="pwd2" name="pwd2" value="" /><br/>

            Име* :<input type="text" id="name" name="name" value=""/><br/>
            Тел* :<input type="text" id="phone" name="phone" value=""/><br/>
            Адрес* :<textarea id="adress" name="adress"></textarea><br/>

            <input type="button" onclick="registerNewUser();" value="Регистрирай се!"/>            
        </div>

        {$buttonClass = "class='hideme'"}
    {/if}

    <input {$buttonClass} id="btnSaveOrder" type="button" value="Оформи зявката" onclick="saveOrder();"/>
</form>