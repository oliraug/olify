// JavaScript Document
(function(){
	'use strict';
	//'datatables','ui-bootstrap','ui-utils'
	var myMarket = angular.module('myMarketController', ['ngMap']);
			myMarket.controller('MarketController', MarketController);
			MarketController.$inject = ['$location', '$scope', '$http'];
			function MarketController($location, $scope, $http){
				var marketlists = [''];	
				$scope.markets = marketlists;
				$scope.editIndex = -1;
				var vm = this;
  				vm.markerPosition = {lat: null, lng: null, address: null};
  				vm.mapCenter = '';
  				vm.mapZoom = 13;

				$scope.newMarket = function(){
					$scope.dataLoading = true;
					$http({
						method: 'POST',
						url: 'market_action.php',
						data: $scope.market,
						 headers : {'Content-Type': 'application/x-www-form-urlencoded'}
					})
					.then(function success(response){
							$scope.market = {};
							$scope.market = response.data;
							$location.path('/home');
							$scope.dataLoading = false;
					});
				}
				$scope.getMarket = function(){
					$scope.dataLoading = true;
					$http({
						method: 'GET',
						url: 'fetch_market.php'
					})
					//ProductService.GetAll()
					.then(function success(response){
						//if(response.success){
							$scope.markets = response.data;
							$scope.statuscode = response.status;
							$scope.statustext = response.statusText;
							 $location.path('/home');
						//} else {
							//FlashService.Error(response.message);
							$scope.dataLoading = false;
						});
					//});
				}
				$scope.updateMarket = function(){
					$scope.dataLoading = true;
					$http({
						method: 'PUT',
						url: 'edit_market.php',
						data:({market_id:market_id, btn_action:btn_action})
					})
					//MarketService.Update(market, market_id)
					.then(function success(response){
							$scope.market_id = market_id;
							$scope.market_name = market_name;
							$scope.product_code = product_code;
							$scope.location = location;
							$scope.country = country;
							$scope.market_status = market_status;
							$scope.updated_date = updated_date;							
							
							//FlashService.Success('Success', true);
							 $location.path('/home');
							$scope.dataLoading = false;
					});
				}
				$scope.deleteMarket = function(index){
					$scope.dataLoading = true;
          $scope.markets.splice($index, 1);
					if (confirm('Are you sure you want to delete market?')) {
          $http({
						method: 'POST',
						url: 'delete_market.php',
						data:({market_id:market_id, btn_action:btn_action})
					})
					.then(function success(response){
						  alert(data);							
							 $location.path('/home');
						});
          } else {
							$scope.dataLoading = false;
						}
				}

				//edit button click
       			 $scope.editingMarket = function(marketIndex){
           			 $scope.updateMarket = angular.copy($scope.getMarket[marketIndex]);
               		 $scope.editIndex = marketIndex;
       		   };

        		//cancelEdit
       			$scope.cancelEdit = function(){
           		 $scope.editIndex = -1;

        		};

       		 //saveEdit
       			$scope.saveEdit = function(marketIndex){
            		$scope.getMarket.splice(marketIndex, $scope.editObject);
            		$scope.editIndex = -1;
        		}
				//custom datatable options
				$scope.dataTableMkt =({
					"aLengthMenu":[[10, 50, 100, -1], [10, 50, 100, 'All']]
				})


				// for geolocation api
				if (navigator.geolocation) {
    				navigator.geolocation.getCurrentPosition(function(position) {
     				 $scope.$apply(function() {
        				$scope.position = position;
        				vm.mapCenter = position.coords.latitude + ',' + position.coords.longitude;
        				vm.updateMarker(position.coords.latitude, position.coords.longitude);
      				});
    			}, function(error) {
      				$scope.$apply(function() {
        				switch(error.code) {
         				 case error.PERMISSION_DENIED:
           				 console.log("User denied the request for Geolocation.");
           				 break;
         				 case error.POSITION_UNAVAILABLE:
           				 console.log("Location information is unavailable.");
           				 break;
          				case error.TIMEOUT:
           				console.log("The request to get user location timed out.");
           				 break;
          				case error.UNKNOWN_ERROR:
            			console.log("An unknown error occurred.");
           				 break;
                         }
       				 vm.setDefaultPosition();
      				});
   				 });
 			 } else {
    			console.log("Navigator.geolocation not available");
    			vm.setDefaultPosition();
  			}
  			  vm.setDefaultPosition = function () {
    vm.mapZoom = 1;
  };

  vm.placeChanged = function() {
    var place = this.getPlace();
    if (place && place.geometry) {
      var ll = place.geometry.location;
      vm.updateMarker(ll.lat(), ll.lng(), vm.searchFilter);
      vm.mapCenter = place.formatted_address;
      vm.mapZoom = 13;
    }
  };

  vm.dragHandler = function () {
    vm.searchFilter = '';
    var ll = this.getPosition();
    vm.updateMarker(ll.lat(), ll.lng());
  };

  vm.clickHandler = function (event) {
    vm.searchFilter = '';
    var ll = event.latLng;
    vm.updateMarker(ll.lat(), ll.lng());
  };

  vm.updateMarker = function (lat, lng, address) {
    vm.markerPosition.lat = lat;
    vm.markerPosition.lng = lng;
    if (!address) {
      vm.geocodeAddress();      
    } else {
      vm.markerPosition.address = address;
    }
  };

  vm.geocodeAddress = function () {
    var geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(vm.markerPosition.lat, vm.markerPosition.lng);
    geocoder.geocode({ 'latLng': latlng }, function (results, status) {
      $scope.$apply(function() {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {
            vm.markerPosition.address = results[0].formatted_address;
          } else {
            vm.markerPosition.address = ''; 
            console.log('Location not found');
          }
        } else {
          vm.markerPosition.address = '';
          console.log('Geocoder failed due to: ' + status);
        }
      });
    });
  };

};
})();