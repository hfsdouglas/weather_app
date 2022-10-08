<?php
    class STATES {
        private $states = [];
        private $idStateSaved = null;
        private $error  = false;

        function __construct() {
            $this->states_query($start = "states");
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
            if (strlen($endpoint) == 19) {
                if (!empty($params)){
                    $url = $this->url($url, $params);
                    $response = @file_get_contents($url);
                    return $this->setStates(json_decode($response, true));
                } else {
                    $response = @file_get_contents($url);
                    return $this->setStates(json_decode($response, true));
                }
            }        
        }
        
        private function states_query($value = "") {
            $endpoint = "localidades/estados";
            if (!empty($value) && $value == "states") {
                $params = ["orderBy"=>"nome"];
                $this->request($endpoint, $params);
            }
        }

        public function states() {
            $data = $this->getStates();
            if (!empty($data) && is_array($data)) {
                foreach($data as $key => $value) {
                    echo "<option id={$data[$key]["id"]} value={$data[$key]["sigla"]}>{$data[$key]["sigla"]}</option>";
                } 
            }
        }

        private function is_error() {
            return $this->error;
        }

        public function getIdStateSaved() {
            return $this->idStateSaved; 
        }

        public function getStates() {
            return $this->states;
        }
        
        public function setStates($value) {
            $this->states = $value;
        }
    }
?>