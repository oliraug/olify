<?php
//logout.php
session_id('user_id');
session_start();
session_destroy();
session_commit();
header("location:login.php");

?>