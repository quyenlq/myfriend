<div class="row">
  <aside class="span4">
    <section>
      <?php $this->App->Gravatar_for_user($user,30); ?>
      <h1><?php echo $user["User"]['name'] ?></h1>
      <span><?php echo $this->Html->link("view my profile", 'view', $user["User"]['id'])?></span>
      <span><b>Microposts:</b> <?php echo count($user["Micropost"]) ?></span>
    </section>
    <section>
      <div class="stats">
        <a href="<?php echo 'users/following/'.$current_user['User']['id'] ;?>">
          <strong id="following" class="stat">
            <?php echo count($user["follower"]); ?>
          </strong>
          following
        </a>
        <a href="<?php echo 'users/follower/'.$current_user['User']['id']; ?>">
          <strong id="followers" class="stat">
              <?php echo count($user["followed"]); ?>
          </strong>
          followers
        </a>
      </div>


      <?php if (count($users) >0) ?>
      <div class="user_avatars">
        <?php foreach ($users as $u) {
          echo $this->App->Gravatar_for_user($u, 30);
        }
        ?>       
      </div>
    </section>
  </aside>

</div>