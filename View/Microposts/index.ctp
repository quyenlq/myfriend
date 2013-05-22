
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
		
			<ul class="nav nav-list bs-docs-sidenav">
				<li><?php echo $this->Html->link(__('New Micropost'), array('action' => 'add'), array('class' => '')); ?></li>						<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?></li> 
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?></li> 
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">

		<div class="microposts index">
		
			<h2><?php echo __('Microposts'); ?></h2>
			
			<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
				<tr>
											<th><?php echo $this->Paginator->sort('id'); ?></th>
											<th><?php echo $this->Paginator->sort('content'); ?></th>
											<th><?php echo $this->Paginator->sort('user_id'); ?></th>
											<th><?php echo $this->Paginator->sort('created'); ?></th>
											<th><?php echo $this->Paginator->sort('modified'); ?></th>
											<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
				<?php
				foreach ($microposts as $micropost): ?>
	<tr>
		<td><?php echo h($micropost['Micropost']['id']); ?>&nbsp;</td>
		<td><?php echo h($micropost['Micropost']['content']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($micropost['User']['name'], array('controller' => 'users', 'action' => 'view', $micropost['User']['id'])); ?>
		</td>
		<td><?php echo h($micropost['Micropost']['created']); ?>&nbsp;</td>
		<td><?php echo h($micropost['Micropost']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $micropost['Micropost']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $micropost['Micropost']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $micropost['Micropost']['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $micropost['Micropost']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
			</table>
			
			<p><small>
				<?php
				echo $this->Paginator->counter(array(
				'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
				));
				?>			</small></p>

			<div class="pagination">
				<ul>
					<?php
		echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
		echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
		echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
	?>
				</ul>
			</div><!-- .pagination -->
			
		</div><!-- .index -->
	
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
