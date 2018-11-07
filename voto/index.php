<!DOCTYPE HTML>
<?php           
	$pos = strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE');
	if ($pos !== false) 
	{			
		 header("location: /esteiracomex/data/voto/index1.html");															
		exit;	 
	}	
?>
<html>
	<head>
		<title>Pesquisa CEOPC</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
			<link rel="stylesheet" href="css/style-noscript.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body class="loading">
		<div id="wrapper">
			<div id="bg"></div>
			<div id="overlay"></div>
			<div id="main">

				<!-- Header -->
					<header id="header">
						<h1>Obrigado pela participação.</h1>
						<p>Sua contribuição faz a diferença!</p>
						<nav>
							<ul>
					
							</ul>
						</nav>
					</header>

				<!-- Footer -->
					<footer id="footer">
						<span class="copyright"></span>
					</footer>
				
			</div>
		</div>
	</body>
</html>