<?php

echo '<div class="container my-5">
<div class="modal fade" id="user-modal">
					    <div class="modal-dialog modal-dialog-centered">
					      <div class="modal-content">
					      
					        <!-- Modal Header -->
					        <div class="modal-header">
					          <h4 class="modal-title font-gothic">Update User Details</h4>
					          <button type="button" class="close d-print-none" data-dismiss="modal">×</button>
					        </div>
					        
					        <!-- Modal body -->
					        <div class="modal-body p-4">
					        <form class="update-user-form mb-3">
								<div class="form-group">
									<label for="user-id">User ID</label>
									<input type="number" name="user-id" id="user-id" class="form-control" readonly>
								</div>
								<div class="form-group">
									<label for="name">Name</label>
									<input type="text" name="name" id="uname" class="form-control" required="required">
								</div>
								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" name="email" id="email" class="form-control" required="required">
								</div>

								<button class="btn btn-danger update-btn" type="submit">Update</button>
					        </form>
					        <div class="update-user-notice d-none"></div>
					        </div>
					        </div>
					        </div>
					        </div>
					        <div class="modal fade" id="add-user-modal">
					    <div class="modal-dialog modal-dialog-centered">
					      <div class="modal-content">
					      
					        <!-- Modal Header -->
					        <div class="modal-header">
					          <h4 class="modal-title font-gothic">Add New User</h4>
					          <button type="button" class="close d-print-none" data-dismiss="modal">×</button>
					        </div>
					        
					        <!-- Modal body -->
					        <div class="modal-body p-4">
					        <form class="add-user-form mb-3">
								<div class="form-group">
						<label for="name"><i class="fa fa-user mr-2"></i>Name</label>
						<input type="text" name="name" id="name" required="required" class="form-control">
					</div>
					<div class="form-group">
						<label for="username"><i class="fa fa-envelope mr-2"></i>Email</label>
						<input type="email" name="username" id="username" required="required" class="form-control">
						<small class="text-info">we will never share your your email with anyone else</small>
					</div>
					<div class="form-group">
						<label for="password"><i class="fa fa-key mr-2"></i>Password</label>
						<input type="password" name="password" id="password" required="required" class="form-control">
					</div>
					<div class="form-group">
						<label for="con-password"><i class="fa fa-check mr-2"></i>Confirm Password</label>
						<div class="position-relative">
						<input type="password" name="con-password" id="con-password" required="required" class="form-control">
						<span  class="position-absolute text-danger d-none match-pass" style="top:8px;right:5px;"><i class="fa fa-times-circle match-pass-icon"></i></span>
						</div>
					</div>
					<button class="btn btn-outline-danger btn-block mt-5 py-2 font-weight-bold reg-btn" type="submit">ADD USER</button>
					        </form>
					        <div class="add-user-notice d-none"></div>
					        </div>
					        </div>
					        </div>
					        </div>
					<div class="row">
						<div class="col-md-12">
							<p class="bg-dark p-2 text-center text-white">List of Users</p>
							<div class="table-responsive">
								<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th> Requester ID</th>
										<th>Name</th>
										<th>Username</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>';?>
									<?php
									class get_users{
									private $id;
									private $username;
									private $name;
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
												echo "<tr><td>".$this -> user_data["id"]."</td><td>".$this -> user_data["name"]."</td><td>".$this -> user_data["username"]."</td><td class='text-center'><button class='btn btn-info edit-user-btn mr-lg-1 mb-1 mb-lg-0' user-id='".base64_encode($this -> user_data["id"])."' name='".base64_encode($this -> user_data["name"])."' username='".base64_encode($this -> user_data["username"])."'><i class='fa fa-pencil'></i></button><button class='btn btn-dark delete-user-btn ml-lg-1 mt-1 mt-lg-0' user-id='".base64_encode($this -> user_data["id"])."'><i class='fa fa-trash'></i></button></td></tr>";
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
					<i class="fa fa-plus-circle text-danger position-fixed add-user-btn" style="font-size:50px;bottom:50px;right:50px;cursor:pointer;" title="add user"></i>
				</div>';

?>