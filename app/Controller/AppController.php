<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
		
	public $components = array('RequestHandler','Session','ImageTool',
							'Auth' => array(								
	        					'loginAction' =>  array('controller' => 'users','action' => 'login'),  
								'logoutAction' =>  array('controller' => 'users','action' => 'login'),     	              
	       						'authorize'  => array('Controller'),    
							));	
	public $helpers = array('Js'=>array('Prototype'),'Form', 'Html','Session','Cksource');	
				
	public function beforeFilter(){
		if($this->params['controller'] == 'products')  $this->Auth->allow('index','view','search','upload','loadimage');		
		if($this->params['controller'] == 'groups')  $this->Auth->allow('index','view','upload');		
		if($this->params['controller'] == 'pages')  $this->Auth->allow('*');
		if($this->params['controller'] == 'bills')  $this->Auth->allow('upload','download','billlist');
	}
		
	public function isAuthorized(){		
		if($this->Auth->user()) $this->layout = "admin";	
		if ($this->request->is('ajax'))  $this->layout = "ajax";
		return true;			
	}
	
	public function setBreadcrumb($name, $url,$level){
		$breadbrumb = SessionComponent::read('breadcrumb'); 	
		$breadbrumb[$level]['name'] = $name;
		$breadbrumb[$level]['url'] = $url;
		$title = '';	
		foreach  ($breadbrumb	as $index => $value){
			$title .= ': '.$value['name'].' ' ;
			if($index > $level) unset ($breadbrumb[$index]);
						
		}	
 
		$this->set('title_for_layout', $title);								
		SessionComponent::write('breadcrumb',$breadbrumb);	
		$this->set('breadcrumb',$breadbrumb);					
	}
		
}
