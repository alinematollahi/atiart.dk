<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
        require __DIR__ . '/view/home.php';
        break;
    case '' :
        require __DIR__ . '/view/home.php';
        break;
    case '/cms' :
        require __DIR__ . '/cms/index.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '404.php';
        break;
}