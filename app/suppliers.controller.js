// JavaScript Document
(function(){
	'use strict';
	
	var mySupplier = angular.module('mySupplierController', []);
			
			mySupplier.controller('SupplierController', SupplierController);
			SupplierController.$inject = ['$location', '$scope', '$http'];
			function SupplierController($location, $scope, $http){
				var supplierlists = [''];	
				$scope.suppliers = supplierlists;
				$scope.tempSupplierData = {};
												
				$scope.newSupplier = function(){
					$scope.dataLoading = true;
					$http({
						method: 'POST',
						url: 'supplier_action.php',
						data: $scope.supplier,
						 headers : {'Content-Type': 'application/x-www-form-urlencoded'}
					})
					.then(function success(response){
							$scope.supplier = {};
							$scope.supplier = response.data;
							 $location.path('/home'); 
					});
				}
				$scope.getSuppliers = function(){
					$scope.dataLoading = true;
					$http({
						method: 'GET',
						url: 'fetch_supplier.php'
					})
					.then(function success(response){
							$scope.suppliers = response.data;
							 $location.path('/home');
							$scope.dataLoading = false;
						});
				}
				$scope.updateSupplier = function(){
					SupplierService.Update(supplier, supplier_id);
				}
				$scope.editSupplier = function(supplier){
					$scope.tempSupplierData({
							supplier_id: supplier.supplier_id,
							company_name: supplier.company_name,
							contact_name:  supplier.contact_name,
							contact_title: supplier.contact_title,
							address: supplier.address,
							city: supplier.city,
							region: supplier.region,
							post_code: supplier.post_code,
							country: supplier.country,
							phone_no: supplier.phone_no						
						});
						$scope.index = $scope.suppliers.indexOf(supplier);
				}
				//delete a row
				$scope.deleteSupplier = function(index){
					$scope.dataLoading = true;
					SupplierService.Delete(code)
					.then(function (response){
						if(response.success){
							$scope.suppliers.splice(index, 1);
							 $location.path('/home');
						} else {
							$scope.dataLoading = false;
						}
					});
				}
				//copy new row
				$scope.copy = function(index, data){
					var newRow = angular.copy(data);
					$scope.suppliers.push(newRow);
				}
			}

			mySupplier.directive("limitToMax", function(){
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