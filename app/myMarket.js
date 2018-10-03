
(function(){
	'use strict';
	
	var myMarket = angular.module('myMarket', ['ngRoute', 'ngCookies'])		   
		   .config(['$routeProvider', function($routeProvider, $locationProvider){
			   //$locationProvider.html5Mode(true);
			   $routeProvider
			   .when('/olify/home', {
				   url: '/home',
				   controller: 'HomeController',
				   templateUrl: '/home.php'
			   })
			   .when('/olify/index', {
				   url: '/index',
				   controller: 'LoginController',
				   templateUrl: '/index.php'
			   })
			   .when('/olify/register', {
				   url: '/market_user',
				   controller: 'RegisterController',
				   templateUrl: '/market_user.php'
			   })
			   .when('/olify/product', {
				   url: '/product',
				   controller: 'ProductController',
				   templateUrl: '/product.php'
			   })
			   .when('/olify/market', {
				   url: '/market',
				   controller: 'MarketController',
				   templateUrl: '/market.php'
			   })
			   .when('/olify/category', {
				   url: '/category',
				   controller: 'CategoryController',
				   templateUrl: '/category.php'
			   })
			   .when('/olify/transaction', {
				   url: '/transaction',
				   controller: 'TransactionController',
				   templateUrl: '/transaction.php'
			   })
			   .when('/olify/stock_product', {
				   url: '/stock_product',
				   controller: 'StockProductController',
				   templateUrl: '/stock_product.php'
			   })
			   .when('/olify/stock_quote', {
				   url: '/stock_quote',
				   controller: 'StockQuoteController',
				   templateUrl: '/stock_quote.php'
			   })
			   .when('/olify/market_index', {
				   url: '/market_index',
				   controller: 'MarketIndexController',
				   templateUrl: '/market_index.php'
			   })
			   .when('olify/quote', {
				   url: '/quote',
				   controller: 'QuoteController',
				   templateUrl: '/quote.php'
			   })
			   .when('olify/historic', {
				   url: '/historic',
				   controller: 'HistoricController',
				   templateUrl: '/historic.php'
			   })
			   .when('olify/historic_index', {
				   url: '/historic_index',
				   controller: 'HistoricIndexController',
				   templateUrl: '/historic_index.php'
			   })
			   .when('/olify/search', {
				   url: '/search',
				   controller: 'SearchController',
				   templateUrl: '/search.php'
			   })
			   .when('/olify/inventory_product_order', {
				   url: '/inventory_product_order',
				   controller: 'InventoryOrderProductController',
				   templateUrl: '/inventory_product_order.php'
			   })
			   .when('/olify/order', {
				   url: '/order',
				   controller: 'InventoryOrderController',
				   templateUrl: '/order.php'
			   })
			   .otherwise({ redirectTo: '/login'});
		   }]).run();
		  myMarket.controller("HomeController", function($scope) {});
		  myMarket.controller("LoginController", function($scope) {});
		  myMarket.controller("RegisterController", function($scope) {});
		  myMarket.controller("SearchController", function($scope) {});
		  myMarket.controller("ProductController", function($scope) {});
		  myMarket.controller("MarketController", function($scope) {});
		  myMarket.controller("CategoryController", function($scope) {});
		  myMarket.controller("TransactionController", function($scope) {});
		  myMarket.controller("StockProductController", function($scope) {});
		  myMarket.controller("StockQuoteController", function($scope) {});
		  myMarket.controller("MarketIndexController", function($scope) {});
		  myMarket.controller("QuoteController", function($scope) {});
		  myMarket.controller("HistoricController", function($scope) {});
		  myMarket.controller("HistoricIndexController", function($scope) {});
		  		  
		   run.$inject = ['$rootScope', '$location', '$cookies', '$http', 'AuthenticationService'];
		   function run($rootScope, $location, $cookies, $http, AuthenticationService){
			   //keep user logged in after page refesh
			   $rootScope.globals = $cookies.getObject('globals') || {};
			   if($rootScope.globals.currentUser){
				   $http.defaults.headers.common['Authentication'] = 'Basic' + $rootScope.globals.currentUser.authdata;
			   }
			   $rootScope.$on('$locationChangeStart', function(event, next, current){
				   //redirect to login page if not logged in and trying to access a restricted page
				   var restrictedPage =($location.path(), ['/login', '/index']) == -1;
				   var loggedIn = $rootScope.globals.currentUser;
				   console.log('Changed state to:' + next);
				   if(restrictedPage && !loggedIn){
					   $location.path('/login');
				   }
			   });
		   };
	})();