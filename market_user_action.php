<?php

//market_user_action.php
	include ('database_connection.php');
	
	if(!empty($_POST['full_name']))
	{
		$query ="
		INSERT INTO olify_market_user(full_name, login_name, password, phone_no, sex, speciality, created_date) 
		VALUES (:full_name, :login_name, :password, :phone_no, :sex, :speciality, :created_date)
		";	
		$ins_query = $conn->prepare($query);
	   
	   $date = date('Y-m-d H:i:s');
	   
	   $ins_query->bindParam(':full_name', $_POST['full_name']);
	   $ins_query->bindParam(':login_name', $_POST['login_name']);
	   $ins_query->bindParam(':password', $_POST['password']);
       $ins_query->bindParam(':phone_no', $_POST['phone_no']);
	   $ins_query->bindParam(':sex', $_POST['sex']);
	   $ins_query->bindParam(':speciality', $_POST['speciality']);
       $ins_query->bindParam(':created_date', $date, PDO::PARAM_STR);
	   
       $ins_query->execute();
		
		$result = $ins_query->fetchAll();
		if(isset($result))
		{
			echo 'New User Added';
		}
	}
?>