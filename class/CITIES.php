<?php
    class CITIES {
        private $cities = [];
        private $id = null;
        private $error  = false;

        function __construct() {
            $this->id = $_REQUEST['q'];
            var_dump($this->id);
        }

        private function url($url, $params) {
            foreach ($params as $key => $value){
                $url .= "?" . $key . "=" . $value . "&";
            }
            $url = substr($url, 0, -1);
            return $url;
        }

        private function request($endpoint = "", $params = "") {
            $url = "https://servicodados.ibge.gov.br/api/v1/".$endpoint;
            echo(strlen($endpoint));
            if (strlen($endpoint) == 19) {
                if (!empty($params)){
                    $url = $this->url($url, $params);
                    $response = @file_get_contents($url);
                    return $this->setStates(json_decode($response, true));
                } else {
                    $response = @file_get_contents($url);
                    return $this->setStates(json_decode($response, true));
                }
            } else {
                if (!empty($params)){
                    $url = $this->url($url, $params);
                    $response = @file_get_contents($url);
                    return $this->setCities(json_decode($response, true));
                } else {
                    $response = @file_get_contents($url);
                    return $this->setCities(json_decode($response, true));
                }
            }         
            
        }
        
        private function city_query($id = null) {
            $endpoint = "localidades/estados";
            if (isset($id)) {
                $this->id = $id;
                $endpoint = "localidades/estados/" . $id . "/municipios";
                $params = ["orderBy"=>"nome"]; 
                $this->request($endpoint, $params);
            }
        }

        public function states() {
            $data = $this->getStates();
            var_dump($data);
            if (!empty($data) && is_array($data)) {
                foreach($data as $key => $value) {
                    if ($data[$key]["sigla"] == "AC"){
                        echo "<option value={$data[$key]["nome"]} selected>{$data[$key]["sigla"]}</option>";
                    } else {
                        echo "<option value={$data[$key]["nome"]}>{$data[$key]["sigla"]}</option>";
                    }
                } 
            }
        }

        public function cities() {
            $id = "";
            $data = "";
        }

        private function is_error() {
            return $this->error;
        }

        public function getStates() {
            return $this->states;
        }
        
        public function setStates($value) {
            $this->states = $value;
        }
    }

?>