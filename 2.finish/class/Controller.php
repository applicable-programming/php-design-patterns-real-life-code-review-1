<?php
class Controller {
    public function execute($method){
        if(method_exists($this, $method)){
            $this->$method();
        }
    }

    public static function show($viewFilename)
    {
        include 'Views/' . $viewFilename . '.php';
    }
}
