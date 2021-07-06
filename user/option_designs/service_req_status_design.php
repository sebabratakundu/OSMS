<?php
	echo '<div class="container my-5">
					<div class="row">
							<div class="col-md-12 shadow-lg p-4 mb-3 d-print-none">
									<h3 class="font-gothic text-center">Service Status</h3>
									<hr>
									<form class="search-service-status-form font-roboto">
											<div class="form-group">
													<label for="req-id">Request ID</label>
													<div class="input-group">
															<input type="number" name="req-id" id="req-id" required="required" placeholder="Ex : 4" class="form-control">
															<div class="input-group-append">
																	<button class="btn btn-danger search-req-btn">Search</button>
															</div>
													</div>
											</div>
									</form>
							</div>
							<div class="col-md-12 shadow-sm p-4 d-none service-req-table">
								<h3 class="font-gothic text-center">Assigned Work Details</h3>
										<hr>
										<table class="table table-bordered table-striped">
												<tr>
														<td class="font-weight-bold">Request ID</td>
														<td id="req_id"></td>
												</tr>
												<tr>
														<td class="font-weight-bold">Request Info</td>
														<td id="req-info"></td>
												</tr>
												<tr>
														<td class="font-weight-bold">Request Description</td>
														<td id="req-des"></td>
												</tr>
												<tr>
														<td class="font-weight-bold">Name</td>
														<td id="name"></td>
												</tr>
												<tr>
														<td class="font-weight-bold">Address 1</td>
														<td id="add-1"></td>
												</tr>
												<tr>
														<td class="font-weight-bold">Address 2</td>
														<td id="add-2"></td>
												</tr>
												<tr>
														<td class="font-weight-bold">City</td>
														<td id="city"></td>
												</tr>
												<tr>
														<td class="font-weight-bold">State</td>
														<td id="state"></td>
												</tr>
												<tr>
														<td class="font-weight-bold">Pincode</td>
														<td id="pin"></td>
												</tr>
												<tr>
														<td class="font-weight-bold">Email</td>
														<td id="email"></td>
												</tr>
												<tr>
														<td class="font-weight-bold">Mobile</td>
														<td id="mobile"></td>
												</tr>
												<tr>
														<td class="font-weight-bold">Assigned Technician</td>
														<td id="assigned-tech"></td>
												</tr>
												<tr>
														<td class="font-weight-bold">Assign Date</td>
														<td id="assign-date"></td>
												</tr>
												<tr>
														<td class="font-weight-bold">Technician Signature</td>
														<td id="tech-sign"></td>
												</tr>
												<tr>
														<td class="font-weight-bold">Customer Signature</td>
														<td id="cus-sign"></td>
												</tr>
										</table>
							</div>
							<div class="service-req-notice d-none w-100"></div>
					</div>
			</div>';
?>