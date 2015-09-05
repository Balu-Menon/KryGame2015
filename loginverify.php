<?php
session_start();
require 'config.php';
ini_set('session.cookie_lifetime',  0);
if(!isset($_POST['fbid']))  {
    echo "Error";
    return;
}
$fbid=$_POST['fbid'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
    
$_SESSION['usrno'] =$fbid;

$sql="SELECT * FROM $usertable WHERE FBID='$fbid'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);

if($count<1) {
	$ran1=rand(0,1);  
    $sql="INSERT INTO $usertable (FIRSTNAME,LASTNAME,EMAIL,FBID)"." VALUES ('$firstname','$lastname','$email','$fbid')";
	$result=mysql_query($sql);
	if(!$result) {
		echo "Error";
		return;
	}
	$t=TIME();
	$res=mysql_query("INSERT INTO $usertable2 (FBID,LEVELID,RAN1,TIME) VALUES ('$fbid',1,'$ran1','$t')");
	if(!$res){
		echo "Error";
		return;
	}
	$res1=mysql_query("INSERT INTO $attacktable (FBID) VALUES('$fbid')");
	if(!$res1) {
		echo "Error";
		return;
	}
	
    echo 1;
}
else {
    $sql="SELECT * FROM $usertable2 WHERE FBID='$fbid'";
    $result=mysql_query($sql);
    $count1=mysql_fetch_assoc($result);
    $i=$count1['RAN1'];
    $level=$count1['LEVELID'];
    
	$query1=mysql_query("SELECT * FROM $attacktable WHERE FBID='$fbid'");
	$num=mysql_num_rows($query1);
	if($num==0) {
		$query2=mysql_query("INSERT INTO $attacktable (FBID) VALUE('$fbid')");
	}
    
    $sql="SELECT * FROM $kryptostable WHERE ID='$level'";
    $result=mysql_query($sql);
    $count=mysql_fetch_assoc($result);
    $_SESSION['lev']=$count['URL'];
    $loc=$_SESSION['lev'];
    echo $loc;
    return;
}

return;
?>