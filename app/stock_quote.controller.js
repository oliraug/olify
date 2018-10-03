// JavaScript Document
(function(){
	'use strict';
	
	var myStockQuote = angular.module('myStockQuoteController', []);
			
			myStockQuote.controller('StockQuoteController', StockQuoteController);
			StockQuoteController.$inject = ['$location', '$scope', '$http'];
			function StockQuoteController($location, $scope, $http){
				var stockquotelists = [''];	
				$scope.quotes = stockquotelists;
				$scope.tempStockQuotetData = {};
												
				$scope.newStockQuote = function(){
					$scope.dataLoading = true;
					$http({
						method: 'POST',
						url: 'stock_quote_action.php',
						data: $scope.quote,
						 headers : {'Content-Type': 'application/x-www-form-urlencoded'}
					})
					.then(function success(response){
							if ($scope.quote) {
								$scope.quote = response.data;
								$scope.quote = {};
								$location.path('/home');
							} else{
								$scope.dataLoading = false;
							}
							 
					});
				};

				$scope.getStockQuote = function(){
					$scope.dataLoading = true;
					$http({
						method: 'GET',
						url: 'fetch_stock_quote.php'
					})
					.then(function success(response){
							$scope.quotes = response.data;
							 $location.path('/home');
							$scope.dataLoading = false;
						});
				};

				$scope.updateStockQuote = function(){
					Saleservice.Update(quote, stock_id);
				}
				$scope.editstockquote = function(sale){
					$scope.tempStockProductData({
							stock_id: quotes.stock_id,
							bid: quotes.bid,
							ask: quotes.ask							
						});
						$scope.index = $scope.quotes.indexOf(quote);
				}
				//delete a row
				$scope.deleteStockQuote = function(index){
					$scope.dataLoading = true;
					if (confirm('Are you sure you want to delete?')) {
						$http({
							method: 'DELETE',
							url: 'delete_stock_quote.php', 'index':index
					}).
					then(function success(response){
						alert(data);
						$location.path('/home');
					});
				} else{
					return false;
				}
					$scope.quotes.splice(index, 1);
			}
				
				//copy new row
				$scope.copy = function(index, data){
					var newRow = angular.copy(data);
					$scope.quotes.push(newRow);
				}
			}

			myStockQuote.directive("limitToMax", function(){
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