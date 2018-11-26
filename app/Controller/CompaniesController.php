<?php
App::uses('AppController', 'Controller');
/**
 * Companies Controller
 *
 * @property Company $Company
 */
class CompaniesController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Company->recursive = 1;
		$this->set('companies', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Company->id = $id;
		if (!$this->Company->exists()) {
			throw new NotFoundException(__('Cliente inválido'));
		}
		$company = $this->Company->read(null, $id);	
		$this->set('company', $company);		
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Company->create();
			if ($this->Company->save($this->request->data)) {
				$this->Session->setFlash(__('Cliente creado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se ha podido crear al cliente, inténtelo de nuevo'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Company->id = $id;
		if (!$this->Company->exists()) {
			throw new NotFoundException(__('Cliente inválido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Company->save($this->request->data)) {
				$this->Session->setFlash(__('Cliente editado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se ha podido editar al cliente, inténtelo de nuevo'));
			}
		} else {
			$this->request->data = $this->Company->read(null, $id);
		}
	}

/**
 * admin_delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {				
		$this->Company->id = $id;
		if (!$this->Company->exists()) {
			throw new NotFoundException(__('Cliente inválido'));
		}
		$cliente = $this->Company->read(null, $id);
		if( count($cliente['Bill'])){
			$this->Session->setFlash(__('Imposible eliminar, el cliente tiene facturas, elimínelas primero'));
			$this->redirect(array('action' => 'view',$id));
		}
		
		if ($this->Company->delete()) {
			$this->Session->setFlash(__('Cliente eliminado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El cliente no ha sido eliminado'));
		$this->redirect(array('action' => 'index'));
	}
}
