<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('Bill', 'Model');
/**
 * Bills Controller
 *
 * @property Bill $Bill
 */
class BillsController extends AppController {


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Bill->recursive = 0;
                $this->paginate['order'] = array('date' => 'desc');
		$this->set('bills', $this->paginate());
	}


    private function processFile($file)
    {
        $this->Bill->create();
        $filename = explode("-", $file['file']['name']);
        $reference = $filename[0];
        $type = substr($reference, 0, 3);
        $date = explode(".", $filename[1]);
        $this->request->data['Bill']['date'] = "20" . $date[2] . "-" . $date[1] . "-" . $date[0];
        $this->request->data['Bill']['name'] = $file['file']['name'];
        $this->request->data['Bill']['reference'] = $reference;
        $this->request->data['Bill']['company_id'] = $file['company_id'];
        $this->request->data['Bill']['type'] = $type;
        $this->Bill->save($this->request->data);
    }

    private function typeIsAllowed($file)
    {
        $filename = explode("-", $file['file']['name']);
        $type = substr($filename[0], 0, 3);
        return ($type == Bill::DELIVERY_NOTE || $type == Bill::BILL);
    }
/**
 * upload method
 *
 * @return void
 */
    public function upload()
    {
        if ($this->request->is('post')) {
            if (empty($this->request->data['Bill']['file']['name'])) {
                $this->Session->setFlash(__('Se ha producido un error'));
                return $this->redirect(array('action' => 'index'));
            }

            $file = $this->request->data['Bill'];

            if (!$this->typeIsAllowed($file)) {
                $this->Session->setFlash(__('La factura no tiene el formato de nombre correcto: FREXXXXXX-DD.MM.AA-XXXXXXXX'));
            }

            if (!move_uploaded_file($file['file']['tmp_name'], BILLS_PATH . $file['file']['name'])) {
                $this->Session->setFlash(__('No se ha podido subir la factura'));
            }

            $this->processFile($file);
            $this->Session->setFlash(__('Factura subida correctamente'));

            return $this->redirect(array('controller' => 'Companies', 'action' => 'view', $file['company_id']));
        }
    }
	
	public function admin_upload() {
		$this->upload();
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
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Bill->id = $id;
		$factura = $this->Bill->read(null, $id);
		if (!$this->Bill->exists()) {
			throw new NotFoundException(__('Factura inválida'));
		}
		if ($this->Bill->delete()) {
			if(unlink(BILLS_PATH.$factura['Bill']['name']))
				$this->Session->setFlash(__('Factura eliminada'));
			else 
				$this->Session->setFlash(__('No se ha encontrado el archivo en el servidor'));				
		}
        $this->redirect(array('controller' => 'Companies', 'action' => 'view', $factura['Bill']['company_id']));
	}	

	public function admin_email($id = null) {							
		if (!empty($this->request->data)) {									
			$this->Bill->id = $this->request->data['Bill']['id'];				
			$this->Bill->saveField('sent',date("Y-m-d H:i:s"));
			$this->Bill->saveField('seen',null);
			
			$email = new CakeEmail();
			$email->from(array(ADMIN_EMAIL => 'Licores Alcoder S.L.'));
			$email->to($this->request->data['Bill']['email']);	  
		    $email->subject('Licores Alcoder S.L. : Factura ref. '.$this->request->data['Bill']['reference'].' lista para descargar');
		    $email->replyTo(ADMIN_EMAIL);		       
		    $email->template('bill','default');// ctp filename
		    $email->emailFormat('html');//text and html		 

		    $email->viewVars(array('cuerpo' => $this->request->data['Bill']['body']));
				       			    
		    if($email->send())    	    		
		    	$this->Session->setFlash(__('Factura enviada correctamente', true));
		    else 
		    	$this->Session->setFlash(__('No se ha podido enviar la factura', true));
		    $this->redirect(array('action' => 'index'));	    		    
		}else{
			$bill = $this->Bill->read(null, $id);			
			$this->set(compact('bill'));
		}     
	}
	
	public function download($id = null, $hash = null, $direct = null){	
		if ($hash != md5($id)) $this->redirect($this->Auth->logout());
		$bill = $this->Bill->read(null,$id);		
		if(!$direct){				
			$this->set(compact(array('id','hash','bill')));	
			$this->layout = 'default';
		}else{
			$this->Bill->saveField('seen',date("Y-m-d H:i:s"));
			$filename = BILLS_PATH.$bill['Bill']['name'];
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Cache-Control: private",false); 
			header("Content-Type: application/pdf");
			header("Content-Disposition: attachment; filename=\"".basename($filename)."\";" );
			header("Content-Transfer-Encoding: binary");
			header("Content-Length: ".filesize($filename));
			readfile($filename);
		}	
													
	}
	
	public function billlist(){
		$this->Bill->recursive = 0;
		$this->set('bills',$this->Bill->find('all'));
		$this->layout = 'pdf';
	}
	
	public function admin_pdf(){
		$this->Pdf= $this->Components->load('Pdf');			
		$this->Pdf->filename = "listado_facturas";
		$this->Pdf->output = 'download'; 
        $this->Pdf->init();
        $this->Pdf->process(Router::url('/', true) . 'bills/billlist'); 
        $this->render(false);         
	}


}
	