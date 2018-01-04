<!DOCTYPE html>
<!-- saved from url=(0034)http://bbs-mot.hatoq.com/dang-nhap -->
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Đăng nhập</title>
<link rel="stylesheet" href="login_files/css">

    </head>

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <b>BBS</b>Movertime
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Đăng nhập để truy cập hệ thống</p>
                
                <form method="post" accept-charset="utf-8" action="#">
                    <div style="display:none;"><input type="hidden" name="_method" value="POST">
                    </div> 
                <div class="form-group has-feedback">
                    <div class="input text"><input type="text" name="email" class="form-control" placeholder="Tên tài khoản" id="email"></div> 
                   <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
    <div class="form-group has-feedback">
        <div class="input password">
            <input type="password" name="password" class="form-control" placeholder="Mật khẩu" id="password">
        </div>       
         <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat" onclick="login()">Đăng nhập</button>        </div>
        <!-- /.col -->
    </div>

<!--</form>-->
</form> 
</div>
</div>
        <script>
            function login(){
                var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!filter.test(document.getElementById("email").value)) {
                    alert('Please enter email valid.\nExample@gmail.com');
                    return false;
                }
                else if(document.getElementById("password").value==""){
                    alert("Please enter password valid");
                    return false;
                }
                return true;
            };
            
        </script>
    
</body>


</html>