	<style type="text/css">
	img {
		border:none;
		max-width:100%
		border-radius: 20px;
		height: 250px;}
	.ribbon-wrapper {
    float: right;
}

</style>

<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60"></div>
				<div>
					<div class=" col-sm-12 col-md-12 col-lg-12 ">
						<div class="beta-products-list">
							<div class="clearfix"></div>
							<div class="space50">&nbsp;</div>
							<div class="beta-products-details">
								<h4 style="color: #f90; font-size: 22px"><i class="fa fa-birthday-cake"></i>  Sản Phẩm Mới</h4>
								<div class="clearfix"></div>
							</div> 
							<div>
							<?php foreach($productnew as $new): {?>

								<div class="col-sm-5 col-md-4 col-lg-3 ">
									<div class="single-item">
										<div class="single-item-header">
											<a href="viewproduct/<?php echo $new->id ?>"><img src="<?php echo '/cakecosy/'.$new->image ?>" ></a>
										</div>
										<div class="single-item-body">
										<p class="single-item-title"><?php echo $new->name ?></p>
												<p class="single-item-price" style ="font-size: 16px">
													<?php if( $new->promotion_price ==0 ) { ?>
														<span class="flash-sale"><?php echo $new->unit_price ?>đồng</span>
													<?php }else { ?>
															<span class="flash-del"><?php echo $new->unit_price ?>đồng</span>
													<span class="flash-sale"><?php echo $new->promotion_price ?> đồng</span>
													<?php } ?>
													
												</p>
										</div>
										<div class="single-item-caption">
											<div class="add-to-cart pull-left">
													<a href="\cakecosy/products/getAddToCart/<?php echo $new->id ?>">
													<i class="fa fa-shopping-cart"></i>
												</div>
											<div class="beta-btn primary"><?php echo $this->Html->link('chi tiết',['action'=>'viewproduct',$new->id])  ?></div>
											<?php  if ($this->request->session()->read('Auth.User')['permission'] == 2) {?>
											<div class="beta-btn primary"><?php echo $this->Html->link('chỉnh sửa',['action'=>'editproduct',$new->id])  ?></div>
											<div class="clearfix"></div>
											<div class="beta-btn primary"><?= $this->Form->postLink(
									                'Delete',
									                ['action' => 'delete', $new->id],
									                ['confirm' => __('Are you sure you want to delete user with id # {0}?',$new->id)])
									            ?>
									        </div>
									        <?php } ?>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<?php } ?>
							<?php endforeach; ?>
							<div class="clearfix"></div>
							<div>
								<ul class="pagination">
								  <li><?= $this->Paginator->prev('« Previous ', array('class' => 'disabled'));?></li>
								  <li> <?=  $this->Paginator->numbers(array('class'=> 'pagination_link')); //Shows the page numbers?></li>
								  <li><?=  $this->Paginator->next(' Next »', array('class' => 'disabled')); //Shows the next and previous links?></li>
								
								</ul>
							</div>
							 <!-- .beta-products-list -->
							</div>
						</div>
					</div>
					
					<div class="space50">&nbsp;</div>

					<div class="beta-products-list">
								<h4 style="color: #f90; font-size: 22px">
									<i class="fa fa-mail-forward"></i>  Sản Phẩm Khuyến Mãi<a style="font-size: 15px" class="pull-right" href="\cakecosy/viewadd/1" >xem thêm...</a></h4>
								<div class="space30">&nbsp;</div>
							<?php foreach($promotion_price as $new): 
							?>
									<div class="col-sm-5 col-md-4 col-lg-3 ">
										<div class="single-item">
											<div class="single-item-header">
											<?php if ($new->promotion_price !=0) {?>
												<div class="ribbon-wrapper" >
													<div class="ribbon sale">Sale</div>
												</div>
											<?php } ?>
													 <a href="viewproduct/<?php echo $new->id ?>"><img src="<?php echo '/cakecosy/'.$new->image ?>" ></a>
											</div>
											<div class="single-item-body">
											<p class="single-item-title"><?php echo $new->name ?></p>
												<p class="single-item-price" style ="font-size: 16px">
													<?php if( $new->promotion_price ==0 ) { ?>
														<span class="flash-sale"><?php echo $new->unit_price ?>đồng</span>
													<?php }else { ?>
															<span class="flash-del"><?php echo $new->unit_price ?>đồng</span>
													<span class="flash-sale"><?php echo $new->promotion_price ?> đồng</span>
													<?php } ?>
													
												</p>
											</div>
											<div class="single-item-caption">
												<div class="add-to-cart pull-left">
													<a href="\cakecosy/products/getAddToCart/<?php echo $new->id ?>">
													<i class="fa fa-shopping-cart"></i>
												</div>
												<div class="beta-btn primary"><?php echo $this->Html->link('chi tiết',['action'=>'viewproduct',$new->id])  ?></div>
												<?php  if ($this->request->session()->read('Auth.User')['permission'] == 2) {?>
												<div class="beta-btn primary"><?php echo $this->Html->link('chỉnh sửa',['action'=>'editproduct',$new->id])  ?></div>
												<div class="clearfix"></div>
												<div class="beta-btn primary"><?= $this->Form->postLink(
										                'Delete',
										                ['action' => 'delete', $new->id],
										                ['confirm' => __('Are you sure you want to delete user with id # {0}?',$new->id)])
										            ?></div>
										            <?php } ?>
												<div class="clearfix"></div>
												<div class="space50">&nbsp;</div>
											</div>
										</div>
									</div>							
							<?php endforeach; ?>						
					</div>
						<div class="clearfix"></div>
					<div class="beta-products-list">
							<h4 style="color: #f90; font-size: 22px"><i class="fa fa-mail-forward"></i>  Sản Phẩm Dưới 100,000đ<a style="font-size: 15px" class="pull-right" href="\cakecosy/viewadd/2">xem thêm...</a></h4>
							<div class="space30">&nbsp;</div>				
							<?php foreach($price100 as $new): 
							?>
									<div class="col-sm-5 col-md-4 col-lg-3 ">
										<div class="single-item">
											<div class="single-item-header">
											<?php if ($new->promotion_price !=0) {?>
												<div class="ribbon-wrapper" >
													<div class="ribbon sale">Sale</div>
												</div>
											<?php } ?>
													 <a href="viewproduct/<?php echo $new->id ?>"><img src="<?php echo '/cakecosy/'.$new->image ?>" ></a>
											</div>
											<div class="single-item-body">
											<p class="single-item-title"><?php echo $new->name ?></p>
												<p class="single-item-price" style ="font-size: 16px">
													<?php if( $new->promotion_price ==0 ) { ?>
														<span class="flash-sale"><?php echo $new->unit_price ?>đồng</span>
													<?php }else { ?>
															<span class="flash-del"><?php echo $new->unit_price ?>đồng</span>
													<span class="flash-sale"><?php echo $new->promotion_price ?> đồng</span>
													<?php } ?>
													
												</p>
											</div>
											<div class="single-item-caption">
												<div class="add-to-cart pull-left">
													<a href="\cakecosy/products/getAddToCart/<?php echo $new->id ?>">
													<i class="fa fa-shopping-cart"></i>
												</div>
												<div class="beta-btn primary"><?php echo $this->Html->link('chi tiết',['action'=>'viewproduct',$new->id])  ?></div>
												<?php  if ($this->request->session()->read('Auth.User')['permission'] == 2) {?>
												<div class="beta-btn primary"><?php echo $this->Html->link('chỉnh sửa',['action'=>'editproduct',$new->id])  ?></div>
												<div class="clearfix"></div>
												<div class="beta-btn primary"><?= $this->Form->postLink(
										                'Delete',
										                ['action' => 'delete', $new->id],
										                ['confirm' => __('Are you sure you want to delete user with id # {0}?',$new->id)])
										            ?></div>
										            <?php } ?>
												<div class="clearfix"></div>
												<div class="space50">&nbsp;</div>
											</div>
										</div>
									</div>							
							<?php endforeach; ?>						
					</div>
						<div class="clearfix"></div>
					<div class="beta-products-list">
							<h4 style="color: #f90; font-size: 22px"><i class="fa fa-mail-forward"></i>  Sản Phẩm  100,000đ đến 200,000đ<a style="font-size: 15px" class="pull-right" href="\cakecosy/viewadd/3" >xem thêm...</a></h4>
							<div class="space30">&nbsp;</div>						
							<?php foreach($price200 as $new): 
							?>
									<div class="col-sm-5 col-md-4 col-lg-3 ">
										<div class="single-item">
											<div class="single-item-header">
											<?php if ($new->promotion_price !=0) {?>
												<div class="ribbon-wrapper" >
													<div class="ribbon sale">Sale</div>
												</div>
											<?php } ?>
													 <a href="viewproduct/<?php echo $new->id ?>"><img src="<?php echo '/cakecosy/'.$new->image ?>" ></a>
											</div>
											<div class="single-item-body">
											<p class="single-item-title"><?php echo $new->name ?></p>
												<p class="single-item-price" style ="font-size: 16px">
													<?php if( $new->promotion_price ==0 ) { ?>
														<span class="flash-sale"><?php echo $new->unit_price ?>đồng</span>
													<?php }else { ?>
															<span class="flash-del"><?php echo $new->unit_price ?>đồng</span>
													<span class="flash-sale"><?php echo $new->promotion_price ?> đồng</span>
													<?php } ?>
													
												</p>
											</div>
											<div class="single-item-caption">
												<div class="add-to-cart pull-left">
													<a href="\cakecosy/products/getAddToCart/<?php echo $new->id ?>">
													<i class="fa fa-shopping-cart"></i>
												</div>
												<div class="beta-btn primary"><?php echo $this->Html->link('chi tiết',['action'=>'viewproduct',$new->id])  ?></div>
												<?php  if ($this->request->session()->read('Auth.User')['permission'] == 2) {?>
												<div class="beta-btn primary"><?php echo $this->Html->link('chỉnh sửa',['action'=>'editproduct',$new->id])  ?></div>
												<div class="clearfix"></div>
												<div class="beta-btn primary"><?= $this->Form->postLink(
										                'Delete',
										                ['action' => 'delete', $new->id],
										                ['confirm' => __('Are you sure you want to delete user with id # {0}?',$new->id)])
										            ?></div>
										            <?php } ?>
												<div class="clearfix"></div>
												<div class="space50">&nbsp;</div>
											</div>
										</div>
									</div>							
							<?php endforeach; ?>						
					</div>
						<div class="clearfix"></div>
					<div class="beta-products-list">
							
							<h4 style="color: #f90; font-size: 22px"><i class="fa fa-mail-forward"></i>  Sản Phẩm Giá Từ 200,000đ - 300,000đ<a style="font-size: 15px" class="pull-right" href="\cakecosy/viewadd/4" >xem thêm...</a></h4>	
							<div class="space30">&nbsp;</div>						
							<?php foreach($price300 as $new): 
							?>
									<div class="col-sm-5 col-md-4 col-lg-3 ">
										<div class="single-item">
											<div class="single-item-header">
											<?php if ($new->promotion_price !=0) {?>
												<div class="ribbon-wrapper" >
													<div class="ribbon sale">Sale</div>
												</div>
											<?php } ?>
													 <a href="viewproduct/<?php echo $new->id ?>"><img src="<?php echo '/cakecosy/'.$new->image ?>" ></a>
											</div>
											<div class="single-item-body">
											<p class="single-item-title"><?php echo $new->name ?></p>
												<p class="single-item-price" style ="font-size: 16px">
													<?php if( $new->promotion_price ==0 ) { ?>
														<span class="flash-sale"><?php echo $new->unit_price ?>đồng</span>
													<?php }else { ?>
															<span class="flash-del"><?php echo $new->unit_price ?>đồng</span>
													<span class="flash-sale"><?php echo $new->promotion_price ?> đồng</span>
													<?php } ?>
													
												</p>
											</div>
											<div class="single-item-caption">
												<div class="add-to-cart pull-left">
													<a href="\cakecosy/products/getAddToCart/<?php echo $new->id ?>">
													<i class="fa fa-shopping-cart"></i>
												</div>
												<div class="beta-btn primary"><?php echo $this->Html->link('chi tiết',['action'=>'viewproduct',$new->id])  ?></div>
												<?php  if ($this->request->session()->read('Auth.User')['permission'] == 2) {?>
												<div class="beta-btn primary"><?php echo $this->Html->link('chỉnh sửa',['action'=>'editproduct',$new->id])  ?></div>
												<div class="clearfix"></div>
												<div class="beta-btn primary"><?= $this->Form->postLink(
										                'Delete',
										                ['action' => 'delete', $new->id],
										                ['confirm' => __('Are you sure you want to delete user with id # {0}?',$new->id)])
										            ?></div>
										            <?php } ?>
												<div class="clearfix"></div>
												<div class="space50">&nbsp;</div>
											</div>
										</div>
									</div>							
							<?php endforeach; ?>						
					</div>
						<div class="clearfix"></div>
					<div class="beta-products-list">	
							<h4 style="color: #f90; font-size: 22px"><i class="fa fa-mail-forward"></i>  Sản Phẩm Giá Trên 300,000đ<a style="font-size: 15px" class="pull-right" href="\cakecosy/viewadd/5" >xem thêm...</a></h4>	
							<div class="space30">&nbsp;</div>
							<?php foreach($price400 as $new): 
							?>
									<div class="col-sm-5 col-md-4 col-lg-3 ">
										<div class="single-item">
											<div class="single-item-header">
											<?php if ($new->promotion_price !=0) {?>
												<div class="ribbon-wrapper" >
													<div class="ribbon sale">Sale</div>
												</div>
											<?php } ?>
													 <a href="viewproduct/<?php echo $new->id ?>"><img src="<?php echo '/cakecosy/'.$new->image ?>" ></a>
											</div>
											<div class="single-item-body">
											<p class="single-item-title"><?php echo $new->name ?></p>
												<p class="single-item-price" style ="font-size: 16px">
													<?php if( $new->promotion_price ==0 ) { ?>
														<span class="flash-sale"><?php echo $new->unit_price ?>đồng</span>
													<?php }else { ?>
															<span class="flash-del"><?php echo $new->unit_price ?>đồng</span>
													<span class="flash-sale"><?php echo $new->promotion_price ?> đồng</span>
													<?php } ?>
													
												</p>
											</div>
											<div class="single-item-caption">
												<div class="add-to-cart pull-left">
													<a href="\cakecosy/products/getAddToCart/<?php echo $new->id ?>">
													<i class="fa fa-shopping-cart"></i>
												</div>
												<div class="beta-btn primary"><?php echo $this->Html->link('chi tiết',['action'=>'viewproduct',$new->id])  ?></div>
												<?php  if ($this->request->session()->read('Auth.User')['permission'] == 2) {?>
												<div class="beta-btn primary"><?php echo $this->Html->link('chỉnh sửa',['action'=>'editproduct',$new->id])  ?></div>
												<div class="clearfix"></div>
												<div class="beta-btn primary"><?= $this->Form->postLink(
										                'Delete',
										                ['action' => 'delete', $new->id],
										                ['confirm' => __('Are you sure you want to delete user with id # {0}?',$new->id)])
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
</div>
			

