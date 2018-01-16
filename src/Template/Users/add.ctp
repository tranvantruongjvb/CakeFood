<div class="container">
      <div class="row">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
    	
       <br>
<p class=" text-info">
<?php
$dt = new DateTime();
echo $dt->format('Y-m-d H:i:s');
?>
	
</p>
      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Sheena Shrestha</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="/cakecosy/webroot/img/user_logo.png" class="img-circle img-responsive"> </div>
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <?php echo $this->Form->create($user);?>
                      <tr>
                        <td>Username : </td>
                        <td><?php echo $this->Form->input('username')?></td>
                      </tr>
                      <tr>
                        <td>Name : </td>
                        <td><?php echo $this->Form->input('name')?> </td>
                      </tr>
                      <tr>
                        <td>Permission (1->admin, 0->user): </td>
                        <td><?php echo $this->Form->input('permission')?> </td>
                      </tr>
                      <tr>
                        <td>Email:</td>
                        <td><?php echo $this->Form->input('email')?></td>
                      </tr>
                      <tr>
                        <td>Password:</td>
                        <td><?php echo $this->Form->input('password')?></td>
                      </tr>
                      <tr>
                        <td>Confirm Password:</td>
                        <td><?php echo $this->Form->input('password2')?></td>
                      </tr>
                      <tr>
                        <td>Date of Birth</td>
                        <td><?php echo $this->Form->input('birthdate')?></td>
                      </tr>
                   
                         <tr>
                      <tr>
                        <td>Phone</td>
                        <td><?php echo $this->Form->input('phone')?></td>
                      </tr>
      
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <button data-original-title="Logout" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><?= $this->Html->link("Login",['action' => 'logout']) ?></button>
                        <span class="pull-right">
                            <span class="pull-right">
                            <button data-original-title="Save" data-toggle="tooltip" type="submit" class="btn btn-sm btn-warning">Save</i></button>
                        </span>
                            
                        </span>
                    </div>
            
          </div>
        </div>
      </div>
    </div>
