<?php
	session_start();
	ini_set('session.cookie_lifetime',  0);
    
	if(!isset($_SESSION['usrno']) || $_SESSION['lev']!='level18.php')
	{
		header('Location:validate.php');
	}
	else 
	{
	?>

<!--DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Level 18 | Kryptos</title>
    <link rel="icon" type="image/png" href="img/img.png" />
    <meta name="description" content="Kryptos is an online Treasure hunt which is the best of its kind. Varied levels with puzzles, clues, cryptograohy, hacking is to be done for a true sherlock to win this game of Treasure hunt. Google and Wikipedia will help you to win this quest to win the bounty and find the treasure." />
    <meta name="keywords" content="excelmec, excel, mec, excel2015, 2015, online treasure hunt,online games, techfest, souoth india, kerala, cochin, model engineering college, model, engineering college, college, academy, engineering, electronics, computer science, electrical, biomedical, bio-medical, technology, inspire, innovate, biggest, technical, symposium"/>
	<link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/template.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/font_base64-0.css" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
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
    
</html-->
<?php } ?>