<?php
    require_once("config/config.php");
    $tempo = new HG_API(HG_API_KEY);
    $states = new STATES();
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
                <input type="text" name="city">
                <select name="state" id="">
                    <?=$states->get_states()?>
                </select>
            <button type="submit">Pesquisar</button>
            </form>
        </div>
    </div>
    
</body>
</html>