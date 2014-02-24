<?php require_once 'include/header.php'; 
//error_reporting(E_ALL & ~E_NOTICE);
error_reporting(0);

//echo pre($_REQUEST);
//echo pre($_FILES);
	
//exit(0);

if(isset($_REQUEST['action_indiv']) && $_REQUEST['action_indiv'] != '' && $_REQUEST['action_indiv'] == 'actionindiv' && isset($_REQUEST)) {
	extract($_REQUEST);
	
	$post_id							=       base64_decode($post_data); //Comment this when testing

	$conWhere			=	" WHERE post_id = '$post_id'";
	$result				=	SingleTon::selectQuery("post_id,countryname,companyname,stradd,location_area,citytown,postalcode,mainphone,mobilephone, emailadd,websitename,descrip,categ,servicearea,hoomonon,hoomonout,hoomonoff,hootueon,hootueout,hootueoff,hoowedon,hoowedout, hoowedoff,hoothuon,hoothuout,hoothuoff,hoofrion,hoofriout,hoofrioff,hoosaton,hoosatout,hoosatoff,hoosunon,hoosunout,hoosunoff, paymentoptions,photopath1,photopath2,photopath3,videopath1,tags,poststatus,insertedDate,modifiedDate","$conWhere",TABLE_POST,MY_ASSOC,NOR_YES);	
	$noOfRows				=	$result[0];
	$resultArray			=	$result[1];

	//pre($resultArray);

}
?>
<link rel='stylesheet' href="css/popup_open.css" type="text/css" />
<script type="text/javascript" src="js/popup_open.js"></script>
<script type="text/javascript" src="js/common.js"></script>
  <tr>
    <td align="center" valign="top"><img src="images/topimg.png" width="985" height="48" border="0" usemap="#Map" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#FFFFFF" class="bgline">
	<form id="searchad" name="searchad" method="post" action="search.php" onSubmit='return validate_search()'> 
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="1%" align="left" valign="top">&nbsp;</td>
        <td width="17%" align="left" valign="middle"><label>
		 <select class="inputst" name="citytown" id="citytown">
			<option value=''>- City -</option>
			<?php	$conWhere			=	" WHERE 1 = 1";
			$result				=	SingleTon::selectQuery("city_name","$conWhere",TABLE_CITY,MY_ASSOC,NOR_NO);	
			$cityArray			=	$result;
			//pre($cityArray);			
			foreach($cityArray as $cityVal) {
			?>
				<option value='<?php echo $cityVal[city_name]; ?>' <?php if($resultArray[0][citytown] == $cityVal[city_name]) { ?> selected="selected" <?php } ?> ><?php echo $cityVal[city_name]; ?></option>
			<?php } ?>				
		</select>
        </label></td>
        <td width="50%" align="left" valign="middle"><label>
          <input type="text" class="input" name="companyname" id="companyname" value="<?php echo $keyword_indiv; ?>"/>
		  <input type="hidden" name="action_search" id="action_search" value='' />
        </label></td>
        <td width="19%" height="40" align="left" valign="middle">
		
		<!-- <input class="inputs" type="text" name="extrainfo" id="extrainfo" /> -->
		
		</td>
        <td width="12%" align="left" valign="middle">
		
		<button type="submit" style="border: 0; background: transparent; cursor:hand;cursor:pointer;">
			<img src="images/search.png" width="122" height="29" alt="submit" />
		</button>
		  </td>
        <td width="1%" align="left" valign="top">&nbsp;</td>
      </tr>
    </table>
	</form>
	</td>
  </tr>
  <tr>
    <td align="center" valign="top"><img src="images/line.png" width="985" height="5" /></td>
  </tr>
  <tr>
    <td align="center" valign="top" bgcolor="#FFFFFF"><img src="images/bluebot.png" width="985" height="8" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#FFFFFF">

	<?php $post_id_encoded	=	base64_encode($post_id); ?>
	<form name="rate<?php echo $post_id_encoded; ?>" id="rate<?php $post_id_encoded; ?>" action="rating.php" method="post">
		<input type="hidden" id="post_data" name="post_data" value="<?php echo $post_id_encoded; ?>"/>
		<input type="hidden" id="action_rating" name="action_rating" value=""/>
		<input type="hidden" id="keyword_indiv" name="keyword_indiv" value="<?php echo ($keyword_indiv); ?>"/>
	</form>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top">&nbsp;</td>
        <td height="50" align="left" valign="middle" bgcolor="#FFFFFF"><span class="titxt"><?php echo $resultArray[0][companyname]; ?></span></td>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td width="1%" align="left" valign="top">&nbsp;</td>
        <td width="70%" height="50" align="left" valign="middle" bgcolor="#dbeaf9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="30" align="left" valign="middle">&nbsp;</td>
            <td align="left" valign="middle" class="titxt" nowrap="nowrap">Training</td>
            <td align="left" valign="middle" class="titxt">Placement</td>
            <td align="left" valign="middle" class="titxt">&nbsp;</td>
          </tr>
          <tr>
            <td width="1%" height="41" align="left" valign="middle">&nbsp;</td>
            <td width="45%" align="left" valign="middle" class="titxt" nowrap="nowrap"><?php $conWhere			=		" WHERE post_id = $post_id";
			$result				=		SingleTon::selectQuery("rate_poor,rate_good,rate_average,rate_verygood,rate_excellent,rate_poor_place,rate_good_place,rate_average_place,rate_verygood_place,rate_excellent_place","$conWhere",TABLE_POST,MY_ASSOC,NOR_NO);	
			$rateArray					=		$result;

				$poor_db_count			=	$rateArray[0][rate_poor];			
				if(is_null($poor_db_count)) {
					$poor_count			=	0;
				} else {
					$poor_count			=	$poor_db_count;
				}

				$good_db_count			=	$rateArray[0][rate_good];			
				if(is_null($good_db_count)) {
					$good_count			=	0;
				} else {
					$good_count			=	$good_db_count;
				}
				$average_db_count		=	$rateArray[0][rate_average];			
				if(is_null($average_db_count)) {
					$average_count		=	0;
				} else {
					$average_count		=	$average_db_count;
				}
				$verygood_db_count		=	$rateArray[0][rate_verygood];			
				if(is_null($verygood_db_count)) {
					$verygood_count		=	0;
				} else {
					$verygood_count		=	$verygood_db_count;
				}
				$excellent_db_count		=	$rateArray[0][rate_excellent];			
				if(is_null($excellent_db_count)) {
					$excellent_count	=	0;
				} else {
					$excellent_count	=	$excellent_db_count;
				}
			
				$all_count				=	$poor_count+$good_count+$average_count+$verygood_count+$excellent_count;

				$poor_percent			=	($poor_count/$all_count)*100;
				$good_percent			=	($good_count/$all_count)*100;
				$average_percent		=	($average_count/$all_count)*100;
				$verygood_percent		=	($verygood_count/$all_count)*100;
				$excellent_percent		=	($excellent_count/$all_count)*100;
				$k						=	0;
				if($all_count == 0){
					$star_dimen		=	"<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />";   // Full Star
				}
				else if($poor_percent>$good_percent && $poor_percent>$average_percent && $poor_percent>$verygood_percent && $poor_percent>$excellent_percent) 
				{ 
				   if($poor_percent >= 50) {
						$star_dimen		=	"<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />";   // Full Star
				   } else {
						$star_dimen		=	"<img src='images/star2.png' />&nbsp;&nbsp;"."<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />";   // Half Star
				   }
				} 
				else if($good_percent>$average_percent && $good_percent>$verygood_percent && $good_percent>$excellent_percent) 
				{ 
					if($good_percent >= 50) {
						$star_dimen		=	"<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />";   // Full Star
					} else {
						$star_dimen		=	"<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star2.png' />&nbsp;&nbsp;"."<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />";   // Half Star
					}
				} 
				else if($average_percent>$verygood_percent && $average_percent>$excellent_percent) 
				{ 
					if($average_percent >= 50) {
						$star_dimen		=	"<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />";   // Full Star
					} else {
						$star_dimen		=	"<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star2.png' />&nbsp;&nbsp;"."<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />";   // Half Star
					}
				} 
				else if ($verygood_percent>$excellent_percent) 
				{ 
					if($verygood_percent >= 50) {
						$star_dimen		=	"<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star.png' />";   // Full Star
					} else {
						$star_dimen		=	"<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star2.png' />&nbsp;&nbsp;"."<img src='images/star.png' />";   // Half Star
					}
				} 
				else 
				{ 
					if($excellent_percent >= 50) {
						$star_dimen		=	"<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />";   // Full Star
					} else {
						$star_dimen		=	"<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star2.png' />";   // Half Star
					}
				} 
			echo $star_dimen. " &nbsp; ".$all_count . " Ratings" ; ?></td>
            <td width="43%" align="left" valign="middle" class="titxt">
			<?php 
				$poor_db_count_place			=	$rateArray[0][rate_poor_place];			
				if(is_null($poor_db_count_place)) {
					$poor_count_place			=	0;
				} else {
					$poor_count_place			=	$poor_db_count_place;
				}

				$good_db_count_place			=	$rateArray[0][rate_good_place];			
				if(is_null($good_db_count_place)) {
					$good_count_place			=	0;
				} else {
					$good_count_place			=	$good_db_count_place;
				}
				$average_db_count_place		=	$rateArray[0][rate_average_place];			
				if(is_null($average_db_count_place)) {
					$average_count_place		=	0;
				} else {
					$average_count_place		=	$average_db_count_place;
				}
				$verygood_db_count_place		=	$rateArray[0][rate_verygood_place];			
				if(is_null($verygood_db_count_place)) {
					$verygood_count_place		=	0;
				} else {
					$verygood_count_place		=	$verygood_db_count_place;
				}
				$excellent_db_count_place		=	$rateArray[0][rate_excellent_place];			
				if(is_null($excellent_db_count_place)) {
					$excellent_count_place	=	0;
				} else {
					$excellent_count_place	=	$excellent_db_count_place;
				}
			
				$all_count_place			=	$poor_count_place+$good_count_place+$average_count_place+$verygood_count_place+$excellent_count_place;

				$poor_percent_place			=	($poor_count_place/$all_count_place)*100;
				$good_percent_place			=	($good_count_place/$all_count_place)*100;
				$average_percent_place		=	($average_count_place/$all_count_place)*100;
				$verygood_percent_place		=	($verygood_count_place/$all_count_place)*100;
				$excellent_percent_place	=	($excellent_count_place/$all_count_place)*100;
				$k_place						=	0;
				if($all_count_place == 0){
					$star_dimen_place		=	"<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />";   // Full Star
				}
				else if($poor_percent_place>$good_percent_place && $poor_percent_place>$average_percent_place && $poor_percent_place>$verygood_percent_place && $poor_percent_place>$excellent_percent_place) 
				{ 
				   if($poor_percent_place >= 50) {
						$star_dimen_place		=	"<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />";   // Full Star
				   } else {
						$star_dimen_place		=	"<img src='images/star2.png' />&nbsp;&nbsp;"."<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />";   // Half Star
				   }
				} 
				else if($good_percent_place>$average_percent_place && $good_percent_place>$verygood_percent_place && $good_percent_place>$excellent_percent_place) 
				{ 
					if($good_percent_place >= 50) {
						$star_dimen_place		=	"<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />";   // Full Star
					} else {
						$star_dimen_place		=	"<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star2.png' />&nbsp;&nbsp;"."<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />";   // Half Star
					}
				} 
				else if($average_percent_place>$verygood_percent_place && $average_percent_place>$excellent_percent_place) 
				{ 
					if($average_percent_place >= 50) {
						$star_dimen_place		=	"<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />";   // Full Star
					} else {
						$star_dimen_place		=	"<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star2.png' />&nbsp;&nbsp;"."<img src='images/star.png' />&nbsp;&nbsp;"."<img src='images/star.png' />";   // Half Star
					}
				} 
				else if ($verygood_percent_place>$excellent_percent_place) 
				{ 
					if($verygood_percent_place >= 50) {
						$star_dimen_place		=	"<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star.png' />";   // Full Star
					} else {
						$star_dimen_place		=	"<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star2.png' />&nbsp;&nbsp;"."<img src='images/star.png' />";   // Half Star
					}
				} 
				else 
				{ 
					if($excellent_percent_place >= 50) {
						$star_dimen_place		=	"<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />";   // Full Star
					} else {
						$star_dimen_place		=	"<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star1.png' />&nbsp;&nbsp;"."<img src='images/star2.png' />";   // Half Star
					}
				} 
			echo $star_dimen_place. " &nbsp; ".$all_count_place . " Ratings" ; ?></td>
            <td width="11%" align="left" valign="middle" class="titxt"><a href="javascript:void(0);" onclick="callRatingPage('<?php $post_id_encoded; ?>');" >Rate this </a></td>
          </tr>
          <tr>
            <td height="19" align="left" valign="middle">&nbsp;</td>
            <td align="left" valign="middle" class="titxt" nowrap="nowrap">&nbsp;</td>
            <td align="left" valign="middle" class="titxt">&nbsp;</td>
            <td align="left" valign="middle" class="titxt">&nbsp;</td>
          </tr>
        </table></td>
        <td width="29%" align="left" valign="top">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
 <?php $address	= urlencode($resultArray[0][location_area]);
		$zoom = 15;
		$type = 'ROADMAP';
		$json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=true");
		//echo $json;

		$data = json_decode($json,true);
		
		//pre($data);
		
		//echo $data['results'][0]['geometry']['location']['lat']."<br>"; echo $data['results'][0]['geometry']['location']['lng']."<br>";
		
		$map_status = $data['status'];
		//exit(0);
		//$data = file_get_contents("http://maps.google.com/maps/geo?output=csv&q=".urlencode($address));

		if ($map_status == 'OK') {
			$lat = $data['results'][0]['geometry']['location']['lat'];
			$long = $data['results'][0]['geometry']['location']['lng'];
		} else {
			echo "<script type='text/javascript'>alert('Google Map Lookup Failed');</script>";
			die();
		}
?>
<script type="text/javascript"src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	//Default Action
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content
	
	var mapin = 0;
	//On Click Event
	$("ul.tabs li").click(function() {
	
		//function initialize() {
		if(mapin == 0) { // IF START LOOP
			mapin = 2;
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
		/*var infowindow = new google.maps.InfoWindow({
			content: contentString
		});*/
			 google.maps.event.trigger(map, 'resize'); 
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
	//}
	} // IF END LOOP
		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content
		var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active content
		return false;
	});
});
</script>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<!-- <script type="text/javascript">
  function initialize() {
	//alert('good');
    var myLatlng = new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $long; ?>);
    var myOptions = {
      zoom: <?php echo $zoom; ?>,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.<?php echo $type; ?>
    }
    var map = new google.maps.Map(document.getElementById("tab2"), myOptions);

    var marker = new google.maps.Marker({
        position: myLatlng, 
        map: map,
        title:"<?php echo $lat; ?>, <?php echo $long; ?>"
    });
	//google.maps.event.trigger(map, 'resize');
	var center = map.getCenter(); 
    google.maps.event.trigger(map, 'resize'); 
    map.setCenter(center);
 }	
</script> -->
  <tr>
    <td align="left" valign="top" bgcolor="#FFFFFF"></td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="1%" align="left" valign="top">&nbsp;</td>
        <td width="66%" align="left" valign="top"><div class="container" align="center">


    <ul class="tabs">
        <li><a href="#tab1">Contact</a></li>
        <li><a href="#tab2">Map</a></li>
		 <li><a href="#tab3">Photo</a></li>
		  <li><a href="#tab4">More Info</a></li>
		  <li><a href="#tab5">Company Description</a></li>
    </ul></div>
    <div class="tab_container">
        <div id="tab1" class="tab_content">
            <h4>Contact</h4> 
            <!-- <a href="#"></a>
            <h3><a href="#">www.htmldrive.net</a></h3> -->
			
			<table border="0">
			<tr> 

			<td valign="top">
				<img src='<?php echo $resultArray[0][photopath1]; ?>' width="100" height="100" border='0'/>			</td>
			<td nowrap="nowrap" class="txt"><table border="0" cellpadding="0" cellspacing="0">
			<tr>
			<td>

           <img src='images/home.png' border='0'/><?php echo $resultArray[0][stradd]; ?>. <a class="nounderline" href="javascript:void(0);" onclick="viewmap();">View Map</a> <br />
           <br /></td>
			</tr>
			<tr>
			
            <td><img src='images/phone.png' border='0'/><?php echo $resultArray[0][mainphone] . " | " .$resultArray[0][mobilephone]; ?> </td></tr>
			
			<tr>
            <td><img src='images/email.png' border='0'/><a class="nounderline" href="javascript:void(0);" onclick="beforeCreateChatBox('<?php echo $keyword_indiv; ?>','<?php echo $resultArray[0][post_id]; ?>');">Enquiry By Email</a> </td>
			</tr>
			<tr>
			
            <td><?php if($resultArray[0][websitename] != '') { ?><img src='images/website.png' border='0'/><a target="_blank" class="nounderline" href="<?php echo $resultArray[0][websitename]; ?>" ><?php echo str_ireplace('http://','',$resultArray[0][websitename]); ?></a></td></tr>
			<?php } ?></table></td>
			</tr>
			</table>
        </div>
        <div id="tab2" class="tab_content">            
		 <div id="map_canvas" style="width:650px;height:500px;"></div>
        </div>
		
		 <div id="tab3" class="tab_content">
            <h4>Photo</h4>
<!--             <a href="#"></a>
            <h3><a href="#">www.htmldrive.net</a></h3>
             -->
            <p><img src='<?php echo $resultArray[0][photopath1]; ?>' width='200' height='200' /></p>
			<p><img src='<?php echo $resultArray[0][photopath2]; ?>' width='200' height='200' /></p>
			<p><img src='<?php echo $resultArray[0][photopath3]; ?>' width='200' height='200' /> </p>
            
        </div>
		 <div id="tab4" class="tab_content">
		 <div class="txt">
		
            <h4>Payment Modes</h4>
			<p><?php echo $resultArray[0][paymentoptions]; ?></p>

            <h4>Hours of Operation</h4>

            <p><strong>Monday</strong> : <?php if($resultArray[0][hoomonon] != '') echo "In Time: " .$resultArray[0][hoomonon] . " Out Time: " . $resultArray[0][hoomonout]; else echo "Closed"; ?> </p>

			<p><strong>Tuesday</strong> : <?php if($resultArray[0][hootueon] != '') echo "In Time: " .$resultArray[0][hootueon] . " Out Time: " . $resultArray[0][hootueout]; else echo "Closed"; ?> </p>

			<p><strong>Wednesday</strong> : <?php if($resultArray[0][hoowedon] != '') echo "In Time: " .$resultArray[0][hoowedon] . " Out Time: " . $resultArray[0][hoowedout]; else echo "Closed"; ?> </p>

			<p><strong>Thursday</strong> : <?php if($resultArray[0][hoothuon] != '') echo "In Time: " .$resultArray[0][hoothuon] . " Out Time: " . $resultArray[0][hoothuout]; else echo "Closed"; ?> </p>

			<p><strong>Friday</strong> : <?php if($resultArray[0][hoofrion] != '') echo "In Time: " .$resultArray[0][hoofrion] . " Out Time: " . $resultArray[0][hoofriout]; else echo "Closed"; ?> </p>

			<p><strong>Saturday</strong> : <?php if($resultArray[0][hoosaton] != '') echo "In Time: " .$resultArray[0][hoosaton] . " Out Time: " . $resultArray[0][hoosatout]; else echo "Closed"; ?> </p>

			<p><strong>Sunday</strong> : <?php if($resultArray[0][hoosunon] != '') echo "In Time: " .$resultArray[0][hoosunon] . " Out Time: " . $resultArray[0][hoosunout]; else echo "Closed"; ?> </p>
		 </div>
    </div>
	<div id="tab5" class="tab_content">
		 <div class="txt">		
            <h4>DESCRIPTION</h4>
			<p><?php echo $resultArray[0][descrip]; ?></p>
		 </div>
    </div>
</div>
		<div>
			<?php $conWhere			=		" WHERE rater_post_id = $post_id";
			$result					=		SingleTon::selectQuery("rater_name,rater_mobile,rater_email,rater_review,rater_point,rater_point_place","$conWhere",TABLE_USERRATING,MY_ASSOC,NOR_NO);	
			$rateArrayRate			=		$result; ?>
		</div></td>
        <td width="33%" align="left" valign="top">
		<div>
		<table>
		<tr>
		<td>&nbsp;
		</td>
		<td>
<?php
$video_url			=	$resultArray[0][videopath1];
$url_chnager		=	str_ireplace("watch?", "", $resultArray[0][videopath1]);
$url_chnager		=	str_ireplace("=", "/", $url_chnager); 
?>
<iframe width="280" height="250" src="<?php echo $url_chnager; ?>" frameborder="0" allowfullscreen></iframe>

<?php 
/*$string = "<object width=\"425\" height=\"350\">
               <param name=\"movie\" value=\"http://www.youtube.com/watch?v=J6vIS8jb6Fs&autoplay=0\"></param>
               <param name=\"wmode\" value=\"transparent\"></param>
               <embed src=\"http://www.youtube.com/watch?v=J6vIS8jb6Fs&autoplay=0\" type=\"application/x-shockwave-flash\" wmode=\"transparent\" width=\"425\" height=\"350\"></embed>
           </object>";

libxml_use_internal_errors(TRUE);
$doc = new DOMDocument();
$doc->loadHTML($string);
libxml_clear_errors();
echo $doc->saveHTML();*/
?>

<!-- <object width="640" height="390">
  <param name="movie"
         value="<?php echo $resultArray[0][videopath1]; ?>?version=3&autoplay=1"></param>
  <param name="allowScriptAccess" value="always"></param>
  <embed src="<?php echo $resultArray[0][videopath1]; ?>?version=3&autoplay=1"
         type="application/x-shockwave-flash"
         allowscriptaccess="always"
         width="640" height="390"></embed>
</object> -->
<!-- <iframe width="420" height="315" src="http://www.youtube.com/embed/yyy44xBlI44" frameborder="0" allowfullscreen></iframe> -->
<!-- <iframe width="420" height="315" src="<?php echo $resultArray[0][videopath1]; ?>" frameborder="0" allowfullscreen></iframe> -->
<!-- <iframe width="420" height="345" src="<?php echo $resultArray[0][videopath1]; ?>" </iframe> -->
		</td></tr>
		</table>		
		</div>
		</td>
      </tr>      
	  <?php if($all_count_place > 0 && $all_count > 0) { ?>
	  <tr>
        <td align="left" valign="top">&nbsp;</td>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="46%" height="30" align="left" valign="middle" class="titxt" nowrap="nowrap">Rater Details</td>
			<td width="46%" height="30" align="left" valign="middle" class="titxt" nowrap="nowrap">Training Rating</td>
            <td width="54%" align="left" valign="middle" class="titxt" nowrap="nowrap">Placement Rating</td>
          </tr>
		  <?php foreach($rateArrayRate as $rateVal) {
		$star_dimen = '';
		$star_dimen_place = ''; ?>
          <tr>
            <td align="left" valign="top"><p><?php echo $rateVal[rater_name]; ?></p></td>
					
			<td align="left" valign="top"><p>
			<?php		if($rateVal[rater_point] == 1)  { 
						$star_dimen		=	"<img src='images/starn1.png' />&nbsp;&nbsp;"."<img src='images/starn.png' />&nbsp;&nbsp;"."<img src='images/starn.png' />&nbsp;&nbsp;"."<img src='images/starn.png' />&nbsp;&nbsp;"."<img src='images/starn.png' />";
						$star_text		=	'Poor';
					} else if($rateVal[rater_point] == 2) { 
						$star_dimen		=	"<img src='images/starn1.png' />&nbsp;&nbsp;"."<img src='images/starn1.png' />&nbsp;&nbsp;"."<img src='images/starn.png' />&nbsp;&nbsp;"."<img src='images/starn.png' />&nbsp;&nbsp;"."<img src='images/starn.png' />";
						$star_text		=	'Good';
					} else if($rateVal[rater_point] == 3) { 
						$star_dimen		=	"<img src='images/starn1.png' />&nbsp;&nbsp;"."<img src='images/starn1.png' />&nbsp;&nbsp;"."<img src='images/starn1.png' />&nbsp;&nbsp;"."<img src='images/starn.png' />&nbsp;&nbsp;"."<img src='images/starn.png' />";
						$star_text		=	'Average';
					} else if($rateVal[rater_point] == 4) { 
						$star_dimen		=	"<img src='images/starn1.png' />&nbsp;&nbsp;"."<img src='images/starn1.png' />&nbsp;&nbsp;"."<img src='images/starn1.png' />&nbsp;&nbsp;"."<img src='images/starn1.png' />&nbsp;&nbsp;"."<img src='images/starn.png' />";
						$star_text		=	'Very Good';
					} else if($rateVal[rater_point] == 5) { 
						$star_dimen		=	"<img src='images/starn1.png' />&nbsp;&nbsp;"."<img src='images/starn1.png' />&nbsp;&nbsp;"."<img src='images/starn1.png' />&nbsp;&nbsp;"."<img src='images/starn1.png' />&nbsp;&nbsp;"."<img src='images/starn1.png' />";
						$star_text		=	'Excellent';
					} 				   
					echo $star_dimen; ?><br/></p></td>

				<td align="left" valign="top"><p><?php 
					if($rateVal[rater_point_place] == 6)  { 
						$star_dimen_place		=	"<img src='images/starn1.png' />&nbsp;&nbsp;"."<img src='images/starn.png' />&nbsp;&nbsp;"."<img src='images/starn.png' />&nbsp;&nbsp;"."<img src='images/starn.png' />&nbsp;&nbsp;"."<img src='images/starn.png' />";
						$star_text_place		=	'Poor';
					} else if($rateVal[rater_point_place] == 7) { 
						$star_dimen_place		=	"<img src='images/starn1.png' />&nbsp;&nbsp;"."<img src='images/starn1.png' />&nbsp;&nbsp;"."<img src='images/starn.png' />&nbsp;&nbsp;"."<img src='images/starn.png' />&nbsp;&nbsp;"."<img src='images/starn.png' />";
						$star_text_place		=	'Good';
					} else if($rateVal[rater_point_place] == 8) { 
						$star_dimen_place		=	"<img src='images/starn1.png' />&nbsp;&nbsp;"."<img src='images/starn1.png' />&nbsp;&nbsp;"."<img src='images/starn1.png' />&nbsp;&nbsp;"."<img src='images/starn.png' />&nbsp;&nbsp;"."<img src='images/starn.png' />";
						$star_text_place		=	'Average';
					} else if($rateVal[rater_point_place] == 9) { 
						$star_dimen_place		=	"<img src='images/starn1.png' />&nbsp;&nbsp;"."<img src='images/starn1.png' />&nbsp;&nbsp;"."<img src='images/starn1.png' />&nbsp;&nbsp;"."<img src='images/starn1.png' />&nbsp;&nbsp;"."<img src='images/starn.png' />";
						$star_text_place		=	'Very Good';
					} else if($rateVal[rater_point_place] == 10) { 
						$star_dimen_place		=	"<img src='images/starn1.png' />&nbsp;&nbsp;"."<img src='images/starn1.png' />&nbsp;&nbsp;"."<img src='images/starn1.png' />&nbsp;&nbsp;"."<img src='images/starn1.png' />&nbsp;&nbsp;"."<img src='images/starn1.png' />";
						$star_text_place		=	'Excellent';
					} 				   
					echo $star_dimen_place; ?><br/></p>
				</td>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
		  <tr>
            <td align="left" valign="top"><p><?php echo str_replace(substr($rateVal[rater_mobile],2,6),'*****',$rateVal[rater_mobile]); ?></p></td>
			<td align="left" valign="top"><p><span class="txt" style="color:#FF0000"><?php echo $star_text; ?></span><br/></p></td>
			<td align="left" valign="top"><p><span class="txt" style="color:#FF0000"><?php echo $star_text_place; ?></span><br/></p></td>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
		  <?php }  //FOR LOOP ?>
        </table></td>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
	  <?php  
	} //IF LOOP
	?>
      <tr>
        <td align="left" valign="top">&nbsp;</td>
        <td align="left" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="100%">			
			<tr>
				<td class="txt">										
				</td>
			</tr>
			</table></td>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
    </table></td>
  </tr>  
  <tr>
    <td align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
  <td>
  <div id="backgroundChatPopup"></div>
  </td>
  </tr>
<?php 
/*$address = urlencode("technopark, Trivandrun, kerala,India");
$region = "IND";
$json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=true");
//echo $json;

$decoded = json_decode($json);

pre($decoded);*/
require_once 'include/footer.php'; ?>