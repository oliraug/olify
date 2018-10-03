(function(){
  'use strict';
    var myCategory = angular.module('myCategoryController', ['ui.bootstrap', 'ngAnimate']);

    myCategory.filter('startFrom', function(){
      return function(input, start){
        if (input) {
          start = +start; //parse to int
          return input.slice(start);
        }
        return [];
      }
    });
      
      myCategory.controller('CategoryController', CategoryController);
			CategoryController.$inject = ['$location', '$scope', '$http', '$timeout', '$modal'];
			function CategoryController($location, $scope, $http, $modalInstance, $modal, $timeout){
				var categorylists = [''];	
				$scope.categorys = categorylists;
        $scope.tempCategory = {};
        $scope.editMode = false;
        $scope.index = '';

    		$scope.newCategory = function(){
					$scope.dataLoading = true;
          $http({
            method: 'POST',
            url: 'category_action.php',
            data: $scope.category,
             headers : {'Content-Type': 'application/x-www-form-urlencoded'}
          })
					.then(function success(response){
						if($scope.category){
              $scope.category = response.data;
							$scope.category = {};
							 $location.path('/home');
						} else {
							$scope.dataLoading = false;
						}
					});
				};

          $scope.GetSelectedCategory = function() {
            $scope.strCategory = $scope.category_name;
          };
          $scope.GetSelectedSubcategory = function() {
            $scope.strSubcategory = $scope.subcategorySrc;
          };
          $scope.GetSelectedSemicategory = function(){
          $scope.strSemicategory = $scope.semicategorySrc;
          };

        $scope.getCategory = function(){
          $http({
              method: 'GET',
              url: 'fetch_category.php'
          })
          .then(function success(response){
            $scope.categories = response.data;
            $scope.statuscode = response.status;
            $scope.statustext = response.statusText;
            $location.path('/home');
            //$scope.list = data; 
            $scope.currentPage = 1; //current page
            $scope.entryLimit = 5; //max no of items to display on a page
            $scope.filteredItems = $scope.list.length; // initially for no filter 
            $scope.totalItems = $scope.list.length;
          })
        }
        $scope.setPage = function(pageNo){
          $scope.currentPage = pageNo;
        }
        $scope.filter = function(){
          $timeout(function(){
            $scope.filteredItems = $scope.list.length;
          }, 10);
        };
        $scope.sort_by = function(predicate){
          $scope.predicate = predicate;
          $scope.reverse = !$scope.reverse;
        };
        $scope.deleteCategory = function(index){
			var category_id = 'category_id';
			var btn_action = 'delete';
          
          if (confirm('Are you sure you want to delete category?')) {
          $http({
            method: 'POST',
            url: 'delete_category.php',
			data: {'category_id':category_id, 'category_status':category_status, 'btn_action':btn_action},
			headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
          })
          .then(function success(response){
			$scope.categories.splice(index, 1);
            $location('/home');
          });
        } else {
          $scope.dataLoading = false;          
        }
        
      }
      $scope.updateCategory = function(){
        $('#updateCategoryModal').modal('toggle');
        $scope.newCategory();
      }
      
      $scope.editCategory = function(category){
        $scope.tempCategory = {
          category_id: category.category_id,
          category_name: category.category_name,
          category_status: category.category_status,
          description: category.description
        };
        $scope.editMode = true;
        $scope.index = $scope.categorys.indexOf(category); 
      }

      $scope.changeCategoryStatus = function(category){
        category.category_status = (category.category_status=="Active" ? "Inactive" : "Active");
        $http({
            method: 'POST',
            url: 'delete_category.php',
            data: ({category_id:category.category_id, category_status:category.category_status})
            })
      };
	  
	    $scope.cancel = function () {
            $modalInstance.dismiss('Close');
        };
        $scope.loadTemplate = function(content) {
          if (content.category_id === $scope.categorys.category_id) {
            return 'updateCategoryModal';
          } else{
            return 'view';
          }
        }
        $scope.saveCategory = function () {
        
				  $http({
					   method: 'POST',
					   url: 'updateCategory',
					   data: $.param({'category' : $scope.tempCategory, 'type': 'save_category'}),
             headers: {'Content-Type': 'application/x-www-form-urlencoded'}
				    }).then(function success(data, status, headers, config) {
                    if (data.category) {
                      if ($scope.editMode) {
                        $scope.categorys[$scope.index].category_id = data.category_id;
                        $scope.categorys[$scope.index].category_name = data.category_name;
                        $scope.categorys[$scope.index].category_status = data.category_status;
                        $scope.categorys[$scope.index].description = data.description;
                      }else {
                      $scope.categories.push({
                        category_id: data.category_id,
                        category_name: $scope.tempCategory.category_name,
                        category_status: $scope.tempCategory.category_status,
                        description: $scope.tempCategory.description
                      });
                    } 
                    $scope.messageSuccess(data.message);
                    $scope.categoryForm.$setPristine();
                    $scope.tempCategory = {};
                  }else{
                    $scope.messageFailure(data.message);
                }
            }).
              then(function error(data, status, headers, config) {
          //$scope.codeStatus = response || "Request failed";
      });      
      jQuery('.btn-save').button('reset');
      }
    };
})(window.angular);

/*obviously, the solution is: don't join


SELECT ( SELECT SUM(Amount) FROM tableA )
- ( SELECT SUM(Amount) FROM tableB ) AS difference

cool

That worked, but can it also show the cities also incase there are more then one city?*/