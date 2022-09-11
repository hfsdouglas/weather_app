<?php
    require_once("config/config.php");
    $tempo = new HG_API(HG_API_KEY);
    $previsao = $tempo->weather_query($value = "forecast");
    $descricao = $tempo->weather_query($value = "results");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Previsão do Tempo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/weather.css">
</head>
<body>
    <div class="container">
        <div class="row m-2 p-2">
           <div id="header" class="w-100 text-center">Previsão do tempo para <?=$descricao["city"]?></div>
        </div>
           <div class="row justify-content-md-center"> 
                <div class="col-2 m-1 p-3 text-center border-primary rounded bg-primary text-light">
                    <h1><?=$previsao[0]["weekday"]?> - <?=$previsao[0]["date"]?></h1>
                    <p>Temperatura atual = <?=$descricao["temp"]?>°C</p>
                    <p>Temp. Máx = <?=$previsao[0]["max"]?>°C</p>
                    <p>Temp. Mín = <?=$previsao[0]["min"]?>°C</p>
                    <p><?=$previsao[0]["description"]?></p>
                </div>
                <div class="col-2 m-1 p-3 text-center border-secondary rounded bg-secondary text-light">
                    <h1><?=$previsao[1]["weekday"]?> - <?=$previsao[1]["date"]?></h1>
                    <p>Temp. Máx = <?=$previsao[1]["max"]?>°C</p>
                    <p>Temp. Mín = <?=$previsao[1]["min"]?>°C</p>
                    <p><?=$previsao[1]["description"]?></p>
                </div>
            </div>
            <div class="row justify-content-md-center"> 
                <div class="col-2 m-1 p-3 text-center border-secondary rounded bg-secondary text-light">
                    <h1><?=$previsao[2]["weekday"]?> - <?=$previsao[2]["date"]?></h1>
                    <p>Temp. Máx = <?=$previsao[2]["max"]?>°C</p>
                    <p>Temp. Mín = <?=$previsao[2]["min"]?>°C</p>
                    <p><?=$previsao[2]["description"]?></p>
                </div>
                <div class="col-2 m-1 p-3 text-center border-secondary rounded bg-secondary text-light">
                    <h1><?=$previsao[3]["weekday"]?> - <?=$previsao[3]["date"]?></h1>
                    <p>Temp. Máx = <?=$previsao[3]["max"]?>°C</p>
                    <p>Temp. Mín = <?=$previsao[3]["min"]?>°C</p>
                    <p><?=$previsao[3]["description"]?></p>
                </div>
            </div>
            <div class="row justify-content-md-center"> 
                <div class="col-2 m-1 p-3 text-center border-secondary rounded bg-secondary text-light">
                    <h1><?=$previsao[4]["weekday"]?> - <?=$previsao[4]["date"]?></h1>
                    <p>Temp. Máx = <?=$previsao[4]["max"]?>°C</p>
                    <p>Temp. Mín = <?=$previsao[4]["min"]?>°C</p>
                    <p><?=$previsao[4]["description"]?></p>
                </div>
                <div class="col-2 m-1 p-3 text-center border-secondary rounded bg-secondary text-light">
                    <h1><?=$previsao[5]["weekday"]?> - <?=$previsao[5]["date"]?></h1>
                    <p>Temp. Máx = <?=$previsao[5]["max"]?>°C</p>
                    <p>Temp. Mín = <?=$previsao[5]["min"]?>°C</p>
                    <p><?=$previsao[5]["description"]?></p>
                </div>
            </div>
        </div>
    </div>    

    <!-- JS BOOTSTRAP LIBRARY -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>