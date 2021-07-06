const root = "http://"+window.location.hostname+"/";

// start registration coding

$(document).ready(function(){
	$(".signup-form").submit(function(event){
		event.preventDefault();
		var password = $("#password").val();
		var cpassword = $("#con-password").val();
		var username = $("#username").val();
		if(password == cpassword){
			$.ajax({
				type : "POST",
				url : root+"php/register.php",
				data : new FormData(this),
				processData : false,
				contentType : false,
				cache : false,
				beforeSend : function(){
					$(".match-pass").removeClass("d-none");
					$(".match-pass-icon").removeClass("fa fa-times-circle");
					$(".match-pass").removeClass("text-danger");
					$(".match-pass").addClass("text-success");
					$(".match-pass-icon").addClass("fa fa-check-circle");
					$(".reg-btn").html("<i class='fa fa-circle-o-notch fa-spin'></i>");
					$(".reg-btn").attr("disabled","disabled");
				},
				success : function(response){
					$(".match-pass").addClass("d-none");
					$(".match-pass-icon").removeClass("fa fa-check-circle");
					$(".match-pass").removeClass("text-success");
					$(".match-pass").addClass("text-danger");
					$(".match-pass-icon").addClass("fa fa-times-circle");
					$(".reg-btn").html("SIGN UP");
					$(".reg-btn").attr("disabled",false);
					if(response.trim() == "success"){
						$(".signup-notice").removeClass("d-none");
						$(".signup-notice").addClass("alert alert-success");
						$(".signup-notice").html("sign up success, please activate your account");

						setTimeout(function(){
							$(".signup-notice").removeClass("alert alert-success");
							$(".signup-notice").addClass("d-none");
							$(".signup-form").fadeOut(500,function(){
								$(".account-activation-form").removeClass("d-none");
								var signup_notice = $(".signup-notice");
								activate_account(username,signup_notice);
								$(".signup-form").trigger("reset");
							});
						},2000);
					}
					else if(response.trim() == "user exist"){
						$(".signup-notice").removeClass("d-none");
						$(".signup-notice").addClass("alert alert-warning");
						$(".signup-notice").html("user already exist, please login");

						setTimeout(function(){
							$(".signup-notice").removeClass("alert alert-warning");
							$(".signup-notice").addClass("d-none");
							$(".signup-form").trigger("reset");
						},2000);
					}
					else{
						$(".signup-notice").removeClass("d-none");
						$(".signup-notice").addClass("alert alert-danger");
						$(".signup-notice").html(response);
						setTimeout(function(){
							$(".signup-notice").removeClass("alert alert-danger");
							$(".signup-notice").addClass("d-none");
							$(".signup-form").trigger("reset");
						},2000);						
					}
				}
			});
		}
		else{
			$(".match-pass").removeClass("d-none");
			$("#con-password").on("input",function(){
				$(".match-pass").addClass("d-none");
			});
		}
	});
});

// end registration coding

// start activate account coding

function activate_account(username,notice){
	$(document).ready(function(){
		$(".activation-btn").click(function(){
			var u_name = username.trim();
		$.ajax({
			type : "POST",
			url : root+"php/activate_account.php",
			data : {
				username : btoa(u_name),
				code : btoa($("#activation-code").val())
			},			
			cache : false,
			beforeSend : function(){
				$(".activation-btn").html("<i class='fa fa-circle-o-notch fa-spin'></i>");
				$(".activation-btn").attr("disabled","disabled");
			},
			success : function(response){
				$(".activation-btn").html("Submit");
				$(".activation-btn").attr("disabled",false);
				if(response.trim() == "success"){
					$(notice).removeClass("d-none");
					$(notice).addClass("alert alert-success");
					$(notice).html("account activate successful, please login");

					setTimeout(function(){
						$(notice).removeClass("alert alert-success");
						$(notice).addClass("d-none");
						window.location = root+"assets/login_design.php";
					},2000);
				}
				else{
					$(notice).removeClass("d-none");
					$(notice).addClass("alert alert-danger");
					$(notice).html("something wrong, please try again");
					setTimeout(function(){
						$(notice).removeClass("alert alert-danger");
						$(notice).addClass("d-none");
					},2000);
				}
			}
		});
	});
	});
}

// end activate account coding

//start login coding

$(document).ready(function(){
	$(".signin-form").submit(function(event){
		event.preventDefault();
		var username = $("#username").val();
		$.ajax({
			type : "POST",
			url : root+"php/login.php",
			data : new FormData(this),
			processData : false,
			contentType : false,
			cache : false,
			beforeSend : function(){
				$(".signin-btn").html("<i class='fa fa-circle-o-notch fa-spin'></i>");
				$(".signin-btn").attr("disabled","disabled");
			},
			success : function(response){
				$(".signin-btn").html("SIGN IN");
				$(".signin-btn").attr("disabled",false);
				if(response.trim() == "success"){
					$(".signin-form").trigger("reset");
					window.location = root+"profile";
				}
				else if(response.trim() == "please verify your account first"){
					$(".signin-notice").removeClass("d-none");
					$(".signin-notice").addClass("alert alert-danger");
					$(".signin-notice").html(response);
					setTimeout(function(){
						$(".signin-notice").removeClass("alert alert-danger");
						$(".signin-notice").addClass("d-none");
						setTimeout(function(){
							$(".signin-form").fadeOut(500,function(){
								$(".account-activation-form").removeClass("d-none");
								$(".signin-form").trigger("reset");
								var signin_notice = $(".signin-notice");
								activate_account(username,signin_notice);
							});
						},1000);
					},2000);
				}
				else{
					$(".signin-notice").removeClass("d-none");
					$(".signin-notice").addClass("alert alert-danger");
					$(".signin-notice").html(response);
					setTimeout(function(){
						$(".signin-notice").removeClass("alert alert-danger");
						$(".signin-notice").addClass("d-none");
						$(".signin-form").trigger("reset");
					},2000);
				}
			}
		});
	});
});

//end login coding