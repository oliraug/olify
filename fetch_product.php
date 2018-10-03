<?php

include 'config.php';

$sel = "SELECT op.`code`, oc.`category_name`, os.`company_name`, omu.`full_name`, op.`product_name`,
op.`units`, op.`price`, op.`units_in_stock`, op.`units_on_order`, op.`quantity_per_unit`,
op.`product_measures`, op.`product_status`, op.`product_intention`, op.`created_date`, op.`entered_by`
FROM olify_product AS op
INNER JOIN olify_category AS oc ON oc.`category_id` = op.`category_id` 
INNER JOIN olify_suppliers AS os ON os.`supplier_id` = op.`supplier_id`
INNER JOIN olify_market_user AS omu ON omu.`user_id` = op.`user_id`";

if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE oc.category_name LIKE LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR os.company_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR op.product_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR op.quantity_per_unit LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR omu.full_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR op.product_id LIKE "%'.$_POST["search"]["value"].'%" ';
}

$result = mysqli_query($con, $sel);
$data = array();


while ($row = mysqli_fetch_array($result)) {
    $data[] = array(
	"code"						=> $row['code'],
	"category_name"				=> $row['category_name'],
	"company_name"				=> $row['company_name'],
	"full_name"					=> $row['full_name'],
	"product_name"				=> $row['product_name'],
	"units"						=> $row['units'],
	"price"						=> $row['price'],
	"units_in_stock"			=> $row['units_in_stock'],
	"units_on_order"			=> $row['units_on_order'],
	"quantity_per_unit"			=> $row['quantity_per_unit'],
	"product_measures"			=> $row['product_measures'],
	"product_status"			=> $row['product_status'],
	"product_intention"			=> $row['product_intention'],
	"created_date"				=> $row['created_date'],
	"updated_date"				=> $row['updated_date'],
	"entered_by"				=> $row['entered_by']
	);
}

echo json_encode($data);
?>