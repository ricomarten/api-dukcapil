<?php
$folder="api-dukcapil";
$request = $folder."/".$_SERVER['REQUEST_URI'];
$viewDir = '/views/';
$serviceDir = '/services/';

echo $_SERVER['REQUEST_URI']."<br>";
echo __DIR__ . $viewDir;
switch ($request) {
    case '':
    case '/':
        require __DIR__ . $viewDir . 'home.php';
        break;
    
    case '/services/login':
        require __DIR__ . $serviceDir . 'login.php';
        break;
    case '/views/users':
        require __DIR__ . $viewDir . 'users.php';
        break;

    case '/contact':
        require __DIR__ . $viewDir . 'contact.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . $viewDir . '404.php';
}
