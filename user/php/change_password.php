<?php
	class main{
		private $old_password;
		private $new_password;
		private $db;
		private $response;
		private $username;
		function __construct(){
			require_once("../../assets/database.php");
			$this -> db = new db();
			$this -> db = $this -> db -> __construct();

			session_start();
			$this -> username = $_SESSION["username"];

			$this -> old_password = trim($_POST["password"]);
			$this -> old_password = mysqli_real_escape_string($this -> db,$this -> old_password);
			$this -> old_password = strip_tags($this -> old_password);
			$this -> old_password = md5($this -> old_password);

			$this -> new_password = $_POST["new-password"];
			$this -> new_password = mysqli_real_escape_string($this -> db,$this -> new_password);
			$this -> new_password = strip_tags($this -> new_password);
			$this -> new_password = md5($this -> new_password);

			$this -> response = change_password::check_password($this -> old_password,$this -> username);
			if($this -> response){
				$this -> response = change_password::update_password($this -> new_password,$this -> username);
				if($this -> response){
					echo "update success";
				}
				else{
					echo "update failed";
				}
			}
			else{
				echo "not matched";
			}
		}
	}

	new main;


	class change_password{
		private static  $old_password;
		private static $new_password;
		private static $db;
		private static $result;
		private static $query;
		private static $username;
		private static $old_stored_pass;

		static function check_password($old_password,$username){
			require_once("../../assets/database.php");
			self::$db = new db();
			self::$db = self::$db -> __construct();

			self::$old_password = $old_password;			
			self::$username = $username;

			//check

			self::$query = self::$db -> prepare("SELECT password FROM user WHERE username = ?");
			self::$query -> bind_param("s",self::$username);
			self::$query -> execute();
			self::$result = self::$query -> get_result();
			self::$query -> close();
			if(self::$result -> num_rows !=0){
				self::$old_stored_pass = self::$result -> fetch_assoc();
				self::$old_stored_pass = self::$old_stored_pass["password"];
				if(self::$old_password == self::$old_stored_pass){
					return true;
				}
				else{
					return false;
				}
			}
		}

		static function update_password($new_password,$username){
			require_once("../../assets/database.php");
			self::$db = new db();
			self::$db = self::$db -> __construct();

			self::$new_password = $new_password;
			self::$username = $username;

			self::$query = self::$db -> prepare("UPDATE user SET password = ? WHERE username = ?");
			self::$query -> bind_param("ss",self::$new_password,self::$username);
			self::$query -> execute();

			if(self::$query -> affected_rows ==1){
				return true;
			}
			else{
				return false;
			}

			self::$query -> close();
		}
	}

?>