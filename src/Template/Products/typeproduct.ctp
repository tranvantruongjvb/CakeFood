<style type="text/css">
	img{
		border-radius: 10px;
	}
</style>
<div class="inner-header">	
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
					<div class="row">
						<div class="col-sm-3" >
							<ul class="aside-menu primary-nav">

							<?php foreach ($typeproducts as $type) { ?>
								<li>
									<a href="\cakecosy/typeproduct/<?php echo $type->id ?>"><?php echo $type->name ?></a>
								</li>
							<?php } ?>
							
							</ul>
						</div>
						<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
							<div class="beta-products-list">
							<div class="row"></div>
							<?php foreach($getproduct as $new): 
							?>
									<div class="col-xs-10 col-sm-6 col-md-4 col-lg-4">
										<div class="single-item">
											<div class="single-item-header">
											<?php if ($new['promotion_price'] !=0) {?>
												<div class="ribbon-wrapper">
													<div class="ribbon sale">Sale</div>
												</div>
											<?php } ?>
											
													 <a href="\cakecosy/products/viewproduct/<?php print_r($new['id']) ?>"><img src="<?php echo '/cakecosy/'.$new['image'] ?>" height="250px" ></a>
											</div>
											<div class="single-item-body">
											<p class="single-item-title"><?php echo $new['name'] ?></p>
												<p class="single-item-price" style ="font-size: 16px">
													<?php if ($new['promotion_price'] == 0) { ?>
														<span class="flash-sale"><?php echo $new["unit_price"] ?>đồng</span>
													<?php } else {?>
													<span class="flash-del"><?php echo $new["unit_price"] ?>đồng</span>
													<span class="flash-sale"><?php echo $new['promotion_price'] ?>đồng</span>
													<?php } ?>
												</p>
											</div>
											<div class="single-item-caption">
												<div class="add-to-cart pull-left">
													<a href="\cakecosy/products/getAddToCart/<?php print_r($new['id']) ?>">
													<i class="fa fa-shopping-cart"></i>
												</div>
												<div class="beta-btn primary">
													<i class="fa fa-phone" style="font-size: 16px;"> Hotline: 0978172195</i>
												</div>
												<div class="beta-btn primary"><?php echo $this->Html->link('Chi tiết',['action'=>'viewproduct',$new['id']])  ?></div>
												<?php  if ($this->request->session()->read('Auth.User')['permission'] == 2) {?>
												<div class="beta-btn primary"><?php echo $this->Html->link('Chỉnh sửa',['action'=>'editproduct',$new['id']])  ?></div>
												<div class="clearfix"></div>
												<div class="beta-btn primary"><?= $this->Form->postLink(
										                'Xóa sản phẩm',
										                ['action' => 'delete', $new['id']],
										                ['confirm' => __('Bạn chắc chắn muốn xóa sản phẩm có id # {0}?',$new['id'])])
										            ?></div>
										            <?php } ?>
												<div class="clearfix"></div>
												<div class="space50">&nbsp;</div>
											</div>
										</div>
									</div>
							<?php endforeach; ?>
							</div>
					</div>
				</div>
						</div>
					</div>
				</div> <!-- .main-content -->
			</div> <!-- #content -->
		</div> <!-- .container -->
	</div>
