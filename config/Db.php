<?php


class Db
{
    public static $link;
    public static function getConnection(){
        if(!isset(self::$link)) {
            $config = require_once ROOT . '/config/config.php';
            self::$link = mysqli_connect($config['host'], $config['user'], $config['password'], $config['database']);
            if (mysqli_connect_error()) {
                echo mysqli_connect_error();
                die;
            }
        }
        return self::$link;
    }

}