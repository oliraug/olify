(function(){
  'use strict';

var mySades = angular.module("mySadesController", []);
       
        mySades.controller("SadesController", SadesController);
        SadesController.$inject = ['$scope', '$http', '$location']; 
        function SadesController($scope, $http, $location) {
            var sadeslists = [''];	
			     $scope.sadess = sadeslists;
			     $scope.editIndex = -1;

            $scope.newSades = function(){
               $scope.dataLoading = true;
               $http({ 
			      method: 'POST',
                  url:'sades_action.php',
                  data : $scope.sades, 
                  headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
               }).then(function success(response) {
				        if($scope.sades){
                    $scope.sades = {};
                    $scope.sades = response.data;
				   } else{
                $scope.dataLoading = false;
				   }
               });
            };
            $scope.getSades = function() {
              $scope.dataLoading = true;
            	$http({
            		method: 'GET',
            		url: 'fetch_sades.php'
            	}).then(function success(response){
							$scope.sadess = response.data;
							$scope.statuscode = response.status;
							$scope.statustext = response.statusText;
							 //$location.path('/home');
						$scope.dataLoading = false;
					 });
        };
      }
})(window.angular);
