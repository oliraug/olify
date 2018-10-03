<?php

include('database_connection.php');

if(!empty($_POST['market_name']))
	{
		$query = "
		UPDATE olify_markets 
		SET market_name = :market_name, 
		product_code = :product_code,
		location = :location, 
		country = :country, 
		market_status = :market_status, 
		updated_date = :updated_date 
		WHERE market_id = :market_id
		";
		$statement = $conn->prepare($query);
		
		$statement->bindParam(':market_name', $_POST['market_name']);
		$statement->bindParam(':product_code', $_POST['product_code']);
		$statement->bindParam(':location', $_POST['location']);
		$statement->bindParam('country', $_POST['country']);
		$statement->bindParam('market_status', $_POST['market_status']);
		$statement->bindParam('updated_date', date('Y-m-d'));
		$statement->bindParam(':market_id', $_POST['market_id']);

		$statement->execute();
	}
		$sql_query = $conn->prepare("SELECT * FROM markets ORDER BY market_id");
		$sql_query->execute();
		echo json_encode($sql_query->fetchAll());
		if(isset($sql_query))
		{
			echo 'Market Details Edited';
		}
	}



?>