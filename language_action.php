<?php

//language_action.php

//include('database_connection.php');
//include('function.php');

$conn = new PDO('mysql:host=localhost;dbname=EPriceStreetMarket', 'root', 'olify');
session_start();
$_POST = json_decode(file_get_contents('php://input'), true);

	if(!empty($_POST['lang_name']))
	{
		// Count total files
		//$countfiles = count($_FILES['files']['productimg']);
			
		$query = "
		INSERT INTO olify_languages (lang_name, market_id, lang_code, created, lang_status) 
		VALUES (:lang_name, :market_id, :lang_code, :created, :lang_status)
		";

		$ins_query = $conn->prepare($query);

		$date = date('Y-m-d H:i:s');
		$ins_query->bindParam(':lang_name', $_POST['lang_name']);
		$ins_query->bindParam(':market_id', $_POST['market_id']);
		$ins_query->bindParam(':lang_code', $_POST['lang_code']);
		/*$ins_query->bindParam(':product_name', $_POST['product_name']);
		$ins_query->bindParam(':units', $_POST['units']);
		$ins_query->bindParam(':price', $_POST['price']);
		$ins_query->bindParam(':units_in_stock', $_POST['units_in_stock']);
		$ins_query->bindParam(':units_on_order', $_POST['units_on_order']);
		$ins_query->bindParam(':quantity_per_unit', $_POST['quantity_per_unit']);
		$ins_query->bindParam(':product_measures', $_POST['product_measures']);
		$ins_query->bindParam(':productimg', $_POST['productimg']);
		$ins_query->bindParam(':product_status', $_POST['product_status']);
		$ins_query->bindParam(':product_intention', $_POST['product_intention']);*/
		$ins_query->bindParam(':created', $date, PDO::PARAM_STR);
		$ins_query->bindParam(':lang_status', $_POST['lang_status']);


		$chk_ins = $ins_query->execute();

		$result = $ins_query->fetchAll();
		if (isset($result)) {
			echo "Language Added";
		}
	}

?>