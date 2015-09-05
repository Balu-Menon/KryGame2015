<?php
    session_start();
    ini_set('session.cookie_lifetime',  0);
    require "config.php";
    function updatetable($nexlev,$table) {
        $t = time();
        $sql="UPDATE $table set LEVELID= $nexlev,TIME=$t where FBID like \"".$_SESSION['usrno']."\""; 
        $recset=mysql_query($sql) or die("There is some technical error4");
    }
    if(!isset($_SESSION['usrno']) || $_SESSION['lev']!='level18.php') {
        return;
    }
    else {
        updatetable(19,$usertable2);
        header('Location:validate.php');
    }
?>