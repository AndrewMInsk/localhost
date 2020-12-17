<?php


ini_set('display_errors',1);
error_reporting(E_ALL);

define('ROOT',dirname(__FILE__));
session_start();

var_dump(floor( (0.1 + 0.7) * 10 ));
//8
require_once ROOT . '/autoload.php';
require_once ROOT . '/functions.php';




$router = new Router();
$router->run();