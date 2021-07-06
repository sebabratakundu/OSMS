<?php
	echo '<div class="container my-5">
				<div class="row">
					<div class="col-md-12 shadow-lg p-4">
						<h3 class="font-gothic text-center d-print-none">Work Request</h3>
						<hr class="d-print-none">
						<form class="submit-req-form font-roboto">
							<div class="form-group">
								<label for="req-info">Request Info</label>
								<input type="text" name="req-info" id="req-info" placeholder="Request info" required="required" class="form-control">
							</div>
							<div class="form-group">
								<label for="des">Description</label>
								<input type="text" name="des" id="des" placeholder="Description" required="required" class="form-control">
							</div>
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" id="name" placeholder="Ex : Rahul" required="required" class="form-control">
							</div>
							<div class="form-group d-flex">
								<div class="flex-fill mr-1">
									<label for="address-1">Address Line 1</label>
									<input type="text" name="address-1" id="address-1" placeholder="House no 2" required="required" class="form-control">
								</div>
								<div class="flex-fill ml-1">
									<label for="address-2">Address Line 2</label>
									<input type="text" name="address-2" id="address-2" placeholder="Near market" required="required" class="form-control">
								</div>
							</div>
							<div class="form-group d-flex">
								<div class="flex-fill mr-1">
									<label for="city">City</label>
									<input type="text" name="city" id="city" placeholder="siliguri" required="required" class="form-control">
								</div>
								<div class="d-flex flex-fill ml-1">
									<div class="flex-fill mr-1">
										<label for="state">State</label>
									<input type="text" name="state" id="state" placeholder="West Bengal" required="required" class="form-control">
									</div>
									<div class="flex-fill ml-1">
										<label for="zip">Zip</label>
									<input type="text" name="zip" id="zip" placeholder="734001" required="required" class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group d-flex">
								<div class="flex-fill mr-1">
									<label for="email">Email</label>
									<input type="text" name="email" id="email" placeholder="example@gmail.com" required="required" class="form-control">
								</div>
								<div class="flex-fill ml-1">
										<label for="mobile">Mobile</label>
									<input type="text" name="mobile" id="mobile" placeholder="+91 7001389649" required="required" class="form-control">
								</div>
							</div>
							<button class="btn btn-danger req-submit-btn" type="submit">Submit</button>
							<button class="btn btn-dark req-reset-btn" type="button">Reset</button>
						</form>
						<div class="req-detail-box d-none">
							<table class="table table-bordered table-striped mb-3">
								<tr>
									<td class="font-weight-bold">Request ID</td>
									<td class="req-id"></td>
								</tr>
								<tr>
									<td class="font-weight-bold">Name</td>
									<td class="name"></td>
								</tr>
								<tr>
									<td class="font-weight-bold">Email ID</td>
									<td class="email"></td>
								</tr>
								<tr>
									<td class="font-weight-bold">Request Info</td>
									<td class="req-info"></td>
								</tr>
								<tr>
									<td class="font-weight-bold">Request Description</td>
									<td class="req-des"></td>
								</tr>
							</table>
							<button class="btn btn-outline-danger print-btn d-print-none">Print</button>
						</div>
						<div class="req-submit-notice mt-3 d-none"></div>
					</div>
				</div>
			</div>';

?>