<?php

	class sell_product{
		private $cus_name;
		private $cus_address;
		private $cus_email;
		private $cus_mobile;
		private $product_id;
		private $product_name;
		private $qty;
		private $price;
		private $total;
		private $db;
		private $query;
		private $result;
		private $qty_data;

		function __construct(){
			require_once("../../assets/database.php");
			$this -> db = new db();
			$this -> db = $this -> db -> __construct();

			$this -> cus_name = trim($_POST["cus-name"]);
			$this -> cus_name = mysqli_real_escape_string($this -> db,$this -> cus_name);
			$this -> cus_name = strip_tags($this -> cus_name);

			$this -> cus_address = trim($_POST["cus-address"]);
			$this -> cus_address = mysqli_real_escape_string($this -> db,$this -> cus_address);
			$this -> cus_address = strip_tags($this -> cus_address);

			$this -> cus_name = trim($_POST["cus-name"]);
			$this -> cus_name = mysqli_real_escape_string($this -> db,$this -> cus_name);
			$this -> cus_name = strip_tags($this -> cus_name);

			$this -> cus_email = trim($_POST["cus-email"]);
			$this -> cus_email = mysqli_real_escape_string($this -> db,$this -> cus_email);
			$this -> cus_email = strip_tags($this -> cus_email);

			$this -> cus_mobile = trim($_POST["cus-mobile"]);
			$this -> cus_mobile = mysqli_real_escape_string($this -> db,$this -> cus_mobile);
			$this -> cus_mobile = strip_tags($this -> cus_mobile);
			settype($this -> cus_mobile, "integer");

			$this -> product_id = trim($_POST["spro-id"]);
			$this -> product_id = mysqli_real_escape_string($this -> db,$this -> product_id);
			$this -> product_id = strip_tags($this -> product_id);
			settype($this -> product_id, "integer");

			$this -> product_name = trim($_POST["sname"]);
			$this -> product_name = mysqli_real_escape_string($this -> db,$this -> product_name);
			$this -> product_name = strip_tags($this -> product_name);

			$this -> qty = trim($_POST["cqty"]);
			$this -> qty = mysqli_real_escape_string($this -> db,$this -> qty);
			$this -> qty = strip_tags($this -> qty);
			settype($this -> qty, "integer");

			$this -> price = trim($_POST["sprice"]);
			$this -> price = mysqli_real_escape_string($this -> db,$this -> price);
			$this -> price = strip_tags($this -> price);

			$this -> total = trim($_POST["total-price"]);
			$this -> total = mysqli_real_escape_string($this -> db,$this -> total);
			$this -> total = strip_tags($this -> total);

			$this -> query = $this -> db -> prepare("INSERT INTO customer_table(customer_name,customer_address,customer_email,customer_mobile,product_id,product_name,qty,price_each,total) VALUES(?,?,?,?,?,?,?,?,?)");
			$this -> query -> bind_param("sssiisiss",$this -> cus_name,$this -> cus_address,$this -> cus_email,$this -> cus_mobile,$this -> product_id,$this -> product_name,$this -> qty,$this -> price,$this -> total);
			$this -> query -> execute();
			if($this -> query -> affected_rows !=0){
				$this -> query = $this -> db -> prepare("SELECT qty FROM assets_table WHERE id=?");
				$this -> query -> bind_param("i",$this -> product_id);
				$this -> query -> execute();
				$this -> result = $this -> query -> get_result();
				$this -> query -> close();
				if($this -> result -> num_rows !=0){
					$this -> qty_data = $this -> result -> fetch_assoc();
					$this -> qty_data = $this -> qty_data["qty"];
					settype($this -> qty_data, "integer");
					$this -> qty_data = $this -> qty_data - $this -> qty;

					$this -> query = $this -> db -> prepare("UPDATE assets_table SET qty=? WHERE id=?");
					$this -> query -> bind_param("ii",$this -> qty_data,$this -> product_id);
					$this -> query -> execute();
					if($this -> query -> affected_rows !=0){
						echo "update success";
					}
					else{
						echo "update failed";
					}
				}
				else{
					echo "failed to select qty";
				}
			}	
			else{
				echo "failed";
			}

			$this -> query -> close();
		}
	}

	new sell_product();

?>