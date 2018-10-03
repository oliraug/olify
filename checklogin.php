<?php
	//checklogin.php

require_once('./config.php');

$query = "SELECT * FROM olify_market_user WHERE login_name = '$login_name'";
$exists = mysqli_num_rows($query);    //checks if username exists
$olify_users = "";
$olify_password = "";

if ($exists > 0) {   //if there are no returning rows or no existing username
	while ($row = mysqli_fetch_assoc($query) {  // display all rows from query
		$olify_users = $row['login_name'];
		$olify_password = $row['password'];
	}
	if (($login_name == $olify_users) && ($password == $olify_password)) {  // checks if there are any matching fields
		if ($password == $olify_password) {
			$_SESSION['user'] = $login_name;  //set the username in a session. This serves as a global variable
			header("location:home.php"); // redirects the user to the authenticated home page
		}
	} else {
		print '<script>alert("Incorrect password!");</script>';  //prompts the user
		print '<script>window.location.assign("login.php");</script>'; //redirects to login.php
	}
} else {
		print '<script>alert("Incorrect user!");</script>';  //prompts the user
		print '<script>window.location.assign("login.php");</script>'; //redirects to login.php
	}

?>