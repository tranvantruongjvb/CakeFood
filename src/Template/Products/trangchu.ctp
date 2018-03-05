

<!-- 	<div class="fullwidthbanner-container">
		<div class="fullwidthbanner">
			<div class="bannercontainer" >
		    <div class="banner" >
					
			</div>
			</div>

			<div class="tp-bannertimer"></div>
		</div>
	</div> -->
<style type="text/css">
	img {
border:none;
max-width:100%
border-radius: 20px;
height: 250px;
}
</style>
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
										<?php if($new->promotion_price == 0) ?>

										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
											 <?php echo $this->Html->image("$new->image",['alt' =>'products']); ?>
										</div>
										<div class="single-item-body">
										<p class="single-item-title"><?php echo $new->name ?></p>
											<p class="single-item-price" style ="font-size: 16px">
									
											
												<span class="flash-del"><?php echo $new->unit_price ?>đồng</span>
												<span class="flash-sale"><?php echo $new->promotion_price ?>đồng</span>
											</p>
										</div>
										<div class="single-item-caption">
											<div class="add-to-cart pull-left"><?php $this->Html->link('Giỏ hàng',['action'=>'cart-shop',$new->id]) ?><i class="fa fa-shopping-cart"></i> </div>
											<div class="beta-btn primary"><?php echo $this->Html->link('chi tiết',['action'=>'viewproduct',$new->id])  ?></div>
											<div class="beta-btn primary"><?php echo $this->Html->link('chỉnh sửa',['action'=>'editproduct',$new->id])  ?></div>
											<div class="clearfix"></div>
											<div class="beta-btn primary"><?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $new->id],
                ['confirm' => __('Are you sure you want to delete user with id # {0}?',$new->id)])
            ?></div>
											<div class="clearfix"></div>
											<div class="space50">&nbsp;</div>
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
							
					</div>
				</div> 
			</div>
		</div> 
	</div>
	</div>

