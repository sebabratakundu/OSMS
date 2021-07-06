<?php
	class update_profile{
		private $username;
		private $name;
		private $db;
		private $query;
		function __construct(){
			require_once("../../assets/database.php");
			$this -> db = new db();
			$this -> db = $this -> db -> __construct();

			$this -> username = trim($_POST["email"]);
			$this -> name = trim($_POST["name"]);
			$this -> name = mysqli_real_escape_string($this -> db,$this -> name);
			$this -> name = strip_tags($this -> name);

			$this -> query = $this -> db -> prepare("UPDATE user SET name = ? WHERE username = ? ");
			$this -> query -> bind_param("ss",$this -> name,$this -> username);
			$this -> query -> execute();

			if($this -> query -> affected_rows !=0){
				echo "update success";
			}
			else{
				echo "update failed";
			}

		}
	}

	new update_profile();

?>