<?php
	ini_set("display_errors","true");
	ini_set("max_execution_time","18000");

	define('ROOT_DIRECTORY', 'jd/');

	//LOCAL DATABASE CONNECTION
	define('DBNAME', 'jd');									//DATABASE NAME
	define('DBUSERNAME', 'root');                           //DATABASE USERNAME
	define('DBPASS', 'hari');                               //DATABASE PASSWORD
	define('SERVERNAME', 'localhost');                      //SERVER NAME 
	
	define('TABLE_POST', 'post_info');						//POST TABLE NAME
	define('TABLE_CITY', 'citiessearch');					//CITY TABLE NAME
	define('TABLE_TIME', 'time_dur');						//TIME TABLE NAME
	define('TABLE_CONTACT', 'course_contact');				//COURSE CONTACT TABLE NAME
	define('TABLE_USERRATING', 'user_rating');				//USER RATING TABLE
	define('TABLE_EMAILSEND', 'email_send');				//EMAIL SEND TABLE
	
	$absolutepath = $_SERVER['DOCUMENT_ROOT'].ROOT_DIRECTORY.'/';
	$relativepath = 'http://'.$_SERVER['HTTP_HOST'].'/'.ROOT_DIRECTORY;
	
	define('ABSOLUTE_PATH', $absolutepath);
	define('RELATIVE_PATH', $relativepath);
	define('PHOTO_PATH1', 'photo_path1/');
	define('PHOTO_PATH2', 'photo_path2/');
	define('PHOTO_PATH3', 'photo_path3/');
	define('VIDEO_PATH1', 'video_path1/');

	define('MY_ASSOC', MYSQL_ASSOC);
	define('MY_NUM', MYSQL_NUM);
	define('MY_BOTH', MYSQL_BOTH);
	define('NOR_YES', TRUE);
	define('NOR_NO', FALSE);
	define('EMAIL_ADMIN_SENDER', 'info@smartentry.net');
	define('EMAIL_ADMIN_RECEIVER', 'anandarajesh@smartentry.net,sathish@vforutechnology.com,senthil090680@gmail.com');	
?>