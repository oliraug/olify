<?php

include 'config.php';

if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE olify_market.market_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR olify_market.market_id LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR olify_market.location LIKE "%'.$_POST["search"]["value"].'%" ';
}


$sel = mysqli_query($con,
"SELECT * FROM olify_markets
	INNER JOIN olify_market_user ON olify_market_user.`user_id` = olify_markets.`user_id`
	INNER JOIN olify_product ON olify_product.`code` = olify_markets.`product_code` 
");
$data = array();

while($row = mysqli_fetch_array($sel)) {
	
	$data[] = array(
	"full_name"				=> $row['full_name'],
	"market_id"				=> $row['market_id'],
	"market_name"			=> $row['market_name'],
	"product_name"			=> $row['product_name'],
	"location"				=> $row['location'],
	"country"				=> $row['country'],
	"market_status"			=> $row['market_status'],
	"created_date"			=> $row['created_date']	
	);
}

echo json_encode($data);
?>