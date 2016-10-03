{*Page users*}

<h1>Ваште регистрационни данни:</h1>
<table border="0">
    <tr>
        <td>Вход (email)</td>
        <td>{$arUser['email']}</td>
    </tr>
    <tr>
        <td>Име</td>
        <td><input type="text" id="newName" value="{$arUser['name']}"/></td>
    </tr>
    <tr>
        <td>Тел</td>
        <td><input type="text" id="newPhone" value="{$arUser['phone']}"/></td>
    </tr>
    <tr>
        <td>Адрес</td>
        <td><textarea id="newAdress">{$arUser['adress']}</textarea></td>
    </tr>
    <tr>
        <td>Нова парола</td>
        <td><input type="password" id="newPwd1" value=""/></td>
    </tr>
    <tr>
        <td>Повтори парола</td>
        <td><input type="password" id="newPwd2" value=""/></td>
    </tr>
    <tr>
        <td>За да запомните данните въведете текущата парола</td>
        <td><input type="password" id="curPwd" value=""/></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><input type="button" id="newPwd2" value="Запамети промените" onclick="updateUserData();"/></td>
    </tr>
</table>