<?php

spl_autoload_register('autoload');

function autoload($className)
{
    $arrayPaths = array(
        'config',
        'models',
        'components'
    );
    foreach ($arrayPaths as $path) {
        $path = ROOT . '/' . $path . '/' . $className . '.php';

        if(is_file($path)){
           // echo $path.' included<br>';
            include_once $path;
        }
    }
}


