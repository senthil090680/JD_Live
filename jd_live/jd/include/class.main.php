<?php
class SingleTon { //Singleton Class
	private static $sing_instance = NULL;
	private $startConstruct;
	private $queryAnnex = '';
	private $selQuery;
	private $conString;

	private function __construct($dbName,$dbUser,$dbPass,$serverName) {
		$conString	=	mysql_connect($serverName,$dbUser,$dbPass);
		if(!($conString)) {
			die("Connection could not be made ". mysql_error());
		}
		mysql_select_db($dbName,$conString);
		mysql_query("SET NAMES 'utf8';");
	}
	
	public static function getInstance($dbName = '',$dbUser = '',$dbPass = '',$serverName = '') {
		if(self::$sing_instance === NULL) {
			$startConstruct		=	new SingleTon($dbName,$dbUser,$dbPass,$serverName);	
		}
	}	

	/* selectQuery FUNCTION ARGUMENTS SHOULD BE
	1	OUTPUT VARIABLES	2	CONDITION VARIABLES	& VALUES	3	TABLE NAME
	4	RESULT TYPE			5	NUM OF ROWS REQUIRED OR NOT */

	public static function selectQuery($resultVar,$condVar = '',$tabVar,$fetchType = MY_BOTH,$nor = FALSE) {

		$arrSel					=		array();
		$selQuery				=		 "SELECT ".$resultVar." FROM ".$tabVar.$condVar." ";

		$selResult				=		mysql_query($selQuery) or die(mysql_error());
		
		while($resultRow		=		mysql_fetch_array($selResult,$fetchType)) {
			$totalRows[]		=		$resultRow;
		}

		if($nor) {
			$noofrows			=		mysql_num_rows($selResult);
			$arrSel				=		array($noofrows,$totalRows);	
		} else {
			$arrSel				=		$totalRows;
		}
		
		return $arrSel;
	}

	/* insertQuery FUNCTION ARGUMENTS SHOULD BE
	1	INSERT VARIABLES	2	INSERT VALUES	3	TABLE NAME
	4	ROW ID REQUIRED OR NOT */
	public static function insertQuery($insertVar,$insertValue = '',$tabVar,$rowID = FALSE) {

		$arrSel					=		'';
		$selQuery				=		"INSERT INTO ".$tabVar." (".$insertVar.") VALUES (".$insertValue.")";

		$selResult				=		mysql_query($selQuery) or die(mysql_error());
		
		if($rowID) {
			$rows_id			=		mysql_insert_id();

		} else {
			$rows_id			=		false;
		}
		
		return $rows_id;
	}
	
	/* updateQuery FUNCTION ARGUMENTS SHOULD BE
	1	UPDATE VARIABLES & VALUES	2	UPDATE CONDITION  3	 TABLE NAME
	4	NUMBER OF ROWS AFFECTED */
	public static function updateQuery($updateVarValue = '',$updateCond,$tabVar,$nor = FALSE) {
		$noofrows				=		'';
		$selQuery				=		"UPDATE ".$tabVar." SET ".$updateVarValue. "  WHERE ".$updateCond."";
		$selResult				=		mysql_query($selQuery) or die(mysql_error());		
		if($nor) {
			$noofrows			=		mysql_affected_rows();
		} else {
			$noofrows			=		$totalRows;
		}
		
		return $noofrows;
	}
	//SAMPLE CODE TO CALL UPDATE QUERY
	//$noofrows					=		SingleTon::updateQuery($updateVarValue,$updateCond,TABLE_POST,TRUE);   //RETURNS NO OF ROWS AFFECTED IF SUCCESS

	public static function debugerr($value){ 
		echo "<pre>",print_r($value, true),"</pre>";
	}
}
?>