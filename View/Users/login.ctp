<div class="row">
    <div class="span6 offset3">
        <h1>Sign in <small><?php echo ('Please enter your username and password'); ?></small></h1>
        <?php echo $this->Form->create('User'); ?>
        <?php 
    	echo $this->Form->create('User',array('action'=>'login'));
    	echo $this->Form->input('email',array('type' => 'text', 'class' => 'span6'));
    	echo $this->Form->input('password', array('class'=>'span6'));
    	echo $this->Form->submit('Login',array('class' => 'btn btn-primary btn-large'));
    	?>
</div>
</div>