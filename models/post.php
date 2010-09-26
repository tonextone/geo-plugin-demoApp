<?php
class Post extends AppModel {
	
	var $name = 'Post';
	var $validate = array(
		'title' => array('notEmpty')
	);
	
	var $hasMany = array(
		'Place' => array(
			'className' => 'Place',
			'foreignKey' => 'post_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);
}
?>