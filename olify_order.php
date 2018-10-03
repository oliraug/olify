<?php
//order.php

include('config.php');
include('function.php');

/*if(!isset($_SESSION['type']))
{
	header('location:login.php');
}*/

include('header.php');


?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Order List</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
	<span id="alert_action"></span>
	<div class="row">
		<div class="col-lg-12">
			
			<div class="panel panel-default">
                <div class="panel-heading">
                	<div class="row">
                    	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                            <h3 class="panel-title"></h3>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" align="right">
                            <button type="button" name="add" id="add_button" data-toggle="modal" data-target="#orderModal" class="btn btn-success btn-xs">Place New Order</button>
                        </div>
                    </div>
                </div>
                <div class="panel-body" ng-controller="InventoryOrderController">
                	<table border="1" class="table table-bordered table-striped table-hover table-checkable datatable" datatable="ng" ng-init="getOrder()">
                		<thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Market Name</th>
                                <th>Customer Name</th>
                                <th>Category Name</th>
                                <th>Product Name</th>
                                <th>Total Amount</th>
                                <th>Order Date</th>
                                <th>Required Date</th>
                                <th>Customer Address</th>
                                <th>Product Details</th>
                                <th>Payment Status</th>
                                <th>Order Status</th>
                                <!--?php
                                if($_SESSION['type'] == 'master')
                                {
                                    echo '<th>Created By</th>';
                                }
                                ?-->
                                <th>View</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                         <tr ng-repeat="order in orders track by $index">
                            <td>{{$index+1}}</td>
                            <td>{{order.market_name}}</td>
                            <td>{{order.cust_name}}</td>
                            <td>{{order.category_name}}</td>
                            <td>{{order.product_name}}</td>
                            <td>{{order.inventory_order_total}}</td>
                            <td>{{order.inventory_order_date}}</td>
                            <td>{{order.inventory_required_date}}</td-->
                            <td>{{order.inventory_order_address}}</td>
                            <td>{{order.product_details}}</td>
                            <td>{{order.payment_status}}</td>
                            <td><button type="button" class="btn btn-success btn-xs">{{order.inventory_order_status}}</button></td>
                             <td>
                            <div class="pop">
                              <a href="view_order.php?pdf=1&inventory_order_id" class="btn btn-info btn-xs" ng-click="view($index);">View PDF</a>
                              <!--button type="button" class="btn btn-info btn-xs" title="View" ng-click="view($index);"><li class="glyphicon glyphicon-open"></li></button-->
                            </div>
                            </td>
                            <td>
                            <div class="pop">
                              <button type="button" class="btn btn-warning btn-xs" title="Edit" ng-click="editingMarket($index);"><li class="glyphicon glyphicon-pencil"></li></button>
                            <!--Buttons for editing -->
                            <button class="green" ng-switch-when="true" ng-click="saveEdit($index)">save</button>
                            <button class="red" ng-switch-when="true" ng-click="cancelEdit()">X</button>
                            </div>
                            </td>
                            <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-danger btn-xs" title="Delete" ng-click="deleteOrder($index);"><li class="glyphicon glyphicon-trash"></li></button>
                            </div>
                            </td>
                        </tr>
                	</table>
                </div>
            </div>
        </div>
    </div>

    <div id="orderModal" class="modal fade">

    	<div class="modal-dialog">
    		<form ng-submit="newOrder()" id="order_form" class="well form-horizontal" ng-controller="InventoryOrderController">
    			<div class="modal-content">
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Create an Order</h4>
    				</div>
    				<div class="modal-body">
                        <div class="form-group">
                                <label class="col-md-4 control-label" for="category">Select Market Name</label>
                                <div class="col-md-4 selectContainer">
                                   <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                    <select id="market_id" name="text" class="form-control selectpicker" ng-model="order.market_id" required style="width: 15em;height: 2.5em;">
                                    <option value="">Select Market</option>
                                    <?php echo fill_market_list($con); ?>
                                    </select>
                                </div>
                            </div>
                            </div>
    					<div class="form-group">
                                <label class="col-md-4 control-label" for="category">Select Customer Name</label>
                                <div class="col-md-4 selectContainer">
                                   <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                    <select id="cust_id" name="text" class="form-control selectpicker" ng-model="order.cust_id" required  style="width: 15em;height: 2.5em;">
                                    <option value="">Select Customer</option>
                                    <?php echo fill_customer_list($con); ?>
                                    </select>
                                </div>
                            </div>
                            </div>
    						<div class="form-group">
                                <label class="col-md-4 control-label" for="category">Select Category</label>
                                <div class="col-md-4 selectContainer">
                                   <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                    <select id="category_id" name="text" class="form-control selectpicker" ng-model="order.category_id" required  style="width: 15em;height: 2.5em;">
                                    <option value="">Select Category</option>
                                    <?php echo fill_category_list($con); ?>
                                    </select>
                                </div>
                            </div>
                            </div>
    						<div class="form-group">
                                <label class="col-md-4 control-label" for="product">Select Product</label>
                                <div class="col-md-4 selectContainer">
                                   <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                    <select id="product_code" name="text" class="form-control selectpicker" ng-model="order.product_code" required  style="width: 15em;height: 2.5em;">
                                    <option value="">Select Product</option>
                                    <?php echo fill_product_list($con); ?>
                                    </select>
                                </div>
                            </div>
                            </div>
							<div class="form-group">
									<label class="col-md-4 control-label">Enter Order Total</label>
									<div class="col-md-4 inputGroupContainer">
									<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input type="number" name="inventory_order_total" id="inventory_order_total" class="form-control" ng-model="order.inventory_order_total" required  style="width: 15em;"/>
								</div>
							</div>
							</div>
								<div class="form-group">
									<label class="col-md-4 control-label">Order Date</label>
									<div class="col-md-4 inputGroupContainer">
									<div class="input-group">
									<input type="date" name="inventory_order_date" id="inventory_orde_date" class="form-control" ng-model="order.inventory_order_date" required  style="width: 15em;"/>
								</div>
								</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label">Required Date</label>
									<div class="col-md-4 inputGroupContainer">
									<div class="input-group">
									<input type="date" name="inventory_required_date" id="inventory_require_date" class="form-control" ng-model="order.inventory_required_date"required  style="width: 15em;"/>
								</div>
								</div>
								</div>
							<div class="form-group">
							<label class="col-md-4 control-label">Enter Receiver Address</label>
							<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
							<textarea name="text" id="inventory_order_address" class="form-control" ng-model="order.inventory_order_address" required  style="width: 15em;"></textarea>
						</div>
					</div>
				</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Enter Product Details</label>
							<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
							<textarea id="product_details" name="text" class="form-control" ng-model="order.product_details" required  style="width: 15em;"></textarea>
						</div>
						</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Select Payment Status</label>
							<div class="col-md-4 selectContainer">
							<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
							<select name="text" id="payment_status" class="form-control selectpicker" ng-model="order.payment_status" required  style="width: 15em;height: 2.5em;">
								<option value="cash">Cash</option>
								<option value="credit">Credit</option>
								<option value="Mobile Money">Mobile Money</option>
							</select>
						</div>
    				</div>
    			</div>
    					<div class="form-group">
							<label class="col-md-4 control-label">Select Order Status</label>
							<div class="col-md-4 selectContainer">
							<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
							<select name="text" id="inventory_order_status" class="form-control selectpicker" ng-model="order.inventory_order_status" required  style="width: 15em;height: 2.5em;">
								<option value="Active">Active</option>
								<option value="Inactive">Inactive</option>
								<option value="Shipped">Shipped</option>
								<option value="Pending">Pending</option>
								<option value="Processing">Processing</option>
								<option value="Delivered">Delivered</option>
							</select>
						</div>
    				</div>
    			</div>
    		</div>

    				<div class="modal-footer">
    					<input type="hidden" name="inventory_order_id" id="inventory_order_id" />
    					<input type="hidden" name="btn_action" id="btn_action" />
    					<input type="submit" name="action" id="action" class="btn btn-info" value="Add"/>
    					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
    		</form>
    	</div>
</div>
   <script type="text/javascript">
   $(function(){
    $('#inventory_order_date').datepicker({"dateFormat":"dd/mm/yy","controlType":"slider","addSliderAccess":true,"sliderAccessArgs":{"touchonly":true},"stepHour":1,"stepMinute":1,"stepSecond":1})
    .datepicker('option', 'minDate', "").datepicker('option', 'maxDate', "").datepicker('refresh');
});
</script>
<script type="text/javascript">
   $(function(){
    $('#inventory_required_date').datepicker({"dateFormat":"dd/mm/yy","controlType":"slider","addSliderAccess":true,"sliderAccessArgs":{"touchonly":true},"stepHour":1,"stepMinute":1,"stepSecond":1})
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

