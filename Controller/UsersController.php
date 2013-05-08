<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

/**
 * index method
 *
 * @return void
 */
public $components = array(
	'Auth'=> array(
		'authenticate' => array(
			'Form' => array(
				'fields' => array('username' => 'email', 'password' => 'password')
				)
			)
		)
	);	

public function beforeFilter() {
	parent::beforeFilter();
	$this->Auth->allow('add');
}


public function index() {
	$this->User->recursive = 0;
	$this->set('users', $this->paginate());
}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function view( $id = null){
	if (!$this->User->exists($id)) {
		throw new NotFoundException(__('Invalid user'));
	}
	$user=$this->User->findById($id);
	$this->set('user', $user);
	$this->set('microposts', $this->Micropost->find('all',array(
		'conditions' => array('Micropost.user_id' => $user["User"]["id"]),
		'order' => array('Micropost.created DESC')
		)));
	$this->set('followed_users', $followed_users);
	$this->set('followers', $followers);
}

/**
 * add method
 *
 * @return void
 */
public function add() {
	if ($this->request->is('post')) {
		$this->User->create();
		if ($this->User->save($this->request->data)) {
			$this->Session->setFlash(__('The user has been saved'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
		}
	}
}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function edit($id = null) {
	if (!$this->User->exists($id)) {
		throw new NotFoundException(__('Invalid user'));
	}
	if ($this->request->is('post') || $this->request->is('put')) {
		if ($this->User->save($this->request->data)) {
			$this->Session->setFlash(__('The user has been saved'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
		}
	} else {
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->request->data = $this->User->find('first', $options);
	}
}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
public function delete($id = null) {
	$this->User->id = $id;
	if (!$this->User->exists()) {
		throw new NotFoundException(__('Invalid user'));
	}
	// $this->request->onlyAllow('post', 'delete');
	if ($this->User->delete()) {
		$this->Session->setFlash(__('User deleted'), 'flash/success');
		$this->redirect(array('action' => 'index'));
	}
	$this->Session->setFlash(__('User was not deleted'), 'flash/error');
	$this->redirect(array('action' => 'index'));
}


public function login() {
	if ($this->request->is('post')) {
		$this->Session->destroy();
		if ($this->Auth->login()) {
			$this->redirect($this->Auth->redirect());
		} else {
			$this->Session->setFlash(__('Invalid username or password, try again'),'flash/error');
		}
	}
	else{
		$this->Session->setFlash(__('You must be login to see this page'),'flash/default');
	}
}

public function logout() {
	$this->redirect($this->Auth->logout());
}

public function unfollow(){
	$this->autoRender = false;
	$cuid = $this->Auth->User()['id'];
	$id=$this->request->data['Relationships']['followed_id'];

	$rel = $this->Relationship->find('first', array('conditions' => array('Relationship.followed_id' => $cuid, 'Relationship.follower_id' => $id)));
	$this->Relationship->id = $rel['Relationship']['id'];
	if($this->Relationship->delete()){
		$this->redirect($this->referer());
	}
}

public function follow(){
	$this->autoRender = false;
	$cuid = $this->Auth->User()['id'];
	$id=$this->request->data['Relationships']['followed_id'];

	$this->request->data['followed_id']=$cuid;
	$this->request->data['follower_id']=$id;
	$this->Relationship->create();
	if($this->Relationship->save($this->request->data));
	$this->redirect($this->referer());
}


public function following($id){
	$title = "Following";
	$this->User->id = $id;
	$user = $this->User->findById($id);
	$users = $this->User->find('all');
	$this->set('users', $users);	
	$this->set('user', $user);
}

public function followers(){
    // $title = "Followers"
    // @user = User.find(params[:id])
    // @users = @user.followers.paginate(page: params[:page])
    // render 'show_follow'
}
}