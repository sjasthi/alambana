<?php

  if(!isset($_SESSION)) { 
      session_start();
  } 

  include 'shared_resources.php';
?>

<!DOCTYPE HTML>
<html class="no-js">
<head>
<!-- Basic Page Needs
  ================================================== -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Born to give - Charity/Crowdfunding HTML5 Template</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<!-- Mobile Specific Metas
  ================================================== -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no">
<!-- CSS
  ================================================== -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="vendor/magnific/magnific-popup.css" rel="stylesheet" type="text/css">
<link href="vendor/owl-carousel/css/owl.carousel.css" rel="stylesheet" type="text/css">
<link href="vendor/owl-carousel/css/owl.theme.css" rel="stylesheet" type="text/css">
<!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
<link href="css/custom.css" rel="stylesheet" type="text/css"><!-- CUSTOM STYLESHEET FOR STYLING -->
<!-- Color Style -->
<link class="alt" href="colors/color1.css" rel="stylesheet" type="text/css">
<link href="style-switcher/css/style-switcher.css" rel="stylesheet" type="text/css">
<!-- SCRIPTS
  ================================================== -->
  <?php load_common_page_scripts() ?>
</head>
<body class="single-event">
<!--[if lt IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
<div class="body">
	<!-- Site Header Wrapper -->
    <?php load_common_page_header() ?>
    <!-- Hero Area -->
    <div class="hero-area">
    	<div class="page-banner parallax" style="background-image:url(images/inside9.jpg);">
        	<div class="container">
            	<div class="page-banner-text">
        			<h1 class="block-title">Events</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content -->
    <div id="main-container">
    	<div class="content">
        	<div class="container">
            	<div class="row">
                	<div class="col-md-8 content-block">
                    	<h3>Summer Camp: Students Get Together</h3>
                    	<div class="post-media">
                        	<img src="images/event1.jpg" alt="">
                        </div>
                        <div class="row">
                        	<div class="col-md-6 col-sm-6">
                                <span class="event-date">
                                    <span class="date">14</span>
                                    <span class="month">Jan</span>
                                    <span class="year">2016</span>
                                </span>
                                    <span class="meta-data">Thursday, 11:20 AM - 02:20 PM</span>
                        		<a href="#" class="btn btn-primary btn-event-single-book">Book Tickets</a>
                      		</div>
                            <div class="col-md-6 col-sm-6">
                                <ul class="list-group">
                                    <li class="list-group-item">200<span class="badge">Attendees</span></li>
                                    <li class="list-group-item">341 Magetic state, US<span class="badge">Location</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="spacer-20"></div>
                      	<p class="lead">Nepal has been seriously devastated by the recent earthquake. Over 8,000 people have died (with death toll rising), thousands more are injured, and countless more have been displaced. Many homes, temples, and public monuments have been destroyed throughout the affected areas.</p>
                        <p>Vestibulum quam nisi, pretium a nibh sit amet, consectetur hendrerit mi. Aenean imperdiet lacus sit amet elit porta, et malesuada erat bibendum. Cras sed nunc massa. Quisque tempor dolor sit amet tellus malesuada, malesuada iaculis eros dignissim. Aenean vitae diam id lacus fringilla maximus. Mauris auctor efficitur nisl, non blandit urna fermentum nec.</p>
                        <img src="images/img2.jpg" alt="" class="align-right">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque massa ipsum, efficitur a fermen tum sed, suscipit sit amet arcu. Ut ut finibus tortor, eu ultrices turpis. Mauris vitae elit nec diam elementum elementum. Mauris ante quam, consequat ac nibh placerat, lacinia sollicitudin mi. Duis facilisis nibh quam, sit amet interdum tellus sollicitudin tempor. Curabitur aliquam erat in nisl lobortis, ut pellentesque lectus viverra.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque massa ipsum, efficitur a fermen tum sed, suscipit sit amet arcu. Ut ut finibus tortor, eu ultrices turpis. Mauris vitae elit nec diam elementum elementum. Mauris ante quam, consequat ac nibh placerat, lacinia sollicitudin mi. Duis facilisis nibh quam, sit amet interdum tellus sollicitudin tempor. Curabitur aliquam erat in nisl lobortis, ut pellentesque lectus viverra. Aenean sodales aliquet arcu at aliquam. Vestibulum quam nisi, pretium a nibh sit amet, consectetur hendrerit mi. Aenean imperdiet lacus sit amet elit porta, et malesuada erat bibendum. Cras sed nunc massa. Quisque tempor dolor sit amet tellus malesuada, malesuada iaculis eros dignissim. Aenean vitae diam id lacus fringilla maximus. Mauris auctor efficitur nisl, non blandit urna fermentum nec.</p>
                    </div>
                    
                    <!-- Sidebar -->
                    <div class="col-md-4 sidebar-block">
                        <div class="widget widget_recent_causes">
                            <h3 class="widgettitle">Latest Causes</h3>
                            <ul>
                                <li>
                                    <a href="#" class="cause-thumb">
                                        <img src="images/cause1.jpg" alt="" class="img-thumbnail">
                                        <div class="cProgress" data-complete="88" data-color="42b8d4">
                                            <strong></strong>
                                        </div>
                                    </a>
                                   	<h5><a href="single-cause.php">Help small shopkeepers of Sunyani</a></h5>
                                    <span class="meta-data">10 days left to achieve</span>
                                </li>
                                <li>
                                    <a href="#" class="cause-thumb">
                                        <img src="images/cause5.jpg" alt="" class="img-thumbnail">
                                        <div class="cProgress" data-complete="75" data-color="42b8d4">
                                            <strong></strong>
                                        </div>
                                    </a>
                                   	<h5><a href="single-cause.php">Save tigers from poachers</a></h5>
                                    <span class="meta-data">32 days left to achieve</span>
                                </li>
                                <li>
                                    <a href="#" class="cause-thumb">
                                        <img src="images/cause6.jpg" alt="" class="img-thumbnail">
                                        <div class="cProgress" data-complete="88" data-color="42b8d4">
                                            <strong></strong>
                                        </div>
                                    </a>
                                   	<h5><a href="single-cause.php">Help rebuild Nepal</a></h5>
                                    <span class="meta-data">10 days left to achieve</span>
                                </li>
                            </ul>
                        </div>
                        <div class="widget sidebar-widget widget_categories">
                        	<h3 class="widgettitle">Event Categories</h3>
                            <ul>
                            	<li><a href="#">Education</a> (3)</li>
                            	<li><a href="#">Environment</a> (1)</li>
                            	<li><a href="#">Global warming</a> (6)</li>
                            	<li><a href="#">Water</a> (4)</li>
                            	<li><a href="#">Wild life</a> (2)</li>
                            	<li><a href="#">Small business</a> (12)</li>
                            </ul>
                        </div>
                        <div class="widget recent_posts">
                           	<h3 class="widgettitle">Latest Posts</h3>
                            <ul>
                                <li>
                                    <a href="single-post.php" class="media-box">
                                        <img src="images/post1.jpg" alt="">
                                    </a>
                                    <h5><a href="single-post.php">A single person can change million lives</a></h5>
                                    <span class="meta-data grid-item-meta">Posted on 11th Dec, 2015</span>
                                </li>
                                <li>
                                    <a href="single-post.php" class="media-box">
                                        <img src="images/post3.jpg" alt="">
                                    </a>
                                    <h5><a href="single-post.php">Donate your woolens this winter</a></h5>
                                    <span class="meta-data grid-item-meta">Posted on 11th Dec, 2015</span>
                                </li>
                                <li>
                                    <a href="single-post.php" class="media-box">
                                        <img src="images/post2.jpg" alt="">
                                    </a>
                                    <h5><a href="single-post.php">How to survive the tough path of life</a></h5>
                                    <span class="meta-data grid-item-meta">Posted on 06th Dec, 2015</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Site Footer -->
    <?php load_common_page_footer() ?>
    <!-- Libraries Loader -->
    <?php lib() ?>
    <!-- Style Switcher Start -->
    <?php style_switcher() ?>
</body>
</html>