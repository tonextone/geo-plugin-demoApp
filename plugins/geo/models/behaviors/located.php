<?php

/**
 * メモ(擬似コード)です。
 */

App::import('Core', 'HttpSocket');

class LocatedBehavior extends ModelBehavior {
	
	var $lookupServices = array(
		'google' => array(
			// URL
			'http://maps.google.com/maps/api/geocode/json?language=ja&address=%s&sensor=false',
			// Set::extract(PATTERN)
			'TBD'
		),
	);
	
	function setup(&$model, $config = array()) {
		$this->settings[$model->name] = array_merge(array(
			'fields' => array('latitude' => 'lat', 'longitude' => 'lng', 'address' => 'address'),
			'lookup' => 'google',
			'key' => null,
			'cacheTable' => null,
		), $config);
		
		extract($this->settings[$model->name]);
		
		// if (!isset($model->LocationCache)) {
		// 	$LocationCache =& ClassRegistry::init('LocationCache');
		// 	if ($LocationCache) {
		// 		$model->LocationCache =& $LocationCache;
		// 	} else {
		// 		$model->LocationCache =& new DynamicModel(array('name' => 'LocationCache', 'table' => $cacheTable));
		// 	}
		// }
		
		if (!isset($this->lookupServices[strtolower($lookup)])) {
			trigger_error('The lookup service "' . $lookup . '" does not exist.', E_USER_WARNING);
			return false;
		}
		if (!isset($this->connection)) {
			$this->connection = new HttpSocket();
		}
	}
	
	function geocode(&$model, $address) {
		if (empty($address)) {
			// trigger_error
			return false;
		}
		
		$hit = $model->LocationCache->find('first', array('conditions' => array('address' => $address)));
		
		if (!$hit) {
			if ($code = $this->_geocoords($model, $address)) {
				// Cache it.
				$model->LocationCache->create();
				$model->LocationCache->save(array(/* ... */));
			}
		} else {
			$code = array($fields['latitude'] => $hit['LocationCache']['lat'], $fields['longitude'] => $hit['LocationCache']['lng']);
		}
		
		return $code;
	}
	
	function _geocoords(&$model, $address) {
		// lookup for REST API.
	}
	
	function distance($lat1, $lng1, $lat2 = null, $lng2 = null) {
		return 0; // meter.
	}
	
	function findallbydistance(&$model, $x, $y, $distance = null) {
		list($x2, $y2) = array($model->escapeField($fields['longitude']), $model->escapeField($fields['latitude']));
		list($x, $y, $distance) = array(floatval($x), floatval($y), floatval($distance));
		return $model->find('all', array('conditions' => "(3958 * 3.1415926 * SQRT(({$y2} - {$y}) * ({$y2} - {$y}) + COS({$y2} / 57.29578) * COS({$y} / 57.29578) * ({$x2} - {$x}) * ({$x2} - {$x})) / 180) <= {$distance}"));
	}
	
	function mapParams(&$model, $size = null, $zoom = null, $label = null) {
		$center = $model->data[$model->alias][$this->settings[$model->name]['fields']['latitude']]
			.','. $model->data[$model->alias][$this->settings[$model->name]['fields']['longitude']];
		
		$params = array('center' => $center);
		
		if ($size) $params['size'] = $size;
		if ($zoom) $params['zoom'] = $zoom;
		if ($label) $params['label'] = $label;
		
		return $params;
	}
}

class DynamicModel extends AppModel {
	function __construct($options = array()) {
		if (is_string($options)) {
			$options = array('name' => $options);
		}
		if (!isset($options['name'])) {
			return null;
		}
		$options = am(array(
			'id' => false,
			'table' => null,
			'ds' => null
		), $options);
		
		$this->name = $options['name'];
		parent::__construct($options['id'], $options['table'], $options['ds']);
	}
}

?>
