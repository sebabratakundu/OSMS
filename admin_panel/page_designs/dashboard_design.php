<?php
	
	
 echo '<div class="container my-5">
					<div class="row">
						<div class="card-columns w-100 text-center text-white mb-5">
							<div class="card bg-danger">
								<div class="card-header">
									Request Recieved
								</div>
								<div class="card-body">
									<h4 class="card-title no-of-req"></h4>
									<a href="#" class="btn text-white no-of-req-btn">View</a>
								</div>
								
							</div>
							<div class="card bg-info">
								<div class="card-header">
									Assigned Work
								</div>
								<div class="card-body">
									<h4 class="card-title no-of-assigned-work"></h4>
									<a href="#" class="btn text-white no-of-assigned-work-btn">View</a>
								</div>
							</div>
							<div class="card bg-success">
								<div class="card-header">
									No of Technicians
								</div>
								<div class="card-body">
									<h4 class="card-title no-of-tech"></h4>
									<a href="#" class="btn text-white no-of-tech-btn">View</a>
								</div>
							</div>
						</div>
						<div class="col-md-12 p-0 m-0 text-white">
							<p class="bg-dark p-2 text-center">List of Users</p>
							<div class="table-responsive">
								<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Id</th>
										<th>Name</th>
										<th>Username</th>
										<th>Register Status</th>
										<th>Registration Date</th>
									</tr>
								</thead>
								<tbody>';?>
									<?php
									class get_users{
									private $username;
									private $name;
									private $status;
									private $registration_date;
									private $query;
									private $db;
									private $result;
									private $user_data;
									function __construct(){
										require_once("../../assets/database.php");
										$this -> db = new db();
										$this -> db = $this -> db -> __construct();
										$this -> query = $this -> db -> prepare("SELECT id,name,username,status,reg_date FROM user");
										$this -> query -> execute();
										$this -> result = $this -> query -> get_result();
										$this -> query -> close();
										if($this -> result -> num_rows !=0){
											while($this -> user_data = $this -> result -> fetch_assoc()){
												echo "<tr><td>".$this -> user_data["id"]."</td><td>".$this -> user_data["name"]."</td><td>".$this -> user_data["username"]."</td><td>".$this -> user_data["status"]."</td><td>".$this -> user_data["reg_date"]."</td></tr>";
											}
										}
										else{
											echo "<tr><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td></tr>";
										}
									}
									}
									new get_users();
									?>
								<?php echo '</tbody>
							</table>
							</div>
						</div>
					</div>
				</div>';


?>