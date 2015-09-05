<?php
	session_start();
	ini_set('session.cookie_lifetime',  0);
	if(!isset($_SESSION['usrno']) || $_SESSION['lev']!='toplevel/')
	{
		header('Location: ../error.php');
	}
	else 
	{
	?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"> <!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Kryptos | Excel 2015</title>
    <!-- Font Awesome -->
    <link rel="icon" type="image/png" href="img/img.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Libs CSS -->
    <link type="text/css" media="all" href="css/bootstrap.min.css" rel="stylesheet" />
    <!-- Template CSS -->
    <link type="text/css" media="all" href="css/style.css" rel="stylesheet" />
    <!-- Responsive CSS -->
    <link type="text/css" media="all" href="css/respons.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Exo+2:400,100,100italic,200,200italic,300,300italic,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>

</head>
<body>
    <a href="http://mec.ac.in/" target="_blank"><img id="clg-logo" src="img/mec_logo.png"></a>
    <a href="http://excelmec.org/excel2015/" target="_blank"><img id="excel-logo" src="../img/logo-mec.png"></a>
    <div class="animationload">
        <div class="loader"></div>
    </div>
    <div id="wrapper">
        <div class="eggs">
            <div class="egg1"></div>
        </div>
        <h3 class="title">Woooooh!<br>Next question is about to hatch. Be patient.</h3>
    </div>
        <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="socials col-sm-12 text-center">
                    <div class="contact_icons">
                        <ul class="contact_socials clearfix">
                            <li>
                                <a class="socIcons" href="https://www.facebook.com/thekryptosmec" target="_blank">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a class="socIcons" href="https://plus.google.com/105749244546874520653/posts" target="_blank">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                            <li>
                                <a class="socIcons" href="https://twitter.com/excelmec" target="_blank">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a class="socIcons" href="https://www.youtube.com/user/excelmec/feed" target="_blank">
                                    <i class="fa fa-youtube"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="copyright">&copy; Excel 2015</div>
                </div>
            </div>
        </div>
    </footer>
    <a href="https://mistlayer.com/" target="_blank"><img id="mist-logo" src="../img/ml_2.png"></a>
    <script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/modernizr.custom.js" type="text/javascript"></script>
    <script src="js/jquery.nicescroll.min.js" type="text/javascript"></script>
    <script src="js/jquery.lwtCountdown-1.0.js" type="text/javascript"></script>
    <script src="js/scripts.js" type="text/javascript"></script>
</body>
</html>
<?php
    }
?>