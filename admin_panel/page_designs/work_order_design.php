<?php
	echo '<div class="container my-5">
			<div class="modal fade" id="detail-modal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title font-gothic">Assigned Work Details</h4>
          <button type="button" class="close d-print-none" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
       		<table class="table table-bordered table-striped mb-3">
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
										<button class="btn btn-danger print-detail-btn d-print-none">Print</button>
        </div>        
      </div>
    </div>
  </div>
				<h3 class="font-gothic text-center mb-3 d-print-none">Work Orders</h3>
					<div class="table-responsive">
						<table class="work-order-table table table-bordered table-striped d-print-none">
								<thead class="text-center">
									<tr>
										<th>Request ID</th>
										<th>Request Info</th>
										<th>Name</th>
										<th>Address</th>
										<th>City</th>
										<th>Mobile</th>
										<th>Technician</th>
										<th>Assign Date</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="work-order-tbody"></tbody>
							</table>
					</div>
							<div class="work-order-notice d-none"></div>
				</div>';

?>