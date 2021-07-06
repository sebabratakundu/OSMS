<?php
	class request_submit{
		private $request_info;
		private $request_des;
		private $requester_name;
		private $requester_add1;
		private $requester_add2;
		private $requester_city;
		private $requester_state;
		private $requester_pincode;
		private $requester_email;
		private $requester_mobile;
		private $db;
		private $query;

		function __construct(){
			require_once("../../assets/database.php");
			$this -> db = new db();
			$this -> db = $this -> db -> __construct();

			$this -> request_info = trim($_POST["req-info"]);
			$this -> request_info = mysqli_real_escape_string($this -> db,$this -> request_info);
			$this -> request_info = strip_tags($this -> request_info);

			$this -> request_des = trim($_POST["des"]);
			$this -> request_des = mysqli_real_escape_string($this -> db,$this -> request_des);
			$this -> request_des = strip_tags($this -> request_des);

			$this -> requester_name = trim($_POST["name"]);
			$this -> requester_name = mysqli_real_escape_string($this -> db,$this -> requester_name);
			$this -> requester_name = strip_tags($this -> requester_name);

			$this -> requester_add1 = trim($_POST["address-1"]);
			$this -> requester_add1 = mysqli_real_escape_string($this -> db,$this -> requester_add1);
			$this -> requester_add1 = strip_tags($this -> requester_add1);

			$this -> requester_add2 = trim($_POST["address-2"]);
			$this -> requester_add2 = mysqli_real_escape_string($this -> db,$this -> requester_add2);
			$this -> requester_add2 = strip_tags($this -> requester_add2);

			$this -> requester_city = trim($_POST["city"]);
			$this -> requester_city = mysqli_real_escape_string($this -> db,$this -> requester_city);
			$this -> requester_city = strip_tags($this -> requester_city);

			$this -> requester_state = trim($_POST["state"]);
			$this -> requester_state = mysqli_real_escape_string($this -> db,$this -> requester_state);
			$this -> requester_state = strip_tags($this -> requester_state);

			$this -> requester_pincode = trim($_POST["zip"]);
			$this -> requester_pincode = mysqli_real_escape_string($this -> db,$this -> requester_pincode);
			$this -> requester_pincode = strip_tags($this -> requester_pincode);
			settype($this -> requester_pincode, "integer");

			$this -> requester_email = trim($_POST["email"]);
			$this -> requester_email = mysqli_real_escape_string($this -> db,$this -> requester_email);
			$this -> requester_email = strip_tags($this -> requester_email);

			$this -> requester_mobile = trim($_POST["mobile"]);
			$this -> requester_mobile = mysqli_real_escape_string($this -> db,$this -> requester_mobile);
			$this -> requester_mobile = strip_tags($this -> requester_mobile);
			settype($this -> requester_mobile, "integer");

			$this -> query = $this -> db -> prepare("INSERT INTO requester_table(request_info,request_des,requester_name,requester_add_1,requester_add_2,requester_city,requester_state,requester_pincode,requester_email,requester_mobile) VALUES(?,?,?,?,?,?,?,?,?,?)");

			$this -> query -> bind_param("sssssssisi",$this -> request_info,$this -> request_des,$this -> requester_name,$this -> requester_add1,$this -> requester_add2,$this -> requester_city,$this -> requester_state,$this -> requester_pincode,$this -> requester_email,$this -> requester_mobile);

			$this -> query -> execute();

			if($this -> query -> affected_rows ==1){
				echo "success";
			}
			else{
				echo $this -> db -> error;
			}

			$this -> query -> close();

		}
	}

	new request_submit();

?>