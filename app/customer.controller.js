(function (){
	'use strict';

	var myCustomer = angular.module("myCustomerController", []);
        myCustomer.controller("CustomerController", CustomerController);
        CustomerController.$inject = ['$scope', '$http', '$location'];
        function CustomerController($scope, $http, $location) {
           var customerlist = [''];
           $scope.customers = customerlist;

            $scope.getCustomers = function(){
			$http({
				method: 'GET',
				url: 'fetch_customer.php'
			}).then(function success(response) { 
                $scope.customers = response.data;
				$scope.statuscode = response.status;
				$scope.statustext = response.statusText;
				$location.path('/home');
				$scope.dataLoading = false;     
            });
		}
            
            $scope.newCustomer = function(){
               $http({ 
			   method: 'POST',
               url:'customer_action.php',
               data : $scope.customer, 
               headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
               }).then(function success(data) {
				   if($scope.customer){
				   $scope.customer = {};
				   $scope.customer = response.data;
				   $location.path('/home');
				   } 
               });
            };
        };
 })(window.angular);
