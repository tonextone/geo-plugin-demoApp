<?php 
/* SVN FILE: $Id$ */
/* Post Fixture generated on: 2010-09-26 01:42:09 : 1285465329*/

class PostFixture extends CakeTestFixture {
	var $name = 'Post';
	var $table = 'posts';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'title' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'body' => array('type'=>'text', 'null' => false, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'posts_created' => array('column' => 'created', 'unique' => 0), 'posts_modified' => array('column' => 'modified', 'unique' => 0))
	);
	var $records = array(array(
		'id' => 1,
		'title' => 'Lorem ipsum dolor sit amet',
		'body' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'created' => '2010-09-26 01:42:09',
		'modified' => '2010-09-26 01:42:09'
	));
}
?>