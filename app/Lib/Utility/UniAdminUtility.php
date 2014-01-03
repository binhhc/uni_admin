<?php

class UniAdminUtility {

    public static function isEmail($str) {
        $emailPattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
        $res = preg_match($emailPattern, $str);
        return ( $res == 1 ) ? true : false;
    }
    
    public static function splitArray($delimiter, $str, $indexToGet) {
        $res = explode($delimiter, $str);
        return !empty($res[$indexToGet]) ? $res[$indexToGet] : false;
    }
}