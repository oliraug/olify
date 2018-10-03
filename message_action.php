<?php

//stock_product_action.php

$conn = new PDO('mysql:host=localhost;dbname=EPriceStreetMarket', 'root', 'olify');
session_start();
$_POST = json_decode(file_get_contents('php://input'), true);


	if(!empty($_POST['messages']))
	{
		$query = "
		INSERT INTO olify_message (user_id, messages, sent_on) 
		VALUES (:user_id, :messages, :sent_on)
		";	
		$ins_query = $conn->prepare($query);
	   
	   $date = date('Y-m-d H:i:s');
	   $ins_query->bindParam(':user_id', $_POST['user_id']);
       $ins_query->bindParam(':messages', $_POST['messages']);
       $ins_query->bindParam(':sent_on', $_POST['sent_on']);
	   
       $ins_query->execute();
		
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'New Message';
		}
	}

?>