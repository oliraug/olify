var app = angular.module("myProfitLossStmt", []);
        app.controller("ProfitLossStmtController", function($scope, $http) {
            var profitlists = [''];	
			$scope.profits = profitlists;
			$scope.editIndex = -1;

            $scope.newProfitLoss = function(){
               $http({ 
			   method: 'POST',
               url:'profitloss_action.php',
               data : $scope.profit, 
               headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
               }).then(function success(data) {
				   if($scope.profit){
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
							$scope.profits = response.data;
							$scope.statuscode = response.status;
							$scope.statustext = response.statusText;
							 //$location.path('/home');
						$scope.dataLoading = false;
					});
            };
        });
