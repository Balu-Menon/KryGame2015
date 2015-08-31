<?php

if($_POST["password"]=="") {
   echo "password not entered";
}

else{
	require'config.php';
		
	$password=$_POST["password"];
    if($password=="#thegladiator124") {
		$id=$_POST['ID'];
		$ans=$_POST['ANSWER'];
        $url=$_POST['URL'];
		$query=mysql_query("SELECT * FROM $kryptostable WHERE ID='$id'",$connection);
		$no=mysql_num_rows($query);
		if($no>=1) {
			$query1=mysql_query("UPDATE $kryptostable SET ANSWER='$ans',URL='$url' WHERE ID='$id'",$connection);
			if(!$query1){
				die("update failed");
			}
		}
		else {
			$query1=mysql_query("INSERT INTO $kryptostable (ID,ANSWER,URL) VALUES('$id','$ans','$url') ",$connection);
			if(!$query1){
				die("insertion failed");
			}
		}
		echo "Database successfully updated";
    }
   else{
    echo "Invalid password";
   }
}
?>