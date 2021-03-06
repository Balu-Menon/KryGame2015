<?php
date_default_timezone_set('Asia/Calcutta');
$dest = mktime(00,36,00,8,30,2015); 
//echo $dest;echo "<br>";
$date = new DateTime();
//echo $date->getTimestamp();echo "<br>";
//echo TIME();echo "<br>";
$dif=$dest-TIME();
$b4time=mktime(00,36,00,8,30,2015); //is the equivalent of dest. dont forget to change before upload
if($dif<=0)
{
?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <title>Kryptos | Excel 2015</title>        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="Kryptos is an online Treasure hunt which is the best of its kind. Varied levels with puzzles, clues, cryptograohy, hacking is to be done for a true sherlock to win this game of Treasure hunt. Google and Wikipedia will help you to win this quest to win the bounty and find the treasure." />
        <meta name="keywords" content="excelmec, excel, mec, excel2015, 2015, online treasure hunt,online games, techfest, souoth india, kerala, cochin, model engineering college, model, engineering college, college, academy, engineering, electronics, computer science, electrical, biomedical, bio-medical, technology, inspire, innovate, biggest, technical, symposium"/>
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="icon" type="image/png" href="img/img.png" />
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/font_base64-0.css" type="text/css" media="all" />
        <link rel="stylesheet" type="text/css" href="css/component.css" />
        <script src="js/modernizr.custom.js"></script>
        <script src="//use.typekit.net/czo0wjz.js"></script>
        <script>try{Typekit.load();}catch(e){}</script>
        <link rel="stylesheet" href="css/login_form.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/hme.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-67070170-1', 'auto');
  ga('send', 'pageview');

</script>
    </head>    
    <body>
        <script type="text/javascript">
            $(window).load(function(){
                $("#loadingpage").css("display","none");
            });
        </script>
        <div id="loadingpage" style="display:visible; position:absolute; left:0%; top:0%; z-index:1000; background-color:white;  height:100%; width:100%;">
            <img src="img/loader.gif" style="position:relative;display:block;  top:35%; margin-left:auto; margin-right:auto;">
        </div>
        <div id="fb-root"></div>
        <script>
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=700212310113191";
                fjs.parentNode.insertBefore(js, fjs);
            }
            (document, 'script', 'facebook-jssdk'));
            
        </script>
        
        
        <div id="main-section" class="section">
            <div id="sound">
                <i class="fa fa-volume-up" id="sound_on" style="color:#f1f1f1;float:right;font-size:30px;padding: 15px 20px;display:block;"></i>
                <i class="fa fa-volume-off" id="sound_off" style="color:#f1f1f1;float:right;font-size:30px;padding: 15px 20px;display:none;"></i>
            </div>
            <nav>
                <div id="main-nav" class="nav-area init-nav">
                    <ul>
                        <li class="nav-link"><a href="index.html">Home</a></li>
                        <li class="nav-link"><a href="battlegrounds.php">Battle Grounds</a></li>
                        <li class="nav-link"><a href="rules.php">War Rules</a></li>
                        <li class="nav-link"><a href="leaderboard/">Leaderboard</a></li>
                        <li class="nav-link"><a href="contact.php">Contact Us</a></li>
                        <li class="nav-link"><a href="https://www.facebook.com/thekryptosmec" target="_blank">Our Community</a></li>
                    </ul>
                    <div id="nav-ornament"></div>
                </div>
            </nav>
        </div>
        <div class="content">
            <a id="fblogin" onclick="fb_login();">Login with facebook</a>
        </div>
        <a href="" target="_blank"><img id="kryptos-logo" src="img/krylogo.png"></a>
        <a href="http://mec.ac.in/" target="_blank"><img id="clg-logo" src="img/mec_logo.png"></a>
        <a href="http://excelmec.org/excel2015/" target="_blank"><img id="excel-logo" src="img/logo-mec.png"></a>
        <a href="https://mistlayer.com/" target="_blank"><img id="mist-logo" src="img/ml_2.png"></a>
        <!--social-->
        <div class="social">
            <a href="https://www.facebook.com/excelmec" target="_blank" id="soc1" alt="facebook"></a>
            <a href="https://plus.google.com/105749244546874520653/posts" target="_blank" id="soc2" alt="gplus"></a>
            <a href="https://twitter.com/excelmec" target="_blank" id="soc3" alt="twitter"></a>
            <a href="https://www.youtube.com/user/excelmec/feed" target="_blank" id="soc4" alt="youtube"></a>
        </div>
        
        
        <div id="facebook_social" style="position:fixed; top:24%; left:2%; color:white;z-index:700;">
            <p>Kryptos</p>
            <div class="fb-like" data-href="https://www.facebook.com/thekryptosmec" data-layout="box_count" data-action="like" data-show-faces="true" data-share="true" style="position:relative; height:40px; width:40px; top:0%; left:3%;"></div>
            <p>Excel</p>
            <div class="fb-like" data-href="https://www.facebook.com/excelmec" data-layout="box_count" data-action="like" data-show-faces="true" data-share="true" style="position:relative; height:40px; width:40px; top:0%; left:3%;"></div>
            
        </div>
        <!--Scripts-->
        <script src="js/classie.js"></script>
        <script src="js/scripts.js" type="text/javascript"></script>
        <script src="js/main.js" type="text/javascript"></script>
        <script src="js/facebook.js" type="text/javascript"></script>
        <audio loop="" autoplay="" class="audio">
            <source src="music.mp3" type="audio/mpeg">
        </audio>
        <script>
            var is_on=0,sound_off=0;
            $('#sound').click(function(){
                toggleMuteAudio();
                $('#sound_on').toggle(200);
                $('#sound_off').toggle(200);
            });
            
            function toggleMuteAudio(){
                $(".audio").prop("muted",!$(".audio").prop("muted"));
            }
        </script>
    </body>
</html>
<?php
}

else
    echo "Sorry Buddy your clock is too fast... We will unlock in ".$dif."Seconds";
?>