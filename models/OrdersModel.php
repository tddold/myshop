<?php

/**
 * Model fot table orders (orders)
 * 
 */

/**
 * Create order without products
 * 
 * @param string $name
 * @param string $phone
 * @param string $adress
 * @return integet ID created order
 */
function makeNewOrder($name, $phone, $adress) {

    // check for sql injection
    include '../config/db.php';
    $name = mysqli_real_escape_string($link, $name);
    $phone = mysqli_real_escape_string($link, $phone);
    $adress = mysqli_real_escape_string($link, $adress);



    //> initialize variables
    $userId = $_SESSION['user']['id'];
    $comment = "id user: {$userId}<br/>"
            . "Име: {$name}<br/>"
            . "Тел: {$phone}<br/>"
            . "Адрес: {$adress}";

    $dataCreated = date('Y.m.d H:i:s');
    $iserIp = $_SERVER['REMOTE_ADDR'];
    //<
    // create sql query to DB
    $sql = "INSERT INTO "
            . "orders (`user_id`, `date_created`, `date_payment`, `status`, `comment`, `user_ip`) "
            . "VALUES ('{$userId}', '{$dataCreated}', null, '0', '{$comment}', '{$iserIp}')";
//    d($rs);
    $rs = mysqli_query($link, $sql);

    // get id created order
    if ($rs) {
        $sql = "SELECT id "
                . "FROM orders "
                . "ORDER BY id DESC "
                . "LIMIT 1";

        $rs = mysqli_query($link, $sql);

        // convert result order
        $rs = createSnartyRsArray($rs);

        // return id created order
        if (isset($rs)) {
            return $rs[0]['id'];
        }
    }

    mysqli_close($link);

    return FALSE;
}

/**
 * Get array orders with link to products for user $userId
 * 
 * @param integer $userId ID user
 * @return array array orders with link products
 */
function getOrderWithProductsByUser($userId) {
    $userId = intval($userId);
    $sql = "SELECT * FROM orders "
            . "WHERE `user_id` = '{$userId}' "
            . " ORDER BY id DESC";

    include '../config/db.php';
    $rs = mysqli_query($link, $sql);
    mysqli_close($link);

    $smartyRs = array();
    while ($row = $rs->fetch_assoc()) {
        $rsChildren = getPurchaseForOrder($row['id']);

        if ($rsChildren) {
            $row['children'] = $rsChildren;
           $smartyRs [] = $row;
        }
    }

    return $smartyRs;
}
