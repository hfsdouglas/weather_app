<?php
    define(HG_API_KEY, "cbe31146");

    spl_autoload_register(function($className){
        $filename = $className . ".php";
        if (!empty($filename)){
            require_once($filename);
        }
    });