
(function(){
	'use strict';
	
	var app = angular.module('myMarket', ['ngRoute', 'ngCookies'])		   
		   .config(['$routeProvider', function($routeProvider, $locationProvider){
			   //$locationProvider.html5Mode(true);
			   $routeProvider
			   .when('/olify/home', {
			   		resolve:{
			   				check: function($location, AuthenticationService){
			   					if (!AuthenticationService.isUserLoggedIn()) {
			   					$location.path('/');
			   				}
			   			}
			   		},
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
				   url: '/olify_market_user',
				   controller: 'RegisterController',
				   templateUrl: '/olify_market_user.php'
			   })
			   .when('/olify/olify_product', {
				   url: '/olify_product',
				   controller: 'ProductController',
				   templateUrl: '/olify_product.php'
			   })
			   .when('/olify/olify_market', {
				   url: '/olify_market',
				   controller: 'MarketController',
				   templateUrl: '/olify_market.php'
			   })
			   .when('/olify/olify_category', {
				   url: '/olify_category',
				   controller: 'CategoryController',
				   templateUrl: '/olify_category.php'
			   })
			   .when('/olify/olify_transaction', {
				   url: '/olify_transaction',
				   controller: 'TransactionController',
				   templateUrl: '/olify_transaction.php'
			   })
			   .when('/olify/olify_stock_product', {
				   url: '/olify_stock_product',
				   controller: 'StockProductController',
				   templateUrl: '/olify_stock_product.php'
			   })
			   .when('/olify/olify_stock_quote', {
				   url: '/olify_stock_quote',
				   controller: 'StockQuoteController',
				   templateUrl: '/olify_stock_quote.php'
			   })
			   .when('/olify/olify_market_index', {
				   url: '/olify_market_index',
				   controller: 'MarketIndexController',
				   templateUrl: '/olify_market_index.php'
			   })
			   .when('olify/olify_quote', {
				   url: '/olify_quote',
				   controller: 'QuoteController',
				   templateUrl: '/olify_quote.php'
			   })
			   .when('olify/olify_historic', {
				   url: '/olify_historic',
				   controller: 'HistoricController',
				   templateUrl: '/olify_historic.php'
			   })
			   .when('olify/olify_historic_index', {
				   url: '/olify_historic_index',
				   controller: 'HistoricIndexController',
				   templateUrl: '/olify_historic_index.php'
			   })
			   .when('/olify/search', {
				   url: '/search',
				   controller: 'SearchController',
				   templateUrl: '/search.php'
			   })
			   .when('/olify/olify_supplier', {
				   url: '/olify_supplier',
				   controller: 'SupplierController',
				   templateUrl: '/olify_supplier.php'
			   })
			   .when('/olify/olify_order', {
				   url: '/olify_order',
				   controller: 'InventoryOrderController',
				   templateUrl: '/olify_order.php'
			   })
			   .when('/olify/olify_sales', {
				   url: '/olify_sales',
				   controller: 'SalesController',
				   templateUrl: '/olify_sales.php'
			   })
			    .when('/olify/olify_customers',{
			      url: '/olify_customers',
				   controller: 'CustomerController',
				   templateUrl: '/olify_customers.php'
			   })
			    .when('/olify/olify_oaaes',{
			      url: '/olify_oaaes',
				   controller: 'OaaesController',
				   templateUrl: '/olify_oaaes.php'
			   })
			    .when('/olify/olify_sades',{
			      url: '/olify_sades',
				   controller: 'SadesController',
				   templateUrl: '/olify_sades.php'
			   })
			    .when('/olify/olify_faoes',{
			      url: '/olify_faoes',
				   controller: 'FaoesController',
				   templateUrl: '/olify_faoes.php'
			   })
			    .when('/olify/olify_product_images',{
			      url: '/olify_product_images',
				   controller: 'ImageController',
				   templateUrl: '/olify_product_images.php'
			   })
			    .when('/olify/olify_currency',{
			      url: '/olify_currency',
				   controller: 'CurrencyController',
				   templateUrl: '/olify_currency.php'
			   })
			    .when('/olify/olify_languages',{
			      url: '/olify_languages',
				   controller: 'LanguageController',
				   templateUrl: '/olify_languages.php'
			   })
			    .when('/olify/olify_product_reviews',{
			      url: '/olify_product_reviews',
				   controller: 'ProductReviewController',
				   templateUrl: '/olify_product_reviews.php'
			   })
			   .otherwise({ redirectTo: '/login'});
		   }]).run();
		  
		   run.$inject = ['$rootScope', '$location', '$cookies', '$http', 'AuthenticationService'];
		   function run($rootScope, $location, $cookies, $http, AuthenticationService){
			   //keep user logged in after page refesh
			   $rootScope.$on('$locationChangeStart', function(event, next, current){
			   if (!AuthenticationService.isLoggedIn()) {
			   		console.log('DENY');
			   		event.preventDefault();
			   		$location.path('/login');
			   } else {
			   		console.log('ALLOW Changed state to:' + next);
			   		$location.path('/home');
			   }
			});

			   /*$rootScope.globals = $cookies.getObject('globals') || {};
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
			   });*/
		   };
	})();