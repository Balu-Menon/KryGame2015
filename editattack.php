<?php

require'config.php';
$count=0;
$query=mysql_query("SELECT * FROM $usertable");
while($row=mysql_fetch_assoc($query)) {
	$fbid=$row['FBID'];
	$query1=mysql_query("SELECT * FROM $attacktable WHERE FBID='$fbid'");
	$num=mysql_num_rows($query1);
	if($num==0) {
		$query2=mysql_query("INSERT INTO $attacktable (FBID) VALUE('$fbid')");
		if($query2){
			$count++;
			
		}
	}	
}
echo "No of success:".$count;

?>