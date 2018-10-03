<?php
    //error_reporting(0);
    $conn = new PDO("mysql:host=localhost;dbname=EPriceStreetMarket", "root", "olira"); 
	session_start();
    $_POST = json_decode(file_get_contents('php://input'), true);
	
	
	if(!empty($_POST['cust_name'])&& !empty($_POST['cust_mobile']))
    {
       $query ="
	   INSERT INTO customers (cust_name, cust_mobile, cust_email, cust_address, cust_status, cust_join_date)
	   VALUES(:cust_name, :cust_mobile, :cust_email, :cust_address, :cust_status, :cust_join_date)";
	   $ins_query=$conn->prepare($query);
       $ins_query->bindParam(':cust_name', $_POST['cust_name']);
	   $ins_query->bindParam(':cust_mobile', $_POST['cust_mobile']);
       $ins_query->bindParam(':cust_email', $_POST['cust_email']);
	   $ins_query->bindParam(':cust_address', $_POST['cust_address']);
	   $ins_query->bindParam(':cust_status', $_POST['cust_status']);
	   $ins_query->bindParam(':cust_join_date', $_POST['cust_join_date']);
	   
       $ins_query->execute();
    }
?> 

$locationInfo = {
  geocode: null,
  streetNumber: null,
  street: null,
  city: null,
  state: null,
  country: null,
  postalCode: null,
  reset: function () {
    this.geocode = null;
    this.streetNumber = null;
    this.street = null;
    this.city = null;
    this.state = null;
    this.country = null;
    this.postalCode = null;
  }
};

googleAutocomplete = {
  autocompleteField: function (fieldId) {
    autocomplete = new google.maps.places.Autocomplete(document.getElementById(fieldId)), { types: ['geocode'] };
    google.maps.event.addListener(autocomplete, 'place_changed', function() {

      // Segment results into usable parts
      var place = autocomplete.getPlace(),
          address = place.address_components,
          latLng = place.geometry.location.lat() + ' ' + place.geometry.location.lng();

      // Reset location object
      $locationInfo.reset();

      // Save address components (US only)
      $locationInfo.geocode = latLng;
      for(var i=0; i<address.length; i++) {
        var component = address[i].types[0];
        switch (component) {
          case 'street_number':
            $locationInfo.streetNumber = address[i]['long_name'];
            break;
          case 'route':
            $locationInfo.street = address[i]['long_name'];
            break;
          case 'locality':
            $locationInfo.city = address[i]['long_name'];
            break;
          case 'administrative_area_level_1':
            $locationInfo.state = address[i]['long_name'];
            break;
          case 'country':
            $locationInfo.country = address[i]['long_name'];
            break;
          case 'postal_code':
            $locationInfo.postalCode = address[i]['long_name'];
            break;
          default:
            break;
        }
      }
      
      // Example output
      $('#output').html(JSON.stringify($locationInfo, null, 4));
      
    });
  }
};

// Attach listener to field
googleAutocomplete.autocompleteField('autoField');

//Bias the autocomplete object to the account's geographical location,
//as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = new google.maps.LatLng(
                position.coords.latitude, position.coords.longitude);
            autocomplete.setBounds(new google.maps.LatLngBounds(geolocation,
                geolocation));
        });
    }
}

<input id="autoField" name="autoField" type="text">

<div id="output"></div>

#autoField {
  padding: 10px;
  width: 50%;
}


// Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 6,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var infoWindow = new google.maps.InfoWindow({map: map});

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
		
		// Create the search box and link it to the UI element.
  var input = document.getElementById('pac-input');
  var searchBox = new google.maps.places.SearchBox(input);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  // Bias the SearchBox results towards current map's viewport.
  map.addListener('bounds_changed', function() {
    searchBox.setBounds(map.getBounds());
  });

  var markers = [];
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
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }
	  
	  
	  html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
      }

      #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
      }

      #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }
      #target {
        width: 345px;
      }
	  
	  <html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-7">
    <title>Places Searchbox</title>
  </head>
  <body>
    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
    <div id="map"></div>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDU5mKV4oCZcxKQfOka5Mz5LlcqS3eB2YU&libraries=places&signed_in=true&callback=initMap"></script>
  </body>
</html>


https://codepen.io/kingjoejoe29/pen/wmQReE?page=1&