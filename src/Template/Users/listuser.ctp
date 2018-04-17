<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Tìm kiếm</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy <?php echo count($users) ?> Đơn hàng</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
							<nav class="navbar navbar-default navbar-expand-lg navbar-light nav-item dropdown">
									<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
										<ul class="nav navbar-nav" style="width: 100%">
											<li class="nav-item active" style="width: 8%">Tên người dùng</li>
											<li class="nav-item active" style="width: 12%">Tên</a></li>
											<li class="nav-item active" style="width: 15%">Email</li>
											<li class="nav-item active" style="width: 15%">Số điện thoại</li>
											<li class="nav-item active" style="width: 20%">Địa chỉ</li>
											<li class="nav-item active" style="width: 10%">Ngày sinh</li>
											<li class="nav-item active" style="width: 10%">Chỉnh sửa thông tin</li>
											<li class="nav-item active" style="width: 10%; text-align: center;">Xóa</li>
										</ul>
									</div>
									<div class="space20">&nbsp;</div>
							<?php foreach($users as $cus): ?>
									<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
										<ul class="nav navbar-nav" style="width: 100%">
											<li class="nav-item active" style="width: 8%"><?php echo $cus->username ?></li>
											<li class="nav-item active" style="width: 12%"><?php echo $cus->name ?></li>
											<li class="nav-item active" style="width: 15%"><?php echo $cus->email ?></li>
											<li class="nav-item active" style="width: 15%"><?php echo $cus->phone?></li>
											<li class="nav-item active" style="width: 20%"><?php echo $cus->address ?></li>
											<li class="nav-item active" style="width: 10%"><?php echo $cus->birthdate ?></li>
											<li class="nav-item active" style=" width: 10%"><a href="\cakecosy/edituser/<?php echo $cus->id ?>">Chỉnh sửa</a></li>
											<li class="nav-item active" style=" width: 10%;  text-align: center;"><?= $this->Form->postLink(
								                'Xóa',
								                ['action' => 'delete', $cus->id],
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
								  <li><?= $this->Paginator->prev('« Previous ', array('class' => 'disabled'));?></li>
								  <li> <?=  $this->Paginator->numbers(array('class'=> 'pagination_link')); //Shows the page numbers?></li>
								  <li><?=  $this->Paginator->next(' Next »', array('class' => 'disabled')); //Shows the next and previous links?></li>
								
								</ul>
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>
					</div>
				</div> <!-- end section with sidebar and main content -->
			</div> 
		</div> 
		</div>