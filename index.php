<?php
	require_once './database_connection.php';
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
<!--link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css"-->
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
<link href="images/logo.png" rel="icon" size="32x32">
<style type="text/css">
	/* Separators Styles */
.ss-style-top::before {
    left:0;
    width:100%;
    height:30px;
    -webkit-background-size:25px 100%;
    -moz-background-size:25px 100%;
    -o-background-size:25px 100%;
    background-size:25px 100%;
    top:0;
    background-image:linear-gradient(315deg,#FFF 50%,transparent 50%),linear-gradient(45deg,#FFF 50%,transparent 50%);
    margin-top:-30px;
    z-index:100;
}
.ss-style-bottom::before {
    left:0;
    width:100%;
    height:30px;
    -webkit-background-size:25px 100%;
    -moz-background-size:25px 100%;
    -o-background-size:25px 100%;
    background-size:25px 100%;
    top:0;
    background-image:linear-gradient(583deg,#FFF 50%,transparent 50%),linear-gradient(136deg,#FFF 50%,transparent 50%);
    margin-top:0px;
    z-index: 100;
}
.home_heading
{
	font-family: 'Beyond', sans-serif;
	font-size: 50px;text-align: center;
	color: #00FFCC;margin-top: -12%;
	height: 99px;
	line-height: 99px;
	padding-left: 31px;
	padding-right: 19px;
	white-space: nowrap;
}
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
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"  href="#">Markets n Prices<span class="caret"></span></a>
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
				<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"  href="#">Markets n Prices<span class="caret"></span></a>
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

	<!-- Home -->
	
		
	<div class="home"><!--div class="home_heading">Discover agricultural products accross different markets</div>
		<!-- Home Slider -->

		<div class="home_slider_container parallax parallax2">
			<div class="owl-carousel owl-theme home_slider">
				<section class="ss-style-top"></section>
				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/organic-439784905.jpg)"></div>
					<div class="home_slider_content">
						<div class="home_slider_content_inner">
							<div class="home_slider_subtitle">Organic Vegetables</div>
							<div class="home_slider_title">Explore Olify | Marketify</div>
						</div>	
					</div>
				</div>

				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/organic-607337888.jpg)"></div>
					<div class="home_slider_content">
						<div class="home_slider_content_inner">
							<div class="home_slider_subtitle">Organic Food</div>
							<div class="home_slider_title">Explore Olify | Marketify</div>
						</div>	
					</div>
				</div>

				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/organic-267884735.jpg)"></div>
					<div class="home_slider_content">
						<div class="home_slider_content_inner">
							<div class="home_slider_subtitle">Plantation Agric</div>
							<div class="home_slider_title">Explore Olify | Marketify</div>
						</div>	
					</div>
				</div>
				
				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/gnuts.jpg)"></div>
					<div class="home_slider_content">
						<div class="home_slider_content_inner">
							<div class="home_slider_subtitle">Pea nuts</div>
							<div class="home_slider_title">Explore Olify | Marketify</div>
						</div>	
					</div>
				</div>
				
				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/food-706892146.jpg)"></div>
					<div class="home_slider_content">
						<div class="home_slider_content_inner">
							<div class="home_slider_subtitle">Vegetables</div>
							<div class="home_slider_title">Explore Olify | Marketify</div>
						</div>	
					</div>
				</div>
				
				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/greengrocery-with-fresh-fruits-and-vegetables-518615659.jpg)"></div>
					<div class="home_slider_content">
						<div class="home_slider_content_inner">
							<div class="home_slider_subtitle">Green Grocery with Fresh Fruits and Vegetables</div>
							<div class="home_slider_title">Explore Olify | Marketify</div>
						</div>	
					</div>
				</div>

				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/agriv.png)"></div>
					<div class="home_slider_content">
						<div class="home_slider_content_inner">
							<div class="home_slider_subtitle">Farm with Agricultural Products</div>
							<div class="home_slider_title">Explore Olify | Marketify</div>
						</div>	
					</div>
				</div>

				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/irrigation.jpg)"></div>
					<div class="home_slider_content">
						<div class="home_slider_content_inner">
							<div class="home_slider_subtitle">Irrigation Systems</div>
							<div class="home_slider_title">Explore Olify | Marketify</div>
						</div>	
					</div>
				</div>

				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/local-farmers-traditional-way-of-selling-131696534.jpg)"></div>
					<div class="home_slider_content">
						<div class="home_slider_content_inner">
							<div class="home_slider_subtitle">Fresh Organic Maize at the Local Farmers Market</div>
							<div class="home_slider_title">Explore Olify | Marketify</div>
						</div>	
					</div>
				</div>

				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/fresh-red-agricultural-products-172390583.jpg)"></div>
					<div class="home_slider_content">
						<div class="home_slider_content_inner">
							<div class="home_slider_subtitle">Fresh Red Agricultural Products</div>
							<div class="home_slider_title">Explore Olify | Marketify</div>
						</div>	
					</div>
				</div>

				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/hydroponic-farm-75902770.jpg)"></div>
					<div class="home_slider_content">
						<div class="home_slider_content_inner">
							<div class="home_slider_subtitle">Hydroponic Farm</div>
							<div class="home_slider_title">Explore Olify | Marketify</div>
						</div>	
					</div>
				</div>

				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/bread-on-a-table-recently-made-1031326474.jpg)"></div>
					<div class="home_slider_content">
						<div class="home_slider_content_inner">
							<div class="home_slider_subtitle">Bread on a Table</div>
							<div class="home_slider_title">Explore Olify | Marketify</div>
						</div>	
					</div>
				</div>

				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/fresh-raw-chicken-eggs-524071906.jpg)"></div>
					<div class="home_slider_content">
						<div class="home_slider_content_inner">
							<div class="home_slider_subtitle">Fresh Raw Chicken Eggs</div>
							<div class="home_slider_title">Explore Olify | Marketify</div>
						</div>	
					</div>
				</div>

				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/balanced-diet-507158953.jpg)"></div>
					<div class="home_slider_content">
						<div class="home_slider_content_inner">
							<div class="home_slider_subtitle">Balanced Diet</div>
							<div class="home_slider_title">Explore Olify | Marketify</div>
						</div>	
					</div>
				</div>
				<section class="ss-style-bottom"></section>
			</div>
						
			<!-- Home Slider Nav -->

			<div class="home_slider_next d-flex flex-column align-items-center justify-content-center"><img src="images/arrow_r.png" alt=""></div>

			<!-- Home Slider Dots -->

			<div class="home_slider_dots_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_slider_dots">
								<ul id="home_slider_custom_dots" class="home_slider_custom_dots">
									<li class="home_slider_custom_dot">01.<div></div></li>
									<li class="home_slider_custom_dot">02.<div></div></li>
									<li class="home_slider_custom_dot">03.<div></div></li>
									<li class="home_slider_custom_dot">04.<div></div></li>
									<li class="home_slider_custom_dot">05.<div></div></li>
									<li class="home_slider_custom_dot">06.<div></div></li>
									<li class="home_slider_custom_dot">07.<div></div></li>
									<li class="home_slider_custom_dot">08.<div></div></li>
									<li class="home_slider_custom_dot">09.<div></div></li>
									<li class="home_slider_custom_dot">10.<div></div></li>
									<li class="home_slider_custom_dot">11.<div></div></li>
									<li class="home_slider_custom_dot">12.<div></div></li>
									<li class="home_slider_custom_dot">13.<div></div></li>
									<li class="home_slider_custom_dot">14.<div></div></li>
									<li class="home_slider_custom_dot">15.<div></div></li>
								
								</ul>
							</div>
						</div>
					</div>
				</div>		
			</div>
		</div>
	</div>
							
			
	<div class="promo">
	 <div class="container" style="margin-left: 2.2em;margin-top:-10em;">
  <!-- First row -->
  <div class="row">
	<div class="col">
					<div class="section_title_container text-center">
						<div class="section_subtitle">only the best </div>
						<div class="section_title">Market product prices</div>
					</div>
				</div>
    <legend class="card-title"></legend>
    <?php
    	$sql = "SELECT `code`, `product_name`, `price`, `market_name`, `category_name`, `country`
    			FROM `olify_product`
				INNER JOIN olify_markets ON olify_markets.`product_code` = olify_product.`code`
				INNER JOIN olify_category ON olify_category.`category_id` = olify_product.`category_id`
 				WHERE 1";
      	try {
        	$stmt = $conn->prepare($sql);
       		$stmt->execute();
        	$products = $stmt->fetchAll();
      		} catch (Exception $ex) {
       		 echo $ex->getMessage();
      }

      // fetching ratings for specific product
      $ratings_sql = "SELECT count(*) as count, AVG(rating) as score FROM `olify_product_reviews` 
      				  WHERE 1 AND product_code = :code";
      $stmt2 = $conn->prepare($ratings_sql);

      for ($i = 0; $i < count($products); $i++) {

        try {
          		$stmt2->bindValue(":code", $products[$i]["product_code"]);
          		$stmt2->execute();
          		$product_rating = $stmt2->fetchAll();
        } catch (Exception $ex) {
          // you can turn it off in production mode.
          echo $ex->getMessage();
        }

        // fetching number of clients watching a product
        $watching_sql = "SELECT count(*) as watchers FROM `olify_market_user` WHERE user_id = :user_id";
        $stmt3 = $conn->prepare($watching_sql);
        for ($i=0; $i <count($products); $i++) { 
        	try{
        		$stmt3->bindValue("code", $products[$i]["product_code"]);
        		$stmt3->execute();
        		$product_watching = $stmt3->fetchAll();
        	} catch (Exception $ex){

        	}
        

    ?>
    <div class="col-xs-12 col-md-6 col-lg-3">
      <div class="card">
      	<a href="olify_product.php?code=<?php echo $products[$i]["code"] ?>">
      		<img class="card-img-top img-responsive" src="images/02.jpg" alt="Deer in nature"  style="width: 100%;margin-left: 0.1em;margin-top: -.1em;"/>
      		<!--<?php 
      		 //Get images from the database
      		$query = mysqli_query($con, "SELECT image FROM olify_product_images WHERE user_id = '$user_id' ORDER BY created_date DESC");
      		if ($row = mysqli_fetch_array($query)) {
      			$imageURL = 'uploads/'.$row['image'];?>
      			<img class="card-img-top img-responsive" src="<?php echo $imageURL; ?> images/02.jpg" alt="Deer in nature"  style="width: 100%;margin-left: 0.1em;margin-top: -.1em;"/>
      			<?php
      		} else {
      			?>
      			<p>No image(s) found ...</p>
      			<?php
      		}
      		?>-->
        
    	</a>
        <div class="card-block">
          <h4 class="card-title"><span style="color: #FFA500;font-size: 1.5em;font-family: 'Beyond', Calibri;"><?php echo $products[$i]["category_name"]?></span></h4>
          <p class="card-text">Market selling vegetables of carrots, onions, egg plant, green paper, cucumber etc ready for consumption..</p>
          <div class="card-footer">
        <small class="text-muted"><span style="color: #00FFCC;font-size: 1.5em;font-family: 'Beyond', sans-serif;"><?php echo $products[$i]["product_name"]?></span> - <span style="color: #FF0000;font-size: 1em;">Ugx&nbsp;<?php echo $products[$i]["price"]?></span><br>
        <span style="color: #00CCFF;font-size: 1em;"><?php echo $products[$i]["market_name"]?></span> - &nbsp;<span style="color: #32CD32;font-size: 1em;text-transform: uppercase;"><?php echo $products[$i]["country"]?></span>
        	<br>
        <?php
                if ($product_rating[0]["count"] > 0) {
                  echo "Average rating <strong>" . round($product_rating[0]["score"], 2) . "</strong> based on <strong>" . $product_rating[0]["count"] . "</strong> users";
                } else {
                  echo 'No ratings for this product';
                }
                ?>
                <br>
         <?php
                if ($product_watching[0]["watchers"] > 0) {
                  echo "<span style=color:#FF0000;>" . $product_watching[0]["watchers"] . "watching</span> ";
                } else {
                  echo 'None';
                }
                ?>
         </small>
      </div>
        </div>
      </div><!-- .end Card -->
    </div>
    <?php } ?>
    <?php } ?> 
	</div>
	</div>
	</div>
	<!-- New Arrivals ->

	<div class="arrivals">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<div class="section_subtitle">only the best</div>
						<div class="section_title">new products</div>
					</div>
				</div>
			</div>
			<div class="row products_container">

				<!-- Product ->
				<div class="col-lg-4 product_col">
					<div class="product">
						<div class="product_image">
							<img src="images/mangoes.jpg" alt="">
						</div>	
						<div class="rating rating_4">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
						<div class="product_content clearfix">
							<div class="product_info">
								<div class="product_name"><a href="olify_product.php">We've got what you need! </a></div>
								<div class="product_price">$45.00</div>
							</div>
							<div class="product_options">
								<div class="product_buy product_option"><img src="images/shopping-bag-white.svg" alt=""></div>
								<div class="product_fav product_option">+</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Product ->
				<div class="col-lg-4 product_col">
					<div class="product">
						<div class="product_image">
							<img src="images/bread.jpg" alt="">
						</div>
						<div class="rating rating_4">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
						<div class="product_content clearfix">
							<div class="product_info">
								<div class="product_name"><a href="olify_product.php">Free Commodity Preview</a></div>
								<div class="product_price">$35.00</div>
							</div>
							<div class="product_options">
								<div class="product_buy product_option"><img src="images/shopping-bag-white.svg" alt=""></div>
								<div class="product_fav product_option">+</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Product ->
				<div class="col-lg-4 product_col">
					<div class="product">
						<div class="product_image">
							<img src="images/chick.jpg" alt="">
						</div>
						<div class="rating rating_4">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
						<div class="product_content clearfix">
							<div class="product_info">
								<div class="product_name"><a href="olify_product.php">Black Agricultural Markets</a></div>
								<div class="product_price">$145.00</div>
							</div>
							<div class="product_options">
								<div class="product_buy product_option"><img src="images/shopping-bag-white.svg" alt=""></div>
								<div class="product_fav product_option">+</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div-->

	<!-- Extra -->

	<div class="extra clearfix">
		<section class="ss-style-bottom"></section>
		<div class="extra_promo extra_promo_1">
			<div class="extra_promo_image" style="background-image:url(images/extra_1.jpg)"></div>
			<div class="extra_1_content d-flex flex-column align-items-center justify-content-center text-center">
				<div class="extra_1_price">30%<span>off</span></div>
				<div class="extra_1_title">On all agricultural products</div>
				<div class="extra_1_text">*Find Agricultural Commodities & Prices on Olify's Marketify.</div>
				<div class="button extra_1_button"><a href="checkout.html">check out</a></div>
			</div>
		</div>
		<div class="extra_promo extra_promo_2">
			<div class="extra_promo_image" style="background-image:url(images/maize.jpg)"></div>
			<div class="extra_2_content d-flex flex-column align-items-center justify-content-center text-center">
				<div class="extra_2_title">
					<div class="extra_2_center">&</div>
					<div class="extra_2_top">Olify</div>
					<div class="extra_2_bottom">Marketify</div>
				</div>
				<div class="extra_2_text">*Discover agricultural products accross different markets</div>
				<div class="button extra_2_button"><a href="checkout.html">check out</a></div>
			</div>
		</div>
		<section class="ss-style-top"></section>
	</div>

	<!-- Gallery -->

	<div class="gallery">
		<div class="gallery_image" style="background-image:url(images/agriv.jpg)"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="gallery_title text-center">
						<ul>
							<li><a href="#">#olify</a></li>
							<li><a href="#">#olifyinstagram</a></li>
							<li><a href="#">#olifymarkets</a></li>
						</ul>
					</div>
					<div class="gallery_text text-center">*Welcome to Olify's Marketify, The Agricultural Platform*.</div>
					<div class="button gallery_button"><a href="#">submit</a></div>
				</div>
			</div>
		</div>	
		<div class="gallery_slider_container">
			
			<!-- Gallery Slider -->
			<div class="owl-carousel owl-theme gallery_slider">
				
				<!-- Gallery Item -->
				<div class="owl-item gallery_item">
					<a class="colorbox" href="images/1.jpg">
						<img src="images/1.jpg" alt="">
					</a>
				</div>
				
				<!-- Gallery Item -->
				<div class="owl-item gallery_item">
					<a class="colorbox" href="images/carrots.jpg">
						<img src="images/carrots.jpg" alt="">
					</a>
				</div>

				<!-- Gallery Item -->
				<div class="owl-item gallery_item">
					<a class="colorbox" href="images/02.jpg">
						<img src="images/02.jpg" alt="">
					</a>
				</div>

				<!-- Gallery Item -->
				<div class="owl-item gallery_item">
					<a class="colorbox" href="images/03.jpg">
						<img src="images/03.jpg" alt="">
					</a>
				</div>

				<!-- Gallery Item -->
				<div class="owl-item gallery_item">
					<a class="colorbox" href="images/04.jpg">
						<img src="images/04.jpg" alt="">
					</a>
				</div>

				<!-- Gallery Item -->
				<div class="owl-item gallery_item">
					<a class="colorbox" href="images/05.jpg">
						<img src="images/05.jpg" alt="">
					</a>
				</div>

				<!-- Gallery Item -->
				<div class="owl-item gallery_item">
					<a class="colorbox" href="images/08.jpg">
						<img src="images/08.jpg" alt="">
					</a>
				</div>
				
				<!-- Gallery Item -->
				<div class="owl-item gallery_item">
					<a class="colorbox" href="images/09.jpg">
						<img src="images/09.jpg" alt="">
					</a>
				</div>
				
				<!-- Gallery Item -->
				<div class="owl-item gallery_item">
					<a class="colorbox" href="images/10.jpg">
						<img src="images/10.jpg" alt="">
					</a>
				</div>
				
				<!-- Gallery Item -->
				<div class="owl-item gallery_item">
					<a class="colorbox" href="images/11.jpg">
						<img src="images/11.jpg" alt="">
					</a>
				</div>
				
				<!-- Gallery Item -->
				<div class="owl-item gallery_item">
					<a class="colorbox" href="images/12.jpg">
						<img src="images/12.jpg" alt="">
					</a>
				</div>
				
				<!-- Gallery Item -->
				<div class="owl-item gallery_item">
					<a class="colorbox" href="images/13.jpg">
						<img src="images/13.jpg" alt="">
					</a>
				</div>
				
				<!-- Gallery Item -->
				<div class="owl-item gallery_item">
					<a class="colorbox" href="images/14.jpg">
						<img src="images/14.jpg" alt="">
					</a>
				</div>
				
				<!-- Gallery Item -->
				<div class="owl-item gallery_item">
					<a class="colorbox" href="images/15.jpg">
						<img src="images/15.jpg" alt="">
					</a>
				</div>
				
				<!-- Gallery Item -->
				<div class="owl-item gallery_item">
					<a class="colorbox" href="images/16.jpg">
						<img src="images/16.jpg" alt="">
					</a>
				</div>
				
				<!-- Gallery Item -->
				<div class="owl-item gallery_item">
					<a class="colorbox" href="images/tomatoes.jpg">
						<img src="images/tomatoes.jpg" alt="">
					</a>
				</div>
				
				<!-- Gallery Item -->
				<div class="owl-item gallery_item">
					<a class="colorbox" href="images/mangoes.jpg">
						<img src="images/mangoes.jpg" alt="">
					</a>
				</div>
				
				<!-- Gallery Item -->
				<div class="owl-item gallery_item">
					<a class="colorbox" href="images/oranges.jpg">
						<img src="images/oranges.jpg" alt="">
					</a>
				</div>
				
				<!-- Gallery Item -->
				<div class="owl-item gallery_item">
					<a class="colorbox" href="images/soya.jpg">
						<img src="images/soya.jpg" alt="">
					</a>
				</div>
				
				<!-- Gallery Item -->
				<div class="owl-item gallery_item">
					<a class="colorbox" href="images/simsim.jpg">
						<img src="images/simsim.jpg" alt="">
					</a>
				</div>
				
				<!-- Gallery Item -->
				<div class="owl-item gallery_item">
					<a class="colorbox" href="images/oranje.jpg">
						<img src="images/oranje.jpg" alt="">
					</a>
				</div>
			</div>
		</div>	
	</div>

	<!-- Testimonials -->

	<div class="testimonials">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<div class="section_subtitle">only the best</div>
						<div class="section_title">testimonials</div>
					</div>
				</div>
			</div>
			<div class="row test_slider_container">
				<div class="col">

					<!-- Testimonials Slider -->
					<div class="owl-carousel owl-theme test_slider text-center">

						<!-- Testimonial Item -->
						<div class="owl-item">
							<div class="test_text">“Integer ut imperdiet erat. Quisque ultricies lectus tellus, eu tristique magna pharetra nec. Fusce vel lorem libero. Integer ex mi, facilisis sed nisi ut, vestibulum ultrices nulla. Aliquam egestas tempor leo.”</div>
							<div class="test_content">
								<div class="test_image"><img src="images/testimonials.jpg" alt=""></div>
								<div class="test_name">Bangi Martin</div>
								<div class="test_title">client</div>
							</div>
						</div>

						<!-- Testimonial Item -->
						<div class="owl-item">
							<div class="test_text">“Integer ut imperdiet erat. Quisque ultricies lectus tellus, eu tristique magna pharetra nec. Fusce vel lorem libero. Integer ex mi, facilisis sed nisi ut, vestibulum ultrices nulla. Aliquam egestas tempor leo.”</div>
							<div class="test_content">
								<div class="test_image"><img src="images/testimonials.jpg" alt=""></div>
								<div class="test_name">Amujal deborah</div>
								<div class="test_title">client</div>
							</div>
						</div>

						<!-- Testimonial Item -->
						<div class="owl-item">
							<div class="test_text">“Integer ut imperdiet erat. Quisque ultricies lectus tellus, eu tristique magna pharetra nec. Fusce vel lorem libero. Integer ex mi, facilisis sed nisi ut, vestibulum ultrices nulla. Aliquam egestas tempor leo.”</div>
							<div class="test_content">
								<div class="test_image"><img src="images/testimonials.jpg" alt=""></div>
								<div class="test_name">Bashir Olupot</div>
								<div class="test_title">client</div>
							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<section class="ss-style-top"></section>
		<div class="newsletter_content">
			<div class="newsletter_image" style="background-image:url(images/balanced-diet-604113980.jpg)"></div>
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="section_title_container text-center">
							<div class="section_subtitle">only the best</div>
							<div class="section_title">subscribe for a 20% discount</div>
						</div>
					</div>
				</div>
				<div class="row newsletter_container">
					<div class="col-lg-10 offset-lg-1">
						<div class="newsletter_form_container">
							<form action="#">
								<input type="email" class="newsletter_input" required="required" placeholder="E-mail here">
								<button type="submit" class="newsletter_button">subscribe</button>
							</form>
						</div>
						<div class="newsletter_text">Integer ut imperdiet erat. Quisque ultricies lectus tellus, eu tristique magna pharetra nec. Fusce vel lorem libero. Integer ex mi, facilisis sed nisi ut, vestib ulum ultrices nulla. Aliquam egestas tempor leo.</div>
					</div>
				</div>
			</div>
		</div>
		<section class="ss-style-bottom"></section>
	</div>
       
	<!-- Footer -->

	<footer class="footer" id="footer" class="dark-wrapper">
		<section class="ss-style-top"></section>
		<div class="container inner">
			<div class="row">
				<div class="col text-center">
					<div class="footer_logo"><a href="#"><img src="images/olify-logo.png" style="width:150px;height:75px;">&emsp;Marketify</a></div>
					<nav class="footer_nav">
						<ul>
							<li><a href="index.php">home</a></li>
							<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"  href="#">Markets n Prices<span class="caret"></span></a>
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
						<ul class="social-bar">
							<li><a href="#" title="olify on pinterest"><i class="fa fa-pinterest tooltipped" aria-hidden="true"></i></a></li>
							<li><a href="#" title="olify on linkedin"><i class="fa fa-linkedin tooltipped" aria-hidden="true"></i></a></li>
							<li><a href="#" title="olify on instagram"><i class="fa fa-instagram tooltipped" aria-hidden="true"></i></a></li>
							<li><a href="#" title="olify on facebook"><i class="fa fa-facebook tooltipped" aria-hidden="true"></i></a></li>
							<li><a href="#" title="olify on twitter"><i class="fa fa-twitter tooltipped" aria-hidden="true"></i></a></li>
							<li><a href="#" title="olify on youtube"><i class="fa fa-youtube-square tooltipped" aria-hidden="true"></i></a></li>
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