<?php
    //error_reporting(0);
    $conn = new PDO("mysql:host=localhost;dbname=EPriceStreetMarket", "root", "olify"); 
	session_start();
    $_POST = json_decode(file_get_contents('php://input'), true);
	
	
	if(!empty($_POST['cust_name'])&& !empty($_POST['cust_mobile']))
    {
       $query ="
	   INSERT INTO olify_customers (cust_name, cust_mobile, cust_email, cust_address, cust_status, cust_join_date)
	   VALUES(:cust_name, :cust_mobile, :cust_email, :cust_address, :cust_status, :cust_join_date)";
	   
	   $ins_query=$conn->prepare($query);
       
       $date = date('Y-m-d H:i:s');
       $ins_query->bindParam(':cust_name', $_POST['cust_name']);
	   $ins_query->bindParam(':cust_mobile', $_POST['cust_mobile']);
       $ins_query->bindParam(':cust_email', $_POST['cust_email']);
	   $ins_query->bindParam(':cust_address', $_POST['cust_address']);
	   $ins_query->bindParam(':cust_status', $_POST['cust_status']);
	   $ins_query->bindParam(':cust_join_date', $date, PDO::PARAM_STR);
	   
       $ins_query->execute();

       $result = $ins_query->fetchAll();
	if (isset($result)) {
		echo "Customer Added";
	}
   }
?> 
