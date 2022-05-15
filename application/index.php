<?php
define('DS', DIRECTORY_SEPARATOR);
define('HOME', dirname(__FILE__));
define('BASEPATH', HOME . DS .'index.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once HOME . DS . 'config.php';
require_once HOME . DS .'utils'. DS .'autoload.php';


$controller = new MyController();
$controller->request();