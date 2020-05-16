<?php
    spl_autoload_register(function($className){
        $filename = $className . ".php";
        if (!empty($filename)){
            require_once($filename);
        }
    });