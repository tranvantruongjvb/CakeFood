
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
			<div class="col-xs-10 col-sm-10 col-md-8 col-lg-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-2 col-lg-offset-2 toppad" >

				<div class="panel panel-info">
					<form method="post" id="myForm">
						<div class="panel-heading" style="text-align: center">
							<h3 class="panel-title">Thêm Tài Khoản Mới </h3>
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
													<td>Tên người dùng : </td>
													<td><input type="text" name="username" placeholder="Nhập tên người dùng"></td>
												</tr>
												
												<tr>
													<td>Họ và tên : </td>
													<td><input type="text" name="name" placeholder="Nhập tên"> </td>
												</tr>
												
												<tr>
													<td>Quyền truy cập : </td>
                                                    <?php if ($readuser['permission'] >= 2) { ?>
    													<td><select name="permission">
    																	<option value="2">  Quản Lý</option>
    																<option value="1">  Người Dùng</option>
    																<option value="1" readonly="">  Người Dùng</option>
    															
    														</select>
    													</td>
													   <?php }else {?>
                                                        <td><p name="permission">Người dùng</p>
                                                        </td>
                                                       <?php } ?>
												</tr>
												
												<tr>
													<td>Địa chỉ email:</td>
													<td><input type="email" name="email" id="email1" placeholder="Nhập địa chỉ email"></td>
												</tr>
												
												<tr>
													<td>Mật khẩu:</td>
													<td><input type="password" name="password" id="password1" placeholder="Nhập mật khẩu">
													</td>
												</tr>
												
												<tr>
													<td>Nhập lại mật khẩu :</td>
													<td><input type="password" name="password2" placeholder="Nhập lại mật khẩu">
														
													</td>
													
												</tr>
												
												<tr>
													<td>Địa chỉ:</td>
													<td><input type="text" name="address"  placeholder="Thông tin địa chỉ"></td>
												</tr>

												<tr>
													<td>Ngày sinh</td>
													<td><input type="date"  name="birthdate"></td>
												</tr>
											
												<tr>
													<td>Số điện thoại</td>
													<td><input type="text" name="phone" id="phone" placeholder="Nhập số điện thoại"></td>
												</tr>
				
											</tbody>
										</table>	
									</div>
								</div>
							</div>
						<div class="panel-footer" align="center">
								<button data-original-title="Save" data-toggle="tooltip" type="submit" class="btn btn-sm btn-warning">Thêm Tài Khoản</i></button>
						</div>
					</form>
				</div>
			</div>
			</div>
</div>

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
 <script type="text/javascript">
		jQuery.validator.addMethod("matchPass", function(value) {

        var re = /^[a-zA-Z0-9!@#$%^&*/()._+]*$/;
        if (re.test(value)) {
            return true;
        } else {   
            return false;
        }
    }, "Mật khẩu là những ký tự như a-zA-Z0-9!@#$%^&*()_+");
     
    jQuery.validator.addMethod("matchemail", function(value) {

        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!filter.test(document.getElementById("email1").value)) {
                   
                    return false;
                }else {
                  return true;
                }
                
    }, "Nhập 1 địa chỉ hợp lệ .tranvantruong.jvb@gmail.com");

    jQuery.validator.addMethod("matchphone", function(value) {
        var filter =  /^([0/+84])+([0-9]{9})+$/;
        var filter2 =  /^([0/+84])+([0-9]{10})+$/;
                if (filter.test(document.getElementById("phone").value) || filter2.test(document.getElementById("phone").value)) {
                    return true;
                }else {
                  return false;
                }
                
    }, "Số điện thoại có từ 10 số đến 11 số .\n example: 0978172195");
    jQuery.validator.addMethod("matchpass2", function(value) {
        var filter =  '******';
                if (filter.test(document.getElementById("password1").value)) {
                    return false;
                }else {
                  return true;
                }
                
    }, "Hãy nhập lại mật khẩu để lưu .");

    $(document).ready(function() {

        
        //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
        $("#myForm").validate(
        {
            rules: {
                name: "required",
                username: "required",
                 password:{
                    required: true,
                    minlength :6,
                     matchPass : "#password1",
                     matchpass2 : "#password1",

                 } ,
                 password2: {
                            required: true,
                            minlength: 6,
                            
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
                name: "Nhập tên của bạn",
                username: "Nhập tên người dùng",
                 
                 password:{
                    required: "Nhập mật khẩu chứa các ký tự A-Z a-z 0-9 @ * _ - . ! ",
                    minlength :"Mật khẩu có độ dài từ 6 ký tự",
                    
                        // equalTo : "Please enter password valid A-Z a-z 0-9 @ * _ - . ! ",
                 }, 
                 password2: {
                            required: "Nhập lại mật khẩu",
                            minlength :"Mật khẩu có độ dài từ 6 ký tự",
                            equalTo: "Mật khẩu không khớp với mật khẩu trên ",
                },
                email: {
                    required: "Nhập 1 địa chỉ email hợp lệ ", 
                },
                phone:{
                    required: "Hãy cung cấp cho chúng tôi số điện thoại của bạn",
                    minlength:"Số điện thoại không bao gồm chữ và có độ dài 10 bắt đầu 0 / +84.\n example: 0978172195",

                },
                birthdate: {
                    required: "Chọn ngày sinh của bạn",
                },
                
            }
        
        }); 

    });   
  			
</script>

