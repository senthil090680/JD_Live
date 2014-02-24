<?php require_once 'include/header.php';
error_reporting(E_ALL ^ E_NOTICE);

if(isset($_REQUEST['action_ratingdone']) && $_REQUEST['action_ratingdone'] != '' && $_REQUEST['action_ratingdone'] == 'actionratingdone' && isset($_REQUEST)) {
	extract($_REQUEST);

	$rater_name					=       mysql_real_escape_string($rater_name);
	$rater_mobile				=       mysql_real_escape_string($rater_mobile);		
	$rater_email				=       mysql_real_escape_string($rater_email);
	$rater_review				=       mysql_real_escape_string(nl2br($rater_review));

	$post_id			=       base64_decode($post_data); //Comment this when testing

	$insertVar			=		'rater_post_id,rater_name,rater_mobile,rater_email,rater_review,rater_point,rater_point_place,rater_status,createdDate';

	$insertValue		=		"'$post_id','$rater_name','$rater_mobile','$rater_email','$rater_review','$rating_data_train','$rating_data_place',1,NOW()";

	$rowId				=		SingleTon::insertQuery($insertVar,$insertValue,TABLE_USERRATING,TRUE);  //RETURNS ROW ID IF SUCCESS

	$conWhere			=		" WHERE post_id = $post_id";
	$result				=		SingleTon::selectQuery("rate_poor,rate_good,rate_average,rate_verygood,rate_excellent,rate_poor_place,rate_good_place,rate_average_place,rate_verygood_place,rate_excellent_place","$conWhere",TABLE_POST,MY_ASSOC,NOR_NO);	

	$rateArray			=		$result;

	//pre($rateArray);

	$count				=		0;

	if($rating_data_train == 1) {
		$db_count		=	$rateArray[0][rate_poor];			
		if(is_null($rateArray[0][rate_poor])) {
			$count		=	1;
		} else {
			$count		=	$db_count+1;
		}

		$updateVarValue		=	"rate_poor=$count";
	} else if($rating_data_train == 2) {
		$db_count		=	$rateArray[0][rate_good];			
		if(is_null($rateArray[0][rate_good])) {
			$count		=	1;
		} else {
			$count		=	$db_count+1;
		}

		$updateVarValue		=	"rate_good=$count";

	} elseif($rating_data_train == 3) {
		$db_count		=	$rateArray[0][rate_average];			
		if(is_null($rateArray[0][rate_average])) {
			$count		=	1;
		} else {
			$count		=	$db_count+1;
		}

		$updateVarValue		=	"rate_average=$count";

	} elseif($rating_data_train == 4) {
		$db_count		=	$rateArray[0][rate_verygood];			
		if(is_null($rateArray[0][rate_verygood])) {
			$count		=	1;
		} else {
			$count		=	$db_count+1;
		}

		$updateVarValue		=	"rate_verygood=$count";
	} elseif($rating_data_train == 5) {
		$db_count		=	$rateArray[0][rate_excellent];			
		if(is_null($rateArray[0][rate_excellent])) {
			$count		=	1;
		} else {
			$count		=	$db_count+1;
		}

		$updateVarValue	=	"rate_excellent=$count";
	}

	$count_place				=		0;

	if($rating_data_place == 6) {
		$db_count_place		=	$rateArray[0][rate_poor_place];			
		if(is_null($rateArray[0][rate_poor_place])) {
			$count_place		=	1;
		} else {
			$count_place		=	$db_count_place+1;
		}

		$updateVarValue_place		=	"rate_poor_place=$count_place";
	} else if($rating_data_place == 7) {
		$db_count_place		=	$rateArray[0][rate_good_place];			
		if(is_null($rateArray[0][rate_good_place])) {
			$count_place		=	1;
		} else {
			$count_place		=	$db_count_place+1;
		}

		$updateVarValue_place		=	"rate_good_place=$count_place";

	} elseif($rating_data_place == 8) {
		$db_count_place		=	$rateArray[0][rate_average_place];			
		if(is_null($rateArray[0][rate_average_place])) {
			$count_place		=	1;
		} else {
			$count_place		=	$db_count_place+1;
		}

		$updateVarValue_place		=	"rate_average_place=$count_place";

	} elseif($rating_data_place == 9) {
		$db_count_place		=	$rateArray[0][rate_verygood_place];			
		if(is_null($rateArray[0][rate_verygood_place])) {
			$count_place		=	1;
		} else {
			$count_place		=	$db_count_place+1;
		}

		echo $updateVarValue_place		=	"rate_verygood_place=$count_place";
	} elseif($rating_data_place == 10) {
		$db_count_place		=	$rateArray[0][rate_excellent_place];			
		if(is_null($rateArray[0][rate_excellent_place])) {
			$count_place		=	1;
		} else {
			$count_place		=	$db_count_place+1;
		}

		$updateVarValue_place	=	"rate_excellent_place=$count_place";
	}

	$updateVarValueBoth		=	$updateVarValue.",".$updateVarValue_place;
	
	$updateCond			=		"post_id = $post_id";				// FOR LIVE

	//$updateCond		=		"1 = 1";							// FOR TESTING ONLY

	$noofrows		=		SingleTon::updateQuery($updateVarValueBoth,$updateCond,TABLE_POST,TRUE);   //RETURNS NO OF ROWS AFFECTED IF SUCCESS

	redirect('index.php');

	//pre($resultArray);

}

if(isset($_REQUEST['action_rating']) && $_REQUEST['action_rating'] != '' && $_REQUEST['action_rating'] == 'actionrating' && isset($_REQUEST)) {
	extract($_REQUEST);
	
	$post_id			=       base64_decode($post_data); //Comment this when testing

	$conWhere			=		" WHERE post_id = '$post_id'";
	$result				=		SingleTon::selectQuery("countryname,companyname,stradd,citytown,postalcode,mainphone,mobilephone, emailadd,websitename,descrip,categ,servicearea,hoomonon,hoomonout,hoomonoff,hootueon,hootueout,hootueoff,hoowedon,hoowedout, hoowedoff,hoothuon,hoothuout,hoothuoff,hoofrion,hoofriout,hoofrioff,hoosaton,hoosatout,hoosatoff,hoosunon,hoosunout,hoosunoff, paymentoptions,photopath1,photopath2,photopath3,videopath1,tags,poststatus,insertedDate,modifiedDate","$conWhere",TABLE_POST,MY_ASSOC,NOR_YES);	
	$noOfRows				=	$result[0];
	$resultArray			=	$result[1];

	//pre($resultArray);

}
?>
<!-- <script type="text/javascript" src="js/common.js"></script> -->

<script type="text/javascript">
$.validator.setDefaults({
	submitHandler: function() { 
		$('#action_ratingdone').val('actionratingdone');
		$("#rate_form").submit();
		//alert("submitted!"); 
		}
});

$().ready(function() {

	$.validator.addMethod("raternam",function(value, element, raterna) {
			var check = false;
			return this.optional(element) || raterna.test(value);
		},"<br>Only Alphabets!."
	);

	// validate signup form on keyup and submit
	$("#rate_form").validate({
		rules: {		
			post_data: { 
				required: true
			},
			rating_data_train: "required",
			rating_data_place: {
				required : true
			},
			rater_name: {
				required:true,
				raternam : /^[a-zA-Z ]+$/
			},
			rater_mobile: {
				required:true,
				number:true,
				minlength: 10
			},
			rater_email: {
				required: false,
				email: true
			}
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
		},
		messages: {
			post_data: {			
				required: "<br/>Invalid Access, Please try again!",
				/*minlength: jQuery.format("Enter at least 2 characters")*/						
			},
			rating_data_train: "<br/>Rate Training!",
			rating_data_place: {
					required: "<br/>Rate Placement!",
			},
			rater_name: {
				required : "<br>* Required Field"
			},
			rater_mobile: {
				required:"<br>* Required Field",
				number:	"<br>Mobile Should be Numeric",
				minlength:	"<br>Mobile Should be a 10-Digit number",
			},
			rater_email: {
				required: "<br>* Required Field",
				email : "<br>Enter valid email address",
			}			
		}
	});	
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

<link rel="stylesheet" type="text/css" href="css/rating.css" />
<script type="text/javascript" language="javascript" src="js/common.js"></script>
<script type="text/javascript" language="javascript" src="js/ratingscript.js"></script>
<script type="text/javascript" language="javascript" src="js/ratingscript_place.js"></script>
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
    <td align="left" valign="top" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="70%" align="left" valign="top" bgcolor="#dbeaf9">
		
		<form name='rate_form' id='rate_form' method='post' action=''>
		<!-- <form name='rate_form' id='rate_form' method='post' action='' onSubmit='return rate_validate();'> -->
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="1%" height="30" align="left" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="2%" align="left" valign="middle" class="titxt">&nbsp;</td>
            <td width="94%" align="left" valign="middle" class="titxt">Ratings - <?php echo $resultArray[0][companyname]; ?> </td>
            <td width="3%" align="left" valign="middle" class="titxt">&nbsp;</td>
          </tr>
          <tr>
            <td height="19" align="left" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="left" valign="middle" bgcolor="#FFFFFF" class="titxt">&nbsp;</td>
            <td align="left" valign="middle" bgcolor="#FFFFFF" class="titxt">&nbsp;</td>
            <td align="left" valign="middle" bgcolor="#FFFFFF" class="titxt">&nbsp;</td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="3" align="left" valign="middle" bgcolor="#FFFFFF" class="titxt">						
			<!-- <div id="dbg">dfs</div> -->			
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				
				<tr>
				
				<td>Training</td>
				<td>Placement</td>
				</tr>
				
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				</tr>
<tr>
<td>
			<div id="rateMe_train" class='dbg' title="Rate Me...">

				<input type='hidden' name="post_data" id="post_data" value='<?php echo $post_data; ?>' />
				<input type='hidden' name="rating_data_train" id="rating_data_train" value='' />
				<input type='hidden' name="action_ratingdone" id="action_ratingdone" value='' />
				 <a onclick="rateIt(this,'train')" id="1" title="Poor" onmouseover="rating(this,'train')" onmouseout="off(this,'train')"></a>
				 <a onclick="rateIt(this,'train')" id="2" title="Not Bad" onmouseover="rating(this,'train')" onmouseout="off(this,'train')"></a>
				 <a onclick="rateIt(this,'train')" id="3" title="Good" onmouseover="rating(this,'train')" onmouseout="off(this,'train')"></a>
				 <a onclick="rateIt(this,'train')" id="4" title="Pretty Good" onmouseover="rating(this,'train')" onmouseout="off(this,'train')"></a>
				 <a onclick="rateIt(this,'train')" id="5" title="Excellent" onmouseover="rating(this,'train')" onmouseout="off(this,'train')"></a>

				 <span id="rateStatus_train">Rate Me...</span>
				 <span id="ratingSaved_train">Rating Saved!</span>
				 </div>
</td>
 <td>
 			<div id="rateMe_place" class='dbg' title="Rate Me...">

				<input type='hidden' name="rating_data_place" id="rating_data_place" value='' />
				 <a onclick="rateIt_place(this,'place')" id="6" title="Poor" onmouseover="rating_place(this,'place')" onmouseout="off_place(this,'place')"></a>
				 <a onclick="rateIt_place(this,'place')" id="7" title="Not Bad" onmouseover="rating_place(this,'place')" onmouseout="off_place(this,'place')"></a>
				 <a onclick="rateIt_place(this,'place')" id="8" title="Good" onmouseover="rating_place(this,'place')" onmouseout="off_place(this,'place')"></a>
				 <a onclick="rateIt_place(this,'place')" id="9" title="Pretty Good" onmouseover="rating_place(this,'place')" onmouseout="off_place(this,'place')"></a>
				 <a onclick="rateIt_place(this,'place')" id="10" title="Excellent" onmouseover="rating_place(this,'place')" onmouseout="off_place(this,'place')"></a>

				 <span id="rateStatus_place">Rate Me...</span>
				 <span id="ratingSaved_place">Rating Saved!</span>
				</div>
</td>
</tr>
</table>			
			 <!-- </div> -->
			</td>
            </tr>
          <tr>
            <td height="19" align="left" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="3" align="left" valign="middle" bgcolor="#FFFFFF" class="titxt">&nbsp;</td>
            </tr>
          <tr>
            <td height="30" align="left" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="3" align="left" valign="middle" bgcolor="#FFFFFF" class="titxt"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="26%" height="40" align="left" valign="middle" class="txt">Name<span class="style2">*</span></td>
                <td width="74%" height="30" align="left" valign="middle"><span class="txt">
                  <input class="fpsinput" type="text" name="rater_name" id="rater_name" maxLength='100'/>
                </span></td>
              </tr>
              <tr>
                <td height="40" align="left" valign="middle" class="txt">Mobile No<span class="style2">* </span></td>
                <td height="30" align="left" valign="middle"><span class="txt">
                  <input class="fpsinput" type="text" name="rater_mobile" id="rater_mobile" maxLength='10'/>
                </span></td>
              </tr>
              <tr>
                <td height="40" align="left" valign="middle" class="txt">Email Id </td>
                <td height="30" align="left" valign="middle"><span class="txt">
                  <input class="fpsinput" type="text" name="rater_email" id="rater_email" maxLength='50'/>
                </span></td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="txt">Review</td>
                <td height="30" align="left" valign="middle"><span class="txt">
                  <textarea class="pfinputs" name="rater_review" id="rater_review" maxLength='1000'></textarea>
                </span></td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="txt">&nbsp;</td>
                <td height="18" align="left" valign="middle">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="txt"><span class="style2">* </span>Denotes Mandatory</td>
                <td height="30" align="left" valign="middle"><input type='image' src="images/sub.png" width="107" height="32" /> <a href="javascript:void(0);" onclick="backtoSearchInvi('<?php echo basename($_SERVER[HTTP_REFERER]); ?>');" ><img src="images/back.png" width="107" height="32" border="0" /></a></td>
              </tr>
            </table></td>
            </tr>
        </table>
		</form>
		<form name="backpage" id="backpage" method="post" action="<?php $returnpage = basename($_SERVER[HTTP_REFERER]); echo basename($_SERVER[HTTP_REFERER]); ?>">
			<?php if($returnpage == 'search_institute.php') { ?>
			<input type='hidden' name="post_data" id="post_data" value='<?php echo $post_data; ?>' />
			<input type='hidden' name="action_indiv" id="action_indiv" value='' />
			<input type="hidden" id="keyword_indiv" name="keyword_indiv" value="<?php echo ($keyword_indiv); ?>"/>
			<?php } elseif($returnpage == 'search.php') { ?>
			<input type='hidden' name="companyname" id="companyname" value='<?php echo $keyword_indiv; ?>' />
			<input type='hidden' name="citytown" id="citytown" value='<?php echo $citytown; ?>' />
			<input type='hidden' name="action_search" id="action_search" value='' />
			<?php } ?>
		</form>
		</td>
        <td width="32%" align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
    </table></td>
  </tr>

  <tr>
    <td align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
<?php require_once 'include/footer.php'; ?>