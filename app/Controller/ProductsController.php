<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 */
class ProductsController extends AppController {
	   
	public function index() {				
		$this->Product->recursive = 1;						
		$products = $this->paginate('Product');
		$this->set('products', $this->Product->find('all'));			
		$this->setBreadcrumb('Todos los productos', '/products',1);			
	}	
	
/**
 * seacrh method
 *
 * @return void
 */
	public function search($id = null) {
		$conditions = '';	
		$searched = false;			
		if ($this->request->is('post')) {					
			if($this->request->data['Product']['search']){
				$conditions = " Product.name like '%".$this->request->data['Product']['search']."%'  OR 							
							Product.reference like '%".$this->request->data['Product']['search']."%' OR 
							Product.description like '%".$this->request->data['Product']['search']."%' ";		
				$searched =true;							
			}	
		}
		$this->set('searched',$searched);
				
		$this->Product->recursive = 1;			
		$this->paginate = array('conditions' => $conditions, 'order' => array('Product.name' => 'asc'));	
		$products = $this->paginate('Product');
		$this->set('products', $products);
		if(empty($products)) $this->set('empty',true );
		else { 			
			$this->set('empty',false );
			$this->set('product',$products[0] );
		}			 	
		$this->set('isAjax', $this->request->is('ajax'));	
		$this->setBreadcrumb('Productos', '/products',0);	
					
	}	

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null,$idpic = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Producto inválido'));
		}
		$product = $this->Product->read(null, $id);	
		$this->set('product', $product);
		$this->set('idpic',$idpic);
		$this->setBreadcrumb($product['Product']['name'], '/products/view/'.$product['Product']['id'],2);		 
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$conditions = '';				
		if ($this->request->is('post')) {			
			if($this->request->data['Product']['adminsearch']){
				$conditions = " Product.name like '%".$this->request->data['Product']['adminsearch']."%'  OR 							
							Product.reference like '%".$this->request->data['Product']['adminsearch']."%' OR 
							Product.description like '%".$this->request->data['Product']['adminsearch']."%' ";									
			}	
		}		
		$this->Product->recursive = 1;			
		$this->paginate = array('conditions' => $conditions, 'order' => array('Product.name' => 'asc'));	
		$this->set('products', $this->paginate('Product'));
		$this->set('isAjax', $this->request->is('ajax'));					
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Product->create();
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('Producto guardado'));
				$this->redirect(array('controller' => 'products','action' => 'edit',$this->Product->id));
			} else {
				$this->Session->setFlash(__('El producto no ha podido ser guardado, inténtelo de nuevo'));
			}
		}
		$formats = $this->Product->Format->find('list');
		$groups = $this->Product->Group->find('list');
		$this->set(compact('formats', 'groups'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Producto inválido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('Producto guardado'));
				$this->redirect(array('controller' => 'products','action' => 'edit',$id));
			} else {
				$this->Session->setFlash(__('El producto no ha podido ser guardado, inténtelo de nuevo'));
			}
		} else {
			$this->request->data = $this->Product->read(null, $id);
		}		
		$formats = $this->Product->Format->find('list');
		$groups = $this->Product->Group->find('list');
		$this->set(compact('formats', 'groups'));
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {		
		$this->Product->id = $id;
		
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Producto inválido'));
		}
		$product = $this->Product->read(null,$id);
		$path = WWW_ROOT.'files'.DS.'products'.DS;
		if($imageId = $this->getFirstImage($product['Format'])){
			unlink($path.$imageId.ORIGINAL);
			unlink($path.$imageId.STANDARD);
			unlink($path.$imageId.CAROUSEL);
			unlink($path.$imageId.THUMB);
		}
				
		if ($this->Product->delete()) {
			$this->Session->setFlash(__('Producto eliminado'));			
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El producto no ha sido eliminado'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function upload(){		
		if (!empty($this->request->data)) {	
			$product = $this->request->data["Product"]; 
			if (move_uploaded_file($product['file']['tmp_name'], PRODUCTS_PATH.$product['id'].ORIGINAL )){ 											
				$this->resize(PRODUCTS_PATH.$product['id']);	
				$this->Session->setFlash(__('Imagen subida correctamente'));																					
			}else{
				$this->Session->setFlash(__('Se ha producido un error'));					
			}
		}
		$this->redirect(array('action' => 'edit',$product['product_id']));	
	}

/**
 * admin_upload method
 *
 * @param string $id
 * @return void
 */
	public function admin_upload(){
		$this->upload();
	}
	
	public function getFirstImage($products = null){
		foreach ($products as $format)
			if(file_exists(PRODUCTS_PATH.$format['FormatsProduct']['id'].ORIGINAL)) return $format['FormatsProduct']['id']; 				 
		return null;
	}
	
	public function resize($file){
		$this->ImageTool->resize(array('input' => $file.ORIGINAL,'output' => $file.STANDARD,'width' => PRODUCT_STANDARD_WIDTH));	
		$this->ImageTool->resize(array('input' => $file.ORIGINAL,'output' => $file.CAROUSEL,'width' => PRODUCT_CAROUSEL_WIDTH));
		$this->ImageTool->resize(array('input' => $file.ORIGINAL,'output' => $file.THUMB   ,'width' =>  PRODUCT_THUMB_WIDTH));			
	}
	
	public function admin_resizeN(){
		if (!empty($this->request->data)) {
			$start = $this->request->data['Product']['start'];
			$end = $start + $this->request->data['Product']['nelements'];
			$images = $this->Product->Format->FormatsProduct->find('all');
			$i = 0;
			foreach($images as $img){				
				if($i>=$start && $i<$end) $this->resize(PRODUCTS_PATH.$img['FormatsProduct']['id']);
				$i++;
			}
			$this->redirect(array('action' => 'index'));
		}
		
	}
	public function loadimage($id){
		$this->set(compact('id'));			
	}
		
}

