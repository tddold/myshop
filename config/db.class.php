<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of db
 *
 * @author MyPC
 */
class DB {

    private $dblocation = "127.0.0.1";
    private $dbname = "myshoop";
    private $dbuser = "root";
    private $dbpasswd = "";
    private $db = false;

    function __construct() {
        $this->db = new mysqli($this->dblocation, $this->dbuser, $this->dbpasswd, $this->dbname);
//
//        $link = mysqli_connect($this->dblocation, $this->dbuser, $this->dbpasswd, $this->dbname);
//        mysqli_set_charset($link, 'utf8');

        if (!$this->db) {
            die('Cannot conect to database server');
        }
    }

    function __destruct() {
        if ($this->db) {
            $this->db->close();
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
