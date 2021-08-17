<?php
session_start();
require 'config/init.php';

$dbHandle = new PDO("mysql:host=$host;dbname=$db", $username, $password);
$dbHandle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbHandle->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


//TODO: Create Router class and make improvements

$route = str_replace('', "", $_SERVER['REQUEST_URI']);
$route = explode('/', $route);

switch ($route[1]??'') {

    case '':
    case 'home':
    case 'index.php':
       HomeController::show();
        break;

    case 'login':
        HomeController::showLoginForm();
        break;

    case 'logout':
        UserController::logout();
        break;

    case 'results':
        HomeController::showResults();
        break;

    case 'register':
        HomeController::showRegisterForm();
        break;

    case 'registerUser':
        $user = new UserController($dbHandle);
        $user->register();
        break;

    case 'loginUser':
        $user = new UserController($dbHandle);
        $user->login();
        break;

 case 'search':
        $user = new UserController($dbHandle);
        $user->findUser();
        break;

    default:
        include 'Views/404.php';
        break;

}
