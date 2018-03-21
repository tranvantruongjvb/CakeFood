<div class="hiden">
					<?php $read = $this->request->session()->read('cart'); ?>
					<?php $check = $this->request->session()->check('cart') ?>

</div>
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title"><b><u> ĐƠN HÀNG</u></b></h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<?= $this->Html->link('Trang Chủ', ['controller' =>'products' ,'action' => 'index']) ?>/ <span>Checkout</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
</div>

<div class="container">
	<div id="content">
		<form action="" method="" class="beta-form-checkout">
			<input type="hidden" name="_token" value="">
			<div class="row">
				<div class="col-sm-6">
					<h4>Thông tin chi tiết đơn hàng</h4>
					<div class="space20">&nbsp;</div>
									

					<div class="form-block">
						<label for="your_first_name">Họ tên*</label>
						<label><?php print_r($listbills['0']['c']['name'] )?></label>
					</div>
					
					<div class="form-block">
						<label for="adress">Địa chỉ*</label>
						<label><?php print_r($listbills['0']['c']['address'] )?></label>
					</div>

					<div class="form-block">
						<label for="email">Email*</label>
						<label><?php print_r($listbills['0']['c']['email'] )?></label>
					</div>

					<div class="form-block">
						<label for="phone">Điện thoại*</label>
						<label><?php print_r($listbills['0']['c']['phone_number'] )?></label>
					</div>
					
					<div class="form-block">
						<label for="notes">Hình thức thanh toán </label>
						<label><?php echo pr($bills['0']['payment']);
       					 ?></label>
					</div>

					<div class="form-block">
						<label for="notes">Ghi chú</label>
						<textarea name="notes"><?php print_r($listbills['0']['c']['note'])?></textarea>
					</div>

				</div>
				<div class="col-sm-6">
					<div class="your-order">
						<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
						<div class="your-order-body">
							<div class="your-order-item">
								<div>
								<?php foreach($listbills as $list): ?>
									<div class="media">
										<img width="35%" src="<?php echo '/cakecosy/'.$list['p']['image']?>" alt="" class="pull-left" style=" width: 100px;">
										<div class="media-body">
											<span class="color-gray your-order-info">Số lượng: <?php print_r($list['b']['quantity'])?></span>
											<span class="color-gray your-order-info">Đơn giá: <?php print_r($list['b']['unit_price']) ?> đồng</span>
										</div>
									</div>
									<br>

								<!-- end one item -->
								<?php endforeach; ?>
							
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="your-order-item">
								<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
								<div class="pull-right"><h4 class="color-black"><?php print_r($list['total'])?> đồng</h4></div>
								<div class="clearfix"></div>
							</div>
						</div>
						

						
					</div> <!-- .your-order -->
				</div>
			</div>
		</form>
	</div> <!-- #content -->
</div> <!-- .container -->
