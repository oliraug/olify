<?php
//transaction.php

include('config.php');
//include('database_connection.php');
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
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Sales Transaction List</h1>
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
                        
                            <div class="pop" align='right'>
                                <button type="button" name="add" id="add_button" data-toggle="modal" data-target="#salesModal" class="btn btn-success btn-xs" >Add Sale Transaction</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row"><div class="col-sm-12 table-responsive" ng-controller="SalesController">
                            <table id="sales_data" class="table table-bordered table-striped table-hover table-checkable datatable" datatable="ng" ui-options='dataTableOpts' ng-init="getSales()">
                                <thead><tr>
                                    <th>Sales ID</th>
                                    <th>Market Name</th>
                                    <th>Category Name</th>
                                    <th>Product Name</th>
                                    <th>Currency Name</th>
                                    <th>Quantity Sold</th>
                                    <!--th>Remaining Stock</th-->
                                    <th>Amount</th>
                                    <th>Action Type</th>
                                    <th>Payment Mode</th>
                                    <th>Total Sale</th>
                                    <th>Sale Date</th>
                                    <th>View</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr></thead>
                                <tr ng-repeat="data in sales track by $index">
                                    <td>{{$index+1}}</td>
                                    <td>{{data.market_name}}</td>
                                    <td>{{data.category_name}}</td>
                                    <td>{{data.product_name}}</td>
                                    <td>{{data.currency_name}}</td>
                                    <td>{{data.quantity_sold}}</td>
                                    <!--td>{{data.remaining_stock}}</td-->
                                    <td>{{data.amount}}</td>
                                    <td>{{data.action_type}}</td>
                                    <td>{{data.payment_mode}}</td>
                                    <td>{{data.total_sale}}</td>
                                    <td>{{data.sales_date}}</td-->
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
                        </div></div>
                    </div>
                </div>
			</div>
		</div>

        <div id="salesModal" class="modal fade">
            <div class="modal-dialog">
                <form ng-submit="newSales()" id="sales_form" name="salesForm" class="well form-horizontal" ng-controller="SalesController">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Add Sale</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="market">Select Market</label>
                                <div class="col-md-4 selectContainer">
                                   <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                    <select id="market_id" name="text" class="form-control selectpicker" ng-model="sale.market_id" required style="width: 15em;height: 2.5em;">
                                    <option value="">Select Market</option>
                                    <?php echo fill_market_list($con); ?>
                                    </select>
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="category">Select Category</label>
                                <div class="col-md-4 selectContainer">
                                   <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                    <select id="category_id" name="text" class="form-control selectpicker" ng-model="sale.category_id" required style="width: 15em;height: 2.5em;">
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
                                    <select id="product_code" name="text" class="form-control selectpicker" ng-model="sale.product_code" required style="width: 15em;height: 2.5em;">
                                    <option value="">Select Product</option>
                                    <?php echo fill_product_list($con); ?>
                                    </select>
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="product">Select Currency</label>
                                <div class="col-md-4 selectContainer">
                                   <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                    <select id="currency_id" name="text" class="form-control selectpicker" ng-model="sale.currency_id" required style="width: 15em;height: 2.5em;">
                                    <option value="">Select Currency</option>
                                    <?php echo fill_currency_list($con); ?>
                                    </select>
                                </div>
                            </div>
                            </div>
							<div class="form-group">
                                <label class="col-md-4 control-label" for="quantitySold">Quantity Sold</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-shopping-cart"></i></span>
                                <input type="number" name="quantity_sold" id="sold" class="form-control" ng-model="sale.quantity_sold" ng-change="changed()" pattern="[+-]?([0-9]*[.])?[0-9]+" style="width: 15em;height: 2.5em;"/>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                                <label class="col-md-4 control-label" for="amount">Amount</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-shopping-cart"></i></span>
                                <input type="number" name="amount" id="sold" class="form-control" ng-model="sale.amount" ng-change="changed()" pattern="[+-]?([0-9]*[.])?[0-9]+" style="width: 15em;height: 2.5em;"/>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                                <label class="col-md-4 control-label">Action Type</label>
                                <div class="col-md-4 selectContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                        <select name="text" id="action_type"  class="form-control selectpicker" ng-model="sale.action_type" required="required" style="width: 15em;height: 2.5em;">
                                            <option value="">Select Action</option>
                                            <option value="Buy">Buy</option>
                                            <option value="Sell">Sell</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="payment">Payment Mode</label>
                                <div class="col-md-4 selectContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                        <select name="text" id="payment" class="form-control selectpicker" ng-model="sale.payment_mode" required="required" style="width: 15em;height: 2.5em;">
                                            <option value="">Select Payment</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Credit">Credit</option>
                                            <option value="Mobile Money">Mobile Money</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                           <div class="form-group">
                                <label class="col-md-4 control-label" for="totalSale">Total Sale</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-shopping-cart"></i></span>
                                <input type="number" name="total" id="total" class="form-control" ng-model="sale.total_sale" ng-change="changed()" pattern="[+-]?([0-9]*[.])?[0-9]+" style="width: 15em;height: 2.5em;"/>
                            </div>
							</div>
						</div>                           
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="sales_id" id="sales_id" />
                            <input type="hidden" name="btn_action" id="btn_action" />
                            <input type="submit" name="save_sale" id="action" class="btn btn-info" value="Add" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="salesModal" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="sales_form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Sales Details</h4>
                        </div>
                        <div class="modal-body">
                            <Div id="sales_details"></Div>
                        </div>
                        <div class="modal-footer">
                            
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

<script type="text/javascript">
   $(function(){
    $('#sale_date').datepicker({"dateFormat":"dd/mm/yy","controlType":"slider","addSliderAccess":true,"sliderAccessArgs":{"touchonly":true},"stepHour":1,"stepMinute":1,"stepSecond":1})
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