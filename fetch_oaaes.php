<?php

include 'config.php';

$sel = mysqli_query($con,
"SELECT * FROM olify_oaaes
INNER JOIN olify_markets ON olify_markets.`market_id` = olify_oaaes.`market_id`
");
$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
   "oaaes_id"              	   => $row['oaaes_id'],
   "market_name"			         => $row['market_name'],
   "revenue"    		            => $row['revenue'],
   "salaries" 			            => $row['salaries'],
   "rent_rate_tax"		         => $row['rent_rate_tax'], 
   "unit"				            => $row['unit'], 
   "purchases"			            => $row['purchases'],
   "unit_mode"			            => $row['unit_mode'], 
   "post_telgrm"		            => $row['post_telgrm'], 
   "elec_charges"		            => $row['elec_charges'], 
   "water_bills"		            => $row['water_bills'], 
   "telphone_charges"	   	   => $row['telphone_charges'], 
   "print_stationery"	         => $row['print_stationery'],
   "from_date"			            => $row['from_date'],
   "to_date"			            => $row['to_date']
	);
}

echo json_encode($data);
?>