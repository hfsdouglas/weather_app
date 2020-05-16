<?php
    class HG_API {
        private $woeid = null;
        private $key   = null;
        private $error = false;

        function __construct($key = null, $woeid = null){
            if(!empty($key)) $this->key = $key;
            if(!empty($woeid)) $this->woeid = $woeid;
        }
        
    }