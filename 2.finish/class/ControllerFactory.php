<?php
class ControllerFactory{
    public function make($route, $dbHandle){

        switch ($route[1] ?? '') {

            case '':
            case 'home':
            case 'index.php':
            case 'login':
            case 'results':
            case 'register':
                return new HomeController();

            case 'logout':
            case 'registerUser':
            case 'loginUser':
            case 'search':
                return new UserController($dbHandle);
        }
    }

    public function makeFromRouter(Router $router, $dbHandle){
        return $this->make($router->parseRoute(), $dbHandle);
    }
}
