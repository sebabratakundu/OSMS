<?php
	class update_user{
		private $emp_id;
		private $name;
		private $email;
		private $city;
		private $mobile;
		private $query;
		private $db;

		function __construct(){
			require_once("../../assets/database.php");
			$this -> db = new db();
			$this -> db = $this -> db -> __construct();
			$this -> emp_id = $_POST["emp-id"];
			settype($this -> emp_id, "integer");

			$this -> name = trim($_POST["ename"]);
			$this -> name = mysqli_real_escape_string($this -> db,$this -> name);
			$this -> name = strip_tags($this -> name);

			$this -> email = $_POST["eemail"];
			$this -> email = mysqli_real_escape_string($this -> db,$this -> email);
			$this -> email = strip_tags($this -> email);

			$this -> city = $_POST["ecity"];
			$this -> city = mysqli_real_escape_string($this -> db,$this -> city);
			$this -> city = strip_tags($this -> city);

			$this -> mobile = $_POST["emobile"];
			$this -> mobile = mysqli_real_escape_string($this -> db,$this -> mobile);
			$this -> mobile = strip_tags($this -> mobile);
			settype($this -> mobile, "integer");

			$this -> query = $this -> db -> prepare("UPDATE technician_table SET name=?,email=?,city=?,mobile=? WHERE id=?");
			$this -> query -> bind_param("sssii",$this -> name,$this -> email,$this -> city,$this -> mobile,$this -> emp_id);
			$this -> query -> execute();
			
			if($this -> query -> affected_rows ==1){
				echo "update success";
			}
			else{
				echo $this -> db -> error;
			}

			$this -> query -> close();
		}
	}

	new update_user();

?>