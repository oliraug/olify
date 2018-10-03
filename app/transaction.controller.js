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
							quantity: invoice.quantity,
							user_id:  invoice.user_id,
							action_type: invoice.action_type,
							
							transaction_amount: invoice.transaction_amount,
							product_code: invoice.product_code,
							invoice_number: invoice.invoice_number,
							payment_status: invoice.payment_status,
							comment: invoice.comment							
						});
						$scope.index = $scope.invoices.indexOf(invoices);
				}
				//delete a row
				$scope.deleteTransaction = function(index){
					$scope.dataLoading = true;
					TransactionService.Delete(code)
					.then(function (response){
						if(response.success){
							$scope.transactions.splice(index, 1);
							 $location.path('/home');
						} else {
							$scope.dataLoading = false;
						}
					});
				}
				//copy new row
				$scope.copy = function(index, data){
					var newRow = angular.copy(data);
					$scope.transactions.push(newRow);
				}
			}

			myTransaction.directive("limitToMax", function(){
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