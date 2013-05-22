<div id="page-container" class="row-fluid">
	<h1>Result for '<?php echo $keyword?>': <small><?php echo count($users)." result(s)"?></small></h1>

	<ul class="users">
		<?php if(count($users)==0){ echo "<h2>No result</h2>";}?>
		<?php  {
			foreach ($users as $user) {
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
		}
	}?>
</ul>


</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
