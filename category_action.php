<?php
    //error_reporting(0);
    $conn = new PDO("mysql:host=localhost;dbname=EPriceStreetMarket", "root", "olify"); 
	session_start();
    $_POST = json_decode(file_get_contents('php://input'), true);
	
	
	if(!empty($_POST['category_name']))
    {
       $query ="
	   INSERT INTO olify_category (user_id, category_name, category_status, description)
	   VALUES(:user_id, :category_name, :category_status, :description)";
	  
	   $ins_query=$conn->prepare($query);
	  
	   $ins_query->bindParam(':user_id', $_POST['user_id']);
       $ins_query->bindParam(':category_name', $_POST['category_name']);
       $ins_query->bindParam(':category_status', $_POST['category_status']);
	   $ins_query->bindParam(':description', $_POST['description']);
	   
       $ins_query->execute();
    
	$result = $ins_query->fetchAll();
	if (isset($result)) {
		echo "Category Name Added";
	}
}
?> 