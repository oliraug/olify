<?php

include 'config.php';

$sel = mysqli_query($con,
"SELECT * FROM olify_faoes
INNER JOIN olify_markets ON olify_markets.`market_id` = olify_faoes.`market_id`
");
$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
   "faoes_id"           		=> $row['faoes_id'],
   "market_name"           	=> $row['market_name'],
   "depreciation"		   		=> $row['depreciation'], 
   "repairs"			   		=> $row['repairs'], 
   "audit_fee"			   		=> $row['audit_fee'], 
   "interest_paid"				=> $row['interest_paid'], 
   "commission_paid"	   		=> $row['commission_paid'], 
   "bank_charges"		   		=> $row['bank_charges'], 
   "legal_charges"				=> $row['legal_charges'], 
   "net_profit"					=> $row['net_profit'], 
   "from_date"			   		=> $row['from_date'],
   "to_date"			   		=> $row['to_date']
	);
}

echo json_encode($data);
?>