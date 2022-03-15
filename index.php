<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Page</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" async></script>
    <?php require __DIR__ . '/vendor/autoload.php'; ?>
</head>
<body>
    <?php
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();
    ?>
    Lorem ipsum
    <span id="local-time"></span>
</body>
</html>
