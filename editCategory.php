<?php

include('database_connection.php');

if(isset($_REQUEST['action']) && $_REQUEST['action'] !=''){
	if($_REQUEST['action'] == 'update'){		
		$query = "
		UPDATE category 
		SET category_name = :category_name, 
		user_id = :user_id,
		category_status = :category_status, 
		description = :description 
		WHERE category_id = :category_id
		";
		$statement = $conn->prepare($query);
		
		$statement->bindParam(':category_name', $_POST['category_name']);
		$statement->bindParam(':user_id', $_POST['user_id']);
		$statement->bindParam('category_status', $_POST['category_status']);
		$statement->bindParam('description', $_POST['description']);
		$statement->bindParam(':category_id', $_POST['category_id']);

		$statement->execute();
	
		$sql_query = $conn->prepare("SELECT * FROM category ORDER BY category_id");
		$sql_query->execute();
		echo json_encode($sql_query->fetchAll());
		if(isset($sql_query))
		{
			echo 'Category Details Edited';
		}
	}
}



?>