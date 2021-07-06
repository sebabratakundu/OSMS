<?php
	class req_provesheet{
		private $username;
		private $db;
		private $query;
		private $result;
		private $data;
		private $req_id;

		function __construct(){
			require_once("../../assets/database.php");
			$this -> db = new db();
			$this -> db = $this -> db -> __construct();
			session_start();
			$this -> username = $_SESSION["username"];

			$this -> query = $this -> db -> prepare("SELECT id FROM requester_table WHERE requester_email = ?");
			$this -> query -> bind_param("s",$this -> username);
			$this -> query -> execute();
			$this -> result = $this -> query -> get_result();
			$this -> query -> close();
			if($this -> result -> num_rows !=0){
				while($this -> data = $this -> result -> fetch_assoc()){
					$this -> req_id = $this -> data["id"];
				}
				echo $this -> req_id;
			}
			else{
				echo "no data";
			}
		}
	}

	new req_provesheet();

?>