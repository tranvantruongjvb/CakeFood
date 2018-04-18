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

							
							<nav class="navbar navbar-default navbar-expand-lg navbar-light nav-item dropdown">
									<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
										<ul class="nav navbar-nav" style="width: 100%">
											<li class="nav-item active" style="width: 15%">Tên</li>
											<li class="nav-item active" style="width: 18%">Email</a></li>
											<li class="nav-item active" style="width: 12%">Số điện thoại</li>
											<li class="nav-item active" style="width: 27%">Địa chỉ</li>
											<li class="nav-item active" style="width: 10%">Trạng thái đơn hàng</li>
											<li class="nav-item active" style="width: 10%">Chi tiết</li>
											<li class="nav-item active" style="width: 8%">Xóa</li>
										</ul>
									</div>
									<div class="space20">&nbsp;</div>
							<?php foreach($customers as $cus): ?>
									<div id="navbarCollapse" class=" navbar-collapse justify-content-start" style=" width: 100%; border: 1px solid #ff8d00;">
										<ul class="nav navbar-nav" style="width: 100%">
											<li class="nav-item " style="width: 15%;padding-top: 15px;padding-bottom: 15px;"><?php echo $cus->name ?></a></li>
											<li class="nav-item " style="width: 18%;padding-top: 15px;padding-bottom: 15px;"><?php echo $cus->email ?></a></li>
											<li class="nav-item " style="width: 12%;padding-top: 15px;padding-bottom: 15px;"><?php echo $cus->phone_number;?></a></li>
											<li class="nav-item " style="width: 27%;padding-top: 15px;padding-bottom: 15px;"><?php echo $cus->address ?></a></li>
											<li class="nav-item " style=" width: 10%;padding-top: 15px;padding-bottom: 15px;"><?php echo $cus->status ?></li>
											<li class="nav-item " style=" width: 10%"><a style="width: 100%" href="\cakecosy/billdetail/<?php echo $cus->id ?>" >Chi tiết</a></li>
											<li class="nav-item " style=" width: 8%; ">
												<a style="width: 100%" href="\cakecosy/products/deletecustomer/<?php echo $cus->id ?>" >Xóa</a></li>
										</ul>
									</div>
							<div class="space50">&nbsp;</div>

							<?php endforeach;?>
							</nav>	
							</div>
							<div>

								<ul class="pagination">
								  <li><?= $this->Paginator->prev('« Trang trước ', array('class' => 'disabled'));?></li>
								  <li> <?=  $this->Paginator->numbers(array('class'=> 'pagination_link')); //Shows the page numbers?></li>
								  <li><?=  $this->Paginator->next(' Trang sau »', array('class' => 'disabled')); //Shows the next and previous links?></li>
								
								</ul>
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>
					</div>
				</div> <!-- end section with sidebar and main content -->
			</div> <!-- .main-content -->
		</div> 
		</div><!-- #content -->
