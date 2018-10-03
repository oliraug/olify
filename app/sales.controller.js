// JavaScript Document
(function(){
	'use strict';
	
	var mySales = angular.module('mySalesController', []);
			
			mySales.controller('SalesController', SalesController);
			SalesController.$inject = ['$location', '$scope', '$http'];
			function SalesController($location, $scope, $http){
				var salelists = [''];	
				$scope.sales = salelists;
				$scope.tempSalesData = {};
				$scope.sale = {};
				$scope.sale.quantity_sold = 0;
				$scope.sale.amount = 0;

				$scope.changed = function(){
					$scope.sale.total_sale = $scope.sale.quantity_sold * $scope.sale.amount;
				}
				$scope.changed();
												
				$scope.newSales = function(){
					$scope.dataLoading = true;
					$http({
						method: 'POST',
						url: 'sales_action.php',
						data: $scope.sale,
						 headers : {'Content-Type': 'application/x-www-form-urlencoded'}
					})
					.then(function success(response){
							if ($scope.sale) {
								$scope.sale = response.data;
								$scope.sale = {};
								$location.path('/home');
							} else{
								$scope.dataLoading = false;
							}
							 
					});
				};

				$scope.getSales = function(){
					$scope.dataLoading = true;
					$http({
						method: 'GET',
						url: 'fetch_sales.php'
					})
					.then(function success(response){
							$scope.sales = response.data;
							 $location.path('/home');
							$scope.dataLoading = false;
						});
				};

				$scope.updateSale = function(){
					Saleservice.Update(sale, sales_id);
				}
				$scope.editsale = function(sale){
					$scope.tempsaleData({
							sales_id: sales.sales_id,
							market_id: sales.market_id,
							category_id: sales.category_id,
							product_code: sales.product_code,
							sales_date:  sales.sales_date,
							quantity_sold: sales.quantity_sold,
							amount: sales.amount,
							action_type: sales.action_type,
							payment: sales.payment,
							total: sales.total							
						});
						$scope.index = $scope.sales.indexOf(sale);
				}
				//delete a row
				$scope.deleteSale = function(index){
					$scope.dataLoading = true;
					saleservice.Delete(sales_id)
					.then(function (response){
						if(response.success){
							$scope.sales.splice(index, 1);
							 $location.path('/home');
						} else {
							$scope.dataLoading = false;
						}
					});
				}
				//copy new row
				$scope.copy = function(index, data){
					var newRow = angular.copy(data);
					$scope.sales.push(newRow);
				}
			}

			mySales.directive("limitToMax", function(){
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