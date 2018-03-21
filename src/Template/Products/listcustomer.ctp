<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Tìm kiếm</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy <?php echo count($customers) ?> Đơn hàng</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
						

							<?php foreach($customers as $cus): ?>
								<nav class="navbar navbar-default navbar-expand-lg navbar-light">
								<div class="navbar-header d-flex col">
									<a class="navbar-brand" href="#"><b><?php echo $cus->name ?></b></a> 
								</div>
								<div class="space50">&nbsp;</div>
								<!-- Collection of nav links, forms, and other content for toggling -->
								<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
									<ul class="nav navbar-nav">
										<li class="nav-item active"><a href="#" class="nav-link"><?php echo $cus->email ?></a></li>
										<li class="nav-item active"><a href="#" class="nav-link"><?php echo $cus->phone_number;?></a></li>
										<li class="nav-item active"><a href="#" class="nav-link"><?php echo $cus->address ?></a></li>
										<li class="nav-item active"><a href="\cakecosy/products/listbill/<?php echo $cus->id ?>" class="nav-link">Xem chi tiết đơn hàng</a></li>
										
									</ul>
								</div>
							</nav>

							<?php endforeach;?>
							<div class="space50">&nbsp;</div>
							
							</div>
							
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>
					</div>
				</div> <!-- end section with sidebar and main content -->
			</div> <!-- .main-content -->
		</div> 
		</div><!-- #content -->