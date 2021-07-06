<?php
	
	class view_request{
		private $req_id;
		private $query;
		private $db;
		private $result;
		private $requester_data;
		private $all_data = [];

		function __construct(){
			require_once("../../assets/database.php");
			$this -> db = new db();
			$this -> db = $this -> db -> __construct();
			$this -> req_id = $_POST["req_id"];

			$this -> query = $this -> db -> prepare("SELECT * FROM requester_table WHERE id = ?");
			$this -> query -> bind_param("s",$this -> req_id);
			$this -> query -> execute();
			$this -> result = $this -> query -> get_result();
			$this -> query -> close();
			if($this -> result -> num_rows !=0){
				$this -> requester_data = $this -> result -> fetch_assoc();
					array_push($this -> all_data,  $this -> requester_data["request_info"]);
					array_push($this -> all_data,  $this -> requester_data["request_des"]);
					array_push($this -> all_data,  $this -> requester_data["requester_name"]);
					array_push($this -> all_data,  $this -> requester_data["requester_add_1"]);
					array_push($this -> all_data,  $this -> requester_data["requester_add_2"]);
					array_push($this -> all_data,  $this -> requester_data["requester_city"]);
					array_push($this -> all_data,  $this -> requester_data["requester_state"]);
					array_push($this -> all_data,  $this -> requester_data["requester_pincode"]);
					array_push($this -> all_data,  $this -> requester_data["requester_email"]);
					array_push($this -> all_data,  $this -> requester_data["requester_mobile"]);
					array_push($this -> all_data,  $this -> requester_data["request_date"]);

				echo json_encode($this -> all_data);
			}
			else{
				echo "failed";
			}
		}
	}

	new view_request();

?>