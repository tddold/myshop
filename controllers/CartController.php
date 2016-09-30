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
    d($itemId);
    if (!$itemId) {
        return FALSE;
    }

    $resData = array();
    
    // if value null - add value
    if (isset($_SESSION['cart']) && array_search($itemId, $_SESSION['cart']) === FALSE) {
        $_SESSION['cart'][] = $itemId;
        $resData['cntItems'] = count($_SESSION['cart']);
        $resData['success'] = 1;
    } else{
        $resData['success'] = 0;
    }
    
    echo json_encode($resData);
}
