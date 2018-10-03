<?php

//market_index_action.php

$conn = new PDO('mysql:host=localhost;dbname=EPriceStreetMarket', 'root', 'olify');
session_start();
$_POST = json_decode(file_get_contents('php://input'), true);


	if(!empty($_POST['index_name']))
	{
		$query = "
		INSERT INTO olify_market_index (code, index_name, market_id, stock_id) 
		VALUES (:code, :index_name, :market_id, :stock_id)
		";	
		$ins_query = $conn->prepare($query);
	   
	   $ins_query->bindParam(':code', $_POST['code']);
	   $ins_query->bindParam(':index_name', $_POST['index_name']);
       $ins_query->bindParam(':market_id', $_POST['market_id'];
	   $ins_query->bindParam(':stock_id', $_POST['stock_id']);
	   
       $ins_query->execute();
		
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'New Market Index Added';
		}
	}

?>