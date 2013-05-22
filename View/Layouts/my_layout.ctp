<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title_for_layout; ?></title>

		<!--[if lt IE 9]>
      		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
      		<![endif]-->

      		<?php
    		//Load Bootstrap:  
      		echo $this->Html->script('jquery.js');
      		echo $this->Bootstrap->load(); 


      		echo $this->fetch('meta');
      		echo $this->fetch('css');
      		echo $this->fetch('script');
      		echo $this->Html->css('custom.css')
      		?>
            <link href='http://fonts.googleapis.com/css?family=Caesar+Dressing' rel='stylesheet' type='text/css'>

      	</head>
      	<body>

      		<div class="navbar navbar-fixed-top ">
      			<div class="navbar-inner">
      				<div class="container">
      					<a class="btn btn-navbar" data-target=".nav-collapse" data-toggle="collapse">
      						<span class="icon-bar"></span>
      						<span class="icon-bar"></span>
      						<span class="icon-bar"></span>
      					</a>
      					<?php echo $this->Html->link('MyFriends', '/', array('class' => 'brand', 'id' => 'logo')); ?>      					
      					<div class="container nav-collapse ">
      						<ul class="nav">
      							<?php if(!$current_user) { ?>
      							<li><?php echo $this->Html->link('Sign in', '/users/login'); ?></li>
      							<li class="divider-vertical"></li>
      							<li><?php echo $this->Html->link('Sign up', '/users/add'); ?></li>
      							<li class="divider-vertical"></li>
      							<?php
      						}
      						else
      						{
      							?>
      							<li><?php echo $this->Html->link('My Profile', '/users/edit/'.$current_user["User"]['id']); ?></li>
      							
      							<li class="divider-vertical"></li>
      							
      							<li><?php echo $this->Html->link('Friends', '/users/index'); ?></li>
                                                <li class="divider-vertical"></li>
                                                <li><?php echo $this->Html->link('Logout', '/users/logout/'); ?></li>
                                                <?php } ?>
                                          </ul>
                                          <?php echo $this->Form->create(null,array('url' =>'/users/search', 'inputDefaults' => array('label' => false), 'class' => 'navbar-search pull-right'))?>
                                          <?php echo $this->Form->input('keyword', array('placeholder' => "Search friend...", 'class' =>'search-query'))?>
                                          <?php echo $this->Form->end()?>
                                    </div><!--/.nav-collapse -->

                              </div>
                        </div>
                  </div>

                  <div class="container">
                     <div class="content">
                          <div id="main-content">
                               <?php echo $this->Session->flash(); ?>

                               <?php echo $this->fetch('content'); ?>

                         </div><!--/span-->
                   </div><!--/content-->

                   <footer style="text-align: center;">
                    <p>&copy; MYFRIENDSdotCOM <?php echo date('Y'); ?></p>
              </footer>

        </div> <!-- /container -->

  </body>
  </html>
