<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Actualiza la página cada 30 minutos -->
    <meta http-equiv="refresh" content="1800" > 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Page</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <?php
    // Get weather info from OWM API
    // Código de https://programacion.net/articulo/pronostico_del_tiempo_utilizando_openweathermap_mediante_php_2035
        require __DIR__ . '/vendor/autoload.php'; 
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();
        $googleApiUrl = "http://api.openweathermap.org/data/2.5/onecall?lat=" . $_ENV['LAT'] . "&lon=". $_ENV['LON'] . "&lang=es&units=metric&APPID=" . $_ENV['APIKEY'];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);

        curl_close($ch);
        $data = json_decode($response);
        $currentTime = time();
    ?>
</head>
<body>
    <div id="flexbox">
        <div id="weather-box">
            <span class="weather-title"><?php echo ucwords($data->current->weather[0]->description)?> <?php echo round($data->current->temp,0); ?>°C</span>
            <img
                src="http://openweathermap.org/img/w/<?php echo $data->current->weather[0]->icon; ?>.png"
                class="weather-icon"
            />
            <span class="weather-more-info">
                <p>Temperatura máxima: <?php echo round($data->daily[0]->temp->max,0)?>°C</p>
                <p>Temperatura mínima: <?php echo round($data->daily[0]->temp->min,0)?>°C</p>
                <p>Humedad: <?php echo $data->current->humidity?>%</p>
                <p>Sensación térmica: <?php echo round($data->current->feels_like,0)?>°C</p>
                <p>Probabilidad de lluvia (1h): <?php echo round((float)$data->hourly[0]->pop * 100 ) . '%'; ?></p>
                <p>Probabilidad de lluvia (hoy): <?php echo round((float)$data->daily[0]->pop * 100 ) . '%'; ?></p>
        </div>
        <div id="hour-and-button">
            <span id="local-time"></span>
            <p>La página se recargará en <span id="countdown"></span>.</p> <button id="reload" onclick=location.reload()>Recargar</button>
            <?php
                if(isset($_POST['button1'])) {
                    shell_exec('exec vcgencmd display_power 0');
                }
            ?>
            <form method="post">
                <input type="submit" name="button1" value="Apagar pantalla"/>
            </form>
        </div> 
    </div>
</body>
</html>
