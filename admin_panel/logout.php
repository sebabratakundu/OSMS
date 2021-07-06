<?php
	require_once "../assets/database.php";
	session_start();

	$_SESSION["admin"] = array();
	session_destroy();
	header("Location:".ROOT."index.php");


?>