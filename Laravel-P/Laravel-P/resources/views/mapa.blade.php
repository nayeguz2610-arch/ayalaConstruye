<!DOCTYPE html>
<html>
<head>
    <title>Mapa simple</title>
    <meta name="viewport" content="initial-scale=1.0">
    <style>
        #map {
            height: 90vh;
            width: 100%;
        }
        body, html {
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    <div id="map"></div>

    <script>
        function initMap() {
            const center = { lat: 18.922272, lng: -99.234085 }; // Cuernavaca
            const map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: center
            });
        }
    </script>

    <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCISwR7xUgaV6FUFfefDZjdxq4CzJ4NeYM&callback=initMap">
    </script>
</body>
</html>
