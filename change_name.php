<?php

if(empty($_POST['password'])) {
	die("password not entered.");
}
else {
	if($_POST['password']=="#thegladiator124") {
		require'config.php';
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$firstname=stripslashes($firstname);
		$lastname=stripslashes($lastname);
		$firstname=mysql_real_escape_string($firstname);
		$lastname=mysql_real_escape_string($lastname);
		if(empty($_POST['firstname']) && empty($_POST['lastname'])) {
			die("please enter name.");
		}
		if(!empty($_POST['ID'])) {
			$fbid=$_POST['ID'];
			$fbid=stripslashes($fbid);
			$fbid=mysql_real_escape_string($fbid);
			$query=mysql_query("SELECT * FROM $usertable WHERE FBID='$fbid'");
			$num=mysql_num_rows($query);
			if($num==1){
				$query1=mysql_query("UPDATE $usertable SET FIRSTNAME='$firstname',LASTNAME='$lastname' WHERE FBID='$fbid' ");
				if($query1) {
					die("update successfull");
				}
			}
			else {
				die("invalid fbid");
			}
		}
		else if(!empty($_POST['MAILID'])) {
			$mailid=$_POST['MAILID'];
			$mailid=stripslashes($mailid);
			$mailid=mysql_real_escape_string($mailid);
			$query=mysql_query("SELECT * FROM $usertable WHERE EMAIL='$mailid'");
			$num=mysql_num_rows($query);
			if($num==1){
				$query1=mysql_query("UPDATE $usertable SET FIRSTNAME='$firstname',LASTNAME='$lastname' WHERE EMAIL='$mailid' ");
				if($query1) {
					die("update successfull");
				}
			}
			else {
				die("invalid mailid");
			}
			
		}
		else{
			die("Enter fbid or mailid.");
		}
		echo "Update failed.";
	}
	else{
		echo "Wrong password.";
	}
}


?>