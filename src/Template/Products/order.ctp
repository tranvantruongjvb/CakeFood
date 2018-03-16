<div class="hiden">
					<?php $read = $this->request->session()->read('cart'); ?>
					<?php $check = $this->request->session()->check('cart') ?>

</div>
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đặt hàng</h6>
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
		<form action="#" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="">
			<div class="row">
				<div class="col-sm-6">
					<h4>Thông tin khách hàng</h4>
					<div class="space20">&nbsp;</div>

					<div class="form-block">
						<label for="your_first_name">Họ tên*</label>
						<input type="text" id="name" name="full_name" required placeholder="Nhập họ và tên">
					</div>
					<div class="form-block">
						<label for="your_first_name">Giới tính</label>
						<input type="radio" name="gender" value="Nữ" checked="checked" style="width: 10%"><span style="padding-right: 20%">Nữ</span>
						<input type="radio" name="gender" value="Nam" checked="checked" style="width: 10%"><span>Nam</span>
					</div>
					<div class="form-block">
						<label for="adress">Địa chỉ*</label>
						<input type="text" id="address" name="address" placeholder="Street Address" required>
					</div>

					<div class="form-block">
						<label for="email">Email*</label>
						<input type="email" name="email" required placeholder="example@gmail.com">
					</div>

					<div class="form-block">
						<label for="phone">Điện thoại*</label>
						<input type="text" name="phone" required>
					</div>
					
					<div class="form-block">
						<label for="notes">Ghi chú</label>
						<textarea name="notes"></textarea>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="your-order">
						<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
						<div class="your-order-body">
							<div class="your-order-item">
								<div>
								<?php if ($check) ?>
								<?php foreach($read as $cart): ?>
								<!--  one item	 -->
									<div class="media">
										<img width="35%" src="<?php echo '/cakecosy/'.$cart['image']?>" alt=""class="pull-left" style=" width: 100px;">
										<div class="media-body">
										<?php $total = $cart['quantity'] *  $cart['price'] ?>
											<p class="font-large"><?php print_r($cart['name'])?></p>
											<span class="color-gray your-order-info">Số lượng: <?php print_r($cart['quantity'])?></span>
											<span class="color-gray your-order-info">Đơn giá: <?php print_r($cart['price']) ?> đồng</span>
										</div>
									</div>
								<!-- end one item -->
								<?php endforeach; ?>
								
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="your-order-item">
								<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
								<?php $total = $this->request->session()->read('payment.total'); ?>
								<div class="pull-right"><h5 class="color-black"><?php echo $total ?> đồng</h5></div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
						
						<div class="your-order-body">
							<ul class="payment_methods methods">
								<li class="payment_method_bacs">
									<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
									<label for="payment_method_bacs">Thanh toán trực tiếp</label>
									<div class="payment_box payment_method_bacs" style="display: block;">
										Giao hàng đến nhà rồi thanh toán tiền cho nhân viên giao hàng
									</div>						
								</li>

								<li class="payment_method_cheque">
									<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
									<label for="payment_method_cheque">Chuyển khoản</label>
									<div class="payment_box payment_method_cheque" style="display: none;">
										Chủ tài khoản: Tran Van Truong
										<br>STK: 0978172195
										<br>..............
									</div>						
								</li>
								
							</ul>
						</div>

						<div class="text-center"><button type="submit" class="beta-btn primary" href="#">Checkout <i class="fa fa-chevron-right"></i></button></div>
					</div> <!-- .your-order -->
				</div>
			</div>
		</form>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection