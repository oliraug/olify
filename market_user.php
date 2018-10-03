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

include('header.php');

?>
<style type="text/css">
.col-sm-12 {
  display: block;
  max-height: 350px;
  overflow-y: auto;
  -ms-overflow-style: -ms-autohiding-scrollbar;
}
.content-wrapper{
    margin-top: -65%;
}
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Market User List </h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <span id='alert_action'></span>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
                    <div class="panel-heading">
                    	<div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                            	<h3 class="panel-title"></h3>
                            </div>
                        
                            <!--div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" align='right'>
                                <button type="button" name="add" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-success btn-xs">Add Market User</button>
                            </div-->
                        </div>
                    </div>
                    <div class="panel-body" >
                        <div class="row"><div class="col-sm-12 table-responsive" ng-controller="UserController">
                            <table border="1" class="table table-bordered table-striped table-hover table-checkable datatable" datatable="ng" ng-init="getMarketUsers()">
                                <thead><tr>
                                    <th>User ID</th>
                                    <th>Full Name</th>
                                    <th>Login Name</th>
                                    <!--th>Password</th-->
                                    <th>Phone Number</th>
                                    <th>Sex</th>
                                    <th>Speciality</th>
                                    <th>Join Date</th>
                                    <th>Enabled</th>
                                    <th>User Type</th>
                                    <th>View</th>
                                    <th>Edit</th>
                                    <th>Delete</th>                                    
                                </tr></thead>
                                <tr ng-repeat="data in users track by $index">
                                    <td>{{$index+1}}</td>
                                    <td>{{data.full_name}}</td>
                                    <td>{{data.login_name}}</td>
                                    <!--td>{{data.password}}</td-->
                                    <td>{{data.phone_no}}</td>
                                    <td>{{data.sex}}</td>
                                    <td>{{data.speciality}}</td>
                                    <td>{{data.created_date}}</td>
                                    <td><button type="button" class="btn btn-success btn-xs">{{data.enabled}}</button></td>
                                    <td>{{data.user_type}}</td>
                                    <td>
                                        <div class="btn-group">
                                         <button type="button" class="btn btn-info btn-xs" title="View" ng-click="view($index);"><li class="glyphicon glyphicon-open"></li></button>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                        <button type="button" class="btn btn-warning btn-xs" title="Edit" name="add" id="add_button" data-toggle="modal" data-target="#userModal" ng-click="edit($index);"><li class="glyphicon glyphicon-pencil"></li></button>
                                    </div>
                                    </td>
                                    <td>
                                         <div class="btn-group">
                                         <button type="button" class="btn btn-danger btn-xs" title="Delete" ng-click="delete();"><li class="glyphicon glyphicon-trash"></li></button>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div></div>
                    </div>
                </div>
			</div>
		</div>

        <div id="userModal" class="modal fade">
            <div class="modal-dialog">
                <form ng-submit="updateMarketUser()" id="user_form" name="userForm" class="well form-horizontal" ng-controller="UserController">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Add User</h4>
                        </div>
                        <div class="modal-body">
							<div class="form-group">
							<label class="col-md-4 control-label">Full Name</label>  
							<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input id="full_name" name="full_name" placeholder="Full Name" class="form-control"  type="text" ng-model="user.full_name"  style="width: 15em;">
						</div>
					</div>
				</div>
							<div class="form-group">
							<label class="col-md-4 control-label" >Login Name</label> 
							<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input id="login_name" name="login_name" placeholder="Username" class="form-control"  type="text" ng-model="user.login_name" style="width: 15em;">
						</div>
					</div>
				</div>
						<div class="form-group">
						<label class="col-md-4 control-label">Password</label>  
						<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-option-horizontal"></i></span>
						<input id="password" name="password" placeholder="password" class="form-control"  type="password" ng-model="user.password" style="width: 15em;">
					</div>
				</div>
			</div>
					<div class="form-group">
					<label class="col-md-4 control-label">Phone Number</label>  
					<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
					<input id="phone_no" name="phone_no" placeholder="(+256)704-121212" class="form-control" type="text" ng-model="user.phone_no" style="width: 15em;">
					</div>
				</div>
			</div>
					<div class="form-group" ng-class="{'has-error': registerForm.sex.$dirty && registerForm.sex.$error.required}">
					<label class="col-md-4 control-label">Sex</label>
					<div class="col-md-4">
					<div class="radio">
					<label>
					<input id="male" type="radio" name="male" value="male" ng-model="user.sex"/> Male
					</label>
					</div>
					<div class="radio">
					<label>
					<input id="female" type="radio" name="female" value="female" ng-model="user.sex"/> Female
					</label>
					<span ng-show="registerForm.sex.$dirty && registerForm.sex.$error.required" class="help-block"></span>
				</div>
			</div>
		</div>
					<div class="modal-footer">
						<input type="hidden" name="user_id" id="user_id" />
						<input type="hidden" name="btn_action" id="btn_action" />
						<input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</form>
		</div>
      </div>
     <div id="userdetailsModal" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="user_form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Market User Details</h4>
                        </div>
                        <div class="modal-body">
                            <Div id="user_details"></Div>
                        </div>
                        <div class="modal-footer">                            
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

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

