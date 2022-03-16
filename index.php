<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Actualiza la página cada 5 horas -->
    <meta http-equiv="refresh" content="18000" > 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Page</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <?php
    // Get weather info with OWM API
    // Código de https://programacion.net/articulo/pronostico_del_tiempo_utilizando_openweathermap_mediante_php_2035
        require __DIR__ . '/vendor/autoload.php'; 
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();
        $googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $_ENV['CITY'] . "&lang=en&units=metric&APPID=" . $_ENV['APIKEY'];

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
            <div class="time">
                <?php print_r($data) ?>
                <div><?php echo ucwords($data->weather[0]->description); ?></div>
            </div>
            <div class="weather-forecast">
                <img
                    src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                    class="weather-icon" /> <?php echo $data->main->temp_max; ?>°C
            </div>
            <div class="time">
                <div>Humidity: <?php echo $data->main->humidity; ?> %</div>
             <div>Wind: <?php echo $data->wind->speed; ?> km/h</div>
            </div>
        </div>
        <div id="hour-and-button">
            <span id="local-time"></span>
        </div> 
    </div>
    Lorem ipsum
    <span id="local-time"></span>

</body>
</html>
