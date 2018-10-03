(function () {
	'use strict';
	var myMap = angular.module("myMapLocate", [])
		.factory('$ionicMap', function($ionicPlatform){
			var map = {};
			centerLoc = {};

			return: {
				init: function(div){
					$ionicPlatform.ready(function(){
						//initialize the map view
						map = plugin.google.maps.Map.getMap(div);
						//wait until the map is ready status
						map.addEventListener(plugin.google.maps.event.MAP_READY, function(){
							console.ready('MAP_READY');
						});
						//when map is moved get new center location
						map.on(plugin.google.maps.event.CAMERA_CHANGE, function(position){
							centerLoc = position;
						});
					});
					return;
				},
				getMap: map, gotoMyLocation: function(){
					//get the current coordinate where you are located
					map.getMyLocation(function(location){
						var msg = ["Your current location: \n",
						"latitude:" + location.latLng.lat,
						"longitude:" + location.latLng.lng].join("\n");
						//Move the camera to your location
						map.moveCamera({
							'target': location.latLng,
							'zoom': 15
						});
						//Add a marker with position and title text
						map.addMarker({
							'position': location.latLng,
							'title': msg
						}, function(marker){
							marker.showInfoWindow();
						});
					});
				},

				setCenterLocation: function(callback){
					if (centerLoc.hasOwnProperty('target')) {
						var msgCenter = [
							"latitude:" + centerLoc.target.lat,
							"longitude:" + centerLoc.target.lng].join("\n");

						//Add a marker with position and title text
						map.addMarker({
							'position': location.latLng,
							'title': msg
						}, function(marker){
							marker.showInfoWindow();
						});

						var request = {
							"position": centerLoc.target
						};
						//passing the latitude and longitude and get back the address
						plugin.google.maps.Geocoder.geocode(request,
							function(results) {
								if (results.length) {
									var result = results[0];
									var position = result.position;
									var address = [
										result.thoroughfare || "",
										result.locality || "",
										result.adminArea || "",
										result.postalCode || "",
										result.country || ""].join(", ");
							// Trigger callback function to provide the
							address string to the controller
							callback(address);
							} else {
								console.log("Not found");
								}
						});
							} else {
								console.log("No location defined");
								}
					}
				}
			}
		});
		myMap.controller('GoogleMapsController', function($scope, $ionicPlatform, $ionicMap){
			$scope.data = {
				address: "Tap for address"
			}
			$scope.gotoMyLocation = $ionicMap.gotoMyLocation;
			$scope.setCenterLocation = function() {
			$ionicMap.setCenterLocation(function(address) {
			$scope.data.address = address;
		// Call digest cycle to update $scope.data.address
			$scope.$digest();
			});
		}
	});
		
		myMap.directive('ionicMap', function($ionicPlatform, ionicMap){
			return {
					restrict: 'AEC',
					link: function(scope, element, attrs) {
						$ionicPlatform.ready(function() {
					// Create a div object
						var div = document.createElement('div');
						div.style.width = attrs.width;
						div.style.height = attrs.height;
					// Add this div to the DOM
						element.append(div);
					// Turn the div into Google Maps object
						$ionicMap.init(div);
					});
				}
			}
		});
		
})();