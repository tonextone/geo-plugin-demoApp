<?php 
/* SVN FILE: $Id$ */
/* Post Test cases generated on: 2010-09-26 01:42:09 : 1285465329*/
App::import('Model', 'Post');

class PostTestCase extends CakeTestCase {
	var $Post = null;
	var $fixtures = array('app.post');

	function startTest() {
		$this->Post =& ClassRegistry::init('Post');
	}

	function testPostInstance() {
		$this->assertTrue(is_a($this->Post, 'Post'));
	}

	function testPostFind() {
		$this->Post->recursive = -1;
		$results = $this->Post->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Post' => array(
			'id' => 1,
			'title' => 'Lorem ipsum dolor sit amet',
			'body' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2010-09-26 01:42:09',
			'modified' => '2010-09-26 01:42:09'
		));
		$this->assertEqual($results, $expected);
	}
}
?>