<?php

if(empty($_POST["password"])) {
   echo "password not entered";
}

else{
	require'config.php';
		
	$password=$_POST["password"];
    if($password=="#thegladiator124") {
		$query=mysql_query("SELECT FBID,LOG FROM $answerlog",$connection);
		$i=0;
		while($row=mysql_fetch_assoc($query)) {
			$arr[$i]=$row;
			$i=$i+1;	
		}


		for($j=0;$j<$i;$j++) {
		$fbid=$arr[$j]["FBID"];
		$query2=mysql_query("SELECT * FROM $usertable WHERE FBID='$fbid'",$connection);
		$arr1=mysql_fetch_assoc($query2);
		$name=$arr1['FIRSTNAME']." ".$arr1['LASTNAME'];
		$arr[$j]['NAME']=$name;
		}
        for($j=0;$j<$i;$j++) {
			echo $arr[$j]["NAME"]."<br>";
			echo " ".$arr[$j]["LOG"]."<br>";
		}
	}
	else {
		echo "Invalid password";
	}
}	
?>