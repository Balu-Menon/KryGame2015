<?php
session_start();
ini_set('session.cookie_lifetime',  0);
require "config.php";
$s="thisisnotfair";
$fbid=$_SESSION['usrno'];
function updatetable($nexlev,$table,$user) {
    $t = time();
	$sql="UPDATE $table set LEVELID= $nexlev,TIME=$t where FBID like \"".$_SESSION['usrno']."\""; 
    $recset=mysql_query($sql) or die("There is some technical error4");
    $a=array("resp"=>"39a04db82a0cf3aee49a13304e987f37");
    echo json_encode($a);
  
}

function get_ans($curlevel){
require'config.php';
$query=mysql_query("SELECT * FROM $kryptostable WHERE ID='$curlevel'");
$arr=mysql_fetch_assoc($query);
$ans=$arr['ANSWER'];
return $ans;
}

$user_id = $_SESSION['usrno'];
if($user_id) {
    $sql="SELECT * from $usertable2 where FBID = '$user_id'";
    $recset=mysql_query($sql) or die("There is some technical error1");
    $row=mysql_fetch_assoc($recset);
    $curlev=$row['LEVELID'];
    $nexlev=$curlev+1;

	  
    date_default_timezone_set('UTC');
    //date_default_timezone_set('Asia/Calcutta');
    $sql1="SELECT * from $answerlog2 where FBID= '$user_id' AND LEVELID='$curlev'";
    $result1=mysql_query($sql1);
    $count1=mysql_num_rows($result1);
  
    if($count1<1) 
    {
        $unixtime = date("d-m-Y H:i:s",mktime());
        $log=$unixtime."->".$_POST['answer']." @@@";
        $sql="INSERT INTO $answerlog2 (FBID,LEVELID,LOG)"." VALUES ('$user_id','$curlev','$log')";
        $result=mysql_query($sql) or die("There is some technical error5"); 
    }
    else
    {
        $unixtime = date("d-m-Y H:i:s",mktime());
        $forans=preg_replace('/\s+|[^a-zA-Z1234567890запускдвигтеля]/', '', mb_convert_case($_POST['answer'], MB_CASE_LOWER, "UTF-8"));
        $log=$unixtime."->".$forans."-->"." @@@";
        $sql="UPDATE $answerlog2 SET LOG=CONCAT(LOG,'$log') WHERE FBID='$user_id' AND LEVELID='$curlev'";
        mysql_query($sql) or die("There is some technical error7");
    }
    if($_POST['answer']=="")
        $ch_ans=md5(preg_replace('/\s+|[^a-zA-Z1234567890запускдвигтеля]/', '', strtolower("BlUhbLuHhUgEwItCh")));
    else{
        $ch_ans=md5(preg_replace('/\s+|[^a-zA-Z1234567890запускдвигтеля]/', '', mb_convert_case($s.$_POST['answer'], MB_CASE_LOWER, "UTF-8")));
    }	
    /* SQl injection removal deploying basic counter measure..... */

    $ch_ans=stripslashes($ch_ans);
    $ch_ans= mysql_real_escape_string($ch_ans);
    //$ch_ans=$_POST['answer']; remove comment  wen encryption not given
    
   $brute="SELECT * FROM  $attacktable where FBID='$user_id'";
   $attackresult=mysql_query($brute) or die("There is some technical error2");
   $attackrow = mysql_fetch_assoc($attackresult);
   $attackval = $attackrow["lev".$curlev]-1;



   date_default_timezone_set('Asia/Calcutta');
   if(!isset($_SESSION['attempt']) || !isset($_SESSION['strtime'])){
	    $_SESSION['attempt']=0;
		$_SESSION['strtime']=TIME();
	}
	$_SESSION['attempt']=$_SESSION['attempt']+1;
	$_SESSION['endtime']=TIME();
	$timediff=$_SESSION['endtime']-$_SESSION['strtime'];
	if($timediff>=60 || $_SESSION['attempt']>=$maxrate) {
		
		if($_SESSION['attempt']>=$maxrate) {
			$s=mysql_query("UPDATE $usertable2 set NIGGER=1 where FBID='$user_id'");
			
		
		}
        else {
			
			$_SESSION['strtime']=TIME();
			$_SESSION['attempt']=0;
		}
   }




	$brute="UPDATE $attacktable set lev".$curlev."=".$attackval." where FBID='$user_id'";
	mysql_query($brute) or die("There is some technical error3".$curlev);

   
    switch($curlev) {
        case 1:$ans="dc2748e015b89dc97ab3d15b2eefc4b4";break;
        case 2:$ans="634bc62faf2314b42785108deea63eb8";break;         
        case 3:$ans="5214c64e451422e811f594f2fe1304eb";break;
        case 4:$ans="bddf312477c9583183bc591e918d7dc7";break;
        case 5:$ans="3593974d47bb6fe97d8a59b8de511d22";break;
        case 6:$ans="982a1490cc74d8e7d98f3ae8046ec753";break; 
        case 7:$ans="78aa681eacda943958c2719d4c954382";break;
        case 20:if($_POST['answer']>=15)
                    $ch_ans="9a9fe4ec7b081cca242d40035be8fb8d";
                $ans="9a9fe4ec7b081cca242d40035be8fb8d";
            break;
        case 34:
                $query=mysql_query("SELECT * FROM $usertable2 ORDER BY LEVELID DESC,TIME ASC");
                $x=0;
                while($row=mysql_fetch_array($query)) {        
                    $x++;
                    if($row['FBID']==$fbid) {
                        break;
                    }        
                }
                switch($_POST['rand']){
                    case 0:$z=2*$x+8;break;
                    case 1:$z=$x+1;break;
                    case 2:$z=$x+4;break;
                    case 3:$z=6*$x+12;break;
                    case 4:$z=$x+7;break;
                    case 5:$z=$x+9;break;
                    case 6:$z=2*$x+1;break;
                    case 7:$z=4*$x+2;break;
                    case 8:$z=$x+2;break;
                    case 9:$z=$x+5;break;
                    }
                $query=mysql_query("SELECT * FROM $usertable2 ORDER BY LEVELID DESC,TIME ASC");
                $x=0;                
                while($row=mysql_fetch_array($query)) {
                    $user=$row['FBID'];
                   $x=$x+1;
                    $query1=mysql_query("SELECT * FROM $usertable WHERE FBID='$user'");
                    $row1=mysql_fetch_assoc($query1);
                    if($x==$z) {
                      $c_ans=$row1['FIRSTNAME'].$row1['LASTNAME'];                     
                      break;
                    }
        
                }
                $ans=md5(preg_replace('/\s+|[^a-zA-Z1234567890запускдвигтеля]/', '', mb_convert_case($s.$c_ans, MB_CASE_LOWER, "UTF-8")));
                break;
         case 35:if($_POST['x']==1)
        {
            $ans="316fa34aaa337190f347eb372463cb66";break;
        }
        else
        {
            $ans="xxxxxxxxxxxxxxxx";break;
        }
		case 36:$query3=mysql_query("SELECT * FROM $usertable WHERE FBID='$user_id'");
				$a=mysql_fetch_assoc($query3);
				$c_ans=$a['FIRSTNAME'].$a['LASTNAME'];
                $ans=md5(preg_replace('/\s+|[^a-zA-Z1234567890запускдвигтеля]/', '', mb_convert_case($s.$c_ans, MB_CASE_LOWER, "UTF-8")));
            break;
        default:$ans=get_ans($curlev);
    }
    if($ch_ans == $ans) {
        updatetable($nexlev,$usertable2,$user_id);
    }
    else {
        $a=array("resp"=>"563b9ab8b16c5c96be563348975b9783");
        echo json_encode($a);
    }
}
else {
    header('Location: game.php'); 
}
?>
