<?php
    ini_set('session.bug_compat_42',0);
	ini_set('session.bug_compat_warn',0);
	$host="localhost";

    $db_username="root";
	$db_password=""; 
	$db_name="kryptos2015"; 
		
    $connection=mysql_connect("$host", "$db_username","$db_password")or die(mysql_error()); 
    $db=mysql_select_db("$db_name",$connection)or die(mysql_error());
	
	$admin1="balumenon";
    $admin2="avs1234";
	
	$kryptostable = "kryquest";
	$usertable = "usertable";
	$attacktable = "attacklog";
	$usertable2 = "userstatus";
	$logintable = "logintable";
	$answerlog = "anslog";
    $maxrate = 30;
	
	
?>