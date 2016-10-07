<?php

/*
 * Model products
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

function getProducts() {

    $sql = "SELECT * "
            . "FROM `products` "
            . "ORDER BY category_id";

    include '../config/db.php';
    $rs = mysqli_query($link, $sql);
    mysqli_close($link);

    return createSnartyRsArray($rs);
}

/**
 * Insert new product
 * 
 * @param string $itemName name product
 * @param integer $itemPrice price
 * @param string $itemDesc description
 * @param integer $itemCat ID category
 * @return type
 */
function insertProduct($itemName, $itemPrice, $itemDesc, $itemCat) {

    $sql = "INSERT INTO products "
            . "SET "
            . "`name` = '{$itemName}', "
            . "`price` = '{$itemPrice}', "
            . "`description` = '{$itemDesc}', "
            . "`category_id` = '{$itemCat}'";

    include '../config/db.php';
    $rs = mysqli_query($link, $sql);
    mysqli_close($link);

    return $rs;
}

function updateProduct($itemId, $itemName, $itemPrice, $itemStatus, $itemDesc, $itemCat, $newFileName = NULL) {

    $set = array();

    if ($itemName) {
        $set[] = "`name` = '{$itemName}'";
    }

    if ($itemPrice > 0) {
        $set[] = "`price` = '{$itemPrice}'";
    }

    if ($itemStatus !== NULL) {
        $set[] = "`status` = {$itemStatus}";
    }

    if ($itemDesc) {
        $set[] = "`description` = {'$itemDesc'}";
    }

    if ($itemCat) {
        $set[] = "`category_id` = {$itemCat}";
    }

    if ($newFileName) {
        $set[] = "`image` = {$newFileName}";
    }

    $setStr = implode($set, ',');

    $sql = "UPDATE products "
            . "SET {$setStr} "
            . "WHERE id = '{$itemId}'";

    include '../config/db.php';
    $rs = mysqli_query($link, $sql);
    mysqli_close($link);

    return $rs;
}
