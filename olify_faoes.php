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
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Financial and Other Expenses List</h1>
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
                                <button type="button" name="add" id="add_button" data-toggle="modal" data-target="#faoesModal" class="btn btn-success btn-xs">Add Profit & Loss</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row"><div class="col-sm-12 table-responsive" ng-controller="FaoesController">
                        <table border="1" class="table table-bordered table-striped table-hover table-checkable datatable" ng-init="getFaoes()">
                         <tr class="grid-top-panel">
                            <th>ID</th>
							<th>Market</th>
                             <th>Depreciation</th>
                             <th>Repairs</th>
                             <th>Audit Fee</th>
                             <th>Interest Paid</th>
                             <th>Commission Paid</th>
                             <th>Bank Charges</th>
                             <th>Legal Charges</th>
                             <th>Net profit - transferred to capital A/C</th>
                             <th>From</th>
                             <th>To</th>
                             <th>View</th>
                             <th>Update</th>
                             <th>Delete</th>
                        </tr>
                
                        <tr ng-repeat="data in faoess track by $index">
                             <td>{{$index+1}}</td>
							 <td>{{data.market_name}}</td>
                             <td>{{data.depreciation}}</td>
                             <td>{{data.repairs}}</td>
                             <td>{{data.audit_fee}}</td>
                             <td>{{data.interest_paid}}</td>
                             <td>{{data.commission_paid}}</td>
                             <td>{{data.bank_charges}}</td>
                             <td>{{data.legal_charges}}</td>
                             <td>{{data.net_profit}}</td>
                             <td>{{data.from_date}}</td>
                             <td>{{data.to_date}}</td>
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

        <div id="faoesModal" class="modal fade">
            <div class="modal-dialog">
                <form name="faoes" ng-submit="newFaoes()" id="faoes" ng-controller="FaoesController" class="well form-horizontal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Add Financial and Other Expenses</h4>
                        </div>   
                        
                        <div class="modal-body" style="background: #66d;">
                            <h4 style="color: #00ffcc;">Financial and Other Expenses</h4>
							<div class="form-group">
								<label for="Status" class="col-md-4 control-label">Select Market</label>
								<div class="col-md-4 selectContainer">
								<div class="input-group">
								<span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
								<select name="text" id="market_id" class="form-control selectpicker" ng-model="faoes.market_id" required style="width: 15em;height: 2.5em;">
									<option value="">Select Market</option>
									<?php echo fill_market_list($con); ?>
								</select>
								</div>
							</div>
						</div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Depreciation</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>  
                                <input type="number" name="depreciate" id="depreciate" class="form-control" ng-model="faoes.depreciation" pattern="[+-]?([0-9]*[.])?[0-9]+"style="width: 15em;" />
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Repair</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>  
                                <input type="number" name="repair" id="repair" class="form-control" ng-model="faoes.repairs" pattern="[+-]?([0-9]*[.])?[0-9]+" style="width: 15em;"/>
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Audit Fee</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>  
                                <input type="number" name="audit_fee" id="audit_fee" class="form-control" ng-model="faoes.audit_fee" pattern="[+-]?([0-9]*[.])?[0-9]+" style="width: 15em;"/>
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Interest Paid</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>  
                                <input type="number" name="int_paid" id="int_paid" class="form-control" ng-model="faoes.interest_paid" pattern="[+-]?([0-9]*[.])?[0-9]+" style="width: 15em;"/>
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Commission Paid</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>  
                                <input type="number" name="comm_paid" id="comm_paid" class="form-control" ng-model="faoes.commission_paid" pattern="[+-]?([0-9]*[.])?[0-9]+" style="width: 15em;"/>
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Bank Charges</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>  
                                <input type="number" name="bank_charge" id="post_tel" class="form-control" ng-model="faoes.bank_charges"  pattern="[+-]?([0-9]*[.])?[0-9]+" style="width: 15em;"/>
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Legal Charges</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>  
                                <input type="number" name="legal_charge" id="legal_charge" class="form-control" ng-model="faoes.legal_charges" pattern="[+-]?([0-9]*[.])?[0-9]+" style="width: 15em;"/>
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Net profit - transferred to capital A/C</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>  
                                <input type="number" name="net_profit" id="net_profit" class="form-control" ng-model="faoes.net_profit" pattern="[+-]?([0-9]*[.])?[0-9]+" style="width: 15em;"/>
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">From</label>
                                <input type="date" name="from_date" id="from_dat" class="form-control" ng-model="faoes.from_date" style="width: 12em;" />
                            </div>
                        
                            <div class="form-group">
                                <label class="col-md-4 control-label">To</label>
                                <input type="date" name="to_date" id="to_dat" class="form-control" ng-model="faoes.to_date" style="width: 12em;" />
                            </div>
                        </div>

                        <div class="modal-footer">
                            <input type="hidden" name="faoes_id" id="faoes_id" />
                            <input type="hidden" name="btn_action" id="btn_action" />
                            <input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="faoesdetailsModal" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="product_form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Product Details</h4>
                        </div>
                        <div class="modal-body">
                            <Div id="profitLoss_details"></Div>
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
    $('#from_date').datepicker({"dateFormat":"dd/mm/yy","controlType":"slider","addSliderAccess":true,"sliderAccessArgs":{"touchonly":true},"stepHour":1,"stepMinute":1,"stepSecond":1})
    .datepicker('option', 'minDate', "").datepicker('option', 'maxDate', "").datepicker('refresh');
});
</script>
<script type="text/javascript">
   $(function(){
    $('#to_date').datepicker({"dateFormat":"dd/mm/yy","controlType":"slider","addSliderAccess":true,"sliderAccessArgs":{"touchonly":true},"stepHour":1,"stepMinute":1,"stepSecond":1})
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