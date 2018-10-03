
(function() {
	'use strict';
	var myMarketUser = angular.module('myMarketUserController', []);
	myMarketUser.factory("marketUserFactory", ['$http', function ($http) {
    return {
        login: function (body) {
        	return $http.post('/api/sessions/login', body);
        },
        createMarketUser: function (body, spi) {
        	if(spi){
            	$http.setSession('Spi', spi);
            	//httpAuth.setSession('OAuthProvider', 'yahoo');
        	}
        	return $http.post('market_user_action.php', body);
        },
        updateAccount: function (body) {
        	return $http.put('/api/users', body);
        },
        saveImage: function (formData) {
        	return $http.post('/api/images/users', formData, {
                headers: {'Content-Type': undefined },
                transformRequest: angular.identity
            });
        },
        getCurrencyX: function (pn) {
        	return $http.get("/api/currencyX/"+ pn +".json");
        }
    }
}]);
	myMarketUser.factory('sessionService', ['$http', function($http){
	return{
		set: function(key, value){
			return sessionStorage.setItem(key, value);
		},
		get: function(key){
			return sessionStorage.getItem(key);
		},
		destroy: function(key){
			$http.post('logout.php');
			return sessionStorage.removeItem(key);
		}
	};
}]);
	myMarketUser.factory('loginService', function($http, $location, sessionService){
	return{
		login: function(user, $scope){
			var validate = $http.post('login.php', user);
			validate.then(function(response){
				var uid = response.data.user;
				if(uid){
					sessionService.set('user',uid);
					$location.path('/home');
				}
				else{
					$scope.successLogin = false;
					$scope.errorLogin = true;
					$scope.errorMsg = response.data.message;
				}
			});
		},
		logout: function(){
			sessionService.destroy('user');
			$location.path('/');
		},
		islogged: function(){
			var checkSession = $http.post('session.php');
			return checkSession;
		},
		fetchuser: function(){
			var user = $http.get('fetch_market_user.php');
			return user;
		}
	}
});

myMarketUser.controller('marketUserController', marketUserController);
marketUserController.$inject = ['$scope', '$location', 'marketUserFactory', '$http'];
function marketUserController($scope, $location, marketUserFactory, $http){
      var marketuserlists = [''];	
	  $scope.users = marketuserlists;
	  $scope.editIndex = -1;

      $scope.form = {
      		user_id: "",
    		fullname: "",
    		loginname: "",
    		password: "",
    		sex: "",
    		created_date: "",
    		updated_date: "",
    		enabled: "Yes",
    		user_status: ""
      };

	  $scope.createUser = function () {
			$http({
			 method: 'POST',
			 url: 'market_user_action.php',
			 data: $scope.user,
			 headers : {'Content-Type': 'application/x-www-form-urlencoded'}
			}).then(function success(response){
				$scope.user = response.data;
				$scope.user = {};				
				$location.path('/home'); 
		});

		  /*var oAuthSpiItem = null;
		  if(forOAuth){
	  		  oAuthSpiItem = $http.getSession('oAuthSpiCSM');
		  }
		  
		  marketUserFactory.createMarketUser(JSON.stringify($scope.form), oAuthSpiItem).success(
			  function(data, status, headers, config) {
				$http.setCredentials($scope.form.user_id, $scope.form.password);
				angular.element($('.modal')[0]).scope().modalOptions.close();	
		  }).then(function(response){
				if(response.headers('Authenticated')){
					$http.setSession('authenticatedCSM', response.headers('Authenticated'));
				}
				window.location="../portal/index";
		  });*/
	  };
	  
	  $scope.update = function () {
		  $scope.formSubmitted = true;

		  if(!$scope.updateAccount.$valid) {
		       return;
		  }

		  http.put('/api/users/'+$scope.form.user_id, JSON.stringify($scope.form)).success(
			  function(data, status, headers, config) {
				$http.setCredentials($scope.form.user_id, $scope.form.password);
				$scope.updateSuccess = true;
		  }).error(function(data, status, headers, config) {
			  $scope.updateFail = true;
			  $scope.updateSuccess = false;
			  $scope.serverErrorMessage = errorHandler.renderOnForms(data);
		  });
	  };

	  $scope.getMarketUser = function(){
		$scope.dataLoading = true;
		$http({
			method: 'GET',
			url: 'fetch_market_user.php'
		}).then(function success(response){
			$scope.users = response.data;
			$location.path('/home');
			$scope.dataLoading = false;
		});
	};

	  //Only called in creation..
	   $scope.updateCredit = function(){
		  if($scope.form.currency=="USD"){
			  $scope.credit = 20000;
		  }
		  else{
			  marketUserFactory.getCurrencyX("USD"+$scope.form.currency+"=X").success(
				  function(data, status) {
					  $scope.credit = data.ask*20000;
			  });
		  }
	  }

	  $scope.restFormFromUser = function() {
		  genericAPIFactory.get("/api/users/"+$http.getLoggedInUser()+".json")
			.success(function(data, status, headers, config) {
				if(!data.profileImg){
					data.profileImg = "img/anon.png";
				}
				if(data.bigProfileImg){
					delete data.bigProfileImg;
				}
				data.password ='';
				$scope.form = data;
		  });
	  }
	  
	  $scope.progressVisible = false;
	  $scope.progressType = "warning";
	  $scope.progress = 0;
	  $scope.credit = 20000;
	  $scope.formSubmitted = false;
	  $scope.serverErrorMessage ="";
	  $scope.updateSuccess = false;
	  $scope.updateFail = false;
	  
	 /*if($http.isUserAuthenticated() && !$scope.formSubmitted){
		  $scope.restFormFromUser();
	  }*/

	  $scope.setLanguage = function(language) {
		 // $translate.use(language);
		  $scope.form.language = language;
	  }
	  
	  $scope.setFiles = function(element) {
		  $scope.progressType = "warning";
		  $scope.progress = 0;
	      $scope.progressVisible = true;
	      $scope.form.profileImg = "img/anon.png";
	      
	      var fd = new FormData();
	      fd.append("file",  element.files[0]);

	      marketUserFactory.saveImage(fd)
	    	.success(
				function(data, status, headers, config) {
		    	  $scope.progressType = "success";
		    	  $scope.form.profileImg = '..'+headers('Location');
		    	  $scope.progress = 100;
		  })
		  .error(
				function(data, status, headers, config) {
		    	  $scope.progressType = "danger";
		    	  $scope.progress = 100;
	      });
	   };
};

	myMarketUser.factory('AuthenticationService', function($http){
			var user;
			return {
				setUser : function(oliUser){
					user = oliUser;
			},
				isLoggedIn : function(){
					return(user)? user : false;
				}
		}
  });

	myMarketUser.controller("LoginByUsernameAndPasswordController", LoginByUsernameAndPasswordController);
	LoginByUsernameAndPasswordController.$inject = ['$scope', 'AuthenticationService', '$http', '$location'];
	function LoginByUsernameAndPasswordController($scope, AuthenticationService, $http, $location){
      $scope.errorLogin = false;
		var user;
	$scope.login = function () {
		  var loginname = $scope.loginname;
		  var password = $scope.password;
		  $http({
		  		url: 		'login.php',
		  		method: 	'POST',
		  		headers:    {
		  			'Content-Type': 'application/x-www-form-urlencoded'
		  		},
		  		data:'loginname='+loginname+'&password='+password
		  }).then(function success(response){
		  	if (response.data.status == 'loggedin') {
			AuthenticationService.userLoggedIn();
			AuthenticationService.setName(response.data.user);
		  	console.log(response.data);
		  	$location.path('/home.php');
		  } else{
		  	alert('invalid login');
		  }
		  })
		}
	$scope.clearMsg = function(){
		$scope.errorLogin = false;
	}
};

})(window.angular);