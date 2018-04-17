
<style type="text/css">
	.image_cart{
		width: 70px;
		height: 70px;
	}
	.activez{color:#FFFFFF; background-color:#f3a61b; padding:8px;}
	li{
		padding: 8px;
	}
</style>
<body>
<div id="header">
		<!-- .header-top -->
		<!-- .header-body -->
		<div class="header-body">
			<div class="container beta-relative">
				
				<div class="hiden">
					<?php $read = $this->request->session()->read('cart'); ?>
					<?php $readpayment1 = $this->request->session()->read('payment.total'); ?>
					<?php $checkpayment1 = $this->request->session()->check('payment.total') ?>
					<?php $readpayment2 = $this->request->session()->read('payment.total2'); ?>
					<?php $checkpayment2 = $this->request->session()->check('payment.total2') ?>
					<?php $check = $this->request->session()->check('cart') ?>
				</div>
				<?php $readuser = $this->request->session()->read('Auth.User') ?>
				<nav class="navbar  navbar-expand-lg navbar-expand-md navbar-expand-sm navbar-expand-xl  navbar-light navbar-right" style="width: 100%;     border-radius: 10px;">
					  <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
					  	<?php if ($readuser['permission'] >= 2) { ?>	
							<ul class="nav navbar-nav navbar-right ml-auto">
						      <li class="nav-item dropdown">
									<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#"><i class="fa fa-user-o"></i> Tài Khoản <i class="fa fa-chevron-down"></i></a>
									<ul class="dropdown-menu">
										<li><a href="\cakecosy/listcustomer" class="dropdown-item">Danh sách đơn hàng</a></li>
										<?php if($readuser['permission'] == 3){ ?>
										<li><a href="\cakecosy/listuser" class="dropdown-item">Danh sách người dùng </a></li>
										<?php } ?>
										<li><a href="\cakecosy/userview/<?php echo $readuser['id'] ?>" class="dropdown-item">Thông tin tài khoản </a></li>
										<li><a href="\cakecosy/edituser/<?php echo $readuser['id'] ?>" class="dropdown-item">Cập nhật thông tin </a></li>
										<li><a href="\cakecosy/addproduct" class="dropdown-item">Thêm sản phẩm</a></li>
										<li><a href="\cakecosy/adduser" class="dropdown-item">Thêm Thành Viên</a></li>
										<li><a href="\cakecosy/users/logout" class="dropdown-item">Đăng Xuất</a></li>
									</ul>
						      </li>
						    </ul>
						 <?php } elseif ($readuser['permission'] == 1) {?>
						 	<ul class="nav navbar-nav navbar-right ml-auto">
						      <li class="nav-item dropdown">
									<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#"><i class="fa fa-user-o"></i> Tài khoản <i class="fa fa-chevron-down"></i></a>
									<ul class="dropdown-menu">
										<li><a href="\cakecosy/products/customerbill/<?php echo $readuser['id'] ?>" class="dropdown-item">Đơn hàng đã mua </a></li>
										<li><a href="\cakecosy/edituser/<?php echo $readuser['id'] ?>" class="dropdown-item">Cập nhật thông tin</a></li>								
										<li><a href="\cakecosy/users/logout" class="dropdown-item"><i class="fa fa-sign-out"></i>Đăng Xuất</a></li>
									</ul>
						      </li>
						    </ul>
					<?php }else {?>
						    <ul class="nav navbar-nav navbar-right ml-auto">
								<li class="nav-item dropdown">
									<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#"><i class="fa fa-sign-in"></i> Đăng Nhập</a>
									<ul class="dropdown-menu">
										<li>
					                        <form class="form-inline login-form" action="\cakecosy/login" method="post" id="myForm1">
					                            <div class="input-group">
					                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
					                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" required>
					                            </div>
					                            <div class="input-group">
					                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
					                                <input type="password" class="form-control" name="password"  placeholder="Nhập mật khẩu" required>
					                            </div>
					                            <button type="submit" class="btn btn-primary" style="width: 100%;"><i class="fa fa-sign-in"></i>  Đăng Nhập</button>
					                        </form>                    
										</li>
									</ul>
								</li>
								<li><a  class="nav-link " href="\cakecosy/adduser"><i class="fa fa-user-plus"></i>Đăng Ký</a></li>
							</ul>
					<?php } ?>

					  	<ul class="nav navbar-nav navbar-right ml-auto">
					      <li class="nav-item dropdown">
								<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#"><i class="fa fa-cart-plus"></i> Giỏ hàng (<span id="tongsl">
								<?php if($read){ ?>
											<?php echo count($read); ?>
										<?php }else echo "Trống"; ?></span>)<i class="fa fa-chevron-down"></i> </a>
								<?php if($read){ ?>
									<ul class="dropdown-menu">
										<?php foreach ($read as $key): { ?>
										<div class="getkey">
											<form method="post">
													<li style=" font-size: 13px;padding-left: 2px">
										  				<tr> <b><?php echo $key['name'] ?>
								  							<a style=" width: 5px" href="\cakecosy/products/deleteitems/<?php echo $key['id'] ?>"  value="<?php echo $key['id'] ?>"><i class="fa fa-times"></i></a> </b>
								  						</tr>
									  				</li>
									  				<li>
									  					<a class="pull-right" href="#"><img class="image_cart" src="<?php echo '/cakecosy/'.$key['image'] ?>"  ></a>
									  				</li>
									  				<li style=" font-size: 13px; padding-left: 2px">Số lượng<input type="number" class="getquan" name="getquan" value="<?php echo $key['quantity'] ?>" min="1" max="1000"  >
									  				</li>
									  				<li style=" font-size: 13px; padding-left: 2px" >Đơn Giá <p class="getprice" name="getprice" style="width: 15px;" ><?php echo $key['price'] ?></p>
									  				</li>
									  				<div class="space10">&nbsp;</div>			
									  			<?php } ?>
									  			<p type="text" class="hidden" id="getid"><?php echo  $key['id']?></p>
									  			<p type="text" class="result" ><?php echo  $key['price'] * $key['quantity']?></p>
									  		</form>			
									  		</div>
										  	<?php endforeach; ?>
										  		<b>Tổng số tiền :</b>
										  		<?php if ($checkpayment2 ) { ?>
										  			<p type="text" class="result1" style="font-size: 20px;color: #FF0000"><?php echo $readpayment2; ?> </p>
										  		<?php  } else { ?>
										  		<p type="text" class="result1" style="font-size: 20px;color: #FF0000"><?php echo $readpayment1; ?> </p>
										  		<?php } ?>
												<a type="submit" name="btn_login" class="btn btn-warning" style="width: 250px" href="\cakecosy/order">Thanh Toán</a> 
									</ul>
								<?php } ?>
					      </li>
					    </ul>
					  	<form class="navbar-form form-inline search-form pull-right" method="get" id="searchform" action="\cakecosy\getSearch">
							<div class="input-group" style="width: 480px">
								<input type="text" class="form-control" name="key" id="key" placeholder="Tìm Kiếm...">
								<span class="input-group-btn">
								<button type="submit" class="btn btn-default" style="width: 100%; height: 37px; color: #f90;"><i class="fa fa-search"></i></button>
								</span>
							</div>
						</form>

						<div class="pull-left" style="padding-top: 10px;">
							<a href="\cakecosy/index" id="logo"><img src="/cakecosy/webroot/img/foody-vn.png" style ="width:100px; height: 50%"></a>
							<div class="space10">&nbsp;</div>
						</div>
					</div>

				</nav>
				<div class="clearfix"></div>
		 </div>
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color:#ef7e30 ">
			<div class="container ">
				
				<div class="visible-xs clearfix">
					<ul class="nav navbar-nav navbar-right ml-auto">
				      	<li class="nav-item dropdown">
							<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Menu <i class="fa fa-bars"></i></a>
							<ul class="dropdown-menu">
								<li>
									<a href="\cakecosy/index" ><i class="fa fa-home"></i>Trang Chủ</a>
								</li>
								<li><a href="\cakecosy/typeproduct/1" > <i class="fa fa-retweet"></i>Danh Mục Sản Phẩm</a>
									<ul class="sub-menu">
										<?php foreach ($typeproducts as $type ) { ?>
										<li><?= $this->Html->link($type->name, ['controller'=>'products','action' => 'typeproduct', $type->id]) ?></li>
										<?php } ?>
									</ul>
								</li>
								<li><a href="\cakecosy/contact"><i class="	fa fa-volume-control-phone"></i>Liên Hệ</a></li>
							</ul>
				      	</li>
				    </ul>
				    <ul class="nav navbar-nav navbar-right ml-auto pull-left">
					      <li class="nav-item dropdown">
								<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#"><i class="fa fa-cart-plus"></i> Giỏ hàng (<span id="tongsl">
								<?php if($read){ ?>
											<?php echo count($read); ?>
										<?php }else echo "Trống"; ?></span>)<i class="fa fa-chevron-down"></i> </a>
								<?php if($read){ ?>
									<ul class="dropdown-menu">
										<?php foreach ($read as $key): { ?>
										<div>
											<form method="post">
													<li style=" font-size: 13px;padding-left: 2px">
										  				<tr> <b><?php echo $key['name'] ?>
								  							<a style=" width: 5px" href="\cakecosy/products/deleteitems/<?php echo $key['id'] ?>"  value="<?php echo $key['id'] ?>"><i class="fa fa-times"></i></a> </b>
								  						</tr>
									  				</li>
									  				<li>
									  					<a class="pull-right" href="#"><img class="image_cart" src="<?php echo '/cakecosy/'.$key['image'] ?>"  ></a>
									  				</li>
									  				<li style=" font-size: 13px; padding-left: 2px">Số lượng <p><?php echo $key['quantity'] ?></p>
									  				</li>
									  				<li style=" font-size: 13px; padding-left: 2px" >Đơn Giá <p  style="width: 15px;" ><?php echo $key['price'] ?></p>
									  				</li>
									  				<div class="space10">&nbsp;</div>			
									  			<?php } ?>
									  			<p type="text" class="hidden" id="getid"><?php echo  $key['id']?></p>
									  		</form>			
									  		</div>
										  	<?php endforeach; ?>
										  		<b>Tổng số tiền :</b>
										  		<?php if ($checkpayment2 ) { ?>
										  			<p type="text" class="result1" style="font-size: 20px;color: #FF0000"><?php echo $readpayment2; ?> </p>
										  		<?php  } else { ?>
										  		<p type="text" class="result1" style="font-size: 20px;color: #FF0000"><?php echo $readpayment1; ?> </p>
										  		<?php } ?>
												<a type="submit" name="btn_login" class="btn btn-warning" style="width: 250px" href="\cakecosy/order">Thanh Toán</a> 
									</ul>
								<?php } ?>
					      </li>
					    </ul>

				    <form class="navbar-form form-inline search-form pull-left" method="get" action="\cakecosy\getSearch" style="width: 310px;">
							<div class="input-group">
								<input type="text" class="form-control" name="key" placeholder="Tìm Kiếm...">
								<span class="input-group-btn">
								<button type="submit" class="btn btn-default" style="width: 100%; height: 37px; color: #f90;"><i class="fa fa-search"></i></button>
								</span>
							</div>
						</form>

				</div>
				<nav class="main-menu primary-nav" >
					<ul class="l-inline ov ">
						<li >
							<a href="\cakecosy/index" ><i class="fa fa-home" style="color: white"></i>Trang Chủ</a>
						</li>
						<li><a href="\cakecosy/typeproduct/1" ><i class="fa fa-retweet" style="color: white"></i>Danh Mục Sản Phẩm</a>
							<ul class="sub-menu" style="z-index: 999">
								<?php foreach ($typeproducts as $type ) { ?>
								<li><?= $this->Html->link($type->name, ['controller'=>'products','action' => 'typeproduct', $type->id]) ?></li>
								<?php } ?>
							</ul>
						</li>
						<li><a><i class="fa fa-retweet" style="color: white"></i>Sản Phẩm Theo Giá</a>
							<ul class="sub-menu" style="z-index: 999; text-align: left;">
								<li><a href="\cakecosy/viewadd/90000">Sản Phẩm dưới 100,000đ</a></li>
								<li><a href="\cakecosy/viewadd/150000">Sản Phẩm 100,000đ - 2000,000đ</a></li>
								<li><a href="\cakecosy/viewadd/230000">Sản Phẩm 200,000đ - 3000,000đ</a></li>
								<li><a href="\cakecosy/viewadd/300000">Sản Phẩm 300,000đ</a></li>
							</ul>
						</li>
						<li><a href="\cakecosy/contact"><i class="fa fa-volume-control-phone" style="color: white"></i>Liên Hệ</a></li>
						<li><a ><i class="fa fa-volume-control-phone" style="color: white"></i>Hotline 0978172195</a></li>
						 
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
		<div class="message success " onclick="this.classList.add('hidden') ""></div>
	</div> <!-- #header -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>	

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {	
			 $("#myForm1").validate(
		        {
		            rules: {
		                email: "required",
		                 password:"required",
		                 
		              
		            },
		            messages: {
		                email: "Nhập địa chỉ email", 
		                 password: " Nhập mật khẩu để truy cập",                   
		            }
		        
		        })
			}); 


            $(document).on('click', '.getquan', function () {
                   var a = $(this).val();
                   var b = $(this).parent().parent().find('.getprice').text();
                   var id = $(this).parent().parent().find('#getid').text();
                   var c = $(this).parent().parent().find('.result').empty();
					   c = $(this).parent().parent().find('.result').append(a*b);
					   
					$.ajax({
			              type : 'post', 
			              url : '\\cakecosy/updatequantity', 
			              data : {sl :a,
			              	id: id,
			              		}, 
			              success : function(data)  
			                         { 
			                          
			                        }
			              });
            });
            $(document).on('click', '.getkey', function () {
                var result1=$('.result');
                var sum = parseFloat(0);
            	for (i=0;i<result1.length;i++) {
                	if($(result1[i]).text() == null)
                		$(result1[i]).text() = 0;
                    sum= sum+ parseFloat($(result1[i]).text());
                };
                var result= $(this).parents('div').find('.result1').empty();
                    result= $(this).parents('div').find('.result1').append(sum);
            }); 
 
 


$(function () {
    var url = window.location.pathname; 
    var activePage = url.substring(url.lastIndexOf('/') + 1); //sets the variable "activePage" as the substring after the last "/" in the "url" variable
        $('.primary-nav li a').each(function () { //looks in each link item within the primary-nav list
            var linkPage = this.href.substring(this.href.lastIndexOf('/') + 1); //sets the variable "linkPage" as the substring of the url path in each &lt;a&gt;
 
            if (activePage == linkPage) { //compares the path of the current window to the path of the linked page in the nav item
                $(this).parent().addClass('activez'); //if the above is true, add the "active" class to the parent of the &lt;a&gt; which is the &lt;li&gt; in the nav list
            }
        });
})

</script>
