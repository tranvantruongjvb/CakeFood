<div class="inner-header">	
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
					<div class="row">
						<div class="col-sm-3" >
							<ul class="aside-menu">

							<?php foreach ($typeproducts as $type) { ?>
								<li><?php echo $this->Html->link($type->name,['action'=>'typeproduct',$type->id]) ?>
									
								</li>
							<?php } ?>
							
							</ul>
						</div>
						<div class="col-sm-9">
							<div class="beta-products-list">
							<div class="row"></div>
							<?php foreach($getproduct as $new): 
							?>
									<div class="col-sm-4">
										<div class="single-item">
											<div class="single-item-header">
											<?php if ($new['promotion_price'] !=0) {?>
												<div class="ribbon-wrapper">
													<div class="ribbon sale">Sale</div>
												</div>
											<?php } ?>
											
													 <a href=""><img src="<?php echo '/cakecosy/'.$new['image'] ?>" height="250px"></a>
											</div>
											<div class="single-item-body">
											<p class="single-item-title"><?php echo $new['name'] ?></p>
												<p class="single-item-price" style ="font-size: 16px">
													<span class="flash-del"><?php echo $new["unit_price"] ?>đồng</span>
													<span class="flash-sale"><?php echo $new['promotion_price'] ?>đồng</span>
												</p>
											</div>
											<div class="single-item-caption">
												<div class="add-to-cart pull-left"><?php $this->Html->link('Giỏ hàng',['action'=>'cart-shop',$new['id']]) ?><i class="fa fa-shopping-cart"></i> </div>
												<div class="beta-btn primary"><?php echo $this->Html->link('chi tiết',['action'=>'viewproduct',$new['id']])  ?></div>
												<?php  if ($this->request->session()->read('Auth.User')) {?>
												<div class="beta-btn primary"><?php echo $this->Html->link('chỉnh sửa',['action'=>'editproduct',$new['id']])  ?></div>
												<div class="clearfix"></div>
												<div class="beta-btn primary"><?= $this->Form->postLink(
										                'Delete',
										                ['action' => 'delete', $new['id']],
										                ['confirm' => __('Are you sure you want to delete user with id # {0}?',$new['id'])])
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
