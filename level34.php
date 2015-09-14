<?php
	session_start();
	ini_set('session.cookie_lifetime',  0);

	if(!isset($_SESSION['usrno']) || $_SESSION['lev']!='level34.php')
	{
		header('Location:validate.php');
	}
	else 
	{
	?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Level 34 | Kryptos</title>
    <meta name="description" content="Kryptos is an online Treasure hunt which is the best of its kind. Varied levels with puzzles, clues, cryptograohy, hacking is to be done for a true sherlock to win this game of Treasure hunt. Google and Wikipedia will help you to win this quest to win the bounty and find the treasure." />
    <meta name="keywords" content="excelmec, excel, mec, excel2015, 2015, online treasure hunt,online games, techfest, souoth india, kerala, cochin, model engineering college, model, engineering college, college, academy, engineering, electronics, computer science, electrical, biomedical, bio-medical, technology, inspire, innovate, biggest, technical, symposium"/>
    <link rel="icon" type="image/png" href="img/img.png" />
	<link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/template1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/font_base64-0.css" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <script src="js/facebook.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <script src="//use.typekit.net/czo0wjz.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>
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
    <div id="main-section" class="section">
        <nav>
            <div id="main-nav" class="nav-area init-nav">
                <ul>
                    <li class="nav-link"><a href="index.html">Home</a></li>
                    <!--li class="nav-link"><a href="battlegrounds.php">Battle Grounds</a></li-->
                    <li class="nav-link"><a href="rules.php">War Rules</a></li>
                    <li class="nav-link"><a href="leaderboard/">Leaderboard</a></li>
                    <li class="nav-link"><a href="contact.php">Contact Us</a></li>
                    <li class="nav-link"><a href="https://www.facebook.com/thekryptosmec" target="_blank">Our Community</a></li>
                </ul>
                <div id="nav-ornament"></div>
            </div>
        </nav>
    </div>
    <div id='wrap'>
        <div id='content'>
            <section class='input'>
                <div>
                    <div id="quest">
                        
                    </div>
                    <!-- <?php 
                                $x=array("2x+8","x+1","x+4","6x+12","x+7","x+9","2x+1","4x+2","x+2","x+5");
                                $i=rand(0,9);
                                print($x[$i]); 
                               
                        ?> -->
                    <form>
                        <input type='text' id="answer" placeholder='Answer here...' autocomplete="off">
                    </form>
                    <div class="go" id="submitter"  >
                        <img src="img/go-icon.png">
                        <a>
                            <div class="go-hover">
                                <img class="go-hovereff" src="img/go-ring.png">
                                <canvas width="215" height="215"></canvas>
                            </div>
                        </a>
                    </div>
                </div>
            </section>         
        </div>
    </div>
    
    <div class="md-modal md-effect-3" id="meme">
        <div class="md-content">
            <h3 id="wrongcontent">Wrong Answer</h3>
            <div>
                <img id="wrongimg" src="img/memes/meme1.jpg" style="max-height:300px;"><br/>
                <a class="md-close" id="redirect" onClick="alert;">Try Again!</a>
            </div>
        </div>
    </div>
    
    <div class="social">
            <a href="https://www.facebook.com/excelmec" target="_blank" id="soc1" alt="facebook"></a>
            <a href="https://plus.google.com/105749244546874520653/posts" target="_blank" id="soc2" alt="gplus"></a>
            <a href="https://twitter.com/excelmec" target="_blank" id="soc3" alt="twitter"></a>
            <a href="https://www.youtube.com/user/excelmec/feed" target="_blank" id="soc4" alt="youtube"></a>
        </div>
        
    
    <a href="#"><img id="clg-logo" src="img/mec_logo.png"></a>
    <a href="http://excelmec.org/excel2015/" target="_blank"><img id="excel-logo" src="img/logo-mec.png"></a>
    <a href="https://mistlayer.com/" target="_blank"><img id="mist-logo" src="img/ml_2.png"></a>
    <!--Scripts-->
    <script src='js/template.js'></script>
    <script src="js/scripts.js" type="text/javascript"></script>
    <script src="js/main.js" type="text/javascript"></script>
	<script>
		$('section :input').val('').Input()[0].focus();
        function init(str){
            var input = $('section input').val('')[0],
                //s = 'type something... ✌'.split('').reverse(),
                len = s.length-1,
                e = $.Event('keypress');			 	
            input.nextElementSibling.className = '';
            var	initInterval = setInterval(function(){
                if( s.length ){
                    var c = s.pop();
                    Input.writer(c, input, len-s.length).setCaret(input);
                    input.value += c;
                    //e.charCode = c.charCodeAt(0);
                    //input.trigger(e);
                }
                else clearInterval(initInterval);
            },150);
        }
        
        var state=0;
        //key events
        $(document).keydown(function(e) {
            var key = e.which;
            //enter key
            if(key==13) {
                return false;
            }
            return true;
        });
        
        $(window).load(function(){
            //var modal3 = document.getElementById("meme");
            var modal8 = document.getElementById("meme");
            $("#quest").load("quests/3dac2429ce0c5985bbfc1ee375b44072.txt");        
            $("#submitter").click(function(){
                var answer=document.getElementById("answer").value;
                var values={answer:answer,rand:<?php echo $i; ?>};
                $.ajax({
                    type:"POST",
                    url: 'ans.php',
                    data: values,
                    success: function(data, status){
                        console.log(data);
                        var obj=JSON.parse(data);
                        
                        if(obj.resp=="563b9ab8b16c5c96be563348975b9783")
                        {
                            var wrongans=["Bad Luck Dude....","are you KIDDING ME...","You deserve a medal 4 tat one...","Go Sleep...","Are you desperate???","No comments...","Try Harder next time...","So smart..."];
                            var i=Math.floor(Math.random()*8);
                            var j=Math.floor(Math.random()*15);
                            var img="img/memes/meme"+j+".jpg";
                            $("#wrongcontent").text(wrongans[i]);
                            $("#wrongimg").attr("src",img);
                            setTimeout(function(){
                                state=1;
					            classie.toggle( modal8, 'md-show' );
                            },2000);
                        }
                        else
                        {
                            FB.api('/me/feed', 'post', {
                                message: "I Just unlocked Level 34 of Kryptos! Can you do better? Prizes worth 15K!!!\nStart Playing Now!\nhttp://kryptos.excelmec.org/\nhttps://www.facebook.com/excelmec\n#Kryptos2015\n#Addicted",
                                name: "Kryptos 2015",
                            });
                            window.location.replace('validate.php');
                        }
                    },
                    error: function(){
                        alert("There was an error in passing....please excuse us.");
                    }
                });
            });
        });
        $("#redirect").click(function(){
	state=0;
    
    var modal8 = document.getElementById("meme");
    classie.remove(modal8, 'md-show' ); 
	
	
});
    </script>
    <script src="js/classie.js"></script>
    <script src="js/modalEffects.js"></script>
    <script>
        // this is important for IEs
        var polyfilter_scriptpath = '/js/';
    </script>
    <script src="js/cssParser.js"></script>
    <script src="js/css-filters-polyfill.js"></script>
</body> 
</html>
<?php } ?>