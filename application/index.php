<?php
define("HOME", dirname(__FILE__));
const DS = DIRECTORY_SEPARATOR;
const BASEPATH = HOME . DS . "index.php";
const VIEWS = HOME . DS . "views";
const CONTROLLERS = HOME . DS . "controllers";
const MODELS = HOME . DS . "models";
const UTILS = HOME . DS . "utils";

ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

ob_start();
session_start();

require_once HOME . DS . "config.php";
require_once HOME . DS . "utils" . DS . "autoload.php";
require_once HOME . DS . "utils" . DS . "Router.php";


Router::post('/application/lesson', function () {
    if (isset($_SESSION['username'])) {
        $url = VIEWS . DS . "lesson.php";
        require_once $url;
    } else {
        Router::redirect("/application/login");
    }
});

Router::post('/application/login', function () {
    $url = VIEWS . DS . "login.php";
    require_once $url;
});

Router::post('/application/homepage', function () {
    if (isset($_SESSION['username'])) {
        $url = VIEWS . DS . "homepage.php";
        require_once $url;
    } else {
        Router::redirect("/application/login");
    }
});
Router::post('/application/admin', function () {
    if (isset($_SESSION['username'])) {
        $url = VIEWS . DS . "admin.php";
        require_once $url;
    } else {
        Router::redirect("/application/login");
    }
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

Router::post('/application/load', function () {
    if (isset($_SESSION['username'])) {
        $lesson = new Lesson();
        $lesson->get_lesson();
    } else {
        Router::redirect("/application/login");
    }
});

Router::post('/application/next', function () {
    if (isset($_SESSION['username'])) {
        $lesson = new Lesson();
        $lesson->next_lesson();
    } else {
        Router::redirect("/application/login");
    }
});

Router::post('/application/action_login', function () {
    $login = new Login();
    if ($login->action_login()->getStatus() == 'success') {
        Router::redirect('/application/homepage');
    } else {
        Router::redirect('/application/login');
    }
});

Router::post('/application/api_login', function (){
    $login = new Login();
    if($login->api_login()) {
        Router::redirect('/application/homepage');
    } else {
        Router::redirect('/application/login');
    }
});

Router::post('/application/action_signup', function () {
    $signup = new SignUp();
    if ($signup->action_signup()) {
        Router::redirect('/application/login');
    } else {
        Router::redirect('/application/signup');
    }
});

Router::post('/application/logout', function () {
    $logout = new Logout();
    if ($logout->action_logout()->getStatus() == "success") {
        Router::redirect('/application/login');
    } else {
        echo json_encode(array('status' => 'error'));
    }
});

Router::post('/application/404', function () {
    echo "<h1>Error 404 page not found</h1>";
});

Router::run();
