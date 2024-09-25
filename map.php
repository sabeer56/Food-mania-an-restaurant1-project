<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Maps Example</title>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>

<h2>My Location</h2>
<div id="map"></div>

<script>
    function initMap() {
        // Default coordinates (you can change these)
        var myLatLng = {lat: 37.7749, lng: -122.4194};

        // Create a map centered at the default coordinates
        var map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 12
        });

        // Create a marker at the default coordinates
        var marker = new google.maps.Marker({
            map: map,
            position: myLatLng,
            title: 'My Location'
        });
    }
    function handleError() {
        console.error('Error loading Google Maps API. Check your API key and network connection.');
    }
</script>


// <!DOCTYPE html>
// <html lang="en">
// <head>
//     <meta charset="UTF-8">
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">
//     <title>Google Maps Example</title>
//     <style>
//         #map {
//             height: 400px;
//             width: 100%;
//         }
//     </style>
// </head>
// <body>

// <h2>My Location</h2>
// <div id="map"></div>

// <script>
//     function initMap() {
//         var myLatLng = {lat: 37.7749, lng: -122.4194};
//         var map = new google.maps.Map(document.getElementById('map'), {
//             center: myLatLng,
//             zoom: 12
//         });

//         var marker = new google.maps.Marker({
//             map: map,
//             position: myLatLng,
//             title: 'My Location'
//         });
//     }





// </body>
// </html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Maps Example</title>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>

<h2>My Location</h2>
<div id="map"></div>

<script>
    function initMap() {
        var myLatLng = {lat: 37.7749, lng: -122.4194};
        var map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 12
        });

        var marker = new google.maps.Marker({
            map: map,
            position: myLatLng,
            title: 'My Location'
        });
    }
</script>

<!-- Load the Google Maps API with your API key -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Maps Example</title>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>

<h2>My Location</h2>
<div id="map"></div>

<script>
    function initMap() {
        var myLatLng = {lat: 37.7749, lng: -122.4194};
        var map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 12
        });

        var marker = new google.maps.Marker({
            map: map,
            position: myLatLng,
            title: 'My Location'
        });
    }
</script>

<!-- Load the Google Maps API with your API key -->
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"
        onerror="handleError()">
</script>

<script>
    function handleError() {
        console.error('Error loading Google Maps API. Check your API key and network connection.');
    }
</script>

</body>
</html>

