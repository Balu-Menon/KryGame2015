<!DOCTYPE html>
<?php
	session_start();
	ini_set('session.cookie_lifetime',  0);
    
	if(!isset($_SESSION['usrno']) || $_SESSION['lev']!='level17.php')
	{
		header('Location:validate.php');
	}
	else 
	{
?>
<html lang="en">
   <head>
      <title>Flappy Game | Kryptos 2015</title>
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
      <!-- Style sheets -->
      <link href="css/reset.css" rel="stylesheet">
      <link href="css/main.css" rel="stylesheet">
   </head>
   <body>
      <div id="gamecontainer">
         <div id="gamescreen">
            <div id="sky" class="animated">
               <div id="flyarea">
                  <div id="ceiling" class="animated"></div>
                  <!-- This is the flying and pipe area container -->
                  <div id="player" class="bird animated"></div>
                  
                  <div id="bigscore"></div>
                  
                  <div id="splash"></div>
                  
                  <div id="scoreboard">
                     <div id="medal"></div>
                     <div id="currentscore"></div>
                     <div id="highscore"></div>
                     <div id="replay"><img src="assets/replay.png" alt="replay"></div>
                  </div>
                  
                  <!-- Pipes go here! -->
               </div>
            </div>
            <div id="land" class="animated"><div id="debug"></div></div>
         </div>
      </div>
      <div id="footer" style="text-align:center;color:#FF5050;padding-left:40%;">
          <a href="http://www.dotgears.com/" style="color:#FF5050;">original game/concept/art by Dong Nguyen</a>
          <a href="" style="color:#FF5050;">recreated by Nebez Briefkani</a>
          <a href="" style="color:#FF5050;">Edited By Kryptos 2015</a>
      </div>
      <div class="boundingbox" id="playerbox"></div>
      <div class="boundingbox" id="pipebox"></div>
      <!--30-->
      <script src="js/jquery.min.js"></script>
      <script src="js/jquery.transit.min.js"></script>
      <script src="js/buzz.min.js"></script>
      <script src="js/main.js"></script>
   </body>
</html>
<?php } ?>