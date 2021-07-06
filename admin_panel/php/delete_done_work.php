<?php
	class delete_done_work{
		private $req_id;
		private $query;
		private $db;

		function __construct(){
			require_once("../../assets/database.php");
			$this -> db = new db();
			$this -> db = $this -> db -> __construct();
			$this -> req_id = $_POST["req_id"];
			settype($this -> req_id, "integer");

			// delete work

			$this -> query = $this -> db -> prepare("DELETE FROM assignwork_table WHERE request_id = ?");
			$this -> query -> bind_param("i",$this -> req_id);
			$this -> query -> execute();
			if($this -> query -> affected_rows !=0){
				echo "delete success";
			}
			else{
				echo "failed";
			}
		}
	}

	new delete_done_work();
?>