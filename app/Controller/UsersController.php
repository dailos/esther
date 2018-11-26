<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if($this->request->data['User']['password'] == '') unset ($this->request->data['User']['password'] );
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Usuario guardado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El usuario no puede ser guardado, inténtelo de nuevo'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {		
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Usuario inválido'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('Usuario eliminado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('No se ha podido eliminar al usuario'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function login() {		
		if ($this->request->is('post')) {		
			if ($this->Auth->login()) 
				$this->redirect(array('controller'=>'products','action'=>'index','admin'=>1));
		    else  $this->Session->setFlash('Se ha producido un error, inténtelo de nuevo');
		}		
		$this->layout = 'login';
	}	
	
	public function logout() {
		$this->redirect($this->Auth->logout());
	}
	
	public function admin_login(){
		$this->redirect(array('action' => 'login','admin'=>false));
	}
	
	public function admin_logout() {
		$this->redirect($this->Auth->logout());
	}
}
