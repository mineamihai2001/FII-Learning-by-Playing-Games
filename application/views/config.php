<?php
$pages = array(
    "login.php" => array(
        "title" => "Login",
        "navbar" => "no",
        "style" => "/www/css/login.css",
        "src" => "/www/js/login.js",
    ),
    "signup.php" => array(
        "title" => "Sign-up",
        "navbar" => "no",
        "style" => "/www/css/signup.css",
        "src" => "/www/js/signup.js",

    ),
    "homepage.php" => array(
        "title" => "Home",
        "navbar" => "yes",
        "style" => "/www/css/homapagemain.css",
        "src" => "/www/js/index.js",

    ),
    "lessonmodel.php" => array(
        "title" => "Lesson",
        "navbar" => "yes",
        "style" => "/www/css/lesson.css",
        "src" => "/www/js/lesson.js",

    ),
    "admin.php" => array(
        "title" => "Admin Console",
        "navbar" => "yes",
        "style" => "/www/css/Design.css",
        "src" => "/www/js/index.js",

    ),
    "login" => array(
        "title" => "Login",
        "navbar" => "no",
        "style" => "/www/css/login.css",
        "src" => "/www/js/login.js",
    ),
    "signup" => array(
        "title" => "Sign-up",
        "navbar" => "no",
        "style" => "/www/css/signup.css",
        "src" => "/www/js/signup.js",
    ),
    "homepage" => array(
        "title" => "Home",
        "navbar" => "yes",
        "footer" => "yes",
        "style" => "/www/css/homapagemain.css",
        "src" => "/www/js/index.js",

    ),
    "lesson" => array(
        "title" => "Lesson",
        "navbar" => "yes",
        "style" => "/www/css/lesson.css",
        "src" => "/www/js/lesson.js",

    ),
    "admin" => array(
        "title" => "Admin Console",
        "navbar" => "yes",
        "style" => "/www/css/Design.css",
        "src" => "/www/js/index.js",
    ),
    "about" => array(
        "title" => "About",
        "navbar" => "yes",
        "style" => "/www/css/aboutpage.css",
        "src" => "/www/js/index.js",
    ),

    "account" => array(
        "title" => "Account",
        "navbar" => "yes",
        "style" => "/www/css/account.css",
        "src" => "/www/js/index.js",
    ),
);


$route = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$page = $route[sizeof($route) - 1];

if (isset($pages[$page]))
    $page = $pages[$page];
else $page = "";
