<?php
App::uses('Micropost', 'Model');

/**
 * Micropost Test Case
 *
 */
class MicropostTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.micropost',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Micropost = ClassRegistry::init('Micropost');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Micropost);

		parent::tearDown();
	}

}
