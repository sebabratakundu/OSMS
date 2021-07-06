<?php
	class update_user{
		private $user_id;
		private $name;
		private $email;
		private $query;
		private $db;

		function __construct(){
			require_once("../../assets/database.php");
			$this -> db = new db();
			$this -> db = $this -> db -> __construct();
			$this -> user_id = $_POST["user-id"];
			settype($this -> user_id, "integer");
			$this -> name = trim($_POST["name"]);
			$this -> name = mysqli_real_escape_string($this -> db,$this -> name);
			$this -> name = strip_tags($this -> name);
			$this -> email = $_POST["email"];
			$this -> email = mysqli_real_escape_string($this -> db,$this -> email);
			$this -> email = strip_tags($this -> email);

			$this -> query = $this -> db -> prepare("UPDATE user SET name=?,username=? WHERE id=?");
			$this -> query -> bind_param("ssi",$this -> name,$this -> email,$this -> user_id);
			$this -> query -> execute();
			if($this -> query -> affected_rows !=0){
				echo "update success";
			}
			else{
				echo "failed";
			}

			$this -> query -> close();
		}
	}

	new update_user();

?>