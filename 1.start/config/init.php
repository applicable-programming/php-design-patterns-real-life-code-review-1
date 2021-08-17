<?php

require_once 'config.php';


spl_autoload_register('myAutoLoader');

function myAutoLoader($class_name) {
    require_once ('Controllers/'.$class_name.'.php');
}

