<div class="inner-header">	
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
					<div class="row">
						<div class="col-sm-3" >
							<ul class="aside-menu">

							<?php foreach ($typeproducts as $type) { ?>
								<li><?php echo $this->Html->link($type->name,['action'=>'typeproduct',$type->id]) ?>
									<?php echo $type->id; ?>
								</li>
							<?php } ?>
							
							</ul>
						</div>
						<div class="col-sm-9">
							<div class="beta-products-list">
							<?php foreach($getproduct as $new): 
							?>
									<?php echo $new->name ?>
							<?php endforeach; ?>
							
					</div>
				</div>
						</div>
					</div>
				</div> <!-- .main-content -->
			</div> <!-- #content -->
		</div> <!-- .container -->
	</div>
