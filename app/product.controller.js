// JavaScript Document
(function(){
	'use strict';
	
	var myProduct = angular.module('myProductController', ['ui.bootstrap']);
			
			myProduct.controller('ProductController', ProductController);
			ProductController.$inject = ['$location', '$scope', '$http'];
			function ProductController($location, $scope, $http){
				var productlists = [''];	
				$scope.products = productlists;
				$scope.tempProductData = {};
												
				$scope.newProduct = function(){
					$scope.dataLoading = true;
					$http({
						method: 'POST',
						url: 'product_action.php',
						data: $scope.product,
						 headers : {'Content-Type': 'application/x-www-form-urlencoded'}
					})
					.then(function success(response){
						if($scope.product){
							$scope.product = {};
							$scope.product = response.data;								
							 $location.path('/home');
						} else {
							$scope.dataLoading = false;
					}
				});
				}
				$scope.getProduct = function(){
					$scope.dataLoading = true;
					$http({
						method: 'GET',
						url: 'fetch_product.php'
					})
					.then(function success(response){
							$scope.products = response.data;
							$location.path('/home');
							$scope.dataLoading = false;
						});
				}
				$scope.updateProduct = function(index){
					$http({
						method: 'POST',
						url: 'editProduct.php',
						data: ({code: $scope.product.code,
							product_name: $scope.product.product_name,
							price:  $scope.product.price,
							quantity: $scope.product.quantity_per_unit,
							product_status: $scope.product.product_status,
							}),
						headers: {'Content-Type': 'application/x-www-form-urlencoded'}
					}).then(function success(response){
						$scope.content = data;
					});
				}
				$scope.editProduct = function(product){
					$scope.tempProductData({
							code: product.code,
							product_name: product.product_name,
							price:  product.price,
							quantity: product.quantity,
							product_status: product.product_status,
							updated_date: product.updated_date							
						});
						$scope.index = $scope.products.indexOf(product);
				}
				//delete a row
				$scope.deleteProduct = function(index){
					$scope.dataLoading = true;
					$scope.products.splice(index, 1);
					  if (confirm('Are you sure you want to delete product?')) {
					 $http({
					 	method: 'POST',
					 	url: 'delete_product.php',
						data:({product_id:product_id, btn_action:btn_action})
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
					$scope.products.push(newRow);				
			}
			angular.element(document).ready(function () {
		// Setup - add a text input to each footer cell
											 
			$('#produc_data th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" placeholder="Search '+title+'" />' );
			});
													 
			console.log('search');												 
				/*
				earlier angularjs initialize datatable( must add "retrieve": true,) , but don't get a table handle, 
				later here, $('#id').DataTable(); will 1) if existing, will retrieve table handle.
			    2) if not exsiting, will create a new table. */	
													 
			var table = $('#product_data').DataTable();
			// Apply the search
			table.columns().every( function () {
				var that = this;
				$( 'input', this.footer() ).on( 'keyup change', function () {
				if ( that.search() !== this.value ) {
						that.search( this.value )
							.draw();
						}
					});
				});									
			});// document ready

			$scope.dataTableOpt = {
   			 "retrieve": true,
  			 "aLengthMenu": [[10, 50, 100,-1], [10, 50, 100,'All']],
  			};
		}
			
			myProduct.directive("limitToMax", function(){
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