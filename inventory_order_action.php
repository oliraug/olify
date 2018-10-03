<?php

$conn = new PDO('mysql:host=localhost;dbname=EPriceStreetMarket', 'root', 'olify');
session_start();
$_POST = json_decode(file_get_contents('php://input'), true);

	if(!empty($_POST['inventory_order_total']))
	{
		$query = "
		INSERT INTO olify_inventory_order (market_id, cust_id, category_id, product_code, inventory_order_total, inventory_order_date, inventory_required_date, inventory_order_address, product_details, payment_status, inventory_order_status) 
		VALUES (:market_id, :cust_id, :category_id, :product_code, :inventory_order_total, :inventory_order_date, :inventory_required_date, :inventory_order_address, :product_details, :payment_status, :inventory_order_status)
		";

		$ins_query = $conn->prepare($query);

		$date = date('Y-m-d H:i:s');
		$ins_query->bindParam(':market_id', $_POST['market_id']);
		$ins_query->bindParam(':cust_id', $_POST['cust_id']);
		$ins_query->bindParam(':category_id', $_POST['category_id']);
		$ins_query->bindParam(':product_code', $_POST['product_code']);
		$ins_query->bindParam(':inventory_order_total', $_POST['inventory_order_total']);
		$ins_query->bindParam(':inventory_order_date', $date, PDO::PARAM_STR);
		$ins_query->bindParam(':inventory_required_date', $date, PDO::PARAM_STR);
		$ins_query->bindParam(':inventory_order_address', $_POST['inventory_order_address']);
		$ins_query->bindParam(':product_details', $_POST['product_details']);
		$ins_query->bindParam(':payment_status', $_POST['payment_status']);
		$ins_query->bindParam(':inventory_order_status', $_POST['inventory_order_status']);
		

		$chk_ins = $ins_query->execute();
		
		$result = $ins_query->fetchAll();
		if (isset($result)) {
			echo "Order Added";
		}
	}

?>
29141998129478