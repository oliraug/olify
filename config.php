<?php
header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json");

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = "olify"; /* Password */
$dbname = "EPriceStreetMarket"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}

/*mysqli_begin_transaction($con, MYSQLI_TRANS_START_READ_WRITE);

$flag = true;
if($flag){
	mysqli_commit($con);
	echo "All queries where executed successfully";
} else{
	mysqli_rollback($con);
	echo "All queries where rolled back";
}

mysqli_close($con);*/
?>