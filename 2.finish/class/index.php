<?php
require_once 'Config.php';
require_once 'Router.php';
require_once 'Controller.php';
require_once '../Controllers/HomeController.php';
require_once 'ControllerFactory.php';
require_once 'Validation.php';

var_dump(Config::getValue('db'));
var_dump(Config::getValue('host'));
var_dump(Config::getValue('username'));
var_dump(Config::getValue('FAKE'));

$router = new Router('/results');
//$router->parseRoute( $_SERVER['REQUEST_URI']);
//$route = $router->parseRoute('/search');
//$route = $router->parseRoute();
//$route = $router->parseRoute('/user/logout');
//var_dump($route);
//
$controllerFactory = new ControllerFactory();
////$controller = $controllerFactory->make($route, new stdClass());
$controller = $controllerFactory->makeFromRouter($router, new stdClass());
//var_dump($controller);

$validation = new Validation();
var_dump($validation->validateEmail('test@text.com'));
var_dump($validation->validateEmail('1231'));
var_dump($validation->validateEmail('test@text.com'));
var_dump($validation->validateEmail('1231'));
var_dump($validation->validateEmail('test@text.com'));
var_dump($validation->validateEmail('1231'));
var_dump($validation->validateEmail('test@text.com'));
var_dump($validation->validateEmail('1231'));
var_dump($validation->validateEmail('test@text.com'));
var_dump($validation->validateEmail('1231'));
