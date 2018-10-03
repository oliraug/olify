<?php

include 'config.php';

$sel = mysqli_query($con,
"select * from olify_stock_product
INNER JOIN olify_markets on olify_markets.market_id = olify_stock_product.market_id
");
$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
	"stock_id"					=> $row['stock_id'],
	"currency"					=> $row['currency'],
	"market_name"				=> $row['market_name']
	);
}

echo json_encode($data);
?>