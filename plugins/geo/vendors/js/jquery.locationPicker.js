/* Usage:
 * 
 *	$('.locationPicker').locationPicker({
 *		lat: 35.67009827221281,
 *		lng: 139.7024724232788,
 *		zoom: 15,
 *		pick: function(address, latitude, longitude) { ... },
 *		updateAddress: function(address) { ... },
 *		updateLatLng: function(latitude, longitude) { ... },
 *		updateMarkerStatus: function(status) { ... },
 *		draggingMessage: '移動中...'
 *	});
 * 
 */

(function(){
	jQuery.fn.locationPicker = function(config){
		var picker = $(this);
		
		var map;
		var marker, markerStatus;
		var infoWindow;
		var geocoder;
		var word, address;
		var latitude, longitude;
		var located;
		
		if (config.lat && config.lng) located = true;
		
		// デフォルト
		config = jQuery.extend({
			lat: 35.67009827221281,
			lng: 139.7024724232788,
			zoom: 15,
			pick: function(word, address, latitude, longitude) {
				alert('config.pick = function(word, addr, lat, lng){ /* ... */ } を実装してください。');
				console.log(word);
				console.log(address);
				console.log(latitude);
				console.log(longitude);
			},
			updateAddress: function(addr) {
				$('.info .data.address', picker).html(addr);
			},
			updateLatLng: function(lat, lng) {
				$('.info .data.lat', picker).html(lat);
				$('.info .data.lng', picker).html(lng);
			},
			updateMarkerStatus: function(status) {
				$('.info .data.status', picker).html(status);
			},
			draggingMessage: '移動中...'
		}, config);
		
		function initialize(picker) {
			var latLng = new google.maps.LatLng(config.lat, config.lng);
			map = new google.maps.Map($('.mapCanvas', picker)[0], {
				center: latLng,
				zoom: config.zoom,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				mapTypeControl: false,
				navigationControlOptions : {
					style : google.maps.NavigationControlStyle.DEFAULT
				},
				scaleControl: true,
				scaleControlOptions: {
					position: google.maps.ControlPosition.TOP_LEFT
				}
			});
			infoWindow = new google.maps.InfoWindow({content: $('.infoWindow', picker).html()});
			geocoder = new google.maps.Geocoder();
			
			latLngChanged(latLng);
			
			// FIXME: click 以外のイベントも扱えるようにしたい。
			// config.moveTrigger(function(){
			$('.move', picker).click(function(){
				word = $('input.word', $(this).parent()).val();
				geocode(word);
			});
			
			$('.pick', picker).click(function(){
				pick(word, address, latitude, longitude);
			});
		}
		
		function pick(word, addr, lat, lng) {
			config.pick(word, addr, lat, lng);
		}
		
		function latLngChanged(latLng) {
			latitude = latLng.lat();
			longitude = latLng.lng();
			
			reverse(latLng);
			map.setCenter(latLng);
			
			if (located) {
				marker = buildMarker(latLng);
				infoWindow.open(map, marker);
				config.updateLatLng(latitude, longitude);
			}
		}
		
		function addressChanged(addr) {
			address = addr;
			
			if (located) {
				config.updateAddress(addr);
			}
		}
		
		function markerStatusChanged(status) {
			markerStatus = status;
			config.updateMarkerStatus(status);
		}
		
		function reverse(latLng) {
			geocoder.geocode(
				{latLng: latLng},
				function(responses, status) {
					if (status != google.maps.GeocoderStatus.OK) {
						alert('Geocode に失敗しました: ' + status);
						return;
					}
					
					var addr = '';
					if (responses && responses.length > 0) addr = responses[0].formatted_address;
					
					addressChanged(addr);
				}
			);
		}
		
		function geocode(address) {
			located = true;
			geocoder.geocode(
				{address: address},
				function(responses, status) {
					if (status != google.maps.GeocoderStatus.OK) {
						alert('Geocode に失敗しました: ' + status);
						return;
					}
					
					var latLng = responses[0].geometry.location;
					var addr = responses[0].formatted_address;
					addressChanged(addr);
					latLngChanged(latLng);
					
				}
			);
		}
		
		function buildMarker(latLng) {
			if (marker instanceof google.maps.Marker) {
				marker.setPosition(latLng);
			} else {
				marker = new google.maps.Marker({
					position: latLng,
					map: map,
					title: 'ここですか？',
					draggable: true,
					bouncy: true
				});
				google.maps.event.addListener(marker, 'dragstart', function() {
					markerStatusChanged('dragstart');
					addressChanged(config.draggingMessage);
				});
				google.maps.event.addListener(marker, 'drag', function() {
					markerStatusChanged('drag');
				});
				google.maps.event.addListener(marker, 'dragend', function() {
					markerStatusChanged('dragend');
					latLngChanged(marker.getPosition());
				});
			}
			
			return marker;
		}
		
		// main
		
		initialize(this);
	};
})(jQuery);
