(function(){
  'use strict';
    var myCurrency = angular.module('myCurrencyController', ['ui.bootstrap', 'ngAnimate']);
      myCurrency.controller('CurrencyController', CurrencyController);
			CurrencyController.$inject = ['$location', '$scope', '$http'];
			function CurrencyController($location, $scope, $http, $modalInstance, $modal){
				var currencylists = [''];	
				$scope.currencies = currencylists;
    			
    		$scope.newCurrency = function(){
					$scope.dataLoading = true;
					$http({
						method: 'POST',
						url: 'currency_action.php',
						data: $scope.currency,
						headers : {'Content-Type': 'application/x-www-form-urlencoded'}
					})
					.then(function success(response){
						if($scope.currency){
							$scope.currency = response.data;
							$scope.currency = {};
							 $location.path('/home');
						} else {
							$scope.dataLoading = false;
						}
					});
				};

			$scope.getCurrency = function(){
				$http({
					method: 'GET',
					url: 'fetch_currency.php'
			})
			.then(function success(response){
				$scope.currencies = response.data;
				$scope.statuscode = response.status;
				$scope.statustext = response.statusText;
				$location.path('/home');
				$scope.dataLoading = false; 
          })
        }
        $scope.deleteCurrency = function(index){
			var id = 'id';
			var btn_action = 'delete';
          
          if (confirm('Are you sure you want to delete currency?')) {
          $http({
            method: 'POST',
            url: 'delete_currency.php',
			data: {'id':id, 'status':status, 'btn_action':btn_action},
			headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
          })
          .then(function success(response){
			$scope.currencies.splice(index, 1);
            $location('/home');
          });
        } else {
          $scope.dataLoading = false;          
        }
        
      }
      $scope.updateCurrency = function(index){
        $scope.currency = $scope.currencies[index];
        $scope.btn_action = 'fetch_single';
        $http({
          method: 'POST',
          url: 'editCurrency.php'
        }).
        then(function success(response){
          var modal_element = angular.element('#updateCategoryModal');
          modal_element.modal('show');
         /*'category_id' =  $scope.category.category_id;
          'user_id' = $scope.category.user_id;
          'category_name' = $scope.category.category_name;
          'category_status' = $scope.category.category_status;
          'description' = $scope.category.description;*/
        })
      }

      $scope.changeCurrencyStatus = function(currency){
        currency.status = (currency.status=="Active" ? "Inactive" : "Active");
        $http({
            method: 'POST',
            url: 'delete_currency.php',
            data: ({id:currency.id, status:currency.status})
            })
      };
	  
	  
	  //$scope.category = angular.copy(item);
        
        $scope.cancel = function () {
            $modalInstance.dismiss('Close');
        };
        //$scope.title = (item.category_id > 0) ? 'Edit category' : 'Add category';
       // $scope.buttonText = (item.category_id > 0) ? 'Update category' : 'Add New category';

        //var original = item;
        $scope.isClean = function() {
            return angular.equals(original, $scope.currency);
        }
        $scope.saveCurrency = function (currency) {
            currency.uid = $scope.uid;
            if(currency.id > 0){
				$http({
					method: 'POST',
					url: 'updateCategory',
					data: {id:currency.id}
				})
                .then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(currency);
                        x.save = 'update';
                        $modalInstance.close(x);
                    }else{
                        console.log(result);
                    }
                });
            }else{
                currency.status = 'Active';
                $http({
					method: 'POST',
					url: 'updateCurrency',
					data: {id:currency.id}
				})
				.then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(currency);
                        x.save = 'insert';
                        x.id = result.data;
                        $modalInstance.close(x);
                    }else{
                        console.log(result);
                    }
                });
            }
        };
    };
})(window.angular);