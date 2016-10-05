<?php

/*
 * Model for table categories.
 * 
 * 
 */

/**
 * Get children category for categories $catId
 * 
 * 
 * @param integer $catId ID category
 * @return array children categories
 */
function getChildrenForCat($catId) {
    $sql = "SELECT * FROM categories WHERE parent_id = '{$catId}'";

    include '../config/db.php';

    $rs = mysqli_query($link, $sql);
    mysqli_close($link);

    return createSnartyRsArray($rs);
}

/**
 * Return parent category and children category
 * 
 * @return array category
 */
function getAllMainCatsWithChildren() {
    $sql = 'SELECT * FROM categories WHERE parent_id = 0';

    include '../config/db.php';

    $rs = mysqli_query($link, $sql);
    mysqli_close($link);

    $smartyRs = array();
    while ($row = $rs->fetch_assoc()) {

        $rsChildren = getChildrenForCat($row['id']);

        if ($rsChildren) {
            $row['children'] = $rsChildren;
        }

        $smartyRs[] = $row;
    }

    return $smartyRs;
}

/**
 * Get children category
 * 
 * @param integer $catId
 * @return array children category
 */
function gerCatById($catId) {
    $catId = intval($catId);
    $sql = "SELECT * FROM categories WHERE id = '{$catId}'";

    include '../config/db.php';

    $rs = mysqli_query($link, $sql);
    mysqli_close($link);

    return mysqli_fetch_assoc($rs);
}

/**
 * Get all parent categories
 * 
 * @return array categories
 */
function getAllMainCategories() {

    $sql = "SELECT * "
            . "FROM categories "
            . "WHERE parent_id = 0";

    include '../config/db.php';

    $rs = mysqli_query($link, $sql);
    mysqli_close($link);

    return createSnartyRsArray($rs);
}

/**
 * Add new category
 * 
 * @param string $catName name category
 * @param integer $catParentId ID parent category
 * @return integer id new category
 */
function insertCat($catName, $catParentId = 0) {

    // create query
    $sql = "INSERT INTO "
            . "categories (`parent_id`, `name`) "
            . "VALUES ('{$catParentId}', '{$catName}')";

    include '../config/db.php';

    // action query
    mysqli_query($link, $sql);

    // return id added category
    $id = mysqli_insert_id($link);

    mysqli_close($link);
    
    return $id;
}
