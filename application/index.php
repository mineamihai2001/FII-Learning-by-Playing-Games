<?php
define("DS", DIRECTORY_SEPARATOR);
define("HOME", dirname(__FILE__));
define("BASEPATH", HOME . DS . "index.php");
define("VIEWS", HOME . DS . "views");
define("CONTROLLERS", HOME . DS . "controllers");
define("MODELS", HOME . DS . "models");

ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

ob_start();
// session_start();

require_once HOME . DS . "config.php";
require_once HOME . DS . "utils" . DS . "autoload.php";
require_once HOME . DS . "utils" . DS . "Router.php";


Router::post('/application/lesson', function () {
    $url = VIEWS . DS . "lesson.php";
    require_once $url;
});

Router::post('/application/login', function () {
    $url = VIEWS . DS . "login.php";
    require_once $url;
});

Router::post('/application/homepage', function () {
    $url = VIEWS . DS . "homepage.php";
    require_once $url;
});
Router::post('/application/admin', function () {
    $url = VIEWS . DS . "admin.php";
    require_once $url;
});

Router::post('/application/signup', function () {
    $url = VIEWS . DS . "signup.php";
    require_once $url;
});

Router::get('/application/list?type={var_type}&id={var_id}', function () {
    $controller = new MyController();
    $controller->request();
});

Router::get('/application/list?type={var_type}', function () {
    $controller = new MyController();
    $controller->request();
});

Router::post('/application/action_login', function () {
    $login = new Login();
    if($login->action_login()) {
        Router::redirect('/application/homepage');
    } else {
        Router::redirect('/application/login');
    }
});

Router::post('/application/action_signup', function() {
    $signup = new SignUp();
    if($signup->action_signup()) {
        Router::redirect('/application/login');
    } else {
        Router::redirect('/application/signup');
    }
});

Router::post('/application/404', function () {
    echo "<h1>Error 404 page not found</h1>";
});

Router::run();
