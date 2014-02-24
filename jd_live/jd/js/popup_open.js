function beforeCreateChatBox(keyword_email,chatpostid) {
				
		$(" <div />" ).attr("id","confirmPrivateMessage"+chatpostid).addClass("confirmMessage").html('<div ><p class="closepbox"> <label class="closexbox"><a class="closelink" href="javascript:void(0)" onclick="javascript:return closePrivateConfirm(this,\''+chatpostid+'\');"><b><img border="0" src="images/round_red_close_button.jpg" /></b></a></label></p><p style="font-size:11px;"><br/><br/><table width="100%" height="100%"><tr><td align="center" colspan="2" class="addcolor"><form name="sendform" id="sendform"></td></tr><tr><td align="center" colspan="2" class="addcolor">Send Enquiry by Email</td></tr><tr><td align="center" colspan="2" class="addcolor">Enter the details below and click on SEND</td></tr><tr><td align="center" colspan="2" class="addcolor"><span id="errormsg" class="redcolor"></span></td></tr><tr><td class="addcolor">Name&nbsp;&nbsp;*</td><td class="leftpadd"><input type="text" name="username" id="username" value="" /><input type="hidden" name="postid" id="postid" value="'+chatpostid+'" /><input type="hidden" name="keyword_email" id="keyword_email" value="'+keyword_email+'" /></td></tr><tr><td class="addcolor">Mobile&nbsp;&nbsp;*</td><td class="leftpadd"><input type="text" name="usermobile" id="usermobile" value="" maxLength="10"/></td></tr><tr><td align="center" colspan="2" class="addcolor">(Only India Numbers.)</td></tr><tr><td class="addcolor">Email&nbsp;&nbsp;*</td><td class="leftpadd"><input type="text" name="useremail" id="useremail" value=""/></td></tr><tr><td class="addcolor">Message&nbsp;&nbsp;*</td><td class="leftpadd"><textarea name="usermsg" id="usermsg" ></textarea></td></tr><tr><td align="center" colspan="2" class="addcolor"><button name="submitmail" id="submitmail" onclick="return sendmail();">Send</button></td></tr><tr><td align="left" colspan="2" class="addcolor">* Denotes Mandatory Fields</td></tr><tr><td align="center" colspan="2" class="addcolor"></form></td></tr></table></p><div style="clear:both"></div></div><div style="display:block;display:inline;padding-left:20px;padding-right:80px;" ></div>&nbsp;&nbsp;<div style="display:inline;"  ></div>').appendTo($( "body" ));
	
		$('#username').val('');
		$('#usermobile').val('');
		$('#useremail').val('');	
		$('#usermsg').val('');
		$('#errormsg').html('');	
		$("#confirmPrivateMessage"+chatpostid).css("display","block");
		$("#backgroundChatPopup").css({"opacity": "0.7"});
		//$("#backgroundChatPopup").css('display','block');

		/*if ($("#backgroundChatPopup").length > 0){
		  alert('exists');
		} else {
			alert('not exists');
		}*/
		
		$("#backgroundChatPopup").fadeIn("slow");
}
function closePrivateConfirm(abc,postid) {
	$("#backgroundChatPopup").fadeOut("slow");
	$("#confirmPrivateMessage"+postid).css('display','none');
}
function sendmail() {
	//alert(2323);			
	var username = $('#username').val();
	var usermobile = $('#usermobile').val();
	var useremail = $('#useremail').val();
	var usermsg = $('#usermsg').val();
	var postid = $('#postid').val();
	var keyword_email = $('#keyword_email').val();

	if(username == ''){
		$('#errormsg').html('* Required Field');
		$('#username').focus();
		return false;
	} 
	
	if (username != '') {
		var namepattern = /^[a-zA-Z ]+$/;
		if (namepattern.test(username)) {
			//alert(fname.value +" has alphanumeric value");
			//return true;
		} else {
			$('#errormsg').html('Only Alphabets');
			$('#username').focus();
			return false;
		}				
	}
	
	if(usermobile == ''){
		$('#errormsg').html('* Required Field');
		$('#usermobile').focus();
		return false;
	} 

	if(usermobile != '') {
		if(isNaN(usermobile)) {
			$('#errormsg').html('Mobile Phone Should be numeric');
			$('#usermobile').focus();
			return false;
		} else if(usermobile.length < 10) {
			$('#errormsg').html('Mobile Phone Should be a 10-Digit number');
			$('#usermobile').focus();
			return false;
		} 
	} if(useremail == '') {
		$('#errormsg').html('* Required Field');
		$('#useremail').focus();
		return false;
	} 
	if(useremail != '') {				
		var empattern = /^[A-Za-z0-9._%+-]+@([A-Za-z0-9-]+\.)+([A-Za-z0-9]{2,4}|museum)$/;
        if (empattern.test(useremail)) {
        } else {
			$('#errormsg').html(useremail + ' is not valid. Please input valid email!');
			$('#useremail').focus();
			return false;
        }
	}
	
	if(usermsg == '') {
		$('#errormsg').html('* Required Field');
		$('#usermsg').focus();
		return false;
	} 
	if(usermsg != '') {				
		var msgpattern = /^[A-Za-z0-9._%+-, ]+$/;
        if (msgpattern.test(usermsg)) {
        } else {
			$('#errormsg').html('Allowed special characters (._%+-,) and space!');
			$('#usermsg').focus();
			return false;
        }
	}
	//alert('werwe');
	var posturl          =	'sendemail.php';
	var sendemailtouser   =       $.ajax({
		type            :       "POST",
		url             :       posturl,
		data            :       {'username' : username, 'usermobile' : usermobile, 'useremail' : useremail,'postid' : postid,'keyword_email' : keyword_email,'usermsg' : usermsg },
		cache           :       false,
		async           :       false,
		dataType        :       "text"
	}).responseText;
	
	//alert(sendemailtouser);
	if(sendemailtouser == 1) {
		$('#errormsg').html('Mail Sent to the User!');
		return false;
	} else if(sendemailtouser == 2) {
		$('#errormsg').html('There is some problem in sending Mail, Try Again!');
		return false;
	} else if(sendemailtouser == 3) {
		$('#errormsg').html('Problem in the Data you entered, Try Again!');
		return false;
	}
}