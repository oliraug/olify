<?php
//header("Access-Control-Allow-Origin: *");

$dsn ='mysql:host=localhost';
'dbname=EPriceStreetMarket'; 
$user='root'; 
$password='olify';

//error_reporting(0);

try{
$conn = new PDO($dsn, $user, $password);   //"mysql:host=localhost;dbname=EPriceStreetMarket;charset=utf8","root","olira");
//session_start();
//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$_POST = json_decode(file_get_contents('php://input'), true);
} catch(PDOException $e){
	echo "connection failed". $e->getMessage();
}
?>