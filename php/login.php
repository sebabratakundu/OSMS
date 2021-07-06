<?php
	require_once("../assets/database.php");

	class login{
		private $username;
		private $password;
		private $db;
		private $query;
		private $result;
		private $data;

		function __construct(){
			$this -> db = new db();
			$this -> db = $this -> db -> __construct();

			$this -> username = trim($_POST["username"]);
			$this -> username = mysqli_real_escape_string($this -> db,$this -> username);
			$this -> username = strip_tags($this -> username);

			$this -> password = $_POST["password"];
			$this -> password = mysqli_real_escape_string($this -> db,$this -> password);
			$this -> password = strip_tags($this -> password);
			$this -> password = md5($this -> password);

			$this -> query = $this -> db -> prepare("SELECT status FROM user WHERE username = ? ");
			$this -> query -> bind_param("s",$this -> username);
			$this -> query -> execute();
			$this -> result = $this -> query -> get_result();

			if($this -> result -> num_rows != 0){
				$this -> data = $this -> result -> fetch_assoc();
				$this -> data = $this -> data["status"];
				if($this -> data == "active"){
					$this -> query = $this -> db -> prepare("SELECT * FROM user WHERE username = ? AND password = ?");
					$this -> query -> bind_param("ss",$this -> username,$this -> password);
					$this -> query -> execute();
					$this -> result = $this -> query -> get_result();

					$this -> query -> close();
					if($this -> result -> num_rows !=0){
						session_start();
						$_SESSION["username"] = $this -> username; 
						echo "success";
					}
					else{
						echo "failed";
					}
				}
				else{
					echo "please verify your account first";
				}
			}
			else{
				echo "user not found";
			}

		}
	}

	new login();

?>