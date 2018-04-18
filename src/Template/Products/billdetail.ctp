<div class="hiden">
					<?php $read = $this->request->session()->read('cart'); ?>
					<?php $check = $this->request->session()->check('cart') ?>
					<?php $permission = $this->request->session()->read('Auth.User')['permission'] ?>
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
		<form action="\cakecosy/products/updatestatus/<?php echo $listbills['0']['c']['id'] ?>"" method="post" class="beta-form-checkout">
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
						<label for="phone">Trạng thái đơn hàng</label>
						<?php if ($permission >=2) { ?>
							<label>
								<select name="status" style="width: 100%">
										<?php if($listbills['0']['c']['status'] == 'Đang xử lý') {?>
												<option value="0">Đang xử lý</option>

												<option value="1">Đang chuyển đi</option>
												<option value="2">Đã thanh toán</option>
											<?php }elseif($listbills['0']['c']['status'] == 'Đang chuyển đi') {?>
												<option value="1">Đang chuyển đi</option>
												<option value="2">Đã thanh toán</option>
											<?php }elseif ($listbills['0']['c']['status'] == 'Đã thanh toán') { ?>
												<option value="2">Đã thanh toán</option>
											<?php } ?>
									</select>
									<button type="submit" style="font-size: 15px; color: black;border: 1px solid #ff8d00; border-radius: 5px; width: 100%">Cập nhật trạng thái </button>
							</label>
						<?php }else{ ?>
							<label ><?php echo $listbills['0']['c']['status'] ?></label>
						<?php  }  ?>
					</div>
					<div class="form-block">
						<label for="notes">Ghi chú</label>
						<textarea name="notes" readonly=""><?php print_r($listbills['0']['c']['note'])?></textarea>
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
											<div class="space10">&nbsp;</div>
											<span class="color-gray your-order-info">Tên sản phẩm: <?php print_r($list['p']['name'])?></span>
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
