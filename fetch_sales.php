<?php

include 'config.php';

$sel =
"SELECT ost.`sales_id`, om.`market_name`, oca.`category_name`, op.`product_name`, ocu.`currency_name`, ost.`quantity_sold`,
ost.`amount`, ost.`action_type`, ost.`payment_mode`, ost.`total_sale`, ost.`sales_date`
FROM olify_sales_transactions AS ost
LEFT JOIN olify_markets AS om ON om.`market_id` = ost.`market_id`	
LEFT JOIN olify_category AS oca ON oca.`category_id` = ost.`category_id`
LEFT JOIN olify_product AS op ON op.`code` = ost.`product_code`
LEFT JOIN olify_currency AS ocu ON ocu.`id` = ost.`currency_id`";

$result = mysqli_query($con, $sel);
$data = array();

while ($row = mysqli_fetch_array($result)) {
    $data[] = array(
	"sales_id"			=> $row['sales_id'],
	"market_name"		=> $row['market_name'],
	"category_name"		=> $row['category_name'],
	"product_name"		=> $row['product_name'],
	"currency_name"		=> $row['currency_name'],
	"quantity_sold"		=> $row['quantity_sold'],
	//"remaining_stock"	=> $row['remaining_stock'],
	"amount"			=> $row['amount'],
	"action_type"		=> $row['action_type'],
	"payment_mode"		=> $row['payment_mode'],
	"total_sale"		=> $row['total_sale'],
	"sales_date"		=> $row['sales_date']
	);
}

echo json_encode($data);
?>