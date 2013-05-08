<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 * @property Micropost $Micropost
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */

public function beforeSave($options = array()) {
	if (isset($this->data[$this->alias]['password'])) {
		$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
	}
	return true;
}

public $validate = array(
	'name' => array(
		'maxlength' => array(
			'rule' => array('maxlength', 30),
			'message' => 'The maximum length of username is 30 characters',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		'minlength' => array(
			'rule' => array('minlength', 4),
			'message' => 'The maximum length of username is 4 characters',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
	'email' => array(
		'email' => array(
			'rule' => array('email'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		'notempty' => array(
			'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		'unique' => array(
			'rule' => 'isUnique',
			'required' => 'create'
			),
		),
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
	'password' => array(
		'notempty' => array(
			'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	'admin' => array(
		'boolean' => array(
			'rule' => array('boolean'),
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
 * hasMany associations
 *
 * @var array
 */
public $hasMany = array(
	'Micropost' => array(
		'className' => 'Micropost',
		'foreignKey' => 'user_id',
		'dependent' => false,
		'conditions' => '',
		'fields' => '',
		'order' => '',
		'limit' => '',
		'offset' => '',
		'exclusive' => '',
		'finderQuery' => '',
		'counterQuery' => ''
		)
	);

public $hasAndBelongsToMany = array(
    'follower' => array(
      'className' => 'User',
      'joinTable' => 'relationships',
      'foreignKey' => 'follower_id',
      'associationForeignKey' => 'followed_id',
      'unique' => true,
      // 'conditions' => '',
      // 'fields' => '',
      // 'order' => '',
      // 'limit' => '',
      // 'offset' => '',
      // 'finderQuery' => '',
      // 'deleteQuery' => '',
      // 'insertQuery' => ''
    ),
    'followed' => array(
      'className' => 'User',
      'joinTable' => 'relationships',
      'foreignKey' => 'followed_id',
      'associationForeignKey' => 'follower_id',
      'unique' => true,
      // 'conditions' => '',
      // 'fields' => '',
      // 'order' => '',
      // 'limit' => '',
      // 'offset' => '',
      // 'finderQuery' => '',
      // 'deleteQuery' => '',
      // 'insertQuery' => ''
    )
  );


}
