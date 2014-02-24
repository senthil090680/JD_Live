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
	$mainphone					=       mysql_real_escape_string($mainphone);
	$mobilephone				=       mysql_real_escape_string($mobilephone);		
	$emailadd					=       mysql_real_escape_string($emailadd);
	$websitename				=       mysql_real_escape_string($websitename);
	$descrip					=       mysql_real_escape_string(nl2br($descrip));
	$categ						=       mysql_real_escape_string($categ);

	$selectCount	=	"SELECT post_id FROM ".TABLE_POST." WHERE emailadd='$emailadd'";
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

	if($_FILES['videopath1']['name'] != '') {
		$video_name1=$_FILES['videopath1']['name'];
		$video_size1=$_FILES['videopath1']['size'];
		$video_type1=$_FILES['videopath1']['type'];
		$video_tmp1=$_FILES['videopath1']['tmp_name'];

		$video_complete_name1		=		str_replace(" ",'',basename($video_name1));
		$ran1						=		rand () ;
		$video_target1				=		VIDEO_PATH1.$ran1.'_'.$video_complete_name1;
		move_uploaded_file($video_tmp1,$video_target1);
	}

	if($num > 0) { 	
	}
	else {
		$queryInsert	=	"INSERT INTO ".TABLE_POST." (countryname,companyname,stradd,citytown,postalcode,mainphone,mobilephone, emailadd,websitename,descrip,categ,hoomonon,hoomonout,hoomonoff,hootueon,hootueout,hootueoff,hoowedon,hoowedout, hoowedoff,hoothuon,hoothuout,hoothuoff,hoofrion,hoofriout,hoofrioff,hoosaton,hoosatout,hoosatoff,hoosunon,hoosunout,hoosunoff, paymentoptions,photopath1,photopath2,photopath3,videopath1,tags,poststatus,insertedDate) VALUES ('$countryname','$companyname','$stradd','$citytown','$postalcode','$mainphone','$mobilephone','$emailadd','$websitename','$descrip','$categ','$hoomonon','$hoomonout','$hoomonoff','$hootueon','$hootueout','$hootueoff','$hoowedon','$hoowedout','$hoowedoff','$hoothuon','$hoothuout','$hoothuoff','$hoofrion','$hoofriout','$hoofrioff','$hoosaton','$hoosatout','$hoosatoff','$hoosunon','$hoosunout','$hoosunoff','$paymentoptionstr','$thumb_target','$thumb_target1','$thumb_target2','$video_target1','$tags',1,NOW())";
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

<script type="text/javascript">
$.validator.setDefaults({
	submitHandler: function() { alert("submitted!"); }
});

$().ready(function() {

	
	// validate signup form on keyup and submit
	$("#postadd").validate({
		rules: {
			companyname: { required: true,
			},
			stradd: "required",
			citytown: "required",
			postalcode: {
				required:true,
				number:true,
				minLength: 6
			},
			mainphone: "required",					
			emailadd: {
				required: true,
				email: true
			},			
			categ: "required",
			hoomonon: "required",
			hoomonout: "required",
			hootueon: "required",
			hootueout: "required",
			hoowedon: "required",
			hoowedout: "required",
			hoothuon: "required",
			hoothuout: "required",
			hoofrion: "required",
			hoofriout: "required",
			hoosaton: "required",
			hoosatout: "required",
			hoosunon: "required",
			hoosunout: "required",
			
			agree: "required"
		},		
		messages: {
			companyname: {			
				required: "Please enter your Company Name",
				/*minlength: jQuery.format("Enter at least 2 characters")*/						
			},
			stradd: "Please enter your Street Address",
			citytown:"Please select your City",
			postalcode: {
				required:"Postal Code cannot be empty",
				number:	"Postal Code Should be numeric",
				minLength:	"Postal Code Should be a 6-Digit number",
			},
			mainphone:"Please enter your Phone Number",							
			emailadd: {
				required: "Please enter email address",
				email : "Please enter a valid email address",
			},
			categ: "Please enter a your Category",
			hoomonon: "Choose your Time",
			hoomonout: "Choose your Time",
			hootueon: "Choose your Time",
			hootueout: "Choose your Time",
			hoowedon: "Choose your Time",
			hoowedout: "Choose your Time",
			hoothuon: "Choose your Time",
			hoothuout: "Choose your Time",
			hoofrion: "Choose your Time",
			hoofriout: "Choose your Time",
			hoosaton: "Choose your Time",
			hoosatout: "Choose your Time",
			hoosunon: "Choose your Time",
			hoosunout: "Choose your Time",
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
		<form  id="postadd" method="post" action="" enctype='multipart/form-data'>
		<!-- <form id="postadd" name="postadd" method="post" action="" enctype='multipart/form-data' > -->
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
            <td width="38%" align="left" valign="middle">&nbsp;</td>
            <td width="59%" align="left" valign="middle">&nbsp;</td>
          </tr>

		  <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td colspan="2" align="left" valign="middle" nowrap="nowrap" class='msgdisplay' <?php if(isset($msg) && $msg != '') { ?> <?php } ?> ><?php if(isset($msg) && $msg != '') { echo $msg; } ?></td>
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
              <input type="text" name="countryname" id="countryname" readonly value="India" class="fpsinput"  />
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
            <td height="40" align="left" valign="middle" class="txt">City/Town: <span id="city_required">*</span></td>
            <td height="30" align="left" valign="middle"><span class="txt">

				<select class="fpinput" name="citytown" id="citytown">
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
            <td height="40" align="left" valign="top" class="txt">Description:</td>
            <td height="30" align="left" valign="middle"><span class="txt">
              <textarea name="descrip" rows="8" class="pfinputs" id="descrip"></textarea>
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
                <td width="10%" height="30" align="left" valign="middle">Mon : </td>
                <td width="32%" align="left" valign="middle"><select class="timinput" name="hoomonon" id="hoomonon">
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
                </select></td>
                <td width="6%" align="left" valign="middle">-</td>
                <td width="31%" align="left" valign="middle"><select class="timinput" name="hoomonout" id="hoomonout">
                <option value=''>--------Time--------</option>
				<?php	
				foreach($clockArray as $clockVal) {
				?>
				  <option value='<?php echo $clockVal[time_clock]; ?>'><?php echo $clockVal[time_clock]; ?></option>
				<?php } ?>

                </select></td>
                <td width="21%" height="40" align="left" valign="middle" class="txt"><label>
                  <input type="checkbox" name="hoomonoff" id="hoomonoff" value="Closed" />
                </label>
                  Closed</td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle">Tue : </td>
                <td align="left" valign="middle"><select class="timinput" name="hootueon" id="hootueon">
				<option value=''>--------Time--------</option>
                <?php	
				foreach($clockArray as $clockVal) {
				?>
				  <option value='<?php echo $clockVal[time_clock]; ?>'><?php echo $clockVal[time_clock]; ?></option>
				<?php } ?>

                </select></td>
                <td align="left" valign="middle">-</td>
                <td align="left" valign="middle"><select class="timinput" name="hootueout" id="hootueout">
                <option value=''>--------Time--------</option>
				<?php	
				foreach($clockArray as $clockVal) {
				?>
				  <option value='<?php echo $clockVal[time_clock]; ?>'><?php echo $clockVal[time_clock]; ?></option>
				<?php } ?>
                </select></td>
                <td height="40" align="left" valign="middle" class="txt"><input type="checkbox" name="hootueoff" id="hootueoff" value="Closed" /> 
                  Closed </td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle">Wed : </td>
                <td align="left" valign="middle"><select class="timinput" name="hoowedon" id="hoowedon">
                <option value=''>--------Time--------</option>
				<?php	
				foreach($clockArray as $clockVal) {
				?>
				  <option value='<?php echo $clockVal[time_clock]; ?>'><?php echo $clockVal[time_clock]; ?></option>
				<?php } ?>
				  </select></td>
                <td align="left" valign="middle">-</td>
                <td align="left" valign="middle"><select class="timinput" name="hoowedout" id="hoowedout">
                <option value=''>--------Time--------</option>
				<?php	
				foreach($clockArray as $clockVal) {
				?>
				  <option value='<?php echo $clockVal[time_clock]; ?>'><?php echo $clockVal[time_clock]; ?></option>
				<?php } ?>
                </select></td>
                <td height="40" align="left" valign="middle" class="txt"><input type="checkbox" name="hoowedoff" id="hoowedoff" value="Closed" />
                  Closed </td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle">Thu : </td>
                <td align="left" valign="middle"><select class="timinput" name="hoothuon" id="hoothuon">
                <option value=''>--------Time--------</option>
				<?php	
				foreach($clockArray as $clockVal) {
				?>
				  <option value='<?php echo $clockVal[time_clock]; ?>'><?php echo $clockVal[time_clock]; ?></option>
				<?php } ?>
                </select></td>
                <td align="left" valign="middle">-</td>
                <td align="left" valign="middle"><select class="timinput" name="hoothuout" id="hoothuout">
                <option value=''>--------Time--------</option>
				<?php	
				foreach($clockArray as $clockVal) {
				?>
				  <option value='<?php echo $clockVal[time_clock]; ?>'><?php echo $clockVal[time_clock]; ?></option>
				<?php } ?>
                </select></td>
                <td height="40" align="left" valign="middle" class="txt"><input type="checkbox" name="hoothuoff" id="hoothuoff" value="Closed" />
                  Closed</td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle">Fri : </td>
                <td align="left" valign="middle"><select class="timinput" name="hoofrion" id="hoofrion">
                <option value=''>--------Time--------</option>
				<?php	
				foreach($clockArray as $clockVal) {
				?>
				  <option value='<?php echo $clockVal[time_clock]; ?>'><?php echo $clockVal[time_clock]; ?></option>
				<?php } ?>
                </select></td>
                <td align="left" valign="middle">-</td>
                <td align="left" valign="middle"><select class="timinput" name="hoofriout" id="hoofriout">
                <option value=''>--------Time--------</option>
				<?php	
				foreach($clockArray as $clockVal) {
				?>
				  <option value='<?php echo $clockVal[time_clock]; ?>'><?php echo $clockVal[time_clock]; ?></option>
				<?php } ?>
                </select></td>
                <td height="40" align="left" valign="middle" class="txt"><input type="checkbox" name="hoofrioff" id="hoofrioff" value="Closed" /> 
                  Closed </td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle">Sat : </td>
                <td align="left" valign="middle"><select class="timinput" name="hoosaton" id="hoosaton">
                <option value=''>--------Time--------</option>
				<?php	
				foreach($clockArray as $clockVal) {
				?>
				  <option value='<?php echo $clockVal[time_clock]; ?>'><?php echo $clockVal[time_clock]; ?></option>
				<?php } ?>
                </select></td>
                <td align="left" valign="middle">-</td>
                <td align="left" valign="middle"><select class="timinput" name="hoosatout" id="hoosatout">
                <option value=''>--------Time--------</option>
				<?php	
				foreach($clockArray as $clockVal) {
				?>
				  <option value='<?php echo $clockVal[time_clock]; ?>'><?php echo $clockVal[time_clock]; ?></option>
				<?php } ?>
                </select></td>
                <td height="40" align="left" valign="middle" class="txt"><input type="checkbox" name="hoosatoff" id="hoosatoff" value="Closed" />
                  Closed </td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle">Sun : </td>
                <td align="left" valign="middle"><select class="timinput" name="hoosunon" id="hoosunon">
                <option value=''>--------Time--------</option>
				<?php	
				foreach($clockArray as $clockVal) {
				?>
				  <option value='<?php echo $clockVal[time_clock]; ?>'><?php echo $clockVal[time_clock]; ?></option>
				<?php } ?>
                </select></td>
                <td align="left" valign="middle">-</td>
                <td align="left" valign="middle"><select class="timinput" name="hoosunout" id="hoosunout">
                <option value=''>--------Time--------</option>
				<?php	
				foreach($clockArray as $clockVal) {
				?>
				  <option value='<?php echo $clockVal[time_clock]; ?>'><?php echo $clockVal[time_clock]; ?></option>
				<?php } ?>
                </select></td>
                <td height="40" align="left" valign="middle" class="txt"><input type="checkbox" name="hoosunoff" id="hoosunoff" value="Closed" />
                Closed</td>
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
            <td height="19" colspan="2" align="left" valign="middle" class="txt">Example: Keywords : CCNA, MCITP, VMWARE, JAVA </td>
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
                </label>            </td>
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