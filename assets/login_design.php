<?php 
	require_once "database.php";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="<?= ROOT ?>common/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?= ROOT ?>common/css/animate.css">
		<link rel="stylesheet" href="<?= ROOT ?>style/style.css">
		<link rel="stylesheet" href="<?= ROOT ?>style/responsive.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Nanum+Gothic:wght@800&family=Poppins&display=swap" rel="stylesheet">
		<title>login</title>
		<script type="text/javascript" src="<?= ROOT ?>common/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?= ROOT ?>common/js/popper.min.js"></script>
		<script type="text/javascript" src="<?= ROOT ?>common/js/bootstrap.js"></script>
		<script type="text/javascript" src="<?= ROOT ?>script/index.js"></script>
	</head>
	<body class="p-0 m-0">
		<div class="container-fluid m-0 p-0">
			<!-- start navbar coding -->
			<?php include("navbar.php");?>
			
			<!-- end navbar coding -->
			<!-- start login form coding -->
			
			<div class="container mb-5" style="margin-top:80px;">
				<h3 class="font-gothic text-center mb-5">OSMS LOGIN PORTAL</h3>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<div class="signin-form-box p-4 shadow-lg">
							<form class="signin-form font-monsserat">
								<div class="form-group">
									<label for="username"><i class="fa fa-user mr-2"></i>Username</label>
									<input type="email" name="username" id="username" required="required" class="form-control">
									<small class="text-info">we will never share your your email with anyone else</small>
								</div>
								<div class="form-group">
									<label for="password"><i class="fa fa-key mr-2"></i>Password</label>
									<input type="password" name="password" id="password" required="required" class="form-control">
								</div>
								<button class="btn btn-outline-danger btn-block mt-5 py-2 signin-btn" type="submit">SIGN IN</button>
								<small class="text-center d-block mt-3">don't have an acount?create here <a href="<?= ROOT ?>index.php">signup</a></small>
							</form>
							<div class="account-activation-form font-monsserat d-none">
								<div class="form-group">
									<label for="activation-code">Activation Code</label>
									<input type="number" name="activation-code" id="activation-code" required="required" class="form-control">
								</div>
								<button class="btn btn-outline-danger py-2 activation-btn">Submit</button>
							</div>
							<div class="signin-notice d-none mt-3"></div>
						</div>
					</div>
					<div class="col-md-3"></div>
				</div>
			</div>
			<!-- end login form coding -->
			<!-- start footer coding -->
			<?php include("footer.php");?>
			
			<!-- end footer  coding -->
		</div>
		
	</body>
</html>