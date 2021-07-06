// start admin login coding

$(document).ready(function(){
	$(".admin-signin-form").submit(function(event){
		event.preventDefault();
		$.ajax({
			type : "POST",
			url : root+"admin_panel/php/login.php",
			data: new FormData(this),
			processData : false,
			contentType : false,
			cache : false,
			beforeSend : function(){
				$(".admin-signin-btn").html("<i class='fa fa-circle-o-notch fa-spin'></i>");
				$("admin-signin-btn").attr("disabled","disabled");
			},
			success : function(response){
				$(".admin-signin-btn").html("SIGN IN");
				$("admin-signin-btn").attr("disabled",false);
				if(response.trim() == "success"){
					window.location = root+"dashboard";
				}
				else{
					$(".admin-signin-notice").removeClass("d-none");
					$(".admin-signin-notice").addClass("alert alert-danger");
					$(".admin-signin-notice").html("<b>Sign in failed, please try again later</b>");
					setTimeout(function(){
						$(".admin-signin-notice").removeClass("alert alert-danger");
						$(".admin-signin-notice").addClass("d-none");
						$("admin-signin-notice").html("");
					},3000);
				}
			}
		});
	});
});

// end admin login coding

// start dynamic design page appear coding

$(document).ready(function(){
	var active_link = $('.active').attr("page-link");
	if(active_link != undefined){
		page_request(active_link);
	}
	$('.collapse-li').each(function(){
		$(this).click(function(){
			var request_url = $(this).attr('page-link');
			if(request_url != undefined){
				page_request(request_url);
			}
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
		url : root+"admin_panel/page_designs/"+request_url,
		cache : false,
		beforeSend : function(){
			$('.progress').removeClass('d-none');
		},
		success : function(response){
			$(".page").html(response);

			if(request_url == "dashboard_design.php"){
				dashboard_features();
			}

			if(request_url == "work_request_design.php"){
				work_request();
			}

			if(request_url == "work_order_design.php"){
				work_order();
			}

			if(request_url == "requester_design.php"){
				requester();
			}

			if(request_url == "technician_design.php"){
				technician();
			}

			if(request_url == "asset_design.php"){
				asset();
			}

			if(request_url == "sales_report_design.php"){
				sales_report();
			}

			if(request_url == "work_report_design.php"){
				work_report();
			}

			if(request_url == "change_admin_password_design.php"){
				change_password();
			}
		}
	});
}

//end page request coding

function dashboard_features(){
	// no of requests,assigned work,and tech

	$.ajax({
			type : "POST",
			url : root+"admin_panel/php/update_nos.php",
			success : function(response){
				console.log(response);
				var all_data = JSON.parse(response);
				$(".no-of-req").html(all_data[0]);
				$(".no-of-assigned-work").html(all_data[1]);
				$(".no-of-tech").html(all_data[2]);
			}
		});

	setInterval(function(){
		$.ajax({
			type : "POST",
			url : root+"admin_panel/php/update_nos.php",
			success : function(response){
				var all_data = JSON.parse(response);
				$(".no-of-req").html(all_data[0]);
				$(".no-of-assigned-work").html(all_data[1]);
				$(".no-of-tech").html(all_data[2]);
			}
		});
	},5000);
}

// start work request coding

function work_request(){
	// view request coding

	$(document).ready(function(){
		$(".view-btn").each(function(){
			$(this).click(function(){
				var view_btn = this;
				var req_id = $(this).attr("req-id");
				$.ajax({
					type : "POST",
					url : root+"admin_panel/php/view_work_request.php",
					data : {
						req_id : req_id
					},
					cache : false,
					beforeSend : function(){
						$(view_btn).html("<i class='fa fa-circle-o-notch fa-spin'></i>");
						$(view_btn).attr("disabled","disabled");
					},
					success : function(response){
						$(view_btn).html("View");
						$(view_btn).attr("disabled",false);
						if(response.trim() != "failed"){
							$(".assign-work-form").trigger("reset");
							var all_data = JSON.parse(response);
							var req_info = all_data[0];
							var req_des = all_data[1];
							var req_name = all_data[2];
							var req_add1 = all_data[3];
							var req_add2 = all_data[4];
							var req_city = all_data[5];
							var req_state = all_data[6];
							var req_pincode = all_data[7];
							var req_email = all_data[8];
							var req_mobile = all_data[9];

							$("#req-id").val(req_id);
							$("#req-info").val(req_info);
							$("#des").val(req_des);
							$("#name").val(req_name);
							$("#address-1").val(req_add1);
							$("#address-2").val(req_add2);
							$("#city").val(req_city);;
							$("#state").val(req_state);
							$("#zip").val(req_pincode);
							$("#email").val(req_email);
							$("#mobile").val(req_mobile);
						}
						else{
							alert(response);
						}

					}
				});
			});
		});
	});

	// delete assigned work requests coding

	$(document).ready(function(){
		$(".close-work-btn").each(function(){
			$(this).click(function(){
				var delete_btn = this;
				var req_id = $(this).attr("req-id");
				var confirm = window.confirm("are you sure ? ");

				if(confirm){
					$.ajax({
						type : "POST",
						url : root+"admin_panel/php/delete_assigned_work.php",
						data : {
							req_id : req_id
						},
						cache: false,
						beforeSend : function(){
							$(delete_btn).html("<i class='fa fa-circle-o-notch fa-spin'></i>");
							$(delete_btn).attr("disabled","disabled");
						},
						success : function(response){
							$(delete_btn).html("Close");
							$(delete_btn).attr("disabled",false);
							if(response.trim() == "delete success"){
								var card = delete_btn.parentElement.parentElement;
								$(card).fadeOut(500);
							}
							else{
								alert(response);
							}
						}
					});
				}
			});
		});
	});

	//assign work coding

	$(document).ready(function(){
		$(".assign-work-form").submit(function(event){
			event.preventDefault();
			var tech = $("#assign-tech").val();
			var req_id = $("#req-id").val();
			if(tech != "Choose Technician"){
				$.ajax({
					type : "POST",
					url : root+"admin_panel/php/assign_work.php",
					data : new FormData(this),
					processData : false,
					contentType : false,
					cache : false,
					beforeSend : function(){
						$(".assign-work-btn").html("<i class='fa fa-circle-o-notch fa-spin'></i>");
						$(".assign-work-btn").attr("disabled","disabled");
					},
					success : function(response){
						$(".assign-work-btn").html("Assign");
						$(".assign-work-btn").attr("disabled",false);
						if(response.trim() == "success"){
							$(".assign-work-notice").removeClass("d-none");
							$(".assign-work-notice").addClass("alert alert-success");
							$(".assign-work-notice").html("<b>The work is assigned to <i><u>"+tech+"</u></i></b>");
							setTimeout(function(){
								$(".assign-work-notice").removeClass("alert alert-success");
								$(".assign-work-notice").addClass("d-none");
								$("assign-work-notice").html("");
								$(".status").each(function(){
									if($(this).attr("req-id") == req_id){
										$(this).removeClass("text-warning");
										$(this).addClass("text-success");
										$(this).html("Status : Approved");
									}
								});
								$(".assign-work-form").trigger("reset");
							},5000);
						}
						else{
							$(".assign-work-notice").removeClass("d-none");
							$(".assign-work-notice").addClass("alert alert-danger");
							$(".assign-work-notice").html("<b>Unable to assign work, please try again later</b>");
							setTimeout(function(){
								$(".assign-work-notice").removeClass("alert alert-danger");
								$(".assign-work-notice").addClass("d-none");
								$("assign-work-notice").html("");
								$(".assign-work-form").trigger("reset");
							},3000);
						}
					}
				});
			}
			else{
				$(".assign-work-notice").removeClass("d-none");
						$(".assign-work-notice").addClass("alert alert-info");
						$(".assign-work-notice").html("<b>Please choose a technician</b>");
						setTimeout(function(){
							$(".assign-work-notice").removeClass("alert alert-info");
							$(".assign-work-notice").addClass("d-none");
							$("assign-work-notice").html("");
						},3000);
			}
		});
	});
}

// end work request coding

// start work order coding

function work_order(){
	$.ajax({
		type : "POST",
		url : root+"admin_panel/php/work_order.php",
		success : function(response){
			if(response.trim() != "no work assigned"){

				var all_data = JSON.parse(response);
				var i;
				for(i=0;i<all_data.length;i++){
					var tr = document.createElement("TR");
					var td1 = document.createElement("TD");
					var td2 = document.createElement("TD");
					var td3 = document.createElement("TD");
					var td4 = document.createElement("TD");
					var td5 = document.createElement("TD");
					var td6 = document.createElement("TD");
					var td7 = document.createElement("TD");
					var td8 = document.createElement("TD");
					var td9 = document.createElement("TD");

					td1.innerHTML = all_data[i].request_id;
					td2.innerHTML = all_data[i].request_info;
					td3.innerHTML = all_data[i].requester_name;
					td4.innerHTML = all_data[i].requester_add_1;
					td5.innerHTML = all_data[i].requester_city;
					td6.innerHTML = all_data[i].requester_mobile;
					td7.innerHTML = all_data[i].assigned_tech;
					td8.innerHTML = all_data[i].assign_date;
					td9.innerHTML = "<div class='d-flex'><button class='btn btn-warning view-details-btn mr-1' req-id='"+all_data[i].request_id+"'><i class='fa fa-eye'></i></button><button class='btn btn-dark delete-order-btn ml-1' req-id='"+all_data[i].request_id+"'><i class='fa fa-trash'></i></button></div>";

					tr.append(td1);
					tr.append(td2);
					tr.append(td3);
					tr.append(td4);
					tr.append(td5);
					tr.append(td6);
					tr.append(td7);
					tr.append(td8);
					tr.append(td9);

					$("#work-order-tbody").append(tr);
				}

				// view details coding

					$(".view-details-btn").each(function(){
						$(this).click(function(){
							$("#detail-modal").modal('show');
							var req_id = $(this).attr("req-id");
							for(i=0;i<all_data.length;i++){
								if(all_data[i].request_id == req_id){
									$("#req_id").html(req_id);
									$("#req-info").html(all_data[i].request_info);
									$("#req-des").html(all_data[i].request_des);
									$("#name").html(all_data[i].requester_name);
									$("#add-1").html(all_data[i].requester_add_1);
									$("#add-2").html(all_data[i].requester_add_2);
									$("#city").html(all_data[i].requester_city);
									$("#state").html(all_data[i].requester_state);
									$("#pin").html(all_data[i].requester_pincode);
									$("#email").html(all_data[i].requester_email);
									$("#mobile").html(all_data[i].requester_mobile);
									$("#assigned-tech").html(all_data[i].assigned_tech);
									$("#assign-date").html(all_data[i].assign_date);
								}
							}

							$(".print-detail-btn").click(function(){
								window.print();
							});
						});
					});

					// start delete work done coding

					$(".delete-order-btn").each(function(){
						$(this).click(function(){
							var confirm = window.confirm("are your sure ?");
							if(confirm){
								var del_btn = this;
								var req_id = $(this).attr("req-id");
								$.ajax({
									type : "POST",
									url : root+"admin_panel/php/delete_done_work.php",
									data : {
										req_id : req_id
									},
									cache : false,
									beforeSend : function(){
										$(del_btn).html("<i class='fa fa-circle-o-notch fa-spin'></i>");
										$(del_btn).attr("disabled","disabled");
									},
									success : function(response){
										$(del_btn).html("<i class='fa fa-trash'></i>");
										$(del_btn).attr("disabled",false);
										if(response.trim() == "delete success"){
											var parent = del_btn.parentElement.parentElement.parentElement;
											parent.remove();
											$(".work-order-notice").removeClass("d-none");
											$(".work-order-notice").addClass("alert alert-success");
											$(".work-order-notice").html("<b>Deleted successfully</b>");
											setTimeout(function(){
												$(".work-order-notice").removeClass("alert alert-success");
												$(".work-order-notice").addClass("d-none");
												$("work-order-notice").html("");
											},3000);
										}
										else{
											$(".work-order-notice").removeClass("d-none");
											$(".work-order-notice").addClass("alert alert-danger");
											$(".work-order-notice").html("<b>Failed to delete,Please try again later</b>");
											setTimeout(function(){
												$(".work-order-notice").removeClass("alert alert-danger");
												$(".work-order-notice").addClass("d-none");
												$("work-order-notice").html("");
											},3000);
										}
									}
								});
							}
						});
					});
			}
			else{
				$(".work-order-notice").removeClass("d-none");
						$(".work-order-notice").addClass("alert alert-info");
						$(".work-order-notice").html("<b>"+response+"</b>");
						setTimeout(function(){
							$(".work-order-notice").removeClass("alert alert-info");
							$(".work-order-notice").addClass("d-none");
							$("work-order-notice").html("");
						},3000);
			}
		}
	});
}

// end work order coding

// start requester coding

function requester(){
	$(".add-user-btn").hover(function(){
		$(this).addClass("pulse animated");
	},
	function(){
		$(this).removeClass("pulse animated");
	});

	// edit user

	$(document).ready(function(){
		$(".edit-user-btn").each(function(){
			$(this).click(function(){
				alert();
				var user_id = atob($(this).attr("user-id"));
				var name = atob($(this).attr("name"));
				var username = atob($(this).attr("username"));
				$("#user-modal").modal({
					show : true,
					backdrop : 'static',
					keyboard : false
				});

				$("#user-modal").on("hidden.bs.modal",function(){
					$(".update-user-form").trigger("reset");
				});

				$("#user-id").val(user_id);
				$("#uname").val(name);
				$("#email").val(username);

				// update user

				var update_user_form = document.querySelector(".update-user-form");
				update_user_form.onsubmit = function(event){
					event.preventDefault();
					$.ajax({
						type : "POST",
						url : root+"admin_panel/php/update_user.php",
						data : new FormData(this),
						processData : false,
						contentType : false,
						cache : false,
						beforeSend : function(){
							$(".update-btn").html("<i class='fa fa-circle-o-notch fa-spin'></i>");
							$(".update-btn").attr("disabled","disabled");
						},
						success : function(response){
							$(".update-btn").html("Update");
							$(".update-btn").attr("disabled",false);
							if(response.trim() == "update success"){
								$(".update-user-notice").removeClass("d-none");
								$(".update-user-notice").addClass("alert alert-success");
								$(".update-user-notice").html("<b>Update success</b>");
								setTimeout(function(){
									$(".update-user-notice").removeClass("alert alert-success");
									$(".update-user-notice").addClass("d-none");
									$("update-user-notice").html("");
									$("#user-modal").modal("hide");
									setTimeout(function(){
										$(".requester-btn").click();
									},1000);
								},3000);
							}
							else{
								$(".update-user-notice").removeClass("d-none");
								$(".update-user-notice").addClass("alert alert-danger");
								$(".update-user-notice").html("<b>Failed to update,please try again later</b>");
								setTimeout(function(){
									$(".update-user-notice").removeClass("alert alert-danger");
									$(".update-user-notice").addClass("d-none");
									$("update-user-notice").html("");
								},3000);
							}
						}
					});
				}
			});
		});
	});

	// delete user

	$(document).ready(function(){
		$(".delete-user-btn").each(function(){
			$(this).click(function(){
				var del_btn = this;
				var confirm = window.confirm("Are you sure ?");
				if(confirm){
					var user_id = $(this).attr("user-id");
					$.ajax({
						type : "POST",
						url : root+"admin_panel/php/delete_user.php",
						data : {
							user_id : user_id
						},
						beforeSend : function(){
							$(del_btn).html("<i class='fa fa-circle-o-notch fa-spin'></i>");
							$(del_btn).attr("disabled","disabled");
						},
						success : function(response){
							
										$(del_btn).html("<i class='fa fa-trash'></i>");
										$(del_btn).attr("disabled",false);
										if(response.trim() == "delete success"){
											var parent = del_btn.parentElement.parentElement;
											parent.remove();
										}
										else{
											alert(response);
										}
						}
					});
				}
			});
		});
	});

	// add user

	$(document).ready(function(){
		$(".add-user-btn").click(function(){
			$("#add-user-modal").modal({
				show : true,
				backdrop : 'static',
				keyboard : false
			});

			$("#add-user-modal").on("hidden.bs.modal",function(){
				$(".add-user-form").trigger("reset");
			});

			var add_user_form = document.querySelector(".add-user-form");
			add_user_form.onsubmit = function(event){		
				event.preventDefault();
				var password = $("#password").val();
				var cpassword = $("#con-password").val();
				var username = $("#username").val();
				if(password == cpassword){
					$.ajax({
						type : "POST",
						url : root+"admin_panel/php/add_user.php",
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
								$(".add-user-notice").removeClass("d-none");
								$(".add-user-notice").addClass("alert alert-success");
								$(".add-user-notice").html("<b>sign up success</b>");
								setTimeout(function(){
									$(".add-user-notice").removeClass("alert alert-success");
									$(".add-user-notice").addClass("d-none");
									$(".add-user-form").trigger("reset");
									$("#add-user-modal").modal("hide");
									setTimeout(function(){
										$(".requester-btn").click();
									},1000);
								},2000);
							}
							else if(response.trim() == "user exist"){
								$(".add-user-notice").removeClass("d-none");
								$(".add-user-notice").addClass("alert alert-warning");
								$(".add-user-notice").html("<b>user already exist</b>");

								setTimeout(function(){
									$(".add-user-notice").removeClass("alert alert-warning");
									$(".add-user-notice").addClass("d-none");
									$(".add-user-form").trigger("reset");
								},2000);
							}
							else{
								$(".add-user-notice").removeClass("d-none");
								$(".add-user-notice").addClass("alert alert-danger");
								$(".add-user-notice").html("<b>"+response+"</b>");
								setTimeout(function(){
									$(".add-user-notice").removeClass("alert alert-danger");
									$(".add-user-notice").addClass("d-none");
									$(".add-user-form").trigger("reset");
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
			}
		});
	});
}

// end requester coding

// start technician coding

function technician(){
	$(".add-tech-btn").hover(function(){
		$(this).addClass("pulse animated");
	},
	function(){
		$(this).removeClass("pulse animated");
	});

	// edit technician

	function update_emp(btn){

				var emp_id = atob($(btn).attr("emp-id"));
				var name = atob($(btn).attr("name"));
				var username = atob($(btn).attr("username"));
				var city = atob($(btn).attr("city"));
				var mobile = atob($(btn).attr("mobile"));
				$("#emp-modal").modal({
					show : true,
					backdrop : 'static',
					keyboard : false
				});

				$("#emp-modal").on("hidden.bs.modal",function(){
					$(".update-emp-form").trigger("reset");
				});


				$("#emp-id").val(emp_id);
				$("#ename").val(name);
				$("#eemail").val(username);
				$("#ecity").val(city);
				$("#emobile").val(mobile);

				// update technician

				var update_emp_form = document.querySelector(".update-emp-form");
				update_emp_form.onsubmit = function(event){
					event.preventDefault();
					$.ajax({
						type : "POST",
						url : root+"admin_panel/php/update_technician.php",
						data : new FormData(this),
						processData : false,
						contentType : false,
						cache : false,
						beforeSend : function(){
							$(".update-btn").html("<i class='fa fa-circle-o-notch fa-spin'></i>");
							$(".update-btn").attr("disabled","disabled");
						},
						success : function(response){
							$(".update-btn").html("Update");
							$(".update-btn").attr("disabled",false);
							if(response.trim() == "update success"){
								$(".update-emp-notice").removeClass("d-none");
								$(".update-emp-notice").addClass("alert alert-success");
								$(".update-emp-notice").html("<b>Update success</b>");
								setTimeout(function(){
									$(".update-emp-notice").removeClass("alert alert-success");
									$(".update-emp-notice").addClass("d-none");
									$("update-emp-notice").html("");
									$("#emp-modal").modal("hide");
									setTimeout(function(){
										$(".technician-btn").click();
									},1000);
								},3000);
							}
							else{
								$(".update-emp-notice").removeClass("d-none");
								$(".update-emp-notice").addClass("alert alert-danger");
								$(".update-emp-notice").html("<b>"+response+"</b>");
								setTimeout(function(){
									$(".update-emp-notice").removeClass("alert alert-danger");
									$(".update-emp-notice").addClass("d-none");
									$("update-emp-notice").html("");
								},3000);
							}
						}
					});
				}
	}

	$(document).ready(function(){
		$(".edit-emp-btn").each(function(){
			$(this).click(function(){
				update_emp(this);
			});
		});
	});

	// delete technician

	$(document).ready(function(){
		$(".delete-emp-btn").each(function(){
			$(this).click(function(){
				var del_btn = this;
				var confirm = window.confirm("Are you sure ?");
				if(confirm){
					var emp_id = $(this).attr("emp-id");
					$.ajax({
						type : "POST",
						url : root+"admin_panel/php/delete_technician.php",
						data : {
							emp_id : emp_id
						},
						beforeSend : function(){
							$(del_btn).html("<i class='fa fa-circle-o-notch fa-spin'></i>");
							$(del_btn).attr("disabled","disabled");
						},
						success : function(response){
							
										$(del_btn).html("<i class='fa fa-trash'></i>");
										$(del_btn).attr("disabled",false);
										if(response.trim() == "delete success"){
											var parent = del_btn.parentElement.parentElement;
											parent.remove();
										}
										else{
											alert(response);
										}
						}
					});
				}
			});
		});
	});

	// add technician

	$(document).ready(function(){
		$(".add-tech-btn").click(function(){
			$("#add-emp-modal").modal({
				show : true,
				backdrop : 'static',
				keyboard : false
			});

			$("#add-emp-modal").on("hidden.bs.modal",function(){
				$(".add-emp-form").trigger("reset");
			});

			var add_emp_form = document.querySelector(".add-emp-form");
			add_emp_form.onsubmit = function(event){

				event.preventDefault();
				var name = $("#name").val();
				var city = $("#city").val();
				var email = $("#email").val();
				var mobile = $("#mobile").val();
				$.ajax({
						type : "POST",
						url : root+"admin_panel/php/add_technician.php",
						data : new FormData(this),
						processData : false,
						contentType : false,
						cache : false,
						beforeSend : function(){
							$(".add-emp-btn").html("<i class='fa fa-circle-o-notch fa-spin'></i>");
							$(".add-emp-btn").attr("disabled","disabled");
						},
						success : function(response){
							$(".add-emp-btn").html("ADD EMPLOYEE");
							$(".add-emp-btn").attr("disabled",false);
							if(response.trim() == "success"){
								$(".add-emp-notice").removeClass("d-none");
								$(".add-emp-notice").addClass("alert alert-success");
								$(".add-emp-notice").html("<b>Employee added successfully</b>");
								setTimeout(function(){
									$(".add-emp-notice").removeClass("alert alert-success");
									$(".add-emp-notice").addClass("d-none");
									$(".add-emp-form").trigger("reset");
									$("#add-emp-modal").modal("hide");
									setTimeout(function(){
										$(".technician-btn").click();
									},1000);
								},2000);
							}
							else if(response.trim() == "user exist"){
								$(".add-emp-notice").removeClass("d-none");
								$(".add-emp-notice").addClass("alert alert-warning");
								$(".add-emp-notice").html("<b>Employee already exist</b>");

								setTimeout(function(){
									$(".add-emp-notice").removeClass("alert alert-warning");
									$(".add-emp-notice").addClass("d-none");
									$(".add-emp-form").trigger("reset");
								},2000);
							}
							else{
								$(".add-emp-notice").removeClass("d-none");
								$(".add-emp-notice").addClass("alert alert-danger");
								$(".add-emp-notice").html("<b>"+response+"</b>");
								setTimeout(function(){
									$(".add-emp-notice").removeClass("alert alert-danger");
									$(".add-emp-notice").addClass("d-none");
									$(".add-emp-form").trigger("reset");
								},2000);						
							}
						}
					});
			}
		});
	});
}

// end technician coding

// start asset coding

function asset(){

	$(".add-product-btn").hover(function(){
		$(this).addClass("pulse animated");
	},
	function(){
		$(this).removeClass("pulse animated");
	});

	// edit product

	function update_product(btn){

				var pro_id = atob($(btn).attr("pro-id"));
				var name = atob($(btn).attr("name"));
				var dop = atob($(btn).attr("dop"));
				var qty = atob($(btn).attr("qty"));
				var total = atob($(btn).attr("total"));
				var org_price = atob($(btn).attr("org-price"));
				var sell_price = atob($(btn).attr("sell-price"));
				$("#product-modal").modal({
					show : true,
					backdrop : 'static',
					keyboard : false
				});

				$("#product-modal").on("hidden.bs.modal",function(){
					$(".update-product-form").trigger("reset");
				});


				$("#pro-id").val(pro_id);
				$("#pname").val(name);
				$("#pdop").val(dop);
				$("#pqty").val(qty);
				$("#ptotal").val(total);
				$("#po-price").val(org_price);
				$("#ps-price").val(sell_price);

				// update technician

				var update_product_form = document.querySelector(".update-product-form");
				update_product_form.onsubmit = function(event){
					event.preventDefault();
					$.ajax({
						type : "POST",
						url : root+"admin_panel/php/update_product.php",
						data : new FormData(this),
						processData : false,
						contentType : false,
						cache : false,
						beforeSend : function(){
							$(".update-btn").html("<i class='fa fa-circle-o-notch fa-spin'></i>");
							$(".update-btn").attr("disabled","disabled");
						},
						success : function(response){
							$(".update-btn").html("Update");
							$(".update-btn").attr("disabled",false);
							if(response.trim() == "update success"){
								$(".update-product-notice").removeClass("d-none");
								$(".update-product-notice").addClass("alert alert-success");
								$(".update-product-notice").html("<b>Update success</b>");
								setTimeout(function(){
									$(".update-product-notice").removeClass("alert alert-success");
									$(".update-product-notice").addClass("d-none");
									$("update-product-notice").html("");
									$("#product-modal").modal("hide");
									setTimeout(function(){
										$(".asset-btn").click();
									},1000);
								},3000);
							}
							else{
								$(".update-product-notice").removeClass("d-none");
								$(".update-product-notice").addClass("alert alert-danger");
								$(".update-product-notice").html("<b>"+response+"</b>");
								setTimeout(function(){
									$(".update-product-notice").removeClass("alert alert-danger");
									$(".update-product-notice").addClass("d-none");
									$("update-product-notice").html("");
								},3000);
							}
						}
					});
				}
	}

	$(document).ready(function(){
		$(".edit-product-btn").each(function(){
			$(this).click(function(){
				update_product(this);
			});
		});
	});

	// delete product

	$(document).ready(function(){
		$(".delete-product-btn").each(function(){
			$(this).click(function(){
				var del_btn = this;
				var confirm = window.confirm("Are you sure ?");
				if(confirm){
					var pro_id = $(this).attr("pro-id");
					$.ajax({
						type : "POST",
						url : root+"admin_panel/php/delete_product.php",
						data : {
							pro_id : pro_id
						},
						beforeSend : function(){
							$(del_btn).html("<i class='fa fa-circle-o-notch fa-spin'></i>");
							$(del_btn).attr("disabled","disabled");
						},
						success : function(response){
							
										$(del_btn).html("<i class='fa fa-trash'></i>");
										$(del_btn).attr("disabled",false);
										if(response.trim() == "delete success"){
											var parent = del_btn.parentElement.parentElement;
											parent.remove();
										}
										else{
											alert(response);
										}
						}
					});
				}
			});
		});
	});

	// add product

	$(document).ready(function(){
		$(".add-product-btn").click(function(){
			$("#add-product-modal").modal({
				show : true,
				backdrop : 'static',
				keyboard : false
			});

			$("#add-product-modal").on("hidden.bs.modal",function(){
				$(".add-product-form").trigger("reset");
			});

			var add_product_form = document.querySelector(".add-product-form");
			add_product_form.onsubmit = function(event){
				event.preventDefault();
				$.ajax({
						type : "POST",
						url : root+"admin_panel/php/add_product.php",
						data : new FormData(this),
						processData : false,
						contentType : false,
						cache : false,
						beforeSend : function(){
							$(".add-pro-btn").html("<i class='fa fa-circle-o-notch fa-spin'></i>");
							$(".add-pro-btn").attr("disabled","disabled");
						},
						success : function(response){
							$(".add-pro-btn").html("ADD PRODUCT");
							$(".add-pro-btn").attr("disabled",false);
							if(response.trim() == "success"){
								$(".add-product-notice").removeClass("d-none");
								$(".add-product-notice").addClass("alert alert-success");
								$(".add-product-notice").html("<b>Product added successfully</b>");
								setTimeout(function(){
									$(".add-product-notice").removeClass("alert alert-success");
									$(".add-product-notice").addClass("d-none");
									$(".add-product-form").trigger("reset");
									$("#add-product-modal").modal("hide");
									setTimeout(function(){
										$(".asset-btn").click();
									},1000);
								},2000);
							}
							else if(response.trim() == "product exist"){
								$(".add-product-notice").removeClass("d-none");
								$(".add-product-notice").addClass("alert alert-warning");
								$(".add-product-notice").html("<b>Product already exist</b>");

								setTimeout(function(){
									$(".add-product-notice").removeClass("alert alert-warning");
									$(".add-product-notice").addClass("d-none");
									$(".add-product-form").trigger("reset");
								},2000);
							}
							else{
								$(".add-product-notice").removeClass("d-none");
								$(".add-product-notice").addClass("alert alert-danger");
								$(".add-product-notice").html("<b>"+response+"</b>");
								setTimeout(function(){
									$(".add-product-notice").removeClass("alert alert-danger");
									$(".add-product-notice").addClass("d-none");
									$(".add-product-form").trigger("reset");
								},2000);						
							}
						}
					});
			}
		});
	});

	// sell product

	$(document).ready(function(){
		$(".sell-product-btn").each(function(){

		$(this).click(function(){
			$("#sell-product-modal").modal({
				show : true,
				backdrop : 'static',
				keyboard : false
			});

			$("#sell-product-modal").on("hidden.bs.modal",function(){
				$(".sell-product-form").trigger("reset");
			});

			var pro_id = atob($(this).attr("pro-id"));
				var name = atob($(this).attr("name"));
				var qty = atob($(this).attr("qty"));
				var sell_price = atob($(this).attr("sell-price"));

				$("#spro-id").val(pro_id);
				$("#sname").val(name);
				$("#sqty").val(qty);
				$("#sprice").val(sell_price);

				var c_qty = Number($("#cqty").val());
				var s_price = Number($("#sprice").val());

			$("#cqty").on("input",function(){
				if($(this).val() == ""){
					$("#total-price").val(sell_price);
				}
				else{
					$("#total-price").val($(this).val()*s_price);
				}
			});

			var sell_product_form = document.querySelector(".sell-product-form");
			sell_product_form.onsubmit = function(event){
				event.preventDefault();
				var available = Number($("#sqty").val());
				var c_qty = Number($("#cqty").val());
				var s_price = Number($("sprice").val());


				if(available > c_qty){
					$.ajax({
						type : "POST",
						url : root+"admin_panel/php/sell_product.php",
						data : new FormData(this),
						processData : false,
						contentType : false,
						cache : false,
						beforeSend : function(){
							$(".sell-pro-btn").html("<i class='fa fa-circle-o-notch fa-spin'></i>");
							$(".sell-pro-btn").attr("disabled","disabled");
						},
						success : function(response){

							$(".sell-pro-btn").html("SELL PRODUCT");
							$(".sell-pro-btn").attr("disabled",false);
							if(response.trim() == "update success"){
								$(".sell-product-notice").removeClass("d-none");
								$(".sell-product-notice").addClass("alert alert-success");
								$(".sell-product-notice").html("<b>Product sell successfully</b>");
								setTimeout(function(){
									$(".sell-product-notice").removeClass("alert alert-success");
									$(".sell-product-notice").addClass("d-none");
									$(".sell-product-form").trigger("reset");
									$("#sell-product-modal").modal("hide");
									setTimeout(function(){
										$(".asset-btn").click();
									},1000);
								},2000);
							}
							else{
								$(".sell-product-notice").removeClass("d-none");
								$(".sell-product-notice").addClass("alert alert-danger");
								$(".sell-product-notice").html("<b>"+response+"</b>");
								setTimeout(function(){
									$(".sell-product-notice").removeClass("alert alert-danger");
									$(".sell-product-notice").addClass("d-none");
									$(".sell-product-form").trigger("reset");
								},2000);						
							}
						}
					});
				}
				else{
					$(".sell-product-notice").removeClass("d-none");
								$(".sell-product-notice").addClass("alert alert-danger");
								$(".sell-product-notice").html("<b>Quantity not available</b>");
								setTimeout(function(){
									$(".sell-product-notice").removeClass("alert alert-danger");
									$(".sell-product-notice").addClass("d-none");
									$(".sell-product-form").trigger("reset");
								},3000);	
				}
			}
		});
		});
	});
}

// end asset coding

// start sales report coding

function sales_report(){
	$(document).ready(function(){
		$(".sales-report-form").submit(function(event){
			event.preventDefault();
			var start_date = $("#start-date").val();
			var end_date = $("#end-date").val();

			if(start_date <= end_date){
				$.ajax({
					type : "POST",
					url : root+"admin_panel/php/sales_report.php",
					data : new FormData(this),
					processData : false,
					contentType : false,
					cache : false,
					beforeSend : function(){
						$(".search-sales-report-btn").html("<i class='fa fa-circle-o-notch fa-spin'></i>");
						$(".search-sales-report-btn").attr("disabled","disabled");
					},
					success : function(response){
						$(".search-sales-report-btn").html("Search");
						$(".search-sales-report-btn").attr("disabled",false);
						if(response.trim() != "failed"){
							$(".sales-report-tbody").html("");
							var all_data = JSON.parse(response);
							console.log(all_data);
							$(".sales-report-table").removeClass("d-none");
							var i;
							for(i=0;i<all_data.length;i++){
								var tr = document.createElement("TR");
								var td1 = document.createElement("TD");
								var td2 = document.createElement("TD");
								var td3 = document.createElement("TD");
								var td4 = document.createElement("TD");
								var td5 = document.createElement("TD");
								var td6 = document.createElement("TD");
								var td7 = document.createElement("TD");
								var td8 = document.createElement("TD");
								var td9 = document.createElement("TD");
								var td10 = document.createElement("TD");

								td1.innerHTML = all_data[i].id;
								td2.innerHTML = all_data[i].customer_name;
								td3.innerHTML = all_data[i].customer_address;
								td4.innerHTML = all_data[i].customer_email;
								td5.innerHTML = all_data[i].customer_mobile;
								td6.innerHTML = all_data[i].product_name;
								td7.innerHTML = all_data[i].qty;
								td8.innerHTML = all_data[i].price_each;
								td9.innerHTML = all_data[i].total;
								td10.innerHTML = all_data[i].sell_date;

								tr.append(td1);
								tr.append(td2);
								tr.append(td3);
								tr.append(td4);
								tr.append(td5);
								tr.append(td6);
								tr.append(td7);
								tr.append(td8);
								tr.append(td9);
								tr.append(td10);
								$(".sales-report-tbody").append(tr);
							}

							// print sales report

							$(".print-sales-report-btn").click(function(){
								window.print();
							});
						}
						else{
							$(".sales-report-notice").removeClass("d-none");
							$(".sales-report-notice").addClass("alert alert-warning");
							$(".sales-report-notice").html("<b>No records found!</b>");
							setTimeout(function(){
								$(".sales-report-notice").removeClass("alert alert-warning");
								$(".sales-report-notice").addClass("d-none");
								$(".sales-report-form").trigger("reset");
							},3000);
						}
					}
				});
			}
			else{
				$(".sales-report-table").addClass("d-none");
				$(".sales-report-notice").removeClass("d-none");
								$(".sales-report-notice").addClass("alert alert-danger");
								$(".sales-report-notice").html("<b>Please select date correctly</b>");
								setTimeout(function(){
									$(".sales-report-notice").removeClass("alert alert-danger");
									$(".sales-report-notice").addClass("d-none");
									$(".sales-report-form").trigger("reset");
								},3000);		
			}
		});
	});
}

// end sales report coding

// start work report coding

function work_report(){
	
	$(document).ready(function(){
		$(".work-report-form").submit(function(event){
			event.preventDefault();
			var start_date = $("#start-date").val();
			var end_date = $("#end-date").val();

			if(start_date <= end_date){
				$.ajax({
					type : "POST",
					url : root+"admin_panel/php/work_report.php",
					data : new FormData(this),
					processData : false,
					contentType : false,
					cache : false,
					beforeSend : function(){
						$(".search-work-report-btn").html("<i class='fa fa-circle-o-notch fa-spin'></i>");
						$(".search-work-report-btn").attr("disabled","disabled");
					},
					success : function(response){
						$(".search-work-report-btn").html("Search");
						$(".search-work-report-btn").attr("disabled",false);
						if(response.trim() != "failed"){
							$(".work-report-tbody").html("");
							var all_data = JSON.parse(response);
							console.log(all_data);
							$(".work-report-table").removeClass("d-none");
							var i;
							for(i=0;i<all_data.length;i++){
								var tr = document.createElement("TR");
								var td1 = document.createElement("TD");
								var td2 = document.createElement("TD");
								var td3 = document.createElement("TD");
								var td4 = document.createElement("TD");
								var td5 = document.createElement("TD");
								var td6 = document.createElement("TD");
								var td7 = document.createElement("TD");
								var td8 = document.createElement("TD");

								td1.innerHTML = all_data[i].request_id;
								td2.innerHTML = all_data[i].request_info;
								td3.innerHTML = all_data[i].requester_name;
								td4.innerHTML = all_data[i].requester_add_1;
								td5.innerHTML = all_data[i].requester_city;
								td6.innerHTML = all_data[i].requester_mobile;
								td7.innerHTML = all_data[i].assigned_tech;
								td8.innerHTML = all_data[i].assign_date;

								tr.append(td1);
								tr.append(td2);
								tr.append(td3);
								tr.append(td4);
								tr.append(td5);
								tr.append(td6);
								tr.append(td7);
								tr.append(td8);
								$(".work-report-tbody").append(tr);
							}

							// print sales report

							$(".print-work-report-btn").click(function(){
								window.print();
							});
						}
						else{
							$(".work-report-notice").removeClass("d-none");
							$(".work-report-notice").addClass("alert alert-warning");
							$(".work-report-notice").html("<b>No records found!</b>");
							setTimeout(function(){
								$(".work-report-notice").removeClass("alert alert-warning");
								$(".work-report-notice").addClass("d-none");
								$(".work-report-form").trigger("reset");
							},3000);
						}
					}
				});
			}
			else{
				$(".work-report-table").addClass("d-none");
				$(".work-report-notice").removeClass("d-none");
								$(".work-report-notice").addClass("alert alert-danger");
								$(".work-report-notice").html("<b>Please select date correctly</b>");
								setTimeout(function(){
									$(".work-report-notice").removeClass("alert alert-danger");
									$(".work-report-notice").addClass("d-none");
									$(".work-report-form").trigger("reset");
								},3000);		
			}
		});
	});	
}

// end work report coding

// start change admin password coding

function change_password(){
	$(document).ready(function(){
		$(".change-password-form").submit(function(event){
			var new_pass = $("#new-password").val();
			var con_new_pass = $("#con-new-password").val();
			event.preventDefault();
			if(new_pass == con_new_pass){
				$.ajax({
					type : "POST",
					url : root+"admin_panel/php/change_admin_password.php",
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

// end change admin password coding