
<style type="text/css">
	img{
		border-radius: 5px;
	}
</style>
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<form  action="\cakecosy/viewadd/<?php echo $products1['0']['unit_price'] ?>" method="post">
								<h4 style="color: #f90; font-size: 22px"><i class="fa fa-mail-forward"></i>Xem Thêm Sản Phẩm
										<span class="pull-right" style="font-size: 15px; color: black">
											<button type="submit" style="background-color: #ef9f68; color: "> Lọc theo</button>
										</span>
										<span class="pull-right" style="font-size: 15px; color: black">
												<select name="sort">
													<option value="thap" class="select"> Giá thấp đến cao</option>
													<option value="cao" class="select"> Giá cao xuống thấp</option>
												</select>
										</span>
										
										
								</h4>
							</form>
							<div class="beta-products-details">
								<p class="pull-left"> Tìm Thấy <?php echo count($products1) ?> 
									<?php echo $name ?>
								</p>
							<div class="clearfix"></div>
							</div>
							<div class="row">
							<?php foreach($products1 as $new): ?>
								<div class="col-sm-5 col-md-4 col-lg-3 ">
									<div class="single-item">
										<div class="single-item-header">
											<?php if($new->promotion_price != 0) ?>
											<div class="ribbon-wrapper"><div class="ribbon sale " >Sale</div></div>
												<a href="\cakecosy/products/viewproduct/<?php print_r($new['id']) ?>"><img src="<?php print_r( '/cakecosy/'.$new['image']) ?>" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title"><?php print_r($new['name']) ?></p>
											<p class="single-item-price" style ="font-size: 16px">
											<?php if($new->promotion_price ==0) { ?>
												<span class="flash-sale"><?php print_r($new['unit_price'])?> đồng</span>
											<?php } else { ?>
												<span class="flash-del"><?php print_r($new['unit_price'])?> đồng</span>
												<span class="flash-sale"><?php print_r($new['promotion_price']) ?>đồng</span>
											<?php } ?>
											</p>
										</div>
										
									</div>
									<div class="single-item-caption">
											<a class="add-to-cart pull-left" href=" \cakecosy/products/getAddToCart/<?php echo $new->id ?>"><i class="fa fa-shopping-cart"></i></a>
											<div class="beta-btn primary">
													<i class="fa fa-phone" style="font-size: 16px;"> Hotline: 0978172195</i>
												</div>
											<a class="beta-btn primary" href="viewproduct/<?php print_r($new['id'])?>">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									<div class="clearfix"></div>
									<div class="space50">&nbsp;</div>
								</div>
							<?php endforeach;?>
							<div class="space50">&nbsp;</div>
							</div>
						</div> <!-- .beta-products-list -->
						</div>
				</div> <!-- end section with sidebar and main content -->
			</div> <!-- .main-content -->
		</div> 
		</div><!-- #content -->
