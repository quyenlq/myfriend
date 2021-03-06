<?php if(!$current_user){ ?>
<div class="hero-unit">
	<h2> Welcome to Nice2MeetU </h2>
	<a href="users/login" class="btn btn-primary btn-large">Sign in</a>
	<a href="users/add" class="btn btn-primary btn-large">Sign up</a>
</div>
<?php
}
else{?>


<div class="row">
	<aside class="span4">
		<section>
			<h1>
				<?php $this->App->Gravatar_for_user($current_user) ?>
				<?php echo $current_user["User"]['name']; ?>
			</h1>
		</section>
		<section>
			<div class="stats">
				<a href="<?php echo 'users/following/'.$current_user['User']['id'] ;?>">
					<strong id="following" class="stat">
						<?php echo count($followed_users); ?>
					</strong>
					following
				</a>
				<a href="<?php echo 'users/follower/'.$current_user['User']['id']; ?>">
					<strong id="followers" class="stat">
						<?php echo count($followers); ?>
					</strong>
					followers
				</a>
			</div>

		</section>
	</aside>
	<div class="span8">
		
		<h3>Microposts (<?php echo count($microposts);  ?>)</h3>
		<?php echo $this->Form->create('Micropost',array('action' => 'add', 'inputDefaults' => array('label' => false), 'class' => 'form my-form'))?>
	  	<div class="field">
    	<?php echo $this->Form->input('content', array('type'=>'textarea', 'placeholder' => "Compose new micropost...", 'rows' => '3', 'class' =>'span8'))?>
    	<?php echo $this->Form->hidden('user_id', array('value' => $current_user["User"]['id']))?>
    	<?php echo $this->Form->hidden('wall_id', array('value' => $current_user["User"]['id']))?>
  		</div>
  		<div class="field">
  			<?php echo $this->Form->submit("Post", array("class" => "btn submit btn-primary pull-right")) ?>
  		</div>
		<?php echo $this->Form->end()?>
		<?php if (count($microposts) >0){ ?>
		<ol class="microposts">
			<?php foreach ($microposts as $m) {
				?>
				<li>
					<?php $this->App->Gravatar_for_user($m,32) ?>
					<span class="owner"><?php echo $this->Html->link($m["User"]["name"], array('controller' => 'users', 'action' => 'view', $m["User"]["id"]))?></span>
					<span class="content"><?php echo $m['Micropost']['content'] ?></span>
					<span class="timestamp" >
						Posted <?php echo $m['Micropost']['created'] ?>
					
					<?php 
						if ($current_user["User"]['id']==$m['Micropost']['user_id'] || $current_user["User"]['id']==$m['Micropost']['wall_id']){
							echo $this->Html->link(
					'Delete',
					array('controller' => 'microposts', 'action' => 'delete', $m["Micropost"]['id']),
					array(),
					"Are you sure you wish to delete this post?"
					);
						}
					?>
					</span>
				</li>
			<?php 
			}
			?>
			
		</ol>
		<?php } ?>
	</div>
</div>


<?php } ?>