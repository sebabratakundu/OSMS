<?php
	class req_status{
		private $req_id;
		private $query;
		private $db;
		private $result;
		private $data;
		private $response;
		private $all_data = [];
		private $username;

		function __construct(){
			require_once("../../assets/database.php");
			$this -> db = new db();
			$this -> db = $this -> db -> __construct();

			$this -> req_id = trim($_POST["req-id"]);
			$this -> req_id = mysqli_real_escape_string($this -> db,$this -> req_id);
			$this -> req_id = strip_tags($this -> req_id);
			session_start();
			$this -> username = $_SESSION["username"];

			$this -> response = check_req_id::check_id($this -> req_id,$this -> username);

			if($this -> response == "approved"){
				$this -> query = $this -> db -> prepare("SELECT * FROM assignwork_table WHERE request_id = ?");
				$this -> query -> bind_param("i",$this -> req_id);
				$this -> query -> execute();
				$this -> result = $this -> query -> get_result();

				$this -> query -> close();
				if($this -> result -> num_rows !=0){
					$this -> data = $this -> result -> fetch_assoc();
					array_push($this -> all_data, $this -> data);

					echo json_encode($this -> all_data);
			}
		}
		else if($this -> response == "processing"){
				echo "request is in process";
		}
		else{
			echo "no data";
		}
	}
}

	class check_req_id{
		private static $req_id;
		private static $query;
		private static $db;
		private static $result;
		private static $username;
		private static $request_status;

		static function check_id($req_id,$username){
			require_once("../../assets/database.php");
			self::$db = new db();
			self::$db = self::$db -> __construct();

			self::$req_id = $req_id;
			self::$username = $username;

			self::$query = self::$db -> prepare("SELECT * FROM requester_table WHERE id = ? AND requester_email = ?");
			self::$query -> bind_param("is",self::$req_id,self::$username);
			self::$query -> execute();
			self::$result = self::$query -> get_result();
			self::$query -> close();
			if(self::$result -> num_rows !=0){
				self::$request_status = self::$result -> fetch_assoc();
				self::$request_status = self::$request_status["request_status"];
				if(self::$request_status == "processing"){
					return "processing";
				}
				else{
					return "approved";
				}
			}
			else{
				return "no data";
			}
		}
	}

new req_status();
?>