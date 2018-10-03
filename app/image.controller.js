(function(){
  'use strict';

var myImage = angular.module("myImageController", []);        

        myImage.controller("ImageController", ImageController);
        ImageController.$inject = ['$scope', '$http', '$location']; 
        function ImageController($scope, $http, $location) {
           var imagelist = [''];	
			     $scope.images = imagelist;
			     $scope.editIndex = -1;

            $scope.newProductImage = function(){
               $scope.dataLoading = true;
               $http({ 
			           method: 'POST',
                 url:'product_image_action.php',
                 data : $scope.image, 
                 headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
               }).then(function success(response) {
				      if($scope.image){
                    $scope.image = response.data;
                    $scope.images = {};
                    $location.path('/home');
				   } else{
            $scope.dataLoading = false;
				   }
               });
          };

            $scope.getProductImage = function() {
               $scope.dataLoading = true;
            	$http({
            		method: 'GET',
            		url: 'fetch_product_image.php'
            	}).then(function success(response){
							$scope.images = response.data;
							$scope.statuscode = response.status;
							$scope.statustext = response.statusText;
							 //$location.path('/home');
						$scope.dataLoading = false;
					 });
          };
      };

  })(window.angular);
