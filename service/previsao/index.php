<?php
    require_once("../../config/config.php"); 
    require_once("../../class/HG_API.php");
    $forecast = new HG_API(HG_API_KEY);

    $response = array();

    if($_SERVER["REQUEST_METHOD"] === "GET") {
        $response = $forecast->request($_GET['city'], $_GET['state']);
    }

    header('content-type: application/json; charset=utf-8');
    echo json_encode($response);
 