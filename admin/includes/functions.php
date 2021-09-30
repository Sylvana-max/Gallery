<?php
// function to auto load the classes that are not included in my application
function classAutoLoader($class){
    $class = strtolower($class);
    $the_path = "includes/{$class}.php";

    if(is_file($the_path) && !class_exists($class)){
        require_once $the_path;
    }
    else{
        die("This file name {$class}.php was not found...");
    }

    function redirect($location){
        header("Location: {$location}");
    }
}


//spl_autoload_register('classAutoLoader');

