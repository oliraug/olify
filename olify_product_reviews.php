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
            <h1 class="m-0 text-dark">Product Review List</h1>
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
                                <button type="button" name="add" id="add_button" data-toggle="modal" data-target="#productReviewModal" class="btn btn-success btn-xs">Add New Product Reviews</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body" ng-controller="ProductReviewController">
                        <div class="row">
                            <div class="col-sm-12 table-responsive">
                             <table id="product_data" class="table table-bordered table-striped table-hover table-checkable datatable" datatable="ng" ui-options="dataTableOpt" ng-init="getProductReview()">
                         <tr class="grid-top-panel">
                            <th>ID</th>
                             <th>Product Name</th>
                             <th>Market User</th>
                             <th>Inventory Name</th>
                             <th>Comment</th>
                             <th>Created Date</th>
                             <th>Status</th>
                             <th>View</th>
                             <th>Edit</th>
                             <th>Delete</th>
                        </tr></thead>
                        <tr ng-repeat="data in reviews | orderBy :'reverse' track by $index">
                             <td>{{$index+1}}</td>
                             <td>{{data.product_name}}</td>
                             <td>{{data.full_name}}</td>
                             <td>{{data.product_name}}</td>
                             <td>{{data.comment}}</td>
                             <td>{{data.created}}</td>
                             <td>{{data.status}}</td>
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
                                   <button type="button" class="btn btn-danger btn-xs" title="Delete" ng-click="deleteReview($index);"><li class="glyphicon glyphicon-trash"></li></button>
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

        <div id="productReviewModal" class="modal fade pop-details" role="dialog">
            <div class="modal-dialog">
                <form ng-submit="newProductReview()" name="productReviewForm" id="product_review_form" ng-controller="ProductReviewController" class="well form-horizontal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Add Product Review</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="category_name">Select Product</label>
                                <div class="col-md-4 selectContainer">
                                   <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                    <select id="product_code" name="text" class="form-control selectpicker" ng-model="review.product_code" required="required" style="width: 15em;height: 2.5em;">
                                    <option value="">Select Product</option>
                                    <?php echo fill_product_list($con); ?>
                                    </select>
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="supplier_name">Select Market User</label>
                                <div class="col-md-4 selectContainer">
                                   <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                    <select id="user_id" name="text" class="form-control selectpicker" ng-model="review.user_id" required="required" style="width: 15em;height: 2.5em;">
                                    <option value="">Select User</option>
                                    <?php echo fill_market_user_list($con); ?>
                                    </select>
                                </div>
                            </div>
                            </div>
							              <div class="form-group">
                                <label class="col-md-4 control-label" for="supplier_name">Select Inventory</label>
                                <div class="col-md-4 selectContainer">
                                   <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                    <select id="inventory_order_id" name="text" class="form-control selectpicker" ng-model="review.inventory_order_id" required="required" style="width: 15em;height: 2.5em;">
                                    <option value="">Select Product Inventory</option>
                                    <?php echo fill_inventory_order_list($con); ?>
                                    </select>
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Comment</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
                                    <textarea name="comment" id="comment" class="form-control" ng-model="review.comment" style="width: 15em;"></textarea>
								                </div>
								                </div>
							               </div>
                            <!--div class="form-group">
                                <label class="col-md-4 control-label">Created Date </label>
                                <input type="date" name="created" id="created" class="form-control" ng-model="review.created" required="required" style="width: 15em;" />
                            </div-->
                            <div class="form-group">
                                <label class="col-md-4 control-label">Select Status</label>
                                <div class="col-md-4 selectContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                        <select name="text" id="status" class="form-control selectpicker" ng-model="review.status" required="required" style="width: 15em;height: 2.5em;">
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
        <div id="productReviewDetailsModal" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="product_review_form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Product Review Details</h4>
                        </div>
                        <div class="modal-body">
                            <Div id="product_review_details"></Div>
                        </div>
                        <div class="modal-footer">
                            
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
  <script>
  $(function() {
    $('#prd').raty({
      number: 5, starOff: 'dist/img/star-off.png', starOn: 'dist/img/star-on.png', width: 180, scoreName: "score",
    });
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