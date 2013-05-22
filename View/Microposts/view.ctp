
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
			
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit Micropost'), array('action' => 'edit', $micropost['Micropost']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Micropost'), array('action' => 'delete', $micropost['Micropost']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $micropost['Micropost']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Microposts'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Micropost'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">
		
		<div class="microposts view">

			<h2><?php  echo __('Micropost'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($micropost['Micropost']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Content'); ?></strong></td>
		<td>
			<?php echo h($micropost['Micropost']['content']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('User'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($micropost['User']['name'], array('controller' => 'users', 'action' => 'view', $micropost['User']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created At'); ?></strong></td>
		<td>
			<?php echo h($micropost['Micropost']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Updated At'); ?></strong></td>
		<td>
			<?php echo h($micropost['Micropost']['modified']); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
