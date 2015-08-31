<?php

if($_POST["password"]=="") {
   echo "password not entered";
}

else{
		
	$password=$_POST["password"];
    if($password=="#thegladiator124") {
		require'config.php';
		$query=mysql_query("SELECT * FROM $kryptostable ",$connection);
	    $i=0;
        while($row=mysql_fetch_assoc($query)) {
			$arr[]=$row;
			$i++;
		}

		for($j=0;$j<$i;$j++) {
		echo $arr[$j]['ID']."  ";
		echo $arr[$j]['ANSWER']."  ";
		echo $arr[$j]['URL']."</br>";
		}
    }
   else{
	   echo "Invalid password";
   }
}
?>