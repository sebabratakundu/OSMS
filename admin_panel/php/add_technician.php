<?php

class add_tech{
	private $name;
	private $email;
	private $mobile;
	private $city;
	private $db;
	private $prepare_query;
	private $result;

	function __construct(){
		require_once("../../assets/database.php");
		$this -> db = new db();
		$this -> db = $this -> db -> __construct();
		$this -> name = trim($_POST["name"]);
		$this -> name = mysqli_real_escape_string($this -> db, $this -> name);
		$this -> name = strip_tags($this -> name);

		$this -> email = trim($_POST["email"]);
		$this -> email = mysqli_real_escape_string($this -> db,$this -> email);
		$this -> email = strip_tags($this -> email);

 		$this -> city = trim($_POST["city"]);
 		$this -> city = mysqli_real_escape_string($this -> db,$this -> city);
 		$this -> city = strip_tags($this -> city);

 		$this -> mobile = trim($_POST["mobile"]);
 		$this -> mobile = mysqli_real_escape_string($this -> db,$this -> mobile);
 		$this -> mobile = strip_tags($this -> mobile);
 		settype($this -> mobile, "integer");


 		//prepare query

 		$this -> prepare_query = $this -> db -> prepare("SELECT * FROM technician_table WHERE email = ?");
 		$this -> prepare_query -> bind_param('s',$this -> email);
 		$this -> prepare_query -> execute();
 		$this -> result = $this -> prepare_query -> get_result();
 		$this -> prepare_query -> close();

 		if($this -> result -> num_rows != 0){
 			echo "user exist";
 		}
 		else{
 			//insert user data
 			
 			$this -> prepare_query = $this -> db -> prepare("INSERT INTO technician_table(name,email,city,mobile) VALUES(?,?,?,?)");
 			$this -> prepare_query -> bind_param("sssi",$this -> name,$this -> email,$this -> city,$this -> mobile);
 			$this -> prepare_query -> execute();

 			if($this -> prepare_query -> affected_rows !=0){
 				echo "success";
 			}
 			else{
 				echo "failed";
 			}

 			$this -> prepare_query -> close();

 		}

	}
}

new add_tech();

?>