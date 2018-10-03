// JavaScript Document
(function(){
	'use strict';
	
	var myMessage = angular.module('myMessageController', []);
			
			myMessage.controller('MessageController', MessageController);
			MessageController.$inject = ['$location', '$scope', '$http'];
			function MessageController($location, $scope, $http){
				var messagelists = [''];	
				$scope.messages = messagelists;
				$scope.newMessages = '';
				
				$scope.sendMessage = function(newMessages){
					$scope.dataLoading = true;
					var addMessage = {messages:newMessages};
					var d = new Date();
					$http({
						method: 'POST',
						url: 'message_action.php',
						data: $scope.message,
						 headers : {'Content-Type': 'application/x-www-form-urlencoded'}
					})
					.then(function success(response){
								$scope.messages.push({
								// user_id: $scope.message.user_id,
								 messages: $scope.message.messages,
								 created_date: d
								});

								$scope.message = response.data;
								$scope.messages = {};
								$scope.newMessages++;
								$location.path('/home');							 
					});
				};

				$scope.getMessages = function(){
					$scope.dataLoading = true;
					$http({
						method: 'GET',
						url: 'fetch_messages.php'
					})
					.then(function success(response){
							$scope.messages = response.data;
							$location.path('/home');
							$scope.dataLoading = false;
						});
				};

				//copy new row
				$scope.copy = function(index, data){
					var newRow = angular.copy(data);
					$scope.messages.push(newRow);
				}
			}
})(window.angular);
