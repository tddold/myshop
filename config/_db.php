<?php

/* *
 * Initialize conection db
 * 
 * 
 */

class DB {

    private $dblocation = "127.0.0.1";
    private $dbname = "myshoop";
    private $dbuser = "root";
    private $dbpasswd = "";
    private $db = false;

    function __construct() {
        $this->db = new mysqli($this->dblocation, $this->dbuser, $this->dbpasswd, $this->dbname);

        if (!$this->db) {
            die('Cannot conect to database server');
        }
    }

    function __destruct() {
        if ($this->db) {
            $this->db->colose();
        }
    }

    function refValues($arr) {
        if (strnatcmp(phpversion(), '5.3') >= 0) { //Reference is required for PHP 5.3+
            $refs = array();
            foreach ($arr as $key => $value)
                $refs[$key] = &$arr[$key];
            return $refs;
        }
        return $arr;
    }

    function paramTypes($params = array()) {
        $types = '';

        foreach ($params as $param) {
            if (is_numeric($param))
                $types .= 'd';
            elseif (is_string($param))
                $types .= 's';
            else
                $types .= 'b';
        }
        return $types;
    }
    
     function select($sql, $params = array()) {
        $rs = NULL;
        $st = $this->db->prepare($sql);

        if (!empty($params)) {
            $types = $this->paramTypes($params);
            call_user_func_array(array($st, "bind_param"), array_merge(array($types), $this->refValues($params)));
        }
        $st->execute();
        $rs = $st->get_result();

//        while ($row = $result->fetch_assoc())
//            $out[] = $row;

        $st->close();
        return $rs;
    }

}

//$link = mysqli_connect($dblocation, $dbuser, $dbpasswd, $dbname);
//
//
////$db =new  mysqli($dblocation, $dbuser, $dbpasswd, $dbname);
//
//
//if (!$link) {
//    echo "Error access to MySql";
//    exit();
//}
//
//// set coding for this conection
//mysqli_set_charset($link, 'utf8');
//
//if (!mysqli_select_db($link, $dbname)) {
//    echo "Error access to base: {$dbname}";
//    exit();
//}

