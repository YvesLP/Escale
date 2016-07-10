
//Initialisation de la map
var map;

function initAutocomplete() {

    var initialPositionMap= {
        lat: 47.081012, lng: 2.398782
    };
    map = new google.maps.Map(document.getElementById('map'), {
        center: initialPositionMap,
        zoom: 6
    });

    // Try HTML5 Geolocation.
    var centerControlDiv = document.getElementById('geolocalisation_button');

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            centerControlDiv.addEventListener('click', function() {
                map.setCenter(pos);
            });

        }, function() {
            var infoWindow = new google.maps.InfoWindow({map: map});
            handleLocationError(true, infoWindow, map.getCenter());
        });
    } else {
        // Browser doesn't support Geolocation
        var infoWindow = new google.maps.InfoWindow({map: map});
        handleLocationError(false, infoWindow, map.getCenter());
    }

    function handleLocationError(browserHasGeolocation, pos) {
        var infoWindow = new google.maps.InfoWindow({map: map});
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: Le service de géolocalisation rencontre une erreur.' :
            'Error: Votre navigateur ne supporte pas la géolocalisation');
    }

    // Create the search box and link it to the UI element.
    var input = document.getElementById('pac-input');

    var searchBox = new google.maps.places.SearchBox(input);

    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
    });

    var markers = [];
    // [START region_getplaces]
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener('places_changed', function() {
        var places = searchBox.getPlaces();

        if (places.length == 0) {
            return;
        }

        // Clear out the old markers.
        markers.forEach(function(marker) {
            marker.setMap(null);
        });
        markers = [];

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function(place) {
            var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
                map: map,
                icon: icon,
                title: place.name,
                position: place.geometry.location
            }));

            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });
        map.fitBounds(bounds);
    });
    // [END region_getplaces]
}
