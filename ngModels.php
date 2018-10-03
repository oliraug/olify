<!DOCTYPE html>
<html>
<head>
	<title>ng-models Example</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js"></script>

</head>
<body>
	<div ng-app="myApp" ng-controller="myController">
  Average Salary
  <input type="number" ng-model="averageSalary"><br/>
  Benefits
  <input class="input input-sm" type="number" ng-model="benefitsAt"><br/>
  Occupancy
  <input class=" input input-sm" type="number" ng-model="occupancy"><br/>
</div>
<script type="text/javascript">
var app = angular.module('myApp', [])
  .controller('myController', function($scope) {
    $scope.averageSalary =  0;
    $scope.benefitsAt = 0;   
    
    $scope.$watch('averageSalary + benefitsAt', function() {
    $scope.occupancy = $scope.averageSalary * $scope.benefitsAt;
   });
  });
</script>
</body>
</html>