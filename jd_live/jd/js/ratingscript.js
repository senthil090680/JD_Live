/*
Author: Addam M. Driver
Date: 10/31/2006
*/

var sMax;	// Is the maximum number of stars
var holder; // Is the holding pattern for clicked state
var preSet; // Is the PreSet value once a selection has been made
var rated;

// Rollover for image Stars //
function rating(num,divi){
	//alert(divi);
	sMax = 0;	// Isthe maximum number of stars
	//alert(num.parentNode.childNodes.length);
	for(n=0; n<num.parentNode.childNodes.length; n++){
		if(num.parentNode.childNodes[n].nodeName == "A"){
			sMax++;	
		}
	}

	//sMax		=	10;
	//alert(rated);
	if(!rated){
		//alert('in');
		s = num.id.replace("_", ''); // Get the selected star
		a = 0;
		for(i=1; i<=sMax; i++){
			if(i<=s){
				document.getElementById(i).className = "on";
				document.getElementById("rateStatus_"+divi).innerHTML = num.title;	
				holder = a+1;
				a++;
			}else{
				document.getElementById(i).className = "";
			}
		}
	}
}

// For when you roll out of the the whole thing //
function off(me,divi){
	if(!rated){
		if(!preSet){	
			for(i=1; i<=sMax; i++){		
				document.getElementById(i).className = "";
				document.getElementById("rateStatus_"+divi).innerHTML = me.parentNode.title;
			}
		}else{
			rating(preSet,divi);
			document.getElementById("rateStatus_"+divi).innerHTML = document.getElementById("ratingSaved_"+divi).innerHTML;
		}
	}
}

// When you actually rate something //
function rateIt(me,divi){
	//if(!rated){
		document.getElementById("rateStatus_"+divi).innerHTML = document.getElementById("ratingSaved_"+divi).innerHTML + " :: "+me.title;
		preSet = me;
		//rated=1;
		sendRate(me,divi);
		rating(me,divi);
	//}
}

// Send the rating information somewhere using Ajax or something like that.
function sendRate(sel,divi){
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
