<?php
	require_once("../assets/database.php");

	class main{
		private $code;
		private $username;
		private $response;
		function __construct(){
			$this -> code = trim($_POST["code"]);
			$this -> code = base64_decode($this -> code);
			$this -> username = base64_decode($_POST["username"]);
			$this -> response = activate_account::active_code($this -> code,$this -> username);
			if($this -> response){
				$this -> response = activate_account::update_status($this -> username);
				if($this -> response){
					echo "success";
				}
				else{
					echo "failed to update";
				}
			}
			else{
				echo "failed to match code";
			}
		}
	}

	new main();

	class activate_account{
		private static $act_code;
		private static $query;
		private static $db;
		private static $username;
		private static $result;
		private static $active_txt;
		static function active_code($code,$username){
			self::$act_code = $code;
			self::$username = $username;
			self::$db = new db();
			self::$db = self::$db -> __construct();
			//match code

			self::$query = self::$db -> prepare("SELECT * FROM user WHERE username = ? AND activation_code = ?");
			self::$query -> bind_param("si",self::$username,self::$act_code);
			self::$query -> execute();
			self::$result = self::$query -> get_result();
			self::$query -> close();
			if(self::$result -> num_rows !=0){
				return true;
			}
			else{
				return false;
			}

		}

		static function update_status($username){
			self::$username = $username;
			self::$active_txt = "active";
			self::$db = new db();
			self::$db = self::$db -> __construct();

			self::$query = self::$db -> prepare("UPDATE user SET status = ? WHERE username = ? ");
			self::$query -> bind_param("ss",self::$active_txt,self::$username);
			self::$query -> execute();
			if(self::$query -> affected_rows !=0){
				return true;
			}
			else{
				return false;
			}
		}
	}

?>