<?php
	echo '<div class="container my-5">
					<h3 class="font-gothic text-center mb-3">Work Report</h3>
					<div class="row mb-3">
						<div class="col-md-12 mb-5 d-print-none">
							<form class="work-report-form">
								<div class="input-group">
									<input type="date" name="start-date" id="start-date" required="required" class="form-control">
									<input type="date" name="end-date" id="end-date" required="required" class="form-control">
									<div class="input-group-append">
										<button class="btn btn-secondary search-work-report-btn" type="submit">Search</button>
									</div>
								</div>
							</form>
						</div>
						<div class="col-md-12 d-none work-report-table">
							<p class="bg-dark text-center text-white py-2 d-print-none">Work Report Details</p>
							<table class="table table-bordered table-striped table-responsive mb-3">
								<thead>
									<tr>
										<th>Request ID</th>
										<th>Request Info</th>
										<th>Name</th>
										<th>Address</th>
										<th>City</th>
										<th>Mobile</th>
										<th>Technician</th>
										<th>Assigned Date</th>
									</tr>
								</thead>
								<tbody class="work-report-tbody">
									
								</tbody>
							</table>
							<button class="btn btn-danger print-work-report-btn d-print-none">Print</button>
						</div>
					</div>
					<div class="work-report-notice d-none"></div>
				</div>';

?>