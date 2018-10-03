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
<style type="text/css">
    .dropzone {
    background: white;
    border-radius: 5px;
    border: 2px dashed rgb(0, 135, 247);
    border-image: none;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
}
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Product Image List</h1>
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
                                <button type="button" name="add" id="add_button" data-toggle="modal" data-target="#imageModal" class="btn btn-success btn-xs">Add New Product Image</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body" ng-controller="ImageController">
                        <div class="row">
                            <div class="col-sm-12 table-responsive">
                             <table id="product_data" class="table table-bordered table-striped table-hover table-checkable datatable" datatable="ng" ui-options="dataTableOpt">
                         <tr class="grid-top-panel">
                            <th>ID</th>
                             <th>Product Name</th>
                             <th>Market User</th>
                             <th>Name</th>
                             <th>Image</th>
                             <th>Created Date</th>
                             <th>Status</th>
                             <th>View</th>
                             <th>Edit</th>
                             <th>Delete</th>
                        </tr></thead>
                        <tr ng-repeat="data in images | orderBy :'reverse' track by $index">
                             <!--td>{{$index+1}}</td>
                             <td>{{data.product_name}}</td>
                             <td>{{data.full_name}}</td>
                             <td>{{data.name}}</td>
                             <td>{{data.image}}</td>
                             <td>{{data.created}}</td>
                             <td>{{data.status}}</td-->
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

        <div id="imageModal" class="modal fade pop-details" role="dialog">
            <div class="modal-dialog">
                <form ng-submit="newProductImage()" name="productImageForm" id="product_image_form" ng-controller="ImageController" class="well form-horizontal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Add Product Image</h4>
                        </div>
                        <div class="modal-body">

                    <!--div class="form-group">
                                <label class="col-md-4 control-label">Enter Language Name</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                                    <input type="text" name="image_name" id="image_name" class="form-control" ng-model="image.image_name" required style="width: 15em;"/>
                            </div>
                        </div>
                    </div>
                            <!--div class="form-group">
                                <label class="col-md-4 control-label" for="category_name">Select Product</label>
                                <div class="col-md-4 selectContainer">
                                   <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                    <select id="product_code" name="text" class="form-control selectpicker" ng-model="image.product_code" required="required" style="width: 15em;height: 2.5em;">
                                    <option value="">Select Product</option>
                                    <?php //echo fill_product_list($con); ?>
                                    </select>
                                </div>
                            </div>
                            </div>
                            <!--div class="form-group">
                                <label class="col-md-4 control-label" for="supplier_name">Select Market User</label>
                                <div class="col-md-4 selectContainer">
                                   <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                    <select id="user_id" name="text" class="form-control selectpicker" ng-model="image.user_id" required="required" style="width: 15em;height: 2.5em;">
                                    <option value="">Select User</option>
                                    <?php //echo fill_market_user_list($con); ?>
                                    </select>
                                </div>
                            </div>
                            </div-->
                            <div class="form-group" id="container" enctype="multipart/form-data">
                                <label class="col-md-4 control-label">Select Product Images</label>
                                <div class="dropzone col-md-4 inputGroupContainer">
                                <div class="fallback">
                                <!--span class="input-group-addon"><i class="glyphicon glyphicon-image"></i></span-->
                                <input type="file" name="images[]" multiple id="img" accept="image/*" ng-model="image.images"/>                             
                                <!--img ng-src="{{filepreview}}" class="img-responsive" ng-show="filepreview"/-->
                                <input type='submit' value='Upload' name='save_image' class="btn btn-success" /-->
                            </div>
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Select Image Status</label>
                                <div class="col-md-4 selectContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                        <select name="text" id="status" class="form-control selectpicker" ng-model="image.status" required="required" style="width: 15em;height: 2.5em;">
                                            <option value="">Select Status</option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div-->                            
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="code" id="id" />
                            <input type="hidden" name="btn_action" id="btn_action" />
                            <input type="submit" name="save_image" id="action" class="btn btn-info" value="Add" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="productdetailsModal" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="product_form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Product Details</h4>
                        </div>
                        <div class="modal-body">
                            <Div id="product_details"></Div>
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
<script type="text/javascript">
var dropzone = new Dropzone('#demo-upload', {
  previewTemplate: document.querySelector('#preview-template').innerHTML,
  parallelUploads: 2,
  thumbnailHeight: 120,
  thumbnailWidth: 120,
  maxFilesize: 3,
  filesizeBase: 1000,
  thumbnail: function(file, dataUrl) {
    if (file.previewElement) {
      file.previewElement.classList.remove("dz-file-preview");
      var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
      for (var i = 0; i < images.length; i++) {
        var thumbnailElement = images[i];
        thumbnailElement.alt = file.name;
        thumbnailElement.src = dataUrl;
      }
      setTimeout(function() { file.previewElement.classList.add("dz-image-preview"); }, 1);
    }
  }

});


// Now fake the file upload, since GitHub does not handle file uploads
// and returns a 404

var minSteps = 6,
    maxSteps = 60,
    timeBetweenSteps = 100,
    bytesPerStep = 100000;

dropzone.uploadFiles = function(files) {
  var self = this;

  for (var i = 0; i < files.length; i++) {

    var file = files[i];
    totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));

    for (var step = 0; step < totalSteps; step++) {
      var duration = timeBetweenSteps * (step + 1);
      setTimeout(function(file, totalSteps, step) {
        return function() {
          file.upload = {
            progress: 100 * (step + 1) / totalSteps,
            total: file.size,
            bytesSent: (step + 1) * file.size / totalSteps
          };

          self.emit('uploadprogress', file, file.upload.progress, file.upload.bytesSent);
          if (file.upload.progress == 100) {
            file.status = Dropzone.SUCCESS;
            self.emit("success", file, 'success', null);
            self.emit("complete", file);
            self.processQueue();
            //document.getElementsByClassName("dz-success-mark").style.opacity = "1";
          }
        };
      }(file, totalSteps, step), duration);
    }
  }
}
</script>

</body>
</html>