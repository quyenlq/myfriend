<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class AppHelper extends Helper {
	/* Change the following constants to suit your language */

	/* The functions takes the date as a timestamp */        
	public function cu_following($cu, $u){
		$followeds=$cu['followed'];
		foreach ($followeds as $followed) {
			if($followed["Relationship"]['follower_id']==$u["User"]["id"]){
				return true;
			}
		}
		return false;
	}

	public function Gravatar_for_user($user, $size=50, $isArray=false){
		if(!$isArray){
		    $gravatar_id = md5($user["User"]["email"]);
	    	$gravatar_url = "https://secure.gravatar.com/avatar/".$gravatar_id."?s=".$size;
		    echo "<img src=".$gravatar_url." class='gravatar'>";
	    }
	    else{
	    	$gravatar_id = md5($user["email"]);
	    	$gravatar_url = "https://secure.gravatar.com/avatar/".$gravatar_id."?s=".$size;
		    echo "<img src=".$gravatar_url." class='gravatar'>";
	    }
	}
}
