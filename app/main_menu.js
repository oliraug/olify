(function() {
	'use strict';
	var myMarket = angular.module('myMenu', []);
	myMarket.controller('menuController', menuController);
	menuController.$inject = ['$scope', '$rootScope', '$translate', '$location', 'AuthenticationService', 'genericAPIFactory'];
	function menuController($scope, $rootScope, $translate, $location, AuthenticationService, genericAPIFactory) {
	
        $scope.$watch(AuthenticationService.isLoggedIn, function(value, oldValue){
            if (!value && oldValue) {
                console.log('Disconnect');
                $location.path('/login');
            } if (value) {
                console.log('Connect');
                $location.path('/home');
            }
        }, true);


	$scope.menuModal = function (feature) {
       // modalService.showModal({templateUrl:'/portal/html/partials/'+feature+'_modal.html'}, {});
    }
	
	$rootScope.userAuthenticated = function () {
		$scope.loggedInUser = httpAuth.getLoggedInUser();
        return httpAuth.isUserAuthenticated();
    }
	$rootScope.logout = function () {
        httpAuth.clearSession();
        genericAPIFactory.del("/api/sessions/current");
        window.document.location="../portal/index";
    }
	$scope.init = function () {
		if($('#spi').text()){
			httpAuth.setSession('oAuthSpiCSM', $('#spi').text());
		}
		if(httpAuth.getLoggedInUser()){
			genericAPIFactory.get("/api/users/"+httpAuth.getLoggedInUser()+".json")
			.success(function(data, status, headers, config) {
			    $translate.use(data.language);
			    $location.search('lang', data.language);
			});
		};
    }
	
	$scope.loggedInUser = null;
	$scope.init();
};

myMarket.factory("genericAPIFactory", function (httpAuth) {
    return {
        get: function (url) {
        	return httpAuth.get(url);
        },
        post: function (url, body) {
        	return httpAuth.post(url, body);
        },
        del: function (url) {
        	return httpAuth.del(url);
        }
    }
});

myMarket.factory('UrlLanguageStorage', ['$location', function($location) {
    return {
        put: function (name, value) {},
        get: function (name) {
            return $location.search()['lang']
        }
    };
}]);

myMarket.factory("errorHandler", ['$translate', function ($translate) {
    return {
        render: function (data) {
        	if(data.message && data.message.length > 0){
        		return data.message;
        	}
        	else if(!data.message && data.i18nKey && data.i18nKey.length > 0){
        		return $translate(data.i18nKey);
        	}
        	return $translate("error.api.generic.internal");
        },
        renderOnForms: function (data) {
        	if(data.error && data.error.length > 0){
        		return data.error;
        	}
        	else if(data.message && data.message.length > 0){
            	return data.message;
        	}
        	else if(!data.message && data.i18nKey && data.i18nKey.length > 0){
        		return $translate(data.i18nKey);
        	}

        	return $translate("error.api.generic.internal");
        }
    }
}]);

})();