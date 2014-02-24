<?php include 'include/header.php';
error_reporting(E_ALL & ~E_NOTICE);

//echo pre($_REQUEST);
//echo pre($_FILES);
	
//exit(0);
if(isset($_REQUEST['actionhid']) && $_REQUEST['actionhid'] != '' && $_REQUEST['actionhid'] == 'add' && isset($_REQUEST)) {
	extract($_REQUEST);
	
	if($paymentoptions != '') {
		$paymentoptionstr           =		mysql_real_escape_string(implode(', ',$paymentoptions));
	}
	if($servicearea != '') {
		$serviceareastr		        =		implode(', ',$servicearea);
	}
	$companyname				=       mysql_real_escape_string($companyname);
	$stradd						=       mysql_real_escape_string(nl2br($stradd));
	$location_area				=       mysql_real_escape_string($location_area);
	$mainphone					=       mysql_real_escape_string($mainphone);
	$mobilephone				=       mysql_real_escape_string($mobilephone);		
	$emailadd					=       mysql_real_escape_string($emailadd);
	$websitename				=       mysql_real_escape_string($websitename);
	$descrip					=       mysql_real_escape_string(nl2br($descrip));
	$categ						=       mysql_real_escape_string($categ);
	$videopath1					=       mysql_real_escape_string($videopath1);

	$selectCount	=	"SELECT post_id from ".TABLE_POST." where emailadd='$emailadd'";
	$selectResult	=	mysql_query($selectCount) or die (mysql_error());
	$num			=	mysql_num_rows($selectResult);	
	$row			=	mysql_fetch_array($selectResult);


	if($_FILES['photopath1']['name'] != '')	{
		$thumb_name=$_FILES['photopath1']['name'];
		$thumb_size=$_FILES['photopath1']['size'];
		$thumb_type=$_FILES['photopath1']['type'];
		$thumb_tmp=$_FILES['photopath1']['tmp_name'];

		$thumb_complete_name		=		str_replace(" ",'',basename($thumb_name));
		$ran						=		rand () ;
		$thumb_target				=		PHOTO_PATH1.$ran.'_'.$thumb_complete_name;
		move_uploaded_file($thumb_tmp,$thumb_target);
	}

	if($_FILES['photopath2']['name'] != '') {
		$thumb_name1=$_FILES['photopath2']['name'];
		$thumb_size1=$_FILES['photopath2']['size'];
		$thumb_type1=$_FILES['photopath2']['type'];
		$thumb_tmp1=$_FILES['photopath2']['tmp_name'];

		$thumb_complete_name1		=		str_replace(" ",'',basename($thumb_name1));
		$ran1						=		rand () ;
		$thumb_target1				=		PHOTO_PATH2.$ran1.'_'.$thumb_complete_name1;
		move_uploaded_file($thumb_tmp1,$thumb_target1);
	}

	if($_FILES['photopath3']['name'] != '') {
		$thumb_name2=$_FILES['photopath3']['name'];
		$thumb_size2=$_FILES['photopath3']['size'];
		$thumb_type2=$_FILES['photopath3']['type'];
		$thumb_tmp2=$_FILES['photopath3']['tmp_name'];

		$thumb_complete_name2		=		str_replace(" ",'',basename($thumb_name2));
		$ran2						=		rand () ;
		$thumb_target2				=		PHOTO_PATH3.$ran2.'_'.$thumb_complete_name2;
		move_uploaded_file($thumb_tmp2,$thumb_target2);
	}

	if($num > 0) { 	
		$msg	=	"Email already Exists";
	}
	else {
		$queryInsert	=	"INSERT INTO ".TABLE_POST." (countryname,companyname,stradd,location_area,citytown,postalcode,mainphone,mobilephone, emailadd,websitename,descrip,categ,hoomonon,hoomonout,hoomonoff,hootueon,hootueout,hootueoff,hoowedon,hoowedout, hoowedoff,hoothuon,hoothuout,hoothuoff,hoofrion,hoofriout,hoofrioff,hoosaton,hoosatout,hoosatoff,hoosunon,hoosunout,hoosunoff, paymentoptions,photopath1,photopath2,photopath3,videopath1,tags,poststatus,insertedDate) VALUES ('$countryname','$companyname','$stradd','$location_area','$citytown','$postalcode','$mainphone','$mobilephone','$emailadd','$websitename','$descrip','$categ','$hoomonon','$hoomonout','$hoomonoff','$hootueon','$hootueout','$hootueoff','$hoowedon','$hoowedout','$hoowedoff','$hoothuon','$hoothuout','$hoothuoff','$hoofrion','$hoofriout','$hoofrioff','$hoosaton','$hoosatout','$hoosatoff','$hoosunon','$hoosunout','$hoosunoff','$paymentoptionstr','$thumb_target','$thumb_target1','$thumb_target2','$videopath1','$tags',1,NOW())";
		//exit(0);

		$resultInsert	=	mysql_query($queryInsert) or die(mysql_error());;

		if($resultInsert) {
			$msg	=	"Datas inserted successfully";
		}
		else {
			$msg	=	"Datas are not inserted";
		}
	}
}
?>
<!-- <script type="text/javascript" src="js/common.js"></script> -->

<script type="text/javascript">
$.validator.setDefaults({
	submitHandler: function() { 
		$('#actionhid').val('add');
		$("#postadd").submit();
		//alert("submitted!"); 
		}
});

$().ready(function() {

	$.validator.addMethod("mondaycheck", function() {
			//alert($('#hoomonout').val());
			//alert($('#hoomonon').val());
			//alert($('input[name="hoomonoff"]').is(':checked'));

		   if($('#hoomonon').val() == '' && $('#hoomonout').val() == '' && !($('input[name="hoomonoff"]').is(':checked'))) {
				return false;
		   } else {
				return true;
		   }
		}, "<br>* Choose Monday Timing or Closed"
	);	
	$.validator.addMethod("mondayinoutcheck", function() {
		   if($('#hoomonon').val() == $('#hoomonout').val() && $('#hoomonon').val() != '' && $('#hoomonout').val() != '') {
				return false;
		   } else {
				return true;
		   }
		}, "<br>* Choose different Monday In & Out Time"
	);
	$.validator.addMethod("mondayoutcheck", function(value, element) {
		   if($('#hoomonon').val() != '' && $('#hoomonout').val() == '') {
				return false;
		   } else {
				return true;
		   }
		}, "<br>* Choose Monday Out Time"
	);
	$.validator.addMethod("mondayincheck", function(value,element) {
			if($('#hoomonon').val() == '' && $('#hoomonout').val() != '') {
				return false;
		   } else {
				return true;
		   }
		},"<br>* Choose Monday In Time"
	);	
	$.validator.addMethod("mondayallcheck", function() {
		   if($('#hoomonon').val() != '' && $('#hoomonout').val() != '' && ($('input[name="hoomonoff"]').is(':checked'))) {
				return false;
		   } else {
				return true;
		   }
		}, "<br>* Don't Choose timing & Closed at the Same Time"
	);

	$.validator.addMethod("tuesdaycheck", function() {
		   if($('#hootueon').val() == '' && $('#hootueout').val() == '' && !($('input[name="hootueoff"]').is(':checked'))) {
				return false;
		   } else {
				return true;
		   }
		}, "<br>* Choose Tuesday Timing or Closed"
	);	
	$.validator.addMethod("tuesdayinoutcheck", function() {
		   if($('#hootueon').val() == $('#hootueout').val() && $('#hootueon').val() != '' && $('#hootueout').val() != '') {
				return false;
		   } else {
				return true;
		   }
		}, "<br>* Choose different Tuesday In & Out Time"
	);
	$.validator.addMethod("tuesdayoutcheck", function(value, element) {
		   if($('#hootueon').val() != '' && $('#hootueout').val() == '') {
				return false;
		   } else {
				return true;
		   }
		}, "<br>* Choose Tuesday Out Time"
	);
	$.validator.addMethod("tuesdayincheck", function(value,element) {
			if($('#hootueon').val() == '' && $('#hootueout').val() != '') {
				return false;
		   } else {
				return true;
		   }
		},"<br>* Choose Tuesday In Time"
	);	
	$.validator.addMethod("tuesdayallcheck", function() {
		   if($('#hootueon').val() != '' && $('#hootueout').val() != '' && ($('input[name="hootueoff"]').is(':checked'))) {
				return false;
		   } else {
				return true;
		   }
		}, "<br>* Don't Choose timing & Closed at the Same Time"
	);

	$.validator.addMethod("wednesdaycheck", function() {
		   if($('#hoowedon').val() == '' && $('#hoowedout').val() == '' && !($('input[name="hoowedoff"]').is(':checked'))) {
				return false;
		   } else {
				return true;
		   }
		}, "<br>* Choose Wednesday Timing or Closed"
	);	
	$.validator.addMethod("wednesdayinoutcheck", function() {
		   if($('#hoowedon').val() == $('#hoowedout').val() && $('#hoowedon').val() != '' && $('#hoowedout').val() != '') {
				return false;
		   } else {
				return true;
		   }
		}, "<br>* Choose different Wednesday In & Out Time"
	);
	$.validator.addMethod("wednesdayoutcheck", function(value, element) {
		   if($('#hoowedon').val() != '' && $('#hoowedout').val() == '') {
				return false;
		   } else {
				return true;
		   }
		}, "<br>* Choose Wednesday Out Time"
	);
	$.validator.addMethod("wednesdayincheck", function(value,element) {
			if($('#hoowedon').val() == '' && $('#hoowedout').val() != '') {
				return false;
		   } else {
				return true;
		   }
		},"<br>* Choose Wednesday In Time"
	);	
	$.validator.addMethod("wednesdayallcheck", function() {
		   if($('#hoowedon').val() != '' && $('#hoowedout').val() != '' && ($('input[name="hoowedoff"]').is(':checked'))) {
				return false;
		   } else {
				return true;
		   }
		}, "<br>* Don't Choose timing & Closed at the Same Time"
	);

	$.validator.addMethod("thursdaycheck", function() {
		   if($('#hoothuon').val() == '' && $('#hoothuout').val() == '' && !($('input[name="hoothuoff"]').is(':checked'))) {
				return false;
		   } else {
				return true;
		   }
		}, "<br>* Choose Thursday Timing or Closed"
	);	
	$.validator.addMethod("thursdayinoutcheck", function() {
		   if($('#hoothuon').val() == $('#hoothuout').val() && $('#hoothuon').val() != '' && $('#hoothuout').val() != '') {
				return false;
		   } else {
				return true;
		   }
		}, "<br>* Choose different Thursday In & Out Time"
	);
	$.validator.addMethod("thursdayoutcheck", function(value, element) {
		   if($('#hoothuon').val() != '' && $('#hoothuout').val() == '') {
				return false;
		   } else {
				return true;
		   }
		}, "<br>* Choose Thursday Out Time"
	);
	$.validator.addMethod("thursdayincheck", function(value,element) {
			if($('#hoothuon').val() == '' && $('#hoothuout').val() != '') {
				return false;
		   } else {
				return true;
		   }
		},"<br>* Choose Thursday In Time"
	);	
	$.validator.addMethod("thursdayallcheck", function() {
		   if($('#hoothuon').val() != '' && $('#hoothuout').val() != '' && ($('input[name="hoothuoff"]').is(':checked'))) {
				return false;
		   } else {
				return true;
		   }
		}, "<br>* Don't Choose timing & Closed at the Same Time"
	);

	$.validator.addMethod("fridaycheck", function() {
		   if($('#hoofrion').val() == '' && $('#hoofriout').val() == '' && !($('input[name="hoofrioff"]').is(':checked'))) {
				return false;
		   } else {
				return true;
		   }
		}, "<br>* Choose Friday Timing or Closed"
	);	
	$.validator.addMethod("fridayinoutcheck", function() {
		   if($('#hoofrion').val() == $('#hoofriout').val() && $('#hoofrion').val() != '' && $('#hoofriout').val() != '') {
				return false;
		   } else {
				return true;
		   }
		}, "<br>* Choose different Friday In & Out Time"
	);
	$.validator.addMethod("fridayoutcheck", function(value, element) {
		   if($('#hoofrion').val() != '' && $('#hoofriout').val() == '') {
				return false;
		   } else {
				return true;
		   }
		}, "<br>* Choose Friday Out Time"
	);
	$.validator.addMethod("fridayincheck", function(value,element) {
			if($('#hoofrion').val() == '' && $('#hoofriout').val() != '') {
				return false;
		   } else {
				return true;
		   }
		},"<br>* Choose Friday In Time"
	);	
	$.validator.addMethod("fridayallcheck", function() {
		   if($('#hoofrion').val() != '' && $('#hoofriout').val() != '' && ($('input[name="hoofrioff"]').is(':checked'))) {
				return false;
		   } else {
				return true;
		   }
		}, "<br>* Don't Choose timing & Closed at the Same Time"
	);

	$.validator.addMethod("saturdaycheck", function() {
		   if($('#hoosaton').val() == '' && $('#hoosatout').val() == '' && !($('input[name="hoosatoff"]').is(':checked'))) {
				return false;
		   } else {
				return true;
		   }
		}, "<br>* Choose Saturday Timing or Closed"
	);	
	$.validator.addMethod("saturdayinoutcheck", function() {
		   if($('#hoosaton').val() == $('#hoosatout').val() && $('#hoosaton').val() != '' && $('#hoosatout').val() != '') {
				return false;
		   } else {
				return true;
		   }
		}, "<br>* Choose different Saturday In & Out Time"
	);
	$.validator.addMethod("saturdayoutcheck", function(value, element) {
		   if($('#hoosaton').val() != '' && $('#hoosatout').val() == '') {
				return false;
		   } else {
				return true;
		   }
		}, "<br>* Choose Saturday Out Time"
	);
	$.validator.addMethod("saturdayincheck", function(value,element) {
			if($('#hoosaton').val() == '' && $('#hoosatout').val() != '') {
				return false;
		   } else {
				return true;
		   }
		},"<br>* Choose Saturday In Time"
	);	
	$.validator.addMethod("saturdayallcheck", function() {
		   if($('#hoosaton').val() != '' && $('#hoosatout').val() != '' && ($('input[name="hoosatoff"]').is(':checked'))) {
				return false;
		   } else {
				return true;
		   }
		}, "<br>* Don't Choose timing & Closed at the Same Time"
	);

	$.validator.addMethod("sundaycheck", function() {
		   if($('#hoosunon').val() == '' && $('#hoosunout').val() == '' && !($('input[name="hoosunoff"]').is(':checked'))) {
				return false;
		   } else {
				return true;
		   }
		}, "<br>* Choose Sunday Timing or Closed"
	);	
	$.validator.addMethod("sundayinoutcheck", function() {
		   if($('#hoosunon').val() == $('#hoosunout').val() && $('#hoosunon').val() != '' && $('#hoosunout').val() != '') {
				return false;
		   } else {
				return true;
		   }
		}, "<br>* Choose different Sunday In & Out Time"
	);
	$.validator.addMethod("sundayoutcheck", function(value, element) {
		   if($('#hoosunon').val() != '' && $('#hoosunout').val() == '') {
				return false;
		   } else {
				return true;
		   }
		}, "<br>* Choose Sunday Out Time"
	);
	$.validator.addMethod("sundayincheck", function(value,element) {
			if($('#hoosunon').val() == '' && $('#hoosunout').val() != '') {
				return false;
		   } else {
				return true;
		   }
		},"<br>* Choose Sunday In Time"
	);	
	$.validator.addMethod("sundayallcheck", function() {
		   if($('#hoosunon').val() != '' && $('#hoosunout').val() != '' && ($('input[name="hoosunoff"]').is(':checked'))) {
				return false;
		   } else {
				return true;
		   }
		}, "<br>* Don't Choose timing & Closed at the Same Time"
	);

	$.validator.addMethod("alldaycheck", function() {
		   if($('input[name="hoomonoff"]').is(':checked') && $('input[name="hootueoff"]').is(':checked') && $('input[name="hoowedoff"]').is(':checked') && $('input[name="hoothuoff"]').is(':checked') && $('input[name="hoofrioff"]').is(':checked') && $('input[name="hoosatoff"]').is(':checked') && $('input[name="hoosunoff"]').is(':checked')) {
				return false;
		   } else {
				return true;
		   }
		}, "<br>* All Days Can't Be Closed"
	);

	$.validator.addMethod(
		"locationin",
		function(value, element, locationi) {
			var check = false;
			return this.optional(element) || locationi.test(value);
		},"<br>Only Alphabets."
	);
	
	$.validator.addMethod(
		"mainp",
		function(value, element, mainph) {
			var check = false;
			return this.optional(element) || mainph.test(value);
		},
		"<br>Not valid. Please input valid phone (044-28522484 or 9840512408)!."
	);
	$.validator.addMethod(
		"websitein",
		function(value, element, websitei) {
			var check = false;
			return this.optional(element) || websitei.test(value);
		},
		"<br>Enter Valid Website Address!."
	);

	$.validator.addMethod(
		"videopathin",
		function(value, element, videopathi) {
			var check = false;
			return this.optional(element) || videopathi.test(value);
		},
		"<br>Enter Valid Youtube URL!."
	);

	$.validator.addMethod(
		"tagsin",
		function(value, element, tagsi) {
			var check = false;
			return this.optional(element) || tagsi.test(value);
		},
		"<br>Input Tags Separated With Comma!."
	);
	
	$.validator.addMethod("locationcheck", function(value, element) {
			var locationarea		=	$('#location_area').val();
			var posturl				=	'checklocation.php';
			var sendemailtouser		=   $.ajax({
				type            :       "POST",
				url             :       posturl,
				data            :       {'locationarea' : locationarea },
				cache           :       false,
				async           :       false,
				dataType        :       "text"
			}).responseText;

			if(sendemailtouser == "1") {
				return false;
			} else {
				return true;
			}

		}, "<br>Location not found"
	);
	
	/*contact_name: {
		required	:	true,
		regex : /^[a-zA-Z]+$/
	},*/


	// validate signup form on keyup and submit
	$("#postadd").validate({
		onkeyup: false,
		onkeydown: false,
		rules: {
			groups: {
				hoomonday: "hoomonon hoomonout hoomonoff"
			},
			
			companyname: { required: true,
			},
			stradd: "required",
			location_area: {
				required : true,
				locationin : /^[a-zA-Z ]+$/,
				locationcheck: true
			},
			citytown: "required",
			postalcode: {
				required:true,
				number:true,
				minlength: 6
			},
			mainphone: {					
				required : true,
				mainp : /^[0-9]{3}\-?[0-9]{7,8}$/
			},
			mobilephone : {
				required : false,
				number:true,
				minlength:  10
			},
			emailadd: {
				required: true,
				email: true
			},
			websitename : {
				required : false,
				websitein: /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
			},
			categ: "required",			
			hoomonon: {
				required : "#hoomonout:selected",
				mondayincheck : true,
			},
			hoomonout: {
				required : "#hoomonon:selected",
				mondayoutcheck : true,
				mondayinoutcheck : true,
			},
			hoomonoff: {
				mondaycheck : true,
				mondayallcheck : true
			},
			hootueon: {
				required : "#hootueout:selected",
				tuesdayincheck : true,
			},
			hootueout: {
				required : "#hootueon:selected",
				tuesdayoutcheck : true,
				tuesdayinoutcheck : true,
			},
			hootueoff: {
				tuesdaycheck : true,
				tuesdayallcheck : true
			},
			hoowedon: {
				required : "#hoowedout:selected",
				wednesdayincheck : true,
			},
			hoowedout: {
				required : "#hoowedon:selected",
				wednesdayoutcheck : true,
				wednesdayinoutcheck : true,
			},
			hoowedoff: {
				wednesdaycheck : true,
				wednesdayallcheck : true
			},
			hoothuon: {
				required : "#hoothuout:selected",
				thursdayincheck : true,
			},
			hoothuout: {
				required : "#hoothuon:selected",
				thursdayoutcheck : true,
				thursdayinoutcheck : true,
			},
			hoothuoff: {
				thursdaycheck : true,
				thursdayallcheck : true
			},
			hoofrion: {
				required : "#hoofriout:selected",
				fridayincheck : true,
			},
			hoofriout: {
				required : "#hoofrion:selected",
				fridayoutcheck : true,
				fridayinoutcheck : true,
			},
			hoofrioff: {
				fridaycheck : true,
				fridayallcheck : true
			},
			hoosaton: {
				required : "#hoosatout:selected",
				saturdayincheck : true,
			},
			hoosatout: {
				required : "#hoosaton:selected",
				saturdayoutcheck : true,
				saturdayinoutcheck : true,
			},
			hoosatoff: {
				saturdaycheck : true,
				saturdayallcheck : true
			},
			hoosunon: {
				required : "#hoosunout:selected",
				sundayincheck : true,
			},
			hoosunout: {
				required : "#hoosunon:selected",
				sundayoutcheck : true,
				sundayinoutcheck : true,
			},
			hoosunoff: {
				sundaycheck : true,
				sundayallcheck : true,
				alldaycheck : true
			},
			photopath1: {
				required: true
			},
			videopath1 : {
				required: false
			},
			videopath1 : {
				required : false,
				videopathin: /^.*(youtu.be\/|v\/|embed\/|watch\?|youtube.com\/user\/[^#]*#([^\/]*?\/)*)\??v?=?([^#\&\?]*).*/
			},
			tags : {
				required: true,
				tagsin: /^[A-Za-z0-9, ]+$/
			},			
		},
		errorPlacement: function(error,element) {
			//alert('3243');
		   if (element.hasClass("mon_time")) {					
				//alert('in');
				$('#montime').html(error);
			} else if (element.hasClass("tues_time")) {					
				//alert('in');
				$('#tuestime').html(error);
			} else if (element.hasClass("wed_time")) {					
				//alert('in');
				$('#wedtime').html(error);
			} else if (element.hasClass("thur_time")) {					
				//alert('in');
				$('#thurtime').html(error);
			} else if (element.hasClass("fri_time")) {					
				//alert('in');
				$('#fritime').html(error);
			} else if (element.hasClass("sat_time")) {					
				//alert('in');
				$('#sattime').html(error);
			} else if (element.hasClass("sun_time")) {					
				//alert('in');
				$('#suntime').html(error);
			} else {
				error.insertAfter(element);  //WHICH IS THE DEFAULT BEHAVIOUR OF ADDING ERRORS AFTER ELEMENTS
			}
		  /*var n = element.attr("hoomonday");
		  if (n == "hoomonon" || n == "hoomonout" || n == "hoomonoff") {
			alert('in');
			error.insertAfter("#hoomonoff");
		  }
		  else
			error.insertAfter(element);				*/
		},
		messages: {
			companyname: {			
				required: "<br/> * Required Field",
				/*minlength: jQuery.format("Enter at least 2 characters")*/						
			},
			stradd: "<br/>* Required Field",
			location_area: {
					required: "<br/>* Required Field",
			},
			citytown:"<br>* Required Field",
			postalcode: {
				required:"<br>* Required Field",
				number:	"<br>Postal Code Should be Numeric",
				minlength:	"<br>Postal Code Should be a 6-Digit number",
			},
			mainphone: {
					required : "<br>* Required Field"
			},
			mobilephone: {
				number:"<br>Mobile Phone Should be numeric",
				minlength : "<br>Mobile Phone Should be a 10-Digit number"
			},
			emailadd: {
				required: "<br>* Required Field",
				email : "Enter valid email address",
			},
			categ: "<br>* Required Field",
			hoomonon: {
				required : "<br>* Choose Monday Timing or Closed",
			},
			hootueon: {
				required : "<br>* Choose Tuesday Timing or Closed",
			},
			hoowedon: {
				required : "<br>* Choose Wednesday Timing or Closed",
			},
			hoothuon: {
				required : "<br>* Choose Thursday Timing or Closed",
			},
			hoofrion: {
				required : "<br>* Choose Friday Timing or Closed",
			},
			hoosaton: {
				required : "<br>* Choose Saturday Timing or Closed",
			},
			hoosunon: {
				required : "<br>* Choose Sunday Timing or Closed",
			},
			photopath1: {
				required: "<br> * Upload Photo"
			},
			tags : {
				required: "<br> * Field Required"
			}
			
		}
	});
	
	// propose username by combining first- and lastname
	$("#username").focus(function() {
		var firstname = $("#firstname").val();
		var lastname = $("#lastname").val();
		if(firstname && lastname && !this.value) {
			this.value = firstname + "." + lastname;
		}
	});
	
	//code to hide topic selection, disable for demo

});
</script>

<style type="text/css">
#commentForm { width: 500px; }
#commentForm label { width: 250px; }
#commentForm label.error, #commentForm input.submit { margin-left: 253px; }
#signupForm { width: 670px; }
#signupForm label.error {
	margin-left: 10px;
	width: auto;
	display: inline;
}
#newsletter_topics label.error {
	display: none;
	margin-left: 103px;
}
</style>
  <tr>
    <td align="center" valign="top"><img src="images/topimg.png" width="985" height="48" border="0" usemap="#Map" /></td>
  </tr>
  <tr>
    <td align="center" valign="top" bgcolor="#FFFFFF"><img src="images/line.png" width="985" height="5" /></td>
  </tr>
  <tr>
    <td align="center" valign="top"><img src="images/bluebot.png" width="985" height="8" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>       
        <td width="48%" align="left" valign="middle">
<!-- 		<form id="postadd" name="postadd" method="post" action="" enctype='multipart/form-data' onSubmit='return validate_post()'> -->
		<form id="postadd" name="postadd" method="post" action="" enctype='multipart/form-data' >
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="3%" align="left" valign="middle">&nbsp;</td>
            <td height="30" colspan="2" align="left" valign="middle" bgcolor="#e9f9ff"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="7%" height="30" align="center" valign="middle"><img src="images/down.png" width="9" height="5" /></td>
                <td width="93%" align="left" valign="middle" class="titxt">Basic Information</td>
              </tr>
            </table></td>
            </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td width="42%" align="left" valign="middle">&nbsp;</td>
            <td width="55%" align="left" valign="middle">&nbsp;</td>
          </tr>

		  <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td width="42%" align="left" valign="middle" nowrap="nowrap" <?php if(isset($msg) && $msg != '') { ?> class='msgdisplay' <?php } ?> ><?php if(isset($msg) && $msg != '') { echo $msg; } ?></td>
            <td width="55%" align="left" valign="middle">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="30" align="left" valign="middle"><em class="txt"> * </em><span class="txt"><em>Required Fields</em></span></td>
            <td height="30" align="left" valign="middle">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="40" align="left" valign="middle" class="txt">Country:  *</td>
            <td height="30" align="left" valign="middle"><span class="txt">
				<input type="text" name="countryname" id="countryname" readonly value="India" class="fpinput"  />
			  
			  <!-- <select class="fpinput" name="select2">
				  <option selected="selected">- Country -</option>
				  <option>Australia</option>
				  <option>India</option>
				  <option>UK</option>
				</select> -->
            </span></td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="40" align="left" valign="middle" class="txt">Company / Organization:  *</td>
            <td height="30" align="left" valign="middle"><span class="txt">
              <input class="fpsinput" type="text" name="companyname" id="companyname" maxLength='50'/>
            </span></td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="40" align="left" valign="middle" class="txt">Street Address:  *</td>
            <td height="30" align="left" valign="middle"><span class="txt">
              <!-- <input class="fpsinput" type="text" name="stradd" id="stradd" /> -->
			  <textarea class="fpsinput" name="stradd" id="stradd" cols="" rows="" ></textarea>
            </span></td>
          </tr>
      	 <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="40" align="left" valign="middle" class="txt">Location / Area  *</td>
            <td height="30" align="left" valign="middle"><span class="txt">
              <input class="fpsinput" type="text" name="location_area" id="location_area" maxLength='50'/>
            </span></td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="40" align="left" valign="middle" class="txt">City/Town: <span id="city_required">*</span></td>
            <td height="30" align="left" valign="middle"><span class="txt">

				<select class="fpsinput" name="citytown" id="citytown">
				  <option value=''>- City -</option>

		<?php	$conWhere			=	" WHERE 1 = 1";
				$result				=	SingleTon::selectQuery("city_name","$conWhere",TABLE_CITY,MY_ASSOC,NOR_NO);	
				$cityArray			=	$result;
				//pre($cityArray);			
				foreach($cityArray as $cityVal) {
				?>
				  <option value='<?php echo $cityVal[city_name]; ?>'><?php echo $cityVal[city_name]; ?></option>
				<?php } ?>				
				</select>
            </span></td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="40" align="left" valign="middle" class="txt"><span id="address_zip_parent">
              <label for="address_zip">Postal Code:</label>
              <span id="zip_required">*</span></span></td>
            <td height="30" align="left" valign="middle"><span class="txt">
              <input class="fpsinput" type="text" name="postalcode" id="postalcode" maxLength='6'/>
            </span></td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="40" align="left" valign="middle" class="txt">Main phone:  *</td>
            <td height="30" align="left" valign="middle"><span class="txt">
              <input class="fpsinput" type="text" name="mainphone" id="mainphone" maxLength='12'/>
            </span></td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="40" align="left" valign="middle" class="txt">Mobile phone:</td>
            <td height="30" align="left" valign="middle"><span class="txt">
              <input class="fpsinput" type="text" name="mobilephone" id="mobilephone" maxLength='10'/>
            </span></td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="40" align="left" valign="middle" class="txt">Email address: * </td>
            <td height="30" align="left" valign="middle"><span class="txt">
              <input class="fpsinput" type="text" name="emailadd" id="emailadd" maxLength='100' />
            </span></td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="40" align="left" valign="middle" class="txt">Website:</td>
            <td height="30" align="left" valign="middle"><span class="txt">
              <input class="fpsinput" type="text" name="websitename" id="websitename" />
            </span></td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="40" align="left" valign="middle" class="txt">Description:</td>
            <td height="30" align="left" valign="middle"><span class="txt">
              <textarea class="pfinputs" name="descrip" id="descrip"></textarea>
            </span></td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="40" align="left" valign="middle" class="txt">Category:  *</td>
            <td height="30" align="left" valign="middle"><span class="txt">
              <input class="fpsinput" type="text" name="categ" id="categ" maxLength='100'/>
            </span></td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="19" align="left" valign="middle" class="txt">&nbsp;</td>
            <td height="19" align="left" valign="middle">&nbsp;</td>
          </tr>
          <!-- <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="30" colspan="2" align="left" valign="middle" class="txt" bgcolor="#e9f9ff"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="7%" height="30" align="center" valign="middle"><img src="images/down.png" width="9" height="5" /></td>
                <td width="93%" align="left" valign="middle" class="titxt">Service Areas and Location Settings</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="19" align="left" valign="middle" class="txt">&nbsp;</td>
            <td height="19" align="left" valign="middle">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="30" colspan="2" align="left" valign="middle" class="txt"><label>
              <input name="servicearea[]" id="servicearea" type="radio" value="No" />
              <strong>No</strong>, all customers come to the business location</label></td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="30" colspan="2" align="left" valign="middle" class="txt"><input name="servicearea[]" id="servicearea" type="radio" value="Yes" />
              <strong>Yes</strong>, this business serves customers at their locations</td>
          </tr> -->
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="19" align="left" valign="middle" class="txt">&nbsp;</td>
            <td height="19" align="left" valign="middle">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="30" colspan="2" align="left" valign="middle" class="txt" bgcolor="#e9f9ff"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="7%" height="30" align="center" valign="middle"><img src="images/down.png" width="9" height="5" /></td>
                <td width="93%" height="30" align="left" valign="middle" class="titxt">Hours of operations</td>
              </tr>
            </table></td>
            </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="19" colspan="2" align="left" valign="middle" class="txt">&nbsp;</td>
            </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="269" colspan="2" align="left" valign="middle" class="txt"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="9%" height="30" align="left" valign="middle">Mon : </td>
                <td width="30%" align="left" valign="middle"><select class="timinput mon_time" name="hoomonon" id="hoomonon">
				<option value=''>--------Time--------</option>
				<?php	$conWhere			=	" WHERE time_status = 1";
				$result				=	SingleTon::selectQuery("time_clock","$conWhere",TABLE_TIME,MY_ASSOC,NOR_NO);	
				$clockArray			=	'';
				$clockArray			=	$result;
				//pre($cityArray);			
				foreach($clockArray as $clockVal) {
				?>
				  <option value='<?php echo $clockVal[time_clock]; ?>'><?php echo $clockVal[time_clock]; ?></option>
				<?php } ?>				
                </select> 
                   </td>
                <td width="29%" align="left" valign="middle"><select class="timinput mon_time" name="hoomonout" id="hoomonout">
                <option value=''>--------Time--------</option>
				<?php	
				foreach($clockArray as $clockVal) {
				?>
				  <option value='<?php echo $clockVal[time_clock]; ?>'><?php echo $clockVal[time_clock]; ?></option>
				<?php } ?>

                </select></td>
                <td width="32%" height="40" align="left" valign="middle" class="txt"><label>
                  <input type="checkbox" name="hoomonoff" id="hoomonoff" class="mon_time" value="Closed" />
                </label>
                  Closed</td>
              </tr>
			  <tr>
			  <td colspan='4' valign="top" align="center"><span id="montime"></span>
			  </td>
			  </tr>
              <tr>
                <td height="30" align="left" valign="middle">Tue : </td>
                <td align="left" valign="middle"><select class="timinput tues_time" name="hootueon" id="hootueon">
				<option value=''>--------Time--------</option>
                <?php	
				foreach($clockArray as $clockVal) {
				?>
				  <option value='<?php echo $clockVal[time_clock]; ?>'><?php echo $clockVal[time_clock]; ?></option>
				<?php } ?>

                </select> 
                   </td>
                <td align="left" valign="middle"><select class="timinput tues_time" name="hootueout" id="hootueout">
                <option value=''>--------Time--------</option>
				<?php	
				foreach($clockArray as $clockVal) {
				?>
				  <option value='<?php echo $clockVal[time_clock]; ?>'><?php echo $clockVal[time_clock]; ?></option>
				<?php } ?>
                </select></td>
                <td height="40" align="left" valign="middle" class="txt"><input type="checkbox" name="hootueoff" id="hootueoff" class="tues_time" value="Closed" /> 
                  Closed </td>
              </tr>
			  <tr>
			  <td colspan='4' valign="top" align="center"><span id="tuestime"></span>
			  </td>
			  </tr>
              <tr>
                <td height="30" align="left" valign="middle">Wed : </td>
                <td align="left" valign="middle"><select class="timinput wed_time" name="hoowedon" id="hoowedon">
                <option value=''>--------Time--------</option>
				<?php	
				foreach($clockArray as $clockVal) {
				?>
				  <option value='<?php echo $clockVal[time_clock]; ?>'><?php echo $clockVal[time_clock]; ?></option>
				<?php } ?>
				  </select></td>
                <td align="left" valign="middle"><select class="timinput wed_time" name="hoowedout" id="hoowedout">
                <option value=''>--------Time--------</option>
				<?php	
				foreach($clockArray as $clockVal) {
				?>
				  <option value='<?php echo $clockVal[time_clock]; ?>'><?php echo $clockVal[time_clock]; ?></option>
				<?php } ?>
                </select></td>
                <td height="40" align="left" valign="middle" class="txt"><input type="checkbox" name="hoowedoff" id="hoowedoff" class="wed_time" value="Closed" />
                  Closed </td>
              </tr>
			  <tr>
			  <td colspan='4' valign="top" align="center"><span id="wedtime"></span>
			  </td>
			  </tr>
              <tr>
                <td height="30" align="left" valign="middle">Thu : </td>
                <td align="left" valign="middle"><select class="timinput thur_time" name="hoothuon" id="hoothuon">
                <option value=''>--------Time--------</option>
				<?php	
				foreach($clockArray as $clockVal) {
				?>
				  <option value='<?php echo $clockVal[time_clock]; ?>'><?php echo $clockVal[time_clock]; ?></option>
				<?php } ?>
                </select></td>
                <td align="left" valign="middle"><select class="timinput thur_time" name="hoothuout" id="hoothuout">
                <option value=''>--------Time--------</option>
				<?php	
				foreach($clockArray as $clockVal) {
				?>
				  <option value='<?php echo $clockVal[time_clock]; ?>'><?php echo $clockVal[time_clock]; ?></option>
				<?php } ?>
                </select></td>
                <td height="40" align="left" valign="middle" class="txt"><input type="checkbox" name="hoothuoff" id="hoothuoff" class="thur_time" value="Closed" />
                  Closed</td>
              </tr>
			  <tr>
			  <td colspan='4' valign="top" align="center"><span id="thurtime"></span>
			  </td>
			  </tr>
              <tr>
                <td height="30" align="left" valign="middle">Fri : </td>
                <td align="left" valign="middle"><select class="timinput fri_time" name="hoofrion" id="hoofrion">
                <option value=''>--------Time--------</option>
				<?php	
				foreach($clockArray as $clockVal) {
				?>
				  <option value='<?php echo $clockVal[time_clock]; ?>'><?php echo $clockVal[time_clock]; ?></option>
				<?php } ?>
                </select></td>
                <td align="left" valign="middle"><select class="timinput fri_time" name="hoofriout" id="hoofriout">
                <option value=''>--------Time--------</option>
				<?php	
				foreach($clockArray as $clockVal) {
				?>
				  <option value='<?php echo $clockVal[time_clock]; ?>'><?php echo $clockVal[time_clock]; ?></option>
				<?php } ?>
                </select></td>
                <td height="40" align="left" valign="middle" class="txt"><input type="checkbox" name="hoofrioff" id="hoofrioff" class="fri_time" value="Closed" /> 
                  Closed </td>
              </tr>
			  <tr>
			  <td colspan='4' valign="top" align="center"><span id="fritime"></span>
			  </td>
			  </tr>
              <tr>
                <td height="30" align="left" valign="middle">Sat : </td>
                <td align="left" valign="middle"><select class="timinput sat_time" name="hoosaton" id="hoosaton">
                <option value=''>--------Time--------</option>
				<?php	
				foreach($clockArray as $clockVal) {
				?>
				  <option value='<?php echo $clockVal[time_clock]; ?>'><?php echo $clockVal[time_clock]; ?></option>
				<?php } ?>
                </select></td>
                <td align="left" valign="middle"><select class="timinput sat_time" name="hoosatout" id="hoosatout">
                <option value=''>--------Time--------</option>
				<?php	
				foreach($clockArray as $clockVal) {
				?>
				  <option value='<?php echo $clockVal[time_clock]; ?>'><?php echo $clockVal[time_clock]; ?></option>
				<?php } ?>
                </select></td>
                <td height="40" align="left" valign="middle" class="txt"><input type="checkbox" name="hoosatoff" id="hoosatoff" class="sat_time" value="Closed" />
                  Closed </td>
              </tr>
			  <tr>
			  <td colspan='4' valign="top" align="center"><span id="sattime"></span>
			  </td>
			  </tr>
              <tr>
                <td height="30" align="left" valign="middle">Sun : </td>
                <td align="left" valign="middle"><select class="timinput sun_time" name="hoosunon" id="hoosunon">
                <option value=''>--------Time--------</option>
				<?php	
				foreach($clockArray as $clockVal) {
				?>
				  <option value='<?php echo $clockVal[time_clock]; ?>'><?php echo $clockVal[time_clock]; ?></option>
				<?php } ?>
                </select></td>
                <td align="left" valign="middle"><select class="timinput sun_time" name="hoosunout" id="hoosunout">
                <option value=''>--------Time--------</option>
				<?php	
				foreach($clockArray as $clockVal) {
				?>
				  <option value='<?php echo $clockVal[time_clock]; ?>'><?php echo $clockVal[time_clock]; ?></option>
				<?php } ?>
                </select></td>
                <td height="40" align="left" valign="middle" class="txt"><input type="checkbox" name="hoosunoff" id="hoosunoff" class="sun_time" value="Closed" />
                Closed</td>
              </tr>
			  <tr>
			  <td colspan='4' valign="top" align="center"><span id="suntime"></span>
			  </td>
			  </tr>
            </table>           </td>
            </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="19" align="left" valign="middle" class="txt">&nbsp;</td>
            <td height="19" align="left" valign="middle">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="30" colspan="2" align="left" valign="middle" class="txt" bgcolor="#e9f9ff"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="7%" height="30" align="center" valign="middle"><img src="images/down.png" width="9" height="5" /></td>
                <td width="93%" height="30" align="left" valign="middle" class="titxt">Payment options</td>
              </tr>
            </table></td>
            </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="19" align="left" valign="middle" class="txt">&nbsp;</td>
            <td height="19" align="left" valign="middle">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="30" colspan="2" align="left" valign="middle" class="txt"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="38%" height="30" align="left" valign="middle"><label>
<input type="checkbox" name="paymentoptions[]" id="paymentoptions" value="American Express" />                
American Express</label></td>
                <td width="31%" align="left" valign="middle"><input type="checkbox" name="paymentoptions[]" id="paymentoptions" value="Diner's Club" />
                  Diner's Club</td>
                <td width="31%" align="left" valign="middle"><input type="checkbox" name="paymentoptions[]" id="paymentoptions" value="MasterCard" />
                  MasterCard</td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle"><input type="checkbox" name="paymentoptions[]" id="paymentoptions" value="Bank Wire" />
                  Bank Wire</td>
                <td align="left" valign="middle"><input type="checkbox" name="paymentoptions[]" id="paymentoptions" value="Discover" />
                  Discover</td>
                <td align="left" valign="middle"><input type="checkbox" name="paymentoptions[]" id="paymentoptions" value="Other" />
                  Other</td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle"><input type="checkbox" name="paymentoptions[]" id="paymentoptions" value="Cash" />
                  Cash</td>
                <td align="left" valign="middle"><input type="checkbox" name="paymentoptions[]" id="paymentoptions" value="Financing" />
                  Financing</td>
                <td align="left" valign="middle"><input type="checkbox" name="paymentoptions[]" id="paymentoptions" value="Traveler's Check" />
                  Traveler's Check</td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle"><input type="checkbox" name="paymentoptions[]" id="paymentoptions" value="Check" />
                  Check</td>
                <td align="left" valign="middle"><input type="checkbox" name="paymentoptions[]" id="paymentoptions" value="Invoice" />
                  Invoice</td>
                <td align="left" valign="middle"><input type="checkbox" name="paymentoptions[]" id="paymentoptions" value="Visa" />
                  Visa</td>
              </tr>
            </table></td>
            </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="19" align="left" valign="middle" class="txt">&nbsp;</td>
            <td height="19" align="left" valign="middle">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="30" colspan="2" align="left" valign="middle" class="txt" bgcolor="#e9f9ff"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="7%" height="30" align="center" valign="middle"><img src="images/down.png" width="9" height="5" /></td>
                <td width="93%" height="30" align="left" valign="middle" class="titxt">Photo</td>
              </tr>
            </table></td>
            </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="19" colspan="2" align="left" valign="middle" class="txt">&nbsp;</td>
            </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="40" colspan="2" align="left" valign="middle" class="txt"><label>
              <input type="file" name="photopath1" id="photopath1" />
            </label></td>
          </tr>
		  <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="40" colspan="2" align="left" valign="middle" class="txt"><label>
              <input type="file" name="photopath2" id="photopath2" />
            </label></td>
          </tr>
		  <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="40" colspan="2" align="left" valign="middle" class="txt"><label>
              <input type="file" name="photopath3" id="photopath3" />
            </label></td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="19" align="left" valign="middle" class="txt">&nbsp;</td>
            <td height="19" align="left" valign="middle">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="30" colspan="2" align="left" valign="middle" class="txt" bgcolor="#e9f9ff"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="7%" height="30" align="center" valign="middle"><img src="images/down.png" width="9" height="5" /></td>
                <td width="93%" height="30" align="left" valign="middle" class="titxt">Videos</td>
              </tr>
            </table></td>
            </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="19" align="left" valign="middle" class="txt">&nbsp;</td>
            <td height="19" align="left" valign="middle">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="40" colspan="2" align="left" valign="middle" class="txt"><input type="text" name="videopath1" id="videopath1" /></td>
            </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="19" colspan="2" align="left" valign="middle" class="txt">Example:http://youtube.com/watch?v=dFtfxv1JdXI</td>
            </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="19" align="left" valign="middle" class="txt">&nbsp;</td>
            <td height="19" align="left" valign="middle">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="30" colspan="2" align="left" valign="middle" class="txt" bgcolor="#e9f9ff"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="7%" height="30" align="center" valign="middle"><img src="images/down.png" width="9" height="5" /></td>
                <td width="93%" height="30" align="left" valign="middle" class="titxt"> Additional Details</td>
              </tr>
            </table></td>
            </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="19" colspan="2" align="left" valign="middle" class="txt">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="40" align="left" valign="middle" class="txt"><strong>Tags: </strong></td>
            <td height="19" align="left" valign="middle"><span class="txt">
              <input class="inputs" type="text" name="tags" id="tags"/>
            </span></td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="19" align="left" valign="middle" class="txt">&nbsp;</td>
            <td height="19" align="left" valign="middle">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td height="40" colspan="2" align="center" valign="middle" class="txt">
              <label>
				<input type="hidden" name="actionhid" id="actionhid" value="" />
                <input type="submit" name="postingadd" value="Post Ad" />
                </label>
            </td>
            </tr>
        </table>
		</form>
		</td>
        <td width="50%" align="left" valign="top">&nbsp;</td>
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
    <td align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <?php include 'include/footer.php'; ?>