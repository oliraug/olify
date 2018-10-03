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
        <span id='alert_action'></span>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
                    <div class="panel-heading">
                    	<div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                            	<h3 class="panel-title">Profit and Loss Statement</h3>
                            </div>
                        
                            <div class="pop" align='right'>
                                <button type="button" name="add" id="add_button" data-toggle="modal" data-target="#profitLossModal" class="btn btn-success btn-xs">Add</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body" ng-controller="ProfitLossStmtController">
                        <div class="row"><div class="col-sm-12 table-responsive" >
                        <table border="1" class="table table-bordered table-striped table-hover table-checkable datatable" ng-init="getProfitLossStmt()">
                         <tr class="grid-top-panel">
                            <th>ID</th>
                             <th>Gross profit (transferred)</th>
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
                             <!--th>Carriage Outward</th>
                             <th>Advertisement</th>
                             <th>Commission</th>
                             <th>Insurance</th>
                             <th>Travelling Expenses</th>
                             <th>Bad Debts</th>
                             <th>Packing Expenses</th>
                             <th>Depreciation</th>
                             <th>Repairs</th>
                             <th>Audit Fee</th>
                             <th>Interest Paid</th>
                             <th>Commission Paid</th>
                             <th>Bank Charges</th>
                             <th>Legal Charges</th>
                             <th>Net profit - transferred to capital A/C</th-->
                             <th>From</th>
                             <th>To</th>
                             <th>View</th>
                             <th>Update</th>
                             <th>Delete</th>
                        </tr>
                
                        <tr ng-repeat="data in profits track by $index">
                             <td>{{$index+1}}</td>
                             <td>{{data.gross_profit}}</td>
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
                             <!--td>{{data.carriage_outward}}</td>
                             <td>{{data.advertisement}}</td>
                             <td>{{data.commission}}</td>
                             <td>{{data.insurance}}</td>
                             <td>{{data.travel_expense}}</td>
                             <td>{{data.bad_debts}}</td>
                             <td>{{data.packing_expenses}}</td>
                             <td>{{data.depreciation}}</td>
                             <td>{{data.repairs}}</td>
                             <td>{{data.audit_fee}}</td>
                             <td>{{data.interest_paid}}</td>
                             <td>{{data.commission_paid}}</td>
                             <td>{{data.bank_charges}}</td>
                             <td>{{data.legal_charges}}</td>
                             <td>{{data.net_profit}}</td-->
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

        <div id="profitLossModal" class="modal fade">
            <div class="modal-dialog">
                <form name="profit_loss" ng-submit="newProfitLoss()" id="profit_loss" ng-controller="ProfitLossStmtController" class="well form-horizontal">
                    <!--ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#OAAE">Office and Administration Expenses</a></li>
                        <li><a data-toggle="tab" href="#SADE">Selling and Distribution Expenses</a></li>
                        <li><a data-toggle="tab" href="#FAOE">Financial and Other Expenses</a></li>
                    </ul-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Add Profit and Loss Account</h4>
                        </div>   
                        
                        <div class="modal-body">
                            <div id="OAAE" class="tab-pane fade in active" style="background: #FFA500;">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Gross profit (transferred)</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                                    <input type="number" name="gross_profit" id="gross_profit" class="form-control" ng-model="profit.gross_profit" required />
                                <!--select name="category_id" id="category_id" class="form-control" required>
                                    <option value="">Select Category</option>
                                    <?php //echo fill_category_list($connect);?>
                                    profit_loss_stmt_id`,
                                </select-->
                            </div>
                        </div>
                    </div>
                            <h4 style="color: #00ffcc;">Office and Administration Expenses</h4>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Salaries</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>  
                                    <input type="number" name="salaries" id="salaries" class="form-control" ng-model="profit.salaries" />
                            </div>
                        </div>
                       </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Enter Rent, Rates, Taxes</label>
                                <div class="col-md-4 selectContainer">
                                <div class="input-group">
                                     <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                    <input type="number" name="rent_rate_tax" id="rent_rate_tax" class="form-control" pattern="[+-]?([0-9]*[.])?[0-9]+" ng-model="profit.rent_rate_tax"/> 
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                        <select name="text" id="rent_rate_tax" class="form-control selectpicker" ng-model="profit.unit">
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
                                    <input type="number" name="purchase" id="purchase" class="form-control" pattern="[+-]?([0-9]*[.])?[0-9]+" ng-model="profit.purchases"/> 
                                     <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                        <select name="text" id="purchase" class="form-control selectpicker" ng-model="profit.unit_mode">
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
                                <input type="number" name="post_telgrm" id="post_tel" class="form-control" ng-model="profit.post_telgrm" pattern="[+-]?([0-9]*[.])?[0-9]+" />
                            </div>
                        </div>
                        </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Office Electric Charges</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>  
                                <input type="number" name="off_elec_charg" id="off_elec_charg" class="form-control" ng-model="profit.elec_charges"  pattern="[+-]?([0-9]*[.])?[0-9]+" />
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Water Bills</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>  
                                <input type="number" name="water_bills" id="water_bills" class="form-control" ng-model="profit.water_bills" pattern="[+-]?([0-9]*[.])?[0-9]+" />
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Telephone Charges</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>  
                                <input type="number" name="tel_charg" id="tel_charg" class="form-control" ng-model="profit.telphone_charges" pattern="[+-]?([0-9]*[.])?[0-9]+" />
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Printing & Stationery</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-print"></i></span>  
                                <input type="number" name="print_station" id="print_station" class="form-control" ng-model="profit.print_stationery"  pattern="[+-]?([0-9]*[.])?[0-9]+" />
                            </div>
                        </div>
                    </div>
                </div>
                            <!--div id="SADE" class="tab-pane fade in active" style="background: #6d6;">
                            <h4 style="color: #00ffcc;">Selling and Distribution Expenses</h4>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Carriage Outward</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>  
                                <input type="number" name="carry_out" id="carry_out" class="form-control" ng-model="profit.carriage_outward" pattern="[+-]?([0-9]*[.])?[0-9]+" />
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Advertisement</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>  
                                <input type="number" name="adds" id="adds" class="form-control" ng-model="profit.advertisement" pattern="[+-]?([0-9]*[.])?[0-9]+" />
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Commission</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>  
                                <input type="number" name="commission" id="commission" class="form-control" ng-model="profit.commission" pattern="[+-]?([0-9]*[.])?[0-9]+" />
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Insurance</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>  
                                <input type="number" name="insure" id="insure" class="form-control" ng-model="profit.insurance" pattern="[+-]?([0-9]*[.])?[0-9]+" />
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Traveling Expenses</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-bookmark"></i></span>  
                                <input type="number" name="travel_exp" id="travel_exp" class="form-control" ng-model="profit.travel_expense" pattern="[+-]?([0-9]*[.])?[0-9]+" />
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Bad Debts</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>  
                                <input type="number" name="bad_debts" id="bad_debts" class="form-control" ng-model="profit.bad_debts" pattern="[+-]?([0-9]*[.])?[0-9]+" />
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Packing Expenses</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>  
                                <input type="number" name="pack_exp" id="pack_exp" class="form-control" ng-model="profit.packing_expenses" pattern="[+-]?([0-9]*[.])?[0-9]+" />
                            </div>
                        </div>
                    </div>
                </div>
                            <div id="FAOE" class="tab-pane fade in active" style="background: 66d;">
                            <h4 style="color: #00ffcc;">Financial and Other Expenses</h4>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Depreciation</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>  
                                <input type="number" name="depreciate" id="depreciate" class="form-control" ng-model="profit.depreciation" pattern="[+-]?([0-9]*[.])?[0-9]+" />
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Repair</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>  
                                <input type="number" name="repair" id="repair" class="form-control" ng-model="profit.repairs" pattern="[+-]?([0-9]*[.])?[0-9]+" />
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Audit Fee</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>  
                                <input type="number" name="audit_fee" id="audit_fee" class="form-control" ng-model="profit.audit_fee" pattern="[+-]?([0-9]*[.])?[0-9]+" />
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Interest Paid</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>  
                                <input type="number" name="int_paid" id="int_paid" class="form-control" ng-model="profit.interest_paid" pattern="[+-]?([0-9]*[.])?[0-9]+" />
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Commission Paid</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>  
                                <input type="number" name="comm_paid" id="comm_paid" class="form-control" ng-model="profit.commission_paid" pattern="[+-]?([0-9]*[.])?[0-9]+" />
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Bank Charges</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>  
                                <input type="number" name="bank_charge" id="post_tel" class="form-control" ng-model="profit.bank_charges"  pattern="[+-]?([0-9]*[.])?[0-9]+" />
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Legal Charges</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>  
                                <input type="number" name="legal_charge" id="legal_charge" class="form-control" ng-model="profit.legal_charges" pattern="[+-]?([0-9]*[.])?[0-9]+" />
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Net profit - transferred to capital A/C</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>  
                                <input type="number" name="net_profit" id="net_profit" class="form-control" ng-model="profit.net_profit" pattern="[+-]?([0-9]*[.])?[0-9]+" />
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">From</label>
                                <input type="text" name="from_date" id="from_date" class="form-control" ng-model="profit.from_date" style="width: 12em;" />
                            </div>
                        
                        <div class="form-group">
                                <label class="col-md-4 control-label">To</label>
                                <input type="text" name="to_date" id="to_date" class="form-control" ng-model="profit.to_date" style="width: 12em;" />
                            </div>
                        </div-->
                    </div>
                        <div class="modal-footer">
                            <input type="hidden" name="profit_loss_stmt_id" id="profit_loss_stmt_id" />
                            <input type="hidden" name="btn_action" id="btn_action" />
                            <input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="profitlossdetailsModal" class="modal fade">
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
