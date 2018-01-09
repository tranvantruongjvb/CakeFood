
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> 
     <?= $this->Html->meta('icon') ?>
     <?= $this->Html->css('style2.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>

<div id="header">
	<div class="social">
		<ul>
			<li class="icon"><a href="https://vi-vn.facebook.com/"><img src="/cakecosy/webroot/img/facebook.png"></a></li>
			<li class="icon"><a href="https://twitter.com/?lang=vi"><img src="/cakecosy/webroot/img/twitter.png"></a></li>
			<li class="icon"><a href="https://www.linkedin.com/"><img src="/cakecosy/webroot/img/linkedin.png"></a></li>
			<li class="icon"><a href="https://www.instargram.com/"><img src="/cakecosy/webroot/img/instargram.png"></a></li>
		</ul>
	</div>
		<!-- .header-top -->
		<!-- .header-body -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="" id="logo"><img src="/cakecosy/webroot/img/foody-vn.png" style ="width:100px"></a>
					<div class="space10">&nbsp;</div>
				</div>
				<div class="pull-right">
					
		            <?php
		                if ($this->request->session()->read('Auth.User')) { ?>

		                <a href="" id="logo"><img src="/cakecosy/webroot/img/user_logo.png" style ="width:100px"></a>
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
						<li><?= $this->Html->link('Trang Chủ', ['action' => 'trangchu']) ?></li>
						<li><a href=""> Loại Sản phẩm</a>
							<ul class="sub-menu">
								<li><a href="">Bánh Ngọt</a></li>
								<li><a href="">Bánh Mặn	</a></li>
								<li><a href="">Bánh Kem</a></li>
							</ul>
						</li>
						<li><?= $this->Html->link('Giới Thiệu', ['action' => 'news']) ?></li>
						<li><?= $this->Html->link('Liên Hệ', ['action' => 'contact']) ?></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->

