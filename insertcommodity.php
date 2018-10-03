<?php
    //error_reporting(0);
    $conn = new PDO("mysql:host=localhost;dbname=EPriceStreetMarket", "root", "olira"); 
	//session_start();
    //$_POST = json_decode(file_get_contents('php://input'), true);
	
	if(!empty($_POST['commodity_name']))
	{
		$query = "
		insert into commodity (commodity_name) values(:commodity_name)";/* units, price, quantity, measures, status, created_date) 
		VALUES (:commodity_name, :units, :price, :quantity, :measures, :status, :created_date)
		";*/
		$ins_query = $conn->prepare($query);
		$ins_query->bindParam(':commodity_name', $_POST['commodity_name']);
		/*$ins_query->bindParam(':units', $_POST['units']);
		$ins_query->bindParam(':price', $_POST['price']);
		$ins_query->bindParam(':quantity', $_POST['quantity']);
		$ins_query->bindParam(':measures', $_POST['measures']);
		$ins_query->bindParam(':status', $_POST['status']);
		$ins_query->bindParam(':created_date', $_POST['created_date']);*/
		
		$chk_ins = $ins_query->execute();
	}
    /*if(isset($_POST['submit']))
//{
	if(!empty($_POST['name'])&& !empty($_POST['mobile']))
    {
       $query ="
	   insert into employee (name, mobile, email)values( :name,:mobile, :email)";
	   $ins_query=$conn->prepare($query);
       $ins_query->bindParam(':name', $_POST['name']);
       $ins_query->bindParam(':mobile', $_POST['mobile']);
       $ins_query->bindParam(':email', $_POST['email']);
       $chk_ins=$ins_query->execute();
    } else{
    $result = $conn->prepare("select * from employee order by id ");
	$sel_query->execute();
    echo json_encode($sel_query->fetchAll());
	}*/
?> 