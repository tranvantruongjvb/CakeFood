<style type="text/css">
	label {
		color: red;
	}
	.img{
		border-radius: 15px;
		height: 200px;
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
        <div class="col-xs-8 col-sm-8 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1 toppad" style="text-align: center;" >
   
	   		<form method="post" enctype="multipart/form-data" id='myForm'>
	            <div class="panel panel-info">
		            <div class="panel-heading">
		              <h3 class="panel-title"><?php echo $product->name ?></h3>
		            </div>

		            <div class="panel-body">
		            	<div class="row">
		                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic"" src="<?php echo '/cakecosy/'. $product->image; ?>" class="img-responsive img" >
		                </div>
		                <div class=" col-md-9 col-lg-9 "> 

		                    <table class="table table-user-information">
			                    <tbody>
			                       <?php echo $this->Form->create($product);{?>
			                      <tr>
			                        <td>Tên sản phẩm : </td>
			                        <td><input type="text" name="name" value="<?php echo $product->name ?>"></td>
			                      </tr>
			                      <tr>
			                        <td>Loại sản phẩm : </td>
			                        <td><select name="id_type">
			                        	<option value="<?php echo $product->id_type ?>">
			                    				<?php echo $getname ?>
			                    			</option> 
			                        	<?php foreach ($typeproducts as $key) { ?>
			                    			<option value="<?php echo $key->id ?>">
			                    				<?php echo $key->name ?>
			                    			</option> <?php  } ?>  

			                       		 </select></td>
			                      </tr>
			                      <tr>
			                        <td>Miêu tả về sản phẩm: </td>
			                        <td><input type="text" name="description" value="<?php echo $product->description ?>"></td>
			                      </tr>
			                      <tr>
			                        <td>Có phải là 1 sản phẩm mới:</td>
			                        <td><select name="new">
			                        	<?php if ($product->new ==1) { ?>
			                        		<option value="1">Có</option>
			                    			<option value="0">Không</option>
			                        	<?php } else { ?>
			                        		<option value="0">Không</option>
			                    			<option value="1">Có</option>
			                        	<?php } ?>
			                       		 </select>
			                        </td>
			                      </tr>
			                      <tr>
			                        <td>Giá bán của sản phẩm:</td>
			                        <td><input type="text" name="unit_price" id="unit_price" value="<?php echo $product->unit_price ?>"></td>
			                      </tr>
			                       <tr>
			                        <td>Giảm giá sản phẩm:</td>
			                        <td><input type="hiden" name="promotion_price" id="promotion_price"  value="<?php echo $product->promotion_price ?>" >
			                        </td>
			                      </tr>
			                      <tr>
			                        <td>Đơn vị :</td>
			                        <td>
			                        	<select name="unit">
			                        	<?php if ($product->unit == 'cái') { ?>
			                        		<option value="cái">Cái</option>
			                    			<option value="hộp">Hộp</option>
			                        	<?php } else { ?>
			                        		<option value="hộp">Hộp</option>
			                    			<option value="cái">Cái</option>
			                        	<?php } ?>
			                       		 </select>
			                        </td>
			                      </tr>
			                      <tr>
			                        <td>Hình ảnh</td>
			                        <td><input type="file" name="image" ></td>
			                      </tr>
			                   	  <tr>
			                        <td>Ngày cập nhật</td>
			                        <td><input type="date" value="<?php echo date('Y-m-d'); ?>" /></td>
			                      </tr>
			                      <?php } ?>
			                    </tbody>
		                    </table>
		                  
		                </div>
		            	</div>
		           </div>
		                 <div class="panel-footer" align="center">
		                 
		                        <button data-original-title="Logout" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><?= $this->Html->link("Đăng Xuất",['action' => 'logout']) ?></button>
	                        	<button data-original-title="addproduct" data-toggle="tooltip" type="submit" class="btn btn-sm btn-warning">Lưu Sản Phẩm</i></button>     
		                 </div>
		    </form>
         </div>
        </div>
      </div>
    </div>

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">
	
    $(document).ready(function() {
    
       
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
              
            },
            messages: {
                name: "Please enter name valid",
                id_type: "Please enter id_type valid ",
                description :"say something about it",
                new : "is it new?",
                unit_price :"Please enter unit Price valid ",
                promotion_price: "Please enter promotion_price valid ",
                
                created_at: "choose day",
            }
        }); 
    });   

    </script>
