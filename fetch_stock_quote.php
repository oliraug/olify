<?php

include 'config.php';

$sel = mysqli_query($con,"select * from olify_stock_quote");
$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
	"stock_id"				=> $row['stock_id'],
	"bid"					=> $row['bid'],
	"ask"					=> $row['ask']	
	);
}

echo json_encode($data);
?>