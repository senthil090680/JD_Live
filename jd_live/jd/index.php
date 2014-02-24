<?php require_once 'include/header.php'; 
error_reporting(E_ALL & ~E_NOTICE);

//echo pre($_REQUEST);
//echo pre($_FILES);
	
//exit(0);

if(isset($_REQUEST['action_course']) && $_REQUEST['action_course'] != '' && $_REQUEST['action_course'] == 'actioncourse' && isset($_REQUEST)) {
	extract($_REQUEST);
	
	$contact_name				=       mysql_real_escape_string($contact_name);
	$mobile_num					=       mysql_real_escape_string($mobile_num);		
	$email_id					=       mysql_real_escape_string($email_id);
	$course						=       mysql_real_escape_string($course);
	$expect_info				=       mysql_real_escape_string(nl2br($expect_info));

	$insertVar					=		'contact_name,city,mobile_num,email_id,course,expect_info,contact_status,createdDate';

	$insertValue				=		"'$contact_name','$city','$mobile_num','$email_id','$course','$expect_info',1,NOW()";

	$rowId		=	SingleTon::insertQuery($insertVar,$insertValue,TABLE_CONTACT,TRUE);  //RETURNS ROW ID IF SUCCESS

	if($rowId) {
		
		$argFromEmailAddress			=	EMAIL_ADMIN_SENDER;
		$argToEmailAddress				=	$email_id;
		$argReplyToEmailAddress			=	EMAIL_ADMIN_SENDER;
		$argSubject						=	"Looking for this Course Details -". $course;
		$argMessage						=	$expect_info;

		$argUserSubject					=	"Course Details Enquiry  -". $course;
		$argUserMessage					=	"You will be contacted regarding this course detail - $course soon "; 

		$argFromEmailAddress			=	preg_replace("/\n/", "", $argFromEmailAddress);
		$argReplyToEmailAddress			=	preg_replace("/\n/", "", $argReplyToEmailAddress);
		$funheaders						.=	"MIME-Version: 1.0\n";
		$funheaders						.=	"Content-type: text/html\n";
		$funheaders						.=	"From: ".$argFromEmailAddress."\n";
		$funheaders						.=	"Reply-To: ".$argReplyToEmailAddress."\n";
		$funheaders						.=	"Return-Path: " .EMAIL_ADMIN_SENDER." \n";
		$funheaders						.=	"Sender: " .EMAIL_ADMIN_SENDER." \n";
		$argheaders						=	$funheaders;
		$argToEmailAddress				=	preg_replace("/\n/", "", $argToEmailAddress);

		if (mail($argToEmailAddress, $argUserSubject, $argUserMessage, $argheaders)) { $msg_contact	=	"Request Sent successfully"; }//if
		
		$argFromEmailAddress			=	EMAIL_ADMIN_SENDER;
		$argReplyToEmailAddress			=	EMAIL_ADMIN_SENDER;

		$argToEmailAddress				=	EMAIL_ADMIN_RECEIVER;  // REMOVE THE COMMENT LINE FOR MAKING LIVE
		//$argToEmailAddress			=	$email_id;             // FOR TESTING ONLY

		$argAdminFromEmailAddress		=	preg_replace("/\n/", "", $argFromEmailAddress);
		$argAdminReplyToEmailAddress	=	preg_replace("/\n/", "", $argReplyToEmailAddress);
		$funheadersAdmin				.=	"MIME-Version: 1.0\n";
		$funheadersAdmin				.=	"Content-type: text/html\n";
		$funheadersAdmin				.=	"From: " .$argAdminFromEmailAddress."\n";
		$funheadersAdmin				.=	"Reply-To: ".$argAdminReplyToEmailAddress."\n";
		$funheadersAdmin				.=	"Return-Path: " .EMAIL_ADMIN_SENDER."\n";
		$funheadersAdmin				.=	"Sender: " .EMAIL_ADMIN_SENDER."\n";
		$argheadersAdmin				=	$funheadersAdmin;
		$argToEmailAddress				=	preg_replace("/\n/", "", $argToEmailAddress);
		
		//echo $argToEmailAddress."<br>".$argSubject."<br>".$argMessage."<br>".$argheadersAdmin;
		if (mail($argToEmailAddress, $argSubject, $argMessage, $argheadersAdmin)) { $msg_contact	=	"Request Sent successfully"; }//if
	}
	else {
		$msg_contact	=	"Request Not Sent, Try Again";
	}
}

?>
<script type="text/javascript">
/*$.validator.setDefaults({
	$('#searchsubmit').click(function(e){
		//alert("submitted!");
		alert('helo');
		$('#action_search').val('actionsearch');
		$("#searchad").submit();
	});

	$('#contactsubmit').click(function(e){
		//alert("submitted!"); 
		$('#action_course').val('actioncourse');
		$("#contactinput").submit();
	});
});*/

$.validator.setDefaults({
	submitHandler: function() { 
		//alert("submitted!"); 
		$('#action_course').val('actioncourse');
		$("#contactinput").submit();
	}
});

$().ready(function() {
	// validate signup form on keyup and submit

	$.validator.addMethod(
		"regex",
		function(value, element, regexp) {
			var check = false;
			return this.optional(element) || regexp.test(value);
		},
		"<br>Only Alphabets."
	);


	$("#contactinput").validate({
		rules: {
			contact_name: {
				required	:	true,
				regex : /^[a-zA-Z]+$/
			},
			city: "required",
			mobile_num: {
				required: true,
				number:true,
				minlength:  10
			},
			email_id: {
				required: true,
				email	: true
			},			
			course: "required",
			
			expect_info: "required",
			
			agree: "required"
		},
		messages: {
			contact_name: {
				required : "<br>* Field Required",
			},
			city: "<br>* Field Required",
			mobile_num: {
				required:"<br>* Field Required",
				number:"<br>Mobile Phone Should be numeric",
				minlength : "<br>Mobile Phone Should be a 10-Digit number"
			},
			email_id: {
					required:"<br>* Field Required",
					email:"<br>Enter a valid email address"
			},
			course: "<br>* Field Required",
			expect_info: "<br>* Field Required",			
		}
	});
	
	/*$("#searchad").validate({
		rules: {
			citytown: {
				required:true
			},
			companyname: {
				required:true
			}
		},
		messages: {
			citytown: {
				required : "<br>* Field Required",
			},
			companyname: { 
				required: "<br>* Field Required",
			}
		}
	});*/

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
<script type="text/javascript" src="js/common.js"></script>
  <tr>
    <td align="center" valign="top"><img src="images/topimg.png" width="985" height="48" border="0" usemap="#Map" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#FFFFFF" class="bgline">
	<form id="searchad" name="searchad" method="post" action="search.php" onSubmit='return validate_search()'>
	<!-- <form id="searchad" name="searchad" method="post" action="search.php">  -->
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top">&nbsp;</td>
        <td colspan="2" align="left" valign="middle" class="stxt">Search Training Institutes </td>
        <td height="40" align="left" valign="middle">&nbsp;</td>
        <td align="left" valign="middle">&nbsp;</td>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
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
			<option value='<?php echo $cityVal[city_name]; ?>'><?php echo $cityVal[city_name]; ?></option>
		<?php } ?>				
		</select>
        </label></td>
        <td width="50%" align="left" valign="middle"><label>
          <input type="text" class="input" name="companyname" id="companyname"/>
		  <input type="hidden" name="action_search" id="action_search" value='' />
        </label></td>
        <td width="19%" height="40" align="left" valign="middle">&nbsp;
		
		<!-- <input class="inputs" type="text" name="extrainfo" id="extrainfo" /> -->		</td>
        <td width="12%" align="left" valign="middle">
			<button type="submit" id="searchsubmit" style="border: 0; background: transparent; cursor:hand;cursor:pointer;">
				<img src="images/search.png" width="122" height="29" alt="submit" />			</button>		</td>
        <td width="1%" align="left" valign="top">&nbsp;</td>
      </tr>
    </table>
	</form>
		</td>
  </tr>
  <tr>
    <td align="center" valign="top"><img src="images/line.png" width="985" height="20" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#FFFFFF" class="bgline">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#FFFFFF" class="bgline"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="1%" align="left" valign="top">&nbsp;</td>
        <td width="69%" align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="top">
			
			
			<form id="contactinput" name="contactinput" method="post" action=""> 	
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="middle">&nbsp;</td>
                <td colspan="2" align="left" valign="top" class="titxt">Course Enquiry From Best Training Institutes </td>
                <td align="left" valign="top" class="txt">&nbsp;</td>
                <td align="left" valign="top" class="txt">&nbsp;</td>
              </tr>
              <tr>
                <td width="1%" align="left" valign="middle"><?php if(isset($msg_contact) && $msg_contact != '') { echo $msg_contact; } ?></td>
                <td width="31%" align="left" valign="top" class="txt">&nbsp;</td>
                <td width="28%" align="left" valign="top" class="txt">&nbsp;</td>
                <td width="32%" align="left" valign="top" class="txt">&nbsp;</td>
                <td width="8%" align="left" valign="top" class="txt">&nbsp;</td>
              </tr>

			  <tr>
                <td width="1%" align="left" valign="middle">&nbsp;</td>
                <td width="31%" align="left" valign="top" class="txt">Name</td>
                <td width="28%" align="left" valign="top" class="txt">City</td>
                <td width="32%" align="left" valign="top" class="txt">Mobile Number </td>
                <td width="8%" align="left" valign="top" class="txt">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="middle">&nbsp;</td>
                <td align="left" valign="middle" class="txt"><input class="inputs" type="text" name="contact_name" id="contact_name" maxLength='100' /></td>
                <td align="left" valign="middle" class="txt"><select class="inputst" name="city" id="city">
                  <option value=''>- City -</option>
		<?php foreach($cityArray as $cityVal) {
		?>
			<option value='<?php echo $cityVal[city_name]; ?>'><?php echo $cityVal[city_name]; ?></option>
		<?php } ?>	
                </select></td>
                <td align="left" valign="middle" class="txt"><input class="inputs" type="text" name="mobile_num" id="mobile_num" maxLength='10' /></td>
                <td align="left" valign="middle" class="txt">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="middle">&nbsp;</td>
                <td align="left" valign="middle" class="txt">&nbsp;</td>
                <td align="left" valign="middle" class="txt">&nbsp;</td>
                <td align="left" valign="middle" class="txt">&nbsp;</td>
                <td align="left" valign="middle" class="txt">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="middle">&nbsp;</td>
                <td align="left" valign="top" class="txt">Email Id </td>
                <td align="left" valign="top" class="txt">Course</td>
                <td align="left" valign="top" class="txt">Tell us your expectation...</td>
                <td align="left" valign="top" class="txt">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="middle">&nbsp;</td>
                <td align="left" valign="top" class="txt"><input class="inputs" type="text" name="email_id" id="email_id" maxLength='50' /><input type="hidden" name="action_course" id="action_course" value='' /></td>
                <td align="left" valign="top" class="txt"><select class="inputst" name="course" id="course">
                  <option value=''>- Courses -</option>
                  <option value='CCNA'>CCNA</option>
                  <option value='SECSA'>SECSA</option>
                  <option value='RHCT'>RHCT</option>
                </select></td>
                <td align="left" valign="top" class="txt"><textarea name="expect_info" id="expect_info" class="inputs" maxLength='500' wrap='hard'></textarea></td>
                <td align="left" valign="middle" class="txt"><input type='image' src="images/go.png" width="40" height="40" id="contactsubmit"/></td>
              </tr>
            </table>
			</form></td>
          </tr>
          <tr>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
        </table></td>
        <td width="30%" align="left" valign="top">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
   <tr>
    <td align="center" valign="top"><img src="images/bluebot.png" width="985" height="8" /></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
<?php require_once 'include/footer.php'; ?>