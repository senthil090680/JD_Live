function validate_post()
{
	var companyname				=	document.postadd.companyname;
	var stradd					=	document.postadd.stradd;
	var location_area			=	document.postadd.location_area;
	var citytown				=	document.postadd.citytown;
	var postalcode				=	document.postadd.postalcode;
	var mainphone				=	document.postadd.mainphone;
	var mobilephone				=	document.postadd.mobilephone;
	var emailadd				=	document.postadd.emailadd;
	var websitename				=	document.postadd.websitename;
	var descrip					=	document.postadd.descrip;
	var categ					=	document.postadd.categ;
	//var servicearea			=	document.postadd.servicearea;
	var hoomonon				=	document.postadd.hoomonon;
	var hoomonout				=	document.postadd.hoomonout;
	var hoomonoff				=	document.postadd.hoomonoff;
	var hootueon				=	document.postadd.hootueon;
	var hootueout				=	document.postadd.hootueout;
	var hootueoff				=	document.postadd.hootueoff;
	var hoowedon				=	document.postadd.hoowedon;
	var hoowedout				=	document.postadd.hoowedout;
	var hoowedoff				=	document.postadd.hoowedoff;
	var hoothuon				=	document.postadd.hoothuon;
	var hoothuout				=	document.postadd.hoothuout;
	var hoothuoff				=	document.postadd.hoothuoff;
	var hoofrion				=	document.postadd.hoofrion;
	var hoofriout				=	document.postadd.hoofriout;
	var hoofrioff				=	document.postadd.hoofrioff;
	var hoosaton				=	document.postadd.hoosaton;
	var hoosatout				=	document.postadd.hoosatout;
	var hoosatoff				=	document.postadd.hoosatoff;
	var hoosunon				=	document.postadd.hoosunon;
	var hoosunout				=	document.postadd.hoosunout;
	var hoosunoff				=	document.postadd.hoosunoff;
	//var paymentoptions		=	document.postadd.paymentoptions;
	var photopath1				=	document.postadd.photopath1;
	var photopath2				=	document.postadd.photopath2;
	var photopath3				=	document.postadd.photopath3;
	var videopath1				=	document.postadd.videopath1;
	var tags					=	document.postadd.tags;
	var action					=	document.postadd.actionhid;
	action.value				=	'add';

	var companynameval			=	document.postadd.companyname.value;
	var straddval				=	document.postadd.stradd.value;
	var location_areaval			=	document.postadd.location_area.value;
	var citytownval				=	document.postadd.citytown.value;
	var postalcodeval			=	document.postadd.postalcode.value;
	var mainphoneval			=	document.postadd.mainphone.value;
	var mobilephoneval			=	document.postadd.mobilephone.value;
	var emailaddval				=	document.postadd.emailadd.value;
	var websitenameval			=	document.postadd.websitename.value;
	var descripval				=	document.postadd.descrip.value;
	var categval				=	document.postadd.categ.value;
	//var serviceareaval		=	document.postadd.servicearea.value;
	var hoomononval				=	document.postadd.hoomonon.value;
	var hoomonoutval			=	document.postadd.hoomonout.value;
	var hoomonoffval			=	document.postadd.hoomonoff.value;
	var hootueonval				=	document.postadd.hootueon.value;
	var hootueoutval			=	document.postadd.hootueout.value;
	var hootueoffval			=	document.postadd.hootueoff.value;
	var hoowedonval				=	document.postadd.hoowedon.value;
	var hoowedoutval			=	document.postadd.hoowedout.value;
	var hoowedoffval			=	document.postadd.hoowedoff.value;
	var hoothuonval				=	document.postadd.hoothuon.value;
	var hoothuoutval			=	document.postadd.hoothuout.value;
	var hoothuoffval			=	document.postadd.hoothuoff.value;
	var hoofrionval				=	document.postadd.hoofrion.value;
	var hoofrioutval			=	document.postadd.hoofriout.value;
	var hoofrioffval			=	document.postadd.hoofrioff.value;
	var hoosatonval				=	document.postadd.hoosaton.value;
	var hoosatoutval			=	document.postadd.hoosatout.value;
	var hoosatoffval			=	document.postadd.hoosatoff.value;
	var hoosunonval				=	document.postadd.hoosunon.value;
	var hoosunoutval			=	document.postadd.hoosunout.value;
	var hoosunoffval			=	document.postadd.hoosunoff.value;
	//var paymentoptionsval		=	document.postadd.paymentoptions.value;
	var photopath1val			=	document.postadd.photopath1.value;
	var photopath2val			=	document.postadd.photopath2.value;
	var photopath3val			=	document.postadd.photopath3.value;
	var videopath1val			=	document.postadd.videopath1.value;
	var tagsval					=	document.postadd.tags.value;
	
	if(companynameval == '') {
		alert('Company Name cannot be empty');
		companyname.focus();
		return false;
	}
	else if(straddval == '') {
		alert('Street Address cannot be empty');
		stradd.focus();
		return false;

		/*var fnpattern	=	/^[A-Za-z0-9 ]+$/;
        if (fnpattern.test(fnameval)) {
            //alert(fname.value +" has alphanumeric value");
            //return true;
        } else {
            alert(fnameval + " is not valid. Please input alphanumeric value!");
			fname.focus();
            return false;
        }

		if(fnameval.length < 3 || fnameval.length > 20) {
            alert("First name should atleast have 3 characters and less than 20 characters!");
            fname.focus();
			return false;
        } else {
            //alert(fname.value +" has alphanumeric value");
            //return true;
        }*/
	}
	else if(location_areaval == '') {
		alert('Location / Area Cannot Be Empty');
		location_area.focus();
		return false;
	}
	else if(citytownval == '') {
		alert('Please choose City');
		citytown.focus();
		return false;
	} else if(postalcodeval == '') {
		alert('Postal Code cannot be empty');
		postalcode.focus();
		return false;
	} else if(isNaN(postalcodeval)) {
		alert('Postal Code Should be numeric');
		postalcode.focus();
		return false;
	} else if(postalcodeval.length < 6) {
		alert('Postal Code Should be a 6-Digit number');
		postalcode.focus();
		return false;
	} else if(mainphoneval == '') {
		alert('Main Phone cannot be empty');
		mainphone.focus();
		return false;
	}
	
	var mainpattern = /^[0-9]{3}\-?[0-9]{7,8}$/;
	if (mainpattern.test(mainphoneval)) {
		//alert(fname.value +" has alphanumeric value");
		//return true;
	} else {
		alert(mainphoneval + " is not valid. Please input valid phone !");
		mainphone.focus();
		return false;
	}

	if(mobilephoneval != '') {
		if(isNaN(mobilephoneval)) {
			alert('Mobile Phone Should be numeric');
			mobilephone.focus();
			return false;
		} else if(mobilephoneval.length < 10) {
			alert('Mobile Phone Should be a 10-Digit number');
			mobilephone.focus();
			return false;
		} 
	} if(emailaddval == '') {
		alert('Email Address cannot be empty');
		emailadd.focus();
		return false;
	} else if(emailaddval != '') {				
		var empattern = /^[A-Za-z0-9._%+-]+@([A-Za-z0-9-]+\.)+([A-Za-z0-9]{2,4}|museum)$/;
        if (empattern.test(emailaddval)) {
            //alert(fname.value +" has alphanumeric value");
            //return true;
        } else {
            alert(emailaddval + " is not valid. Please input valid email!");
            emailadd.focus();
			return false;
        }
	}

	if(websitenameval != '') {
		var regUrl = /^(((ht|f){1}(tp:[/][/]){1})|((www.){1}))[-a-zA-Z0-9@:%_\+.~#?&//=]+$/;
		//var regUrl = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
		if(regUrl.test(websitenameval) == false) {
			alert("Please enter valid Website Address");
			websitename.focus();
			return false;
		}
	}
	if(categval == '') {
		alert('Category Cannot Be Empty');
		categ.focus();
		return false;
	} 
	
	/*else if(servicearea[0].checked == false && servicearea[1].checked == false) {
		alert('Please select Service Area');
		servicearea[0].focus();
		return false;
	} */
	
	if(hoomononval == '' && hoomonoutval == '' && document.postadd.hoomonoff.checked==false) {
		alert('Please Choose Monday Timing or Closed');
		hoomonon.focus();
		return false;
	}

	if(hoomononval != '') {
		if(hoomonoutval == '') {
			alert('Please Choose Monday Out Time');
		hoomonout.focus();
		return false;
		} else if(hoomononval == hoomonoutval) {
			alert('Please Choose different Monday In & Out Time');
			hoomonon.focus();
			return false;
		}
	}

	if(hoomonoutval != '') {
		if(hoomononval == '') {
			alert('Please Choose Monday In Time');
			hoomonon.focus();
			return false;
		}
		else if(hoomononval == hoomonoutval) {
			alert('Please Choose different Monday In & Out Time');
			hoomonon.focus();
			return false;
		} 
	}

	if(hoomononval !='' && hoomonoutval !='') {
			var g	=	0;
			if (document.postadd.hoomonoff.checked==true)
			{ 
				//alert('good');
				g++;
			}

		if(g == 1) {
			alert("Don't Choose timing if you choose Closed & Viceversa");
			hoomonoff.focus();
			return false;
		}
	}
	
	if(hootueonval == '' && hootueoutval == '' && document.postadd.hootueoff.checked==false) {
		alert('Please Choose Tuesday Timing or Closed');
		hootueon.focus();
		return false;
	}

	if(hootueonval != '') {
		if(hootueoutval == '') {
		alert('Please Choose Tuesday Out Time');
		hootueout.focus();
		return false;
		} else if(hootueonval == hoowedoutval) {
			alert('Please Choose different Tuesday In & Out Time');
			hootueon.focus();
			return false;
		}
	}

	if(hootueoutval != '') {
		if(hootueonval == '') {
			alert('Please Choose Tuesday In Time');
			hootueon.focus();
			return false;
		}
		else if(hootueonval == hootueoutval) {
			alert('Please Choose different Tuesday In & Out Time');
			hootueon.focus();
			return false;
		} 
	}
	
	if(hootueonval !='' && hootueoutval !='') {
		var g	=	0;
			if (document.postadd.hootueoff.checked==true)
			{ 
				//alert('good');
				g++;
			}

		if(g == 1) {
			alert("Don't Choose timing if you choose Closed & Viceversa");
			hootueoff.focus();
			return false;
		}
	}

	if(hoowedonval == '' && hoowedoutval == '' && document.postadd.hoowedoff.checked==false) {
		alert('Please Choose Wednesday Timing or Closed');
		hoowedon.focus();
		return false;
	}

	if(hoowedonval != '') {
		if(hoowedoutval == '') {
		alert('Please Choose Wednesday Out Time');
		hoowedout.focus();
		return false;
		} else if(hoowedonval == hoowedoutval) {
			alert('Please Choose different Wednesday In & Out Time');
			hoowedon.focus();
			return false;
		}
	}

	if(hoowedoutval != '') {
		if(hoowedonval == '') {
			alert('Please Choose Wednesday In Time');
			hoowedon.focus();
			return false;
		}
		else if(hoowedonval == hoowedoutval) {
			alert('Please Choose different Wednesday In & Out Time');
			hoowedon.focus();
			return false;
		} 
	}

	if(hoowedonval !='' && hoowedoutval !='') {
			var g	=	0;
			if (document.postadd.hoowedoff.checked==true)
			{ 
				//alert('good');
				g++;
			}

		if(g == 1) {
			alert("Don't Choose timing if you choose Closed & Viceversa");
			hoowedoff.focus();
			return false;
		}
	}
	
	if(hoothuonval == '' && hoothuoutval == '' && document.postadd.hoothuoff.checked==false) {
		alert('Please Choose Thursday Timing or Closed');
		hoothuon.focus();
		return false;
	}

	if(hoothuonval != '') {
		if(hoothuoutval == '') {
		alert('Please Choose Thursday Out Time');
		hoothuout.focus();
		return false;
		} else if(hoothuonval == hoothuoutval) {
			alert('Please Choose different Thursday In & Out Time');
			hoothuon.focus();
			return false;
		}
	}

	if(hoothuoutval != '') {
		if(hoothuonval == '') {
			alert('Please Choose Thursday In Time');
			hoothuon.focus();
			return false;
		}
		else if(hoothuonval == hoothuoutval) {
			alert('Please Choose different Thursday In & Out Time');
			hoothuon.focus();
			return false;
		} 
	}

	if(hoothuonval !='' && hoothuoutval !='') {
			var g	=	0;
			if (document.postadd.hoothuoff.checked==true)
			{ 
				//alert('good');
				g++;
			}

		if(g == 1) {
			alert("Don't Choose timing if you choose Closed & Viceversa");
			hoothuoff.focus();
			return false;
		}
	}
	
	if(hoofrionval == '' && hoofrioutval == '' && document.postadd.hoofrioff.checked==false) {
		alert('Please Choose Friday Timing or Closed');
		hoofrion.focus();
		return false;
	}

	if(hoofrionval != '') {
		if(hoofrioutval == '') {
		alert('Please Choose Friday Out Time');
		hoofriout.focus();
		return false;
		} else if(hoofrionval == hoofrioutval) {
			alert('Please Choose different Friday In & Out Time');
			hoofrion.focus();
			return false;
		}
	}

	if(hoofrioutval != '') {
		if(hoofrionval == '') {
			alert('Please Choose Friday In Time');
			hoofrion.focus();
			return false;
		}
		else if(hoofrionval == hoofrioutval) {
			alert('Please Choose different Friday In & Out Time');
			hoofrion.focus();
			return false;
		} 
	}


	if(hoofrionval !='' && hoofrioutval !='') {
			var g	=	0;
			if (document.postadd.hoofrioff.checked==true)
			{ 
				//alert('good');
				g++;
			}

		if(g == 1) {
			alert("Don't Choose timing if you choose Closed & Viceversa");
			hoofrioff.focus();
			return false;
		}
	}

	if(hoosatonval == '' && hoosatoutval == '' && document.postadd.hoosatoff.checked==false) {
		alert('Please Choose Wednesday Timing or Closed');
		hoosaton.focus();
		return false;
	}

	if(hoosatonval != '') {
		if(hoosatoutval == '') {
		alert('Please Choose Saturday Out Time');
		hoosatout.focus();
		return false;
		} else if(hoosatonval == hoosatoutval) {
			alert('Please Choose different Saturday In & Out Time');
			hoosaton.focus();
			return false;
		}
	}

	if(hoosatoutval != '') {
		if(hoosatonval == '') {
			alert('Please Choose Saturday In Time');
			hoosaton.focus();
			return false;
		}
		else if(hoosatonval == hoosatoutval) {
			alert('Please Choose different Saturday In & Out Time');
			hoosaton.focus();
			return false;
		} 
	}

	if(hoosatonval !='' && hoosatoutval !='') {
			var g	=	0;
			if (document.postadd.hoosatoff.checked==true)
			{ 
				//alert('good');
				g++;
			}

		if(g == 1) {
			alert("Don't Choose timing if you choose Closed & Viceversa");
			hoosatoff.focus();
			return false;
		}
	}

	if(hoosunonval == '' && hoosunoutval == '' && document.postadd.hoosunoff.checked==false) {
		alert('Please Choose Sunday Timing or Closed');
		hoosunon.focus();
		return false;
	}

	if(hoosunonval != '') {
		if(hoosunoutval == '') {
			alert('Please Choose Sunday Out Time');
			hoosunout.focus();
			return false;
		}
		else if(hoosunonval == hoosunoutval) {
			alert('Please Choose different Sunday In & Out Time');
			hoosunon.focus();
			return false;
		} 
	}

	if(hoosunoutval != '') {
		if(hoosunonval == '') {
			alert('Please Choose Sunday In Time');
			hoosunon.focus();
			return false;
		}
		else if(hoosunonval == hoosunoutval) {
			alert('Please Choose different Sunday In & Out Time');
			hoosunon.focus();
			return false;
		} 
	}

	if(hoosunonval !='' && hoosunoutval !='') {
			var g	=	0;
			if (document.postadd.hoosunoff.checked==true)
			{ 
				//alert('good');
				g++;
			}

		if(g == 1) {
			alert("Don't Choose timing if you choose Closed & Viceversa");
			hoosunoff.focus();
			return false;
		}
	}

	if(document.postadd.hoomonoff.checked==true && document.postadd.hootueoff.checked==true && document.postadd.hoowedoff.checked==true && document.postadd.hoothuoff.checked==true && document.postadd.hoofrioff.checked==true && document.postadd.hoosatoff.checked==true && document.postadd.hoosunoff.checked==true) {
		alert("All Days Can't Be Closed");
		hoomonon.focus();
		return false;
	}

	/*var k	=	paymentoptions.length;
	var	v	=	0;
	for (i=0;i<k;i++) 
	{		
			if (document.postadd.paymentoptions[i].checked==true)
			{ 
				v++;
			}
	}

	if(v == 0) {
		alert('Please Choose Payment Options');
		paymentoptions[0].focus();
		return false;
	}*/

	if(photopath1val == '') {
		alert('Please Upload a photo');
		photopath1.focus();
		return false;
	} /*else if(videopath1val == '') {
		alert('Please Choose the Video');
		videopath1.focus();
		return false;
	}*/ 
	if(videopath1val != '') {
		var videoregExp = /^.*(youtu.be\/|v\/|embed\/|watch\?|youtube.com\/user\/[^#]*#([^\/]*?\/)*)\??v?=?([^#\&\?]*).*/;
		//var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=)([^#\&\?]*).*/;
		//var videoregExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=)([^#\&\?]*).*/;
		//var videoregExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
		//var match = videopath1val.match(videoregExp);
		var match_url = videoregExp.test(videopath1val);
		if (match_url){
			//alert("No error");
			//return false;
		}else{
			alert("Please enter valid Youtube url");
			videopath1.focus();
			return false;
			//error
		}
	}
	//return false;
	
	if(tagsval == '') {
		alert('Please enter the tags separated by comma');
		tags.focus();
		return false;
	} else if(tagsval != '') {
		var tagpattern	=	/^[A-Za-z0-9, ]+$/;
        if (tagpattern.test(tagsval)) {
            //alert(fname.value +" has alphanumeric value");
            //return true;
        } else {
            alert(tagsval + " is not valid. Please input tags separated with comma with no space!");
			tags.focus();
            return false;
        }
	}
}

function validate_search() { 
	var citytown					=	document.searchad.citytown;
	var companyname					=	document.searchad.companyname;
	//var extrainfo					=	document.searchad.extrainfo;

	var citytownval					=	document.searchad.citytown.value;
	var companynameval				=	document.searchad.companyname.value;
	//var extrainfoval				=	document.searchad.extrainfo.value;
	var action						=	document.searchad.action_search;
	action.value					=	'actionsearch';

	if(citytownval == '') {
		alert('Please Choose City');
		citytown.focus();
		return false;
	}
	else if(companynameval == '') {
		alert('This field cannot be empty');
		companyname.focus();
		return false;

		/*var fnpattern	=	/^[A-Za-z0-9 ]+$/;
        if (fnpattern.test(fnameval)) {
            //alert(fname.value +" has alphanumeric value");
            //return true;
        } else {
            alert(fnameval + " is not valid. Please input alphanumeric value!");
			fname.focus();
            return false;
        }

		if(fnameval.length < 3 || fnameval.length > 20) {
            alert("First name should atleast have 3 characters and less than 20 characters!");
            fname.focus();
			return false;
        } else {
            //alert(fname.value +" has alphanumeric value");
            //return true;
        }*/
	}
	/*else if(extrainfoval == '') {
		alert('Please enter additional information');
		extrainfo.focus();
		return false;
	}*/	


}


function validate_contact() { 
	var contact_name				=	document.contactinput.contact_name;
	var city						=	document.contactinput.city;
	var mobile_num					=	document.contactinput.mobile_num;
	var email_id					=	document.contactinput.email_id;
	var course						=	document.contactinput.course;
	var expect_info					=	document.contactinput.expect_info;
	
	var contact_nameval				=	document.contactinput.contact_name.value;
	var cityval						=	document.contactinput.city.value;
	var mobile_numval				=	document.contactinput.mobile_num.value;
	var email_idval					=	document.contactinput.email_id.value;
	var courseval					=	document.contactinput.course.value;
	var expect_infoval				=	document.contactinput.expect_info.value;
	var action						=	document.contactinput.action_course;
	action.value					=	'actioncourse';


	if(contact_nameval == '') {
		alert('Name Cannot be empty');
		contact_name.focus();
		return false;
	}
	else if(cityval == '') {
		alert('Please Choose City');
		city.focus();
		return false;
	} else if(mobile_numval == '') {
		alert('Mobile Number Cannot be empty');
		mobile_num.focus();
		return false;
	} else if(isNaN(mobile_numval)) {
		alert('Mobile Phone Should be numeric');
		mobile_num.focus();
		return false;
	} else if(mobile_numval.length < 10) {
		alert('Mobile Phone Should be a 10-Digit number');
		mobile_num.focus();
		return false;
	} 
	if(email_idval == '') {
		alert('Email Address cannot be empty');
		email_id.focus();
		return false;
	} else if(email_idval != '') {				
		var empattern = /^[A-Za-z0-9._%+-]+@([A-Za-z0-9-]+\.)+([A-Za-z0-9]{2,4}|museum)$/;
        if (empattern.test(email_idval)) {
            //alert(fname.value +" has alphanumeric value");
            //return true;
        } else {
            alert(email_idval + " is not valid. Please input valid email!");
            email_id.focus();
			return false;
        }
	} 
	if(courseval == '') {
		alert('Please Choose Course');
		course.focus();
		return false;
	} else if(expect_infoval == '') {
		alert('Please enter in this field');
		expect_info.focus();
		return false;
	} 
	if(expect_infoval != '') {				
		var empattern = /^[A-Za-z0-9 .<br />_%+-,$#@]+$/;
		expect_infoval = expect_infoval.replace(/\n\r?/g, '<br />');
        if (empattern.test(expect_infoval)) {
            //alert(fname.value +" has alphanumeric value");
            //return true;
        } else {
            alert(expect_infoval + "This field cannot contain special characters other than these characters (._%+-,$#@)");
            expect_info.focus();
			return false;
        }
	}
}

function callLandingPage(postid) {
	document.forms["post"+postid].submit();
}
function sendMailPage(postid){ 

}
function callRatingPage(postid) {
	var action					=	document.forms["rate"+postid].action_rating;
	action.value				=	'actionrating';
	//return false;
	document.forms["rate"+postid].submit();
}
function rate_validate() {
	var rater_name				=	document.rate_form.rater_name;
	var rater_mobile			=	document.rate_form.rater_mobile;
	var rater_email				=	document.rate_form.rater_email;
	var rater_review			=	document.rate_form.rater_review;
	var action					=	document.rate_form.action_ratingdone;
	action.value				=	'actionratingdone';

	var rater_nameval			=	document.rate_form.rater_name.value;
	var rater_mobileval			=	document.rate_form.rater_mobile.value;
	var rater_emailval			=	document.rate_form.rater_email.value;
	var rater_reviewval			=	document.rate_form.rater_review.value;
	var post_dataval			=	document.rate_form.post_data.value;
	var rating_data_trainval	=	document.rate_form.rating_data_train.value;
	var rating_data_placeval	=	document.rate_form.rating_data_place.value;
	
	if(post_dataval == '') {
		alert('Invalid Access, Please try again!');
		return false;
	}
	else if(rating_data_trainval == '') {
		alert('Please rate Training and then proceed!');
		return false;
	}
	else if(rating_data_placeval == '') {
		alert('Please rate Placement and then proceed!');
		return false;
	}
	else if(rater_nameval == '') {
		alert('Name Cannot Be Empty');
		rater_name.focus();
		return false;
	}
	if(rater_mobileval == '') {
		alert('Mobile Cannot Be Empty');
		rater_mobile.focus();
		return false;
	}
	if(isNaN(rater_mobileval)) {
		alert('Mobile Phone Should be numeric');
		rater_mobile.focus();
		return false;
	} else if(rater_mobileval.length < 10) {
		alert('Mobile Phone Should be a 10-Digit number');
		rater_mobile.focus();
		return false;
	} 
	
	if(rater_emailval != '') {				
		var empattern = /^[A-Za-z0-9._%+-]+@([A-Za-z0-9-]+\.)+([A-Za-z0-9]{2,4}|museum)$/;
        if (empattern.test(rater_emailval)) {
            //alert(fname.value +" has alphanumeric value");
            //return true;
        } else {
            alert(rater_emailval + " is not valid. Please input valid email!");
            rater_email.focus();
			return false;
        }
	}
}

function backtoSearchInvi(backpage) {
	if(backpage == 'search_institute.php') {
		var action					=	document.backpage.action_indiv;
		action.value				=	'actionindiv';
	} else if(backpage == 'search.php') {
		var action					=	document.backpage.action_search;
		action.value				=	'actionsearch';
	}
	document.forms["backpage"].submit();
}