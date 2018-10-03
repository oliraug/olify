<?php
    //error_reporting(0);
    $conn = new PDO("mysql:host=localhost;dbname=EPriceStreetMarket", "root", "olify"); 
	session_start();
    $_POST = json_decode(file_get_contents('php://input'), true);
	
	if(!empty($_POST['market_id']))
    {
       $query ="
	   INSERT INTO olify_faoes (market_id,depreciation, repairs, audit_fee, interest_paid, commission_paid, bank_charges, legal_charges, net_profit,from_date,to_date)
	   VALUES(:market_id,:depreciation, :repairs, :audit_fee, :interest_paid, :commission_paid, :bank_charges, :legal_charges, :net_profit,:from_date,:to_date)";
	   
	   $ins_query=$conn->prepare($query);
	   $date = date('Y-m-d H:i:s');
      
	   $ins_query->bindParam(':market_id', $_POST['market_id']);
	   $ins_query->bindParam(':depreciation', $_POST['depreciation']);
	   $ins_query->bindParam(':repairs', $_POST['repairs']);
	   $ins_query->bindParam(':audit_fee', $_POST['audit_fee']);
	   $ins_query->bindParam(':interest_paid', $_POST['interest_paid']);
	   $ins_query->bindParam(':commission_paid', $_POST['commission_paid']);
	   $ins_query->bindParam(':bank_charges', $_POST['bank_charges']);
	   $ins_query->bindParam(':legal_charges', $_POST['legal_charges']);
	   $ins_query->bindParam(':net_profit', $_POST['net_profit']);
	   $ins_query->bindParam(':from_date', $date, PDO::PARAM_STR);
	   $ins_query->bindParam(':to_date', $date, PDO::PARAM_STR);
	    
       $ins_query->execute();
    
    $result = json_encode($ins_query->fetchAll());
	if (isset($result)) {
		echo "Profit & Loss Statement Added";
	}
	}
?> 
