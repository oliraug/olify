<?php
    //error_reporting(0);
    //include('database_connection.php');
    $conn = new PDO("mysql:host=localhost;dbname=EPriceStreetMarket", "root", ""); 
	 session_start();
    $_POST = json_decode(file_get_contents('php://input'), true);
	
	if(isset($_POST['save_invoice']))
    {
       $query ="
	   INSERT INTO olify_invoice (invoice_date,category_id, product_code, description, quantity, unit_of_measure, unit_cost, sub_total, vat, total)
	   VALUES(:invoice_date, :category_id, :product_code, :description, :quantity, :unit_of_measure, :unit_cost, :sub_total, :vat, :total)";
	  
	   $ins_query=$conn->prepare($query);
      
       $date = date('Y-m-d H:i:s');
       $ins_query->bindParam(':invoice_date', $date, PDO::PARAM_STR);
       $ins_query->bindParam(':category_id', $_POST['category_id']);
       $ins_query->bindParam(':product_code', $_POST['product_code']);
	     $ins_query->bindParam(':description', $_POST['description']);
       $ins_query->bindParam(':quantity', $_POST['quantity']);
       $ins_query->bindParam(':unit_of_measure', $_POST['unit_of_measure']);
       $ins_query->bindParam(':unit_cost', $_POST['unit_cost']);
       $ins_query->bindParam(':sub_total', $_POST['sub_total']);
       $ins_query->bindParam(':vat', $_POST['vat']);
       $ins_query->bindParam(':total', $_POST['total']);
	   
       $ins_query->execute();
    
    	$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Invoice Created';
		}
	}
?> 