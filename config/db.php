<?php

/* *
 * Initialize conection db
 * 
 * 
 */

$dblocation = "127.0.0.1";
$dbname = "myshoop";
$dbuser = "root";
$dbpasswd = "";


global $link;
$link = mysqli_connect($dblocation, $dbuser, $dbpasswd, $dbname);


//$db =new  mysqli($dblocation, $dbuser, $dbpasswd, $dbname);


if (!$link) {
    echo "Error access to MySql";
    exit();
}

// set coding for this conection
mysqli_set_charset($link, 'utf8');

if (!mysqli_select_db($link, $dbname)) {
    echo "Error access to base: {$dbname}";
    exit();
}