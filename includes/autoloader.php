<?php


function myAutoLoader($class){
    $directories = [
        __DIR__ .  "/../",
    ];
    $extension = ".php";

    foreach ($directories as $directory){
        $fullPath = $directory . str_replace('\\', '/', $class) . $extension;

        if(file_exists($fullPath)) {
            require_once $fullPath;
            return true;
        }
    }
    return false;
}
spl_autoload_register('myAutoLoader');



