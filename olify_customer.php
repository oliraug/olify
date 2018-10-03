
<?php
include ('header.php');
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Customer List</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
            <div class="panel-heading">
                  <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                    <div class="row">
                      <h3 class="panel-title"></h3>
                    </div>
                  </div>
                        
                  <div class="pop" align='right'>
                      <button type="button" name="add" id="add_button" data-toggle="modal" data-target="#customerModal" class="btn btn-success btn-xs">Add New Customer</button>
                      </div>
                  <div style="clear:both"></div>
                </div>
                <div class="panel-body">
                    <div class="row">
                      <div class="col-sm-12 table-responsive" ng-controller="CustomerController">
                        <table border="1" class="table table-bordered table-striped table-hover table-checkable datatable" datatable="ng" ng-init="getCustomers()">
                        <thead>
                          <tr>
                            <th>Customer ID</th>
                            <th>Customer Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Join Date</th>
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>
                         </tr>
                      </thead>
                      <tr ng-repeat="cust in customers track by $index">
                             <td>{{$index+1}}</td>
                             <td>{{cust.cust_name}}</td>
                             <td>{{cust.cust_mobile}}</td>
                             <td>{{cust.cust_email}}</td>
                             <td>{{cust.cust_address}}</td>
                             <td><button type="button" class="btn btn-success btn-xs">{{cust.cust_status}}</button></td>
                             <td>{{cust.cust_join_date}}</td>
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
					
		<div id="customerModal" class="modal fade pop-details" role="dialog">
      <div class="modal-dialog">
        <form name="customerForm" ng-submit="newCustomer()" ng-controller="CustomerController" class="well form-horizontal">
		    <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-plus"></i> Add Customer</h4>
            </div>
          <div class="modal-body">
		      <div class="form-group">
            <label class="col-md-4 control-label">Customer Name</label>
            <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"><li class="glyphicon glyphicon-user"></li></span>
           <input type="text" id="cust_name" name="cust_name" ng-model="customer.cust_name" class="form-control" required style="width: 15em;">
		 </div>
    </div>
  </div>
		 <div class="form-group">
           <label class="col-md-4 control-label">Customer Mobile</label>
           <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"><li class="glyphicon glyphicon-earphone"></li></span>
           <input type="text" id="cust_mobile" name="cust_mobile" ng-model="customer.cust_mobile" class="form-control" required style="width: 15em;">
         </div>
       </div>
     </div>
		   <div class="form-group">
           <label class="col-md-4 control-label">Customer Email</label>
           <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"><li class="glyphicon glyphicon-envelope"></li></span>
          <input type="email" id="cust_email" name="cust_email" ng-model="customer.cust_email" class="form-control" required="required" style="width: 15em;">
		   </div>
     </div>
   </div>
		   <div class="form-group">
           <label class="col-md-4 control-label">Customer Address</label>
           <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"><li class="glyphicon glyphicon-home"></li></span>
           <input type="text" id="cust_address" name="cust_address" ng-model="customer.cust_address" class="form-control" required="required" style="width: 15em;">
		   </div>
     </div>
   </div>
		   
			<div class="form-group">
            <label class="col-md-4 control-label">Select Customer Status</label>
            <div class="col-md-4 selectContainer">
               <div class="input-group">
               <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                <select name="text" id="cust_status" class="form-control selectpicker" ng-model="customer.cust_status" required="required" style="width: 15em;height: 2.5em;">
                    <option value="">Select Status</option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
               </div>
               </div>
           </div>
		   <div class="form-group">
            <label class="col-md-4 control-label">Join Date</label>
            <input type="date" name="cust_join_date" id="cus_join_date" class="form-control" placeholder="dd-mm-yyyy" ng-model="customer.cust_join_date" style="width: 12em;" required="required" style="width: 15em;"/>
			</div>
		   
		    <div class="modal-footer">
                <input type="hidden" name="cust_id" id="cust_id" />
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
	$('#cust_join_date').datepicker({"dateFormat":"dd/mm/yy","controlType":"slider","addSliderAccess":true,"sliderAccessArgs":{"touchonly":true},"stepHour":1,"stepMinute":1,"stepSecond":1})
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
