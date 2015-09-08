<?php


if(empty($_POST['password'])) {
	echo "password not entered.";
}
else{
	$pass=$_POST['password'];
	$id=$_POST['ID'];
	
	$pass=stripslashes($pass);
	$id=stripslashes($id);
	
	//$pass=mysql_real_escape_string($pass);
	//$id=mysql_real_escape_string($id);
	
	
	if($pass!="#thegladiator124") {
		die("Wrong password");

	}
	else{
		require'config.php';
		if(isset($_POST['select'])) {
			$val=$_POST['select'];
			$val=stripslashes($val);
			//$val=mysql_real_escape_string($val);
			
		}
		else {
			die("Missing fields.......");
		}
		if($val==1) {
			$query1=mysql_query("SELECT * FROM $usertable2 WHERE FBID='$id'");
			$num=mysql_num_rows($query1);
			if($num==1) {
				$query=mysql_query("UPDATE $usertable2 SET NIGGER=1 WHERE FBID='$id'");
			    if($query){
					die("Update Successfull.");
				}
			}
			else {
				die("Invalid fbid");
			}
			
		}
		else if($val==2) {
			$query1=mysql_query("SELECT * FROM $usertable2 WHERE FBID='$id'");
			$num=mysql_num_rows($query1);
			if($num==1) {
				$query=mysql_query("UPDATE $usertable2 SET NIGGER=0 WHERE FBID='$id'");
				if($query){
					die("Update Successfull.");
				}
			}
			else {
				die("Invalid fbid");
			}
		}
		
		die("Update Failed due to invalid data");
		
	}
	
}
?>