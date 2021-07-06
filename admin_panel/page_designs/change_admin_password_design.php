<?php
	echo '<div class="container my-5">
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6 shadow-lg p-4">
						<h3 class="font-gothic text-center">Change Password</h3>
						<hr>
					<form class="change-password-form font-roboto">
					<div class="form-group">
						<label for="password">Old Password</label>
						<input type="password" name="password" id="password" class="form-control"> 
					</div>
					<div class="form-group">
						<label for="new-password">New Password</label>
						<input type="password" name="new-password" id="new-password" required="required" class="form-control"> 
					</div>
					<div class="form-group">
						<label for="con-new-password">Confirm New Password</label>
						<div class="position-relative">
							<input type="password" name="con-new-password" id="con-new-password" required="required" class="form-control"> 
							<span  class="position-absolute text-danger d-none match-pass" style="top:8px;right:5px;"><i class="fa fa-times-circle match-pass-icon"></i></span>
						</div>
					</div>
					<button class="btn btn-outline-danger update-password-btn">Update</button>
				</form>
					<div class="update-password-notice d-none mt-3"></div>
					</div>
					<div class="col-md-3"></div>
				</div>
			</div>';

?>