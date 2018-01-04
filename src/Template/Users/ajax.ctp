<div class="ajax-response">
        	<?php echo $this->element('paging_counter');?>
			<table class="table table-striped table-bordered">
			<tr>
				<th rowspan="2" class="dl"><div class="ajax-pagination"><?php echo $this->Paginator->sort('name');?></div></th>
			</tr>
 
			<?php
			if (!empty($countries)):
				foreach ($countries as $country):
					<tr>
						<td class="dl"><?php echo $country['Country']['name'];?></td>
					</tr>
					<?php
				endforeach;
			else:
				?>
				<tr>
					<td class="notice" colspan="19"><?php echo __lang('No countries available');?></td>
				</tr>
				<?php
			endif;
			?>
		</table>
		<?php if(!empty($countries)):?>
            <div class="clearfix">
 
    			<div class="pull-right">
			     	<?php echo $this->element('paging_links');  ?>
			   </div>
			</div>		
		<?php endif;?>
 
</div>
<?php
$this->Paginator->options(array(
    'url' => array_merge(array(
        'controller' => $this->request->params['controller'],
        'action' => $this->request->params['action'],
    ) , $this->request->params['pass'], $this->request->params['named'])
));
echo $this->Paginator->prev('&laquo; ' . __lang('Prev') , array(
    'class' => 'prev',
    'escape' => false
) , null, array(
    'tag' => 'span',
    'escape' => false,
    'class' => 'prev'
)), "n";
echo $this->Paginator->numbers(array(
    'modulus' => 2,
    'first' => 3,
	'last' => 3,
	'ellipsis' => '<span class="ellipsis">&hellip;.</span>',
    'separator' => " n",
    'before' => null,
    'after' => null,
    'escape' => false
));
echo $this->Paginator->next(__lang('Next') . ' &raquo;', array(
    'class' => 'next',
    'escape' => false
) , null, array(
    'tag' => 'span',
    'escape' => false,
    'class' => 'next'
)), "n";
?>
<script type="text/javascript">
$('body').delegate('.ajax-pagination a', 'click', function() {
        $this = $(this);
        $this.parents('div.ajax-response').filter(':first').block();
	pageUrl = $this.attr('href');
        $.get(pageUrl, function(data) {
            $this.parents('div.ajax-response').filter(':first').html(data);
        });
        return false;
    });
</script>