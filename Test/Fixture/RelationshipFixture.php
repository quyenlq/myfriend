<?php
/**
 * RelationshipFixture
 *
 */
class RelationshipFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'follower_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'followed_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'created_at' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updated_at' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'index_relationships_on_follower_id_and_followed_id' => array('column' => array('follower_id', 'followed_id'), 'unique' => 1),
			'index_relationships_on_followed_id' => array('column' => 'followed_id', 'unique' => 0),
			'index_relationships_on_follower_id' => array('column' => 'follower_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'follower_id' => 1,
			'followed_id' => 1,
			'created_at' => '2013-05-08 11:37:42',
			'updated_at' => '2013-05-08 11:37:42'
		),
	);

}
