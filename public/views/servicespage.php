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
    <div class="main-container split">
        <div class="left">
            <h1 id="loc-title">Localization</h1>
            <div id="map"></div>
        </div>
        <div id="loc-description" class="right"><br>Currently it is possible to pick and leave vehicles in Polish city Kraków on Warszawska 24 street. We are still working to extend the range of our car rental to other locations. We will let you know in the near future!</div>
    </div>
</body>
</html>