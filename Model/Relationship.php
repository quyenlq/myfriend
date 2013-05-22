<?php
App::uses('AppModel', 'Model');
/**
 * Relationship Model
 *
 * @property Follower $Follower
 * @property Followed $Followed
 */
class Relationship extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'created' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'modified' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	

/**
 * belongsTo associations
 *
 * @var array
 */


	public $belongsTo = array(
		'Follower' => array(
			'className' => 'User',
			'foreignKey' => 'follower_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Followed' => array(
			'className' => 'User',
			'foreignKey' => 'followed_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
