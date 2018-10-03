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
            <h1 class="m-0 text-dark">Inventory Order Product List</h1>
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
                            <button type="button" name="add" id="add_button" data-toggle="modal" data-target="#inventoryOrderProductModal" class="btn btn-success btn-xs">Place New Inventory Order</button>
                        </div>
                    </div>
                </div>
                <div class="panel-body" ng-controller="InventoryOrderProductController">
                	<table border="1" class="table table-bordered table-striped table-hover table-checkable datatable" datatable="ng" ng-init="getInventoryOrderProduct()">
                		<thead>
                            <tr>
                                <th>Inventory Order Product ID</th>
                                <th>Inventory Order Name</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Order Date</th>
                                <th>View</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                         <tr ng-repeat="data in inventories track by $index">
                            <td>{{$index+1}}</td>
                            <td>{{data.inventory_order_id}}</td>
                            <td>{{data.product_name}}</td>
                            <td>{{data.quantity}}</td>
                            <td>{{data.price}}</td>
                            <td>{{data.ord_date}}</td>
                            <td>
                            <div class="pop">
                              <a href="view_order.php?pdf=1&inventory_order_product_id" class="btn btn-info btn-xs" ng-click="view($index);">View PDF</a>
                              <!--button type="button" class="btn btn-info btn-xs" title="View" ng-click="view($index);"><li class="glyphicon glyphicon-open"></li></button-->
                            </div>
                            </td>
                            <td>
                            <div class="pop">
                              <button type="button" class="btn btn-warning btn-xs" title="Edit" ng-click="editingMarket($index);"><li class="glyphicon glyphicon-pencil"></li></button>
                            <!--Buttons for editing -->
                            <button class="green" ng-click="saveEdit($index)">save</button>
                            <button class="red" ng-click="cancelEdit()">X</button>
                            </div>
                            </td>
                            <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-danger btn-xs" title="Delete" ng-click="deleteInventoryOrderProduct($index);"><li class="glyphicon glyphicon-trash"></li></button>
                            </div>
                            </td>
                        </tr>
                	</table>
                </div>
            </div>
        </div>
    </div>

    <div id="inventoryOrderProductModal" class="modal fade">

    	<div class="modal-dialog">
    		<form ng-submit="newInventoryOrderProduct()" id="order_form" class="well form-horizontal" ng-controller="InventoryOrderProductController">
    			<div class="modal-content">
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Create an Inventory Order Product</h4>
    				</div>
    				<div class="modal-body">
                        <div class="form-group">
                                <label class="col-md-4 control-label" for="category">Select Order Name</label>
                                <div class="col-md-4 selectContainer">
                                   <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                    <select id="inventory_order_id" name="text" class="form-control selectpicker" ng-model="inventory.inventory_order_id" required  style="width: 15em;height: 2.5em;">
                                    <option value="">Select Order</option>
                                    <?php echo fill_inventory_order_list($con); ?>
                                    </select>
                                </div>
                            </div>
                            </div>
                        <div class="form-group">
                                <label class="col-md-4 control-label" for="category">Select Product Name</label>
                                <div class="col-md-4 selectContainer">
                                   <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                    <select id="product_code" name="text" class="form-control selectpicker" ng-model="inventory.product_code" required style="width: 15em;height: 2.5em;">
                                    <option value="">Select Product</option>
                                    <?php echo fill_product_list($con); ?>
                                    </select>
                                </div>
                            </div>
                            </div>
    						<div class="form-group">
									<label class="col-md-4 control-label">Enter Quantity</label>
									<div class="col-md-4 inputGroupContainer">
									<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input type="number" name="quantity" id="item_quantity" class="form-control" ng-model="inventory.quantity" required  style="width: 15em;"/>
								</div>
							</div>
							</div>
                            <div class="form-group">
                            <label class="col-md-4 control-label">Enter Price</label>
                            <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input type="number" name="order_price" id="order_price" class="form-control" ng-model="inventory.price" required  style="width: 15em;">
                          </div>
                         </div>
                        </div>
							<div class="form-group">
									<label class="col-md-4 control-label">Order Date</label>
									<div class="col-md-4 inputGroupContainer">
									<div class="input-group">
									<input type="date" name="inventory_order_date" id="inventory_order_date" class="form-control" ng-model="inventory.ord_date" required  style="width: 15em;"/>
								</div>
								</div>
								</div>
                            </div>

    				<div class="modal-footer">
    					<input type="hidden" name="inventory_order_product_id" id="inventory_order_product_id" />
    					<input type="hidden" name="btn_action" id="btn_action" />
    					<input type="submit" name="action" id="action" class="btn btn-info" value="Add"/>
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