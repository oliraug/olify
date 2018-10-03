<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    	<script type="text/javascript" src="app/angular.js"></script>
		<script type="text/javascript" src="app/angular-cookies.js"></script>
		<script type="text/javascript" src="app/angular-route.js"></script>
		
	<style type="text/css">
		body{
  padding: 25px;
  background-color: black;
  color: gray;
}
.templateRoot{
    display: inline-block;
}
.hover-edit-trigger {
    padding: 3px;
}
.hover-edit-trigger:hover{
    border: 1px solid #dcdcdc;
    border-radius: 4px;
}
.edit-pencil{
    display: none;
    margin-left: 3px;
    padding: 3px;
    border-left: 1px solid #dcdcdc;
}
.hover-text-field:hover .edit-pencil{
    display: inline-block;
}
.edit-button-group{
    border: 1px solid #dcdcdc;
    border-top: none;
    border-radius: 4px;
    padding: 0px 3px 0px 3px;
}
.edit-button-group .glyphicon{
    border: 1px solid #dcdcdc;
    border-radius: 4px;
    margin: 1px;
    cursor: pointer;
}

	</style>
</head>
  <body ng-app="widgets">
    
    <div class="container-fluid img-rounded" style="border: 1px solid gray; padding: 25px; display: inline-block; width: 400px" ng-controller="WidgetsController">

        <div>
            <h3>Click to Edit</h3>
            <div>
                Mousing over the field value triggers a nice box and an 'edit pencil' asking the user to 'click to edit'.
                Model is not updated unless saved by clicking the check mark or hitting enter. This works in IE9 locally but not here in codepen... NSW
            </div>
        </div>

        <hr>

        <label>Sprint name:</label> <div click-to-edit type="inputText" ng-model="sprintName"></div>
        <br/>
        <label>Sprint desc:</label> <div click-to-edit type="inputText" ng-model="sprintDesc"></div>

    </div>

</body>
<script type="text/javascript">
	var widgets = angular.module('widgets', []);

widgets.controller('WidgetsController', ['$scope',  function($scope){
    $scope.sprintName = "Sprint 3";
    $scope.sprintDesc = "Learn directives";
}]);

/*
 * first stab at a 'click to edit' element based on
 * Atlassian/Jira's amazing interface elements.
 * i tried getting clever with transclusion of the input fields but had
 * to move forward because it was getting over my head (even more).
 */
widgets.directive('clickToEdit', function($timeout) {
    return {
        require: 'ngModel',
        scope: {
            model: '=ngModel',
            type: '@type'
        },
        replace: true,
        transclude: false,
        // includes our template
        template:
            '<div class="templateRoot">'+
                '<div class="hover-edit-trigger" title="click to edit">'+
                    '<div class="hover-text-field" ng-show="!editState" ng-click="toggle()">{{model}}<div class="edit-pencil glyphicon glyphicon-pencil"></div></div>'+
                    '<input class="inputText" type="text" ng-model="localModel" ng-enter="save()" ng-show="editState && type == \'inputText\'" />' +
                '</div>'+
                '<div class="edit-button-group pull-right" ng-show="editState">'+
                    '<div class="glyphicon glyphicon-ok"  ng-click="save()"></div>'+
                    '<div class="glyphicon glyphicon-remove" ng-click="cancel()"></div>'+
                '</div>'+
            '</div>',
        link: function (scope, element, attrs) {
            scope.editState = false;

            // make a local ref so we can back out changes, this only happens once and persists
            scope.localModel = scope.model;

            // apply the changes to the real model
            scope.save = function(){
                scope.model = scope.localModel;
                scope.toggle();
            };

            // don't apply changes
            scope.cancel = function(){
                scope.localModel = scope.model;
                scope.toggle();
            }

            /*
             * toggles the editState of our field
             */
            scope.toggle = function () {

                scope.editState = !scope.editState;

                /*
                 * a little hackish - find the "type" by class query
                 *
                 */
                var x1 = element[0].querySelector("."+scope.type);

                /*
                 * could not figure out how to focus on the text field, needed $timout
                 * http://stackoverflow.com/questions/14833326/how-to-set-focus-on-input-field-in-angularjs
                 */
                $timeout(function(){
                    // focus if in edit, blur if not. some IE will leave cursor without the blur
                    scope.editState ? x1.focus() : x1.blur();
                }, 0);
            }
        }
    }
});
/*
 * seriously i would have never thought of this on my own, i don't think in directives yet
 * http://stackoverflow.com/questions/17470790/how-to-use-a-keypress-event-in-angularjs
 *
widgets.directive('ngEnter', function () {
    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            if(event.which === 13) {
                scope.$apply(function (){
                    scope.$eval(attrs.ngEnter);
                });
                event.preventDefault();
            }
        });
    };
});*/
</script>
</html>