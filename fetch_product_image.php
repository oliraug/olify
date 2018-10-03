<?php

include 'config.php';

$sel = mysqli_query($con,
"SELECT * FROM olify_product_images
INNER JOIN olify_market_user ON olify_market_user.`user_id` = olify_product_images.`user_id`
INNER JOIN olify_product ON olify_product.`code` = olify_product_images.`product_code`
");
$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
   "id"              	   => $row['id'],
   "product_name"		   => $row['product_name'],
   "full_name"    		   => $row['full_name'],
   "name" 			       => $row['name'],
   "image"		           => $row['image'], 
   "created"		       => $row['created'], 
   "status"			       => $row['status']
	);
}

echo json_encode($data);
?>