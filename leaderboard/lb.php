<?php
session_start();
ini_set('session.cookie_lifetime',  0);
$_SESSION['leader']=rand(1,48);
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kryptos | Beta</title>
        <link rel="stylesheet" href="../css/font_base64-0.css" type="text/css" media="all" />
        <link rel="dns-prefetch" href="//ajax.googleapis.com" />
        <!--link rel="dns-prefetch" href="//connect.facebook.net"/ -->
    
        <link rel="stylesheet" href="../css/normalize.min.css">
         <link rel="canonical" href="" />
        <link rel="stylesheet" href="../css/leader.css">
        <link rel="stylesheet" href="../css/main.css">
        <link href='https://fonts.googleapis.com/css?family=Amatic+SC:700' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../js/modernizr.js"></script>
    </head>
    <body>  
        <div id="main-section" class="section">
            <nav>
                <div id="main-nav" class="nav-area init-nav">
                    <ul>
                        <li class="nav-link"><a href="../index.html">Home</a></li>
                        <!--li class="nav-link"><a href="battlegrounds.php">Battle Grounds</a></li-->
                        <li class="nav-link"><a href="../rules.php">War Rules</a></li>
                        <li class="nav-link"><a href="">Heroes' Journeys</a></li>
                        <li class="nav-link"><a href="../contacts.php">Contact Us</a></li>
                        <li class="nav-link"><a href="https://www.facebook.com/thekryptosmec" target="_blank">Our Community</a></li>
                    </ul>
                    <div id="nav-ornament"></div>
                </div>
            </nav>
        </div>
        <div class="board">
            <div class="cd-gallery-container">
                <div class="cd-gallery cd-container">
                    <?php
                        require '../config.php';
                        $sql="SELECT fbid,levelid from $usertable2 where nigger <> 1 AND levelid > 1 order by levelid desc,time asc";
                        $recset=mysql_query($sql) or die("There is some technical error");
                        $i=0;
                        while($row=mysql_fetch_array($recset)) {
                            $fbid=$row["fbid"];
                            $sql1="SELECT firstname,lastname from $usertable where fbid = $fbid";
                            $recset1=mysql_query($sql1) or die("There is some technical error");
                            $row1=mysql_fetch_array($recset1);
                            $rno=rand (1,27);
                            $str="i".$rno.".jpg";
                            if($i%4==0) {
                                echo "<div class=\"row\">";
                            echo "<div class=\"col s3\">".
                            "<ul class=\"cd-item-wrapper\">".
                                "<li data-type=\"main\" class=\"is-visible\">".
                                    "<div class=\"card\">".
                                        "<div class=\"card-image\">".
                                            "<img src=\"new/".$str."\">".
                                            "<div class=\"card-title\">".
                                                $row1["firstname"]." ".$row1["lastname"]."<br>".
                                                "Level ".$row["levelid"].
                                            "</div>".
                                        "</div>".
                                    "</div>".
                                "</li>".
                            "</ul>".
                        "</div>";
                            }
                        if($i%4==3) 
                            echo "</div>";
                        $i++;
                        }
                    ?>
                </div> <!-- cd-gallery -->
            </div> <!-- cd-gallery-container -->
        </div>            
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="../js/leader.js"></script>
        <script src="../js/scripts.js" type="text/javascript"></script>
        <script type="text/javascript"src="../js/main.js"></script>
    </body>
</html>