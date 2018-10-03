<?php

include 'config.php';

$sel = mysqli_query($con,
	"SELECT * FROM olify_product_reviews
	INNER JOIN olify_market_user ON olify_market_user.`user_id` = olify_product_reviews.`user_id`
	INNER JOIN olify_product ON olify_product.`code` = olify_product_reviews.`product_code`
	INNER JOIN olify_inventory_order ON olify_inventory_order.`inventory_order_id` = olify_product_reviews.`inventory_order_id`
");

if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE olify_ product.product_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR olify_market_user.full_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR olify_product_review.status LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR olify_inventory_order.inventory_order_total LIKE "%'.$_POST["search"]["value"].'%" ';
}

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
	"product_name"			=> $row['product_name'],
	"full_name"				=> $row['full_name'],
	"product_name"			=> $row['product_name'],
	"comment"				=> $row['comment'],
	"created"				=> $row['created'],
	"status"				=> $row['status']
	);
}

function get_all_category_records($con)
{
	$statement = mysqli_query($con, "SELECT * FROM olify_product_review");
	if($result = mysqli_query($con, $statement)){
		$rowCount = mysqli_num_rows($result);
		printf($rowCount);
		mysqli_free_result($result);
		}
}

/*$data = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=>	$rowCount,
	"recordsFiltered"	=>	get_all_category_records($con),
	"data"				=>	$data
);*/
echo json_encode($data);
?>