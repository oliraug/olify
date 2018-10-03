// JavaScript Document
(function(){
	'use strict';
	
	var myInvoice = angular.module('myInvoiceController', []);
			
			myInvoice.controller('InvoiceController', InvoiceController);
			InvoiceController.$inject = ['$location', '$scope', '$http'];
			function InvoiceController($location, $scope, $http){
				var invoicelists = [''];	
				$scope.invoices = invoicelists;
				$scope.tempInvoiceData = {};
				$scope.invoice = {};
				$scope.invoice.quantity = 0;
				$scope.invoice.unit_cost = 0;				
				$scope.invoice.vat = 0;

				$scope.changed = function(){
					$scope.invoice.sub_total = $scope.invoice.quantity * $scope.invoice.unit_cost;
					$scope.invoice.total = (($scope.invoice.vat/100)*$scope.invoice.sub_total)+$scope.invoice.sub_total;
				}
				
				$scope.changed();

				$scope.newInvoice = function(){
					$scope.dataLoading = true;
					$http({
						method: 'POST',
						url: 'invoice_action.php',
						data: $scope.invoice,
						 headers : {'Content-Type': 'application/x-www-form-urlencoded'}
					})
					.then(function success(response){
							$scope.invoice = {};
							$scope.invoice = response.data;
							 $location.path('/home'); 
					});
				}
				$scope.getInvoices = function(){
					$scope.dataLoading = true;
					$http({
						method: 'GET',
						url: 'fetch_invoices.php'
					})
					.then(function success(response){
							$scope.invoices = response.data;
							 $location.path('/home');
							$scope.dataLoading = false;
						});
				}
				$scope.updateInvoice = function(){
					TransactionService.Update(invoice, invoice_no);
				}
				$scope.editInvoice = function(invoice){ 
					$scope.tempInvoiceData({
							invoice_no: invoice.invoice_no,
							invoice_date: invoice.invoice_date,
							category_id:  invoice.category_id,
							product_code: invoice.product_code,
							description: invoice.description,
							quantity: invoice.quantity,
							unit_cost: invoice.unit_cost,
							sub_total: invoice.sub_total,
							vat: invoice.vat,
							total: invoice.total														
						});
						$scope.index = $scope.invoices.indexOf(invoices);
				}
				//delete a row
				$scope.deleteInvoice = function(index){
					$scope.dataLoading = true;
					TransactionService.Delete(code)
					.then(function (response){
						if(response.success){
							$scope.invoices.splice(index, 1);
							 $location.path('/home');
						} else {
							$scope.dataLoading = false;
						}
					});
				}
				//copy new row
				$scope.copy = function(index, data){
					var newRow = angular.copy(data);
					$scope.invoices.push(newRow);
				}
			}

			myInvoice.directive("limitToMax", function(){
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