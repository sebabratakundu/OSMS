<?php
	class delete_product{
		private $pro_id;
		private $query;
		private $db;

		function __construct(){
			require_once("../../assets/database.php");
			$this -> db = new db();
			$this -> db = $this -> db -> __construct();
			$this -> pro_id = base64_decode($_POST["pro_id"]);
			settype($this -> pro_id, "integer");

			// delete work

			$this -> query = $this -> db -> prepare("DELETE FROM assets_table WHERE id = ?");
			$this -> query -> bind_param("i",$this -> pro_id);
			$this -> query -> execute();
			if($this -> query -> affected_rows !=0){
				echo "delete success";
			}
			else{
				echo "failed";
			}
		}
	}

	new delete_product();

?>