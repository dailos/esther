<?php
App::uses('AppController', 'Controller');
/**
 * Formats Controller
 *
 * @property Format $Format
 */
class FormatsController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Format->recursive = 0;
		$this->set('formats', $this->paginate());
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Format->create();
			if ($this->Format->save($this->request->data)) {
				$this->Session->setFlash(__('Formato creado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Formato no creado, pruebe otra vez'));
			}
		}
		$products = $this->Format->Product->find('list');
		$this->set(compact('products'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Format->id = $id;
		if (!$this->Format->exists()) {
			throw new NotFoundException(__('Invalid format'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Format->save($this->request->data)) {
				$this->Session->setFlash(__('Formato guardado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Formato no guardado, pruebe otra vez'));
			}
		} else {
			$this->request->data = $this->Format->read(null, $id);
		}
		$products = $this->Format->Product->find('list');
		$this->set(compact('products'));
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {				
		$this->Format->id = $id;
		if (!$this->Format->exists()) {
			throw new NotFoundException(__('Formato inválido'));
		}
		if ($this->Format->delete()) {
			$this->Session->setFlash(__('Formato eliminado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('No se ha podido eliminar el formato'));
		$this->redirect(array('action' => 'index'));
	}
}
