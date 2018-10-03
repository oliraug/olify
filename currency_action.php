<?php
    //error_reporting(0);
    $conn = new PDO("mysql:host=localhost;dbname=EPriceStreetMarket", "root", "olify"); 
	session_start();
    $_POST = json_decode(file_get_contents('php://input'), true);
	
	
	if(!empty($_POST['currency_name']))
    {
       $query ="
	   INSERT INTO olify_currency (currency_name, created, currency_status)
	   VALUES(:currency_name, :created, :currency_status)";
	  
	   $ins_query=$conn->prepare($query);
	  
	   $date = date('Y-m-d H:i:s');
	   $ins_query->bindParam(':currency_name', $_POST['currency_name']);
	   //$ins_query->bindParam(':icon_image', $_POST['icon_image']);
	   $ins_query->bindParam(':created', $date, PDO::PARAM_STR);
	   $ins_query->bindParam(':currency_status', $_POST['currency_status']);
	   
       $ins_query->execute();
    
	$result = $ins_query->fetchAll();
	if (isset($result)) {
		echo "Currency Added";
	}
}
?> 