<?php

if(empty($_POST['password'])) {
	echo "password not entered";
}

else {
		$pass=$_POST['password'];
	    if($pass=='#thegladiator124') {
			require'config.php';
			$query=mysql_query("SELECT * FROM $usertable2 ORDER BY LEVELID DESC,TIME ASC");
			while($row=mysql_fetch_array($query)) {
			
				$fbid=$row['FBID'];
				$level=$row['LEVELID'];
				$nigger=$row['NIGGER'];
				$query1=mysql_query("SELECT * FROM $usertable WHERE FBID='$fbid'");
				$row1=mysql_fetch_assoc($query1);
				$name=$row1['FIRSTNAME']." ".$row1['LASTNAME'];
			
				echo $fbid."\t";
				echo $name."\t";
				if($nigger==0) {
					echo "level=".$level."<br>";
				}
				else  {
					echo "level=".$level."\t";
					echo "NIGGER"."<br>";
					
				}
			
			}
		
		}
		else {
			echo "invalid password entered.";
		}
	
}


?>