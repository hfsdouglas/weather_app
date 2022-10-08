<?php
    require_once("config/config.php");
    $tempo = new HG_API(HG_API_KEY);
    $states = new STATES();
    $cities = new CITIES($id_value = null);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/index.css">
    <title>Previsão do Tempo</title>
</head>
<body>
    <div class="container">
        <div class="box">
            <h1>Saiba a previsão do tempo na sua cidade!</h1>
            <form action="weather.php" method="post">
                <div class="box-1 box-form">
                    <select name="state" onchange="loadCities()" id="states">
                        <option selected>---</option>
                        <?=$states->states()?>
                    </select>
                    <select name="city" id="cities">
                        <option selected>---</option>
                        <?$cities->cities()?>
                    </select>
                </div>
                <div class="box-2 box-form">
                    <button type="submit">Pesquisar</button>
                </div>
            </form>
        </div>
    </div>
    <script src="scripts/index.js"></script>
</body>
</html>