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
.olify_oaaes{
   display: block;
  max-height: 350px;
  overflow-y: auto;
  -ms-overflow-style: -ms-autohiding-scrollbar;  
}
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Office and Administration Expenses List</h1>
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
                                <button type="button" name="add" id="add_button" data-toggle="modal" data-target="#oaaesModal" class="btn btn-success btn-xs">Add Profit & Loss</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body" ng-controller="OaaesController">
                        <div class="row"><div class="col-sm-12 table-responsive" >
                        <table border="1" class="table table-bordered table-striped table-hover table-checkable datatable" ng-init="getOaaes()">
                         <tr class="grid-top-panel">
							               <th>ID</th>
							               <th>Market</th>
                             <th>Revenue</th>
                             <th>Salaries</th>
                             <th>Rent, Rates, Taxes</th>
                             <th>Unit</th>
                             <th>Purchases</th>
                             <th>Purchase Type</th>
                             <th>Postage & Telegrams</th>
                             <th>Electricity Charges</th>
                             <th>Water Bills</th>
                             <th>Telephone Charges</th>
                             <th>Printing & Stationery</th>
                             <th>From</th>
                             <th>To</th>
                             <th>View</th>
                             <th>Update</th>
                             <th>Delete</th>
                        </tr>
                
                        <tr ng-repeat="data in oaaess track by $index">
                             <td>{{$index+1}}</td>
							               <td>{{data.market_name}}</td>
                             <td>{{data.revenue}}</td>
                             <td>{{data.salaries}}</td>
                             <td>{{data.rent_rate_tax}}</td>
                             <td>{{data.unit}}</td>
                             <td>{{data.purchases}}</td>
                             <td>{{data.unit_mode}}</td>
                             <td>{{data.post_telgrm}}</td>
                             <td>{{data.elec_charges}}</td>
                             <td>{{data.water_bills}}</td>
                             <td>{{data.telphone_charges}}</td>
                             <td>{{data.print_stationery}}</td>
                             <td>{{data.from_date}}</td>
                             <td>{{data.to_date}}</td>
                             <td>
                                <div class="btn-group">
                                   <button type="button" class="btn btn-info btn-xs" title="View" data-toggle="modal" data-target="#oaaesModal" ng-click="view($index);"><li class="glyphicon glyphicon-open"></li></button>
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

        <div id="oaaesModal" class="modal fade">
            <div class="modal-dialog">
                <form name="oaaesForm" ng-submit="newOaaes()" id="oaaes_form" ng-controller="OaaesController" class="well form-horizontal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Add Office and Administration Expenses</h4>
                        </div>   
                        
                        <div class="modal-body olify_oaaes" style="background: #FFA500;">
							<div class="form-group">
								<label for="Status" class="col-md-4 control-label">Select Market</label>
								<div class="col-md-4 selectContainer">
								<div class="input-group">
								<span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
								<select name="text" id="market_id" class="form-control selectpicker" ng-model="oaaes.market_id" required style="width: 15em;height: 2.5em;">
									<option value="">Select Market</option>
									<?php echo fill_market_list($con); ?>
								</select>
								</div>
							</div>
						</div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Generated Revenue</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                                    <input type="number" name="revenue" id="revenue" class="form-control" ng-model="oaaes.revenue" required pattern="[+-]?([0-9]*[.])?[0-9]+" style="width: 15em;"/>
    
                            </div>
                        </div>
                    </div>
                            <h4 style="color: #00ffcc;">Office and Administration Expenses</h4>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Salaries</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>  
                                    <input type="number" name="salaries" id="salaries" class="form-control" ng-model="oaaes.salaries" pattern="[+-]?([0-9]*[.])?[0-9]+" style="width: 15em;"/>
                            </div>
                        </div>
                       </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Enter Rent, Rates, Taxes</label>
                                <div class="col-md-4 selectContainer">
                                <div class="input-group">
                                     <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                    <input type="number" name="rent_rate_tax" id="rent_rate_tax" class="form-control" pattern="[+-]?([0-9]*[.])?[0-9]+" ng-model="oaaes.rent_rate_tax" style="width: 8em;"/> 
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                        <select name="text" id="rent_rate_tax" class="form-control selectpicker" ng-model="oaaes.unit" style="width: 5em;height: 2.5em;">
                                            <option value="">Select Unit</option>
                                            <option value="Rent">Rent</option>
                                            <option value="Rates">Rates</option>
                                            <option value="Taxes">Taxes</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Purchases</label>
                                <div class="col-md-4 selectContainer">
                                <div class="input-group">
                                     <span class="input-group-addon"><li class="glyphicon glyphicon-shopping-cart"></li></span>
                                    <input type="number" name="purchase" id="purchase" class="form-control" pattern="[+-]?([0-9]*[.])?[0-9]+" ng-model="oaaes.purchases" style="width: 8em;"/> 
                                     <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                        <select name="text" id="purchase" class="form-control selectpicker" ng-model="oaaes.unit_mode" style="width: 5em;height: 2.5em;">
                                            <option value="">Select Unit</option>
                                            <option value="Furniture">Furniture</option>
                                            <option value="Food">Food</option>
                                            <option value="Airtime">Airtime</option>
                                            <option value="Medicine">Medicine</option>
                                            <option value="Medical Equpiment">Medical Equipments</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Postage & Telegrams</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>  
                                <input type="number" name="post_telgrm" id="post_tel" class="form-control" ng-model="oaaes.post_telgrm" pattern="[+-]?([0-9]*[.])?[0-9]+" style="width: 15em;"/>
                            </div>
                        </div>
                        </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Office Electric Charges</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>  
                                <input type="number" name="off_elec_charg" id="off_elec_charg" class="form-control" ng-model="oaaes.elec_charges"  pattern="[+-]?([0-9]*[.])?[0-9]+" style="width: 15em;"/>
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Water Bills</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>  
                                <input type="number" name="water_bills" id="water_bills" class="form-control" ng-model="oaaes.water_bills" pattern="[+-]?([0-9]*[.])?[0-9]+" style="width: 15em;"/>
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Telephone Charges</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>  
                                <input type="number" name="tel_charg" id="tel_charg" class="form-control" ng-model="oaaes.telphone_charges" pattern="[+-]?([0-9]*[.])?[0-9]+" style="width: 15em;"/>
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Printing & Stationery</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-print"></i></span>  
                                <input type="number" name="print_station" id="print_station" class="form-control" ng-model="oaaes.print_stationery"  pattern="[+-]?([0-9]*[.])?[0-9]+" style="width: 15em;"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                                <label class="col-md-4 control-label">From</label>
                                <input type="date" name="from_date" id="from_dat" class="form-control" ng-model="oaaes.from_date" style="width: 12em;" style="width: 15em;"/>
                            </div>
                        
                        <div class="form-group">
                                <label class="col-md-4 control-label">To</label>
                                <input type="date" name="to_date" id="to_dat" class="form-control" ng-model="oaaes.to_date" style="width: 12em;" style="width: 15em;"/>
                            </div>
                        </div>
              
                        <div class="modal-footer">
                            <input type="hidden" name="oaaes_id" id="oaaes_id" />
                            <input type="hidden" name="btn_action" id="btn_action" />
                            <input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="oaaesModal" class="modal fade">
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



<!--0706219903 Mr. Peter For IT Training-->