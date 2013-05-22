<div id="page-container" class="row-fluid">
	<h1>All users</h1>

	<ul class="users">
		<?php foreach ($users as $user) {
			?>
			<li>
				<?php $this->App->Gravatar_for_user($user,52) ?>
				<?php echo $this->Html->link($user["User"]['name'], "view/".$user["User"]['id']) ?>
				<?php if ($current_user['User']['admin']==1 && $current_user['User']['id']!=$user["User"]['id']){ ?>
				|	<?php echo $this->Html->link(
					'Delete',
					array('controller' => 'users', 'action' => 'delete', $user["User"]['id']),
					array(),
					"Are you sure you wish to delete this user?"
					);
			}
			?>
		</li>

		<?php
	}?>
</ul>


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
