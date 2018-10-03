(function (){
	'use strict';

	var myEmployee = angular.module("myEmployeeController", []);
        myEmployee.controller("EmployeeController", EmployeeController);
        EmployeeController.$inject = ['$scope', '$http', '$location'];
        function EmployeeController($scope, $http, $location) {
           var employeelist = [''];
           $scope.employees = employeelist;

            $scope.getEmployees = function(){
			         $http({
				        method: 'GET',
				        url: 'fetch_employee.php'
			       })
			         .then(function success(response) { 
                $scope.employees = response.data;       
            });
		    }
            
            $scope.newEmployee = function(){
               $http({ 
			           method: 'POST',
                 url:'employee_action.php',
                 data : $scope.employee, 
                 headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
               }).then(function success(response) {
				          if($scope.employee){
				          $scope.employees = {};
                  $scope.employee = response.data;
				          $location.path('/home');
				        } 
             });
            };
        };
 })();
