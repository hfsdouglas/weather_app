<?php
    class STATES {
        private $states = [];
        private $error  = false;

        function __construct() {
            $this->states_query();
        }

        private function request($endpoint = "", $params = "") {
            $url = "https://servicodados.ibge.gov.br/api/v1/".$endpoint;
            if (!empty($params)){
                foreach ($params as $key => $value){
                    $url .= "?" . $key . "=" . $value . "&";
                }
                $url = substr($url, 0, -1);
                $response = @file_get_contents($url);
                $this->error = false;
                return $this->setStates(json_decode($response, true));
            } if ($params === null) {
                $response = @file_get_contents($url);
                return $this->setStates(json_decode($response, true));
            } else {
                $this->error = true;
            }
        }
        
        private function states_query() {
            $endpoint = "localidades/estados";
            $order = ["orderBy"=>"nome"];
            $this->request($endpoint, $order);
            $data = $this->getStates();
            //var_dump($data);
        }

        function states() {
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

                    

