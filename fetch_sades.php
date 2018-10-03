<?php

include 'config.php';

$sel = mysqli_query($con,
"SELECT * FROM olify_sades
INNER JOIN olify_markets ON olify_markets.`market_id` = olify_sades.`market_id`
");
$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
   "sades_id"              		=> $row['sades_id'],
   "market_name"		   		   => $row['market_name'],
   "carriage_outward"	   		=> $row['carriage_outward'], 
   "advertisement"		   		=> $row['advertisement'], 
   "commission"			   		=> $row['commission'], 
   "insurance"			            => $row['insurance'], 
   "travel_expense" 	            => $row['travel_expense'],   
   "bad_debts"			            => $row['bad_debts'], 
   "packing_expenses"	  		   => $row['packing_expenses'], 
   "from_date"			            => $row['from_date'],
   "to_date"			            => $row['to_date']
	);
}

echo json_encode($data);
?>