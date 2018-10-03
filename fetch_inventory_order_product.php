<?php

include 'config.php';

$sel = mysqli_query($con,
"SELECT * FROM inventory_order_product
INNER JOIN olify_inventory_order ON olify_inventory_order.`inventory_order_id` = inventory_order_product.`inventory_order_id`
INNER JOIN olify_product ON olify_product.`code` = inventory_order_product.`product_code`
");
$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
   "inventory_order_product_id"           		=> $row['inventory_order_product_id'],
   "inventory_order_id"		   		   			=> $row['inventory_order_id'],
   "product_name"		   						=> $row['product_name'], 
   "quantity"			   						=> $row['quantity'], 
   "price"			   							=> $row['price'], 
   "ord_date"									=> $row['ord_date']
	);
}

echo json_encode($data);
?>