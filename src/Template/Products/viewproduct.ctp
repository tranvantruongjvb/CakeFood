	
<style type="text/css">
	img {
		border:none;
		border-radius: 5px;
		max-width:250px;

		
	}
	
}

</style>
	<div class="inner-header">
		
		<div class="container">
			<div><?php $read =  $this->request->session()->read('cart.'.$products->id); ?> 

			</div>
			
			<div class="pull-left">
				<h6 class="inner-title"><h2><?php echo $products->name ?></h2></h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<?php echo $this->Html->link('Trang chủ',['controller' =>'products' ,'action' => 'index']) ?><span> / Thông Tin  Chi Tiết Sản Phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9 col-md-9">

					<div class="row">
						<div class="col-sm-6 col-md-5">
							<a href="#" class="img"><img src="<?php echo '/cakecosy/'. $products->image;?>" height=" 252px" ></a>
						</div>
						<div class="col-sm-6 col-md-5">
						
							<div class="single-item-body">
								<p class="single-item-title"><h5><?php echo $products->name ?></h5></p>
								<p class="single-item-price">
								<?php if($products->promotion_price ==0) { ?>
										<span class="flash-sale"><?php echo $products->unit_price ?></span>
									<?php } else { ?>
										<span class="flash-del"><?php echo $products->unit_price ?> đồng</span>
										<span class="flash-sale"><?php echo $products->promotion_price ?> đồng</span>
									<?php } ?>
								</p>
							</div>
							

							<div class="clearfix"></div>
							<div class="space10">&nbsp;</div>
							<div class="single-item-desc">
								<p style="color: #f90; font-size: 15px;">Miêu tả sản phẩm</p>
								<p><?php echo $products->description; ?></p>
							</div>

							<div class="space20">&nbsp;</div>
							<div class="single-item-options">
								
								<a class="add-to-cart" href="\cakecosy/products/getAddToCart/<?php echo $products->id ?>"><i class="fa fa-shopping-cart"></i></a>
								<a class="beta-btn primary" href="\cakecosy/order"> Xem giỏ hàng <i class="fa fa-chevron-right"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Nguyên liệu</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p><?php echo $products->source; ?></p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
							<h4>Sản Phẩm Tương Tự</h4>
							<div class="beta-products-details">
								<p class="pull-left"> Tìm thấy <?php echo count($producttype)-1; ?> sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							
							<?php foreach($producttype as $sptt): 
							?>
								<?php if ($sptt->id != $products->id): ?>
									<div class="col-md-4 col-sm-6">
										<div class="single-item">
											<div class="single-item-header">
											<?php if ($sptt->promotion_price !=0) {?>
												<div class="ribbon-wrapper">
													<div class="ribbon sale">Sale</div>
												</div>
											<?php } ?>
											
													 <a href="<?php echo $sptt->id ?>"><img src="<?php echo '/cakecosy/'.$sptt->image ?>" height="250px" width="377px"></a>
											</div>
											<div class="single-item-body">
											<p class="single-item-title"><?php echo $sptt->name ?></p>
												<p class="single-item-price" style ="font-size: 16px">
													<?php if ($sptt->promotion_price ==0) {?>
													<span class="flash-sale"><?php echo $sptt->unit_price ?>đồng</span>
													
													<?php }else {?>
														<span class="flash-del"><?php echo $sptt->unit_price ?>đồng</span>
														<span class="flash-sale"><?php echo $sptt->promotion_price ?>đồng</span>
													<?php } ?>
												</p>
											</div>
											<div class="single-item-caption">
												<div class="add-to-cart pull-left">
													<?php  ?>
													<a href="\cakecosy/products/getAddToCart/<?php echo $products->id ?>">
													<i class="fa fa-shopping-cart"></i>
												</div>
												<div class="beta-btn primary">
													<i class="fa fa-phone" style="font-size: 16px;"> Hotline: 0978172195</i>
												</div>
												<div class="beta-btn primary"><?php echo $this->Html->link('chi tiết',['action'=>'viewproduct',$sptt->id])  ?></div>
												<?php  if ($this->request->session()->read('Auth.User')['permission'] >= 2) {?>
												<div class="beta-btn primary"><?php echo $this->Html->link('chỉnh sửa',['action'=>'editproduct',$sptt->id])  ?></div>
												<div class="clearfix"></div>
												<div class="beta-btn primary"><?= $this->Form->postLink(
										                'Xóa sản phẩm',
										                ['action' => 'delete', $sptt->id],
										                ['confirm' => __('Bạn có chắc chắn muốn xóa sản phẩm có id # {0}?',$sptt->id)])
										            ?></div>
										            <?php } ?>
												<div class="clearfix"></div>
												<div class="space50">&nbsp;</div>
											</div>
										</div>
									</div>
								<?php endif ?>
							<?php endforeach; ?>
						</div>
				</div>

				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Sản Phẩm Nhiều Người Mua Nhất</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
							<?php foreach($productnew as $new): ?> 
								<div class="media beta-sales-item">
								
									<a class="pull-left" href="<?php echo $new->id ?>"><img src="<?php echo '/cakecosy/'.$new->image ?>" height="250px" ></a>
									<div class="media-body">
										<span class="beta-sales"><?php echo $new->name ?> </span>
										<span class="flash-sale"><?php echo $new->unit_price ?> đồng</span>
										
									</div>
								</div>
								<?php endforeach; ?>
								
							</div>
						</div>
					</div> <!-- best sellers widget -->
					 <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
