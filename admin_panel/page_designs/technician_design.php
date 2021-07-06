<?php

echo '<div class="container my-5">
<div class="modal fade" id="emp-modal">
					    <div class="modal-dialog modal-dialog-centered">
					      <div class="modal-content">
					      
					        <!-- Modal Header -->
					        <div class="modal-header">
					          <h4 class="modal-title font-gothic">Update Employee Details</h4>
					          <button type="button" class="close d-print-none" data-dismiss="modal">×</button>
					        </div>
					        
					        <!-- Modal body -->
					        <div class="modal-body p-4">
					        <form class="update-emp-form mb-3">
					        	<div class="form-group">
									<label for="emp-id">Employee ID</label>
									<input type="number" name="emp-id" id="emp-id" readonly class="form-control">
								</div>
								<div class="form-group">
									<label for="ename">Name</label>
									<input type="text" name="ename" id="ename" required="required" class="form-control">
								</div>
								<div class="form-group">
									<label for="ecity">City</label>
									<input type="text" name="ecity" id="ecity" required="required" class="form-control">
								</div>
								<div class="form-group">
									<label for="eemail">Email</label>
									<input type="email" name="eemail" id="eemail" required="required" class="form-control">
								</div>
								<div class="form-group">
									<label for="emobile">Mobile</label>
									<input type="number" name="emobile" id="emobile" required="required" class="form-control">
								</div>

								<button class="btn btn-danger update-btn" type="submit">Update</button>
					        </form>
					        <div class="update-emp-notice d-none"></div>
					        </div>
					        </div>
					        </div>
					        </div>
					        <div class="modal fade" id="add-emp-modal">
					    <div class="modal-dialog modal-dialog-centered">
					      <div class="modal-content">
					      
					        <!-- Modal Header -->
					        <div class="modal-header">
					          <h4 class="modal-title font-gothic">Add New Employee</h4>
					          <button type="button" class="close d-print-none" data-dismiss="modal">×</button>
					        </div>
					        
					        <!-- Modal body -->
					        <div class="modal-body p-4">
					        <form class="add-emp-form mb-3">
								<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" id="name" required="required" class="form-control">
					</div>
					<div class="form-group">
						<label for="city">City</label>
						<input type="text" name="city" id="city" required="required" class="form-control">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" id="email" required="required" class="form-control">
					</div>
					<div class="form-group">
						<label for="mobile">Mobile</label>
						<input type="number" name="mobile" id="mobile" required="required" class="form-control">
					</div>
					<button class="btn btn-outline-danger btn-block mt-5 py-2 font-weight-bold add-emp-btn" type="submit">ADD EMPLOYEE</button>
					        </form>
					        <div class="add-emp-notice d-none"></div>
					        </div>
					        </div>
					        </div>
					        </div>
					<div class="row">
						<div class="col-md-12">
							<p class="bg-dark p-2 text-center text-white">List of Employees</p>
							<div class="table-responsive">
								<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Employee ID</th>
										<th>Name</th>
										<th>City</th>
										<th>Email</th>
										<th>Mobile</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="emp-tbody">';?>
									<?php
									class get_employee{
									private $query;
									private $db;
									private $result;
									private $user_data;
									function __construct(){
										require_once("../../assets/database.php");
										$this -> db = new db();
										$this -> db = $this -> db -> __construct();
										$this -> query = $this -> db -> prepare("SELECT id,name,email,city,mobile FROM technician_table");
										$this -> query -> execute();
										$this -> result = $this -> query -> get_result();
										$this -> query -> close();
										if($this -> result -> num_rows !=0){
											while($this -> user_data = $this -> result -> fetch_assoc()){
												echo "<tr><td>".$this -> user_data["id"]."</td><td>".$this -> user_data["name"]."</td><td>".$this -> user_data["city"]."</td><td>".$this -> user_data["email"]."</td><td>".$this -> user_data["mobile"]."</td><td class='text-center'><button class='btn btn-info edit-emp-btn mr-lg-1 mb-1 mb-md-0' emp-id='".base64_encode($this -> user_data["id"])."' name='".base64_encode($this -> user_data["name"])."' username='".base64_encode($this -> user_data["email"])."' city='".base64_encode($this -> user_data["city"])."' mobile='".base64_encode($this -> user_data["mobile"])."'><i class='fa fa-pencil'></i></button><button class='btn btn-dark delete-emp-btn ml-lg-1 mt-1 mt-lg-0' emp-id='".base64_encode($this -> user_data["id"])."'><i class='fa fa-trash'></i></button></td></tr>";
											}
										}
										else{
											echo "<tr><td>0</td><td>null</td><td>null</td><td>null</td><td>0</td><td>null</td></tr>";
										}
									}
									}
									new get_employee();
									?>
								<?php echo '</tbody>
							</table>
							</div>
						</div>
					</div>
					<i class="fa fa-plus-circle text-danger position-fixed add-tech-btn" style="font-size:50px;bottom:50px;right:50px;cursor:pointer;" title="add tech"></i>
				</div>';

?>