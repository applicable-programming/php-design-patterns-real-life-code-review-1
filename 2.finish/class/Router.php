<?php
class Router {
    private $uri;
    public function __construct($uri)
    {
        $this->uri = $uri;
    }

    public function parseRoute($route=''){
        if($route != ''){
            $this->uri = $route;
        }
        $route = str_replace('', "", $this->uri);
        $route = explode('/', $route);
        return $route;
    }
}
