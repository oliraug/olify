<?php

include 'config.php';

$sel = mysqli_query($con,"select * from olify_suppliers");
$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
	"supplier_id"				=> $row['supplier_id'],
	"company_name"				=> $row['company_name'],
	"contact_name"				=> $row['contact_name'],
	"contact_title"				=> $row['contact_title'],
	"address"					=> $row['address'],
	"city"						=> $row['city'],
	"region"					=> $row['region'],
	"post_code"					=> $row['post_code'],
	"country"					=> $row['country'],
	"phone_no"					=> $row['phone_no'],
	"supplier_status"			=> $row['supplier_status']
	);
}

echo json_encode($data);
?>