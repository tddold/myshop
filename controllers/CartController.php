<?php

/**
 * CartController.php
 * 
 * Controller work with cart(/cart/)
 */
// import models
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

/**
 * Add products to cart
 * 
 * @param integer $id Get parameter - ID  product add to cart
 * return json information for operation (success, nomber of products in cart)
 */
function addtocartAction() {
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : NULL;
//    d($itemId);
    if (!$itemId) {
        return FALSE;
    }

    $resData = array();

    // if value null - add value
    if (isset($_SESSION['cart']) && array_search($itemId, $_SESSION['cart']) === FALSE) {
        $_SESSION['cart'][] = $itemId;
        $resData['cntItems'] = count($_SESSION['cart']);
        $resData['success'] = 1;
    } else {
        $resData['success'] = 0;
    }
//    d(json_encode($resData));
//    var_dump(json_encode($resData));
    echo json_encode($resData);
}

/**
 * Function remove products from cart
 * 
 * @param integer $itemId ID product
 * @return arrya update info for number products in cart
 */
function removefromcartAction() {
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : NULL;
    if (!$itemId) {
        exit();
    }

    $resData = array();

    $key = array_search($itemId, $_SESSION['cart']);
    if ($key !== FALSE) {
        unset($_SESSION['cart'][$key]);
        $resData['success'] = 1;
        $resData['cntItems'] = count($_SESSION['cart']);
    } else {
        $resData['duccess'] = 0;
    }

//     d(json_encode($resData));
//    var_dump(json_encode($resData));
    echo json_encode($resData);
}

/**
 * Create pag cart
 * 
 * @link /cart/
 */
function indexAction($smarty) {
    $itemsIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

    $rsCategories = getAllMainCatsWithChildren();
    $rsProducts = getProductFromArray($itemsIds);
    
    $smarty->assign('pageTitle', '');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'cart');
    loadTemplate($smarty, 'footer');
}
