/*
Author: Addam M. Driver
Date: 10/31/2006
*/

var sMax_place;	// Is the maximum number of stars
var holder_place; // Is the holding pattern for clicked state
var preSet_place; // Is the PreSet value once a selection has been made
var rated_place;

// Rollover for image Stars //
function rating_place(num,divi){
	//alert(divi);
	sMax_place = 0;	// Isthe maximum number of stars
	//alert(num.parentNode.childNodes.length);
	for(n=0; n<num.parentNode.childNodes.length; n++){
		if(num.parentNode.childNodes[n].nodeName == "A"){
			sMax_place++;	
		}
	}

	sMax_place		=	10;
	//alert(sMax_place);
	if(!rated_place){
		//alert('in');
		s_place = num.id.replace("_", ''); // Get the selected star
		a_place = 0;
		for(i=6; i<=sMax_place; i++){
			if(i<=s_place){
				document.getElementById(i).className = "on";
				document.getElementById("rateStatus_"+divi).innerHTML = num.title;	
				holder_place = a_place+1;
				a_place++;
			}else{
				document.getElementById(i).className = "";
			}
		}
	}
}

// For when you roll out of the the whole thing //
function off_place(me,divi){
	if(!rated_place){
		if(!preSet_place){	
			for(i=1; i<=sMax_place; i++){
				document.getElementById(i).className = "";
				document.getElementById("rateStatus_"+divi).innerHTML = me.parentNode.title;
			}
		}else{
			rating_place(preSet_place,divi);
			document.getElementById("rateStatus_"+divi).innerHTML = document.getElementById("ratingSaved_"+divi).innerHTML;
		}
	}
}

// When you actually rate something //
function rateIt_place(me,divi){
	//if(!rated_place){
		document.getElementById("rateStatus_"+divi).innerHTML = document.getElementById("ratingSaved_"+divi).innerHTML + " :: "+me.title;
		preSet_place = me;
		//rated_place=1;
		sendRate_place(me,divi);
		rating_place(me,divi);
	//}
}

// Send the rating information somewhere using Ajax or something like that.
function sendRate_place(sel,divi){
	document.getElementById("rating_data_"+divi).value		=	sel.id;

	/*
	var rating_id	=	sel.id;
	alert("Your rating was: "+sel.id);
	alert(document.getElementById("post_data").value);

	var post_data = document.getElementById("post_data").value;
	if(post_data == '') {
        alert("Invalid Access to this page");       
	} else {
        var xmlhttp;
        if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
        }
        else {// code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
          if (xmlhttp.readyState==4 && xmlhttp.status==200) {
              alert(xmlhttp.responseText);            
            //document.getElementById("showtour").innerHTML=xmlhttp.responseText;
          }
        }
		var params		=		"rating_id="+rating_id+"&post_data="+post_data;
		//alert(params);
		xmlhttp.open("POST","saverating.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send(params);       
   }*/
}
