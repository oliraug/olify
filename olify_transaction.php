<?php
//transaction.php

include('database_connection.php');
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
            <h1 class="m-0 text-dark">Invoice List </h1>
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
                                <button type="button" name="add" id="add_button" data-toggle="modal" data-target="#invoiceModal" class="btn btn-success btn-xs" >Add Invoice</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body" ng-controller="InvoiceController">
                        <div class="row"><div class="col-sm-12 table-responsive">
                            <table id="invoice_data" class="table table-bordered table-striped" ng-init="getInvoices()">
                                <thead><tr>
                                    <th>Invoice No</th>
                                    <th>Invoice Date</th>
                                    <th>Category Name</th>
                                    <th>Product Name</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Unit Cost</th>
                                    <th>Sub Total</th>
                                    <th>VAT (18%)</th>
                                    <th>Total</th>
                                    <th>View</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr></thead>
                                <tr ng-repeat="data in invoices track by $index">
                                    <td>{{$index+1}}</td>
                                    <td>{{data.invoice_date}}</td>
                                    <td>{{data.category_id}}</td>
                                    <td>{{data.product_code}}</td>                                    
                                    <td>{{data.description}}</td>
                                    <td>{{data.quantity}}</td>
                                    <td>{{data.unit_cost}}</td>
                                    <td>{{data.sub_total}}</td>
                                    <td>{{data.vat}}</td>
                                    <td>{{data.total}}</td>
                                    <!--td>{{data.payment_status}}</td>
                                    <td>{{data.comment}}</td-->
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

        <div id="invoiceModal" class="modal fade">
            <div class="modal-dialog">
                <form ng-submit="newInvoice()" id="invoice_form" class="well form-horizontal" ng-controller="InvoiceController">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Create Invoice</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Invoice Date</label>
                                 <input type="text" name="invoice_date" id="invoice_date" class="form-control" ng-model="invoice.invoice_date"  style="width: 23em;margin-left: 14.2em;" />
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="market">Select Product Category</label>
                                <div class="col-md-4 selectContainer">
                                   <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                    <select id="category_id" name="text" class="form-control selectpicker" ng-model="invoice.category_id" required style="width: 20em;">
                                    <option value="">Select Category</option>
                                    <?php echo fill_category_list($con); ?>
                                    </select>
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="market">Select Product Name</label>
                                <div class="col-md-4 selectContainer">
                                   <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                    <select id="product_code" name="text" class="form-control selectpicker" ng-model="invoice.product_code" required style="width: 20em;">
                                    <option value="">Select Product</option>
                                    <?php echo fill_product_list($con); ?>
                                    </select>
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Description</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
                                <textarea name="description" id="description" ng-model="invoice.description" class="form-control" placeholder="product description" style="width: 20em;"></textarea>
                            </div>
                        </div>
                        </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Quantity</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                   <span class="input-group-addon"><i class="glyphicon glyphicon-gift"></i></span>
                                    <input type="number" name="quantity" id="quantity" class="form-control" ng-model="invoice.quantity" required pattern="[+-]?([0-9]*[.])?[0-9]+"  style="width: 20em;"/>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                                <label class="col-md-4 control-label">Unit Cost</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-bookmark"></i></span>
                                <input type="number" name="unit_cost" id="unit_cost" class="form-control" ng-model="invoice.unit_cost" pattern="[+-]?([0-9]*[.])?[0-9]+"  style="width: 20em;"/>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                                <label class="col-md-4 control-label">Sub Total</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-bookmark"></i></span>
                                <input type="number" name="sub_total" id="sub_total" class="form-control" ng-model="invoice.sub_total" pattern="[+-]?([0-9]*[.])?[0-9]+"  style="width: 20em;"/>
                            </div>
                        </div>
                      </div>
                        <div class="form-group">
                                <label class="col-md-4 control-label">VAT (18%)</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-bookmark"></i></span>
                                <input type="number" name="vat" id="vat" class="form-control" ng-model="invoice.vat" pattern="[+-]?([0-9]*[.])?[0-9]+"  style="width: 20em;"/>
                            </div>
                        </div>
                        </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Total</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-bookmark"></i></span>
                                <input type="number" name="total" id="total" class="form-control" ng-model="invoice.total" pattern="[+-]?([0-9]*[.])?[0-9]+"  style="width: 20em;"/>
                            </div>
                        </div>
                        </div>
                            <!--div class="form-group">
                                <label class="col-md-4 control-label">Transaction Date</label>
                                 <input type="text" name="transaction_date" id="transaction_date" class="form-control" ng-model="transaction.transaction_date"  style="width: 23em;margin-left: 14.2em;" />
                            </div>
                        <div class="form-group">
                                <label class="col-md-4 control-label">Transaction Amount</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-bookmark"></i></span>
                                <input type="number" name="transaction_amount" id="transaction_amount" class="form-control" ng-model="transaction.transaction_amount" pattern="[+-]?([0-9]*[.])?[0-9]+"  style="width: 20em;"/>
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="market">Select Product Name</label>
                                <div class="col-md-4 selectContainer">
                                   <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                    <select id="product_code" name="text" class="form-control selectpicker" ng-model="transaction.product_code"  style="width: 20em;">
                                    <option value="">Select Product Name</option>
                                    <?php echo fill_product_list($con); ?>
                                    </select>
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Invoice Number</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                                <input type="number" name="invoice" id="invoice" class="form-control" ng-model="transaction.invoice_no"  style="width: 20em;"/>
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Payment Status</label>
                                <div class="col-md-4 selectContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                        <select name="text" id="payment_status" class="form-control selectpicker" ng-model="transaction.payment_status"   style="width: 20em;">
                                            <option value="">Select</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Credit">Credit</option>
                                            <option value="Mobile Money">Mobile Money</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Comment</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
                                <textarea name="comment" id="comment" ng-model="transaction.comment" class="form-control" placeholder="comment" style="width: 20em;"></textarea>
                            </div>
                        </div>
                    </div-->
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="invoice_no" id="invoice_no" />
                            <input type="hidden" name="btn_action" id="btn_action" />
                            <input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="transactiondetailsModal" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="transaction_form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Transaction Details</h4>
                        </div>
                        <div class="modal-body">
                            <Div id="transaction_details"></Div>
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
    $('#invoice_date').datepicker({"dateFormat":"dd/mm/yy","controlType":"slider","addSliderAccess":true,"sliderAccessArgs":{"touchonly":true},"stepHour":1,"stepMinute":1,"stepSecond":1})
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