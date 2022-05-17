<?php
$pages = array(
    "login.php" => array(
        "title" => "Login",
        "navbar" => "no",
        "style" => "/www/css/login.css",
        "src" => "login.js",
    ),
    "signup.php" => array(
        "title" => "Sign-up",
        "navbar" => "no",
        "style" => "/www/css/signup.css",
        "src" => "index.js",

    ),
    "homepage.php" => array(
        "title" => "Home",
        "navbar" => "yes",
        "style" => "/www/css/homapagemain.css",
        "src" => "index.js",

    ),
    "lesson.php" => array(
        "title" => "Lesson",
        "navbar" => "yes",
        "style" => "/www/css/lesson.css",
        "src" => "/www/js/lesson.js",

    ),
    "admin.php" => array(
        "title" => "Admin Console",
        "navbar" => "yes",
        "style" => "/www/css/Design.css",
        "src" => "index.js",

    ),
);

$route = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$page = $route[sizeof($route) - 1];

$page = $pages[$page];
