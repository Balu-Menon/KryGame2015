<?php
require'config.php';
session_start();
if(isset($_SESSION['usrno'])) {
	$fbid=$_SESSION['usrno'];
	$fbid=stripslashes($fbid);
	//$fbid=mysql_real_escape_string($fbid);
	$query=mysql_query("SELECT * FROM $usertable2 WHERE FBID='$fbid'");
	$arr=mysql_fetch_assoc($query) or die ("Error");
	$curlev=$arr['LEVELID'];
	if($curlev<21) {
		$query1=mysql_query("UPDATE $usertable2 SET LEVELID=21 WHERE FBID='$fbid'");
	    
		$sql="SELECT * FROM $kryptostable WHERE ID=21";
		$result=mysql_query($sql) or die ("Error");
		$count=mysql_fetch_assoc($result);
		$_SESSION['lev']=$count['URL'];
		$loc=$_SESSION['lev'];
		header('Location:'.$loc);
	}
	else {
		$sql="SELECT * FROM $kryptostable WHERE ID='$curlev'";
		$result=mysql_query($sql) or die ("Error");
		$count=mysql_fetch_assoc($result);
		$_SESSION['lev']=$count['URL'];
		$loc=$_SESSION['lev'];
		header('Location:'.$loc);
	}
	
}
else {
	header('Location:game.php');
}



?>