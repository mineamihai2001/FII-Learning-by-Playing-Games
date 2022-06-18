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
        "footer" => "yes",

    ),
    "homepage.php" => array(
        "title" => "Home",
        "navbar" => "yes",
        "style" => "/www/css/homapagemain.css",
        "src" => "/www/js/index.js",
        "footer" => "yes",

    ),
    "lessonmodel.php" => array(
        "title" => "Lesson",
        "navbar" => "yes",
        "style" => "/www/css/lesson.css",
        "src" => "/www/js/lesson.js",
        "footer" => "yes",

    ),
    "admin.php" => array(
        "title" => "Admin Console",
        "navbar" => "yes",
        "style" => "/www/css/Design.css",
        "src" => "/www/js/index.js",
        "footer" => "yes",

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
        "style" => "/www/css/homapagemain.css",
        "src" => "/www/js/index.js",
        "footer" => "yes",

    ),
    "lesson" => array(
        "title" => "Lesson",
        "navbar" => "yes",
        "style" => "/www/css/lesson.css",
        "src" => "/www/js/lesson.js",
        "footer" => "yes",

    ),
    "admin" => array(
        "title" => "Admin Console",
        "navbar" => "yes",
        "style" => "/www/css/Design.css",
        "src" => "/www/js/index.js",
        "footer" => "yes",
    ),
    "about" => array(
        "title" => "About",
        "navbar" => "yes",
        "style" => "/www/css/aboutpage.css",
        "src" => "/www/js/index.js",
        "footer" => "yes",
    ),

    "account" => array(
        "title" => "Account",
        "navbar" => "yes",
        "style" => "/www/css/account.css",
        "src" => "/www/js/index.js",
        "footer" => "yes",

    ),
);


$route = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$page = $route[sizeof($route) - 1];

if (isset($pages[$page]))
    $page = $pages[$page];
else $page = "";
