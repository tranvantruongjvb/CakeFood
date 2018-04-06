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
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?= h($user->name) ?></h3>
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
                        <td>Name : </td>
                        <td><?= h($user->name) ?> </td>
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
                 <div class="panel-footer" style="text-align: center;">

                              <?php  if ($this->request->session()->read('Auth.User')['permission'] == 1) {?>
                             <button type="button" class="btn btn-sm btn-warning" style="text-align: center;"><?= $this->Html->link("Logout",['action' => 'logout']) ?></button>
                            <button type="button" style="text-align: center;" class="btn btn-sm btn-warning"><?= $this->Html->link('Update Information', ['action' => 'edituser', $user->id]) ?></button>
                            <?php } ?>
                            
                            <?php  if ($this->request->session()->read('Auth.User')['permission'] == 2) {?>
                             <button type="button" class="btn btn-sm btn-warning" style="text-align: center;"><?= $this->Html->link("Logout",['action' => 'logout']) ?></button>
                            <button  type="button" style="text-align: center;" class="btn btn-sm btn-warning"><?= $this->Html->link('Add product', ['controller' => 'products', 'action' => 'addproduct'] ); ?></button>
                            
                            <button  type="button" style="text-align: center;" class="btn btn-sm btn-warning"><?= $this->Html->link('Add New Admin', ['action' => 'adduser']) ?></button>
                            <?php } ?>
                        
                    </div>
            
          </div>
        </div>
      </div>
    </div>