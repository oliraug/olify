<?php
//header.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Olify | Marketify ePrice Dashboard</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
  <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.css">
  <link href="images/logo.png" rel="icon" size="32x32">
  <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" type="text/css" href="styles/dropzone.min.css">
  <!-- G
  <!-- Google Font: Source Sans Pro 0756803560 Matsiko--> 
  <script type="text/javascript" src="js/angular.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.4/datepicker.css"/>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.4/datepicker.js"></script>
  <link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/themes/base/jquery-ui.css"/>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/jquery-ui.min.js"></script>
  <script type="text/javascript" async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBe1sPWlPKGgCoDebb-VJL9WnZ3W6U2MqQ&callback=initMap"></script>
  <link type="text/css" src="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-utils/0.1.1/angular-ui-utils.min.js"></script> 
  <script type="text/javascript" src="js/dropzone.min.js"></script>
  <script type="text/javascript" src="js/datepicker.min.js"></script>
  <script type="text/javascript" src="js/jquery.raty.js"></script>
  <script type="text/javascript" src="js/ui-bootstrap.js"></script>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="app/angular-cookies.js"></script>
  <script type="text/javascript" src="app/angular-route.js"></script>
  <script type="text/javascript" src="js/jquery-ui.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/ng-map.min.js"></script>
  <script type="text/javascript" src="js/angular-datatables.min.js"></script>
  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/ui-bootstrap-tpls-2.5.0.min.js"></script>
  <script type="text/javascript" src="js/angular-modal-service.min.js"></script>
  <script type="text/javascript" src="js/modal.js"></script>
  <script type="text/javascript" src="js/angular-animate.js"></script>
  <script type="text/javascript" src="js/myMarketLocation.js"></script>
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
  <script type="text/javascript" src="app/image.controller.js"></script>
  <script type="text/javascript" src="app/main_menu.js"></script>
  <script type="text/javascript" src="app/app.js"></script>
  <script type="text/javascript" src="app/product_reviews.controller.js"></script>
  <script type="text/javascript" src="app/language.controller.js"></script>  
  <script type="text/javascript" src="app/currency.controller.js"></script>
  <!--script type="text/javascript" src="app/directives.js"></script-->
  <script type="text/javascript">
      var rootApp = angular.module('rootApp', ['myProductController', 'myMarket', 'myCategoryController', 'myImageController', 'fileUpload', 'myMarketController', 'myMarketUserController', 'myMenu', 'myCustomerController', 'myInventoryOrderController', 'myInvoiceController', 'mySalesController', 'mySupplierController', 'myOaaesController', 'mySadesController', 'myFaoesController', 'myStockProductController', 'myStockQuoteController', 'myMarketIndexController', 'myMessageController', 'myEmployeeController', 'myUserController','myInventoryOrderProductController','myProductReviewController','myLanguageController', 'myCurrencyController']);
    </script>
</head>
<body class="hold-transition sidebar-mini" ng-app="rootApp">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>


      <li class="nav-item d-none d-sm-inline-block" style="font-size: 30px;">
        <a href="./home.php" class="nav-link">Home</a>
      </li>
      <!-- Brand Logo -->
      <a href="home.php" class="brand-link">
      <img src="dist/img/olify-logo.png" alt="Olify Logo" class="brand-image img-circle elevation-3"
           style="opacity: 8.8;margin-left: 15em;">
      <span class="brand-text font-weight-light">Olify Inc</span>
      </a>
    
     

    <!-- Right navbar links ->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu ->
      <li class="nav-item dropdown">
        <a class="nav-link" href="#">
          <i class="fa fa-comments-o"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start ->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End ->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start ->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
         </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../home.php" class="brand-link">
      <img src="dist/img/newmarketifylogo.png" alt="Marketify Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Olify|Marketify</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <a href="#" class="d-block">Moses Masiga<?php// echo $_SESSION["full_name"]; ?></a>
		  <li class="nav-item has-treeview menu-open">
		  <ul class="nav nav-treeview">  
          <li class="nav-item d-none d-sm-inline-block">
            <a href="./profile.php" class="nav-link">
              <p>Profile</p>
            </a>
          </li>
		  </ul>
		  <ul class="nav nav-treeview"> 
		  <li class="nav-item d-none d-sm-inline-block">
            <a href="./logout.php" class="nav-link">
              <p>Logout</p>
            </a>
          </li>
		  </ul>
		  </li>
		  </ul>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
		<li class="nav-item has-treeview">            
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-suitcase"></i>
              <p>
              Business
                <i class="right fa fa-angle-left"></i>
              </p>
			      </a>
          <ul class="nav nav-treeview">  
          <li class="nav-item">
            <a href="./market_user.php" class="nav-link active">
              <i class="fa fa-user nav-icon"></i> 
              <p>Market User</p>
            </a>
          </li>
		      <li class="nav-item">
            <a href="./olify_category.php" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Category</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./olify_commodity.php" class="nav-link">
              <i class="fa fa-product-hunt nav-icon"></i>
              <p>Commodities</p>
            </a>
          </li>
		      <li class="nav-item">
            <a href="./olify_product.php" class="nav-link">
              <i class="fa fa-product-hunt nav-icon"></i>
              <p>Products</p>
            </a>
          </li>
		      <li class="nav-item">
            <a href="./olify_market.php" class="nav-link">
              <i class="fa fa-shopping-bag nav-icon"></i>
              <p>Markets</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./olify_supplier.php" class="nav-link">
              <i class="fa fa-users nav-icon"></i>
              <p>Suppliers</p>
            </a>
          </li>
		      <li class="nav-item">
            <a href="./olify_product_images.php" class="nav-link">
              <i class="fa fa-photo nav-icon"></i>
              <p>Image Uploads</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./olify_product_reviews.php" class="nav-link">
              <i class="fa fa-product-hunt nav-icon"></i>
              <p>Product Reviews</p>
            </a>
          </li>
		  </ul>
		  </li>
          <li class="nav-item has-treeview">
            
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-money"></i>
              <p>
                Transactions
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./olify_invoice.php" class="nav-link active">
                  <i class="fa fa-money nav-icon"></i>
                  <p>Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./olify_sales.php" class="nav-link">
                  <i class="fa fa-money nav-icon"></i>
                  <p>Sales Transactions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./olify_order.php" class="nav-link">
                  <i class="fa fa-shopping-bag nav-icon"></i>
                  <p>Order</p>
                </a>
              </li>
			        <li class="nav-item">
                <a href="./inventory_product_order.php" class="nav-link">
                  <i class="fa fa-shopping-cart nav-icon"></i>
                  <p>Inventory Product Order</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./olify_customer.php" class="nav-link">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Customers</p>
                </a>
              </li>
			        <li class="nav-item">
                <a href="./olify_employee.php" class="nav-link">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Employees</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./olify_languages.php" class="nav-link">
                  <i class="fa fa-language nav-icon"></i>
                  <p>Languages</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./olify_currency.php" class="nav-link">
                  <i class="fa fa-money nav-icon"></i>
                  <p>Currency</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-product-hunt"></i>
              <p>
                Product Stocks
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./olify_stock_product.php" class="nav-link">
                  <i class="fa fa-product-hunt nav-icon"></i>
                  <p>Stock Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./olify_stock_quote.php" class="nav-link">
                  <i class="fa fa-product-hunt nav-icon"></i>
                  <p>Stock Quote</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-product-hunt"></i>
              <p>
                Product History
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./olify_historic.php" class="nav-link">
                  <i class="fa fa-pie-chart nav-icon"></i>
                  <p>Historic</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./olify_historic_index.php" class="nav-link">
                  <i class="fa fa-pie-chart nav-icon"></i>
                  <p>Historic Stock</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./olify_historic_index.php" class="nav-link">
                  <i class="fa fa-pie-chart nav-icon"></i>
                  <p>Historic Index</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./olify_market_index.php" class="nav-link">
                  <i class="fa fa-truck nav-icon"></i>
                  <p>Market Index</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./olify_quote.php" class="nav-link">
                  <i class="fa fa-pie-chart nav-icon"></i>
                  <p>Quote</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Profit and Loss Statement
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./olify_oaaes.php" class="nav-link">
                  <i class="fa fa-money nav-icon"></i>
                  <p>Office & Admin Expenses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./olify_sades.php" class="nav-link">
                  <i class="fa fa-money nav-icon"></i>
                  <p>Selling & Distribution Expenses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./olify_faoes.php" class="nav-link">
                  <i class="fa fa-money nav-icon"></i>
                  <p>Financial & Other Expenses</p>
                </a>
              </li>
            </ul>
          </li>

          <!--li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index2.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Charts
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>ChartJS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Flot</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-tree"></i>
              <p>
                UI Elements
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/UI/general.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>General</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/icons.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Icons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/buttons.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Buttons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/sliders.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Sliders</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                Forms
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>General Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/advanced.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Advanced Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/editors.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Editors</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Tables
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Simple Tables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Data Tables</p>
                </a>
              </li>
            </ul>
          </li>
          <!--li class="nav-header">EXAMPLES</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon fa fa-calendar"></i>
              <p>
                Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-envelope-o"></i>
              <p>
                Mailbox
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/mailbox/mailbox.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Pages
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/invoice.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/profile.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/login.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Login</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/register.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Register</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Lockscreen</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-plus-square-o"></i>
              <p>
                Extras
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/404.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Error 404</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/500.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Error 500</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/blank.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Blank Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="starter.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Starter Page</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs" class="nav-link">
              <i class="nav-icon fa fa-file"></i>
              <p>Documentation</p>
            </a>
          </li>
          <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-circle-o text-danger"></i>
              <p class="text">Important</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-circle-o text-warning"></i>
              <p>Warning</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-circle-o text-info"></i>
              <p>Informational</p>
            </a>
          </li-->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</div><!-- /.content-wrapper -->

<script type="text/javascript">
    $('ul.nav li.dropdown').hover(function() {
  	  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});
</script>

    