<?php 
session_start();
require_once 'include/control_functions.php'; 

extract($_POST);

//error_reporting(E_ALL & ~E_NOTICE);

error_reporting(0);

/*echo "<pre>";
print_r($_POST);
echo "</pre>";

exit(0);*/
$insertVar					=	'username,usermobile,useremail,usermsg,insertedDate';

$insertValue				=	"'$username','$usermobile','$useremail','$usermsg',NOW()";

$rowId						=	SingleTon::insertQuery($insertVar,$insertValue,TABLE_EMAILSEND,TRUE);  //RETURNS ROW ID IF SUCCESS

$conWhere					=	" WHERE post_id	= '$postid' AND poststatus = 1";

$result						=	SingleTon::selectQuery("emailadd","$conWhere",TABLE_POST,MY_ASSOC,NOR_NO);	
$resultArray				=	$result;

if($rowId) {	
	$argFromEmailAddress			=	EMAIL_ADMIN_SENDER;
	$argToEmailAddress				=	$resultArray[0][emailadd];
	$argReplyToEmailAddress			=	EMAIL_ADMIN_SENDER;

	$argUserSubject					=	"New Enquiry From System Administrator";
	$argUserMessage					=	$usermsg;

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

	if (mail($argToEmailAddress, $argUserSubject, $argUserMessage, $argheaders)) { 	echo 1; exit(0); } //if
	else { echo 2; exit(0); }	
}
else {
	echo 3; exit(0);
}
?>