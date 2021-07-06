<?php
	class update_product{
		private $product_id;
		private $name;
		private $dop;
		private $qty;
		private $total;
		private $o_price;
		private $s_price;
		private $query;
		private $db;

		function __construct(){
			require_once("../../assets/database.php");
			$this -> db = new db();
			$this -> db = $this -> db -> __construct();
			$this -> pro_id = $_POST["pro-id"];
			settype($this -> pro_id, "integer");

			$this -> name = trim($_POST["pname"]);
			$this -> name = mysqli_real_escape_string($this -> db,$this -> name);
			$this -> name = strip_tags($this -> name);

			$this -> dop = $_POST["pdop"];
			$this -> dop = mysqli_real_escape_string($this -> db,$this -> dop);
			$this -> dop = strip_tags($this -> dop);

			$this -> qty = $_POST["pqty"];
			$this -> qty = mysqli_real_escape_string($this -> db,$this -> qty);
			$this -> qty = strip_tags($this -> qty);
			settype($this -> qty, "integer");

			$this -> total = $_POST["ptotal"];
			$this -> total = mysqli_real_escape_string($this -> db,$this -> total);
			$this -> total = strip_tags($this -> total);
			settype($this -> total, "integer");

			$this -> o_price = $_POST["po-price"];
			$this -> o_price = mysqli_real_escape_string($this -> db,$this -> o_price);
			$this -> o_price = strip_tags($this -> o_price);
			settype($this -> o_price, "float");

			$this -> s_price = $_POST["ps-price"];
			$this -> s_price = mysqli_real_escape_string($this -> db,$this -> s_price);
			$this -> s_price = strip_tags($this -> s_price);
			settype($this -> s_price, "float");

			$this -> query = $this -> db -> prepare("UPDATE assets_table SET name=?,dop=?,qty=?,total=?,original_price=?,sale_price=? WHERE id=?");
			$this -> query -> bind_param("ssiissi",$this -> name,$this -> dop,$this -> qty,$this -> total,$this -> o_price,$this -> s_price,$this -> pro_id);
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

	new update_product();

?>