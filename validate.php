<?php
session_start();
require 'config.php';

ini_set('session.cookie_lifetime',  0);


//session setting needs to be done


date_default_timezone_set('Asia/Calcutta');
$dest = mktime(00,00,00,9,25,2013); 
$date = new DateTime(); 
$dif=$dest-TIME();

if(!isset($_SESSION['usrno']))
{
	session_destroy();
    header('Location: game.php');
}
else 
{
$fbid=$_SESSION['usrno'];
$sql1="SELECT * FROM $usertable2 WHERE FBID='$fbid'";
$result1=mysql_query($sql1);
$count=mysql_fetch_assoc($result1);
$i=$count['RAN1'];
$level=$count['LEVELID'];

$sql1="SELECT * FROM $kryptostable WHERE ID ='$level'";
$result1=mysql_query($sql1);

$count1=mysql_fetch_assoc($result1);
$_SESSION['lev']=$count1['URL'];
$loc=$_SESSION['lev'];
header("Location: $loc");
}
?>