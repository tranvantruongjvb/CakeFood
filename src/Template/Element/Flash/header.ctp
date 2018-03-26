<body>
<div id="header">
		
		<!-- .header-top -->
		<!-- .header-body -->
		<div class="header-body">

			<div class="container beta-relative">
				<div class="pull-left">
					<a href="" id="logo"><img src="/cakecosy/webroot/img/foody-vn.png" style ="width:100px; height: 50%"></a>
					<div class="space10">&nbsp;</div>

				</div>

				<div class="pull-left">
					<a href="" id="logo"><img src="/cakecosy/webroot/img/foody-vn.png" style ="width:100px; height: 50%"></a>
					

				</div>

				<div class="hiden">
					
					<?php $read = $this->request->session()->read('cart'); ?>
					<?php $readpayment1 = $this->request->session()->read('payment.total'); ?>
					<?php $checkpayment1 = $this->request->session()->check('payment.total') ?>
					<?php $readpayment2 = $this->request->session()->read('payment.total2'); ?>
					<?php $checkpayment2 = $this->request->session()->check('payment.total2') ?>
					<?php $check = $this->request->session()->check('cart') ?>
				</div>
				<?php $readuser = $this->request->session()->read('Auth.User') ?>
				<?php if ($readuser) { ?>
					<nav class="navbar navbar-default navbar-expand-lg navbar-light navbar-right">
					  <!-- Collection of nav links, forms, and other content for toggling -->
					  <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
						
						<ul class="nav navbar-nav navbar-right ml-auto">
					      <li class="nav-item dropdown">
								<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#"><i class="fa fa-user-o"></i> Acount <i class="fa fa-chevron-down"></i></a>
								<ul class="dropdown-menu">
									<li><a href="\cakecosy/products/listcustomer" class="dropdown-item">List Customers</a></li>					
									<li><a href="\cakecosy/edituser/<?php echo $readuser['id'] ?>" class="dropdown-item">Update Information</a></li>
									<li><a href="\cakecosy/addproduct" class="dropdown-item">Add New Product</a></li>
									<li><a href="\cakecosy/adduser" class="dropdown-item">Add New Admin</a></li>
									
									<li><a href="\cakecosy/users/logout" class="dropdown-item">Logout</a></li>
								</ul>
					        
					      </li>
					    </ul>
					  </div>
					</nav>

				<?php }else {?>
						<nav class="navbar navbar-default navbar-expand-lg navbar-light navbar-right">
					  <!-- Collection of nav links, forms, and other content for toggling -->
					  <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">

					    <ul class="nav navbar-nav navbar-right ml-auto">
			<li class="nav-item dropdown">
				<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#"><i class="fa fa-user-o"></i> Login</a>
				<ul class="dropdown-menu">
					<li>
                        <form class="form-inline login-form" comtroller='Users' action="\cakecosy/login" method="post">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" required>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="text" class="form-control" name="password" id="password" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>
                        </form>                        
					</li>
				</ul>
			</li>
		</ul>
					  </div>
					</nav>
				<?php } ?>
				<nav class="navbar navbar-default navbar-expand-lg navbar-light navbar-right">
					  <!-- Collection of nav links, forms, and other content for toggling -->
					  <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">

					  	<ul class="nav navbar-nav navbar-right ml-auto">
					      <li class="nav-item dropdown">
								<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#"><i class="fa fa-user-o"></i> Giỏ hàng (<span id="tongsl">
								<?php if($read){ ?>
											<?php echo count($read); ?>
										<?php }else echo "Trống"; ?></span>)<i class="fa fa-chevron-down"></i> </a>
								<?php if($read){ ?>
								
								<ul class="dropdown-menu">
									<?php foreach ($read as $key): { ?>
										<div class="getkey">
											<li style=" font-size: 13px;padding-left: 2px">
								  						<tr> <b><?php echo $key['name'] ?>
								  							<a style=" width: 5px" href="\cakecosy/products/deleteitems/<?php echo $key['id'] ?>" value="<?php echo $key['id'] ?>" ><i class="fa fa-times"></i></a> </b>
								  						</tr>
								  					</li>
								  				
								  				<li style=" font-size: 13px; padding-left: 2px">
								  				 Số lượng
								  				  <input type="number" class=" getquan"  value="<?php echo $key['quantity'] ?>" min="1" max="1000">
								  				</li>

								  				<li style=" font-size: 13px; padding-left: 2px" class="getprice"  value="<?php echo $key['price'] ?>"> Đơn giá <?php echo $key['price'] ?>
								  				<div class="space10">&nbsp;</div>			
								  			<?php } ?>
								  		</div>
								  		<?php endforeach; ?>
								  		
								  		<p type="text" class="result" ></p>
								  		
								  		<?php if ($checkpayment2 ) { ?>
								  			<p><b>Tổng số tiền :</b> <?php echo $readpayment2; ?> đồng</p>
								  		<?php  } else { ?>
								  		
								  		<p><b>Tổng số tiền :</b> <?php echo $readpayment1; ?> đồng</p>
								  		<?php } ?>
										<a type="submit" name="btn_login" class="btn btn-warning" style="width: 250px" href="\cakecosy/order">Thanh Toán</a> 

									<?php } ?>
								</ul>
					        
					      </li>
					    </ul>
					  	<form class="navbar-form form-inline search-form" method="get" id="searchform" action="\cakecosy\getSearch">
							<div class="input-group">
								<input type="text" class="form-control" name="key" id="key" placeholder="Search...">
								<span class="input-group-btn">
								<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
								</span>
							</div>
						</form>
					</div>
				</nav>
				<div class="clearfix"></div>
		 </div>
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov" style="text-align: center;">
						<li>
						<?= $this->Html->link('Trang Chủ', ['controller' =>'products' ,'action' => 'index']) ?>
						</li>
						
						<li><?= $this->Html->link('Loại Sản Phẩm', ['controller' =>'products' ,'action' =>'typeproduct',$id=1])?>

							<ul class="sub-menu">
								<?php foreach ($typeproducts as $type ) { ?>
								<li><?= $this->Html->link($type->name, ['controller'=>'products','action' => 'typeproduct', $type->id]) ?></li>
								<?php } ?>
							</ul>
						</li>
						<li><?= $this->Html->link('Liên Hệ', ['controller' =>'users' ,'action' => 'contact']) ?></li>
						<!-- <li><?= $this->Html->link(' Xóa session',['controller'=>'products','action'=>'destroy']) ?></li>  -->
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
		<div class="message success " onclick="this.classList.add('hidden') ""></div>
	</div> <!-- #header -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
            
          
            $(document).on('click', '.getkey', function () {
                 
                    var key = $('.getkey');
                    console.log(key.length);
                    for (var i = 0; i < key.length; i++) {
                    	var a = $(key[i]).parents('div').find('.getquan').val();
                    	console.log(a);
                    }

            });
          
</script>
