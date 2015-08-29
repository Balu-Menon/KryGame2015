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
    </head>    
    <body>        
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
            <nav>
                <div id="main-nav" class="nav-area init-nav">
                    <ul>
                        <li class="nav-link"><a href="index.html">Home</a></li>
                        <!--li class="nav-link"><a href="battlegrounds.php">Battle Grounds</a></li-->
                        <li class="nav-link"><a href="rules.php">War Rules</a></li>
                        <li class="nav-link"><a href="leaderboard/">Heroes' Journeys</a></li>
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
        <a href="#"><img id="kryptos-logo" src="img/krylogo.png"></a>
        <a href="#"><img id="clg-logo" src="img/mec_logo.png"></a>
        <a href="#"><img id="excel-logo" src="img/excel_ribbon.png"></a>
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
        
        <div class="md-modal md-effect-3" id="login">
            <div class="md-content">
                <h4>Login | Kryptos 2015</h4>
                <div id='content'>
                    <section class='input'>
                        <div>
                            <form>
                                <input type='text' id="fname" placeholder='FirstName'>
                                <input type='text' id="lname" placeholder='LastName'>
                                <input type='text' id="dob" placeholder='Date Of Birth'>
                                <input type='text' id="clg" placeholder='College'>
                                <input type='submit' id="clg">
                            </form>
                        </div>
                    </section>         
                </div>
                    <a class="md-close">Close me!</a>
                </div>
            </div>
        
        <!--Scripts-->
        <script src="js/classie.js"></script>
        <script src="js/modalEffects.js"></script>
        <script>
            // this is important for IEs
            var polyfilter_scriptpath = '/js/';
        </script>
        <script src="js/cssParser.js"></script>
        <script src="js/css-filters-polyfill.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script src="js/scripts.js" type="text/javascript"></script>
        <script src="js/main.js" type="text/javascript"></script>
        <script src="js/facebook.js" type="text/javascript"></script>
    </body>
</html>
<?php
}

else
    echo "Sorry Buddy your clock is too fast... We will unlock in ".$dif."Seconds";
?>