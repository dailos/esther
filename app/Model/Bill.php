<?php
App::uses('AppModel', 'Model');
/**
 * Bill Model
 *
 * @property Company $Company
 */
class Bill extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'reference';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Company' => array(
			'className' => 'Company',
			'foreignKey' => 'company_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
