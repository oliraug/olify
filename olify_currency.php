<?php
//product.php

include('config.php');
include('function.php');

/*if(!isset($_SESSION["type"]))
{
    header('location:login.php');
}

if(!isset($_SESSION['master']))
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
            <h1 class="m-0 text-dark">Currency List </h1>
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
                                <button type="button" name="add" id="add_button" data-toggle="modal" data-target="#currencyModal" class="btn btn-success btn-xs">Add New Currency</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body" ng-controller="CurrencyController">
                        <div class="row">
                            <div class="col-sm-12 table-responsive">
                             <table id="product_data" class="table table-bordered table-striped table-hover table-checkable datatable" datatable="ng" ui-options="dataTableOpt" ng-init="getCurrency()">
                         <tr class="grid-top-panel">
                            <th>ID</th>
                             <th>Currency Name</th>
                             <!--th>Currency Image</th-->
                             <th>Created Date</th>
                             <th>Status</th>
                             <th>View</th>
                             <th>Edit</th>
                             <th>Delete</th>
                        </tr></thead>
                        <tr ng-repeat="data in currencies | orderBy :'reverse' track by $index">
                             <td>{{$index+1}}</td>
                             <td>{{data.currency_name}}</td>
                             <!--td>{{data.icon_image}}</td-->
                             <td>{{data.created}}</td>
                             <td>{{data.currency_status}}</td>
                              <td>
                                <div class="btn-group">
                                   <button type="button" class="btn btn-info btn-xs" title="View" ng-click="view($index);"><li class="glyphicon glyphicon-open"></li></button>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group">
                                   <button type="button" name="edit" id="edit_button" class="btn btn-warning btn-xs" title="Edit" data-toggle="modal" data-target="#updateProductModal" ng-click="edit($index);"><li class="glyphicon glyphicon-pencil"></li></button>
							   </div>
                            </td>
                            <td>
                                <div class="btn-group">
                                   <button type="button" class="btn btn-danger btn-xs" title="Delete" ng-click="deleteProduct($index);"><li class="glyphicon glyphicon-trash"></li></button>
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

        <div id="currencyModal" class="modal fade pop-details" role="dialog">
            <div class="modal-dialog">
                <form ng-submit="newCurrency()" name="currencyForm" id="currency_form" ng-controller="CurrencyController" class="well form-horizontal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Add New Currency</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="category_name">Select Currency Name</label>
                                <div class="col-md-4 selectContainer">
                                   <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                    <select id="name" name="text" class="form-control selectpicker" ng-model="currency.currency_name" required="required" style="width: 15em;height: 2.5em;">
                                    <option value="">Select Currency</option>
                                    <option value="USD">USD</option><option value="EUR">EUR</option>
									<option value="GBP">GBP</option><option value="CAD">CAD</option>
									<option value="AUD">AUD</option><option value="AED">AED</option>
									<option value="AMD">AMD</option><option value="ARS">ARS</option>
									<option value="AZN">AZN</option><option value="BAM">BAM</option>
									<option value="BBD">BBD</option><option value="BDT">BDT</option>
									<option value="BGN">BGN</option><option value="BHD">BHD</option>
									<option value="BMD">BMD</option><option value="BND">BND</option>
									<option value="BOB">BOB</option><option value="BSD">BSD</option>
									<option value="BWP">BWP</option><option value="BZD">BZD</option>
									<option value="CHF">CHF</option><option value="CNY">CNY</option>
									<option value="COP">COP</option><option value="CVE">CVE</option>
									<option value="CZK">CZK</option><option value="DJF">DJF</option>
									<option value="DKK">DKK</option><option value="DOP">DOP</option>
									<option value="DZD">DZD</option><option value="EGP">EGP</option>
									<option value="GEL">GEL</option><option value="GTQ">GTQ</option>
									<option value="HKD">HKD</option><option value="HNL">HNL</option>
									<option value="HRK">HRK</option><option value="HUF">HUF</option>
									<option value="IDR">IDR</option><option value="ILS">ILS</option>
									<option value="INR">INR</option><option value="ISK">ISK</option>
									<option value="JOD">JOD</option><option value="JPY">JPY</option>
									<option value="KES">KES</option><option value="KGS">KGS</option>
									<option value="KHR">KHR</option><option value="KRW">KRW</option>
									<option value="KWD">KWD</option><option value="KYD">KYD</option>
									<option value="KZT">KZT</option><option value="LAK">LAK</option>
									<option value="LBP">LBP</option><option value="LKR">LKR</option>
									<option value="MAD">MAD</option><option value="MDL">MDL</option>
									<option value="MKD">MKD</option><option value="MNT">MNT</option>
									<option value="MOP">MOP</option><option value="MVR">MVR</option>
									<option value="MXN">MXN</option><option value="MYR">MYR</option>
									<option value="NAD">NAD</option><option value="NGN">NGN</option>
									<option value="NOK">NOK</option><option value="NZD">NZD</option>
									<option value="OMR">OMR</option><option value="PAB">PAB</option>
									<option value="PEN">PEN</option><option value="PGK">PGK</option>
									<option value="PHP">PHP</option><option value="PKR">PKR</option>
									<option value="PLN">PLN</option><option value="PYG">PYG</option>
									<option value="QAR">QAR</option><option value="RON">RON</option>
									<option value="RSD">RSD</option><option value="RUB">RUB</option>
									<option value="SAR">SAR</option><option value="SEK">SEK</option>
									<option value="SGD">SGD</option><option value="THB">THB</option>
									<option value="TRY">TRY</option><option value="TTD">TTD</option>
									<option value="TWD">TWD</option><option value="TZS">TZS</option>
									<option value="UAH">UAH</option><option value="VND">VND</option>
									<option value="XCD">XCD</option><option value="XOF">XOF</option>
									<option value="YER">YER</option><option value="ZAR">ZAR</option>
									<option value="0" disabled="disabled">----------</option>
									<option value="AFN">AFN</option><option value="ALL">ALL</option>
									<option value="ANG">ANG</option><option value="AOA">AOA</option>
									<option value="AWG">AWG</option><option value="BIF">BIF</option>
									<option value="BRL">BRL</option><option value="BTN">BTN</option>
									<option value="BYN">BYN</option><option value="CDF">CDF</option>
									<option value="CLP">CLP</option><option value="CRC">CRC</option>
									<option value="CUP">CUP</option><option value="ERN">ERN</option>
									<option value="ETB">ETB</option><option value="FJD">FJD</option>
									<option value="FKP">FKP</option><option value="GIP">GIP</option>
									<option value="GMD">GMD</option><option value="GNF">GNF</option>
									<option value="GYD">GYD</option><option value="HTG">HTG</option>
									<option value="IQD">IQD</option><option value="IRR">IRR</option>
									<option value="JMD">JMD</option><option value="KMF">KMF</option>
									<option value="KPW">KPW</option><option value="LRD">LRD</option>
									<option value="LSL">LSL</option><option value="LYD">LYD</option>
									<option value="MGA">MGA</option><option value="MMK">MMK</option>
									<option value="MRO">MRO</option><option value="MUR">MUR</option>
									<option value="MWK">MWK</option><option value="MZN">MZN</option>
									<option value="NIO">NIO</option><option value="NPR">NPR</option>
									<option value="RWF">RWF</option><option value="SBD">SBD</option>
									<option value="SCR">SCR</option><option value="SDG">SDG</option>
									<option value="SHP">SHP</option><option value="SLL">SLL</option>
									<option value="SOS">SOS</option><option value="SRD">SRD</option>
									<option value="STD">STD</option><option value="SVC">SVC</option>
									<option value="SYP">SYP</option><option value="SZL">SZL</option>
									<option value="TND">TND</option><option value="TOP">TOP</option>
									<option value="UGX">UGX</option><option value="UYU">UYU</option>
									<option value="UZS">UZS</option><option value="VEF">VEF</option>
									<option value="VUV">VUV</option><option value="WST">WST</option>
									<option value="XAF">XAF</option><option value="XPF">XPF</option>
									<option value="ZMW">ZMW</option>
                                    </select>
                                </div>
                            </div>
                            </div>
                            <!--div class="form-group" id="container" enctype="multipart/form-data">
                                <label class="col-md-4 control-label">Select Currency Images</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-image"></i></span>
                                <input type="file" name="files[]" multiple id="img" accept="image/*" fileinput="file" filepreview="filepreview" class="file-upload" ng-model="currency.icon_image"/>                             
                                <img ng-src="{{filepreview}}" class="img-responsive" ng-show="filepreview"/>
                                <!--input type='submit' value='Upload' name='submit' class="btn btn-success" /->
                            </div>
                            </div>
                            </div-->
                            <div class="form-group">
                                <label class="col-md-4 control-label">Created Date </label>
                                <input type="date" name="created" id="created" class="form-control" ng-model="currency.created" required="required" style="width: 15em;" />
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Select Currency Status</label>
                                <div class="col-md-4 selectContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                        <select name="text" id="status" class="form-control selectpicker" ng-model="currency.currency_status" required="required" style="width: 15em;height: 2.5em;">
                                            <option value="">Select Status</option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" id="id" />
                            <input type="hidden" name="btn_action" id="btn_action" />
                            <input type="submit" name="submit" id="action" class="btn btn-info" value="Add" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="currencydetailsModal" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="currency_form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Currency Details</h4>
                        </div>
                        <div class="modal-body">
                            <Div id="currency_details"></Div>
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