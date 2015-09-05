

<?php

if(empty($_POST["password"])) {
   echo "password not entered";
}

else{
	require'config.php';
		
	$password=$_POST["password"];
    if($password=="#thegladiator124") {
		$id=$_POST["FBID"];
		$id = stripslashes($id);
        $id = mysql_real_escape_string($id);
        
		$query=mysql_query("SELECT * FROM $usertable WHERE FBID='$id'",$connection);
		if(!$query){
				die("can't get name");
		}
		
		$no=mysql_num_rows($query);
		if($no==1) {
		    $arr=mysql_fetch_assoc($query);
			$firstname=$arr["FIRSTNAME"];
			$lastname=$arr["LASTNAME"];
			$name=$firstname." ".$lastname;
			echo $name;
		}
		else {
			echo "Invalid fbid";
		}
	}
   else{
	   echo "Invalid password";
   }
}
?>
