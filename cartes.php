<?php
require 'structPage.inc.php';
start_page();
?>
    <div class="article">
        <h1 color="red">Réaliser un signalement</h1>
        <table>
            <tr>
                <td>
                    Type signalement
                </td>
                <td>
                    <select id="select">
                        <option value="bus">Bus</option>
                        <option value="pieton">Piéton</option>
                        <option value="velo">Cycliste</option>
                        <option value="deuxRoue">Deux roues</option>
                        <option value="camion">Poids lourd</option>
                        <option value="travaux">Travaux</option>
                        <option value="sauvage">Animaux sauvages</option>
                        <option value="betail">Bétail</option>
                        <option value="cheval">Cheval</option>
                        <option value="troupeau">Troupeau</option>
                        <option value="roche">Eboulement</option>
                        <option value="vitesse">Vitesse réduite</option>
                        <option value="bouchon">Bouchon</option>
                        <option value="accident">Accident</option>
                        <option value="ralentisseur">Ralentisseur</option>
                        <option value="verglas">Verglas</option>
                        <option value="vent">Vent</option>
                        <option value="neige">Neige</option>
                        <option value="pluie">Pluie</option>
                        <option value="brouillard">Brouillard</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Description du signalement
                </td>
                <td>
                    <input id="description" type="text" name="description" required><br>
                </td>
            </tr>
            <tr>
                <td>
                    Lieu du signalement
                </td>
                <td>
                    <input id="address" type="textbox" value="Sydney, NSW">
                    <input id="submit" type="button" value="Geocode">
                </td>
            </tr>
        </table>
        Filtrer
        <form>
            <input id="normal" type="radio" name="layout" value="normal" checked> Normale<br>
            <input id="traffic" type="radio" name="layout" value="traffic"> Traffic<br>
            <input id="transit" type="radio" name="layout" value="transit"> Transports<br>
            <input id="bike" type="radio" name="layout" value="bike"> Vélo<br>
        </form>
        <div id="googleMap" style="width:100%;height:1000px;"></div>
        <script>
            var map;
            var markers = [];
            var markerIcon = "betail";
            var tmp = "n2i/";
            var tmpText = tmp.concat(markerIcon);
            var image = tmpText.concat(".png");

            var trafficLayer;
            var transitLayer;
            var bikeLayer;

            var description;

            function myMap() {
                var focusCenter = new google.maps.LatLng(51.508742,-0.120850);
                var mapCanvas = document.getElementById("googleMap");
                var mapOptions = {center: focusCenter,
                    zoom: 4,
                    panControl:        true,
                    zoomControl:       true,
                    mapTypeControl:    false,
                    scaleControl:      true,
                    streetViewControl: false,
                    overviewMapControl:true,
                    rotateControl:     true};
                map = new google.maps.Map(mapCanvas, mapOptions);

                google.maps.event.addListener(map, 'click', function(event) {
                    placeMarker(map, event.latLng);
                });

                var infoWindow = new google.maps.InfoWindow({
                    content:""
                });

                trafficLayer = new google.maps.TrafficLayer();
                transitLayer = new google.maps.TransitLayer();
                bikeLayer = new google.maps.BicyclingLayer();

                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };
                        var marker = new google.maps.Marker({
                            position: pos,
                            map: map
                        });
                        infoWindow.setPosition(pos);
                        infoWindow.setContent('Location found.');
                        map.setCenter(pos);
                        map.setZoom(10);
                    }, function() {
                        handleLocationError(true, infoWindow, map.getCenter());
                    });
                } else {
                    // Browser doesn't support Geolocation
                    handleLocationError(false, infoWindow, map.getCenter());
                }

                var geocoder = new google.maps.Geocoder();

                document.getElementById('submit').addEventListener('click', function() {
                    geocodeAddress(geocoder, map);
                });
            }

            function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                infoWindow.setPosition(pos);
                infoWindow.setContent(browserHasGeolocation ?
                    'Error: The Geolocation service failed.' :
                    'Error: Your browser doesn\'t support geolocation.');
            }

            function placeMarker(map, location) {
                if(description != null && description != ""){
                    var marker = new google.maps.Marker({
                        position: location,
                        icon: image,
                        map: map
                    });
                    markers.push(marker);
                    var infowindow = new google.maps.InfoWindow({
                        content: description
                    });
                    infowindow.open(map,marker);
                }
            }

            function setMapOnAll(map) {
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(map);
                }
            }

            function clearMarkers() {
                setMapOnAll(null);
            }

            function showMarkers() {
                setMapOnAll(map);
            }

            function changeIcon(name){
                markerIcon = name;
                var tmp2 = "n2i/";
                var tmpText2 = tmp2.concat(markerIcon);
                image = tmpText2.concat(".png");
                document.getElementById("name").innerHTML = image;
            };

            document.getElementById("normal").addEventListener("change", function(){
                trafficLayer.setMap(null);
                transitLayer.setMap(null);
                bikeLayer.setMap(null);
                document.getElementById("layout").innerHTML = "normal";
            });

            document.getElementById("traffic").addEventListener("change", function(){
                trafficLayer.setMap(map);
                transitLayer.setMap(null);
                bikeLayer.setMap(null);
                document.getElementById("layout").innerHTML = "traffic";
            });

            document.getElementById("transit").addEventListener("change", function(){
                trafficLayer.setMap(null);
                transitLayer.setMap(map);
                bikeLayer.setMap(null);
                document.getElementById("layout").innerHTML = "transit";
            });

            document.getElementById("bike").addEventListener("change", function(){
                trafficLayer.setMap(null);
                transitLayer.setMap(null);
                bikeLayer.setMap(map);
                document.getElementById("layout").innerHTML = "bike";
            });

            document.getElementById("description").addEventListener("change", function(){
                description = document.getElementById("description").value;
            });

            function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                infoWindow.setPosition(pos);
                infoWindow.setContent(browserHasGeolocation ?
                    'Error: The Geolocation service failed.' :
                    'Error: Your browser doesn\'t support geolocation.');
            }

            function geocodeAddress(geocoder, resultsMap) {
                var address = document.getElementById('address').value;
                geocoder.geocode({'address': address}, function(results, status) {
                    if (status === 'OK') {
                        resultsMap.setCenter(results[0].geometry.location);
                        var marker = new google.maps.Marker({
                            map: resultsMap,
                            position: results[0].geometry.location
                        });
                    } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                });
            }

            document.getElementById("select").addEventListener("change", function(){
                var e = document.getElementById("select");
                var selection = e.options[e.selectedIndex].value;
                changeIcon(selection);
            });
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdxrbhAoUkoa-H90AjwqgS7q-EAsJlXoE&callback=myMap"></script>
    </div>
<?php
end_page();
?>