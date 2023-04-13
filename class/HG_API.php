<?php
    class HG_API {
        private $key        = null;
        private $error      = false;
        private $city_name  = null;

        function __construct($key = null){
            if(!empty($key)) $this->key = $key;
        }
        
        function request ($city, $state){
            if(!empty($city) && !empty($state)) {
                $name = $city . ',' . $state;
                $this->city_name = str_replace(' ', '%20', $name);
                if (isset($this->city_name)) {
                    $url = "https://api.hgbrasil.com/weather/?key=" . $this->key . "&city_name=" . $this->city_name;
                    $response = @file_get_contents($url);
                    return json_decode($response);
                }
            } else {
                return array('msg' => 'Verifique as informações de cidade e estado, por favor!');
            }
        }

    }