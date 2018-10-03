<?php

include 'config.php';

$sel = mysqli_query($con,"select * from olify_market_user");
$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
	"user_id"				=> $row['user_id'],
	"full_name"				=> $row['full_name'],
	"login_name"			=> $row['login_name'],
	"password"				=> password_hash($row["password"], PASSWORD_DEFAULT),
	"phone_no"				=> $row['phone_no'],
	"sex"					=> $row['sex'],
	"speciality"			=> $row['speciality'],
	"created_date"			=> $row['created_date'],
	"enabled" 				=> $row['enabled'],
	"user_type"				=> $row['user_type']
	);
}

echo json_encode($data);
?>