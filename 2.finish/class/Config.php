<?php
final class Config {
    private static $instance = null;
    private static $values = null;

    private function __clone(){}
    private function __wakeup(){}
    private static function init(){
        if(is_null(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct()
    {
        $config['host'] = 'localhost';
        $config['db'] = 'code_review1';
        $config['username'] = 'root';
        $config['password'] = '';

        self::$values = $config;
    }

    public static function getValue($key){
        self::init();
        return self::$values[$key] ?? '';
    }


}
