<?php
//market_index.php

include('config.php');
include('function.php');

/*if(!isset($_SESSION['type']))
{
	header('location:login.php');
}

if($_SESSION['type'] != 'master')
{
	header("location:index.php");
}*/

include('header.php');

?>

	<span id="alert_action"></span>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                        <div class="row">
                            <h3 class="panel-title">Market Index List</h3>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                        <div class="row" align="right">
                             <button type="button" name="add" id="add_button" data-toggle="modal" data-target="#marketIndexModal" class="btn btn-success btn-xs">Add Market Index</button>   		
                        </div>
                    </div>
                    <div style="clear:both"></div>
                </div>
                <div class="panel-body">
                    <div class="row">
                    	<div class="col-sm-12 table-responsive" ng-controller="MarketIndexController">
                    		<table id="index_data" class="table table-bordered table-striped table-hover table-checkable datatable" datatable="ng" ng-init="getMarketIndex()">
                    			<thead><tr>
									<th>Product Code</th>
									<th>Index Name</th>
									<th>Market ID</th>
									<th>Stock ID</th>
									<th>View</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr></thead>
								<tr ng-repeat="data in indexes track by $index">
									<td>{{data.code}}</td>
									<td>{{data.index_name}}</td>
									<td>{{data.market_id}}</td>
									<td>{{data.stock_id}}</td>
									<td>
                            			<div class="pop">
                              			<button type="button" class="btn btn-warning btn-xs" title="View" ng-click="editingMarketIndex($index);"><li class="glyphicon glyphicon-pencil"></li></button>
                           				</div>
                            		</td>
                            		<td>
                            			<div class="pop">
                              			<button type="button" class="btn btn-warning btn-xs" title="Edit" ng-click="editingMarketIndex($index);"><li class="glyphicon glyphicon-pencil"></li></button>
                            		<!--Buttons for editing -->
                            			<button class="green" ng-click="saveEdit($index)">save</button>
                            			<button class="red"  ng-click="cancelEdit()">X</button>
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
    <div id="marketIndexModal" class="modal fade">
    	<div class="modal-dialog">
    		<form ng-submit="newIndex()" id="index_form" name="index_form" class="well form-horizontal" ng-controller="MarketIndexController">
    			<div class="modal-content">
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Add Market Index</h4>
    				</div>
    				<div class="modal-body">
    					<div class="form-group">
                                <label class="col-md-4 control-label" for="category_name">Select Product</label>
                                <div class="col-md-4 selectContainer">
                                   <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                    <select id="code" name="text" class="form-control selectpicker" ng-model="index.code">
                                    <option value="">Select Product</option>
                                    <?php echo fill_product_list($con); ?>
                                    </select>
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Enter Market Index Name</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                <input type="text" name="index_name" id="index_name" class="form-control" ng-model="index.index_name"/>
                            </div>
                        </div>
                    	</div>
						<div class="form-group">
                                <label class="col-md-4 control-label" for="category_name">Select Market</label>
                                <div class="col-md-4 selectContainer">
                                   <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                    <select id="market_id" name="text" class="form-control selectpicker" ng-model="index.market_id">
                                    <option value="">Select Market</option>
                                    <?php echo fill_market_list($con); ?>
                                    </select>
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="stock_product">Select Stock Product</label>
                                <div class="col-md-4 selectContainer">
                                   <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                    <select id="stock_id" name="text" class="form-control selectpicker" ng-model="index.stock_id">
                                    <option value="">Select Stock Product</option>
                                    <?php echo fill_stock_product_list($con); ?>
                                    </select>
                                </div>
                            </div>
                            </div>
    				</div>
    				<div class="modal-footer">
    					<input type="hidden" name="code" id="code"/>
    					<input type="hidden" name="btn_action" id="btn_action"/>
    					<input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
    					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    				</div>
    			</div>
    		</form>
    	</div>
    </div>
