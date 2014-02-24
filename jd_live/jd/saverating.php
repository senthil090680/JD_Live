<?php 
session_start();
require_once 'include/control_functions.php';
error_reporting(E_ALL ^ E_NOTICE);

//print_r($_REQUEST);

$post_data       =       base64_decode($_POST['post_data']);
$rating_id       =       $_POST['rating_id'];

$conWhere			=	" WHERE post_id = $post_data";
$result				=	SingleTon::selectQuery("rate_poor,rate_good,rate_average,rate_verygood,rate_excellent","$conWhere",TABLE_POST,MY_ASSOC,NOR_NO);	
$rateArray			=	$result;
$count				=	0;

if($rating_id == 1) {
	$db_count	=	$rateArray[0][rate_poor];			
	if(is_null($rateArray[0][rate_poor])) {
		$count		=	1;
	} else {
		$count		=	$db_count+1;
	}

	$updateVarValue		=	"rate_poor=$count";
} else if($rating_id == 2) {
	$db_count	=	$rateArray[0][rate_good];			
	if(is_null($rateArray[0][rate_good])) {
		$count		=	1;
	} else {
		$count		=	$db_count+1;
	}

	$updateVarValue		=	"rate_good=$count";

} elseif($rating_id == 3) {
	$db_count	=	$rateArray[0][rate_average];			
	if(is_null($rateArray[0][rate_average])) {
		$count		=	1;
	} else {
		$count		=	$db_count+1;
	}

	$updateVarValue		=	"rate_average=$count";

} elseif($rating_id == 4) {
	$db_count	=	$rateArray[0][rate_verygood];			
	if(is_null($rateArray[0][rate_verygood])) {
		$count		=	1;
	} else {
		$count		=	$db_count+1;
	}

	$updateVarValue		=	"rate_verygood=$count";
} elseif($rating_id == 5) {
	$db_count	=	$rateArray[0][rate_excellent];			
	if(is_null($rateArray[0][rate_excellent])) {
		$count		=	1;
	} else {
		$count		=	$db_count+1;
	}

	$updateVarValue		=	"rate_excellent=$count";
}

//$updateCond					=		"post_id = $post_data";				// FOR LIVE

$updateCond						=		"1 = 1";							// FOR TESTING ONLY

echo $noofrows					=		SingleTon::updateQuery($updateVarValue,$updateCond,TABLE_POST,TRUE);   //RETURNS NO OF ROWS AFFECTED IF SUCCESS
exit(0);
?>