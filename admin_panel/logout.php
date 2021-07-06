<?php
	session_start();

	$_SESSION["admin"] = array();
	session_destroy();
	header("Location:http://localhost/service_managment_system/index.php");


?>