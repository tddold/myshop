<?php

/**
 * Models for table purchase
 * 
 */

/**
 * Input in DB data product with assign to order
 * 
 * @param integer $orderId ID order
 * @param array $cart array cart
 * @return booleam TRUE if data added in DB
 */
function setPurchaseForOrder($orderId, $cart) {
    $sql = "INSERT INTO purchase "
            . "(order_id, product_id, price, amount) "
            . "VALUES ";

    $values = array();

    // create array for query of evry product
    foreach ($cart as $item) {
        $values[] = "('{$orderId}', '{$item['id']}', '{$item['price']}', '{$item['cnt']}')";
    }

    $sql .= implode($values, ', ');

    include '../config/db.php';
    $rs = mysqli_query($link, $sql);

    mysqli_close($link);

    return $rs;
}

function getPurchaseForOrder($orderId) {

    $sql = "SELECT `pe`.*, `ps`.name "
            . "FROM purchase as `pe` "
            . "JOIN products as `ps` ON `pe` .product_id = `ps` .id "
            . "WHERE `pe` .order_id = {$orderId}";

    include '../config/db.php';
    $rs = mysqli_query($link, $sql);

    mysqli_close($link);

    return createSnartyRsArray($rs);
}
