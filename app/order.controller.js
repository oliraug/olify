// JavaScript Document
(function(){
	'use strict';
	
	var myOrder = angular.module('myInventoryOrderController', []);
			
			myOrder.controller('InventoryOrderController', InventoryOrderController);
			InventoryOrderController.$inject = ['$location', '$scope', '$http'];
			function InventoryOrderController($location, $scope, $http){
				var orderlists = [''];	
				$scope.orders = orderlists;
				$scope.tempOrderData = {};
												
				$scope.newOrder = function(){
					$scope.dataLoading = true;
					$http({
						method: 'POST',
						url: 'inventory_order_action.php',
						data: $scope.order,
						 headers : {'Content-Type': 'application/x-www-form-urlencoded'}
					})
					.then(function success(response){
							$scope.order = {};
							$scope.order = response.data;
							 $location.path('/home');
					});
				}
				$scope.getOrder = function(){
					$scope.dataLoading = true;
					$http({
						method: 'GET',
						url: 'fetch_inventory_order.php'
					})
					.then(function success(response){
							$scope.orders = response.data;
							 $location.path('/home');
							$scope.dataLoading = false;
						});
				}
				$scope.updateOrder = function(){
					OrderService.Update(order, inventory_order_id);
				}
				$scope.editOrder = function(order){
					$scope.tempOrderData({
							inventory_order_id: inventory_order.inventory_order_id,
							cust_id: inventory_order.cust_id,
							category_id: inventory_order.category_id,
							product_code: inventory_order.product_code,
							inventory_order_total: inventory_order.inventory_order_total,
							inventory_order_date:  inventory_order.inventory_order_date,
							inventory_order_address: inventory_order.inventory_order_address,
							product_details: inventory_order.product_details,
							payment_status: inventory_order.payment_status,
							inventory_order_status: inventory_order.inventory_order_status							
						});
						$scope.index = $scope.orders.indexOf(order);
				}
				//delete a row
				$scope.deleteOrder = function(index){
					$scope.dataLoading = true;
					$scope.orders.splice(index, 1);
					if(confirm('Are you sure you want to delete order?')){
						$http({
							method: 'POST',
							url: 'delete_order',
						data:({inventory_order_id:inventory_order_id})
						})
						.then(function success(response){
							alert(data);							
							 $location.path('/home');
						});
					} else {
							$scope.dataLoading = false;
						}
				}
				//copy new row
				$scope.copy = function(index, data){
					var newRow = angular.copy(data);
					$scope.orders.push(newRow);
				}

			}
			
			myOrder.directive("limitToMax", function(){
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