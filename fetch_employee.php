<?php

include 'config.php';

$sel = mysqli_query($con,
   "SELECT * FROM olify_employees
    INNER JOIN olify_markets ON olify_markets.`market_id` = olify_employees.`market_id`
");
$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
   "market_name"             => $row['market_name'],
   "emp_id"                  => $row['emp_id'],
   "full_name"	             => $row['full_name'], 
   "login_name"		           => $row['login_name'], 
   "password"			           => $row['password'], 
   "phone_no"			           => $row['phone_no'],
   "designation"             => $row['designation'],
   "national_id"             => $row['national_id'],
   "ssn"                     => $row['ssn'],
   "sex" 	                   => $row['sex'],   
   "emp_join_date"			     => $row['emp_join_date'], 
   //"user_type"	            => $row['user_type'], 
   "emp_status"			         => $row['emp_status']
   //"to_date"			      => $row['to_date']*/
	);
}

echo json_encode($data);
?>