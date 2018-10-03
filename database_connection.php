<?php
//database_connection.php
header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json");
error_reporting(0);

$conn = new PDO('mysql:host=localhost;dbname=EPriceStreetMarket', 'root', 'olify');
session_start();
$_POST = json_decode(file_get_contents('php://input'), true);

?>