<?php
$address	= "Anna Nagar";
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
<html>
<head>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript">
            function initialize() {
                //var latlng = new google.maps.LatLng(25.2894045564648903, 51.49017333985673);
				var latlng = new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $long; ?>);
                var settings = {
                    zoom: 15,
                    center: latlng,
                    mapTypeControl: true,
                    mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
                    navigationControl: true,
                    navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
                    mapTypeId: google.maps.MapTypeId.ROADMAP};
                var map = new google.maps.Map(document.getElementById("map_canvas"), settings);
               // var contentString = '<div id="content">'+'<div id="siteNotice">'+'</div>'+'<h1 id="firstHeading" class="firstHeading">Area name</h1>'+'<div id="bodyContent">'+'<p align="left" >P.O.Box : 666666 - Dubai, UAE <br> Tel : (+971) 789789789</p>'+'</div>'+'</div>';
                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });
                var companyImage = new google.maps.MarkerImage('images/marker.png',
                    new google.maps.Size(100,50),
                    new google.maps.Point(0,0),
                    new google.maps.Point(50,50)
                );
                //var companyPos = new google.maps.LatLng(25.2894045564648903, 51.49017333985673);
				var companyPos = new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $long; ?>);
                var companyMarker = new google.maps.Marker({
                    position: companyPos,
                    map: map,
                    icon: companyImage,
                    title:"Location Name",
                    zIndex: 3});

                google.maps.event.addListener(companyMarker, 'click', function() {
                    infowindow.open(map,companyMarker);
                });
            }
        </script>
</head>
    <body onLoad="initialize()">
        <div id="map_canvas" style="width:600px; height:860px"></div>
    </body>
	</html>