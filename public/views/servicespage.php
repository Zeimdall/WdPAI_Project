<!DOCTYPE html>
<html>
<head>
    <title>SERVICE PAGE</title>
    <?php include 'headPage.php'?>
    <script type="text/javascript" src="./public/js/map.js" defer></script>
    <meta name='viewport' content='width=device-width, initial-scale=1' />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
</head>
<body>
    <?php include 'header_mainpage.php'?>
    <div class="main-container divide">
        <h1>Lokalizacje</h1>
        <div id="map"></div>
        <h3>Parking</h3>
        <div class="text-description">Aktualnie jest możliwość odbioru, a także zostawienia pojazdów w Krakowie na ulicy Warszawskiej 24. Staramy się zwiększyć zasięg naszej wypożyczalni o inne lokalizacje.</div>
    </div>
</body>
</html>