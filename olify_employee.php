
<?php
//product.php

include('config.php');
include('function.php');

/*if(!isset($_SESSION["type"]))
{
    header('location:login.php');
}

if($_SESSION['type'] != 'master')
{
    header('location:index.php');
}*/
include ('header.php');
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Currency List </h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
                    <div class="panel-heading">
                    	<div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                            	<h3 class="panel-title">Employee List</h3>
                            </div>
                        
                            <div class="pop" align='right'>
                                <button type="button" name="add" id="add_button" data-toggle="modal" data-target="#employeeModal" class="btn btn-success btn-xs">Add New Employee</button>
                            </div>
                        </div>
                        <div style="clear:both"></div>
                    </div>
                <div class="panel-body">
                    <div class="row">
                      <div class="col-sm-12 table-responsive" ng-controller="EmployeeController">
                        <table border="1" class="table table-bordered table-striped table-hover table-checkable datatable" datatable="ng" ng-init="getEmployees()">
                          <thead>
                          <tr>
                            <th>Employee ID</th>
                            <th>Market Name</th>
                            <th>Employee Name</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Mobile</th>
                            <th>Designation</th>
                            <th>National ID</th>
                            <th>Sex</th>
                            <!--th>Address</th-->
                            <th>Join Date</th>
                            <th>Status</th>                            
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tr ng-repeat="data in employees track by $index">
                             <td>{{$index+1}}</td>
                             <td>{{data.market_name}}</td>
                             <td>{{data.full_name}}</td>
                             <td>{{data.login_name}}</td>
                             <td>{{data.password}}</td>
                             <td>{{data.phone_no}}</td>
                             <td>{{data.designation}}</td>
                             <td>{{data.national_id}}</td>
                             <td>{{data.sex}}</td>
                             <td>{{data.emp_join_date}}</td>
                             <td><button type="button" class="btn btn-success btn-xs">{{cat.emp_status}}</button></td>
                             
                             <td>
                                <div class="btn-group">
                                   <button type="button" class="btn btn-info btn-xs" title="View" ng-click="view($index);"><li class="glyphicon glyphicon-open"></li></button>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group">
                                   <button type="button" class="btn btn-warning btn-xs" title="Edit" ng-click="edit($index);"><li class="glyphicon glyphicon-pencil"></li></button>
                               </div>
                            </td>
                            <td>
                                <div class="btn-group">
                                   <button type="button" class="btn btn-danger btn-xs" title="Delete" ng-click="delete();"><li class="glyphicon glyphicon-trash"></li></button>
                                </div>
                            </td>
                        </tr>
                    </table>
                      </div>
                    </div>
                </div>
            </div>
				</div>
			</div>
					
    
        <!--h1>MYSQL Insert with PHP in AngularJS</h1-->
		<div id="employeeModal" class="modal fade">
          <div class="modal-dialog">
        <form name="customerForm" ng-submit="newEmployee()" ng-controller="EmployeeController" class="well form-horizontal">
		<div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-plus"></i> Add Employee</h4>
            </div>
          <div class="modal-body">
            <div class="form-group">
                <label class="col-md-4 control-label" for="category_name">Select Employer</label>
                <div class="col-md-4 selectContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                    <select id="market_id" name="text" class="form-control selectpicker" ng-model="employee.market_id" required style="width: 15em;height: 2.5em;">
                    <option value="">Select Employer</option>
                      <?php echo fill_market_list($con); ?>
                    </select>
                  </div>
                </div>
           </div>
		      <div class="form-group">
            <label class="col-md-4 control-label">Full Name</label>
            <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"><li class="glyphicon glyphicon-user"></li></span>
           <input type="text" id="full_name" name="full_name" ng-model="employee.full_name" class="form-control" required style="width: 15em;">
		 </div>
    </div>
  </div>
		 <div class="form-group">
           <label class="col-md-4 control-label">Login Name</label>
           <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"><li class="glyphicon glyphicon-user"></li></span>
           <input type="text" id="login_name" name="login_name" ng-model="employee.login_name" class="form-control" required style="width: 15em;">
         </div>
       </div>
     </div>
		   <div class="form-group">
           <label class="col-md-4 control-label">Password</label>
           <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"><li class="glyphicon glyphicon-password"></li></span>
          <input type="password" id="password" name="password" ng-model="employee.password" class="form-control" required style="width: 15em;">
		   </div>
     </div>
   </div>
		   <div class="form-group">
           <label class="col-md-4 control-label">Phone Number</label>
           <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"><li class="glyphicon glyphicon-earphone"></li></span>
           <input type="text" id="phone_no" name="phone_no" ng-model="employee.phone_no" class="form-control" required style="width: 15em;">
		   </div>
     </div>
   </div>
   <div class="form-group">
           <label class="col-md-4 control-label">Designation</label>
           <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"><li class="glyphicon glyphicon-tag"></li></span>
           <input type="text" id="designation" name="designation" ng-model="employee.designation" class="form-control" required style="width: 15em;">
       </div>
     </div>
   </div>
   <div class="form-group">
           <label class="col-md-4 control-label">National ID</label>
           <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"><li class="glyphicon glyphicon-tag"></li></span>
           <input type="text" id="national_id" name="national_id" ng-model="employee.national_id" class="form-control" required style="width: 15em;">
       </div>
     </div>
   </div>
   <div class="form-group">
           <label class="col-md-4 control-label">Social Security Number</label>
           <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"><li class="glyphicon glyphicon-tag"></li></span>
           <input type="text" id="ssn" name="ssn" ng-model="employee.ssn" class="form-control" style="width: 15em;">
       </div>
     </div>
   </div>
   <div class="form-group" ng-class="{'has-error': employeeForm.sex.$dirty && employeeForm.sex.$error.required}">
      <label class="col-md-4 control-label">Sex</label>
        <div class="col-md-4">
          <div class="radio">
      <label>
        <input id="male" type="radio" name="male" value="male" ng-model="employee.sex"/> Male
      </label>
      </div>
      <div class="radio">
      <label>
        <input id="female" type="radio" name="female" value="female" ng-model="employee.sex"/> Female
        </label>
        <span ng-show="employeeForm.sex.$dirty && employeeForm.sex.$error.required" class="help-block"></span>
    </div>
    </div>
  </div>
	<div class="form-group">
            <label class="col-md-4 control-label" for="employee_status">Select Employee Status</label>
            <div class="col-md-4 selectContainer">
               <div class="input-group">
               <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                <select name="text" id="emp_status" class="form-control selectpicker" ng-model="employee.emp_status" required style="width: 15em;height: 2.5em;">
                    <option value="">Select Status</option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
               </div>
               </div>
           </div>
		   <div class="form-group">
            <label class="col-md-4 control-label">Join Date</label>
			<div class="col-md-4 inputGroupContainer">
              <div class="input-group">
            <input type="date" name="emp_join_date" id="emp_join_dat" class="form-control" ng-model="employee.emp_join_date" required style="width: 15em;"/>
			</div>
			</div>
			</div>
      <div class="form-group">
           <label class="col-md-4 control-label">Notes</label>
           <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"><li class="glyphicon glyphicon-edit"></li></span>
              <textarea input type="text" id="notes" name="notes" ng-model="employee.notes" class="form-control" required style="width: 15em;"></textarea>
       </div>
     </div>
   </div>
		</div>
		   
		    <div class="modal-footer">
                <input type="hidden" name="emp_id" id="emp_id" />
                <input type="hidden" name="btn_action" id="btn_action" />
                <input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
		   </div>
		   </form>
		</div>
	</div>
    
<script type="text/javascript">
   $(function(){
	$('#emp_join_date').datepicker({"dateFormat":"dd/mm/yy","controlType":"slider","addSliderAccess":true,"sliderAccessArgs":{"touchonly":true},"stepHour":1,"stepMinute":1,"stepSecond":1})
	.datepicker('option', 'minDate', "").datepicker('option', 'maxDate', "").datepicker('refresh');
});
</script>
<!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-sm-none d-md-block" style="color:red;font-size: 1em;">
      Exposing farmers to markets|Educating the world
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="https://www.olify.com">Olify Inc</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS ->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- SparkLine -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jVectorMap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.2 -->
<script src="plugins/chartjs-old/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>
</body>
</html>
