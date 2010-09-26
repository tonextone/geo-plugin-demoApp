<?php
class Place extends AppModel {
	
	var $name = 'Place';
	var $validate = array(
		'address' => array(
			'notEmpty' => array(
				'on' => 'update',
				'required' => false,
				'allowEmpty' => false,
				'rule' => 'notEmpty',
				'message' => '必ず入力してください',
			),
		),
		'lat' => array(
			'notEmpty' => array(
				'on' => 'update',
				'required' => false,
				'allowEmpty' => false,
				'rule' => 'notEmpty',
				'message' => '必ず入力してください',
			),
		),
		'lng' => array(
			'notEmpty' => array(
				'on' => 'update',
				'required' => false,
				'allowEmpty' => false,
				'rule' => 'notEmpty',
				'message' => '必ず入力してください',
			),
		),
	);
	
	var $actsAs = array(
		'Geo.Located' => array(
			'fields' => array('latitude' => 'lat', 'longitude' => 'lng', 'address' => 'address'),
		),
	);
	
	var $belongsTo = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'post_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
}
?>