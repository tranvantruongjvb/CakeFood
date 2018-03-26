<div class="message error " style="text-align: center;color: red;" onclick="this.classList.add('hidden');"></div>
<div class="container">
    <div class="row">
        <div class="col-md-8  toppad  pull-right col-md-offset-3 ">
        <br>
			<p class=" text-info">
						<?php
						$date = new DateTime('NOW', new DateTimeZone('Asia/Ho_Chi_Minh'));
						echo $date->format('Y-m-d H:i:s') . "\n";
						?>
			</p>
        </div>
		<div class="col-xs-8 col-sm-8 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1 toppad" >
		   
		    <form method="post" enctype="multipart/form-data" id="myForm">
		        <div class="panel panel-info">
			          
			            <div class="panel-heading">
			              <h3 class="panel-title">Add New Product</h3>
			            </div>
			            <div class="panel-body">
			              <div class="row">
			                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="/cakecosy/webroot/img/user_logo.png" class="img-circle img-responsive"> </div>
			                
			                <div class=" col-md-9 col-lg-9 "> 

			                  <table class="table table-user-information">
			                    <tbody>
			                     
			                      <tr>
			                        <td>name product : </td>
			                        <td><input type="text" name="name" id="name" placeholder="Enter Name Product"></td>
			                      </tr>
			                      <tr>
			                        <td>id_type : </td>
			                        
			                        <td>
			                        	<select name="id_type"><?php foreach ($typeproducts as $key) { ?>
			                    			<option value="<?php echo $key->id ?>">
			                    				<?php echo $key->id ?>
			                    				<?php echo $key->name ?>
			                    			</option> <?php  } ?>  

			                       		 </select>
			                        
			                    </td>
			                      </tr>
			                      <tr>
			                        <td>Description (): </td>
			                        <td><input type="text" name="description"  placeholder="Say something"></td>
			                      </tr>
			                      <tr>
			                        <td>Product New or not:</td>
			                        <td> <select name="new">
			                        		<option value="1"> Có </option>
			                        		<option value="0"> Không </option>
			                        	</select>
			                        </td>
			                      </tr>
			                      <tr>
			                        <td>Unit Price:</td>
			                        <td><input type="text" name="unit_price"  placeholder="Enter Price"></td>
			                      </tr>
			                      <tr>
			                        <td>Promotion_price:</td>
			                        <td><input type="text" name="promotion_price"  placeholder="Enter Promotion_price (not important)"></td>
			                      </tr>
			                      <tr>
			                        <td>image</td>
			                        <td><input type="file" name="image" placeholder="You must choose image"></td>
			                      </tr>
			                   	  <tr>
			                        <td>Created_at</td>
			                        <td><input type="date" name="created_at" value="<?php echo date('Y-m-d'); ?>" /></td>
			                      </tr>
			                    </tbody>
			                  </table>
			                  
			                </div>
			              </div>
			            </div>
			                 <div class="panel-footer" style="text-align: center;">
			                    <button data-original-title="Logout" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><?= $this->Html->link("Login",['action' => 'logout']) ?></button>
			                      
			                            	<button data-original-title="addproduct" data-toggle="tooltip" type="submit" class="btn btn-sm btn-warning">Save</i></button>
			                </div>       
			    </div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">

    $(document).ready(function() {
    
        //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
        $("#myForm").validate(
        {
            rules: {
                name: "required",
                id_type: "required",
                description: "required",
                new : "required", 
               	unit_price : "required",
               	
               	image :"required",     
            },
            messages: {
                name: "Please enter name valid",
                id_type: "Please Choose Type Product ",
                description :"say something about it",
                new : "is it new?",
                unit_price :"Please enter unit Price valid ",
               
                image: "it have not image.",
               
            }
        }); 
    });   

    </script>
