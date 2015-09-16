<?php
session_start();
	ini_set('session.cookie_lifetime',  0);

	if(!isset($_SESSION['usrno']) || $_SESSION['lev']!='level37.php')
	{
		header('Location:validate.php');
	}
	else 
	{

require'config.php';
session_start();

$fbid=$_SESSION['usrno'];

$query=mysql_query("UPDATE $usertable2 SET LEVELID=38 WHERE FBID='$fbid'");
header('Location:validate.php');
    }
?>