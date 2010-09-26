<?php 
/* SVN FILE: $Id$ */
/* PostsController Test cases generated on: 2010-09-26 01:47:30 : 1285465650*/
App::import('Controller', 'Posts');

class TestPosts extends PostsController {
	var $autoRender = false;
}

class PostsControllerTest extends CakeTestCase {
	var $Posts = null;

	function startTest() {
		$this->Posts = new TestPosts();
		$this->Posts->constructClasses();
	}

	function testPostsControllerInstance() {
		$this->assertTrue(is_a($this->Posts, 'PostsController'));
	}

	function endTest() {
		unset($this->Posts);
	}
}
?>