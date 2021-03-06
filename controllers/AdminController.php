<?php

/**
 * AdminController.php
 * 
 * Controller backend site(/admin/)
 */
// import models
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';

$smarty->setTemplateDir(TemplateAdminPrefix);
$smarty->assign('templateWebPath', TemplateAdminWebPath);

function indexAction($smarty) {

    // get all parent categories
    $rsCategories = getAllMainCategories();
//    d($rsCategories);
    $smarty->assign('pageTitle', 'Админ сайта');
    $smarty->assign('rsCategories', $rsCategories);


    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'admin');
    loadTemplate($smarty, 'adminFooter');
}

function addnewcatAction() {

    $catName = $_POST['newCategoryName'];
    $catParenId = $_POST['generalCatId'];

    $res = insertCat($catName, $catParenId);

    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = 'Категорията е добавена';
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Грешка при добавяне на категория';
    }

    echo json_encode($resData);
    return;
}

/**
 * Page admin category
 * 
 * @param type $smarty
 */
function categoryAction($smarty) {
    $rsCategories = getAllCategories();
    $rsMainCategories = getAllMainCategories();

    $smarty->assign('pageTitle', 'Admin site');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsMainCategories', $rsMainCategories);

    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminCategory');
    loadTemplate($smarty, 'adminFooter');
}

function updatecategoryAction() {

    $itemId = $_POST['itemId'];
    $parentId = $_POST['parentId'];
    $newName = $_POST['newName'];

    $res = updateCategoryData($itemId, $parentId, $newName);

    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = 'Категорията е обновена';
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Грешка при промяна на данните на категорията';
    }

    echo json_encode($resData);
    return;
}

/**
 * Page controll products
 * 
 * @param type $smarty
 */
function productsAction($smarty) {
    $rsCategories = getAllCategories();
    $rsProducts = getProducts();

    $smarty->assign('pageTitle', 'Admin site');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);

    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminProducts');
    loadTemplate($smarty, 'adminFooter');
}

function addproductAction() {
    $itemName = $_POST['itemName'];
    $itemPrice = $_POST['itemPrice'];
    $itemDesc = $_POST['itemDesc'];
    $itemCat = $_POST['itemCatId'];

    $res = insertProduct($itemName, $itemPrice, $itemDesc, $itemCat);

    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = 'Промените са успешно записани';
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Грешка при промяна на данните';
    }

    echo json_encode($resData);
    return;
}

function updateproductAction() {
    $itemId = $_POST['itemId'];
    $itemName = $_POST['itemName'];
    $itemPrice = $_POST['itemPrice'];
    $itemStatus = $_POST['itemStatus'];
    $itemDesc = $_POST['itemDesc'];
    $itemCat = $_POST['itemCatId'];

    $res = updateProduct($itemId, $itemName, $itemPrice, $itemStatus, $itemDesc, $itemCat);

    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = 'Промените са успешно записани(ъпдейт)';
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Грешка при упдейт на данните';
    }

    echo json_encode($resData);
    return;
}

function uploadAction() {
    $maxSize = 2 * 1024 * 1024;

    $itemId = $_POST['itemId'];

    // get ext for upload file
    $ext = pathinfo($_FILES['filename']['name'], PATHINFO_EXTENSION);

    // create name file
    $newFileName = $itemId . '.' . $ext;

    $size = $_FILES['filename']['size'];

    if ($size > $maxSize) {
        echo ("Размера на файла превишава 2MB");
        return;
    }

    // select file
    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {

        // if file is selected - save in temp dir
        $res = move_uploaded_file($_FILES['filename']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/images/products/' . $newFileName);

        if ($res) {
            $res = updateProductImage($itemId, $newFileName);
            if ($res) {
                redirect('/admin/products/');
            }
        }
    } else {
        echo ("Грешка при качване на файла");
    }
}

function ordersAction($smarty) {

    $rsOrders = getOrders();

    $smarty->assign('pageTitle', 'Orders');
    $smarty->assign('rsOrders', $rsOrders);

    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminOrders');
    loadTemplate($smarty, 'adminFooter');
}

function setorderstatusAction() {
    $itemId = $_POST['itemId'];
    $status = $_POST['status'];

    $res = updateOrderStatus($itemId, $status);

    if ($res) {
        $res['success'] = 1;
    } else {
        $res['success'] = 0;
        $res['message'] = 'Грешка при съхранение на статуса';
    }

    echo json_encode($res);
    return;
}

function setorderpaymentAction() {
    $itemId = $_POST['itemId'];
    $datePayment = $_POST['datePayment'];

    $res = updateOrderDatePayment($itemId, $datePayment);

    if ($res) {
        $res['success'] = 1;
    } else {
        $res['success'] = 0;
        $res['message'] = 'Грешка при съхранение на статуса';
    }

    echo json_encode($res);
    return;
}
