<?php
//category.php

include('config.php');
include('function.php');

/*if(!isset($_SESSION["user_id"]))
{
  header("location:login.php");
}
if(!isset($_SESSION['master']) && $_SESSION['user'])
{
    header('location:home.php');
}*/
include('header.php');

?>
<style type="text/css">
  .content-wrapper{
    margin-top: -65%;
}
.col-sm-12 {
  display: block;
  max-height: 450px;
  overflow-y: auto;
  -ms-overflow-style: -ms-autohiding-scrollbar;
}
</style>
<div id="ng-view" ng-view=""></div>

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Category List </h1>
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
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                        <div class="row">
                           
                        </div>
                    </div>
                    <div class="pop">
                        <div class="row" align="right">
                             <button type="button" name="add" id="add_button" data-toggle="modal" data-target="#categoryModal" class="btn btn-success btn-xs">Add New Category</button> 
                             <!--button type="hidden" name="add" id="add_button" data-toggle="modal" data-target="#updateCategoryModal" class="btn btn-info btn-xs"></button-->   		
                        </div>
                    </div>
                    <div style="clear:both"></div>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="form-group">
                      <label for="PageSize" class="col-md-2 control-label"> PageSize:</label>
                      <div class="col-md-2 selectContainer">
                     <div class="input-group">                     
                      <select ng-model="entryLimit" class="form-control selectpicker">
                        <option>5</option>
                        <option>10</option>
                        <option>20</option>
                        <option>50</option>
                        <option>100</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="filter" class="col-md-2 control-label">Filter:</label>
                    <div class="col-md-2 inputGroupContainer">
                      <div class="input-group">
                        <!--span class="input-group-addon"><li class="fa fa-search"></li></span-->
                      <input type="text" ng-model="search" ng-change="filter()" placeholder="Search or Filter" class="input-sm form-control" />
                    </div>
                  </div>
                </div>
                    <div class="col-md-4">
                      <h5>Filtered {{ filtered.length }} of {{ totalItems}} total categories</h5>
                    </div>
                  </div>
                  <br/>
                  <div class="modal-body create-modal">
                    <div class="row">
                    	<div class="col-sm-12 table-responsive" ng-controller="CategoryController" >
                    		<table id="category_data" border="1" class="table table-bordered table-striped table-hover table-checkable datatable" datatable="ng" ui-options='dataTableOpts' ng-init="getCategory()">
                <thead>
                <tr>
									<th>Category ID&nbsp;<a ng-click="sort_by('category_id');"><i class="fa fa-sort"></i></a></th>
									<th>Category Name&nbsp;<a ng-click="sort_by('category_name');"><i class="fa fa-sort"></i></a></th>
									<th>Market User&nbsp;<a ng-click="sort_by('full_name');"><i class="fa fa-sort"></i></a></th>
									<th>Description&nbsp;<a ng-click="sort_by('description');"><i class="fa fa-sort"></i></a></th>
									<th>Category Status&nbsp;<a ng-click="sort_by('category_status');"><i class="fa fa-sort"></i></a></th>
									<th>View</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tr ng-repeat="cat in categories | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                             <td>{{$index+1}}</td>
                             <td>{{cat.category_name}}</td>
                             <td>{{cat.full_name}}</td>
                             <td>{{cat.description}}</td>
                             <td>
                              <button type="button" class="btn" ng-class="{Active:'btn-success', Inactive:''}[cat.category_status]" ng-click="changeCategoryStatus(cat);">{{cat.category_status}}</button>
                            </td>
                             <td>
                                <div class="btn-group">
                                   <button type="button" class="btn btn-info btn-xs" title="View" ng-click="view($index);"><li class="glyphicon glyphicon-open"></li></button>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group">
                                   <button type="button" name="edit" id="edit_button" class="btn btn-warning btn-xs" title="Edit" ng-click="updateCategory($index);"><li class="glyphicon glyphicon-pencil"></li></button>
                                   <script type="text/ng-template" id="updateCategoryModal">
                                   <!--Buttons for editing -->
                                        <button class="green" ng-click="saveEdit($index)">save</button>
                                        <button class="red" ng-click="cancelEdit()">X</button>
                                   </script>
							                  </div>
                            </td>
                            <td>
                                <div class="btn-group">
                                   <button type="button" class="btn btn-danger btn-xs" title="Delete" ng-click="deleteCategory($index);"><li class="glyphicon glyphicon-trash"></li></button>
                                </div>
                            </td>
                        </tr>
                    </table>
                    	</div>
                      <div class="col-md-12" ng-show="filteredItems == 0">
                        <div class="col-md-12">
                          <h4>No categories found</h4>
                        </div>
                      </div>
                      <div class="col-md-12" ng-show="filteredItems > 0">    
                        <div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div id="categoryModal" class="modal fade pop-details" role="dialog">
    	<div class="modal-dialog">
    		<form ng-submit="newCategory()" name="categoryForm" ng-controller="CategoryController" class="well form-horizontal">
    			<div class="modal-content">
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Add Category</h4>
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
    					<input type="submit" name="action" id="action" class="btn btn-info" value="Add"/>
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
						<h4 class="modal-title"><i class="fa fa-plus"></i>Edit Category</h4>
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
					         <option value="Honey">Honey</option>
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
			</div>
    				
    				<div class="modal-footer">
              <div class="btn-group">
    					<input type="hidden" name="category_id" id="category_id"/>
    					<input type="hidden" name="btn_action" id="btn_action"/>
    					<input type="submit" name="action" id="action" class="btn btn-default btn-save" value="Save Category"/>
    					<button type="button" class="btn btn-default btn-cancel" data-dismiss="modal">Close</button>
    				</div>
          </div>
    			</div>
    		</form>    		
    	</div>
    </div>
  </form>
<!-- /.content-wrapper -->

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