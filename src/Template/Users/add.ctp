
<html>
<head>
    <title></title>
<style type="text/css">

.field-wrap {
  position: relative;
  margin-bottom: 40px;
  width: 300px;
}
.field-wrap input{
    border-radius: 10px;
}
</style>
</head>
<body>
    <table width="30%" align="center">
    
    <h1 align="center">Register new user </h1> 
    <form method="post" id="myForm">
        <div class="field-wrap ">

                    <p>Name</p>
                    <input type="text" required autocomplete="off" name="name" id="name" />
      
                    <p>UserName</p>
                    <input type="text" required autocomplete="off" name="username" id="username" />

                    <p>Password</p>
                    <input type="password" required autocomplete="off" name="password" id="password" />
     
                    <p>Password2</p>
                    <input type="password" required autocomplete="off" name="password2" id="password2" />
     
                    <p>Email</p>
                    <input type="text" required autocomplete="off" name="email" id="email" />
   
                    <p>phone</p>
                    <input type="text" required autocomplete="off" name="phone" id="phone" />
    
                    <p>Enter your birthday:</p>
                    <input type="date" id="bday" name="bday">
         </div>

        <button class="button button-block" type="submit" name="btn_login">Register</button>

    </form>
</table>
</body>



 <script type="text/javascript">
    jQuery.validator.addMethod("matchPass", function(value) {
        var re = /^[a-zA-Z0-9!@#$%^&*()_+]*$/;
        if (re.test(value)) {
            return true;
        } else {   
            return false;
        }
    }, "Password do not match a-zA-Z0-9!@#$%^&*()_+");
     
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
                     maxlength: 12,
                     matchPass : "#password",
                 } ,
                 password2: {
                            required: true,
                            minlength: 6,
                            maxlength: 12,
                            equalTo: "#password",
                },
                email: {
                            required: true,
                            email: true,
                },
                phone:{
                    required: true,
                    minlength: 10,
                } ,
                birthdate: "required",
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
                    required: "Please provide a Email",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
                phone:{
                    required: "Please provide a Phone",
                    minlength:"Your password must be at least 10 characters long",
                },
                birthdate: {
                    required: "Please provide a birthdate",
                },
            }
        
        }); 
    });   
    </script>
</html>
