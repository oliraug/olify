// JavaScript Document
(function(){
	'use strict';
	
	var myMarketIndex = angular.module('myMarketIndexController', []);
			
			myMarketIndex.controller('MarketIndexController', MarketIndexController);
			MarketIndexController.$inject = ['$location', '$scope', '$http'];
			function MarketIndexController($location, $scope, $http){
				var indexlists = [''];	
				$scope.indexes = indexlists;
				$scope.tempMarketIndextData = {};
												
				$scope.newIndex = function(){
					$scope.dataLoading = true;
					$http({
						method: 'POST',
						url: 'market_index_action.php',
						data: $scope.index,
						 headers : {'Content-Type': 'application/x-www-form-urlencoded'}
					})
					.then(function success(response){
							if ($scope.index) {
								$scope.index = response.data;
								$scope.index = {};
								$location.path('/home');
							} else{
								$scope.dataLoading = false;
							}
							 
					});
				};

				$scope.getMarketIndex = function(){
					$scope.dataLoading = true;
					$http({
						method: 'GET',
						url: 'fetch_market_index.php'
					})
					.then(function success(response){
							$scope.indexes = response.data;
							 $location.path('/home');
							$scope.dataLoading = false;
						});
				};

				$scope.updateMarketIndex = function(){
					Saleservice.Update(index, code);
				}
				$scope.editmarketindex = function(sale){
					$scope.tempMarketIndextData({
							code: indexes.code,
							index_name:indexes.index_name,
							market_id: indexes.market_id,
							stock_id: indexes.stock_id							
						});
						$scope.index = $scope.indexes.indexOf(index);
				}
				//delete a row
				$scope.deleteMarketIndex = function(index){
					$scope.dataLoading = true;
					saleservice.Delete(code)
					.then(function (response){
						if(response.success){
							$scope.indexes.splice(index, 1);
							 $location.path('/home');
						} else {
							$scope.dataLoading = false;
						}
					});
				}
				//copy new row
				$scope.copy = function(index, data){
					var newRow = angular.copy(data);
					$scope.indexes.push(newRow);
				}
			}

			myMarketIndex.directive("limitToMax", function(){
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