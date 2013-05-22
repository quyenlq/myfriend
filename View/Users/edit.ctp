<div class="row">
	<div class="span6 offset3">
		<h1>Update your profile</h1>
		<?php echo $this->Form->create('User', array('inputDefaults' => array('label' => false), 'class' => 'form')); ?>

		<?php echo $this->Form->label('name', 'Name');?>
		<?php echo $this->Form->input('name', array('class'=>'span6')); ?>


		<?php echo $this->Form->label('email', 'Email');?>
		<?php echo $this->Form->input('email',array('class'=>'span6'));?>

		<?php echo $this->Form->label('password', 'Password');?>
		<?php echo $this->Form->input('password', array('class'=>'span6'));?>
		
		<?php echo $this->App->Gravatar_for_user($current_user,64)?>
		<a href="http://gravatar.com/emails" target="_blank">change</a>
		<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>
		
		<?php echo $this->Form->end(); ?>
	</div>
</div>