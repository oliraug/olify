<?php

include 'config.php';

$sel = mysqli_query($con,"select * from profit_loss_stmt");
$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
   "gross_profit"		=> $row['gross_profit'],
   "salaries" 			=> $row['salaries'], 
   "rent_rate_tax"		=> $row['rent_rate_tax'], 
   "unit"				=> $row['unit'], 
   "purchases"			=> $row['purchases'],
   "unit_mode"			=> $row['unit_mode'], 
   "post_telgrm"		=> $row['post_telgrm'], 
   "elec_charges"		=> $row['elec_charges'], 
   "water_bills"		=> $row['water_bills'], 
   "telphone_charges"	=> $row['telphone_charges'], 
   "print_stationery"	=> $row['print_stationery'], 
   "carriage_outward"	=> $row['carriage_outward'], 
   "advertisement"		=> $row['advertisement'], 
   "commission"			=> $row['commission'], 
   "insurance"			=> $row['insurance'], 
   "travel_expense" 	=> $row['travel_expense'],   
   "bad_debts"			=> $row['bad_debts'], 
   "packing_expenses"	=> $row['packing_expenses'], 
   "depreciation"		=> $row['depreciation'], 
   "repairs"			=> $row['repairs'], 
   "audit_fee"			=> $row['audit_fee'], 
   "interest_paid"		=> $row['interest_paid'], 
   "commission_paid"	=> $row['commission_paid'], 
   "bank_charges"		=> $row['bank_charges'], 
   "legal_charges"		=> $row['legal_charges'], 
   "net_profit"			=> $row['net_profit'], 
   "from_date"			=> $row['from_date'],
   "to_date"			=> $row['to_date']
	);
}

echo json_encode($data);
?>