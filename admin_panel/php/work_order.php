<?php
require_once("../../assets/database.php");

class work_order
{
	private $query;
	private $result;
	private $db;
	private $data;
	private $all_data = [];

	function __construct()
	{
		$this->db = new db();
		$this->db = $this->db->__construct();

		$this->query = $this->db->prepare("SELECT * FROM assignwork_table");
		$this->query->execute();
		$this->result = $this->query->get_result();
		$this->query->close();
		if ($this->result->num_rows != 0) {
			while ($this->data = $this->result->fetch_assoc()) {
				array_push($this->all_data, $this->data);
			}

			echo json_encode($this->all_data);
		} else {
			echo "no work assigned";
		}
	}
}

new work_order();
