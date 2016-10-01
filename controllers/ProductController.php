<?php

/**
 * ProductController.php
 * 
 * Controller page products (/product/1)
 */
// import models
include_once '../models/ProductsModel.php';
include_once '../models/CategoriesModel.php';

/*
 * Create page products
 * 
 * @param object $smarty template
 */
function indexAction($smarty) {
    $itemId = isset($_GET['id']) ? $_GET['id'] : NULL;

    if (!$itemId) {
        exit();
    }
    // get data for products
    $rsProduct = getProductById($itemId);
//d($rsProduct);
    // get data for category
    $rsCategories = getAllMainCatsWithChildren();

    $smarty->assign('itemInCart', 0);
    if(in_array($itemId, $_SESSION['cart'])){
        $smarty->assign('itemInCart', 1);
    }
    
    $smarty->assign('pageTitle', '');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProduct', $rsProduct);
//d($smarty);
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'product');
    loadTemplate($smarty, 'footer');
}
