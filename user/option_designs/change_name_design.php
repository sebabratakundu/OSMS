<?php
	require_once("../../assets/database.php");
	$db = new db();
	$db = $db -> __construct();
	session_start();
	$username = trim($_SESSION["username"]);
	$get_user_data = "SELECT * FROM user WHERE username = '$username'";
	$user_response = $db -> query($get_user_data);
	if($user_response -> num_rows !=0){
		while($user_data = $user_response -> fetch_assoc()){
			$name = trim($user_data["name"]);
		}
	}




	echo '<div class="container my-5">
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6 shadow-lg p-4">
						<h3 class="font-gothic text-center">Change Name</h3>
						<hr>
					<form class="change-name-form font-roboto">
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" id="email" value="';?><?php echo $username; echo'" readonly class="form-control"> 
					</div>
					<div class="form-group">
						<label for="email">Name</label>
						<input type="text" name="name" id="name" required="required" value="';?><?php echo $name; echo'" class="form-control"> 
					</div>
					<button class="btn btn-outline-danger update-name-btn">Update</button>
				</form>
					<div class="update-profile-notice d-none mt-3"></div>
					</div>
					<div class="col-md-3"></div>
				</div>
			</div>';

?>