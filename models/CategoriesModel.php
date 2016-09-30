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
