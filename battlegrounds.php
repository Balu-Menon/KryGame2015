<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Kryptos | Excel 2015</title>
        <meta name="description" content="Kryptos is an online Treasure hunt which is the best of its kind. Varied levels with puzzles, clues, cryptograohy, hacking is to be done for a true sherlock to win this game of Treasure hunt. Google and Wikipedia will help you to win this quest to win the bounty and find the treasure." />
        <meta name="keywords" content="excelmec, excel, mec, excel2015, 2015, online treasure hunt,online games, techfest, souoth india, kerala, cochin, model engineering college, model, engineering college, college, academy, engineering, electronics, computer science, electrical, biomedical, bio-medical, technology, inspire, innovate, biggest, technical, symposium"/>
        <meta name="viewport" content="width=device-width">
        <link rel="icon" type="image/png" href="img/img.png"/>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/font_base64-0.css" type="text/css" media="all" />
        <script src="//use.typekit.net/czo0wjz.js"></script>
        <script>try{Typekit.load();}catch(e){}</script>
        <link rel="stylesheet" href="css/battlegrounds.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script src="js/jquery.js"></script>
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
        <div id="main-section" class="section">
            <div id="sound">
                <i class="fa fa-volume-up" id="sound_on" style="z-index:1000;color:#f1f1f1;float:right;font-size:30px;padding: 15px 20px;display:block;"></i>
                <i class="fa fa-volume-off" id="sound_off" style="z-index:1000;color:#f1f1f1;float:right;font-size:30px;padding: 15px 20px;display:none;"></i>
            </div>
            <nav>
                <div id="main-nav" class="nav-area init-nav">
                    <ul>
                        <li class="nav-link"><a href="index.html">Home</a></li>
                        <li class="nav-link"><a href="">Battle Grounds</a></li>
                        <li class="nav-link"><a href="rules.php">War Rules</a></li>
                        <li class="nav-link"><a href="leaderboard/">LeaderBoard</a></li>
                        <li class="nav-link"><a href="contact.php">Contact Us</a></li>
                        <li class="nav-link"><a href="https://www.facebook.com/thekryptosmec" target="_blank">Our Community</a></li>
                    </ul>
                    <div id="nav-ornament"></div>
                </div>
            </nav>
        </div>
        <div id="raid-section" class="section">
            <div class="bg sr init">
                <div class="nm"></div>
                <div class="hv"></div>
            </div>
            <div class="bg dd">
                <div class="nm"></div>
                <div class="hv"></div>
            </div>
            <div class="fade"></div>
            <div class="table-container">
                <div class="table-cell">
                    <div class="content">
                        <h1>Play</h1>
                        <a href="week1.php" class="popdown bgfx" data-bgfx="sr">Week One</a>
                        <a href="week2.php" class="popdown bgfx" data-bgfx="dd">Week Two</a>
                    </div>
                </div>
            </div> 
        </div> 
        
        <a href="http://mec.ac.in/" target="_blank"><img id="clg-logo" src="img/mec_logo.png"></a>
        <a href="http://excelmec.org/excel2015/" target="_blank"><img id="excel-logo" src="img/logo-mec.png"></a>
        <a href="https://mistlayer.com/" target="_blank"><img id="mist-logo" src="img/ml_2.png"></a>
        <!--Scripts-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script src="js/scripts.js" type="text/javascript"></script>
        <script src="js/main.js" type="text/javascript"></script>
        <script src="js/battlegrounds.js" type="text/javascript"></script>
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