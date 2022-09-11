<?php
    class HG_API {
        private $city       = null;
        private $city_state = null; 
        private $state      = null;
        private $key        = null;
        private $error      = false;

        function __construct($key = null){
            if(!empty($key)) $this->key = $key;
            $this->city_query();
        }

        function city_query() {
            if(!empty($_POST["city"])) $this->city = $_POST["city"];
            if(!empty($_POST["state"])) {
                $this->state = $_POST["state"];
            } else {
                $this->error = true;
                $this->is_error();
            }
            $this->city_state = $this->city.",".$this->state;
        }
        
        function request ($endpoint = "", $params = array()){
            $url = "https://api.hgbrasil.com/".$endpoint."?key=".$this->key."&city_name=".$this->city_state;
            if (!empty($params)){ #verifica se a variavel recebeu algum array
                var_dump($params);
                foreach ($params as $key => $value){
                    if (empty($value)) continue;
                    $url .= $key . "=" . urlencode($value) . "&";
                    #O foreach vai concatenando os parametros recebidos na url.
                }
                $url = substr($url, 0, -1);
                #A string terá um & a mais no final, a função acima retira ele.
                $response = @file_get_contents($url); #O @ serve para ignorar caso der algum erro.
                $this->error = false;
                return json_decode($response, true);
            } else {
                $response = @file_get_contents($url);
                return json_decode($response, true);
            }
        }
        
        function is_error() {
            return $this->error;
        }

        function weather_query($value) {
            $data = $this->request("weather");
            if ($value == "forecast") {
                if (!empty($data) && is_array($data["results"]["forecast"])){
                    $this->error = false;
                    return $data["results"]["forecast"];
                } else {
                    $this->error = true;
                    return false;
                }
            } else if ($value == "results"){
                if (!empty($data) && is_array($data["results"])){
                    $this->error = false;
                    return $data["results"];
                } else {
                    $this->error = true;
                    return false;
                }    
            } else {
                $this->error = true;
                return false;
            }
        }
    }