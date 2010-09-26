<?php

date_default_timezone_set('UTC'); // fix for PHP 5.3
Configure::write('App.encoding', 'UTF-8');
// Configure::write('App.baseUrl', env('SCRIPT_NAME')); // mod_rewrite を使わない場合に有効にしてください。

/**
 * The level of CakePHP security. The session timeout time defined
 * in 'Session.timeout' is multiplied according to the settings here.
 * Valid values:
 *
 * 'high'	Session timeout in 'Session.timeout' x 10
 * 'medium'	Session timeout in 'Session.timeout' x 100
 * 'low'	Session timeout in 'Session.timeout' x 300
 *
 * 'high' and 'medium' also enable session.referer_check .
 *
 * CakePHP session IDs are also regenerated between requests
 * if 'Security.level' is set to 'high'.
 */
Configure::write('Security.level', 'low');
Configure::write('Security.salt', 'ade5219c20a2cfaf4d5fd2a77632d2ff8845a6ee');

//Configure::write('Routing.admin', 'admin');
//Configure::write('Acl.classname', 'DbAcl');
//Configure::write('Acl.database', 'default');

// Session Configuration
// config('app_session');

/**
 *
 * Cache Engine Configuration
 * Default settings provided below
 *
 * File storage engine.
 *
 *	 Cache::config('default', array(
 *		'engine' => 'File', //[required]
 *		'duration'=> 3600, //[optional]
 *		'probability'=> 100, //[optional]
 *		'path' => CACHE, //[optional] use system tmp directory - remember to use absolute path
 *		'prefix' => 'cake_', //[optional]  prefix every cache file with this string
 *		'lock' => false, //[optional]  use file locking
 *		'serialize' => true, [optional]
 *	));
 *
 *
 * APC (http://pecl.php.net/package/APC)
 *
 *	 Cache::config('default', array(
 *		'engine' => 'Apc', //[required]
 *		'duration'=> 3600, //[optional]
 *		'probability'=> 100, //[optional]
 *		'prefix' => Inflector::slug(APP_DIR) . '_', //[optional]  prefix every cache file with this string
 *	));
 *
 * Xcache (http://xcache.lighttpd.net/)
 *
 *	 Cache::config('default', array(
 *		'engine' => 'Xcache', //[required]
 *		'duration'=> 3600, //[optional]
 *		'probability'=> 100, //[optional]
 *		'prefix' => Inflector::slug(APP_DIR) . '_', //[optional] prefix every cache file with this string
 *		'user' => 'user', //user from xcache.admin.user settings
 *		'password' => 'password', //plaintext password (xcache.admin.pass)
 *	));
 *
 *
 * Memcache (http://www.danga.com/memcached/)
 *
 *	 Cache::config('default', array(
 *		'engine' => 'Memcache', //[required]
 *		'duration'=> 3600, //[optional]
 *		'probability'=> 100, //[optional]
 *		'prefix' => Inflector::slug(APP_DIR) . '_', //[optional]  prefix every cache file with this string
 *		'servers' => array(
 *			'127.0.0.1:11211' // localhost, default port 11211
 *		), //[optional]
 *		'compress' => false, // [optional] compress data in Memcache (slower, but uses less memory)
 *	));
 *
 */
Cache::config('default', array('engine' => 'File'));
//Configure::write('Cache.disable', true);
//Configure::write('Cache.check', true);

/*
 * minify assats files:
 */
//Configure::write('Asset.filter.css', 'css.php');
//Configure::write('Asset.filter.js', 'custom_javascript_output_filter.php');


/*
 * development | staging | production
 *   specific settings:
 */

Configure::write('debug', 2);
define('LOG_ERROR', 2);

?>
