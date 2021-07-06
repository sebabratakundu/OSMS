<?php
	class delete_user{
		private $emp_id;
		private $query;
		private $db;

		function __construct(){
			require_once("../../assets/database.php");
			$this -> db = new db();
			$this -> db = $this -> db -> __construct();
			$this -> emp_id = base64_decode($_POST["emp_id"]);
			settype($this -> emp_id, "integer");

			// delete work

			$this -> query = $this -> db -> prepare("DELETE FROM technician_table WHERE id = ?");
			$this -> query -> bind_param("i",$this -> emp_id);
			$this -> query -> execute();
			if($this -> query -> affected_rows !=0){
				echo "delete success";
			}
			else{
				echo "failed";
			}
		}
	}

	new delete_user();

?>