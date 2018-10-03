(function(){
  'use strict';

var myFaoes = angular.module("myFaoesController", []);
        
        myFaoes.controller("FaoesController", FaoesController);
        FaoesController.$inject = ['$scope', '$http', '$location'];
        function FaoesController($scope, $http, $location) {
            var faoeslists = [''];	
			     $scope.faoess = faoeslists;
			     $scope.editIndex = -1;

            $scope.newFaoes = function(){
               $http({ 
			      method: 'POST',
                  url:'faoes_action.php',
                  data : $scope.faoes, 
                  headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
               }).then(function success(response) {
				   if($scope.faoes){
                    $scope.faoes = {};
                    $scope.faoes = response.data;
				   } else{
				   }
               });
            };
            $scope.getFaoes = function() {
            	$http({
            		method: 'GET',
            		url: 'fetch_faoes.php'
            	}).then(function success(response){
							$scope.faoess = response.data;
							$scope.statuscode = response.status;
							$scope.statustext = response.statusText;
							 //$location.path('/home');
						$scope.dataLoading = false;
					});
            };
        };
  })();
