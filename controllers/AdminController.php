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
