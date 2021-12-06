<?php

spl_autoload_register(
    function ($className) {
        $classPath = [
            "app".DIRECTORY_SEPARATOR."Controllers",
            "app".DIRECTORY_SEPARATOR."Models",
            "config",
            "views",
            "views".DIRECTORY_SEPARATOR."pages"
        ];

        foreach($classPath as $path) {
            $class = (__DIR__.DIRECTORY_SEPARATOR.$path.DIRECTORY_SEPARATOR.$className.'.php');

            if(file_exists($class)) {
                require_once $class;
            }
        }
});