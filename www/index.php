<?php

// start sesion
session_start();

// if dont cart in session create array cart
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

include_once'../config/config.php'; // init setings
include_once'../config/db.php';     // init base data
include_once '../library/mineFunctions.php';    // Some function
// initialize controllers
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';

// initiliaze function
$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

// initialize variable to $smarty - value elements in cart
$smarty->assign('cartCntItems', count($_SESSION['cart']));

loadPage($smarty, $controllerName, $actionName);

