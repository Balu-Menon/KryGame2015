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
        <title>Kryptos | Excel 2015</title>
        <link rel="stylesheet" href="../css/font_base64-0.css" type="text/css" media="all" />
        <link rel="dns-prefetch" href="//ajax.googleapis.com" />
        <!--link rel="dns-prefetch" href="//connect.facebook.net"/ -->
    
        <link rel="stylesheet" href="../css/normalize.min.css">
         <link rel="canonical" href="" />
        <link rel="stylesheet" href="../css/leader.css">
        <link rel="stylesheet" href="../css/main.css">
        <link href='https://fonts.googleapis.com/css?family=Amatic+SC:700' rel='stylesheet' type='text/css'>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script type="text/javascript" src="../js/modernizr.js"></script>
        <script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.nicescroll/3.6.0/jquery.nicescroll.min.js"></script>
    </head>
    <body>  
        <script type="text/javascript">
            $(window).load(function(){
                $("#loadingpage").css("display","none");
            });
            $(document).ready(function(){
                $("#galScroll").niceScroll({
                    scrollspeed: 75,
                    mousescrollstep: 40,
                    zindex: 70001,
                    hidecursordelay: 400,
                    cursoropacitymin: 0.4,
                    cursoropacitymax: 0.9,
                    cursorwidth: "7px",
                    cursorborderradius: "3px",
                    horizrailenabled: false
                });    
            });
        </script>
        <div id="loadingpage" style="display:visible; position:absolute; left:0%; top:0%; z-index:1000; background-color:white;  height:100%; width:100%;">
            <img src="../img/loader.gif" style="position:relative;display:block;  top:35%; margin-left:auto; margin-right:auto;">
        </div>
        <div id="main-section" class="section">
            <nav>
                <div id="main-nav" class="nav-area init-nav">
                    <ul>
                        <li class="nav-link"><a href="../index.html">Home</a></li>
                        <!--li class="nav-link"><a href="battlegrounds.php">Battle Grounds</a></li-->
                        <li class="nav-link"><a href="../rules.php">War Rules</a></li>
                        <li class="nav-link"><a href="">Heroes' Journeys</a></li>
                        <li class="nav-link"><a href="../contact.php">Contact Us</a></li>
                        <li class="nav-link"><a href="https://www.facebook.com/thekryptosmec" target="_blank">Our Community</a></li>
                    </ul>
                    <div id="nav-ornament"></div>
                </div>
            </nav>
        </div>
        <div class="board">
            <div class="cd-gallery-container">
                <div class="cd-gallery cd-container" id="galScroll">
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
                            if($i%4==0)
                                echo "<div class=\"row\">";
                            echo "<div class=\"col s3\">".
                            "<ul class=\"cd-item-wrapper\">".
                                "<li data-type=\"main\" class=\"is-visible\">".
                                    "<div class=\"card\">".
                                        "<div class=\"card-image\">".
                                            "<img src=\"new/".$str."\">".
                                            "<div class=\"card-title\">".
                                                "#".($i+1)." ".$row1["firstname"]." ".$row1["lastname"]."<br>".
                                                "Level ".$row["levelid"].
                                            "</div>".
                                        "</div>".
                                    "</div>".
                                "</li>".
                            "</ul>".
                        "</div>";
                        if($i%4==3) 
                            echo "</div>";
                        $i++;
                        }
                    ?>
                </div> <!-- cd-gallery -->
            </div> <!-- cd-gallery-container -->
        </div>
        <a href="#"><img id="clg-logo" src="../img/mec_logo.png"></a>
        <a href="#"><img id="excel-logo" src="../img/excel_ribbon.png"></a>
        <!--social-->
        <div class="social">
            <a href="https://www.facebook.com/excelmec" target="_blank" id="soc1" alt="facebook"></a>
            <a href="https://plus.google.com/105749244546874520653/posts" target="_blank" id="soc2" alt="gplus"></a>
            <a href="https://twitter.com/excelmec" target="_blank" id="soc3" alt="twitter"></a>
            <a href="https://www.youtube.com/user/excelmec/feed" target="_blank" id="soc4" alt="youtube"></a>
        </div>
        <?php 
            if($i==0) {
        ?>
        <div class="noEntry">
            <h2>Be the first to be here!</h2>
        </div>
        <?php 
            }
        ?>
        <script src="../js/leader.js"></script>
        <script src="../js/scripts.js" type="text/javascript"></script>
        <script type="text/javascript"src="../js/main.js"></script>
    </body>
</html>