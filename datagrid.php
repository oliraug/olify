<!--?php
include('config.php');
$query=mysqli_query($con,"select * from olify_customers");
//$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
$arr = array();
//if($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($query)) {
        $arr[] = $row;  
    }


//while ($row = mysqli_fetch_array($sel)) {
# JSON-encode the response
$json_response = json_encode($arr);
// # Return the response
echo $json_response;
?-->


<!DOCTYPE html>
<<html  ng-app="myApp" lang="en">
<head>
<meta  charset="utf-8">
<link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  
<style  typetype="text/csstext/css">
</style>
    <title>Simple Datagrid with search, sort and paging using AngularJS, PHP, MySQL</>Simple Datagrid with search, sort and paging </title>
</head>
<body>
<div class="navbar navbar-default" id="navbar">
    <div class="container" id="navbar-container">
    <div class="navbar-header">
        <a href="http://angularcode.com" class="navbar-brand">
            <small>
                <i class="glyphicon glyphicon-log-out"></i>
                AngularCode / AngularJS Demos 
            </small>
        </a><!-- /.brand -->
        
    </div><!-- /.navbar-header -->
    <div class="navbar-header pull-right" role="navigation">
        <a href="http://angularcode.com/angularjs-datagrid-paging-sorting-filter-using-php-and-mysql/" class="btn btn-sm btn-danger nav-button-margin"> <i class="glyphicon glyphicon-book"></i>&nbsp;Tutorial Link</a>
        <a href="http://angularcode.com/download-link/?url=https://app.box.com/s/kyomkfyeb42irie6rxcl" class="btn btn-sm btn-warning nav-button-margin"> <i class="glyphicon glyphicon-download"></i>&nbsp;Download Project</a>
    </div>
    </div>
</div>


<div ng-controller="customersCrtl">
<div class="container">
<br/>
<blockquote><h4><a href="http://angularcode.com/angularjs-datagrid-paging-sorting-filter-using-php-and-mysql/">Simple Datagrid with search, sort and paging using AngularJS + PHP + MySQL</a></h4></blockquote>
<br/>
    <div class="row">
        <div class="col-md-2">PageSize:
            <select ng-model="entryLimit" class="form-control">
                <option>5</option>
                <option>10</option>
                <option>20</option>
                <option>50</option>
                <option>100</option>
            </select>
        </div>
        <div class="col-md-3">Filter:
            <input type="text" ng-model="search" ng-change="filter()" placeholder="Filter" class="form-control" />
        </div>
        <div class="col-md-4">
            <h5>Filtered {{ filtered.length }} of {{ totalItems}} total customers</h5>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12" ng-show="filteredItems > 0">
            <table class="table table-striped table-bordered">
            <thead>
            <th>Customer Name&nbsp;<a ng-click="sort_by('cust_name');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>Address&nbsp;<a ng-click="sort_by('cust_mobile');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>City&nbsp;<a ng-click="sort_by('cust_email');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>State&nbsp;<a ng-click="sort_by('cust_address');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>Postal Code&nbsp;<a ng-click="sort_by('cust_status');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>Country&nbsp;<a ng-click="sort_by('cust_join_date');"><i class="glyphicon glyphicon-sort"></i></a></th>
            </thead>
            <tbody>
                <tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                    <td>{{data.cust_name}}</td>
                    <td>{{data.cust_mobile}}</td>
                    <td>{{data.cust_email}}</td>
                    <td>{{data.cust_address}}</td>
                    <td>{{data.cust_status}}</td>
                    <td>{{data.cust_join_date}}</td>
                </tr>
            </tbody>
            </table>
        </div>
        <div class="col-md-12" ng-show="filteredItems == 0">
            <div class="col-md-12">
                <h4>No customers found</h4>
            </div>
        </div>
        <div class="col-md-12" ng-show="filteredItems > 0">    
            <div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
            
            
        </div>
    </div>
</div>
</div>
<script src="app/angular.js"></script>
<script src="js/ui-bootstrap-tpls-2.5.0.min.js"></script>        
<script type="text/javascript">	
var app = angular.module('myApp', ['ui.bootstrap']);

app.filter('startFrom', function() {
    return function(input, start) {
        if(input) {
            start = +start; //parse to int
            return input.slice(start);
        }
        return [];
    }
});
app.controller('customersCrtl', function ($scope, $http, $timeout) {
    $http.get('fetch_customer.php').then(function success(data){
        $scope.list = data;
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 5; //max no of items to display in a page
        $scope.filteredItems = $scope.list.length; //Initially for no filter  
        $scope.totalItems = $scope.list.length;
    });
    $scope.setPage = function(pageNo) {
        $scope.currentPage = pageNo;
    };
    $scope.filter = function() {
        $timeout(function() { 
            $scope.filteredItems = $scope.filtered.length;
        }, 10);
    };
    $scope.sort_by = function(predicate) {
        $scope.predicate = predicate;
        $scope.reverse = !$scope.reverse;
    };
});
</script>
</body>
</html>
<!--

CREATE TABLE IF NOT EXISTS `customers` (
  `customerNumber` int(11) NOT NULL,
  `customerName` varchar(50) NOT NULL,
  `contactLastName` varchar(50) NOT NULL,
  `contactFirstName` varchar(50) NOT NULL,
  `addressLine1` varchar(50) NOT NULL,
  `addressLine2` varchar(50) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) DEFAULT NULL,
  `postalCode` varchar(15) DEFAULT NULL,
  `country` varchar(50) NOT NULL,
  `salesRepEmployeeNumber` int(11) DEFAULT NULL,
  `creditLimit` double DEFAULT NULL,
  PRIMARY KEY (`customerNumber`),
  KEY `salesRepEmployeeNumber` (`salesRepEmployeeNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;