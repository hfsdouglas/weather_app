<?php
    class CITIES {
        private $cities = [];
        private $id = null;
        private $error  = false;

        function __construct($id_value) {
            $this->setID($id_value);
            $this->city_query();
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
            if (!empty($params)){
                $url = $this->url($url, $params);
                $response = @file_get_contents($url);
                return $this->setCities(json_decode($response, true));
            } else {
                $response = @file_get_contents($url);
                return $this->setCities(json_decode($response, true));
            }        
        }
        
        private function city_query() {
            $endpoint = "localidades/estados";
            if (isset($this->id)) {
                $endpoint = "localidades/estados/" . $this->id . "/municipios";
                $params = ["orderBy"=>"nome"]; 
                $this->request($endpoint, $params);
            }
        }

        public function cities() {
            $data = $this->getCities();
            if (!empty($data) && is_array($data)) {
                foreach($data as $key => $value) {
                    echo "<option>{$data[$key]["nome"]}</option>";
                } 
            }
        }

        private function setID ($value) {
            $this->id = $value;
        }

        private function is_error() {
            return $this->error;
        }

        public function getCities() {
            return $this->states;
        }
        
        public function setCities($value) {
            $this->states = $value;
        }
    }

?>