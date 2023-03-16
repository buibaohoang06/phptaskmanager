<?php

$url = parse_url($_SERVER['REQUEST_URI'])['path']; 

$routes = [
    "/" => "views/home.view.php",
    "/login" => "controller/login.php",
    "/register" => "controller/register.php",
    "/dashboard" => "controller/dashboard.php",
    "/logout" => "controller/logout.php"
];

if (array_key_exists($url, $routes)){
    include $routes[$url];
} else {
    http_response_code(404);
    include 'views/404.view.php';
}