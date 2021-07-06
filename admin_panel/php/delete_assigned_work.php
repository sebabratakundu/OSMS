<?php
	class delete_assigned_work{
		private $req_id;
		private $query;
		private $result;
		private $req_status;
		private $data;

		function __construct(){
			require_once("../../assets/database.php");
			$this -> db = new db();
			$this -> db = $this -> db -> __construct();
			$this -> req_id = $_POST["req_id"];

			$this -> query = $this -> db -> prepare("SELECT request_status FROM requester_table WHERE id = ?");
			$this -> query -> bind_param("s",$this -> req_id);
			$this -> query -> execute();
			$this -> result = $this -> query -> get_result();
			$this -> query -> close();
			if($this -> result -> num_rows !=0){
				$this -> data = $this -> result -> fetch_assoc();
				$this -> req_status = $this -> data["request_status"];
				if($this -> req_status == "approved"){
					echo "delete success";
				}
				else{
					echo "work not assigned";
				}
			}
			else{
				echo "delete failed";
			}
		}
	}

	new delete_assigned_work();

?>