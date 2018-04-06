<div class="container">
      <div class="row">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
        
      <br>
             <p class=" text-info">
              <?php
              $date = new DateTime('NOW', new DateTimeZone('Asia/Ho_Chi_Minh'));
              echo $date->format('d/m/Y H:i:s');
              ?>
          </p> 
      </div>
        <div class="col-xs-10 col-sm-10 col-md-8 col-lg-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-2 col-lg-offset-2 toppad" >
        <form method="post" id="myForm"> 
   
          <div class="panel panel-info">
            <form method="post" id="myForm">
            <div class="panel-heading">
              <h3 class="panel-title">Update Information</h3>
            </div>

            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="/cakecosy/webroot/img/user_logo.png" class="img-circle img-responsive"> </div>
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                   
                      <tr>
                        <td>Username : </td>
                        <td><input type="text" name="username" value="<?php echo $user->username ?>"></td>
                      </tr>
                      <tr>
                        <td>Name : </td>
                        <td><input type="text" name="name" value="<?php echo $user->name ?>"></td>
                      </tr>
                      <tr>
                        <td>Email:</td>
                        <td><input type="text" name="email" id="email1" value="<?php echo $user->email ?>"></td>
                      </tr>
                      <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password" id="password"  value="<?php echo $user->password ?>">
                        </td>

                      </tr>
                      <tr>
                        <td>Confirm Password:</td>
                       <td><input type="password" name="password2"   value="<?php echo $user->password ?>"></td>
                      </tr>
                      <tr>
                        <td>Date of Birth</td>
                       <td><input type="date" name="birthdate"  value="<?php echo $user->birthdate->format('Y-m-d') ?>"></td>
                      </tr>
                   
                         <tr>
                      <tr>
                        <td>Phone</td>
                       <td><input type="text" name="phone"   id="phone" value="<?php echo $user->phone ?>"></td>

                      </tr>
                       <tr>
                        <td>Updated_at</td>
                       <td><input type="date" name="updated_at"  value="<?php echo date('Y-m-d'); ?>"></td>
                      </tr>
      
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
                 <div class="panel-footer" style="text-align: center;"> <button data-original-title="Logout" data-toggle="tooltip" type="button " class="btn btn-sm btn-warning"><?= $this->Html->link("Logout",['action' => 'logout']) ?></button>   
                    <button data-original-title="addproduct" data-toggle="tooltip" type="submit" class="btn btn-sm btn-warning">Save</i></button>   
                  </div>
            
          </div>
          </form>
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
                     
                     matchPass : "#password",
                 } ,
                 password2: {
                            required: true,
                            minlength: 6,
                            
                            equalTo: "#password",
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
