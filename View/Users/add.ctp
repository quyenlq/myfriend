
<div id="page-container" class="row-fluid">	
	<div id="page-content" class="span8 offset2">
		<div class="users form">		
				<h2><?php echo __('Add User'); ?></h2>
				<?php echo $this->Form->create('User', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
				<div class="control-group">
					<?php echo $this->Form->label('name', 'Name', array('class' => 'control-label'));?>
					<div class="controls">
						<?php echo $this->Form->input('name', array('class' => 'span12')); ?>
					</div><!-- .controls -->
				</div><!-- .control-group -->

				<div class="control-group">
					<?php echo $this->Form->label('email', 'Email', array('class' => 'control-label'));?>
					<div class="controls">
						<?php echo $this->Form->input('email', array('class' => 'span12')); ?>
					</div><!-- .controls -->
				</div><!-- .control-group -->



				<div class="control-group">
					<?php echo $this->Form->label('password', 'Password', array('class' => 'control-label'));?>
					<div class="controls">
						<?php echo $this->Form->input('password', array('class' => 'span12', 'type' => 'password')); ?>
					</div><!-- .controls -->
				</div><!-- .control-group -->

			<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary offset3')); ?>
			
			<?php echo $this->Form->end(); ?>
			
		</div>

	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
