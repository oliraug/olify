<?php
//error_reporting(0);
    $conn = new PDO("mysql:host=localhost;dbname=EPriceStreetMarket", "root", "olira"); 
	session_start();
    $_POST = json_decode(file_get_contents('php://input'), true);
	
if($_POST['btn_action'] == 'delete')
	{
		$status = 'active';
		if($_POST['category_status'] == 'active')
		{
			$status = 'inactive';
		}
		$query = "
		UPDATE olify_category 
		SET category_status = :category_status 
		WHERE category_id = :category_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':category_status'	=>	$status,
				':category_id'		=>	$_POST["category_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Category status changed to ' . $status;
		}
	}

?>