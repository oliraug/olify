<?php

include 'config.php';

$sel = mysqli_query($con,"select * from olify_customers");
$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
	"cust_id"					=> $row['cust_id'],
	"cust_name"					=> $row['cust_name'],
	"cust_mobile"				=> $row['cust_mobile'],
	"cust_email"				=> $row['cust_email'],
	"cust_address"				=> $row['cust_address'],
	"cust_status"				=> $row['cust_status'],
	"cust_join_date"			=> $row['cust_join_date']
	);
}

echo json_encode($data);
?>