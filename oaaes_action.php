<?php
    //error_reporting(0);
    $conn = new PDO("mysql:host=localhost;dbname=EPriceStreetMarket", "root", "olify"); 
	session_start();
    $_POST = json_decode(file_get_contents('php://input'), true);
	
	if(!empty($_POST['revenue']))
    {
       $query ="
	   INSERT INTO olify_oaaes (market_id,revenue,salaries,rent_rate_tax,unit,purchases,unit_mode,post_telgrm,elec_charges,water_bills,telphone_charges,print_stationery,from_date,to_date) 
	   VALUES(:market_id,:revenue,:salaries,:rent_rate_tax,:unit,:purchases,:unit_mode,:post_telgrm,:elec_charges,:water_bills,:telphone_charges,:print_stationery,:from_date,:to_date)"; 
	   
	   $ins_query=$conn->prepare($query);
	   $date = date('Y-m-d H:i:s');
	   
	   $ins_query->bindParam(':market_id', $_POST['market_id']);
       $ins_query->bindParam(':revenue', $_POST['revenue']);
	   $ins_query->bindParam(':salaries', $_POST['salaries']);
       $ins_query->bindParam(':rent_rate_tax', $_POST['rent_rate_tax']);
       $ins_query->bindParam(':unit', $_POST['unit']);
	   $ins_query->bindParam(':purchases', $_POST['purchases']);
	   $ins_query->bindParam(':unit_mode', $_POST['unit_mode']);
	   $ins_query->bindParam(':post_telgrm', $_POST['post_telgrm']);
	   $ins_query->bindParam(':elec_charges', $_POST['elec_charges']);
	   $ins_query->bindParam(':water_bills', $_POST['water_bills']);
	   $ins_query->bindParam(':telphone_charges', $_POST['telphone_charges']);
	   $ins_query->bindParam(':print_stationery', $_POST['print_stationery']);
	   $ins_query->bindParam(':from_date', $date, PDO::PARAM_STR);
	   $ins_query->bindParam(':to_date', $date, PDO::PARAM_STR);
	    
       $ins_query->execute();
    
    $result = json_encode($ins_query->fetchAll());
	if (isset($result)) {
		echo "Profit & Loss Statement Added";
	}
	}
?> 
