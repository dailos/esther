<?php
App::uses('AppModel', 'Model');
/**
 * Company Model
 *
 * @property Bill $Bill
 */
class Company extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'companyname';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Bill' => array(
			'className' => 'Bill',
			'foreignKey' => 'company_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
