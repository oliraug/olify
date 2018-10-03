(function(){
  'use strict';
    var myReview = angular.module('myProductReviewController', ['ui.bootstrap', 'ngAnimate']);
      myReview.controller('ProductReviewController', ProductReviewController);
			ProductReviewController.$inject = ['$location', '$scope', '$http'];
			function ProductReviewController($location, $scope, $http, $modalInstance, $modal){
				var reviewlists = [''];	
				$scope.reviews = reviewlists;
    			
    		$scope.newProductReview = function(){
					$scope.dataLoading = true;
					$http({
						method: 'POST',
						url: 'product_review_action.php',
						data: $scope.review,
						headers : {'Content-Type': 'application/x-www-form-urlencoded'}
					})
					.then(function success(response){
						if($scope.review){
							$scope.review = response.data;
							$scope.review = {};
							 $location.path('/home');
						} else {
							$scope.dataLoading = false;
						}
					});
				};

        $scope.getProductReview = function(){
			$http({
              method: 'GET',
              url: 'fetch_product_review.php'
			})
          .then(function success(response){
            $scope.reviews = response.data;
            $scope.statuscode = response.status;
            $scope.statustext = response.statusText;
            $location.path('/home');
            $scope.dataLoading = false; 
          })
        }
        $scope.deleteReview = function(index){
			var id = 'id';
			var btn_action = 'delete';
          
          if (confirm('Are you sure you want to delete product review?')) {
          $http({
            method: 'POST',
            url: 'delete_product_review.php',
			data: {'id':id, 'status':status, 'btn_action':btn_action},
			headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
          })
          .then(function success(response){
			$scope.reviews.splice(index, 1);
            $location('/home');
          });
        } else {
          $scope.dataLoading = false;          
        }
        
      }
      $scope.updateProductReview = function(index){
        $scope.review = $scope.reviews[index];
        $scope.btn_action = 'fetch_single';
        $http({
          method: 'POST',
          url: 'editProductReview.php'
        }).
        then(function success(response){
          var modal_element = angular.element('#updateCategoryModal');
          modal_element.modal('show');
         /*'category_id' =  $scope.category.category_id;
          'user_id' = $scope.category.user_id;
          'category_name' = $scope.category.category_name;
          'category_status' = $scope.category.category_status;
          'description' = $scope.category.description;*/
        })
      }

      $scope.changeReviewStatus = function(review){
        review.status = (review.status=="Active" ? "Inactive" : "Active");
        $http({
            method: 'POST',
            url: 'delete_review.php',
            data: ({id:review.id, status:review.status})
            })
      };
	  
	  
	  //$scope.category = angular.copy(item);
        
        $scope.cancel = function () {
            $modalInstance.dismiss('Close');
        };
        //$scope.title = (item.category_id > 0) ? 'Edit category' : 'Add category';
       // $scope.buttonText = (item.category_id > 0) ? 'Update category' : 'Add New category';

        //var original = item;
        $scope.isClean = function() {
            return angular.equals(original, $scope.review);
        }
        $scope.saveProductReview = function (review) {
            review.uid = $scope.uid;
            if(review.id > 0){
				$http({
					method: 'POST',
					url: 'updateCategory',
					data: {id:review.id}
				})
                .then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(review);
                        x.save = 'update';
                        $modalInstance.close(x);
                    }else{
                        console.log(result);
                    }
                });
            }else{
                review.status = 'Active';
                $http({
					method: 'POST',
					url: 'updateProductReview',
					data: {id:review.id}
				})
				.then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(review);
                        x.save = 'insert';
                        x.id = result.data;
                        $modalInstance.close(x);
                    }else{
                        console.log(result);
                    }
                });
            }
        };
    };
})(window.angular);