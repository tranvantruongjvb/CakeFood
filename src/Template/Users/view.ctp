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
                      <tr>
                        <td>Username : </td>
                        <td><?= h($user->username) ?> </td>
                      </tr>
                      <tr>
                        <td>Email:</td>
                        <td><?= h($user->email) ?></td>
                      </tr>
                      <tr>
                        <td>Date of Birth</td>
                        <td><?= h($user->birthdate) ?></td>
                      </tr>
                   
                         <tr>
                      <tr>
                        <td>Phone</td>
                        <td><?= h($user->phone) ?></td>
                      </tr>
                      <tr>
                        <td>Created: </td>
                        <td><?= $user->created->format(DATE_RFC850) ?></td>
                      </tr>
      
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <button data-original-title="Logout" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><?= $this->Html->link("Login",['action' => 'logout']) ?></button>
                        <span class="pull-right">
                            <button data-original-title="edituser" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><?= $this->Html->link('Update information', ['action' => 'edituser', $user->id]) ?></button>
                            <button data-original-title="adduser" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><?= $this->Html->link('adduser', ['action' => 'adduser']) ?></button>
                        </span>
                    </div>
            
          </div>
        </div>
      </div>
    </div>
