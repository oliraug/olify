<?php
    //error_reporting(0);
    $conn = new PDO("mysql:host=localhost;dbname=EPriceStreetMarket", "root", "olify"); 
	session_start();
    $_POST = json_decode(file_get_contents('php://input'), true);
	
	if(!empty($_POST['inventory_order_id']))
    {
       $query ="
	   INSERT INTO inventory_order_product (inventory_order_id,product_code, quantity, price, ord_date)
	   VALUES(:inventory_order_id,:product_code, :quantity, :price, :ord_date)";
	   
	   $ins_query=$conn->prepare($query);
	   $date = date('Y-m-d H:i:s');
      
	   $ins_query->bindParam(':inventory_order_id', $_POST['inventory_order_id']);
	   $ins_query->bindParam(':product_code', $_POST['product_code']);
	   $ins_query->bindParam(':quantity', $_POST['quantity']);
	   $ins_query->bindParam(':price', $_POST['price']);
	   $ins_query->bindParam(':ord_date', $date, PDO::PARAM_STR);
	    
       $ins_query->execute();
    
    $result = json_encode($ins_query->fetchAll());
	if (isset($result)) {
		echo "Inventory Order Product Added";
	}
	}
?> 
