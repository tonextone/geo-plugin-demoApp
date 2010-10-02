<?php if (!$picker_initialized): ?>
    <link type="text/css" href="/css/ui-smoothness/jquery-ui-1.8.5.custom.css" rel="stylesheet" />
    <style type="text/css">
    .mapCanvas {
        width: 300px;
        height: 300px;
    }
    .locationPicker div {
        padding: 0 !important;
    }
    </style>
    
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('jquery', '1.4.2');
      google.load('jqueryui', '1.8.5');
    </script>
    
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?language=ja&sensor=false"></script>
    <?php echo $javascript->link('/geo/js/jquery.locationPicker.js'); ?>
<?php endif; ?>

<div class="locationBrowser">
 
 <div class="mapCanvas"></div>
 
 <div class="infoPanel"  style="display: none;">
 
 <div class="infoWindow" style="display: none;">
  <div class="info window">
   <p class="address data">マウスで移動</p>
  </div>
 </div>
 
 </div>

</div>

<script type="text/javascript">
$(document).ready(function(){
    var config = {
        updateLatLng: function(latitude, longitude) {
            $('#<?php echo $latitude; ?>').val(latitude);
            $('#<?php echo $longitude; ?>').val(longitude);
        },
        updateAddress: function(address) {
            $('#<?php echo $address; ?>').val(address);
        }
    };
    
    var lat = Number($('#<?php echo $latitude ; ?>').val());
    var lng = Number($('#<?php echo $longitude ; ?>').val());
    if ((lat > 0) && (lng > 0)) {
        config.lat = lat;
        config.lng = lng;
    }
    
    var picker = $('#locationPicker-<?php echo $id; ?>');
    picker.locationPicker(config);
});
</script>
