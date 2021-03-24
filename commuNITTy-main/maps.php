<html>
<head>
    <meta charset='utf-8' />
    <title>Display driving directions</title>
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.1.1/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.1.1/mapbox-gl.css' rel='stylesheet' />



    <style>
        body { margin:0; padding:0; }
        #map { position:absolute; top:0; bottom:0; width:100%; }
    </style>
</head>
<body>

<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.0.0/mapbox-gl-directions.js'></script>
<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.0.0/mapbox-gl-directions.css' type='text/css' />
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>
<body>


<div id='map'></div>

<script>
    mapboxgl.accessToken = 'pk.eyJ1Ijoibml0aGluMTk5OSIsImEiOiJjanlhYmoxd3gwMDZjM2xvNTFneG96aDJoIn0.xVdlEuwoEz6VPUMKNFe70A';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [78.81595,10.75880],
        zoom: 15

    });

    map.addControl(new MapboxDirections({
        accessToken: mapboxgl.accessToken

    }), 'top-left');

    map.addControl(new mapboxgl.GeolocateControl({
        zoom: 15,
        positionOptions: {
            enableHighAccuracy: true

        },
         trackUserLocation: true


    }));

document.getElementById(Locationa).innerHTML= map.addControl(new mapboxgl.GeolocateControl({
    zoom: 15,
    positionOptions: {
        enableHighAccuracy: true
    },
    trackUserLocation: true


}));


</script>

</body>
</html>