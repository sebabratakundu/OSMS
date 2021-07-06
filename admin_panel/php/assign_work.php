<?php
	class assign_work{
		private $req_id;
		private $req_info;
		private $req_des;
		private $req_name;
		private $req_add1;
		private $req_add2;
		private $req_city;
		private $req_state;
		private $req_pincode;
		private $req_email;
		private $req_mobile;
		private $assign_tech;
		private $assign_date;
		private $query;
		private $db;
		private $request_status;

		function __construct(){
			require_once("../../assets/database.php");
			$this -> db = new db();
			$this -> db = $this -> db -> __construct();

			$this -> req_id = trim($_POST["req-id"]);
			settype($this -> req_id, "integer");

			$this -> req_info = trim($_POST["req-info"]);
			$this -> req_des = trim($_POST["des"]);
			$this -> req_name = trim($_POST["name"]);
			$this -> req_add1 = trim($_POST["address-1"]);
			$this -> req_add2 = trim($_POST["address-2"]);
			$this -> req_city = trim($_POST["city"]);
			$this -> req_state = trim($_POST["state"]);
			$this -> req_pincode = trim($_POST["zip"]);
			settype($this -> req_pincode, "integer");

			$this -> req_email = trim($_POST["email"]);
			$this -> req_mobile = trim($_POST["mobile"]);
			settype($this -> req_mobile, "integer");

			$this -> assign_tech = trim($_POST["assign-tech"]);
			$this -> assign_tech = mysqli_real_escape_string($this -> db , $this -> assign_tech);
			$this -> assign_tech = strip_tags($this -> assign_tech);

			$this -> assign_date = $_POST["assign-date"];

			//insert data

			$this -> query = $this -> db -> prepare("INSERT INTO assignwork_table(request_id,request_info,request_des,requester_name,requester_add_1,requester_add_2,requester_city,requester_state,requester_pincode,requester_email,requester_mobile,assigned_tech,assign_date) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");

			$this -> query -> bind_param("isssssssisiss",$this -> req_id,$this -> req_info,$this -> req_des,$this -> req_name,$this -> req_add1,$this -> req_add2,$this -> req_city,$this -> req_state,$this -> req_pincode,$this -> req_email,$this -> req_mobile,$this -> assign_tech,$this -> assign_date);
			$this -> query -> execute();
			if($this -> query -> affected_rows !=0){

				$this -> request_status = "approved";

				$this -> query = $this -> db -> prepare("UPDATE requester_table SET request_status = ? WHERE id = ?");
				$this -> query -> bind_param("ss",$this -> request_status,$this -> req_id);
				$this -> query -> execute();
				if($this -> query -> affected_rows !=0){
					echo "success";
				}
				else{
					echo "failed";
				}
			}
			else{
				echo "failed";
			}

			$this -> query -> close();

		}
	}

	new assign_work();
?>