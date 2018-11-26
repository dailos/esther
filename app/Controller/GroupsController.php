<?php
App::uses('AppController', 'Controller');
/**
 * Groups Controller
 *
 * @property Group $Group
 */
class GroupsController extends AppController {
	

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$groups = $this->Group->find('all',array('order' => array('Group.order' => 'asc')));
		$this->set('groups',$groups);
		$this->setBreadcrumb('Productos', '/groups',0);					
	}
	
	public function view($id = null) {
		$this->Group->recursive =2;	
		$products = $this->Group->find('first', array('conditions' => array('Group.id' =>$id)));
		$this->set('groupname',$products['Group']['name']);			
		$this->set('products', $products['Product']);
		if(empty($products)) $this->set('empty',true );
		else { 			
			$this->set('empty',false );
			$this->set('product',$products['Product'][0] );
		}			 		
		$this->set('isAjax', $this->request->is('ajax'));	
		$this->setBreadcrumb($products['Group']['name'], '/groups/view/'.$products['Group']['id'],1);			
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {		
		$this->Group->recursive = 1;			
		$this->paginate = array('order' => array('Group.order' => 'asc'));	
		$this->set('groups', $this->paginate('Group'));		
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Group->create();
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('Grupo creado'));
				$this->redirect(array('controller' => 'groups','action' => 'edit',$this->Group->id));
			} else {
				$this->Session->setFlash(__('El grupo no ha sido creado, inténtelo de nuevo'));
			}
		}
		$products = $this->Group->Product->find('list');
		$this->set(compact('products'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Grupo inválido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('Grupo guardado'));
				$this->redirect(array('action' => 'edit',$id));
			} else {
				$this->Session->setFlash(__('Grupo no guarado, inténtelo de nuevo'));
			}
		} else {
			$this->Group->recursive = 2;	
			$this->request->data = $this->Group->read(null, $id);
		}
		$products = $this->Group->Product->find('all');
		$this->set(compact('products'));
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {		
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Grupo inválido'));
		}
		if ($this->Group->delete()) {
			$this->Session->setFlash(__('Grupo eliminado'));
			$path = GROUPS_PATH.$id;
			unlink($path.ORIGINAL);
			unlink($path.STANDARD);
			unlink( $path.THUMB);
			
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El grupo no ha sido eliminado'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function upload(){
		if (!empty($this->request->data)) {	
			$group = $this->request->data["Group"]; 
			if (move_uploaded_file($group['file']['tmp_name'], GROUPS_PATH.$group['id'].ORIGINAL )){ 											
				$this->resize(GROUPS_PATH.$group['id']);	
				$this->Session->setFlash(__('Imagen subida correctamente'));																					
			}else{
				$this->Session->setFlash(__('Se ha producido un error'));					
			}
		}
		$this->redirect(array('action' => 'edit',$group['id']));	
	}
	
	public function admin_upload(){
		$this->upload();
	}
	
	
	public function resize($file){
		$this->ImageTool->resize(array('input' => $file.ORIGINAL,'output' => $file.STANDARD,'height' => GROUP_STANDARD_HEIGHT));			
		$this->ImageTool->resize(array('input' => $file.ORIGINAL,'output' => $file.THUMB   ,'height' => GROUP_THUMB_HEIGHT));			
	}
	
	public function admin_resizeAll(){								
		$images = $this->Group->find('all');		
		foreach($images as $img){
			$this->resize(GROUPS_PATH.$img['Group']['id']);
		}
		$this->redirect(array('action' => 'index'));	
		
	}
	
	public function admin_sort(){
		if ($this->request->is('post')) {
			parse_str($this->request->data,$data);
			foreach ($data['sortlist'] as $order => $id){	
				$this->Group->id = $id;
    	 		$this->Group->saveField('order',$order);
			} 
  			$this->autoRender=false;
		}else{
			$groups = $this->Group->find('all',array('order' => array('Group.order' => 'asc')));
			$this->set('groups',$groups);
		}
	}
}
