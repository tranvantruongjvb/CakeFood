<div id="footer" class="color-div">
		<div class="container">
			<div class="row">
				
					<div class="col-sm-2">
					<div class="widget">
						<h4 class="widget-title">Mạng Xã Hội</h4>

						<div id="beta-faceboo-feed">
							<div>
								<ul>
								<li><a href="https://www.facebook.com/"><i class="fa fa-chevron-right"></i> Facebook</a></li>
								<li><a href="https://twitter.com/"><i class="fa fa-chevron-right"></i> Twitter</a></li>
								<li><a href="https://www.instagram.com/"><i class="fa fa-chevron-right"></i> Instagram</a></li>
								
							</ul>
							</div>
						</div>
					</div>
				
				</div>
				<div class="col-sm-3">
					<div class="widget">
						<h4 class="widget-title">Thông tin </h4>
						<div>
							<ul>
								<li><a href=""><i class="fa fa-chevron-right"></i> Tên cửa Hàng: Cake Cosy Shop</a></li>
								<li><a href=""><i class="fa fa-chevron-right"></i> Số Điện Thoại 0978172195</a></li>
								<li><a href=""><i class="fa fa-chevron-right"></i> Địa Chỉ : Mễ trì, Bắc Từ Liêm, Hà Nội</a></li>
								
								
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
				 <div class="col-sm-10">
					<div class="widget">
						<h4 class="widget-title">Giấy phép </h4>
						<div>
							<div class="contact-info">
								<i class="fa fa-map-marker"></i>
								<p>©2017 Foody Corporation</p>
								<p>
								Số giấy phép ĐKKD: 0311828036</p>
							</div>
						</div>
					</div>
				  </div>
				</div>
				<div class="col-sm-3">
					<div class="widget">
						<h4 class="widget-title">Nhận tin Cake </h4=>
						<form action="\cakecosy/getnews" method="post">
							<input type="email" name="your_email" id="input" placeholder="cakecosy@gmail.com">
							<button class="pull-right"  type="submit" id="getemail">Nhận Tin <i class="fa fa-chevron-right"></i></button>
						</form>
					</div>
				</div>
			</div> <!-- .row -->
		</div> <!-- .container -->
	</div> <!-- #footer -->


	<script type="text/javascript">
		  $(document).on('click', '#getemail', function () {
                var email= $(this).parents().find('#input').val();
                if(email == ''){
                	alert('Email của bạn đang trống, hãy điền email của bạn');
                	return false;
                }return true;
            }); 

	</script>
