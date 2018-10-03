<?php
//profile.php

include('config.php');
//session_start();

if(!isset($_SESSION['type']))
{
	header("location:login.php");
}

$query = "
SELECT * FROM market_user 
WHERE user_id = '".$_SESSION["$user_id"]."'
";
$data = array();

$login_name = '';
$email = '';
$user_id = '';
while ($row = mysqli_fetch_array($query)) {
    $data[] = array(
	"login_name"			=> $row['login_name'],
	"email"					=> $row['email']
	);
}
echo json_encode($data);

include('header.php');

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Profile List</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
		<div class="panel panel-default">
			<div class="panel-heading">Edit Profile</div>
            <div class="modal-dialog">               
				<form method="post" id="edit_profile_form" class="well form-horizontal">
				<div class="modal-content">
					<span id="message"></span>
					<div class="modal-body">
					<div class="form-group">
						<label class="col-md-4 control-label">Username</label>
						<div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" name="login_name" id="login_name" class="form-control" value="<?php echo $login_name; ?>" required placeholder="username"/>
					</div>
					</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Email</label>
						<div class="col-md-4 inputGroupContainer">
                         <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>                                    
						<input type="email" name="user_email" id="user_email" class="form-control" required value="<?php echo $email; ?>" placeholder="email"/>
					</div>
					</div>
					</div>
					<hr />
					<div class="form-group">
					<label class="control-label">Leave Password blank if you do not want to change</label>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">New Password</label>
						<div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-option-horizontal"></i></span>                                    
						<input type="password" name="user_new_password" id="user_new_password" class="form-control" placeholder="new password"/>
					</div>
					</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Re-enter Password</label>
						<div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-option-horizontal"></i></span>                                    
						<input type="password" name="user_re_enter_password" id="user_re_enter_password" class="form-control" />
						<span id="error_password"></span>	
					</div>
					</div>
					</div>
					</div>
					<div class="modal-footer">
						<input type="submit" name="edit_prfile" id="edit_prfile" value="Edit" class="btn btn-info" />
					</div>
					</div>
				</form>
			</div>
		</div>

<script>
$(document).ready(function(){
	$('#edit_profile_form').on('submit', function(event){
		event.preventDefault();
		if($('#user_new_password').val() != '')
		{
			if($('#user_new_password').val() != $('#user_re_enter_password').val())
			{
				$('#error_password').html('<label class="text-danger">Password Not Match</label>');
				return false;
			}
			else
			{
				$('#error_password').html('');
			}
		}
		$('#edit_prfile').attr('disabled', 'disabled');
		var form_data = $(this).serialize();
		$('#user_re_enter_password').attr('required',false);
		$.ajax({
			url:"edit_profile.php",
			method:"POST",
			data:form_data,
			success:function(data)
			{
				$('#edit_prfile').attr('disabled', false);
				$('#user_new_password').val('');
				$('#user_re_enter_password').val('');
				$('#message').html(data);
			}
		})
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