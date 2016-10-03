<?php

/*
 * User controller
 * 
 */

// import models
include_once '../models/CategoriesModel.php';
include_once '../models/UsersModel.php';

/**
 * AJAX register users
 * Inicialize session with variable ($_SESSION['user'])
 * 
 * @return json array data new user
 */
function registerAction() {


    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email = trim($email);

    $pwd1 = isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1'] : null;
    $pwd2 = isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2'] : null;

    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
    $adress = isset($_REQUEST['adress']) ? $_REQUEST['adress'] : null;
    $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
    $name = trim($name);

    $resData = NULL;
    $resData = checkRegisterParams($email, $pwd1, $pwd2);

    if (!$resData && checkUserEmail($email)) {
        $resData['success'] = FALSE;
        $resData['message'] = "Потребител с такъв email ('{$email}' вече е регистриран!)";
    }

    if (!$resData) {
        $pwdMD5 = md5($pwd1);

        $userData = registerNewUser($email, $pwdMD5, $name, $phone, $adress);
        if ($userData['success']) {
            $resData['message'] = 'Потребителя е успешно регистриран!';
            $resData['success'] = 1;

            $userData = $userData[0];
            $resData['userName'] = $userData['name'] ? $userData['name'] : $userData['email'];
            $resData['userEmail'] = $email;

            $_SESSION['user'] = $userData;
            $_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];
        } else {
            $resData['success'] = 0;
            $resData['message'] = 'Грешка при регистрация!';
        }
    }

    echo json_encode($resData);
}

/**
 * Logout user
 * 
 */
function logoutAction() {
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
        unset($_SESSION['cart']);
    }

    $resData['success'] = 1;
    
    echo json_encode($resData);
//    redirect('/');
}

/**
 * AJAX login user
 * 
 * @return json array data user
 */
function loginAction() {
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email = trim($email);

    $pwd = isset($_REQUEST['pwd']) ? $_REQUEST['pwd'] : NULL;
    $pwd = trim($pwd);

    $userData = loginUser($email, $pwd);

    if ($userData['success']) {
        $userData = $userData[0];

        $_SESSION['user'] = $userData;
        $_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];

        $resData = $_SESSION['user'];
        $resData['success'] = 1;
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Грешен email или парола!';
    }
    
    echo json_encode($resData);
}