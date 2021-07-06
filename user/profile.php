<?php
	//check user loged in or not
	require_once("../assets/database.php");
	session_start();
	if(empty($_SESSION["username"])){
		header("Location:".ROOT."index.php");
		exit;
	}

	$username = trim($_SESSION["username"]);
	$db = new db();
	$db = $db -> __construct();
	$get_user_data = "SELECT * FROM user WHERE username = '$username'";
	$user_response = $db -> query($get_user_data);
	if($user_response -> num_rows !=0){
		while($user_data = $user_response -> fetch_assoc()){
			$name = trim($user_data["name"]);
		}
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="<?= ROOT ?>common/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?= ROOT ?>common/css/animate.css">
		<link rel="stylesheet" href="<?= ROOT ?>user/css/profile.css">
		<link rel="stylesheet" href="<?= ROOT ?>user/css/profile_responsive.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Nanum+Gothic:wght@800&family=Poppins&family=Lato&family=Roboto&display=swap" rel="stylesheet">
		<title>Profile</title>
		<script type="text/javascript" src="<?= ROOT ?>common/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?= ROOT ?>common/js/popper.min.js"></script>
		<script type="text/javascript" src="<?= ROOT ?>common/js/bootstrap.js"></script>
</head>
<body>

	<!-- start navbar coding -->
	
	<!-- <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
	<div class="container">
		<a href="index.php" class="navbar-brand font-gothic">OSMS</a>
		<ul class="navbar-nav font-poppins">
			<li class="nav-item"><a href="logout.php" class="nav-link logout-btn"><i class="fa fa-sign-out"></i> Logout</a></li>
		</ul>
	</div>
</nav> -->

	<!-- end navbar coding -->

	<!-- start side bar coding -->
	

	<div class="container-fluid m-0 p-0">
		<div class="sidebar shadow-lg d-print-none">
			<h3 class="text-center text-white font-gothic">OSMS</h3>
			<h1 class="text-white text-center"><i class="fa fa-user-circle-o"></i></h1>
			<h6 class="text-danger text-center text-capitalize font-monsserat"><?php echo $name;?></h6>
			<hr>
			<button class="btn w-100 text-left profile-btn mb-2 collapse-li active mt-3 font-lato" style="padding: 10px;" page-link="change_name_design.php">
				<i class="fa fa-user text-primary pr-2"></i>
				Profile
			</button>
			<button class="btn w-100 text-left submit-req-btn mb-2 collapse-li font-lato" style="padding: 10px;" page-link="request_submit_design.php">
				<i class="fa fa-send-o text-warning pr-2"></i>
				Submit Request
			</button>
			<button class="btn w-100 text-left service-status-btn mb-2 collapse-li font-lato" style="padding: 10px;" page-link="service_req_status_design.php">
				<i class="fa fa-exclamation-circle text-info pr-2"></i>
				Service Status
			</button>
			<button class="btn w-100 text-left change-pass-btn mb-2 collapse-li font-lato" style="padding: 10px;" page-link="change_password_design.php">
				<i class="fa fa-key pr-2" style="color:#8B78E6;"></i>
				Change Password
			</button>
			<button class="btn w-100 text-left mb-2 collapse-li font-lato" style="padding: 10px;">
				<a href="<?= ROOT ?>user/logout.php" class="logout-btn text-white">
					<i class="fa fa-sign-out pr-2 text-danger"></i>
				Logout
				</a>
			</button>
		</div>
		<div class="page">
		</div>
	</div>


	<!-- end side bar coding -->
	<script>
		const root = "<?= ROOT ?>";
	</script>
	<script type="text/javascript" src="<?= ROOT ?>user/script/profile.js"></script>
</body>
</html>