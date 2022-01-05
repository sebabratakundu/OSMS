<?php
require_once("../../assets/database.php");

class admin_login
{
	private $username;
	private $password;
	private $db;
	private $query;
	private $result;
	private $data;

	function __construct()
	{
		$this->db = new db();
		$this->db = $this->db->__construct();

		$this->username = trim($_POST["username"]);
		$this->username = mysqli_real_escape_string($this->db, $this->username);
		$this->username = strip_tags($this->username);

		$this->password = $_POST["password"];
		$this->password = mysqli_real_escape_string($this->db, $this->password);
		$this->password = strip_tags($this->password);
		$this->password = md5($this->password);

		$this->query = $this->db->prepare("SELECT * FROM admin_login WHERE admin_username = ? AND admin_password = ?");
		$this->query->bind_param("ss", $this->username, $this->password);
		$this->query->execute();
		$this->result = $this->query->get_result();

		$this->query->close();
		if ($this->result->num_rows != 0) {
			session_start();
			$_SESSION["admin"] = $this->username;
			echo "success";
		} else {
			echo "failed";
		}

	}
}

new admin_login();
