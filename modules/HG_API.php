<?php
    class HG_API {
        private $woeid = null;
        private $key   = null;
        private $error = false;

        function __construct($key = null, $woeid = null){
            if(!empty($key)) $this->key = $key;
            if(!empty($woeid)) $this->woeid = $woeid;
        }

        function request ($endpoint = "", $params = array()){
            $url = "https://api.hgbrasil.com/".$endpoint."?woeid=".$this->woeid."&key=".$this->key;
            if (is_array($params)){ #verifica se a variavel recebeu algum array
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
                $this->error = true;
                return false;
            }
        }
        
        function is_error (){
            return $this->error;
        }

        function weather_query(){
            $data = $this->request("weather");
            if (!empty($data) && is_array($data["results"]["forecast"])){
                $this->error = false;
                return $data["results"]["forecast"];
            } else {
                $this->error = true;
                return false;
            }
        }
    }