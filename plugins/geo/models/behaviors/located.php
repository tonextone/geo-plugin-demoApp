<?php

class LocatedBehavior extends ModelBehavior {
	
	function distance($lat1, $lng1, $lat2 = null, $lng2 = null) {
		return 0; // meter.
	}
	
}

?>
