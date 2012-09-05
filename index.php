<!DOCTYPE html>
<html lang="en">
<head>
	<title>Nanofy - Minify infinitely</title>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="author" content="Marten Moolenaar, Zodan Media" />
	<meta name="keywords" content="Nanofy, Microfy, zodan, doofpot, concept, creative, code, create, hoedan, Marten, Henry, " />
	<meta name="description" content="Nanofy - Minifying made more mini - infinitely." />
    <meta name="googlebot" content="index,follow" />
    <meta name="revisit-after" content="7 days" />

    <meta name="robots" content="index,follow" />

	<!-- Stylesheets -->
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700|Rokkitt:700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css?v=1.0" />
	<!-- Favicons -->
	<link rel="shortcut icon" href="img/favicon.ico?v=1.0" />

</head>
<body>
	<!-- Start Wrapper -->
	<div id="page_wrapper">

	<!-- Start Header -->
	<header>
		<div class="container">
			<!-- Start Social Icons -->
			<aside>
				<ul class="social">
					<li class="twitter"><a href="#">Twitter</a></li>
					<li class="rss"><a href="#" title="App Updates">RSS</a></li>
				</ul>
			</aside>
			<!-- End Social Icons -->

			<!-- Start Navigation -->
			<nav>
				<ul>
					<li><a href="#home">Main</a></li>
					<li><a href="#documentation">Documentation</a></li>
					<li><a href="#updates">Updates</a></li>
				</ul>
				<span class="arrow"></span>
			</nav>
			<!-- End Navigation -->
		</div>
	</header>
	<!-- End Header -->

	<section class="container">

		<!-- Start App Info -->
		<div id="app_info">
			<!-- Start Logo -->
			<a href="#home" class="logo">
				<img src="img/infinity.png" width="233" height="134" alt="nanofy - infinitely" title="Nanofy Me" />
			</a>
			<!-- End Logo -->
			<span class="tagline">Nanofy - infinitely</span>
			<p>Minifying is great, but it still leaves us with files that exceed the absolute minimum filesize.</p>
            <p>So from now on, stop minifying and start using Nanofy.</p>

			<div class="buttons">
			<?php /*
				<a href="#" class="large_button" id="blackberry" target="_blank">
					<span class="icon"></span>
					<em>Fork Me on</em> Github
				</a>
			*/ ?>
				<a href="src/nanofy.zip" class="large_button" id="android">
					<span class="icon"></span>
					<em>Get the Code</em> Download
				</a>
			</div>
		</div>
		<!-- End App Info -->

		<!-- Start Pages -->
		<div id="pages">
			<div class="top_shadow"></div>


			<!-- Start Home -->
			<div id="home" class="page">
				<h1>Use Nanofy</h1>
				<div class="full">
					<div id="reply_message"></div>
					<div id="file_message"></div>
					<form action="nanofy.php" id="nanofy-form" method="post" encType="multipart/form-data" class="jqtransform">
						<fieldset>
							<p><label for="nanofy-upload">Select your file</label><input type="file" name="nanofy-upload" id="nanofy-upload" /></p>
							<p><input class="button green" type="submit" value="Crunch away, honey!" name="start-nanofy" /></p>
						</fieldset>
					</form>
                </div>
			</div>
			<!-- End Home -->

			<!-- Start Documentation -->
			<div id="documentation" class="page">
				<h1>Documentation</h1>
				<div class="full">
					<p>Ehhhhh. You *really* need help on this?</p>
					<p>To Nanofy (zeptofy, yoctofy, infinify, whateverfy) your files, just click locate the file on your local hard drive and hit the crunch button to crunch away, my friend.</p>
					<p>It will upload the selected file and crunch it to pieces.</p>
                </div>
			</div>
			<!-- End Documentation -->

			<!-- Start Updates -->
			<div id="updates" class="page">
				<h1>Updates</h1>
				<div class="releases">
					<article class="release">
						<h2>Version 0.000000001</h2>
						<span class="date">Re-released on May 6th, 2011</span>
						<ul>
							<li class="new"><span><b>Done</b></span> Re-release of original from 2002.</li>
							<!--//<li class="fix"><span><b>fix</b></span> </li>//-->
						</ul>
					</article>
				</div>
			</div>
			<!-- End Updates -->


			<div class="bottom_shadow"></div>
		</div>
		<!-- End Pages -->

		<div class="clear"></div>
	</section>

	<!-- Start Footer -->
	<footer class="container">
		<p><a href="http://zodan.nl/" style="color: #999">Nanofy is a useless project. By Zodan</a></p>
	</footer>
	<!-- End Footer -->

	</div>
	<!-- End Wrapper -->
    
	<!-- Javascripts -->
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<![endif]-->
    <script type="text/javascript" src="js/jquery.filestylecss.js"></script>
<?php /*
	<script type="text/javascript" src="js/jquery.tipsy.js"></script>
	<script type="text/javascript" src="js/jquery.touchSwipe.js"></script>
	<script type="text/javascript" src="js/jquery.mobilemenu.js"></script>
	<script type="text/javascript" src="js/jquery.infieldlabel.js"></script>
*/ ?>
	<script type="text/javascript" src="js/own.js?v=1.0"></script>
</body>
</html>