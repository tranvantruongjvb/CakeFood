<div class="container">
      <div class="row">
      <div class="col-md-8  toppad  pull-right col-md-offset-3 ">
    	
       <br>
<p class=" text-info">
<?php
$dt = new DateTime();
echo $dt->format('Y-m-d H:i:s');
?>
	
</p>
      </div>
        <div class="col-xs-8 col-sm-8 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1 toppad" >
   
   		<form method="post" enctype="multipart/form-data">
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
	                       <?php echo $this->Form->create($product);?>
	                      <tr>
	                        <td>name product : </td>
	                        <td><?php echo $this->Form->input('name')?></td>
	                      </tr>
	                      <tr>
	                        <td>id_type : </td>
	                        <td><?php echo $this->Form->input('id_type')?></td>
	                      </tr>
	                      <tr>
	                        <td>Description (): </td>
	                        <td><?php echo $this->Form->textarea('description')?></td>
	                      </tr>
	                      <tr>
	                        <td>Product New or not:</td>
	                        <td><?php echo $this->Form->input('new')?></td>
	                      </tr>
	                      <tr>
	                        <td>Unit Price:</td>
	                        <td><?php echo $this->Form->input('unit_price')?></td>
	                      </tr>
	                      <tr>
	                        <td>Promotion_price:</td>
	                        <td><?php echo $this->Form->input('promotion_price')?></td>
	                      </tr>
	                      <tr>
	                        <td>image</td>
	                        <td><?php echo $this->Form->input('image', ['type' => 'file'])?></td>
	                      </tr>
	                   	  <tr>
	                        <td>Created_at</td>
	                        <td><?php echo $this->Form->input('created_at',['type' => 'date'])?></td>
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
	                            	<button data-original-title="addproduct" data-toggle="tooltip" type="submit" class="btn btn-sm btn-warning">Save</i></button>
	                        	</span>
	                            
	                        </span>
	                 </div>
	         </form>
         </div>
        </div>
      </div>
    </div>

