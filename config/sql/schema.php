<?php 
/* SVN FILE: $Id$ */
/* App schema generated on: 2010-09-25 10:09:46 : 1285411726*/
class AppSchema extends CakeSchema {
	var $name = 'App';
	
	function before($event = array()) {
		return true;
	}
	
	function after($event = array()) {
	}
	
	var $posts = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false),
		'body' => array('type' => 'text', 'null' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'posts_created' => array('column' => 'created', 'unique' => 0),
			'posts_modified' => array('column' => 'modified', 'unique' => 0),
		)
	);
	
	var $places = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'post_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'key' => 'index'),
		'name' => array('type' => 'string', 'null' => true, 'default' => ''),
		'address' => array('type' => 'string', 'null' => false),
		'lat' => array('type' => 'float', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'lng' => array('type' => 'float', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'places_post_id' => array('column' => 'post_id', 'unique' => 0),
			'places_lat' => array('column' => 'lat', 'unique' => 0),
			'places_lng' => array('column' => 'lng', 'unique' => 0),
			'places_created' => array('column' => 'created', 'unique' => 0),
			'places_modified' => array('column' => 'modified', 'unique' => 0),
		)
	);
}
?>