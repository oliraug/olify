
(function(){
	'use strict';
	
	var myAuth = angular.module('myAuthentication', [])
	.factory('AuthenticationService', ['$http','$scope' function($http, $scope){
	var loginname;
  var loggedin = false;
  var id;
  this.setName = function (name) {
    loginname = name;
  };
  this.getName = function(){
    return loginname;
  };
  this.isUserLoggedIn = function(){
    return loggedin;
  };
  this.userLoggedIn = function(){
    loggedin = true;
  };
  this.setID = function (userID) {
    id = userID;
  };
  this.getID = function(){
    return id;
  };

	return {
    setUser: setUser,
    getName: getName,
    isUserLoggedIn: isUserLoggedIn,
    userLoggedIn: userLoggedIn,
    setID: setID,
    getID: getID
   }
  }]);
  
})(window.angular);