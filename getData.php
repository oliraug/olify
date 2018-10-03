<?php

include 'config.php';

$sel = mysqli_query($con,"select * from market_user");
$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
	"fullname"		=> $row['fullname'],
	"loginname"		=> $row['loginname'],
	"password"		=> password_hash($row['password'], PASSWORD_DEFAULT),
	"phoneno"		=> $row['phoneno'],
	"sex"			=> $row['sex'],
	"created_date"	=> date('m-d-Y'),
	"updated_date"	=> date('m-d-Y'),
	"enabled"		=> $row['enabled'],
	"user_type"		=> $row['user_type']
	);
}

echo json_encode($data);
?>