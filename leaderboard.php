<?php

require'config.php';

$rank=null;
$toplevel=null;
$level=null;

if(isset($_POST["EMAIL"])){
	
	$email=$_POST["EMAIL"];
	$query=mysql_query("SELECT * FROM $usertable WHERE EMAIL='$email'",$connection);
    $arr=mysql_fetch_assoc($query);
    $firstname=$arr["FIRSTNAME"];
    $lastname=$arr["LASTNAME"];
    $fullname=$firstname." ".$lastname;
    $fbid=$arr["FBID"];
    $query=mysql_query("SELECT LEVELID FROM $usertable2 WHERE FBID='$fbid'",$connection);
    $arr=mysql_fetch_assoc($query);
    $level=$arr["LEVELID"];
	$i=0;
	$query=mysql_query("SELECT LEVELID from $usertable2 where nigger <> '1'order by LEVELID desc,TIME asc",$connection);
	$records = array();
	while($row=mysql_fetch_array($query)){
		
		$records[]=$row;
		$records[$i]['rank']=$i+1;
		if($records[$i]['LEVELID']==$level) {
			$rank=$records[$i]['rank'];
		}
		$i=$i+1;
	}
    $toplevel=$records[0]["LEVELID"];
	
    $jcon["name"]=$fullname;
    $jcon["level"]=$level;
	$jcon["rank"]=$rank;
    $jcon["toplevel"]=$toplevel;
    echo json_encode($jcon);
}

else{
	    $jcon["name"]=null;
    $jcon["level"]=$level;
	$jcon["rank"]=$rank;
    $jcon["toplevel"]=$toplevel;
    echo json_encode($jcon); 
	
	    
}

?>