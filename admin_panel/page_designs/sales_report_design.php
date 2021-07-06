<?php
	echo '<div class="container my-5">
					<h3 class="font-gothic text-center mb-3">Sales Report</h3>
					<div class="row mb-3">
						<div class="col-md-12 mb-5 d-print-none">
							<form class="sales-report-form">
								<div class="input-group">
									<input type="date" name="start-date" id="start-date" required="required" class="form-control">
									<input type="date" name="end-date" id="end-date" required="required" class="form-control">
									<div class="input-group-append">
										<button class="btn btn-secondary search-sales-report-btn" type="submit">Search</button>
									</div>
								</div>
							</form>
						</div>
						<div class="col-md-12 d-none sales-report-table">
							<p class="bg-dark text-center text-white py-2 d-print-none">Sales Report Details</p>
							<table class="table table-bordered table-striped table-responsive mb-3">
								<thead>
									<tr>
										<th>Customer ID</th>
										<th>Customer Name</th>
										<th>Customer Address</th>
										<th>Customer Email</th>
										<th>Customer Mobile</th>
										<th>Product Name</th>
										<th>Quantity</th>
										<th>Price Each</th>
										<th>Total</th>
										<th>Sell Date</th>
									</tr>
								</thead>
								<tbody class="sales-report-tbody">
									
								</tbody>
							</table>
							<button class="btn btn-danger print-sales-report-btn d-print-none">Print</button>
						</div>
					</div>
					<div class="sales-report-notice d-none"></div>
				</div>';

?>