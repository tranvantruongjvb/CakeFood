<div class="content">
	<p>Xin Chào.! 	<?php echo $arrayName['name'];?></p>
 <p>Cảm ơn bạn đã ghé thăm cửa hàng của chúng tôi</p>
  <p>Bạn đã mua sản phẩm của chúng tôi như sau :</p>
<?php foreach ($arrayName['nameproduct'] as $key) { ?>
		<p>Tên sản phẩm :  <?php echo($key['0']); ?>
		<p>Số lượng 	:	<?php echo($key['1']); ?></p>
		<br>	
<?php } ?>

 <p>Đơn hàng của bạn được chuyển đến : <?php echo $arrayName['address'];?></p>
  <p>Số điện thoại là :<?php echo $arrayName['phone'];?></p>
  <p>Tổng giá trị sản phẩm của bạn :<?php echo $arrayName['totalpay']; ?> đồng</p>
  <p>Hình thức thanh toán : <?php echo $arrayName['payment'];?></p>
 <p>Chúc bạn ngon miệng</p>


</div>
