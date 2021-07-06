<?php

class add_user{
	private $name;
	private $username;
	private $password;
	private $db;
	private $prepare_query;
	private $result;
	private $status;
	private $send_mail;

	function __construct(){
		require_once("../../assets/database.php");
		$this -> db = new db();
		$this -> db = $this -> db -> __construct();
		$this -> name = trim($_POST["name"]);
		$this -> name = mysqli_real_escape_string($this -> db, $this -> name);
		$this -> name = strip_tags($this -> name);

		$this -> username = trim($_POST["username"]);
		$this -> username = mysqli_real_escape_string($this -> db,$this -> username);
		$this -> username = strip_tags($this -> username);

 		$this -> password = trim($_POST["password"]);
 		$this -> password = mysqli_real_escape_string($this -> db,$this -> password);
 		$this -> password = strip_tags($this -> password);
 		$this -> password = md5($this -> password);

 		//prepare query

 		$this -> prepare_query = $this -> db -> prepare("SELECT * FROM user WHERE username = ?");
 		$this -> prepare_query -> bind_param('s',$this -> username);
 		$this -> prepare_query -> execute();
 		$this -> result = $this -> prepare_query -> get_result();
 		$this -> prepare_query -> close();

 		if($this -> result -> num_rows != 0){
 			echo "user exist";
 		}
 		else{
 			//insert user data
 			$this -> status = "active";
 			$this -> prepare_query = $this -> db -> prepare("INSERT INTO user(name,username,password,status) VALUES(?,?,?,?)");
 			$this -> prepare_query -> bind_param("ssss",$this -> name,$this -> username,$this -> password,$this -> status);
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

new add_user();

?>