<div class="container mb-5">
	<h3 class="font-gothic text-center mb-5">CREATE AN ACCOUNT</h3>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="signup-form-box p-4 shadow-lg" id="signup-box">
				<form class="signup-form font-monsserat">
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
					<button class="btn btn-outline-danger btn-block mt-5 py-2 reg-btn" type="submit">SIGN UP</button>
					<em style="font-size:10px;">Note - By clicking signup your are agree to our Terms, Data Policy and Cookie Policy</em><br>
					<small class="text-center d-block mt-3">already have an account?please <a href="<?= ROOT ?>assets/login_design.php">login</a></small>
				</form>
				<div class="account-activation-form font-monsserat d-none">
					<div class="form-group">
						<label for="activation-code">Activation Code</label>
						<input type="number" name="activation-code" id="activation-code" required="required" class="form-control">
					</div>
					<button class="btn btn-outline-danger py-2 activation-btn">Submit</button>
				</div>
				<div class="signup-notice d-none mt-3"></div>
			</div>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>