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
