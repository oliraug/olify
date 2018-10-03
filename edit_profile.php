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
	/* CSS using SCSS
   Created By: Don Page on 8/12/14
*/
@import url(https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,300,600,700);
* {
  margin: 0;
  padding: 0;
  border: 0;
  outline: 0;
  vertical-align: baseline;
  background: transparent;
  list-style-type: none;
  text-decoration: none;
}

body {
  font-family: "Open Sans", Helvetica Neue, Helvetica, Arial, sans-serif;
  width: 100%;
  height: 100%;
  overflow-y: scroll;
  background: url("https://i.imgur.com/fpyh0Vd.jpg") fixed;
  background-size: cover;
  font-size: 14px;
  font-size: 1.4em;
  line-height: 1.5;
}

.content-wrapper {
  box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.21);
  overflow-x: hidden;
  overflow-y: auto;
  width: 900px;
  margin: 2.5em auto;
  height: 1000px;
  background-color: rgba(255, 255, 255, 0.9);
  border-top: 5px solid #3c3c3c;
  border-radius: 2px;
}
.content-wrapper h2 {
  color: #3c3c3c;
  text-align: center;
  border-bottom: 1px solid #3c3c3c;
}
.content-wrapper .everyone-wrapper {
  margin-top: 30px;
}
.content-wrapper .everyone-wrapper section {
  -webkit-transition: right 0.3s ease;
  -moz-transition: right 0.3s ease;
  -ms-transition: right 0.3s ease;
  -o-transition: right 0.3s ease;
  transition: right 0.3s ease;
  margin-top: 10px;
  position: relative;
  background-color: #d5d5d5;
  width: 950px;
  height: 8em;
  right: 0;
  border-left: 5px solid #fb4953;
  border-bottom-left-radius: 4px;
  border-top-left-radius: 4px;
}
.content-wrapper .everyone-wrapper section:hover {
  -webkit-transition: all 0.3s ease;
  -moz-transition: all 0.3s ease;
  -ms-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
  right: 50px;
}
.content-wrapper .everyone-wrapper section .img-wrapper {
  display: block;
  float: left;
}
.content-wrapper .everyone-wrapper section .img-wrapper img {
  max-width: 200px;
  max-height: 100%;
}
.content-wrapper .everyone-wrapper section .edit-wrapper {
  margin-top: 14px;
  width: 50px;
  height: 100%;
  float: right;
}
.content-wrapper .everyone-wrapper section .edit-wrapper button {
  text-align: center;
  background-color: #fb4953;
  height: 50px;
  width: 50px;
  cursor: pointer;
  border-top: 1px solid #d5d5d5;
}
.content-wrapper .everyone-wrapper section .info-wrapper {
  padding: 5px;
  width: 660px;
  height: 7.5em;
  float: left;
}
.content-wrapper .everyone-wrapper section .info-wrapper h3 {
  display: inline;
}
.content-wrapper .everyone-wrapper section .info-wrapper h3 span {
  font-weight: 100;
}
.content-wrapper .everyone-wrapper section .info-wrapper p {
  font-weight: 200;
  font-size: 17px;
  line-height: 2.0;
}
.content-wrapper .everyone-wrapper section .info-wrapper span.email {
  border-right: none;
}
.content-wrapper .everyone-wrapper section .info-wrapper .from, .content-wrapper .everyone-wrapper section .info-wrapper .phone, .content-wrapper .everyone-wrapper section .info-wrapper .email {
  font-size: 15px;
  font-weight: 300;
  position: relative;
  bottom: 0;
  padding: 0 15px;
  border-right: 1px solid white;
}

button.yellow {
  background-color: #f9c359 !important;
}

button.red {
  background-color: #fb4953 !important;
}

button.green {
  background-color: #27c6a2 !important;
}

input {
  color: #4d4d4d;
  font-size: 14px;
  line-height: 1.5;
  width: 200px;
  background: #f2f2f2;
  border: 2px solid #3c3c3c;
  border-left: none;
  border-right: none;
  border-top: none;
  padding: 7px 14px;
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  outline: 0;
}

input#state {
  width: 50px;
}

input#city {
  width: 100px;
}

input:valid {
  -webkit-transition: border .3s ease-in-out;
  transition: border .3s ease-in-out;
  border-bottom: 2px solid #27c6a2;
}

textarea {
  height: 50px;
  width: 700px;
  background: #f2f2f2;
}

	</style>
</head>
	<!--
    Good use of ng-repeat & ng-switch to edit profile data within a object-array.
    @DonRPage
-->
<body ng-app="employeeApp" ng-controller="employeeController">
      <div class="content-wrapper">
        <h2>Angular Profile Editing</h2>

        <div class="everyone-wrapper">
            <section ng-switch on="(editIndex == $index)"
                     ng-repeat="person in employeeArray track by $index"
                     class="clearfix">
                <div class="img-wrapper clearfix">
                    <img ng-src="{{person.imgSrc}}">
                </div>
                <div class="info-wrapper clearfix">
                    <!-- Default Information -->
                    <h3 ng-switch-default>{{person.firstName}} {{person.lastName}} <span>| {{person.jobTitle}}</span>
                    </h3>

                    <p ng-switch-default class="p-desc">{{person.jobDesc}}</p>
                    <span ng-switch-default class="from">From: {{person.from.city}}, {{person.from.state}}</span> <span
                        ng-switch-default class="phone">Phone: {{person.phone}}</span> <span ng-switch-default
                                                                                             class="email">Email: {{person.email}}</span>
                    <!-- Edit Fields -->
                    <h3 ng-switch-when="true">
                        <input ng-model="editObject.firstName" placeholder="First Name" type="text"/>
                        <input ng-model="editObject.lastName" placeholder="Last Name" type="text"/>
                        <input ng-model="editObject.jobTitle" placeholder="Job Title" type="text"/>
                    </h3>

                    <p ng-switch-when="true" class="p-desc">
                        <textarea ng-model="editObject.jobDesc" placeholder="Job Description"> </textarea>
                    </p>
                    <span ng-switch-when="true" class="from">
                        <input ng-model="editObject.from.city" id="city" type="text" placeholder="City"/>
                        <input ng-model="editObject.from.state" id="state" type="text" placeholder="ST"/>
                    </span>
                    <span  ng-switch-when="true" class="phone">
                        <input ng-model="editObject.phone" type="text" placeholder="Phone"/>
                    </span>
                    <span  ng-switch-when="true" class="email">
                        <input ng-model="editObject.email" type="text" placeholder="Email"/>
                    </span>

                </div>
                <div class="edit-wrapper clearfix">

                    <!-- Default Buttons -->
                    <button class="yellow" ng-click="editingPerson($index)">edit</button>
                   <!-- <button class="red" ng-switch-default>trash</button>-->
                  <!--More functionality going to be added later-->

                    <!--Buttons for editing -->
                    <button class="green" ng-switch-when="true" ng-click="saveEdit($index)">save</button>
                    <button class="red" ng-switch-when="true" ng-click="cancelEdit()">X</button>
                </div>

            </section>
        </div>
    </div>
    <script type="text/javascript">
    	
angular.module("employeeApp", [])
    .controller("employeeController", function($scope, employeeService){

        $scope.editIndex = -1;
        $scope.editObject =   {
            firstName: "",
            lastName: "",
            imgSrc: "",
            from: {city: "", state:""},
            phone: "",
            email: "",
            jobTitle: "",
            jobDesc: ""
        };

        $scope.employeeArray = employeeService.getStaffArray();


        //edit button click
        $scope.editingPerson = function(personIndex){
            $scope.editObject = angular.copy($scope.employeeArray[personIndex]);
          /*
          *WHY COPY???
          Because, I wont to seperate the edits from the origanal array. Doing this allows the user to cancel their edit and since the fields are not data-binded to the origanl array, it won't make anychanges.
          */
            $scope.editIndex = personIndex;
        };

        //cancelEdit
        $scope.cancelEdit = function(){
            $scope.editIndex = -1;

        };

        //saveEdit
        $scope.saveEdit = function(personIndex){
            employeeService.updateInfo(personIndex, $scope.editObject);
            $scope.editIndex = -1;
        }
    });

angular.module("employeeApp")
    .service("employeeService", function(){


        //all employees.
        var staffArray = [
            {
                firstName: "Sloan",
                lastName: "Sabbith",
                imgSrc: "https://3.bp.blogspot.com/-2hitMEJeVjo/UmrJuPIFa6I/AAAAAAAAZFQ/Hmu_ieZ3RWQ/s1600/olivia-munn.jpg",
                from: {city: "Orlando", state:"FL"},
                phone: "222-211-2828",
                email: "sabbith@newsnight.net",
                jobTitle: "Finance",
                jobDesc: "A Cruncher of Numbers, I crave organisation, logic and efficiency and believe nothing should be done without a smile and the ability to laugh."
            }

        ];

        this.getStaffArray = function(){
            return staffArray;
        };

        //updating person
        this.updateInfo = function(personIndex, obj){
            staffArray.splice(personIndex, 1, obj)
        }
    });
    </script>
</body>
</html>