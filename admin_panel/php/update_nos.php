<?php
	class main{
		private $no_of_req;
		private $no_of_ass_work;
		private $no_of_tech;
		private $all_data = [];

		function __construct(){
			$this -> no_of_req = numbers::no_of_requester();
			$this -> no_of_ass_work = numbers::no_of_assigned_work();
			$this -> no_of_tech = numbers::no_of_technician();

			array_push($this -> all_data, $this -> no_of_req);
			array_push($this -> all_data, $this -> no_of_ass_work);
			array_push($this -> all_data, $this -> no_of_tech);

			echo json_encode($this -> all_data);

		}	
	}

	class numbers{
		private static $no_of_req;
		private static $no_of_ass_work;
		private static $no_of_tech;
		private static $db;
		private static $query;
		private static $result;

		static function no_of_requester(){
			require_once("../../assets/database.php");
			self::$db = new db();
			self::$db = self::$db -> __construct();

			self::$query = self::$db -> prepare("SELECT COUNT(id) AS result FROM requester_table");
			self::$query -> execute();
			self::$result = self::$query -> get_result();
			self::$query -> close();
			if(self::$result -> num_rows !=0){
				self::$no_of_req = self::$result -> fetch_assoc();
				self::$no_of_req = self::$no_of_req["result"];
				return self::$no_of_req;
			}
		}

		static function no_of_assigned_work(){
			require_once("../../assets/database.php");
			self::$db = new db();
			self::$db = self::$db -> __construct();

			self::$query = self::$db -> prepare("SELECT COUNT(id) AS result FROM assignwork_table");
			self::$query -> execute();
			self::$result = self::$query -> get_result();
			self::$query -> close();
			if(self::$result -> num_rows !=0){
				self::$no_of_ass_work = self::$result -> fetch_assoc();
				self::$no_of_ass_work = self::$no_of_ass_work["result"];
				return self::$no_of_ass_work;
			}
		}

		static function no_of_technician(){
			require_once("../../assets/database.php");
			self::$db = new db();
			self::$db = self::$db -> __construct();

			self::$query = self::$db -> prepare("SELECT COUNT(id) AS result FROM technician_table");
			self::$query -> execute();
			self::$result = self::$query -> get_result();
			self::$query -> close();
			if(self::$result -> num_rows !=0){
				self::$no_of_tech = self::$result -> fetch_assoc();
				self::$no_of_tech = self::$no_of_tech["result"];
				return self::$no_of_tech;
			}
		}
	}

	new main();

?>