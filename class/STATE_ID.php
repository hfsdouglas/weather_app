<?php
    require_once('CITIES.php');
    if(isset($_GET)){
        $ID = $_GET['q'];
    }
    
    $cities = new CITIES($ID);
    
    echo $cities->cities();