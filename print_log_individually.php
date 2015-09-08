<?php

if(empty($_POST["password"])) {
   echo "password not entered";
}

else{
	require'config.php';
		
	$pass=$_POST['password'];
	$id=$_POST['ID'];
	
	$pass=stripslashes($pass);
	$id=stripslashes($id);
	
	$pass=mysql_real_escape_string($pass);
	$id=mysql_real_escape_string($id);
    if($pass=="#thegladiator124") {
		$query=mysql_query("SELECT * FROM $answerlog2 WHERE FBID='$id'");
		$num=mysql_num_rows($query);
		if($num>=1){
			$i=0;
			$query1=mysql_query("SELECT * FROM $usertable WHERE FBID='$id'");
			$list=mysql_fetch_assoc($query1);
			$name=$list['FIRSTNAME']." ".$list['LASTNAME'];
			while($row=mysql_fetch_array($query)) {
				$arr[$i]=$row;
				$i=$i+1;
			}
			echo "FBID:".$id."<br>"."Name:".$name."<br>"."<br>";
			for($j=0;$j<$i;$j++) {
				
				echo "Level-".$arr[$j]['LEVELID']."<br>";
				echo $arr[$j]['LOG']."<br>"."<br>";
				
			}
			
		}
		else{
			die("No log found.");
		}

	}
	else{ 
	die("Wrong password");
	}
}
?>	