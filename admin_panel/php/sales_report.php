<?php

	class sales_report{
		private $all_data = [];
		private $start_date;
		private $end_date;
		private $query;
		private $db;
		private $result;
		private $data;

		function __construct(){
			require_once("../../assets/database.php");
			$this -> db = new db();
			$this -> db = $this -> db -> __construct();

			$this -> start_date = $_POST["start-date"];
			$this -> end_date = $_POST["end-date"];

			$this -> query = $this -> db -> prepare("SELECT * FROM customer_table WHERE sell_date BETWEEN ? AND ?");
			$this -> query -> bind_param("ss",$this -> start_date,$this -> end_date);
			$this -> query -> execute();
			$this -> result = $this -> query -> get_result();
			$this -> query -> close();
			if($this -> result -> num_rows !=0){
				while($this -> data = $this -> result -> fetch_assoc()){
					array_push($this -> all_data, $this -> data);
				}

				echo json_encode($this -> all_data);
			}
			else{
				echo "failed";
			}

		}
	}

	new sales_report();

?>