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
							<nav class="navbar navbar-default navbar-expand-lg navbar-light nav-item dropdown">
									<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
										<ul class="nav navbar-nav" style="width: 100%">
											<li class="nav-item active" style="width: 15%">Tên</li>
											<li class="nav-item active" style="width: 18%">Email</a></li>
											<li class="nav-item active" style="width: 12%">Số điện thoại</li>
											<li class="nav-item active" style="width: 30%">Địa chỉ</li>
											<li class="nav-item active" style="width: 15%">Chi tiết</li>
											<li class="nav-item active" style="width: 10%; text-align: center;">Xa</li>
										</ul>
									</div>
									<div class="space20">&nbsp;</div>
							<?php foreach($customers as $cus): ?>
									<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
										<ul class="nav navbar-nav" style="width: 100%">
											<li class="nav-item active" style="width: 15%"><?php echo $cus->name ?></a></li>
											<li class="nav-item active" style="width: 18%"><?php echo $cus->email ?></a></li>
											<li class="nav-item active" style="width: 12%"><?php echo $cus->phone_number;?></a></li>
											<li class="nav-item active" style="width: 30%"><?php echo $cus->address ?></a></li>
											<li class="nav-item active" style=" width: 15%"><a href="\cakecosy/billdetail/<?php echo $cus->id ?>">Chi tiết</a></li>
											<li class="nav-item active" style=" width: 10%;  text-align: center;"><?= $this->Form->postLink(
								                'Xóa',
								                ['action' => 'deletecustomer', $cus->id],
								                ['confirm' => __('Bạn có chắc chắn muốn xóa   # {0}?',$cus->name)])
								            ?></li>
											
											
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
