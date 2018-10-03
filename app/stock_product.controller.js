// JavaScript Document
(function(){
	'use strict';
	
	var myStock = angular.module('myStockProductController', []);
			
			myStock.controller('StockProductController', StockProductController);
			StockProductController.$inject = ['$location', '$scope', '$http'];
			function StockProductController($location, $scope, $http){
				var stocklists = [''];	
				$scope.stocks = stocklists;
				$scope.tempStockProductData = {};
												
				$scope.newStockProduct = function(){
					$scope.dataLoading = true;
					$http({
						method: 'POST',
						url: 'stock_product_action.php',
						data: $scope.stock,
						 headers : {'Content-Type': 'application/x-www-form-urlencoded'}
					})
					.then(function success(response){
							if ($scope.stock) {
								$scope.stock = response.data;
								$scope.stock = {};
								$location.path('/home');
							} else{
								$scope.dataLoading = false;
							}
							 
					});
				};

				$scope.getStockProduct = function(){
					$scope.dataLoading = true;
					$http({
						method: 'GET',
						url: 'fetch_stock_product.php'
					})
					.then(function success(response){
							$scope.stocks = response.data;
							 $location.path('/home');
							$scope.dataLoading = false;
						});
				};

				$scope.updateStock = function(){
					Saleservice.Update(stock, stock_id);
				}
				$scope.editStockProduct = function(index){
					/*$scope.tempStockProductData({
							stock_id: stocks.stock_id,
							currency: stocks.currency,
							market_id: stocks.market_id							
						});
						$scope.index = $scope.stocks.indexOf(stock);*/
						scope.stocklists[index] = true;
				}
				//delete a row
				$scope.deleteStockProduct = function(index){
					$scope.dataLoading = true;
					if(confirm('Are you sure you want to delete?')) {
         				$http({
						method: 'DELETE',
						url: 'delete_stock_product.php','index':index
					}).
					then(function success(response){
						alert(data);
						$location.path('/home');
					});
				} else {
					return false;
				}
					$scope.stocks.splice(index, 1);
				}
			//copy new row
				$scope.copy = function(index, data){
					var newRow = angular.copy(data);
					$scope.stocks.push(newRow);
				}
			}

			myStock.directive("limitToMax", function(){
				return {
					link: function(scope, element, attributes){
						element.on("keydown keyup", function(e){
							if(Number(element.val()) > 
							Number(attributes.max) && 
							e.keyCode != 46  //delete
							&& e.keyCode != 8 //backspace
							){
								e.preventDefault();
								element.val(attributes.max);
							}
						});
					}
				};
			});
})();