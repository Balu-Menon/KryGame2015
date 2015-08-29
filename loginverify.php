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
$result=mysql_query($sql,$connection);
$count=mysql_num_rows($result);

if($count<1) {
	$ran1=rand(0,1);  
    $sql="INSERT INTO $usertable (FIRSTNAME,LASTNAME,EMAIL,FBID)"." VALUES ('$firstname','$lastname','$email','$fbid')";
	$result=mysql_query($sql,$connection);
	$res=mysql_query("INSERT INTO $usertable2 (FBID,LEVELID,RAN1) VALUES ('$fbid',1,'$ran1')",$connection);
    echo 1;
}
else {
    $sql="SELECT * FROM $usertable2 WHERE FBID='$fbid'";
    $result=mysql_query($sql,$connection);
    $count1=mysql_fetch_assoc($result);
    $i=$count1['RAN1'];
    $level=$count1['LEVELID'];
    $_SESSION['level']=$level.(($level==8)?(chr(ord('a')+$i%2)):'');
    
    $sql="SELECT * FROM $kryptostable WHERE ID='$level'";
    $result=mysql_query($sql,$connection);
    $count=mysql_fetch_assoc($result);
    $_SESSION['lev']=$count['URL'];
    $loc=$_SESSION['lev'];
    echo $loc;
    return;
}
/*
//nigger=0 safe
$sql1="SELECT * FROM $usertable WHERE fbid='$fbid' and nigger=1";
$result1=mysql_query($sql1) or die("querrying nigger");
$count=mysql_num_rows($result1);
if($count==1) {
    header('Location: detention.php');
    die("contact us");   
}
// $code_filename="answers/fblog.txt";
// $codefileopen=fopen($code_filename,"a") or die("can't open log file");
// $code=$fbid."\n";
// fwrite($codefileopen, $code);
// fclose($codefileopen);
echo 1;
*/
return;
?>