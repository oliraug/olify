(function (){
	'use strict';

	var myUser = angular.module("myUserController", []);
        myUser.controller("UserController", UserController);
        UserController.$inject = ['$scope', '$http', '$location'];
        function UserController($scope, $http, $location) {
           var userlist = [''];
           $scope.users = userlist;

            $scope.getMarketUsers = function(){
			         $http({
				        method: 'GET',
				        url: 'fetch_market_user.php'
			       })
			         .then(function success(response) { 
                $scope.users = response.data;       
            });
		    }
            
            $scope.newMarketUser = function(){
               $http({ 
			           method: 'POST',
                 url: 'market_user_action.php',
                 data : $scope.user, 
                 headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
               }).then(function success(response) {
				          if($scope.user){
				          $scope.users = {};
                  $scope.user = response.data;
				          $location.path('/home');
				        } 
             });
            };

            $scope.updateMarketUser = function(){
              var updateUser = $.param({'action':'update','full_name':$scope.full_name,'login_name':$scope.login_name,'password':$scope.password
              ,'phone_no':$scope.phone_no,'speciality':$scope.speciality,'sex':$scope.sex,'user_id':$scope.user_id});
              $http({
                method: 'POST',
                url: 'editMarketUser.php?action=updateUser',
                data: $scope.user,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
              }) 
              .then(function success(response){
                alert(response.data[msg]);
              })
            }
        };
 })();
