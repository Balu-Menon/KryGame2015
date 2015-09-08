<?php
require'config.php';

if(isset($_SESSION['usrno'])) {
	$fbid=$_SESSION['usrno'];
	$fbid=stripslashes($fbid);
	$fbid=mysql_real_escape_string($fbid);
	$query=mysql_query("SELECT * FROM $usertable2 WHERE FBID='$fbid'");
	$arr=mysql_fetch_assoc($query);
	$curlev=$arr['LEVELID'];
	
	
	if($curlev>20) {
		header('Location:Notif.php');
	}
	else {
		$sql="SELECT * FROM $kryptostable WHERE ID='$curlev'";
		$result=mysql_query($sql);
		$count=mysql_fetch_assoc($result);
		$_SESSION['lev']=$count['URL'];
		$loc=$_SESSION['lev'];
		header('Location:$loc');
	}
}
else {
	header('Location:game.php');
}


?>