
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
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" style="text-align: center;">
   
          <form method="post">
          <div class="panel panel-info" >
            <div class="panel-heading">
              <h3 class="panel-title">CakeFood xin chào bạn</h3>
            </div>
            <div class="panel-body">
              <div class="row">                
                <div class=" col-md-12 col-lg-12 " align="center">
                 <img alt="User Pic" src="/cakecosy/webroot/img/user_logo.png" class="img-circle img-responsive"> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Email : </td>
                        <td><input type="text" name="email" placeholder="Nhập địa chỉ email"> </td>
                      </tr>
                      <tr>
                        <td>PassWord: </td>
                        <td><input type="password" name="password" placeholder="Nhập mật khẩu"></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><a href="\cakecosy/users/forgetpass"> Forget password</a></td>
                      </tr>
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
                 <div class="panel-footer" style="text-align: center;">
                        <button type="submit" class="btn btn-sm btn-warning" style="text-align: center;">Đăng Nhập</button>
                        <button type="button" class="btn btn-sm btn-warning" style="text-align: center;"><a href="\cakecosy/adduser"></a>Đăng Ký</button>
                        
                    </div>
            
          </div>
          </form>
        </div>
      </div>
    </div>
<script type="text/javascript">
  $(document).ready(function() {
        $("#myForm").validate(
        {
            rules: {
                email: "required",
                 password:"required",
                 
              
            },
            messages: {
                email: "Nhập địa chỉ email", 
                 password: " Nhập mật khẩu để truy cập",                   
            }
        
        }); 

    });   
</script>
