
<div id="page-container" class="row-fluid">

	<div class="row">
		<aside class="span4">
			<section>
				<h1>
					<?php $this->App->Gravatar_for_user($user) ?>
					<?php echo $user["User"]['name']; ?>
				</h1>
			</section>
			<section>
				<div class="stats">
					<a href="<?php echo '../../users/following/'.$user['User']['id'] ;?>">
						<strong id="following" class="stat">
							<?php echo count($followed_users); ?>
						</strong>
						following
					</a>
					<a href="<?php echo '../../users/follower/'.$user['User']['id'] ;?>">
						<strong id="followers" class="stat">
							<?php echo count($followers); ?>
						</strong>
						followers
					</a>
				</div>

			</section>
		</aside>
		<div class="span8">		
			<?php if ($current_user["User"]['id']!=$user["User"]["id"]) {?>
			<div id="follow_form">
				<?php if ($this->App->cu_following($current_user, $user)) {?>
				<?php echo $this->Form->create('Relationships', array('url' =>'unfollow','inputDefaults' => array('label' => false), 'class' => 'form form-horizontal', 'data-remote' => 'true')); ?>
				<div><?php echo $this->Form->hidden('followed_id', array('value' => $user["User"]["id"])) ?></div>
				<?php echo $this->Js->submit('Unfollow', array('class' => 'btn btn-large btn-primary')); ?>
				<?php echo $this->Form->end()?>
				<?php }else{ ?>
				<?php echo $this->Form->create('Relationships', array('url' =>'follow','inputDefaults' => array('label' => false), 'class' => 'form form-horizontal', 'remote' => 'true')); ?>
				<div><?php echo $this->Form->hidden('followed_id', array('value' => $user["User"]["id"])) ?></div>
				<?php echo $this->Js->submit('Follow', array('class' => 'btn btn-large btn-primary')); ?>
				<?php echo $this->Form->end()?>
				<?php  }?>
			</div>
			<?php } ?>

			<h3>Microposts (<?php echo count($microposts);  ?>)</h3>
			<?php if ($current_user["User"]['id']==$user["User"]["id"] || $this->App->has_relationship($user,$current_user)) {?>
			<?php echo $this->Form->create('Micropost',array('action' => 'add', 'inputDefaults' => array('label' => false), 'class' => 'form my-form'))?>
			<div class="field">
				<?php echo $this->Form->input('content', array('type'=>'textarea', 'placeholder' => "Compose new micropost...", 'rows' => '3', 'class' =>'span12'))?>
				<?php echo $this->Form->hidden('user_id', array('value' => $current_user["User"]['id']))?>
				<?php echo $this->Form->hidden('wall_id', array('value' => $user["User"]['id']))?>
			</div>
			<div class="field">
				<?php echo $this->Form->submit("Post", array("class" => "btn submit btn-primary pull-right")) ?>
			</div>
			<?php echo $this->Form->end()?>
			<?php } ?>
			<?php if (count($microposts) >0){ ?>			
			<ol class="microposts">
				<?php foreach ($microposts as $m) {
					?>
					<li>
						<?php $this->App->Gravatar_for_user($m,32) ?>
						<span class="owner"><?php echo $this->Html->link($m["User"]["name"], array('controller' => 'users', 'action' => 'view', $m["User"]["id"]))?></span>
						<span class="content"><?php echo $m['Micropost']['content'] ?></span>
						<span class="timestamp">
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
</div><!-- #page-container .row-fluid -->
