<?php
    require'config.php';
    $fbid=$_SESSION["usrno"];
    $query=mysql_query("SELECT * FROM $usertable WHERE FBID='$fbid'");
    if(mysql_num_rows($query)<1) { 
        header('Location:alert.php');
    }
    else {
        return;
    }
?>