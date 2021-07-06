<?php
	class delete_user{
		private $user_id;
		private $query;
		private $db;

		function __construct(){
			require_once("../../assets/database.php");
			$this -> db = new db();
			$this -> db = $this -> db -> __construct();
			$this -> user_id = base64_decode($_POST["user_id"]);
			settype($this -> user_id, "integer");

			// delete work

			$this -> query = $this -> db -> prepare("DELETE FROM user WHERE id = ?");
			$this -> query -> bind_param("i",$this -> user_id);
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