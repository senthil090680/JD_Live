<?php

$address	= "Padi Kuppam Road";
$zoom = 15;
$type = 'ROADMAP';
$data = file_get_contents("http://maps.google.com/maps/geo?output=csv&q=".urlencode($address));
$arr = explode(",", $data);
if (count($arr)>=4) {
  if ($arr[0]==200) {
    $lat = $arr[2];
    $long = $arr[3];
  } else {
    throw new Exception('Lookup failed');
  }
} else {
  throw new Exception('Lookup failed');
}
?>
<html style="height: 100%">
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title><?php echo $lat; ?>, <?php echo $long; ?></title>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
  function initialize() {
    var myLatlng = new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $long; ?>);
    var myOptions = {
      zoom: <?php echo $zoom; ?>,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.<?php echo $type; ?>
    }
    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

    var marker = new google.maps.Marker({
        position: myLatlng, 
        map: map,
        title:"<?php echo $lat; ?>, <?php echo $long; ?>"
    });   
  }
</script>
</head>
<body onload="initialize()" style="height: 100%; margin: 0px; padding: 0px">
  <div id="map_canvas" style="height:100%;"></div>
</body>
</html>