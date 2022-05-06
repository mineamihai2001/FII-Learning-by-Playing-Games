<?php

spl_autoload_register('autoload');

function autoload($class)
{
    // if (file_exists(HOME . '/utils' . strtolower($class) . '.php')) {
    //     include_once HOME . '/utils' . strtolower($class) . '.php';
    // } else if (file_exists(HOME . '/models' . strtolower($class) . '.php')) {
    //     include_once HOME . '/models' . strtolower($class) . '.php';
    // } else if (file_exists(HOME . '/controllers' . strtolower($class) . '.php')) {
    //     include_once HOME . '/controllers'  . strtolower($class) . '.php';
    // } else if (file_exists(HOME . '/views' . strtolower($class) . '.php')) {
    //     include_once HOME . '/views'  . strtolower($class) . '.php';
    // }

    $folders = array('models', 'controllers', 'utils');

    foreach($folders as $folder) {
        $path = HOME . DS . $folder . DS;
        $extension = '.php';
        $fullPath = $path . $class . $extension;
        if(file_exists($fullPath)) {
            require_once $fullPath;
        }
    }
}
