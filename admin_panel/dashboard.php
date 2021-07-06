<?php
	//check user loged in or not
	require_once("../assets/database.php");
	session_start();
	if(empty($_SESSION["admin"])){
		header("Location:".ROOT."index.php");
		exit;
	}
	$username = trim($_SESSION["admin"]);
	$db = new db();
	$db = $db -> __construct();
	$get_user_data = "SELECT * FROM admin_login WHERE admin_username = '$username'";
	$user_response = $db -> query($get_user_data);
	if($user_response -> num_rows ==1){
		$user_data = $user_response -> fetch_assoc();
		$name = trim($user_data["admin_name"]);
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="<?= ROOT ?>common/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?= ROOT ?>common/css/animate.css">
		<link rel="stylesheet" href="<?= ROOT ?>admin_panel/css/style.css">
		<link rel="stylesheet" href="<?= ROOT ?>admin_panel/css/style_responsive.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Nanum+Gothic:wght@800&family=Poppins&family=Lato&family=Roboto&display=swap" rel="stylesheet">
		<title>Dashboard</title>
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
		
		<div class="container-fluid m-0 p-0 main-body" style="margin-top:">
			<div class="sidebar shadow-lg d-print-none">
				<h3 class="text-center text-white font-gothic">OSMS</h3>
				<h6 class="text-danger text-center text-capitalize font-monsserat"><?php echo $name;?></h6>
				<hr>
				<button class="btn w-100 text-left dashboard-btn mb-2 collapse-li active mt-3 font-lato" style="padding: 10px;" page-link="dashboard_design.php">
				<i class="fa fa-dashboard text-primary pr-2"></i>
				Dashboard
				</button>
				<button class="btn w-100 text-left work-order-btn mb-2 collapse-li font-lato" style="padding: 10px;" page-link="work_order_design.php">
				<i class="fa fa-tasks text-warning pr-2"></i>
				Work Order
				</button>
				<button class="btn w-100 text-left req-btn mb-2 collapse-li font-lato" style="padding: 10px;" page-link="work_request_design.php">
				<i class="fa fa-reply text-info pr-2"></i>
				Requests
				</button>
				<button class="btn w-100 text-left asset-btn mb-2 collapse-li font-lato" style="padding: 10px;" page-link="asset_design.php">
				<i class="fa fa-database pr-2" style="color:#8B78E6;"></i>
				Assets
				</button>
				<button class="btn w-100 text-left technician-btn mb-2 collapse-li font-lato" style="padding: 10px;" page-link="technician_design.php">
				<i class="fa fa-headphones pr-2" style="color:#2ecc72;"></i>
				Technician
				</button>
				<button class="btn w-100 text-left requester-btn mb-2 collapse-li font-lato" style="padding: 10px;" page-link="requester_design.php">
				<i class="fa fa-users pr-2" style="color:#99AAAB;"></i>
				Requester
				</button>
				<button class="btn w-100 text-left sales_report-btn mb-2 collapse-li font-lato" style="padding: 10px;" page-link="sales_report_design.php">
				<i class="fa fa-line-chart pr-2" style="color:#E74292;"></i>
				Sells Report
				</button>
				<button class="btn w-100 text-left work-report-btn mb-2 collapse-li font-lato" style="padding: 10px;" page-link="work_report_design.php">
				<i class="fa fa-bar-chart pr-2" style="color:#25CCF7;"></i>
				Work Report
				</button>
				<button class="btn w-100 text-left change-password-btn mb-2 collapse-li font-lato" style="padding: 10px;" page-link="change_admin_password_design.php">
				<i class="fa fa-key pr-2" style="color:#4834DF;"></i>
				Change Password
				</button>
				<button class="btn w-100 text-left mb-2 collapse-li font-lato" style="padding: 10px;">
				<a href="<?= ROOT ?>admin_panel/logout.php" class="logout-btn text-white">
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
		<script type="text/javascript" src="<?= ROOT ?>admin_panel/script/admin.js"></script>
		<script type="text/javascript" src="<?= ROOT ?>common/js/chart.min.js"></script>
	</body>
</html>