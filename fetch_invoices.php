<?php

include 'config.php';

$sel = mysqli_query($con,
	"SELECT oi.`invoice_no`, oi.`invoice_date`, oc.`category_name`, op.`product_name`, oi.`quantity`,
oi.`unit_of_measure`, oi.`unit_cost`, oi.`sub_total`, oi.`vat`, oi.`total`
FROM olify_invoice AS oi
LEFT JOIN olify_category AS oc ON oc.`category_id` = oi.`category_id`
LEFT JOIN olify_product AS op ON op.`code` = oi.`product_code`
");

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
	"invoice_no"				=> $row['invoice_no'],
	"invoice_date"				=> $row['invoice_date'],
	"category_name"				=> $row['category_name'],
	"product_name"				=> $row['product_name'],
	"description"				=> $row['description'],
	"quantity"					=> $row['quantity'],
	"unit_of_measure"			=> $row['unit_of_measure'],
	"unit_cost"					=> $row['unit_cost'],
	"sub_total"					=> $row['sub_total'],
	"vat"						=> $row['vat'],
	"total"						=> $row['total']
	);
}

echo json_encode($data);
?>