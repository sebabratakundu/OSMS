<?php

class add_product{
	private $name;
	private $dop;
		private $qty;
		private $total;
		private $o_price;
		private $s_price;
	private $prepare_query;
	private $result;

	function __construct(){
		require_once("../../assets/database.php");
		$this -> db = new db();
		$this -> db = $this -> db -> __construct();
		$this -> name = trim($_POST["name"]);
		$this -> name = mysqli_real_escape_string($this -> db, $this -> name);
		$this -> name = strip_tags($this -> name);

		$this -> dop = $_POST["dop"];
			$this -> dop = mysqli_real_escape_string($this -> db,$this -> dop);
			$this -> dop = strip_tags($this -> dop);

			$this -> qty = $_POST["qty"];
			$this -> qty = mysqli_real_escape_string($this -> db,$this -> qty);
			$this -> qty = strip_tags($this -> qty);
			settype($this -> qty, "integer");

			$this -> total = $_POST["total"];
			$this -> total = mysqli_real_escape_string($this -> db,$this -> total);
			$this -> total = strip_tags($this -> total);
			settype($this -> total, "integer");

			$this -> o_price = $_POST["o-price"];
			$this -> o_price = mysqli_real_escape_string($this -> db,$this -> o_price);
			$this -> o_price = strip_tags($this -> o_price);
			settype($this -> o_price, "float");

			$this -> s_price = $_POST["s-price"];
			$this -> s_price = mysqli_real_escape_string($this -> db,$this -> s_price);
			$this -> s_price = strip_tags($this -> s_price);
			settype($this -> s_price, "float");


 		//prepare query

 		$this -> prepare_query = $this -> db -> prepare("SELECT * FROM assets_table WHERE name = ?");
 		$this -> prepare_query -> bind_param('s',$this -> email);
 		$this -> prepare_query -> execute();
 		$this -> result = $this -> prepare_query -> get_result();
 		$this -> prepare_query -> close();

 		if($this -> result -> num_rows != 0){
 			echo "product exist";
 		}
 		else{
 			//insert user data
 			
 			$this -> prepare_query = $this -> db -> prepare("INSERT INTO assets_table(name,dop,qty,total,original_price,sale_price) VALUES(?,?,?,?,?,?)");
 			$this -> prepare_query -> bind_param("ssiiss",$this -> name,$this -> dop,$this -> qty,$this -> total,$this -> o_price,$this -> s_price);
 			$this -> prepare_query -> execute();

 			if($this -> prepare_query -> affected_rows !=0){
 				echo "success";
 			}
 			else{
 				echo "failed";
 			}

 			$this -> prepare_query -> close();

 		}

	}
}

new add_product();

?>