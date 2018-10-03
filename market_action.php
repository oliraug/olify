<?php

//market_action.php
//include('database_connection.php');

//include('function.php');

	//error_reporting(0);
    $conn = new PDO("mysql:host=localhost;dbname=EPriceStreetMarket", "root", "olify"); 
	session_start();
   $_POST = json_decode(file_get_contents('php://input'), true);


if(!empty($_POST['market_name'])){
	
		$query = "
		INSERT INTO olify_markets (user_id, market_name, product_code, location, country, market_status, created_date) 
		VALUES (:user_id, :market_name, :product_code, :location, :country, :market_status, :created_date)
		";
		$ins_query = $conn->prepare($query);
		
		$date = date('Y-m-d H:i:s');
		$ins_query->bindParam(':user_id', $_POST['user_id']);
		$ins_query->bindParam(':market_name', $_POST['market_name']);
		$ins_query->bindParam(':product_code', $_POST['product_code']);
		$ins_query->bindParam(':location', $_POST['location']);
		$ins_query->bindParam(':country', $_POST['country']);
		$ins_query->bindParam(':market_status', $_POST['market_status']);
		$ins_query->bindParam(':created_date', $date, PDO::PARAM_STR);
		//$ins_query->bindParam(':updated_date',	date('Y-m-d')));
				
		$ins_query->execute();

		$result = $ins_query->fetchAll();
		if(isset($result))
		{
			echo 'Market Added';
		}
	}
?>


	<!--if($_POST['btn_action'] == 'market_details')
	{
		$query = "
		SELECT * FROM market 
		WHERE market.market_id = '".$_POST["market_id"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		$output = '
		<div class="table-responsive">
			<table class="table table-bordered">
		';
		foreach($result as $row)
		{
			$status = '';
			if($row['product_status'] == 'active')
			{
				$status = '<span class="label label-success">Active</span>';
			}
			else
			{
				$status = '<span class="label label-danger">Inactive</span>';
			}
			$output .= '
			<tr>
				<td>Market Name</td>
				<td>'.$row["market_name"].'</td>
			</tr>
			<tr>
				<td>Location</td>
				<td>'.$row["location"].'</td>
			</tr>
			<tr>
				<td>Status</td>
				<td>'.$status.'</td>
			</tr>
			<tr>
				<td>Create Date</td>
				<td>'.$row["created_date"].'</td>
			</tr>
			<tr>
				<td>Update Date</td>
				<td>'.$row["updated_date"].'</td>
			</tr>
			';
		}
		$output .= '
			</table>
		</div>
		';
		echo $output;
	}
	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "
		SELECT * FROM market WHERE market_id = '$market_id'
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				'$market_id'	=>	$_POST["market_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['market_id'] = $row['market_id'];
			$output['market_name'] = $row['market_name'];
			$output['location'] = $row['location'];
		}
		echo json_encode($output);
	}

	if($_POST['btn_action'] == 'Edit')
	{
		$query = "
		UPDATE market 
		set market_name = $market_name,
		location = $location, 
		WHERE market_id = $market_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				'$market_name'		=>	$_POST['market_name'],
				'$location'	    	=>	$_POST['location'],
				'$market_id'		=>	$_POST['market_id']
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Market Details Edited';
		}
	}
	if($_POST['btn_action'] == 'delete')
	{
		$status = 'active';
		if($_POST['status'] == 'active')
		{
			$status = 'inactive';
		}
		$query = "
		UPDATE market 
		SET market_status = $market_status 
		WHERE market_id = $market_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				'$market_status'	=>	$status,
				'$market_id'		=>	$_POST["market_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Market status change to ' . $status;
		}
	}*/

