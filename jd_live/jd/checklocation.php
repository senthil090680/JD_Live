<?php 
session_start();
require_once 'include/control_functions.php'; 

extract($_POST);

error_reporting(E_ALL & ~E_NOTICE);

//error_reporting(0);

/*echo "<pre>";
print_r($_POST);
echo "</pre>";

exit(0);*/

$json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$locationarea&sensor=true");
//echo $json;

$data = json_decode($json,true);

//pre($data);

//echo $data['results'][0]['geometry']['location']['lat']."<br>"; echo $data['results'][0]['geometry']['location']['lng']."<br>";

$map_status = $data['status'];
//exit(0);
//$data = file_get_contents("http://maps.google.com/maps/geo?output=csv&q=".urlencode($address));

if ($map_status == 'OK') {
	echo "2";
} else {
	echo "1";
}
exit(0);
?>