<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, scalable=no">
    <meta name="description" content="ePrice, Marketify, Olify">
    <meta name="author" content="Moses Masiga">

    <title>ePrice | Marketify</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Bootstrap core CSS ->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"-->
    <link href="dist/img/newmarketifylogo.png" rel="icon" size="32x32">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dist/css/creative.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/angular.js"></script>
    <script type="text/javascript" src="app/angular-cookies.js"></script>
    <script type="text/javascript" src="app/angular-route.js"></script>
    <script type="text/javascript" src="app/users.controller.js"></script>
    
  <style type="text/css">
    .navbar-nav{margin-left: 15em;margin-top: 0em;}
    .slogan{margin-top: 1.5em;font-family: chiller;font-size: 24px;color: #FFF;}
  </style>
  </head>
  <body id="page-top" ng-app="myUserController">
    <div class="container" style="background: #FFA500;width: 100%;margin-top:-3em;">
      <div class="navbar-brand" id="logo" title="Marketify"><img class="img-responsive" id="Logo"/></div>
        <p class="slogan">Exposing Farmers to Markets</p>
   </div>
    <nav class="navbar navbar-default" style="background: #6d6;">
        <div class="container-fluid">
          <div class="navbar-header">
      <!--a class="navbar-brand" href="#">WebSiteName</a-->
      <div class="container">
             
                 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>                        
                  </button>
              </div>
              <div class="collapse navbar-collapse" id="myNavbar">
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Markets and Prices<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="nav-header"><a href="/indices">Indices</a></li>
                          <li class="nav-header"><a href="/indices-KAMPALA"><i class="fa fa-table fa-fw"></i> <span>Indices by markets</span></a></li>
                          <li class="divider"></li>
                          <li class="nav-header"><a href="/stocks">Stocks</a></li>
                        </ul>
                    </li>
      
      <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#community" title="Communities" data-toggle="popover" data-placement="bottom"  data-content="">Community</a>
            </li>
     <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#sources" title="Sources" data-toggle="popover" data-placement="bottom"  data-content="">Sources</a>
            </li>
      <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="agriculture_news.php" title="Agriculture News" data-toggle="popover" data-placement="bottom" data-content="">Agriculture News</a>
            </li>
      <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="products.php" title="Products" data-toggle="popover" data-placement="bottom"  data-content="Market Products include; Sugar, Rice, Beans, Posho, Cassava Flour, Soya Beans, Kaawo, Matooke, Passion Fruits, Mangoes, Oranges, Maize, Tomatoes, Garlic, Onions, Carrots, WaterMellons, Paw paw, Pine-apples, Apples, Pumpkins, Ovacado, Green Paper, Ground Nuts, Yellow Bananas, Sweet Bananas, Sweet Potatoes, Irish Potatoes, Meat(Beef), Goat's Meat, Chicken(local), Chicken(Exotic), Fish(fresh), Fish(Smoked), Pork, Turkeys, Ducks(local), Ducks(Exotic), all kinds of agricultural seeds, pesticides, agricultural equipments/machinery, fertilizers">Products</a>
            </li>
      <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="about.php" title="About Marketify" data-toggle="popover" data-placement="bottom" data-content="Marketify is a Ugandan subsidiary under Olira company which operates an online marketplace and agriculture service for people to create their own agricultural markets, commodities, product categories, stock products, transactions etc. The price fluctuation in agriculture products has increased over years. This has brought negative impact on producer's economic stability and income. The E-Price Street Market Management Information System or app is help farmers and agri-business managers to deal with price volatility.It utilizes the internet, cloud computing, and smart phone devices. The app releases agricultural products prices provided by a collaborated source from government agencies, agricultural producers, agri-business consumers etc. The app service provides the price Information service in different trading processes such as: Production, Logistics, Retail, Agricultural materials, Price analysis etc. The price Information comes from different sources including government agencies, communities, enterprises, Business units, and individual consumers. The farmers can easily search for market locations, specify their requirements as well as compare pricing and choose their affordable price range.">About</a>
              </li>
      <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="signup.php">Sign Up</a></li>
      <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="login.php"><span class="glyphicon glyphicon-log-in"></span>Log In</a>
        </li>
    </ul>
  </div>
  </div>
</div>
</nav>

<!--
<div ng-app>
  <div ng-controller="ClickToEditCtrl">
    <div ng-hide="editorEnabled">
      {{title}}
      <a href="#" ng-click="enableEditor()">Edit title</a>
    </div>
    <div ng-show="editorEnabled">
      <input ng-model="editableTitle" ng-show="editorEnabled">
      <a href="#" ng-click="save()">Save</a>
      or
      <a href="#" ng-click="disableEditor()">cancel</a>.
    </div>
  </div>
</div>

function ClickToEditCtrl($scope) {
  $scope.title = "Welcome to this demo!";
  $scope.editorEnabled = false;
  
  $scope.enableEditor = function() {
    $scope.editorEnabled = true;
    $scope.editableTitle = $scope.title;
  };
  
  $scope.disableEditor = function() {
    $scope.editorEnabled = false;
  };
  
  $scope.save = function() {
    $scope.title = $scope.editableTitle;
    $scope.disableEditor();
  };
}

-->