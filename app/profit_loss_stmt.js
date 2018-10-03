var app = angular.module("myProfitLossStmt", []);
        app.controller("ProfitLossStmtController", function($scope, $http) {
            
            $scope.newProfitLoss = function(){
               $http({ 
			   method: 'POST',
               url:'profitloss_action.php',
               data : $scope.profit, /*{name: $scope.user.name,
					   mobile: $scope.user.mobile,
					   email: $scope.user.email,
					   price: $scope.user.price,
					   quantity: $scope.user.quantity,
					   created_date: $scope.user.created_date},*/
               headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
               }).then(function success(data) {
				   if($scope.profit){
                   /*$scope.users.push({
					   name: $scope.user.name,
					   mobile: $scope.user.mobile,
					   email: $scope.user.email,
					   price: $scope.user.price,
					   quantity: $scope.user.quantity
				   });*/
				   //$scope.content = data;
				   $scope.profit = {};
				   } else{
				   }
               });
            };

            $scope.getProfitLossStmt = function() {
            	$http({
            		method: 'GET',
            		url: 'fetch_profit_loss_stmt.php'
            	}).then(function success(response){
							$scope.profit = response.data;
							$scope.statuscode = response.status;
							$scope.statustext = response.statusText;
							 $location.path('/home');
						$scope.dataLoading = false;
						});
            }
        });
