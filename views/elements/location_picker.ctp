<button class="locationPickerTrigger" type="button">地図で探す</button>
<div class="locationPicker" style="display: none;">

 <div class="mapCanvas"></div>
 
 <div class="infoPanel">
  <dl class="info panel clearfix">
   <dt>場所:</dt>
   <dd>
    <input class="word" type="text" value="" />
    <button class="move" type="button">移動</button>
   </dd>
   <dt class="address label">所在地:</dt>
   <dd class="address data"></dd>
   <dt class="lat label">緯度:</dt>
   <dd class="lat data"></dd>
   <dt class="lng label">経度:</dt>
   <dd class="lng data"></dd>
   <dt class="status label">マーカーの状態:</dt>
   <dd class="status data"></dd>
  </dl>
  <button class="pick" type="button">決定</button>
 </div>
 
 <div class="infoWindow" style="display: none;">
  <div class="info window">
   <p class="address data">マウスで移動</p>
  </div>
 </div>
 
</div>

<link type="text/css" href="/css/ui-smoothness/jquery-ui-1.8.5.custom.css" rel="stylesheet" />

<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
  google.load('jquery', '1.4.2');
  google.load('jqueryui', '1.8.5');
</script>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?language=ja&sensor=false"></script>

<?php echo $javascript->link('/geo/js/jquery.locationPicker.js'); ?>

<script type="text/javascript">
$('.locationPickerTrigger').click(function(){
    var config = {
        pick: function(word, address, latitude, longitude) {
            $('#Place0Name').val(word);
            $('#Place0Address').val(address);
            $('#Place0Lat').val(latitude);
            $('#Place0Lng').val(longitude);
        }
    };
    
    var lat = Number($('#Place0Lat').val());
    var lng = Number($('#Place0Lng').val());
    if ((lat > 0) && (lng > 0)) {
        config.lat = lat;
        config.lng = lng;
    }
    
    $('.locationPicker').locationPicker(config);
    $('.locationPicker').show();
    $('.locationPicker').dialog();
});
</script>

<style type="text/css">
.mapCanvas {
    width: 500px;
    height: 500px;
}
.locationPicker div {
    padding: 0 !important;
}
</style>
