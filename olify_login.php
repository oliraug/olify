<?php

include('database_connection.php');

/*if(isset($_SESSION['type']))
{
  header("location:index.php");
}*/

$message = '';

if(isset($_POST["login"]))
{
  $query = "
  SELECT * FROM olify_market_user 
    WHERE login_name = :login_name
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
    array(
        'login_name'  =>  $_POST["login_name"]
      )
  );
  $count = $statement->rowCount();
  if($count > 0)
  {
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
      if($row['enabled'] == 'Yes')
      {
        if(password_verify($_POST["password"], $row["password"]))
        {
        
          $_SESSION['user_type'] = $row['user_type'];
          $_SESSION['user_id'] = $row['user_id'];
          $_SESSION['full_name'] = $row['full_name'];
          header("location:index.php");
        }
        else
        {
          $message = "<label>Wrong Password</label>";
        }
      }
      else
      {
        $message = "<label>Your account is disabled, Contact Master</label>";
      }
    }
  }
  else
  {
    $message = "<label>Wrong Login Name</labe>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Olify|Marketify</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Olify ePrice project, Exposing farmers to markets">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
<link href="images/logo.png" rel="icon" size="32x32">
<script type="text/javascript" src="js/angular.js"></script>
  <script type="text/javascript" src="app/angular-cookies.js"></script>
  <script type="text/javascript" src="app/angular-route.js"></script>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/ng-map.min.js"></script>
  <script type="text/javascript" src="js/angular-datatables.min.js"></script>
  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/ui-bootstrap-tpls-2.5.0.min.js"></script>
  <script type="text/javascript" src="js/angular-modal-service.min.js"></script>
  <script type="text/javascript" src="js/modal.js"></script>
   <script type="text/javascript" src="js/angular-animate.js"></script>
  <script type="text/javascript" src="app/product.controller.js"></script>
  <script type="text/javascript" src="app/category.controller.js"></script>
  <script type="text/javascript" src="app/fileUpload.controller.js"></script>
  <script type="text/javascript" src="app/market.controller.js"></script>
  <script type="text/javascript" src="app/market_user.controller.js"></script>
  <script type="text/javascript" src="app/customer.controller.js"></script>
  <script type="text/javascript" src="app/oaaes.controller.js"></script>
  <script type="text/javascript" src="app/sades.controller.js"></script>
  <script type="text/javascript" src="app/faoes.controller.js"></script>
  <script type="text/javascript" src="app/order.controller.js"></script>
  <script type="text/javascript" src="app/invoice.controller.js"></script>
  <script type="text/javascript" src="app/sales.controller.js"></script>
  <script type="text/javascript" src="app/suppliers.controller.js"></script>
  <script type="text/javascript" src="app/stock_product.controller.js"></script>
  <script type="text/javascript" src="app/stock_quote.controller.js"></script>
  <script type="text/javascript" src="app/market_index.controller.js"></script>
  <script type="text/javascript" src="app/message.controller.js"></script>
  <script type="text/javascript" src="app/employee.controller.js"></script>
  <script type="text/javascript" src="app/users.controller.js"></script>
  <script type="text/javascript" src="app/inventory_order_product.controller.js"></script>
  <script type="text/javascript" src="app/main_menu.js"></script>
  <script type="text/javascript" src="app/app.js"></script>
  <script type="text/javascript" src="app/directives.js"></script>
  <script type="text/javascript">
      var rootApp = angular.module('rootApp', ['myProductController', 'myMarket', 'myCategoryController', 'fileUpload', 'myMarketController', 'myMarketUserController', 'myMenu', 'myCustomerController', 'myInventoryOrderController', 'myInvoiceController', 'mySalesController', 'mySupplierController', 'myOaaesController', 'mySadesController', 'myFaoesController', 'myStockProductController', 'myStockQuoteController', 'myMarketIndexController', 'myMessageController', 'myEmployeeController', 'myUserController','myInventoryOrderProductController']);
  </script>

<style type="text/css">
 .well .form-control{width: 20em;}
 .container .well {background: #fff;}
</style>
</head>
<body ng-app="rootApp">

<div class="super_container">
	
	<!-- Header -->

	<header class="header">
		<div class="header_inner d-flex flex-row align-items-center justify-content-start">
			<div class="logo" title="Olify|Marketify"><a href="#"><img src="images/olify-logo.png" style="width:150px;height:75px;"></a></div>
			<nav class="main_nav">
				<ul>
					<li><a href="index.php">home</a></li>
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"  href="markets.php">Markets n Prices<span class="caret"></span></a>
						<ul class="dropdown-menu">
                          <li class="nav-header"><a href="/indices">Indices</a></li>
                          <li class="nav-header"><a href="/indices-KAMPALA"><i class="fa fa-table fa-fw"></i> <span>Indices by markets</span></a></li>
                          <li class="divider"></li>
                          <li class="nav-header"><a href="/stocks">Stocks</a></li>
                        </ul>
					</li>
					<li><a href="community.php">Community</a></li>
					<li><a href="sources.php">Sources</a></li>
					<li><a href="agriv.php">Agricultural News</a></li>
					<li><a href="products.php">Products</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="signup.php">Sign Up</a></li>
					<li><a href="login.php">Login</a></li>
				</ul>
			</nav>
			
			<div class="burger_container d-flex flex-column align-items-center justify-content-around menu_mm"><div></div><div></div><div></div></div>
		</div>
	</header>

	<!-- Menu -->

	<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<div class="logo menu_mm"><a href="#"><img src="images/olify-logo.png" style="width:150px;height:75px;"></a></div>
		<div class="search">
			<form action="#">
				<input type="search" class="search_input menu_mm" required="required">
				<button type="submit" id="search_button_menu" class="search_button menu_mm"><img class="menu_mm" src="images/magnifying-glass.svg" alt=""></button>
			</form>
		</div>
		<nav class="menu_nav">
			<ul class="menu_mm">
				<li class="menu_mm"><a href="index.php">Home</a></li>
				<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"  href="markets.php">Markets n Prices<span class="caret"></span></a>
						<ul class="dropdown-menu">
                          <li class="nav-header"><a href="/indices">Indices</a></li>
                          <li class="nav-header"><a href="/indices-KAMPALA"><i class="fa fa-table fa-fw"></i> <span>Indices by markets</span></a></li>
                          <li class="divider"></li>
                          <li class="nav-header"><a href="/stocks">Stocks</a></li>
                        </ul>
					</li>
					
				<li class="menu_mm"><a href="community.php">Community</a></li>
				<li class="menu_mm"><a href="sources.php">Sources</a></li>
				<li class="menu_mm"><a href="agriv.php">Agricultural News</a></li>
				<li class="menu_mm"><a href="products.php">Products</a></li>
				<li class="menu_mm"><a href="about.php">About</a></li>
				<li class="menu_mm"><a href="signup.php">Sign Up</a></li>
				<li class="menu_mm"><a href="login.php">Login</a></li>
			</ul>
		</nav>
	</div>

<!--Login Form-->
 <div class="row"  style="width: 45em;margin-top: 3em;margin-left: 5em;">
  <!-- First row -->
  <form class="well form-horizontal" ng-submit="login()" ng-controller="LoginByUsernameAndPasswordController">
    <!--div class="col-xs-12 col-md-6 col-lg-3">
      <!-- Card -->
      <fieldset>
        <legend class="card-title" style="font-weight: bold;">Find Agricultural Commodities & Prices on Marketify</legend>
        <p>Discover agricultural products accross different markets</p>
        <!--img class="card-img-top img-responsive" src="img/portfolio/fullsize/marketifyLogo.png" alt="Marketify" style="width: 10em;margin-left: 7em;"/-->
        <div class="section_title"><h1 style="margin-left: 5em;">Login</h1></div>
          <div class="form-group" ng-class="{'has-error': registerForm.login_name.$dirty && registerForm.login_name.$error.required}">
          <label for="login_name" class="col-md-4 control-label">Login Name</label>
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" class="form-control" placeholder="login name e.g @emacsone" id="login" ng-model="user.login_name"/>
          <span ng-show="registerForm.login_name.$dirty && registerForm.login_name.$error.required" class="help-block"></span>
        </div>
      </div>
    </div> 
      <div class="form-group" ng-class="{'has-error': registerForm.password.$dirty && registerForm.password.$error.required}">
          <label for="password" class="col-md-4 control-label">Password</label>
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-option-horizontal"></i></span>
            <input type="password" class="form-control" placeholder="password" id="password" ng-model="user.password"/>
          <span ng-show="registerForm.password.$dirty && registerForm.password.$error.required" class="help-block"></span>
        </div>
      </div>
      </div>

    <div class="modal-footer">
    <input type="hidden" name="user_id" id="user_id"/>
    <input type="hidden" name="btn_action" id="btn_action"/>
    <input type="submit" name="login" id="action" class="btn btn-info" value="Login"/>
   </div>
     </fieldset><!-- .end Card -->

    
    </form>
  </div>

<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="footer_logo"><a href="#"><img src="images/olify-logo.png" style="width:150px;height:75px;">&emsp;Marketify</a></div>
					<nav class="footer_nav">
						<ul>
							<li><a href="index.php">home</a></li>
							<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"  href="markets.php">Markets n Prices<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li class="nav-header"><a href="/indices">Indices</a></li>
									<li class="nav-header"><a href="/indices-KAMPALA"><i class="fa fa-table fa-fw"></i> <span>Indices by markets</span></a></li>
									<li class="divider"></li>
									<li class="nav-header"><a href="/stocks">Stocks</a></li>
								</ul>
							</li>
							<li><a href="community.php">Community</a></li>
							<li><a href="sources.php">Sources</a></li>
							<li><a href="agriv.php">Agricultural News</a></li>
							<li><a href="products.php">Products</a></li>
							<li><a href="about.php">About</a></li>
							<li><a href="signup.php">Sign Up</a></li>
							<li><a href="login.php">Login</a></li>
						</ul>
					</nav>
					<div class="footer_social">
						<ul>
							<li><a href="#" title="olify on pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
							<li><a href="#" title="olify on linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
							<li><a href="#" title="olify on instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							<li><a href="#" title="olify on facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#" title="olify on twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						</ul>
						<ul>
							<li><a href="#" title="Mobile"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;:+256 704 008 863</a></li>
							<li><a href="#" title="Email"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;:olify@olify.com</a></li>
						</ul>
					</div>
					<div class="copyright">
Copyright &copy;<script>document.write(new Date().getFullYear());</script>&nbsp; Olify Inc, All rights reserved <i class="fa fa-heart-o" aria-hidden="true"></i> 
</div>
				</div>
			</div>
		</div>
	</footer>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="plugins/colorbox/jquery.colorbox-min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>

