<?php
	require_once "assets/database.php";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="<?= ROOT ?>common/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?= ROOT ?>common/css/animate.css">
		<link rel="stylesheet" href="<?= ROOT ?>style/style.css">
		<link rel="stylesheet" href="<?= ROOT ?>style/responsive.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Nanum+Gothic:wght@800&family=Poppins&display=swap" rel="stylesheet">
		<title>Online Service Managment System</title>
		<script type="text/javascript" src="<?= ROOT ?>common/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?= ROOT ?>common/js/popper.min.js"></script>
		<script type="text/javascript" src="<?= ROOT ?>common/js/bootstrap.js"></script>
	</head>
	<body class="p-0 m-0">
		<div class="container-fluid m-0 p-0">
		<!-- start navbar coding -->
		<?php include("assets/navbar.php");?>
			
		<!-- end navbar coding -->

		<!-- start header coding -->
			<header class="page-header text-light">
				<div class="header-box font-gothic">
					<h1 class="brand-name-txt animated fadeIn">Welcome to OSMS</h1>
					<p class="m-0 p-0 mb-3 animated fadeIn">service at your dor step</p>
					<div class="btn-box animated fadeIn slower">
						<button class="btn mr-lg-1 mb-2 mb-lg-0 py-2 px-5 sign-in-btn"><a href="<?= ROOT ?>signin">Signin</a></button>
						<button class="btn ml-lg-1 mt-2 mt-lg-0 py-2 px-5 sign-up-btn"><a href="#signup-box">Signup</a></button>
					</div>
				</div>
			</header>
		<!-- end header coding -->

		<!-- start section coding -->
		
		<div class="container mt-3 mb-5">
			<div class="jumbotron" id="services">
				<h3 class="font-gothic text-center mb-3">OSMS SERVICES</h4>
				<p class="text-justify">industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
			</div>
		</div>

		<div class="container mb-5 shadow-sm p-5">
			<h3 class="font-gothic text-center mb-5">OUR SERVICES</h3>
			<div class="row our-service-icons text-center">
				<div class="col-md-4 mb-3 mb-lg-0">
					<a href="#"><i class="fa fa-desktop text-success mb-3"></i></a>
					<h5 class="font-gothic">Electronic Appliances</h5>
					</div>
				<div class="col-md-4 mb-3 mb-lg-0">
					<a href="#"><i class="fa fa-sliders mb-3"></i></a>
					<h5 class="font-gothic">Preventive Maintenance</h5>
				</div>
				<div class="col-md-4 mb-3 mb-lg-0">
					<a href="#"><i class="fa fa-cogs text-danger mb-3"></i></a>
					<h5 class="font-gothic">Fault Repair</h5>
				</div>
			</div>
		</div>

		<!-- end section coding -->

		<!-- start registration coding -->

		<?php include("assets/registration_design.php");?>

		<!-- end registration coding -->

		<!-- start customer review coding -->

		<div class="container-fluid happy-customer mb-5" id="happy-customer">
			<div class="container py-5">
				<h3 class="font-gothic text-light text-center mb-5">HAPPY CUSTOMERS</h3>
				<div class="row">
					<div class="col-md-3 mb-3 mb-lg-0">
					<div class="card">
						<div class="card-body">
							<h5 class="font-gothic">Rahul Maheta</h5>
							<p class="text-justify">industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type</p>
						</div>
						<img src="common/images/h1.jpeg" alt="h1" class="card-img-bottom">
					</div>
				</div>
				<div class="col-md-3 mb-3 mb-lg-0">
					<div class="card">
						<img src="common/images/h2.jpg" alt="h2" class="card-img-top">
						<div class="card-body">
							<h5 class="font-gothic">Preti Gupta</h5>
							<p class="text-justify">industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 mb-3 mb-lg-0">
					<div class="card">
						<div class="card-body">
							<h5 class="font-gothic">Stephen Rechard</h5>
							<p class="text-justify">industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type</p>
						</div>
						<img src="common/images/h3.jpg" alt="h3" class="card-img-bottom">
					</div>
				</div>
				<div class="col-md-3 mb-3 mb-lg-0">
					<div class="card">
						<img src="common/images/h4.jpg" alt="h4" class="card-img-top">
						<div class="card-body">
							<h5 class="font-gothic">Lorry Hence</h5>
							<p class="text-justify">industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type</p>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>

		<!-- end customer review coding -->

		<!-- start contact us coding -->
		<?php include("assets/contactus_design.php");?>

		<!-- end contact us coding -->

		<!-- start footer coding -->

		<?php include("assets/footer.php");?>

		<!-- end footer  coding -->
		</div>
		<script type="text/javascript" src="<?= ROOT ?>script/index.js"></script>
	</body>
</html>