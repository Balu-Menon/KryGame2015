<?php

$pass=$_POST['password'];
$id=$_POST['ID'];
$level=$_POST['LEVEL'];

//$pass=stripslashes($pass);
$id=stripslashes($id);
$level=stripslashes($level);

//$pass=mysql_real_escape_string($pass);
//$id=mysql_real_escape_string($id);
//$level=mysql_real_escape_string($level);

if(empty($_POST['password'])) {
	
	echo "Password not entered";
}
else {
	if($pass=="#thegladiator124"){
		if(!empty($_POST['ID']) &&!empty($_POST['LEVEL'])) {
					require'config.php';
					$query=mysql_query("SELECT * FROM $usertable2 WHERE FBID='$id'");
					$num=mysql_num_rows($query);
					if($num==1) {
					$query1=mysql_query("UPDATE $usertable2 SET LEVELID='$level' WHERE FBID='$id'");
					if(!$query1){
						echo "update failed";
						die();
					}
					else{
						echo "updated successfully";
						die();
					}
				}
				else{
					die("Invalid fbid");
				}
		}
		else {
			die("Invalid data");
		}
	}
	else {
		die("Invalid password");
	}
}




?>