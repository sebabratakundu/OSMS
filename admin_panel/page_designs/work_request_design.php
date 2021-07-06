<?php

	echo '<div class="container my-5">
					<div class="row">
						<div class="col-md-4 work-req-box">
							<div>';?>
								<?php
									class work_requests{
										private $req_info;
										private $req_id;
										private $req_des;
										private $req_date;
										private $db;
										private $query;
										private $result;
										private $requester_data;
										private $requestStatus;
										private $req_status;

										function __construct(){
											require_once("../../assets/database.php");
											$this -> db = new db();
											$this -> db = $this -> db -> __construct();

											$this -> requestStatus = "processing";
											$this -> query = $this -> db -> prepare("SELECT id,request_info,request_des,request_date,request_status FROM requester_table WHERE request_status = ?");
											$this -> query -> bind_param("s",$this -> requestStatus);
											$this -> query -> execute();
											$this -> result = $this -> query -> get_result();

											$this -> query -> close();
											if($this -> result -> num_rows !=0){
												while($this -> requester_data = $this -> result -> fetch_assoc()){
													$this -> req_info =  $this -> requester_data["request_info"];
													$this -> req_id = $this -> requester_data["id"];
													$this -> req_des = $this -> requester_data["request_des"];
													$this -> req_date = $this -> requester_data["request_date"];
													$this -> req_status = $this -> requester_data["request_status"];

													echo "<div class='card mb-5 font-lato'><div class='card-header bg-dark text-white'>Request ID : ".$this -> req_id." <p class='float-right p-0 m-0 text-warning status' req-id='".$this -> req_id."'>Status : ".$this -> req_status."</p></div><div class='card-body'><h4>Request Info : ".$this -> req_info."</h4><p>".$this -> req_des."</p><p>Request Date : ".$this -> req_date."</p></div><div class='btn-group'><button class='btn btn-danger view-btn rounded-0' req-id='".$this -> req_id."'>View</button><button class='btn btn-dark close-work-btn rounded-0' req-id='".$this -> req_id."'>Close</button></div></div>";
												}
											}
										}
									}

									new work_requests();

								?>
							<?php echo '</div>
						</div>
						<div class="col-md-8">
							<div class="jumbotron">
								<h4 class="font-gothic mb-3 text-center">Assign Work on Order Request</h4>
								<form class="assign-work-form font-roboto">
							<div class="form-group">
								<label for="req-id">Request ID</label>
								<input type="text" name="req-id" id="req-id" required="required" readonly="readonly" class="form-control">
							</div>
							<div class="form-group">
								<label for="req-info">Request Info</label>
								<input type="text" name="req-info" id="req-info" placeholder="Request info" readonly="readonly" required="required" class="form-control">
							</div>
							<div class="form-group">
								<label for="des">Description</label>
								<input type="text" name="des" id="des" placeholder="Description" readonly="readonly" required="required" class="form-control">
							</div>
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" id="name" placeholder="Ex : Rahul" readonly="readonly" required="required" class="form-control">
							</div>
							<div class="form-group d-flex">
								<div class="flex-fill mr-1">
									<label for="address-1">Address Line 1</label>
									<input type="text" name="address-1" id="address-1" placeholder="House no 2" required="required" readonly="readonly" class="form-control">
								</div>
								<div class="flex-fill ml-1">
									<label for="address-2">Address Line 2</label>
									<input type="text" name="address-2" id="address-2" placeholder="Near market" required="required" readonly="readonly" class="form-control">
								</div>
							</div>
							<div class="form-group d-flex">
								<div class="flex-fill mr-1">
									<label for="city">City</label>
									<input type="text" name="city" id="city" placeholder="siliguri" readonly="readonly" required="required" class="form-control">
								</div>
								<div class="d-flex flex-fill ml-1">
									<div class="flex-fill mr-1">
										<label for="state">State</label>
									<input type="text" name="state" id="state" placeholder="West Bengal" readonly="readonly" required="required" class="form-control">
									</div>
									<div class="flex-fill ml-1">
										<label for="zip">Zip</label>
									<input type="text" name="zip" id="zip" placeholder="734001" readonly="readonly" required="required" class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group d-flex">
								<div class="flex-fill mr-1">
									<label for="email">Email</label>
									<input type="text" name="email" id="email" readonly="readonly" placeholder="example@gmail.com" required="required" class="form-control">
								</div>
								<div class="flex-fill ml-1">
										<label for="mobile">Mobile</label>
									<input type="text" name="mobile" id="mobile" readonly="readonly" placeholder="+91 7001389649" required="required" class="form-control">
								</div>
							</div>
							<div class="form-group d-flex">
								<div class="flex-fill mr-1">
									<label for="assign-tech">Assign Technician</label>
									<select name="assign-tech" id="assign-tech" class="form-control">
										<option>Choose Technician</option>';?>
										<?php
											require_once("../../assets/database.php");
											$db = new db();
											$db = $db -> __construct();

											$query = "SELECT name FROM technician_table";
											$response = $db -> query($query);
											if($response){
												if($response -> num_rows !=0){
													while($data = $response -> fetch_assoc()){
														echo "<option value='".$data['name']."'>".$data['name']."</option>";
													}
												}
												else{
													echo "<option>No technician available</option>";
												}
											}

										?>
									<?php echo '</select>
								</div>
								<div class="flex-fill ml-1">
										<label for="assign-date">Date</label>
									<input type="date" name="assign-date" id="assign-date" placeholder="01/02/2020" required="required" class="form-control">
								</div>
							</div>
							<button class="btn btn-success assign-work-btn mt-3" type="submit">Assign</button>
							<button class="btn btn-danger assign-reset-btn mt-3" type="button">Reset</button>
						</form>
						<div class="assign-work-notice mt-3 d-none"></div>
							</div>
						</div>
					</div>
				</div>';

?>