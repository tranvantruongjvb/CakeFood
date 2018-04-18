<div class="message error " style="text-align: center;color: red;" onclick="this.classList.add('hidden');"></div>
<div class="container">
    <div class="row">
        
		<div class="col-xs-12 col-sm-8 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1 toppad" style="text-align: center" >
		   
		    <form method="post" enctype="multipart/form-data" id="myForm">
		        <div class="panel panel-info">
			          
			            <div class="panel-heading">
			              <h3 class="panel-title">Thêm Sản Phẩm Mới</h3>
			            </div>
			            <div class="panel-body">
			              <div class="row">
			                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="/cakecosy/webroot/img/user_logo.png" class="img-circle img-responsive"> </div>
			                
			                <div class=" col-md-9 col-lg-9 "> 

			                  <table class="table table-user-information">
			                    <tbody>
			                     
			                      <tr>
			                        <td>Tên sản phẩm : </td>
			                        <td><input class="col-xs-5" type="text" name="name" id="name" placeholder="Nhập tên sản phẩm"></td>
			                      </tr>
			                      <tr>
			                        <td>Loại sản phẩm : </td>
			                        
			                        <td>
			                        	<select name="id_type"><?php foreach ($typeproducts as $key) { ?>
			                    			<option value="<?php echo $key->id ?>">
			                    				<?php echo $key->name ?>
			                    			</option> <?php  } ?>  
			                       		 </select>
			                       
			                    </td>
			                      </tr>
			                      <tr>
			                        <td>Miêu tả sản phẩm (): </td>
			                        <td><input type="text" name="description"  placeholder="Nói điều gì đó về sản phẩm"></td>
			                      </tr>
			                      <tr>
			                        <td>Có phải là 1 sản phẩm mới:</td>
			                        <td> <select name="new">
			                        		<option value="1"> Có </option>
			                        		<option value="0"> Không </option>
			                        	</select>
			                        </td>
			                      </tr>
			                      <tr>
			                        <td>Giá bán của sản phẩm:</td>
			                        <td><input type="text" name="unit_price"  placeholder="Enter Price"></td>
			                      </tr>
			                      <tr>
			                        <td>Đơn vị :</td>
			                        <td><select name="unit">
			                        	<option value="cái">Cái</option>
			                    		<option value="hộp">Hộp</option>
			                        	</select>
			                        </td>
			                      </tr>
			                      <tr>
			                        <td>Giảm giá sản phẩm:</td>
			                        <td><input type="text" name="promotion_price"  placeholder="Nhập giá sản phẩm được giảm giá (không quan trọng)"></td>
			                      </tr>
			                      <tr>
			                        <td>Hình ảnh</td>
			                        <td><input type="file" name="image" placeholder="Chọn hình ảnh cho sản phẩm"></td>
			                      </tr>
			                   	  <tr>
			                        <td>Ngày tạo sản phẩm</td>
			                        <td><input type="date" name="created_at" value="<?php echo date('Y-m-d'); ?>" /></td>
			                      </tr>
			                    </tbody>
			                  </table>
			                  
			                </div>
			              </div>
			            </div>
			                 <div class="panel-footer" style="text-align: center;">
			                    <button data-original-title="Logout" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><?= $this->Html->link("Đăng Xuất",['action' => 'logout']) ?></button>
			                      
			                            	<button data-original-title="addproduct" data-toggle="tooltip" type="submit" class="btn btn-sm btn-warning">Lưu Sản Phẩm</i></button>
			                </div>       
			    </div>
			</form>
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
               	
                 
            },
            messages: {
                name: "Nhập tên của sản phẩm",
                id_type: "Chọn sản phẩm thuộc lại nào ",
                description :"Nói đôi chút về sản phẩm",
                new : "Đây là 1 sản phẩm mới ?",
                unit_price :"Nhập giá của sản phẩm",
               
               
               
            }
        }); 
    });   

    </script>
