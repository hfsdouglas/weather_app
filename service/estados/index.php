<?php

$dados = array();

if ($_SERVER['REQUEST_URI'] === '/weather_app/service/estados/')  {
    $dados = getEstados();
}

function getEstados() {
    $url = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/?orderBy=nome';
    $response = @file_get_contents($url);
    return json_decode($response);
}

header('content-type: application/json; charset=utf-8');
echo json_encode($dados);