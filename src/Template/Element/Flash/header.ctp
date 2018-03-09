
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> 
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>

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
					<?php
                if ($this->request->session()->read('Auth.User')) { ?>
				
            <?php
                }
            ?>
				</div>

				<div class="pull-right beta-components space-left ov">
					<div class="space10"></div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="#">
					        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>
					
					<div class="beta-comp">
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng  <i class="fa fa-chevron-down"></i></div>
							
						</div> <!-- .cart -->
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov" style="text-align: center;">
						<li>
						<?= $this->Html->link('Trang Chủ', ['controller' =>'products' ,'action' => 'trangchu']) ?>
						</li>
						
						<li><?= $this->Html->link('Loại Sản Phẩm', ['controller' =>'products' ,'action' =>'typeproduct',$id=1])?>

							<ul class="sub-menu">
								<?php foreach ($typeproducts as $type ) { ?>
								<li><?= $this->Html->link($type->name, ['action' => 'typeproduct', $type->id]) ?></li>
								<?php } ?>
							</ul>
						</li>

						
						<li><?= $this->Html->link('Liên Hệ', ['controller' =>'users' ,'action' => 'contact']) ?></li>

						<?php
			                if ($this->request->session()->read('Auth.User')) { ?>
							<li>
								<?= $this->Html->link('Admin Manage', ['controller' =>'users' ,'action' => 'userview'])?>
							</li>
			            <?php	}		    
			                else { ?>
			                <li><?= $this->Html->link('Login Admin', ['controller' =>'users' ,'action' => 'login'])?></li>
			                <?php } ?>
	
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->

