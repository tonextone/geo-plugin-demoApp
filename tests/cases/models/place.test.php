<?php 
/* SVN FILE: $Id$ */
/* Place Test cases generated on: 2010-09-26 05:13:29 : 1285478009*/
App::import('Model', 'Place');

class PlaceTestCase extends CakeTestCase {
	var $Place = null;
	var $fixtures = array('app.place');

	function startTest() {
		$this->Place =& ClassRegistry::init('Place');
	}

	function testPlaceInstance() {
		$this->assertTrue(is_a($this->Place, 'Place'));
	}

	function testPlaceFind() {
		$this->Place->recursive = -1;
		$results = $this->Place->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Place' => array(
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
		$this->assertEqual($results, $expected);
	}
}
?>