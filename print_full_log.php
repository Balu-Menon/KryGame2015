<?php

if(empty($_POST["password"])) {
   echo "password not entered";
}

else{
	require'config.php';
		
	$password=$_POST["password"];
	$password=stripslashes($password);
	$password=mysql_real_escape_string($password);
    if($password=="#thegladiator124") {
		$query=mysql_query("SELECT * FROM $answerlog2");
		$i=0;
		while($row=mysql_fetch_array($query)) {
			$arr[$i]=$row;
			$i=$i+1;	
		}


		for($j=0;$j<$i;$j++) {
		$fbid=$arr[$j]["FBID"];
		$query2=mysql_query("SELECT * FROM $usertable WHERE FBID='$fbid'");
		$arr1=mysql_fetch_assoc($query2);
		$name=$arr1['FIRSTNAME']." ".$arr1['LASTNAME'];
		$arr[$j]['NAME']=$name;
		}
        for($j=0;$j<$i;$j++) {
			echo "FBID:".$arr[$j]["FBID"]."  "."Name:".$arr[$j]["NAME"]." "."("."Level-".$arr[$j]['LEVELID'].")"."<br>";
			echo $arr[$j]["LOG"]."<br>"."<br>";
		}
	}
	else {
		echo "Invalid password";
	}
}	
?>