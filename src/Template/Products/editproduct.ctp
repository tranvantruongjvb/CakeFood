<style type="text/css">
	label {
		color: red;
	}
</style>
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
        <div class="col-xs-8 col-sm-8 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 		col-lg-offset-1 toppad" >
   
	   		<form method="post" enctype="multipart/form-data" id='myForm'>
	            <div class="panel panel-info">
		            <div class="panel-heading">
		              <h3 class="panel-title"><?php echo $product->name ?></h3>
		            </div>

		            <div class="panel-body">
		            	<div class="row">
		                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?php echo '/cakecosy/'. $product->image; ?>" class="img-circle img-responsive">
		                </div>
		                <div class=" col-md-9 col-lg-9 "> 

		                    <table class="table table-user-information">
			                    <tbody>
			                       <?php echo $this->Form->create($product);{?>
			                      <tr>
			                        <td>name product : </td>
			                        <td><input type="text" name="name" value="<?php echo $product->name ?>"></td>
			                      </tr>
			                      <tr>
			                        <td>id_type : </td>
			                        <td><input type="text" name="id_type" value="<?php echo $product->id_type ?>"></td>
			                      </tr>
			                      <tr>
			                        <td>Description (): </td>
			                        <td><input type="textarea" name="description" value="<?php echo $product->description ?>"></td>
			                      </tr>
			                      <tr>
			                        <td>Product New or not:</td>
			                        <td><input type="text" name="new" value="<?php echo $product->new ?>"></td>
			                      </tr>
			                      <tr>
			                        <td>Unit Price:</td>
			                        <td><input type="text" name="unit_price" value="<?php echo $product->unit_price ?>"></td>
			                      </tr>
			                      <tr>
			                        <td>Promotion_price:</td>
			                        <td><input type="text" name="promotion_price" value="<?php echo $product->promotion_price ?>"></td>
			                      </tr>
			                      <tr>
			                        <td>image</td>
			                        <td><input type="file" name="image"></td>
			                      </tr>
			                   	  <tr>
			                        <td>Created_at</td>
			                        <td><input type="date" name="created_at" value="<?php echo $product->created_at ?>"></td>
			                      </tr>
			                      <?php } ?>
			                    </tbody>
		                    </table>
		                  
		                </div>
		            	</div>
		           </div>
		                 <div class="panel-footer" align="center">
		                        <button data-original-title="Logout" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><?= $this->Html->link("Login",['action' => 'logout']) ?></button>
	                        	<button data-original-title="addproduct" data-toggle="tooltip" type="submit" class="btn btn-sm btn-warning">Save</i></button>     
		                 </div>
		    </form>
         </div>
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
               	promotion_price :"required",
               	created_at: "required",
               	image :"required",     
            },
            messages: {
                name: "Please enter name valid",
                id_type: "Please enter id_type valid ",
                description :"say something about it",
                new : "is it new?",
                unit_price :"Please enter unit Price valid ",
                promotion_price: "Please enter promotion_price valid ",
                image: "it have not image.",
                created_at: "choose day",
            }
        }); 
    });   

    </script>
