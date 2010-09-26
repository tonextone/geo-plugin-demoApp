<?php

/*
 * development | staging | production
 *   specific settings:
 */

class DATABASE_CONFIG {
	
	var $default = array(
		'driver' => 'mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'demo',
		'password' => 'demo',
		'database' => 'demo_dev',
		'encoding' => 'utf8'
	);
	
	var $test = array(
		'driver' => 'mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'demo',
		'password' => 'demo',
		'database' => 'test_demo_dev',
		'encoding' => 'utf8'
	);
	
}

?>
