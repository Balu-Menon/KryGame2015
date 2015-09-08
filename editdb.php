<?php

if(empty($_POST["password"])) {
   echo "password not entered";
}

else{
	require'config.php';
		
	$password=$_POST["password"];
    if($password=="#thegladiator124") {
		$id=$_POST['ID'];
		$ans=$_POST['ANSWER'];
        $url=$_POST['URL'];
		$id = stripslashes($id);
        $ans = stripslashes($ans);
        $url = stripslashes($url);
        //$id = mysql_real_escape_string($id);
        //$ans = mysql_real_escape_string($ans);
        //$url = mysql_real_escape_string($url);
		$query=mysql_query("SELECT * FROM $kryptostable WHERE ID='$id'");
		$no=mysql_num_rows($query);
		if($no>=1) {
			if($ans=="") {
				$query1=mysql_query("UPDATE $kryptostable SET URL='$url' WHERE ID='$id'");
				
			}
			else if($url=="") {
				$query1=mysql_query("UPDATE $kryptostable SET ANSWER='$ans' WHERE ID='$id'");
				
			}
			else if(!empty($_POST['ANSWER']) && !empty($_POST['URL'])){
				$query1=mysql_query("UPDATE $kryptostable SET ANSWER='$ans',URL='$url' WHERE ID='$id'");
				
			}
			
				
			if(!$query1){
				die("update failed");
			}
		}
		else if(!empty($_POST['ID'])) {
			$query1=mysql_query("INSERT INTO $kryptostable (ID,ANSWER,URL) VALUES('$id','$ans','$url') ",$connection);
			if(!$query1){
				die("insertion failed");
			}
		}
		
		else {
			die("Invalid id");
		}
		echo "Database successfully updated";
    }
   else{
    echo "Invalid password";
   }
}
?>