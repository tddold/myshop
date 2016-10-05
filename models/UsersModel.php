<?php

/*
 * Model for work with table users (users)
 * 
 */

/**
 * Register new user
 * 
 * @param string $email
 * @param string $pwdMD5 coding with MD5
 * @param string $name
 * @param string $phone
 * @param string $adress
 */
function registerNewUser($email, $pwdMD5, $name, $phone, $adress) {

    include '../config/db.php';
    $email = mysqli_real_escape_string($link, $email);
    $name = mysqli_real_escape_string($link, $name);
    $phone = mysqli_real_escape_string($link, $phone);
    $adress = mysqli_real_escape_string($link, $adress);

    $sql = "INSERT INTO "
            . "users (`email`, `pwd`, `name`, `phone`, `adress`)"
            . "VALUE ('{$email}', '{$pwdMD5}', '{$name}', '{$phone}', '{$adress}')";
//            d($sql);

    $rs = mysqli_query($link, $sql);

    if ($rs) {
        $sql = "SELECT * FROM users WHERE (`email` = '{$email}' and `pwd` = '{$pwdMD5}') LIMIT 1";

        $rs = mysqli_query($link, $sql);
        $rs = createSnartyRsArray($rs);

        if (isset($rs[0])) {
            $rs['success'] = 1;
        } else {
            $rs['success'] = 0;
        }
    } else {
        $rs ['success'] = 0;
    }

    mysqli_close($link);

    return $rs;
}

/**
 * Check parameters for register user
 * 
 * @param string $email
 * @param string $pwd1
 * @param string $pwd2
 * @return array result
 */
function checkRegisterParams($email, $pwd1, $pwd2) {

    $res = NULL;

    if (!$email) {
        $res['success'] = FALSE;
        $res['message'] = 'Въведете email!';
    }

    if (!$pwd1) {
        $res['success'] = FALSE;
        $res['message'] = 'Въведете парола!';
    }

    if (!$pwd2) {
        $res['success'] = FALSE;
        $res['message'] = 'Въведете отново парола!';
    }

    if ($pwd1 != $pwd2) {
        $res['success'] = FALSE;
        $res['message'] = 'Паролите не съвпадат!';
    }

    return $res;
}

/**
 * Check email is in DB
 * 
 * @param string $email
 * @return array or null
 */
function checkUserEmail($email) {

    include '../config/db.php';
    $email = mysqli_real_escape_string($link, $email);
    $sql = "SELECT id FROM users WHERE email = '{$email}'";

    $rs = mysqli_query($link, $sql);
    $rs = createSnartyRsArray($rs);

    mysqli_close($link);

    return $rs;
}

/**
 * Login user
 * 
 * @param string $email
 * @param string $pwd
 * @return array data user
 */
function loginUser($email, $pwd) {

    include '../config/db.php';
    $email = mysqli_real_escape_string($link, $email);
    $pwd = md5($pwd);

    $sql = "SELECT * FROM users WHERE (`email` = '{$email}' and `pwd` = '{$pwd}') LIMIT 1";

    $rs = mysqli_query($link, $sql);
    $rs = createSnartyRsArray($rs);

    if (isset($rs[0])) {
        $rs['success'] = 1;
    } else {
        $rs['success'] = 0;
    }

    mysqli_close($link);

    return $rs;
}

/**
 * Update user data
 * 
 * @param string $name
 * @param string $phone
 * @param string $adress
 * @param string $pwd1
 * @param string $pwd2
 * @param string $curPwd
 * @return boolen TRUE if success
 */
function updateUserData($name, $phone, $adress, $pwd1, $pwd2, $curPwd) {

    include '../config/db.php';
    $email = mysqli_real_escape_string($link, $_SESSION['user']['email']);
    $name = mysqli_real_escape_string($link, $name);
    $phone = mysqli_real_escape_string($link, $phone);
    $adress = mysqli_real_escape_string($link, $adress);
    $pwd1 = trim($pwd1);
    $pwd2 = trim($pwd2);

    $newPwd = NULL;
    if ($pwd1 && ($pwd1 == $pwd2)) {
        $newPwd = md5($pwd1);
    }

    $sql = "UPDATE users SET ";

    if ($newPwd) {
        $sql .= " `pwd` = '{$newPwd}', ";
    }

    $sql .= " `name` = '{$name}', "
            . "`phone` = '{$phone}', "
            . "`adress` = '{$adress}' "
            . "WHERE "
            . "`email` = '{$email}' AND `pwd` = '{$curPwd}' "
            . "LIMIT 1";

    $rs = mysqli_query($link, $sql);

    mysqli_close($link);

    return $rs;
}

/**
 * Get data of orders current user
 * 
 * @return array orders with link to products
 */
function gerCurUserOrders() {
    $userId = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : 0;
    $rs = getOrderWithProductsByUser($userId);

    return $rs;
}
