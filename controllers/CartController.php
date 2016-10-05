<?php

/**
 * CartController.php
 * 
 * Controller work with cart(/cart/)
 */
// import models
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';

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

/**
 * Create order page
 * 
 * 
 */
function orderAction($smarty) {

    // get array id products (ID)
    $itemIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : NULL;

    if (!$itemIds) {
        redirect('/cart/');
        return;
    }

    $itemCnt = array();
    foreach ($itemIds as $item) {

        // create araay post key
        $postVar = 'itemCnt_' . $item;

        $itemCnt[$item] = isset($_POST[$postVar]) ? $_POST[$postVar] : NULL;

//        if (isset($_POST[$postVar])) {
//             $itemCnt[$item] = $_POST[$postVar];
//        } else {
//              $itemCnt[$item] = NULL;
//        }
    }

    // get array products from cart
    $rsProducts = getProductFromArray($itemIds);

    $i = 0;
    foreach ($rsProducts as &$item) {
        $item['cnt'] = isset($itemCnt[$item['id']]) ? $itemCnt[$item['id']] : 0;
        if ($item['cnt']) {
            $item['realPrice'] = $item['cnt'] * $item['price'];
        } else {
            unset($rsProducts[$i]);
        }

        $i++;
    }

    if (!$rsProducts) {
        echo 'Cart is empty';
        return;
    }

    $_SESSION['saleCart'] = $rsProducts;

    $rsCategories = getAllMainCatsWithChildren();

    if (!isset($_SESSION['user'])) {
        $smarty->assign('hideLoginBox', 1);
    }


    $smarty->assign('pageTitle', 'Поръчка');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'order');
    loadTemplate($smarty, 'footer');
}

/**
 * AJAX function save order
 * 
 * @param array $_SESSION['saleCart'] array sales procucts
 * @return json information of result action
 */
function saveorderAction() {

    // array sales products
    $cart = isset($_SESSION['saleCart']) ? $_SESSION['saleCart'] : null;

    // if order empty 
    if (!$cart) {
        $resData['success'] = 0;
        $resData['message'] = 'Not product for order';

        echo json_encode($resData);
        return;
    }

    $name = isset($_POST['name']) ? $_POST['name'] : NULL;
    $phone = isset($_POST['phone']) ? $_POST['phone'] : NULL;
    $adress = isset($_POST['adress']) ? $_POST['adress'] : NULL;

    // if name, phone, adress is empty 
    if (!$name || !$phone || !$adress) {
        $resData['success'] = 0;
        $resData['message'] = 'Not name or phone or adress';

        echo json_encode($resData);
        return;
    }

    // create new query and get them ID
    $orderId = makeNewOrder($name, $phone, $adress);


    // if orderId = false return error and break
    if (!$orderId) {
        $resData['success'] = 0;
        $resData['message'] = 'Грешка при създаване на заявката';

        echo json_encode($resData);
        return;
    }

    // save product for created order
    $res = setPurchaseForOrder($orderId, $cart);

    // if success - create respons and del variable cart
    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = 'Поръчката е записана';
        unset($_SESSION['saleCart']);
        unset($_SESSION['cart']);
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Грешка при записа на заявкат N: ' . $orderId;
    }

    echo json_encode($resData);
}
