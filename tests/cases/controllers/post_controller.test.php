<?php 
/* SVN FILE: $Id$ */
/* PostController Test cases generated on: 2010-09-26 01:46:48 : 1285465608*/
App::import('Controller', 'Post');

class TestPost extends PostController {
	var $autoRender = false;
}

class PostControllerTest extends CakeTestCase {
	var $Post = null;

	function startTest() {
		$this->Post = new TestPost();
		$this->Post->constructClasses();
	}

	function testPostControllerInstance() {
		$this->assertTrue(is_a($this->Post, 'PostController'));
	}

	function endTest() {
		unset($this->Post);
	}
}
?>