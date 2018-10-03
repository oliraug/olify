// JavaScript Document
(function(){
	'use strict';
	
	var myInventoryOrder = angular.module('myInventoryOrderProductController', []);
			
			myInventoryOrder.controller('InventoryOrderProductController', InventoryOrderProductController);
			InventoryOrderProductController.$inject = ['$location', '$scope', '$http'];
			function InventoryOrderProductController($location, $scope, $http){
				var inventorylists = [''];	
				$scope.inventories = inventorylists;
				//$scope.tempSalesData = {};
												
				$scope.newInventoryOrderProduct = function(){
					$scope.dataLoading = true;
					$http({
						method: 'POST',
						url: 'inventory_order_product_action.php',
						data: $scope.inventory,
						 headers : {'Content-Type': 'application/x-www-form-urlencoded'}
					})
					.then(function success(response){
							if ($scope.inventory) {
								$scope.inventory = response.data;
								$scope.inventory = {};
								$location.path('/home');
							} else{
								$scope.dataLoading = false;
							}
							 
					});
				};

				$scope.getInventoryOrderProduct = function(){
					$scope.dataLoading = true;
					$http({
						method: 'GET',
						url: 'fetch_inventory_order_product.php'
					})
					.then(function success(response){
							$scope.inventories = response.data;
							 $location.path('/home');
							$scope.dataLoading = false;
						});
				};

				$scope.updateInventory = function(){
					Saleservice.Update(sale, sales_id);
				}
				$scope.editinventory = function(inventory){
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
						$scope.index = $scope.inventories.indexOf(inventory);
				}
				//delete a row
				$scope.deleteInventoryOrderProduct = function(index){
					$scope.dataLoading = true;
					$scope.inventories.splice(index, 1);
					if(confirm('Are you sure you want to delete?')){
					$http({
						method: 'POST',
						url: 'delete_inventory_order_product.php'
					})
					.then(function success(response){
						alert(data);
							
							 $location.path('/home');
					});
					} else{
						$scope.dataLoading = false;
					}
				}
				//copy new row
				$scope.copy = function(index, data){
					var newRow = angular.copy(data);
					$scope.inventories.push(newRow);
				}
				
				/*$scope.total = function(){
					var total = 0;
					angular.forEach($scope.sale, function(salelists){
					total += sale.quantity_sold * sale.amount;
					})
					return total;
				}*/
			}

			myInventoryOrder.directive("limitToMax", function(){
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