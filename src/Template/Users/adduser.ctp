
<style type="text/css">


input
{
     font-family: Calibri;
    font-size:12pt;
}

</style>

<?php $readuser =  $this->request->session()->read('Auth.User') ?>

<div class="container">
			<div class="row">
				<div class="col-md-8  toppad  pull-right col-md-offset-3 ">
					 <br>
						 <p class=" text-info">
							<?php
							$date = new DateTime('NOW', new DateTimeZone('Asia/Ho_Chi_Minh'));
							echo $date->format('Y-m-d H:i:s') . "\n";
							?>
					</p> 
				</div>
			<div class="col-xs-10 col-sm-10 col-md-8 col-lg-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-2 col-lg-offset-2 toppad" >

				<div class="panel panel-info">
					<form method="post" id="myForm">
						<div class="panel-heading">

							<h3 class="panel-title">ADD New User </h3>
						</div>
							
						<div class="panel-body">
								<div class="row">
									
									<div class="col-md-3 col-lg-3 " align="center">

										 <img alt="User Pic" src="/cakecosy/webroot/img/user_logo.png" class="img-circle img-responsive">
									</div>
									
									<div class=" col-md-9 col-lg-9 "> 
										<table class="table table-user-information">
											<tbody>
												
												<tr>
													<td>Username : </td>
													<td><input type="text" name="username" placeholder="Enter Username"></td>
												</tr>
												
												<tr>
													<td>Name : </td>
													<td><input type="text" name="name" placeholder="Enter Name"> </td>
												</tr>
												
												<tr>
													<td>Permission : </td>
													<td><select name="permission">
																<?php if ($readuser['permission'] == 2) { ?>
																	<option value="2">  Admin</option>
																<option value="1">  User</option>
																<?php }else {?>
																<option value="1">  User</option>
																<?php } ?>
														</select>
													</td>
													
												</tr>
												
												<tr>
													<td>Email:</td>
													<td><input type="email" name="email" id="email1" placeholder="Enter Email"></td>
												</tr>
												
												<tr>
													<td>Password:</td>
													<td><input type="text" name="password" id="password1" placeholder="Enter Password">
													</td>
												</tr>
												
												<tr>
													<td>Confirm Password:</td>
													<td><input type="text" name="password2" placeholder="Enter Password again">
														
													</td>
													
												</tr>
									
												<tr>
													<td>Date of Birth</td>
													<td><input type="date"  name="birthdate"></td>
												</tr>
											
												<tr>
													<td>Phone</td>
													<td><input type="text" name="phone" id="phone" placeholder="Enter Number Phone"></td>
												</tr>
				
											</tbody>
										</table>	
									</div>
								</div>
							</div>
						<div class="panel-footer" align="center">
								<button data-original-title="Save" data-toggle="tooltip" type="submit" class="btn btn-sm btn-warning">Save</i></button>
						</div>
					</form>
				</div>
			</div>
			</div>
</div>

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
 <script type="text/javascript">
		jQuery.validator.addMethod("matchPass", function(value) {

				var re = /^[a-zA-Z0-9!@#$%^&*()_+]*$/;
				if (re.test(value)) {
						return true;
				} else {   
						return false;
				}
		}, "Password do not match a-zA-Z0-9!@#$%^&*()_+");
		 
		jQuery.validator.addMethod("matchemail", function(value) {

				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!filter.test(document.getElementById("email1").value)) {
                   
                    return false;
                }else {
                	return true;
                }
                
		}, "Please enter a valid email address.Example@gmail.com");

		jQuery.validator.addMethod("matchphone", function(value) {
				var filter =  /^([0/+84])+([0-9]{9})+$/;
                if (!filter.test(document.getElementById("phone").value)) {
                    return false;
                }else {
                	return true;
                }
                
		}, "Please enter number phone and length 10 .\n example: 0978172195");

		$(document).ready(function() {	//Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
				$("#myForm").validate(
				{
						rules: {
								name: "required",
								username: "required",
								 password:{
										required: true,
										minlength :6,
										 maxlength: 12,
										 matchPass : "#password1",
								 } ,
								 password2: {
										required: true,
										minlength: 6,
										maxlength: 12,
										equalTo: "#password1",
								},
								email: {
										required: true,
										matchemail : '#email1',
								},
								phone:{
										required: true,
										minlength: 10,
										matchphone: '#phone',

								} ,
								birthdate:{
									required: true,
								},
							
						},
						messages: {
								name: "Please enter name valid",
								username: "Please enter username valid",
								 
								 password:{
										required: "Please enter password valid A-Z a-z 0-9 @ * _ - . ! ",
										minlength :"Length must minlength 6",
										 maxlength :"Length must no more maxlength 12",
												// equalTo : "Please enter password valid A-Z a-z 0-9 @ * _ - . ! ",
								 }, 
								 password2: {
														required: "Please enter password valid",
														minlength :"Length must minlength 6",
														equalTo: "password is not Duplicate ",
								},
								email: {
										required: "Please enter a valid email address",	
								},
								phone:{
										required: "Please provide a Phone",
										minlength:"Please enter number phone and length 10 begin 0 / +84.\n example: 0978172195",

								},
								birthdate: {
										required: "Please provide birthdate",
								},
								
						}
				
				}); 

		});   			
</script>

