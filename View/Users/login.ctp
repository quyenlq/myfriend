<div class="form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Please enter your username and password'); ?></legend>
        <?php 
        echo $this->Session->flash('auth');
    	echo $this->Form->create('User',array('action'=>'login'));
    	echo $this->Form->input('email',array('type' => 'text'));
    	echo $this->Form->input('password');
    	echo $this->Form->submit('Login',array('class' => 'btn btn-primary'));
    	?>
    </fieldset>
</div>