<table width="30%" align="center">
    <h1 align="center">Register new user </h1> 
<td>
    <?php
        echo $this->Flash->render('auth');
        echo $this->Form->create($user, array('id' => 'myForm'));
        echo $this->Form->input('name');
        echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->input('password2',array('label'=>"confirm password",'type'=>'password')); 
        echo $this->Form->input('email');
        echo $this->Form->input('phone');

        echo $this->Form->input('birthdate',[
            'minYear' => date('Y') - 80,
            'maxYear' => date('Y') - 10
        ]); 
            
            
        echo $this->Form->button(__('Register'));
        echo $this->Form->end();
    ?>
    
</td>
</table>

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
