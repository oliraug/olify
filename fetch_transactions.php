<?php

include 'config.php';

$sel = mysqli_query($con,"select * from olify_invoice");
$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
	"invoice_no"				=> $row['invoice_no'],
	"invoice_date"				=> $row['invoice_date'],
	"category_id"				=> $row['category_id'],
	"product_code"				=> $row['product_code'],
	"description"				=> $row['description'],
	"quantity"					=> $row['quantity'],
	"unit_cost"					=> $row['unit_cost'],
	"sub_total"					=> $row['sub_total'],
	"vat"						=> $row['vat'],
	"total"						=> $row['total']
	);
}

echo json_encode($data);
?>