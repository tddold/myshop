<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getLastProducts($limit = NULL) {
    $sql = "SELECT * FROM `products` ORDER BY id DESC";

    if ($limit) {
        $sql .= " LIMIT {$limit}";
    }

    include '../config/db.php';

    $rs = mysqli_query($link, $sql);
    mysqli_close($link);

    return createSnartyRsArray($rs);
}

/**
 * 
 * Get products for category $itemId
 * 
 * @param integer $catId ID category
 * @return array products
 */
function getProductsByCat($catId) {
    $catId = intval($catId);
    $sql = "SELECT * FROM products WHERE category_id = '{$catId}'";

    include '../config/db.php';

    $rs = mysqli_query($link, $sql);
    mysqli_close($link);

    return createSnartyRsArray($rs);
}

/**
 * Get data by products by ID
 * 
 * @param intiger $itemId ID product
 * @param array array data product
 */
function getProductById($itemId) {
    $itemId - intval($itemId);
    $sql = "SELECT * FROM products WHERE id = '$itemId'";
//d($sql);
    include '../config/db.php';
    $rs = mysqli_query($link, $sql);
    mysqli_close($link);

//    d($rs);
//    d(mysqli_fetch_all($rs, MYSQLI_ASSOC));

    return mysqli_fetch_all($rs, MYSQLI_ASSOC);
}

/**
 * Get array products fron array indexes (ID's)
 * 
 * @param array $itemsIds array indexes prducts
 * @return array array data producs
 */
function getProductFromArray($itemsIds) {
    $strIds = implode($itemsIds, ', ');
    $sql = "SELECT * FROM products WHERE id in ({$strIds})";

    include '../config/db.php';
    $rs = mysqli_query($link, $sql);
    mysqli_close($link);

    return createSnartyRsArray($rs);
}
