<?php
App::uses('AppController', 'Controller');
/**
 * Microposts Controller
 *
 * @property Micropost $Micropost
 */
class MicropostsController extends AppController {

/**
 * index method
 *
 * @return void
 */


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */


/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Micropost->create();
			if ($this->Micropost->save($this->request->data)) {
				$this->Session->setFlash(__('The micropost has been saved'), 'flash/success');
				$this->redirect($this->request->referer());
			} else {
				$this->Session->setFlash(__('The micropost could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$users = $this->Micropost->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Micropost->id = $id;
		if (!$this->Micropost->exists()) {
			throw new NotFoundException(__('Invalid micropost'));
		}
		// $this->request->onlyAllow('post', 'delete');
		if ($this->Micropost->delete()) {
			$this->Session->setFlash(__('Micropost deleted'), 'flash/success');
			$this->redirect($this->referer());
		}
		$this->Session->setFlash(__('Micropost was not deleted'), 'flash/error');
		$this->redirect($this->referer());
	}

}
