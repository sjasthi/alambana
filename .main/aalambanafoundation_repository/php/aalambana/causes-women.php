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
<script src="js/modernizr.js"></script><!-- Modernizr -->
</head>
<body>
<!--[if lt IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
<div class="body">
	<!-- Site Header Wrapper -->
    <?php load_common_page_header() ?>
    <!-- Hero Area -->
    <div class="hero-area">
    	<div class="page-banner parallax" style="background-image:url(images/women.jpg);">
        	<div class="container">
            	<div class="page-banner-text">
        			<h1 class="block-title">Woman Empower</h1>
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
                        <ul class="causes-list cause-page-listing">
                            <li class="causes-list-item cause-item">
                            	<div class="row">
                                	<div class="col-md-4 col-sm-4 list-thumb">
                                        <a href="single-cause.php">
                                            <img src="images/womenempowerment.png" alt="">
                                        </a>
                                       	<div class="cause-progress"><a class="cProgress" data-complete="88" data-color="F23827" data-toggle="tooltip" data-original-title="10 days left" data-placement="left"><strong></strong></a></div>
                                    </div>
                                    <div class="col-md-8 col-sm-8">
                                        <div class="cause-list-item-cont">
                                            <h3 class="post-title"><a href="single-cause.php">Empower Women</a></h3>
                                            <p>Empowering women means giving them the tools, opportunities, and support to thrive and achieve their goals.</p>
                                            <div class="meta-data">Donated $26400 / <span class="cause-target">$30000</span></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="causes-list-item cause-item">
                            	<div class="row">
                                	<div class="col-md-4 col-sm-4 list-thumb">
                                        <a href="single-cause.php">
                                            <img src="images/commresour.jpg" alt="">
                                        </a>
                                       	<div class="cause-progress"><a class="cProgress" data-complete="52" data-color="F6BB42" data-toggle="tooltip" data-original-title="25 days left" data-placement="left"><strong></strong></a></div>
                                    </div>
                                    <div class="col-md-8 col-sm-8">
                                        <div class="cause-list-item-cont">
                                            <h3 class="post-title"><a href="community-support.php">Community Support and Resources</a></h3>
                                            <p>Connect women with resources and support groups.</p>
                                            <div class="meta-data">Donated $21840 / <span class="cause-target">$40000</span></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="causes-list-item cause-item">
                            	<div class="row">
                                	<div class="col-md-4 col-sm-4 list-thumb">
                                        <a href="single-cause.php">
                                            <img src="images/advocacy.png" alt="">
                                        </a>
                                       	<div class="cause-progress"><a class="cProgress" data-complete="75" data-color="8CC152" data-toggle="tooltip" data-original-title="65 days left" data-placement="left"><strong></strong></a></div>
                                    </div>
                                    <div class="col-md-8 col-sm-8">
                                        <div class="cause-list-item-cont">
                                            <h3 class="post-title"><a href="single-cause.php">Advocacy and Awareness</a></h3>
                                            <p>Raise awareness and encourage activism for gender equality.</p>
                                            <div class="meta-data">Donated $15000 / <span class="cause-target">$20000</span></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="causes-list-item cause-item">
                            	<div class="row">
                                	<div class="col-md-4 col-sm-4 list-thumb">
                                        <a href="single-cause.php">
                                            <img src="images/empower.jpg" alt="">
                                        </a>
                                       	<div class="cause-progress"><a class="cProgress" data-complete="88" data-color="8CC152" data-toggle="tooltip" data-original-title="70 days left" data-placement="left"><strong></strong></a></div>
                                    </div>
                                    <div class="col-md-8 col-sm-8">
                                        <div class="cause-list-item-cont">
                                            <h3 class="post-title"><a href="single-cause.php">Empowerment Programs</a></h3>
                                            <p>Showcase initiatives and success stories.</p>
                                            <div class="meta-data">Donated $176000 / <span class="cause-target">$200000</span></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <!-- Page Pagination -->
                        <nav>
                       		<ul class="pagination pagination-lg">
                              	<li>
                                	<a href="#" aria-label="Previous">
                                  		<span aria-hidden="true">&laquo;</span>
                                	</a>
                              	</li>
                              	<li class="active"><a href="#">1</a></li>
                              	<li><a href="#">2</a></li>
                              	<li><a href="#">3</a></li>
                              	<li>
                                	<a href="#" aria-label="Next">
                                  		<span aria-hidden="true">&raquo;</span>
                                	</a>
                              	</li>
                        	</ul>
                       	</nav>
                    </div>
                    <div class="col-md-4 sidebar-block">
                        <div class="widget sidebar-widget widget_categories">
                        	<h3 class="widgettitle">Cause Categories</h3>
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
                        <div class="widget widget_testimonials">
                        	<h3 class="widgettitle">Stories of change</h3>
                            <div class="carousel-wrapper">
                                <div class="row">
                                    <ul class="owl-carousel carousel-fw" id="testimonials-slider" data-columns="1" data-autoplay="5000" data-pagination="no" data-arrows="yes" data-single-item="no" data-items-desktop="1" data-items-desktop-small="1" data-items-tablet="1" data-items-mobile="1">
                                        <li class="item">
                                            <div class="testimonial-block">
                                                <blockquote>
                                                    <p>Maria, a former domestic worker, started her own catering business with support from a women's empowerment group, now employing other women and thriving as an entrepreneur.</p>
                                                </blockquote>
                                                <!--<div class="testimonial-avatar"><img src="images/story1.jpg" alt="" width="70" height="70"></div>-->
                                                <div class="testimonial-info">
                                                    <div class="testimonial-info-in">
                                                        <strong>Maria</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="item">
                                            <div class="testimonial-block">
                                                <blockquote>
                                                    <p>Sarah, an advocate for women in STEM, overcame bias to become a respected engineer, inspiring girls to pursue careers in science and technology.</p>
                                                </blockquote>
                                                <!--<div class="testimonial-avatar"><img src="images/story2.jpg" alt="" width="70" height="70"></div>-->
                                                <div class="testimonial-info">
                                                    <div class="testimonial-info-in">
                                                        <strong>Sarah</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Site Footer -->
    <?php load_common_page_footer() ?>
    <!-- Donation Dialog -->
    <?php donate_dialog() ?>
    <!-- Libraries Loader -->
    <?php lib() ?>
    <!-- Style Switcher Start -->
    <?php style_switcher() ?>
</body>
</html>