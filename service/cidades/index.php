<?php

$data = array();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $data = getcities($_GET['id']);
    }
}

function getcities($id) {
    $url = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/'.$id.'/municipios/?orderBy=nome';
    $response = @file_get_contents($url);
    return json_decode($response);
}

header('content-type: application/json; charset=utf-8');
echo json_encode($data);

