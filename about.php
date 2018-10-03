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
<style type="text/css">
    	a {
 -webkit-transition: .25s all;
 transition: .25s all;
}
.card {
  padding-left:auto;
  padding-right:auto;
  min-height:200px;
  margin-top:15em;
  width:65em;
  margin-left:-22.5em;
 box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
 -webkit-transition: .25s box-shadow;
 transition: .25s box-shadow;
}
.card:focus, .card:hover {
 box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
}
.card-inverse .card-img-overlay {
 background-color: rgba(51, 51, 51, 0.85);
 border-color: rgba(51, 51, 51, 0.85);
}
.card-img-top{
  margin-top:10px;height: 10em;
}
.col-xs-12{
  text-align:center;
  margin-left:auto;
  margin-right:auto;
}
.row{
  margin-left:auto;
  margin-right:auto;
}
h1, h3, h4, h6{color: #FFA500;text-align: left;font-family: Monotype Corsiva;}
.card-block .card-text{text-align: justify;font-family: Trebuchet MS;}
.card-block ul li{text-align: justify;font-family: Trebuchet MS;}
.card-block .card-title{text-align: center;}
</style>

</head>
<body>

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

<div class="container">
  <!-- First row -->
  <div class="row">
    <div class="col-xs-12 col-md-6 col-lg-3">
      <div class="card">
      <img class="card-img-top" src="images/olify-logo.png" alt="Card image cap" style="width: 25%;margin-left: 8.5em;">
      <div class="card-block">
        <h4 class="section_title" style="text-align:center;">Olify | Marketify.</h4>
        <p class="card-text" style="font-family: 'Lucida', serif;">Marketify is a Ugandan subsidiary under Olify Inc which operates an online marketplace for agricultural products and services for people to easily sell online, at a retail location, create their own agricultural markets, commodities, product categories, stock products, sales, transactions etc. The price fluctuation in agriculture products has increased over years. This has brought negative impact on producer's economic stability and income. The E-Price Street Market Management Information System or app is help farmers and agri-business managers to deal with price volatility.It utilizes the internet, cloud computing, and smart phone devices. The app releases agricultural products prices provided by a collaborated source from government agencies, agricultural producers, agri-business consumers etc. The app service provides the price Information service in different trading processes such as: Production, Logistics, Retail, Agricultural materials, Price analysis etc. The price Information comes from different sources including government agencies, communities, enterprises, Business units, and individual consumers. The farmers can easily search for market locations, specify their requirements as well as compare pricing and choose their affordable price range.
         </p>
      </div>
      <div class="card-footer">
        <small class="text-muted">Last updated 3 mins ago</small>
      </div>
    </div>
    </div>
</div>
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
Copyright &copy;<script>document.write(new Date().getFullYear());</script>&nbsp;Olify Inc, All rights reserved <i class="fa fa-heart-o" aria-hidden="true"></i> 
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

