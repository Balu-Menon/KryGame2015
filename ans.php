<?php
session_start();
ini_set('session.cookie_lifetime',  0);
require "config.php";
$s="thisisnotfair";
function updatetable($nexlev,$table,$user) {
    $t = time();
    /*$sql="SELECT * FROM $table WHERE FBID='$user'";
    $result2=mysql_query($sql);
    $count=mysql_fetch_assoc($result2); 
	$i=$count['RAN1'];*/
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
    $sql="SELECT * from $usertable2 where fbid = '".$_SESSION['usrno']."'";
    $recset=mysql_query($sql) or die("There is some technical error1");
    $row=mysql_fetch_assoc($recset);
    $curlev=$row['LEVELID'];
    $nexlev=$curlev+1;
    $user=$row['FBID'];
	
    date_default_timezone_set('UTC');
    //date_default_timezone_set('Asia/Calcutta');
    $sql1="SELECT * from $answerlog where FBID= '".$_SESSION['usrno']."'";
    $result1=mysql_query($sql1);
    $count1=mysql_num_rows($result1);
    $fbid=$_SESSION['usrno'];
    if($count1<1) 
    {
        $unixtime = date("d-m-Y H:i:s",mktime());
        $log=$unixtime."->".$_POST['answer']."-->".$_SESSION['lev']." @@@";
        $sql="INSERT INTO $answerlog (FBID,LOG)"." VALUES ('$fbid','$log')";
        $result=mysql_query($sql) or die("There is some technical error5"); 
    }
    else
    {
        $unixtime = date("d-m-Y H:i:s",mktime());
        $forans=preg_replace('/\s+|[^a-zA-Z1234567890запускдвигтеля]/', '', mb_convert_case($_POST['answer']."0x9", MB_CASE_LOWER, "UTF-8"));
        $log=$unixtime."->".$forans."-->".$_SESSION['lev']." @@@";
        $sql="UPDATE $answerlog SET LOG=CONCAT(LOG,'$log') WHERE FBID='$fbid'";
        mysql_query($sql) or die("There is some technical error7");
    }
    if($_POST['answer']=="")
        $ch_ans=md5(preg_replace('/\s+|[^a-zA-Z1234567890запускдвигтеля]/', '', strtolower("BlUhbLuHhUgEwItCh")));
    else{
        $ch_ans=md5(preg_replace('/\s+|[^a-zA-Z1234567890запускдвигтеля]/', '', mb_convert_case($s.$_POST['answer'], MB_CASE_LOWER, "UTF-8")));
    }	
    /* SQl injection removal deploying basic counter measure..... */

    $ch_ans=stripslashes($ch_ans);
    $ch_ans= mysql_real_escape_string($ch_ans,$connection);
    //$ch_ans=$_POST['answer']; remove comment  wen encryption not given
    
    date_default_timezone_set('Asia/Calcutta');
    if(!isset($_SESSION['attempt']) || !isset($_SESSION['strtime'])) {
        $_SESSION['attempt']=0;
        $_SESSION['strtime']=TIME();
    }
    $_SESSION['attempt']=$_SESSION['attempt']+1;
    $_SESSION['endtime']=TIME();
    $timediff=$_SESSION['endtime']-$_SESSION['strtime'];
    if($timediff>=60 || $_SESSION['attempt']>=$maxrate) {
        if($_SESSION['attempt']>=$maxrate) {
            // $code_filename="answers/assholesX.txt";
            // $codefileopen=fopen($code_filename,"a") or die("can't open flog file");
            // $code=$unixtime."->".$_SESSION['username']."->".$_SESSION['attempt']."\n";
            // fwrite($codefileopen, $code);
            // fclose($codefileopen);
            $s="update $usertable set nigger=1 where fbid='".$user."'";
            mysql_query($s) or die("There is some technical ferror3");
            die("contact us");
        }
        else {
            $_SESSION['strtime']=TIME();
            $_SESSION['attempt']=0;
        }
    }   
    switch($curlev) {
        case 1:$ans="dc2748e015b89dc97ab3d15b2eefc4b4";break;
        case 2:$ans="634bc62faf2314b42785108deea63eb8";break;         
        case 3:$ans="5214c64e451422e811f594f2fe1304eb";break;
        case 4:$ans="bddf312477c9583183bc591e918d7dc7";break; 
        case 6:$ans="982a1490cc74d8e7d98f3ae8046ec753";break; 
        case 7:$ans="78aa681eacda943958c2719d4c954382";break;
        default:$ans=get_ans($curlev);
    }
    if($ch_ans == $ans) {
        updatetable($nexlev,$usertable2,$user);
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
