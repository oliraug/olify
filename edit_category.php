<?php
//category.php

include('config.php');
include('function.php');

/*if(!isset($_SESSION['type']))
{
	header('location:login.php');
}

if(!isset($_SESSION['master']))
{
	header("location:index.php");
}*/

include('header.php');

?>

	<span id="alert_action"></span>
	  <div id="categoryModal" class="modal fade pop-details" role="dialog">
    	<div class="modal-dialog">
    		<form ng-submit="SaveCategory()" name="categoryForm" ng-controller="CategoryController" class="well form-horizontal" role="form" novalidate>
    			<div class="modal-content">
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Edit Category [ID: {{category.category_id}}]</h4>
    				</div>
    				<div class="modal-body">
    				<div class="form-group">
            		<label for="Status" class="col-md-4 control-label">Select Market User</label>
            			<div class="col-md-4 selectContainer">
              			 <div class="input-group">
               			 <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                		 <select name="text" id="user_id" class="form-control selectpicker" ng-model="category.user_id" required style="width: 15em;height: 2.5em;">
                    		<option value="">Select User</option>
                    		<?php echo fill_market_user_list($con); ?>
                         </select>
                         <small class="errorMessage" ng-show="categoryForm.user_id.$dirty && categoryForm.user_id.$invalid"> Select User.</small>
               			</div>
              		   </div>
           			</div>
    				<div class="form-group">
    				<label for="category" class="col-md-4 control-label">Category Name</label>
    					<div class="col-md-4 selectContainer">
    					<div class="input-group">
                  <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
             		 	<select id="category_name" name="text" ng-model="category.category_name" class="form-control selectpicker" required style="width: 15em;height: 2.5em;">
              		 <option value=''>Select</option>
              		 <option value="Fruits">Fruits</option>
              		 <option value="Cereals">Cereals</option>
              		 <option value="Grains">Grains</option>
              		 <option value="Flour">Flour</option>
              		 <option value="Animal Products">Animal Products</option>
              		 <option value="Animals">Animals</option>
              		 <option value="Fish">Fish</option>
              		 <option value="Root Crops">Root Crops</option>
              		 <option value="Poultry">Poultry</option>
              		 <option value="Vegetables">Vegetables</option>
              		 <option value="Pesticides">Pesticides</option>
              		 <option value="Fertilizers">Fertilizers</option>
              		 <option value="Machinery">Machinery</option>
              		 <option value="Medicine">Medicine</option>
              		 <option value="Cash Crops">Cash Crops</option>
              		 <option value="Poultry Feeds">Poultry Feeds</option>
              		 <option value="Animal Feeds">Animal Feeds</option>
              		 <option value="Seedlings">Seedlings</option>
              		 <option value="Oil Seeds">Oil Seeds</option>
                   <option value="Seeds">Seeds</option>
            		</select>
                <small class="errorMessage" ng-show="categoryForm.category_name.$dirty && categoryForm.category_name.$invalid"> Select Category Name.</small>
            	</div>
            	</div>
            </div>
            <div class="form-group">
            <label for="Status" class="col-md-4 control-label">Select Status</label>
            <div class="col-md-4 selectContainer">
               <div class="input-group">
               <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                <select name="text" id="category_status" class="form-control selectpicker" ng-model="category.category_status" required style="width: 15em;height: 2.5em;">
                    <option value="">Select Status</option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
                <small class="errorMessage" ng-show="categoryForm.category_status.$dirty && categoryForm.category_status.$invalid"> Select Status.</small>
               </div>
               </div>
           </div>
    		<div class="form-group">
    			<label for="description" class="col-md-4 control-label">Description</label>
    			<div class="col-md-4 inputGroupContainer">
          		<div class="input-group">
                <span class="input-group-addon"><li class="glyphicon glyphicon-pencil"></li></span>
           		<textarea type="text" name="text" id="description" class="form-control input-sm" ng-model="category.description" style="width: 17em;"></textarea>
              <small class="errorMessage" ng-show="categoryForm.description.$dirty && categoryForm.description.$invalid"> Enter Description.</small>
            </div>
    		</div>
    	</div>
    				
    				<div class="modal-footer">
    					<input type="hidden" name="category_id" id="category_id"/>
    					<input type="hidden" name="btn_action" id="btn_action"/>
    					<input type="submit" name="action" id="action" class="btn btn-info" value="Save Category" ng-disabled="categoryForm.$invalid || enableUpdate"/>
    					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    				</div>
    			</div>
    		</form>
    		
    	</div>
    </div>

	<div id="updateCategoryModal" class="modal fade pop-details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    	<div class="modal-dialog">
    		<form ng-submit="updateCategory()" name="categoryForm" ng-controller="CategoryController" class="well form-horizontal">
    			<div class="modal-content">
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i>Update Category</h4>
    				</div>
    				<div class="modal-body">
    				<div class="form-group">
            		<label for="Status" class="col-md-4 control-label">Select Market User</label>
            			<div class="col-md-4 selectContainer">
              			 <div class="input-group">
               			 <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                		 <select name="text" id="user_id" class="form-control selectpicker" ng-model="category.user_id" required style="width: 15em;height: 2.5em;">
                    		<option value="">Select User</option>
                    		<?php echo fill_market_user_list($con); ?>
                         </select>
               			</div>
              		   </div>
           			</div>
    				<div class="form-group">
    				<label for="category" class="col-md-4 control-label">Category Name</label>
    					<div class="col-md-4 selectContainer">
    					<div class="input-group">
                         <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
             		 	<select id="category_name" name="text" ng-model="category.category_name" class="form-control selectpicker" required style="width: 15em;height: 2.5em;">
              		 <option value=''>Select</option>
              		 <option value="Fruits">Fruits</option>
              		 <option value="Cereals">Cereals</option>
              		 <option value="Grains">Grains</option>
              		 <option value="Flour">Flour</option>
              		 <option value="Animal Products">Animal Products</option>
              		 <option value="Animals">Animals</option>
              		 <option value="Fish">Fish</option>
              		 <option value="Root Crops">Root Crops</option>
              		 <option value="Poultry">Poultry</option>
              		 <option value="Vegetables">Vegetables</option>
              		 <option value="Pesticides">Pesticides</option>
              		 <option value="Fertilizers">Fertilizers</option>
              		 <option value="Machinery">Machinery</option>
              		 <option value="Medicine">Medicine</option>
              		 <option value="Cash Crops">Cash Crops</option>
              		 <option value="Poultry Feeds">Poultry Feeds</option>
              		 <option value="Animal Feeds">Animal Feeds</option>
              		 <option value="Seedlings">Seedlings</option>
              		 <option value="Oil Seeds">Oil Seeds</option>
                   <option value="Seeds">Seeds</option>
            		</select>
            	</div>
            	</div>
            </div>
            <div class="form-group">
            <label for="Status" class="col-md-4 control-label">Select Status</label>
            <div class="col-md-4 selectContainer">
               <div class="input-group">
               <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                <select name="text" id="category_status" class="form-control selectpicker" ng-model="category.category_status" required style="width: 15em;height: 2.5em;">
                    <option value="">Select Status</option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
               </div>
               </div>
           </div>
    		<div class="form-group">
    			<label for="description" class="col-md-4 control-label">Description</label>
    			<div class="col-md-4 inputGroupContainer">
          		<div class="input-group">
                <span class="input-group-addon"><li class="glyphicon glyphicon-pencil"></li></span>
           		<textarea type="text" name="text" id="description" class="form-control input-sm" ng-model="category.description" style="width: 17em;"></textarea></div>
    		</div>
    	</div>
    				
    				<div class="modal-footer">
    					<input type="hidden" name="category_id" id="category_id"/>
    					<input type="hidden" name="btn_action" id="btn_action"/>
    					<input type="submit" name="action" id="action" class="btn btn-info" value="Save Category"/>
    					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    				</div>
    			</div>
    		</form>    		
    	</div>
    </div>
