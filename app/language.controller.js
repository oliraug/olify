(function (){
	'use strict';

	var myLanguage = angular.module("myLanguageController", []);
        myLanguage.controller("LanguageController", LanguageController);
        LanguageController.$inject = ['$scope', '$http', '$location', 'languageService'];
        function LanguageController($scope, $http, $location, languageService) {
           var languagelist = [''];
           $scope.languages = languagelist;

            $scope.getLanguages = function(){
			$http({
				method: 'GET',
				url: 'fetch_languages.php'
			}).then(function success(response) { 
                $scope.languages = response.data;
				$scope.statuscode = response.status;
				$scope.statustext = response.statusText;
				$location.path('/home');
				$scope.dataLoading = false;     
            });
		}
            
            $scope.newLanguage = function(){
               $http({ 
			   method: 'POST',
               url:'language_action.php',
               data : $scope.language, 
               headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
               }).then(function success(response) {
				   if($scope.language){
				   $scope.languages = {};
				   $scope.language = response.data;
				   $location.path('/home');
				   } 
               });
            };

            $scope.languageNames = languageService.getLanguageNames();
            $scope.languageCodes = languageService.getLanguageCodes();
        };
	myLanguage.factory('languageService', function(){
            var names = [
            	{data:"abkhazian", label:"Abkhazian"},
            	{data:"afar", label:"Afar"},
            	{data:"afrikaans", label:"Afrikaans"},
            	{data:"albanian", label:"Albanian"}];
            var codes = [
            	{name:"abkhazian", label:"ab"},
            	{name:"afar", label:"aa"},
            	{name:"afrikaans", label:"af"},
            	{name:"albanian", label:"sq"}];

            var getLanguageNames = function(){
            	return names;
            };
            var getLanguageCodes = function(){
            	return codes;
            };
            return {
            	getLanguageNames: getLanguageNames,
            	getLanguageCodes: getLanguageCodes
            }
        });
            
 })(window.angular);
