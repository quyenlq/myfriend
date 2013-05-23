<div class="row">
  <aside class="span4">
    <section>
      <?php $this->App->Gravatar_for_user($user,30); ?>
      <h1><?php echo $user["User"]['name'] ?></h1>
      <span><?php echo $this->Html->link("view my profile",array('controller' => 'users', 'action' => 'view', $user["User"]["id"]))?></span>
      <span><b>Microposts:</b> <?php echo count($user["Micropost"]) ?></span>
    </section>
    <section>
      <div class="stats">
        <a href="<?php echo '../../users/following/'.$user['User']['id'] ;?>">
          <strong id="following" class="stat">
            <?php echo count($user["followed"]); ?>
          </strong>
          following
        </a>
        <a href="<?php echo '../../users/follower/'.$user['User']['id']; ?>">
          <strong id="followers" class="stat">
              <?php echo count($user["follower"]); ?>
          </strong>
          followers
        </a>
      </div>


      <?php if (count($users) >0) ?>
      <div class="user_avatars">
        <?php foreach ($users as $u) {
          echo $this->App->Gravatar_for_user($u, 30, true);
        }
        ?>       
      </div>
    </section>
  </aside>
  <div class="span8">
    <h3><?php echo "Followed users" ?></h3>
    <?php if (count($users) >0) {?>
    <ul class="users">
      <?php foreach ($users as $u) { ?>
          <li>
      <?php echo $this->App->Gravatar_for_user($u, 30, true); ?>
      <?php echo $this->Html->link($u['name'], array('controller' =>'users', 'action' =>'view', $u['id'])) ?>
      <?php if ($current_user["User"]['admin']==1 && !$current_user['User']['id']!= $u['id']) {?>
        | <?php echo $this->Html->link("delete", array('controller' => 'users', 'action' =>'delete', $u['id']), array(), "You sure?") ?>  
          </li>
      <?php
        }}
        ?> 
    </ul>
    <?php } ?>
  </div>
</div>