<!Doctype html>
<html lang="en">
<head>
	
</head>
<body>
	<div class="fullwidthbanner-container">
		<div class="fullwidthbanner">
			<div class="bannercontainer" >
		    <div class="banner" >
					
			</div>
			</div>

			<div class="tp-bannertimer"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60"></div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản phẩm mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
							<?php foreach($products as $new): ?>
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
										<?php if($new->promotion_price != 0)  ?>
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
											 <?php echo $this->Html->image("user_logo.png", [ "alt" => "User", 'url' => ['controller' => 'users', 'action' => 'userview'] ]); ?>
										</div>
										<div class="single-item-body">
											<p class="single-item-title"></p>
											<p class="single-item-price" style ="font-size: 16px">
											<?php if($new->promotion_price ==0) ?>
												<span class="flash-del"><?php $new->unit_price ?></span>
											 
												<span class="flash-del">đồng</span>
												<span class="flash-sale">đồng</span>
											
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$new->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
							</div>
							<div class="row">
								
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản Phẩm Khuyễn Mãi</h4>
							<div class="beta-products-details">
								<p class="pull-left"> Tìm thấy  sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							 <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->
			</div> <!-- .main-content -->
		</div> 
		</div><!-- #content -->
</body>
</html>