<?php

include 'config.php';

$sel = mysqli_query($con,"select * from olify_market_index");
$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
	"code"					=> $row['code'],
	"index_name"			=> $row['index_name'],
	"market_id"				=> $row['market_id'],
	"stock_id"				=> $row['stock_id']
	);
}

echo json_encode($data);
?>