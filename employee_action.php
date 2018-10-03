<?php
    //error_reporting(0);
    $conn = new PDO("mysql:host=localhost;dbname=EPriceStreetMarket", "root", "olify"); 
	session_start();
    $_POST = json_decode(file_get_contents('php://input'), true);
	
	
	if(!empty($_POST['full_name'])&& !empty($_POST['login_name']))
    {
       $query ="
	   INSERT INTO olify_employees (market_id, full_name, login_name, password, phone_no, designation, national_id, ssn, sex, emp_join_date, emp_status)
	   VALUES(:market_id, :full_name, :login_name, :password, :phone_no, :designation, :national_id, :ssn, :sex, :emp_join_date, :emp_status)";
	   $ins_query=$conn->prepare($query);

	   $date = date('Y-m-d H:i:s');
       $ins_query->bindParam(':market_id', $_POST['market_id']);
       $ins_query->bindParam(':full_name', $_POST['full_name']);
	   $ins_query->bindParam(':login_name', $_POST['login_name']);
       $ins_query->bindParam(':password', $_POST['password']);
	   $ins_query->bindParam(':phone_no', $_POST['phone_no']);
	   $ins_query->bindParam(':designation', $_POST['designation']);
	   $ins_query->bindParam(':national_id', $_POST['national_id']);
	   $ins_query->bindParam(':ssn', $_POST['ssn']);
	   $ins_query->bindParam(':sex', $_POST['sex']);
	   $ins_query->bindParam(':emp_join_date', $date, PDO::PARAM_STR);
	   //$ins_query->bindParam(':user_type', 'user');
	   $ins_query->bindParam(':emp_status', $_POST['emp_status']);
	   
       $ins_query->execute();
    }
?> 