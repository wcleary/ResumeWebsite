<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if (IE 9)]><html class="no-js ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en-US">
<!--<![endif]-->
	<head>
	<!-- Meta Tags -->
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title>The Social Board</title>
		<meta name="description" content="Insert Your Site Description"/>
		<!-- Mobile Specifics -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="HandheldFriendly" content="true"/>
		<meta name="MobileOptimized" content="320"/>
		<!-- Mobile Internet Explorer ClearType Technology -->
		<!--[if IEMobile]>  <meta http-equiv="cleartype" content="on">  <![endif]-->
		<!-- Bootstrap -->
		<link href="_include/css/bootstrap.min.css" rel="stylesheet">
		<!-- Main Style -->
		<link href="_include/css/main.css" rel="stylesheet">
		<!-- Supersized -->
		<link href="_include/css/supersized.css" rel="stylesheet">
		<link href="_include/css/supersized.shutter.css" rel="stylesheet">
		
		<!-- FancyBox -->
		<link href="_include/css/fancybox/jquery.fancybox.css" rel="stylesheet">
		<!-- Font Icons -->
		<link href="_include/css/fonts.css" rel="stylesheet">
		<!-- Shortcodes -->
		<link href="_include/css/shortcodes.css" rel="stylesheet">
		<!-- Responsive -->
		<link href="_include/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="_include/css/responsive.css" rel="stylesheet">
		<!-- Supersized -->
		<link href="_include/css/supersized.css" rel="stylesheet">
		<link href="_include/css/supersized.shutter.css" rel="stylesheet">
		<!-- Google Font -->
		<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900' rel='stylesheet' type='text/css'>
		<!-- Fav Icon -->
		<link rel="shortcut icon" href="#">
		<link rel="apple-touch-icon" href="#">
		<link rel="apple-touch-icon" sizes="114x114" href="#">
		<link rel="apple-touch-icon" sizes="72x72" href="#">
		<link rel="apple-touch-icon" sizes="144x144" href="#">
		<link rel="shorcut icon" href="_include/img/siteIcon.ico">
		<!-- Modernizr -->
		<script src="_include/js/modernizr.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<!-- jQuery Core -->
		<script src="_include/js/bootstrap.min.js"></script>
		<!-- Bootstrap -->
		<script src="_include/js/supersized.3.2.7.min.js"></script>
		<!-- Slider -->
		<script src="_include/js/waypoints.js"></script>
		<!-- WayPoints -->
		<script src="_include/js/waypoints-sticky.js"></script>
		<!-- Waypoints for Header -->
		<script src="_include/js/jquery.isotope.js"></script>
		<!-- Isotope Filter -->
		<script src="_include/js/jquery.fancybox.pack.js"></script>
		<!-- Fancybox -->
		<script src="_include/js/jquery.fancybox-media.js"></script>
		<!-- Fancybox for Media -->
		<script src="_include/js/jquery.tweet.js"></script>
		<!-- Tweet -->
		<script src="_include/js/plugins.js"></script>
		<!-- Contains: jPreloader, jQuery Easing, jQuery ScrollTo, jQuery One Page Navi -->
		<script src="_include/js/main.js"></script>
		<!-- Default JS 
		<script src="_include/js/instagram.js" type="text/javascript"></script>
		<script src="_include/js/spectragram.js" type="text/javascript"></script>-->
		<?php
			//require_once('_include/php/instagram.php');
			require_once('_include/php/facebook/facebook.php');
			require_once('_include/php/twitter/twitter.php');
		?>	
		<script>
		function tweet(){
			// alert(document.getElementById("tweet").value);
			$.ajax({
		    		type: "POST",
		    		url: '_include/php/twitter/tweet.php',
		    		data: "str="+document.getElementById("tweet").value,
		    		success:function(data){
		    			document.getElementById("tweet").value="";
		    			document.getElementById("tweet").placeholder=data;
		    		}
				});
		}
		function instaLike(id){
		    	// alert(id);
		    	$.ajax({
		    		type: "POST",
		    		url: '_include/php/instagram/instaLike.php',
		    		data: "Tid="+id,
		    		success:function(like){
		    			document.getElementById(id).src="_include/img/Liked";
		    		}
				});
		}
		function instaPost(id){
		    	// alert(id);
		    	$.ajax({
		    		type: "POST",
		    		url: '_include/php/instagram/instaPost.php',
		    		data: "Tid="+id+"&text="+document.getElementsByName(id)[0].value,
		    		success:function(like){
		    			// alert(like);
		    			document.getElementsByName(id)[0].value="";
		    		}
				});
		}
		function favorite(id){
		    	// alert(id);
		    	$.ajax({
		    		type: "POST",
		    		url: '_include/php/twitter/favorite.php',
		    		data: "Tid="+id,
		    		success:function(tweet){
		    			// alert(tweet);
		    		}
				});
			}
		</script>
	<!-- Analytics -->
	<!-- End Analytics -->
	</head>
	<body>
	<!-- This section is for Splash Screen -->
<div class="ole">
<section id="jSplash">
	<div id="circle"></div>
</section>
</div>
	<!-- End of Splash Screen -->
	<!-- Homepage Slider -->
<div id="home-slider">	
    <!--<div class="overlay"></div> UNCOMMENT THIS FOR THE FINAL VERSION OF THE WEBSITE--> 
    <!-- comment the follwing for the final version -->
    <div class="slider-text">
    </div>
    
    
    <!-- put the login box here UNCOMMENT THIS FOR THE FINAL VERSION OF THE WEBSITE -->
    <!--
    <div class="slider-text">    	
    	
        <h1>Sign In</h1>
		  <form action="" method="post">
		    <input type="text" name="username" class="username" placeholder="Username">
		    <input type="password" name="password" class="password" placeholder="Password">
            <button type="submit">Sign me in</button>
            <button type="submit">Create account</button>
    	   </form>
    </div>  
    -->
    
	<div class="control-nav">
        <a id="nextsection" href="#work"><i class="font-icon-arrow-simple-down"></i></a>
    </div>
  
</div>
<!-- Header -->
<header>
    <div class="sticky-nav">
    	<a id="mobile-nav" class="menu-nav" href="#menu-nav"></a>
        
        <div id="logo">
        	<a id="goUp" href="#home-slider" title="The Social Board">The Social Board</a>
        </div>
        
        <nav id="menu">
        	<ul id="menu-nav">
            	<li class="current"><a href="#home-slider">Home</a></li>
                <li><a href="#work">Your Social Board</a></li>
				<li><a href="#contact">Contact</a></li>
				<li><a href="#about">About</a></li>
            </ul>
        </nav>
        
    </div>
</header>
<!-- End Header -->
	<!-- Our Work Section -->
	<div id="work" class="page-alternate">
		<!-- Start Post Tweet -->
		<div>
			<p>
				<textarea class = "span12" rows="10"  id="tweet" placeholder="Tweet..."></textarea><input id="inTweet" type="image" src="_include/img/twitter.png" alt="Tweet" value="Tweet!" onclick="tweet();" >
			</p>
	<!-- 		<p>
				<textarea rows="10" cols="30" id="post" placeholder="Post to Facebook..."></textarea><input id="inFeed" type="button" value="Post!" onclick="post();" >
			</p> -->
		</div>
		<!-- End Post Tweet -->
		<div class="container">
			<!-- Portfolio Projects -->
			<div class="row">
				<div class="span3">
					<!-- Filter -->
					<nav id="options" class="work-nav">
					<ul id="filters" class="option-set" data-option-key="filter">
						<li class="type-work">Social Network Selection</li>
						<li><a href="#filter" data-option-value="*" class="selected">All</a></li>
						<li><a href="#filter" data-option-value=".Twitter">Twitter</a></li>
						<li><a href="#filter" data-option-value=".FaceBook">FaceBook</a></li>
						<li><a href="#filter" data-option-value=".instagram">Instagram</a></li>
					</ul>
						<a href="_include/php/clearsessions.php">Logout All<a/>
					</nav>
					<!-- End Filter -->
				</div>
				<div class="span9">
					<div class="row">
						<section id="projects">
						<ul id="thumbs">
							<div class="item-thumbs instagram userFeed"></div>
							<div class="item-thumbs FaceBook fbFeed"></div>
							<div class="item-thumbs Twitter twitterFeed"></div>
						</ul>
						
						</section>
					</div>
				</div>
			</div>
			<!-- End Portfolio Projects -->
		</div>
	</div>
	<!-- End Our Work Section -->

	<!-- Contact Section -->
	<div id="contact" class="page">
		<div class="container">
			<!-- Title Page -->
			<div class="row">
				<div class="span12">
					<div class="title-page">
						<!-- <h2 class="title">Get in Touch</h2> -->
						<h3 class="title-description">Please let us know about your experience.</h3>
					</div>
				</div>
			</div>
			<!-- End Title Page -->
			<!-- Contact Form -->
			<div class="row">
				<div class="span9">
					<form id="contact-form" class="contact-form" action="#">
						<p class="contact-name">
							<input id="contact_name" type="text" placeholder="Full Name" value="" name="name"/>
						</p>
						<p class="contact-email">
							<input id="contact_email" type="text" placeholder="Email Address" value="" name="email"/>
						</p>
						<p class="contact-message">
							<textarea id="contact_message" placeholder="Your Message" name="message" rows="15" cols="40"></textarea>
						</p>
						<p class="contact-submit">
							<a id="contact-submit" class="submit" href="#">Send Your Email</a>
						</p>
						<div id="response">
						</div>
					</form>
				</div>
				<div class="span3">
					<div class="contact-details">
						<h3>Contact Details</h3>
						<ul>
							<li><a href="https://www.facebook.com/TheSocialBoard1"> Facebook</a></li>
							<li><a href="https://twitter.com/TheSocialBoard1"> Twitter</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- End Contact Form -->
		</div>
	</div>
	<!-- End Contact Section -->
		<!-- About Section -->

	<div id="about" class="page-alternate">
	<div class="container">
        <!-- Title Page -->
            <div class="row">
                <div class="span12">
                    <div class="title-page">
                    <h3> ABOUT </h3>
                        <h5>The Social Board is ... </h5>
                        <h6> a new way to use your favorite social networks all in one page! </h6>
                   		<h3> Q &amp; A </h3>
                   			<h5>What social networks does The social Board have? </h5>
                   			<h6>The Social Board BETA version have: Facebook, Twitter, and Instagram. The next version is expected to include Pinterest as well.</h6>
                   			<h5>What can I view from the different social networks supported?</h5>
                   			<h6>FACEBOOK: You can view all of the images in your "photos of me folder" from your FaceBook account.</h6>
                   			<h6>TWITTER: You can view tweets of the accounts you are following on Twitter and post Tweets to your Tiwtter.</h6>
                   			<h6>INSTAGRAM: You can view and like images on your Instagram feed. </h6>
                   			<h5>What are some ofthe future changes and additions to The Social Board?</h5>
                   			<h6>FACEBOOK: Allow the user to view faceBook feed, comment, like and share posts directly from The Social Board.</h6>
                   			<h6>TWITTER: Allow the user to follow and reply directly from The Social Board.</h6>
                   			<h6>INSTAGRAM: Allow the user to view posts from the accounts followed and comment on them. </h6>
                   			<h5>Please help us make The Social Board better by letting us know about your expereience. <a href="#contact"> Contact Us :) </a></h5>

                   </div>
                </div>
     </div>
	<!-- Help us make our help page better. Contact Us! -->

</div>
</div>
	<!-- End About Section -->

<!-- Socialize -->
<div id="social-area" class="page">
	<div class="container">
    	<div class="row">
            <div class="span12">
                <nav id="social">
                    <ul>
                        <li><a href="https://twitter.com/TheSocialBoard1" title="Follow Me on Twitter" target="_blank"><span class="font-icon-social-twitter"></span></a></li>
                        <li><a href="https://www.facebook.com/TheSocialBoard1" title="Follow Me on Facebook" target="_blank"><span class="font-icon-social-facebook"></span></a></li>
                        <li><a href="http://instagram.com/thesocialboard" title="Follow Me on Instegram" target="_blank"><span class="font-icon-camera"></span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- End Socialize -->
	<!-- Footer -->
	<footer>
	<p class="credits">
		&copy;2013 Brushed. <a href="http://themes.alessioatzeni.com/html/brushed/" title="Brushed | Responsive One Page Template">Brushed Template</a> by <a href="http://www.alessioatzeni.com/" title="Alessio Atzeni | Web Designer &amp; Front-end Developer">Alessio Atzeni</a>
	</p>
	</footer>
	<!-- End Footer -->
	<!-- Back To Top -->
	<a id="back-to-top" href="#">
	<i class="font-icon-arrow-simple-up"></i>
	</a>
	<!-- End Back to Top -->
	<!-- Js -->
	<!-- End Js -->
	<!-- End Js -->
	</body>
</html>