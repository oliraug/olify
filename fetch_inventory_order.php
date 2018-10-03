<?php

include 'config.php';

$sel = mysqli_query($con,
"SELECT * FROM olify_inventory_order
	LEFT JOIN olify_markets ON olify_markets.`market_id` = olify_inventory_order.`market_id`	
	INNER JOIN olify_customers ON olify_customers.`cust_id` = olify_inventory_order.`cust_id`
	INNER JOIN olify_category ON olify_category.`category_id` = olify_inventory_order.`category_id`
	INNER JOIN olify_product ON olify_product.`code` = olify_inventory_order.`product_code`");
$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
	"inventory_order_id"						=> $row['inventory_order_id'],
	"market_name"								=> $row['market_name'],
	"cust_name"									=> $row['cust_name'],
	"category_name"								=> $row['category_name'],
	"product_name"								=> $row['product_name'],
	"inventory_order_total"						=> $row['inventory_order_total'],
	"inventory_order_date"						=> $row['inventory_order_date'],
	"inventory_required_date"					=> $row['inventory_required_date'],
	"inventory_order_address"					=> $row['inventory_order_address'],
	"product_details"							=> $row['product_details'],
	"payment_status"							=> $row['payment_status'],
	"inventory_order_status"					=> $row['inventory_order_status']
	);
}

echo json_encode($data);
?>