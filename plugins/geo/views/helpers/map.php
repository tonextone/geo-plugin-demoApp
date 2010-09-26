<?php

define('MAP_DEFAULT_CENTER', '35.67009827221281,139.7024724232788');
define('MAP_DEFAULT_ZOOM', 12);
define('MAP_DEFAULT_WIDTH', 150);
define('MAP_DEFAULT_HEIGHT', 150);
define('MAP_DEFAULT_FORMAT', 'png');

class MapHelper extends AppHelper {
	var $helpers = array('Html');
	var $mapUrl = 'http://maps.google.com/maps';
	var $mapApiUrl = 'http://maps.google.com/maps/api/staticmap';
	
	/*
	 options: {
	   center: "<latitude>,<longitude>"
	   size: "<width>x<height>"
	   zoom: 12
	 }
	 markers: [
	   "<latitude>,<longitude>", ...
	 ]
	 */
	function draw($type, $options, $markers = array()) {
		switch ($type) {
			case ('static'):
			default:
				return $this->_drawStatic($options, $markers);
		}
		
		return '';
	}
	
	function _drawStatic($options, $markers) {
		
		$label = $options['label'];
		
		$center = ($options['center']) ? $options['center'] : MAP_DEFAULT_CENTER;
		$zoom = ($options['zoom']) ? $options['zoom'] : MAP_DEFAULT_ZOOM;
		$size = ($options['size']) ? $options['size'] : MAP_DEFAULT_WIDTH . 'x' . MAP_DEFAULT_HEIGHT;
		$format = ($options['format']) ? $options['format'] : MAP_DEFAULT_FORMAT;
		
		$query = array(
			'center' => $center,
			'zoom' => $zoom,
			'size' => $size,
			'format' => $format,
			'language' => 'ja',
			'maptype' => 'roadmap',
			'mobile' => 'true',
			'sensor' => 'false',
		);
		
		if (is_array($markers)) {
			if (count($markers) == 0) $markers = array($center);
			$query['markers'] = implode('|', $markers);
		}
		
		$mapQuery = $center;
		if ($label) $mapQuery = "{$mapQuery} ($label)";
		$link = $this->mapUrl . Router::queryString(array('q' => $mapQuery));
		
		$src = $this->mapApiUrl . Router::queryString($query);
		list($width, $height) = explode('x', $size);
		
		return <<<HTML
<a href="{$link}" target="_blank">
<img src="{$src}" width="{$width}" height="{$height}" alt="{$label}" />
</a>
HTML;
	}
	
}

?>