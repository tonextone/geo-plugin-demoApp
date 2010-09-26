<?php 
/* SVN FILE: $Id$ */
/* Place Fixture generated on: 2010-09-26 05:13:29 : 1285478009*/

class PlaceFixture extends CakeTestFixture {
	var $name = 'Place';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'target_class' => array('type'=>'string', 'null' => false, 'length' => 64, 'key' => 'index'),
		'target_id' => array('type'=>'integer', 'null' => false, 'default' => '0', 'key' => 'index'),
		'name' => array('type'=>'string', 'null' => true),
		'address' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'lat' => array('type'=>'float', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'lng' => array('type'=>'float', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'places_target_class' => array('column' => 'target_class', 'unique' => 0), 'places_target_id' => array('column' => 'target_id', 'unique' => 0), 'places_lat' => array('column' => 'lat', 'unique' => 0), 'places_lng' => array('column' => 'lng', 'unique' => 0), 'places_created' => array('column' => 'created', 'unique' => 0), 'places_modified' => array('column' => 'modified', 'unique' => 0))
	);
	var $records = array(array(
		'id' => 1,
		'target_class' => 'Lorem ipsum dolor sit amet',
		'target_id' => 1,
		'name' => 'Lorem ipsum dolor sit amet',
		'address' => 'Lorem ipsum dolor sit amet',
		'lat' => 1,
		'lng' => 1,
		'created' => '2010-09-26 05:13:29',
		'modified' => '2010-09-26 05:13:29'
	));
}
?>