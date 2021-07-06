// start dynamic design page appear coding

$(document).ready(function(){
	var active_link = $('.active').attr("page-link");
	page_request(active_link);
	$('.collapse-li').each(function(){
		$(this).click(function(){
			var request_url = $(this).attr('page-link');
			page_request(request_url);
		});
	});
});

// end dynamic design page appear coding

//start active tab coding

$(document).ready(function(){
	$('.collapse-li').each(function(){
		$(this).click(function(){
			var length = $('.collapse-li').length;
			var i;
			for(i=0;i<length;i++){
				$('.collapse-li').removeClass('active');
			}
			$(this).addClass('active');
		});
	});
});

//end active tab coding

//start page request coding

function page_request(request_url){
	$.ajax({
		type : "POST",
		url : root+"user/option_designs/"+request_url,
		xhr : function(){
			var request = new XMLHttpRequest();
			request.onprogress = function(event){
				var percentage = Math.floor((event.loaded/event.total)*100);
				$('.progress').removeClass('d-none');
				$('.progress-bar').css({
					width : percentage+"%"
				});

				$('.progress-bar').html(percentage+"%");
			}

			return request;
		},
		cache : false,
		beforeSend : function(){
			$('.progress').removeClass('d-none');
		},
		success : function(response){
			$(".page").html(response);

			if(request_url == "change_name_design.php"){
				update_profile();
			}

			if(request_url == "request_submit_design.php"){
				request_submit();
			}

			if(request_url == "change_password_design.php"){
				change_password();
			}

			if(request_url == "service_req_status_design.php"){
				req_status();
			}

			// if(request_url == "delivery_location_design.php"){
			// 	delivery_location();
			// }

			// if(request_url == "sales_report_design.php"){
			// 	sales_report();
			// }

			// if(request_url == "keyword_planner_design.php"){
			// 	keyword_planner();
			// }
		}
	});
}

//end page request coding

//start change name coding

function update_profile(){
	$(document).ready(function(){
		$(".change-name-form").submit(function(event){
				event.preventDefault();
				$.ajax({
					type : "POST",
					url : root+"user/php/update_profile.php",
					data : {
						email : $("#email").val(),
						name : $("#name").val()
					},
					cache : false,
					beforeSend : function(){
						$(".update-name-btn").html("<i class='fa fa-circle-o-notch fa-spin'></i>");
						$(".update-name-btn").attr("disabled","disabled");
					},
					success : function(response){
						$(".update-name-btn").html("Update");
						$(".update-name-btn").attr("disabled",false);
						if(response.trim() == "update success"){
							$(".update-profile-notice").removeClass("d-none");
							$(".update-profile-notice").addClass("alert alert-success");
							$(".update-profile-notice").html("<b>profile updated</b>");

							setTimeout(function(){
								$(".update-profile-notice").removeClass("alert alert-success");
								$(".update-profile-notice").addClass("d-none");
							},2000);
						}
						else{
							$(".update-profile-notice").removeClass("d-none");
							$(".update-profile-notice").addClass("alert alert-danger");
							$(".update-profile-notice").html("<b>"+response+"</b>");

							setTimeout(function(){
								$(".update-profile-notice").removeClass("alert alert-danger");
								$(".update-profile-notice").addClass("d-none");
							},2000);
						}
					}
				});
			});
	});
}

//end change name coding

//start request submit coding

function request_submit(){
	//accept only number for zip and mobile input field

	var	zip = document.getElementById("zip");
	var mobile = document.getElementById("mobile");

	zip.onkeypress = function(event){
		var input_value = String.fromCharCode(event.which);
		onlyNumber(input_value);
	}

	mobile.onkeypress = function(event){
		var input_value = String.fromCharCode(event.keyCode);
		onlyNumber(input_value);
	}

	function onlyNumber(input_value){
		
		pattern = /[0-9]/g;
		if(input_value.match(pattern)){
			return true;
		}
		else{
			event.preventDefault();
		}
	}

	//start request data store coding

	$(document).ready(function(){
		$(".submit-req-form").submit(function(event){
		event.preventDefault();
		var name = $("#name").val();
		var req_info = $("#req-info").val();
		var req_des = $("#des").val();
		var email = $("#email").val();
		$.ajax({
			type : "POST",
			url : root+"user/php/req_submit.php",
			data : new FormData(this),
			processData : false,
			contentType : false,
			cache : false,
			beforeSend : function(){
				$(".req-submit-btn").html("<i class='fa fa-circle-o-notch fa-spin'></i>");
				$(".req-submit-btn").attr("disabled","disabled");
			},
			success : function(response){
				$(".req-submit-btn").html("Submit");
				$(".req-submit-btn").attr("disabled",false);
				if(response.trim() == "success"){
					$(".req-submit-notice").removeClass("d-none");
					$(".req-submit-notice").addClass("alert alert-success");
					$(".req-submit-notice").html("<b>Request submited </b>we will notify you shortly");

					setTimeout(function(){
						$(".req-submit-notice").removeClass("alert alert-success");
						$(".req-submit-notice").addClass("d-none");
						$(".submit-req-form").trigger("reset");
						
						$.ajax({
							type : "POST",
							url : root+"user/php/req_provesheet.php",
							cache : false,
							beforeSend : function(){
								$(".submit-req-form").addClass("d-none");
							},
							success : function(response){
								if(response.trim() != "no data"){
									var req_id = response.trim();
									$(".req-detail-box").removeClass("d-none");
									$(".req-id").html(req_id);
									$(".name").html(name);
									$(".req-info").html(req_info);
									$(".email").html(email);
									$(".req-des").html(req_des);
									

									$(".print-btn").click(function(){
										window.print();
									});						
								}
								else{
									$(".req-submit-notice").removeClass("d-none");
									$(".req-submit-notice").addClass("alert alert-danger");
									$(".req-submit-notice").html("<b>Something wrong, please contact to customer care</b>");

									setTimeout(function(){
										$(".req-submit-notice").removeClass("alert alert-danger");
										$(".req-submit-notice").addClass("d-none");
									},3000);
								}
							}
						});
					},5000);
				}
				else{
					$(".req-submit-notice").removeClass("d-none");
					$(".req-submit-notice").addClass("alert alert-danger");
					$(".req-submit-notice").html("<b>Failed to submit your request, please try again later</b>");

					setTimeout(function(){
						$(".req-submit-notice").removeClass("alert alert-danger");
						$(".req-submit-notice").addClass("d-none");
						$(".submit-req-form").trigger("reset");
					},3000);
				}
			}
		});
	});
	});

	//request submit reset coding

	$(document).ready(function(){
		$(".req-reset-btn").click(function(){
			$(".submit-req-form").trigger("reset");
		});
	});
}

//end request submit coding

//start change password coding

function change_password(){
	$(document).ready(function(){
		$(".change-password-form").submit(function(event){
			var new_pass = $("#new-password").val();
			var con_new_pass = $("#con-new-password").val();
			event.preventDefault();
			if(new_pass == con_new_pass){
				$.ajax({
					type : "POST",
					url : root+"user/php/change_password.php",
					data : new FormData(this),
					processData : false,
					contentType : false,
					cache : false,
					beforeSend : function(){
						$(".update-password-btn").html("<i class='fa fa-circle-o-notch fa-spin'></i>");
						$(".update-password-btn").attr("disabled","disabled");
					},
					success : function(response){
						$(".update-password-btn").html("Update");
						$(".update-password-btn").attr("disabled",false);

						if(response.trim() == "update success"){
							$(".update-password-notice").removeClass("d-none");
							$(".update-password-notice").addClass("alert alert-success");
							$(".update-password-notice").html("<b>Password updated</b>");

							setTimeout(function(){
								$(".update-password-notice").removeClass("alert alert-success");
								$(".update-password-notice").addClass("d-none");
								$(".change-password-form").trigger("reset");
							},5000);
						}
						else{
							$(".update-password-notice").removeClass("d-none");
							$(".update-password-notice").addClass("alert alert-danger");
							$(".update-password-notice").html("<b>Update failed</b> try again later");

							setTimeout(function(){
								$(".update-password-notice").removeClass("alert alert-danger");
								$(".update-password-notice").addClass("d-none");
								$(".change-password-form").trigger("reset");
							},3000);
						}
					}
				});
			}
			else{
				$(".match-pass").removeClass("d-none");
				$("#con-new-password").on("input",function(){
					$(".match-pass").addClass("d-none");
				});
			}
		});
	});
}

// end change password coding

// start request status codiing 

function req_status(){
	$(document).ready(function(){
		$(".search-service-status-form").submit(function(event){
			event.preventDefault();
			$.ajax({
				type : "POST",
				url : root+"user/php/req_status.php",
				data : new FormData(this),
				processData : false,
				contentType : false,
				cache : false,
				beforeSend : function(){
					$(".search-req-btn").html("<i class='fa fa-circle-o-notch fa-spin'></i>");
					$(".search-req-btn").attr("disabled","disabled");
				},
				success : function(response){
					$(".search-req-btn").html("Search");
					$(".search-req-btn").attr("disabled",false);
					if(response.trim() == "request is in process"){
						$(".service-req-table").addClass("d-none");
						$(".service-req-notice").removeClass("d-none");
							$(".service-req-notice").addClass("alert alert-info");
							$(".service-req-notice").html("<b>Request is on process, please check later</b>");

							setTimeout(function(){
								$(".service-req-notice").removeClass("alert alert-info");
								$(".service-req-notice").addClass("d-none");
							},3000);
					}					
					else if(response.trim() == "no data"){
						$(".service-req-table").addClass("d-none");
						$(".service-req-notice").removeClass("d-none");
							$(".service-req-notice").addClass("alert alert-danger");
							$(".service-req-notice").html("<b>Request not found</b>");

							setTimeout(function(){
								$(".service-req-notice").removeClass("alert alert-danger");
								$(".service-req-notice").addClass("d-none");
							},3000);
					}
					else{

						var all_data = JSON.parse(response.trim());
						$(".service-req-table").removeClass("d-none");
						$("#req_id").html(all_data[0].request_id);
						$("#req-info").html(all_data[0].request_info);
						$("#req-des").html(all_data[0].request_des);
						$("#name").html(all_data[0].requester_name);
						$("#add-1").html(all_data[0].requester_add_1);
						$("#add-2").html(all_data[0].requester_add_2);
						$("#city").html(all_data[0].requester_city);
						$("#state").html(all_data[0].requester_state);
						$("#pin").html(all_data[0].requester_pincode);
						$("#email").html(all_data[0].requester_email);
						$("#mobile").html(all_data[0].requester_mobile);
						$("#assigned-tech").html(all_data[0].assigned_tech);
						$("#assign-date").html(all_data[0].assign_date);

						var print_btn = document.createElement("BUTTON");
						print_btn.className = "btn btn-outline-danger d-print-none";
						print_btn.innerHTML = "Print";
						$(".service-req-table").append(print_btn);

						//print recipt

						print_btn.onclick = function(){
							window.print();
						}
					}
				}
			});
		});
	});
}

// end request status coding