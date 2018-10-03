<?php
//function.php

include ('config.php');
//session_start();

function fill_category_list($con)
{
	$query = mysqli_query($con, "
	SELECT * FROM olify_category 
	WHERE category_status = 'active' 
	ORDER BY category_name ASC
	");
	while ($row = mysqli_fetch_array($query)) {
		 echo "<option value='".$row['category_id']."'>".$row['category_name']."</option>";
	}
}

function fill_market_list($con)
{
	$query = mysqli_query($con, "
	SELECT * FROM olify_markets 
	WHERE market_status = 'active' 
	ORDER BY market_name ASC
	");
	while ($row = mysqli_fetch_array($query)) {
		echo "<option value='".$row['market_id']."'>".$row['market_name']."</option>";
	}
}

function fill_currency_list($con)
{
	$query = mysqli_query($con, "
	SELECT * FROM olify_currency 
	WHERE currency_status = 'active' 
	ORDER BY currency_name ASC
	");
	while ($row = mysqli_fetch_array($query)) {
		echo "<option value='".$row['id']."'>".$row['currency_name']."</option>";
	}
}

function fill_product_list($con)
{
	$query = mysqli_query($con, "
	SELECT * FROM olify_product 
	WHERE product_status = 'active' 
	ORDER BY product_name ASC
	");
	while ($row = mysqli_fetch_array($query)) {
		echo "<option value='".$row['code']."'>".$row['product_name']."</option>";
	}
}

function fill_product_unit_list($con)
{
	$query = mysqli_query($con, "
	SELECT DISTINCT product_measures FROM olify_product 
	ORDER BY product_measures ASC
	");
	while ($row = mysqli_fetch_array($query)) {
		echo "<option value='".$row['code']."'>".$row['product_measures']."</option>";
	}
}

function fill_supplier_list($con)
{
	$query = mysqli_query($con, "
	SELECT * FROM olify_suppliers 
	ORDER BY contact_name ASC
	");
	while ($row = mysqli_fetch_array($query)) {
		echo "<option value='".$row['supplier_id']."'>".$row['contact_name']."</option>";
	}
}

function fill_market_user_list($con)
{
	$query = mysqli_query($con, "
	SELECT * FROM olify_market_user
	ORDER BY full_name ASC
	");
	while ($row = mysqli_fetch_array($query)) {
		echo "<option value='".$row['user_id']."'>".$row['full_name']."</option>";
	}
}

function fill_customer_list($con)
{
	$query = mysqli_query($con, "
	SELECT * FROM olify_customers
	ORDER BY cust_name
	");
	while ($row = mysqli_fetch_array($query)){
		echo "<option value='".$row['cust_id']."'>".$row['cust_name']."</option>";
	}
}

function get_login_name($con, $user_id)
{
	$query = "
	SELECT login_name FROM olify_market_user WHERE user_id = '".$user_id."'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row['loginname'];
	}
}

function count_total_market_user($con)
{
	$query = " SELECT * FROM olify_market_user";
	if($result = mysqli_query($con, $query)){
		$rowCount = mysqli_num_rows($result);
		printf($rowCount);
		mysqli_free_result($result);
		}
}

function fill_total_sale_list($con)
{
	$query = "
	SELECT s.`sales_id`, p.`product_name`, s.`quantity_sold`*s.`amount` AS total_sale
	FROM olify_product p, olify_sales s 
	INNER JOIN olify_sales.`product_code` = olify_product.`product_code`
	";
	while ($row = mysqli_fetch_array($query)) {
		echo "<option value='".$row['sales_id']."'>".$row['total_sale']."</option>";
	}
}

function fill_inventory_order_list($con)
{
	$query = mysqli_query($con,
		"SELECT * FROM olify_inventory_order 
		INNER JOIN olify_product ON olify_product.`code` = olify_inventory_order.`product_code`
		ORDER BY product_code
		");
	while ($row = mysqli_fetch_array($query)){
		echo "<option value='".$row['inventory_order_id']."'>".$row['product_name']."</option>";
	}
}

function fetch_product_details($con)
{
	//$code ='';
	$query = "
	SELECT * FROM olify_product 
	WHERE code IN (SELECT code FROM olify_product)";

	if($result = mysqli_query($con, $query)){
		if(mysqli_num_rows($result) > 0){
	while ($row = mysqli_fetch_array($result))
	{
		$data[] = array(
		'product_name' 			=> $row["product_name"],
		'quantity_per_unit' 	=> $row["quantity_per_unit"],
		'price' 				=> $row['price'],
		'units' 				=> $row['units']
		);
	}
	}
   }
}
function available_product_quantity($con)
{
	/*$product_code ='';
	$code ='';
	$product_data = fetch_product_details($con);*/
	$query = "
	SELECT 	inventory_order_product.quantity FROM inventory_order_product 
	INNER JOIN olify_inventory_order ON olify_inventory_order.inventory_order_id = inventory_order_product.inventory_order_id
	WHERE inventory_order_product.product_code IN (SELECT product_code FROM inventory_order_product) AND
	olify_inventory_order.inventory_order_status = 'active'
	";
	
	$total = 0;
	if ($result = mysqli_query($con, $query)) {
		if (mysqli_num_rows($result) > 0) {
		
	while($row = mysqli_fetch_array($result))
	{
		
		$total = $total + $row['quantity'];
	}
  }
}
	//$available_quantity = intval($product_data['quantity']) - intval($total);
	$available_quantity = intval($total);
	if($available_quantity == 0)
	{
		$update_query = "
		UPDATE olify_product SET 
		product_status = 'inactive' 
		WHERE code IN (SELECT code FROM olify_product)
		";
		$statement = $con->prepare($update_query);
		$statement->execute();
	}
	return $available_quantity;
  }

function count_total_product($con)
{
	$query = "
	SELECT * FROM olify_product WHERE product_status='active'";
	if($result = mysqli_query($con, $query)){
		$rowCount = mysqli_num_rows($result);
		printf($rowCount);
		/*close result set */
		mysqli_free_result($result);
		}
}

function get_market_by_name_and_location($con, $market_id)
{
	$query = "
	SELECT market_name, location FROM olify_market WHERE market_id = '".$market_id."'
	";
	if($result = mysqli_query($con, $query)){
		$rowCount = mysqli_num_rows($result);
		printf($rowCount);
		mysqli_free_result($result);
		}
}

function fill_stock_product_list($con)
{
	$query = "
		SELECT * FROM olify_stock_product ORDER BY market_id
	";
	if($result = mysqli_query($con, $query)){
		$rowCount = mysqli_num_rows($result);
		printf($rowCount);
		mysqli_free_result($result);
		}
}

function count_total_markets($con)
{
	$query = "
	SELECT * FROM olify_markets WHERE market_status='active'";
	if($result = mysqli_query($con, $query)){
		$rowCount = mysqli_num_rows($result);
		printf($rowCount);
		mysqli_free_result($result);
		}
}

function count_total_category($con)
{
	$query = "
	SELECT * FROM olify_category WHERE category_status='active'
	";
	if($result = mysqli_query($con, $query)){
		$rowCount = mysqli_num_rows($result);
		printf($rowCount);
		mysqli_free_result($result);
		}
}

function count_total_suppliers($con)
{
	$query = "
	SELECT * FROM olify_suppliers
	";
	if($result = mysqli_query($con, $query)){
		$rowCount = mysqli_num_rows($result);
		printf($rowCount);
		mysqli_free_result($result);
		}
}

function count_total_customers($con)
{
	$query = "
	SELECT * FROM olify_customers
	";
	if($result = mysqli_query($con, $query)){
		$rowCount = mysqli_num_rows($result);
		printf($rowCount);
		mysqli_free_result($result);
		}
}


function count_total_order_value($con)
{
	$query = "
	SELECT sum(inventory_order_total) as total_order_value FROM olify_inventory_order 
	WHERE inventory_order_status='active'
	";
	if(isset($_SESSION['user']))
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	if($result = mysqli_query($con, $query)){
		$row = mysqli_fetch_assoc($result);
		return number_format($row['total_order_value'], 2);
		mysqli_free_result($result);
	}
}

function count_total_cash_order_value($con)
{
	$query = "
	SELECT sum(inventory_order_total) as total_order_value FROM olify_inventory_order 
	WHERE payment_status = 'cash' || payment_status = 'mobile money' 
	AND inventory_order_status='active'
	";
	if(isset($_SESSION['user']))
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	if($result = mysqli_query($con, $query)){
		$rowCount = mysqli_fetch_assoc($result);
		return number_format($rowCount['total_order_value'], 2);
		mysqli_free_result($result);
	}
}

function count_total_credit_order_value($con)
{
	$query = "
	SELECT sum(inventory_order_total) as total_order_value FROM olify_inventory_order WHERE payment_status = 'credit' AND inventory_order_status='active'
	";

	if(isset($_SESSION['user']))
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	if($result = mysqli_query($con, $query)){
		$rowCount = mysqli_num_rows($result);
		return number_format($rowCount['total_order_value'], 2);
		mysqli_free_result($result);
	}
}

function count_total_sales_transaction_value($con)
{
	$query = "
		SELECT COUNT(*) FROM olify_sales_transactions
		INNER JOIN olify_product ON olify_product.`code` = olify_sales_transactions.`sales_id`
		INNER JOIN olify_markets ON olify_markets.`market_id` = olify_sales_transactions.`sales_id`
		GROUP BY market_name, product_name
		";
		if($result = mysqli_query($con, $query)){
		$rowCount = mysqli_num_rows($result);
		printf($rowCount);
		mysqli_free_result($result);
		}
}

function get_name($con)
{
	$user_id = '';
	$query = "
		SELECT full_name FROM olify_market_user WHERE user_id ='".$user_id."'
		";
	if($result = mysqli_query($con, $query)){
	  if(mysqli_num_rows($result) > 0){
		while ($row = mysqli_fetch_array($result))
		{
			$data[] = array(
			'full_name' 			=> $row["full_name"]
			);
		}
	  }
	}
}

function get_total_revenue($con)
{
	$market_id ='';
	$query = "
	SELECT SUM(revenue) AS total_revenue FROM olify_oaaes WHERE market_id IN (SELECT market_id FROM olify_markets)
	";
	if(isset($_SESSION['user']))
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	if($result = mysqli_query($con, $query)){
		$rowCount = mysqli_fetch_assoc($result);
		return number_format($rowCount['total_revenue'], 2);
		mysqli_free_result($result);
		}
}

function get_total_cost($con)
{
	$market_id ='';
	$query = "
	SELECT SUM(salaries+rent_rate_tax+purchases+post_telgrm+elec_charges+water_bills+telphone_charges+print_stationery) AS COSTS_INCURRED
	FROM olify_oaaes
	UNION ALL
	SELECT SUM(carriage_outward+advertisement+commission+insurance+travel_expense+bad_debts+packing_expenses) AS SADES_EXPENSES
	FROM olify_sades
	UNION ALL
	SELECT SUM(depreciation+repairs+audit_fee+interest_paid+commission_paid+bank_charges+legal_charges) AS FAOES_EXPENSES
	FROM olify_faoes 
	WHERE market_id ='".$market_id."'
	";
	if(isset($_SESSION['user']))
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	if($result = mysqli_query($con, $query)){
		$rowCount = mysqli_fetch_assoc($result);
		return number_format($rowCount['COSTS_INCURRED'], 2);
		mysqli_free_result($result);
		}
}

function get_total_profit($con)
{
	//$market_id ='';
	$query = "
	SELECT SUM(net_profit) AS total_profit FROM olify_faoes WHERE market_id IN (SELECT market_id FROM olify_markets)
	";
	if(isset($_SESSION['user']))
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	
	if($result = mysqli_query($con, $query)){
		$rowCount = mysqli_fetch_assoc($result);
		return number_format($rowCount['total_profit'], 2);
		mysqli_free_result($result);
		}
}

function get_market_user_by_product_by_market($con)
{
	$query = '
	SELECT full_name, phone_no, market_name, location, product_name, price, quantity_per_unit
	FROM olify_markets 
	INNER JOIN olify_product ON olify_product.`code` = olify_markets.`product_code`
	LEFT JOIN olify_market_user ON olify_market_user.`user_id` = olify_markets.`user_id`
	ORDER BY market_name 
	';
if($result = mysqli_query($con, $query)){
		if(mysqli_num_rows($result) > 0){
	
		echo "<div class='table-responsive'>";
		echo "<table class='table table-bordered table-striped'>";
			echo "<tr>";
				echo "<th>Full Name</th>";
				echo "<th>Phone Number</th>";
				echo "<th>Product Name</th>";
				echo "<th>Price</th>";
				echo "<th>Quantity</th>";
				echo "<th>Market</th>";
				echo "<th>Location</th>";
			echo "</tr>";
	while($row = mysqli_fetch_array($result))
		{
		echo "<tr>";
			echo "<td>".$row['full_name']."</td>";
			echo "<td align='right'>" .$row["phone_no"]."</td>";
			echo "<td align='right'>" .$row["product_name"]."</td>";
			echo "<td align='right'>" .$row["price"]."</td>";
			echo "<td align='right'>" .$row["quantity_per_unit"]."</td>";
			echo "<td align='right'>" .$row["market_name"]."</td>";
			echo "<td align='right'>" .$row["location"]."</td>";
		echo "</tr>";
		}
		echo "</table>";
		echo "</div>";
		/* free result set */
		mysqli_free_result($result);
		
		}
	}
}

function isUsername($con, $login_name)
{
	$query = "
	SELECT user_id FROM olify_market_user WHERE login_name = '".$login_name."'
	";
	if($result = mysqli_query($con, $query)){
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysql_fetch_array($result)) {
				 	$data[] = $row;
				 }	 
		 } 
	}
}

function transact($product_name, $units_in_stock){
	try{
		$this->pdo->beginTransaction();
		//get available units_in_stock of the market product
$sql ='SELECT units_in_stock FROM olify_product WHERE code=:product_name';
$stmt = $this->pdo->prepare($sql);
$stmt->execute(array(":user_id" => $user_id));
$availableUnits =(int)
$stmt->fetchColumn;
$stmt->closeCursor();
if($availableUnits <$units_in_stock){
	echo 'Insufficient commodities to transact';
	return false;
	}
	//deduct from the market product
	$sql_update_product = 'UPDATE olify_product SET units_in_stock = units_in_stock-:units_in_stock WHERE code=:product_name';
	$stmt = $this->pdo->prepare($sql_update_from);
	$stmt->execute(array(":user_id" => $user_id, ":units_in_stock" => $units_in_stock));
	$stmt->closeCursor();
	//add to the recreiving account
	$sql_update_product_code ='UPDATE olify_product SET units_in_stock = units_in_stock+:units_in_stock WHERE code =:user_id';
	$stmt = $this->pdo->prepare($sql_update_product_code);
	$stmt->execute(array(":product_code" => $product_code, ":units_in_stock" => $units_in_stock));
	//commit the transaction
	$this->pdo->commit();
	echo 'The amount has been transfered successfully';
	return true;
	} catch(PDOException $e){
		$this->pdo->rollback();
		die($e->getMessage());
		}

}

function sortCategories($con){
	$sql = "SELECT user_id, category_name FROM olify_category WHERE category_status='active' ORDER BY category_name";
	if($result = mysqli_query($con, $query)){
		if(mysqli_num_rows($result) > 0){
	while ($row = mysqli_fetch_array($result))
	{
		$data[] = array(
		'user_id' 			=> $row["user_id"],
		'category_name' 	=> $row["category_name"]
		);
	}
	}
   }
	
	
}

?>
<!--if u can spend an hour in my mind, a minute in my heart, a second in my soul, u'll know much love i have for you
there are 4 steps to happiness:1.you,2.me,3.our hearts,4.together,
each time i fall asleep, my heart calls out for u! i'm totally into you. sweetheart!*/