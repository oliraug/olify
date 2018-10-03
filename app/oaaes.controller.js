(function(){
  'use strict';

var myOaaes = angular.module("myOaaesController", []);        

        myOaaes.controller("OaaesController", OaaesController);
        OaaesController.$inject = ['$scope', '$http', '$location']; 
        function OaaesController($scope, $http, $location) {
            var oaaeslist = [''];	
			     $scope.oaaess = oaaeslist;
			     $scope.editIndex = -1;

            $scope.newOaaes = function(){
               $scope.dataLoading = true;
               $http({ 
			           method: 'POST',
                 url:'oaaes_action.php',
                 data : $scope.oaaes, 
                 headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
               }).then(function success(response) {
				   if($scope.oaaes){
                    $scope.oaaes = response.data;
                    $scope.oaaess = {};
                    $location.path('/home');
				   } else{
            $scope.dataLoading = false;
				   }
               });
          };

            $scope.getOaaes = function() {
               $scope.dataLoading = true;
            	$http({
            		method: 'GET',
            		url: 'fetch_oaaes.php'
            	}).then(function success(response){
							$scope.oaaess = response.data;
							$scope.statuscode = response.status;
							$scope.statustext = response.statusText;
							 //$location.path('/home');
						$scope.dataLoading = false;
					 });
          };
      };

  })();
