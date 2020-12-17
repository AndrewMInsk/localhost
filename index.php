<?php


ini_set('display_errors',1);
error_reporting(E_ALL);

define('ROOT',dirname(__FILE__));
session_start();

//Вот это в ветку 1
require_once ROOT . '/autoload.php';
require_once ROOT . '/functions.php';




$router = new Router();
$router->run();