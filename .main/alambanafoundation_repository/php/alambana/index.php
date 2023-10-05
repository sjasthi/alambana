<?php

    if(!isset($_SESSION)) 
    { 
        session_start();
    } 


?>


<!DOCTYPE HTML>
<html class="no-js">
<head>
<!-- Basic Page Needs
  ================================================== -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Alambana Foundation - Empowering Dreams through Education</title>
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
    <div class="site-header-wrapper">
        <!-- Site Header -->
        <header class="site-header">
            <div class="container">
                <div class="site-logo">
                    <a href="index.php" class="default-logo"><img src="images/logo.png" alt="Logo"></a>
                    <a href="index.php" class="default-retina-logo"><img src="images/logo@2x.png" alt="Logo" width="199" height="30"></a>
                    <a href="index.php" class="sticky-logo"><img src="images/sticky-logo.png" alt="Logo"></a>
                    <a href="index.php" class="sticky-retina-logo"><img src="images/sticky-logo@2x.png" alt="Logo" width="199" height="30"></a>
                </div>
             	<a href="#" class="visible-sm visible-xs" id="menu-toggle"><i class="fa fa-bars"></i></a>
                <div class="header-info-col"><i class="fa fa-phone"></i> +91 (81-ALAMBANA)</div>
                <ul class="sf-menu dd-menu pull-right" role="menu">
                    <li><a href="index.php">Home</a>
                            <!-- <ul>
                                <li><a href="index2.php">Home version 2</a></li> -->
                                <!-- <li><a href="index3.php">Home version 3</a></li> -->
                                <!-- <li><a href="index.php">Header Styles</a></li>

                                    <ul>
                                        <li><a href="index.php">Style 1 (Default)</a></li>
                                        <li><a href="header-style2.php">Style 2</a></li>
                                        <li><a href="header-style3.php">Style 3</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li> -->
                    <li><a href="about.php">About</a>
                    	<ul>
                    		<li><a href="about.php">Introduction</a></li>
                    		<li><a href="team.php">Team</a></li>
                    		<li><a href="our-impact.php">Our Impact</a></li>
                    		<li><a href="contact.php">Contact</a></li>
                        </ul>
                    </li>
                    <li><a href="causes.php">Community Support</a>
                    	<ul>
                    		<li><a href="causes-education.php">Education</a></li>
                    		<li><a href="causes-hunger.php">Hunger Relief</a></li>
                    		<li><a href="causes-women.php">Women Empowerment</a></li>
                            <li><a href="causes-community.php">Community Development</a></li>
                        </ul>
                    </li>
                    <li><a href="events.php">Events</a>
                    	<ul>
                    		<li><a href="events-grid.php">Events Grid</a></li>
                    		<li><a href="events-calendar.php">Events Calendar</a></li>
                        </ul>
                    </li>
                    <li><a href="gallery-caption-2cols.php">Gallery</a>
                    	<ul>
                    		<li><a href="gallery-caption-2cols.php">Gallery with Caption</a>
                                <ul>
                                    <li><a href="gallery-caption-2cols.php">2 Columns</a></li>
                                    <li><a href="gallery-caption-3cols.php">3 Columns</a></li>
                                    <li><a href="gallery-caption-4cols.php">4 Columns</a></li>
                                </ul>
                            </li>
                    		<li><a href="gallery-2cols.php">Gallery without Caption</a>
                                <ul>
                                    <li><a href="gallery-2cols.php">2 Columns</a></li>
                                    <li><a href="gallery-3cols.php">3 Columns</a></li>
                                    <li><a href="gallery-4cols.php">4 Columns</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="megamenu"><a href="javascrip:void(0)">Features</a>
                        <ul class="dropdown">
                            <li>
                                <div class="megamenu-container container">
                                    <div class="row">
                                        <div class="col-md-3 megamenu-col">
                                        	<span class="megamenu-sub-title"><i class="fa fa-bookmark"></i> Features</span>
                                            <ul class="sub-menu">
                                                <li><a href="shortcodes.php">Shortcodes</a></li>
                                                <li><a href="typography.php">Typography</a></li>
                                                <li><a href="privacy-policy.php">Privacy policy</a></li>
                                                <li><a href="payment-terms.php">Payment terms</a></li>
                                                <li><a href="refund-policy.php">Refund policy</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-3 megamenu-col">
                                        	<span class="megamenu-sub-title"><i class="fa fa-newspaper-o"></i> Latest news</span>
                                        	<div class="widget recent_posts">
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
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-3 megamenu-col">
                                        	<span class="megamenu-sub-title"><i class="fa fa-microphone"></i> Latest causes</span>
                                            <ul class="widget_recent_causes">
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
                                            </ul>
                                        </div>
                                        <div class="col-md-3 megamenu-col">
                                        	<span class="megamenu-sub-title"><i class="fa fa-star"></i> Featured Video</span> 
                                            <div class="fw-video"><iframe src="https://player.vimeo.com/video/62947247" width="500" height="275"></iframe></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                      	</ul>
                  	</li>
                    <li><a href="blog.php">Blog</a>
                        <ul class="dropdown">
                            <li><a href="blog.php">Blog Classic</a></li>
                            <li><a href="blog-grid.php">Blog Grid</a></li>
                            <li><a href="single-post.php">Single Post</a></li>
                        </ul>
                    </li>
              	</ul>
            </div>
        </header>
    </div>
    <!-- Hero Area -->
    <div class="hero-area">
    	<!-- Start Hero Slider -->
      	<div class="flexslider heroflex hero-slider" data-autoplay="yes" data-pagination="no" data-arrows="yes" data-style="fade" data-pause="yes">
            <ul class="slides">
                <li class="parallax" style="background-image:url(images/slide6.jpg)">
                	<div class="flex-caption">
                    	<div class="container">
                        	<div class="flex-caption-table">
                            	<div class="flex-caption-cell">
                                	<div class="flex-caption-text text-align-center">
                                        <h2>Make the world to smile</h2>
                                        <a href="causes.php" class="btn btn-warning">Start the change</a>
                                    </div>
                               	</div>
                          	</div>
                        </div>
                    </div>
                </li>
                <li class="parallax" style="background-image:url(images/slide2.jpg)">
                	<div class="flex-caption">
                    	<div class="container">
                        	<div class="flex-caption-table">
                            	<div class="flex-caption-cell">
                                	<div class="flex-caption-text text-align-center">
                                        <h2>Make a difference for people<br>who needs it the most</h2>
                                        <a href="causes.php" class="btn btn-primary">Start with a little</a>
                                    </div>
                               	</div>
                          	</div>
                        </div>
                    </div>
                </li>
                <li class="parallax" style="background-image:url(images/slide1.jpg)">
                	<div class="flex-caption">
                    	<div class="container">
                        	<div class="flex-caption-table">
                            	<div class="flex-caption-cell text-align-center">
                        			<div class="flex-caption-cause">
                            			<h3><a href="#">Please help</a></h3>
                    					<p>Lorem ipsum dolor sit amet, consectet adipiscing elit. Nam malesuada dapi bus diam, ut fringilla purus efficitur  eget.</p>
                                        	<span class="meta-data">Donated $26400 / <span class="cause-target">$30000</span></span>
                                    		<a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#DonateModal">Donate Now</a>
                          			</div>
                        		</div>
                    		</div>
                        </div>
                    </div>
                </li>
          	</ul>
       	</div>
        <!-- End Hero Slider -->
    </div>
    <div class="accent-bg padding-tb20 cta-fw">
        <div class="container">
            <a href="#" class="btn btn-default btn-ghost btn-light btn-rounded pull-right">Become a volunteer</a>
            <h4>Let's start doing your bit for the world. Join us as a Volunteer</h4>
        </div>
    </div>
    <!-- Main Content -->
    <div id="main-container">
    	<div class="content">
        	<div class="container">
            	<div class="row">
                    <div class="col-md-6 col-sm-6">
                    	<h4 class="accent-color short">Why to join</h4>
                    	<h1>Your support can make a huge difference</h1>
                    </div>
                    <div class="col-md-6 col-sm-6">
                    	<p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate <a href="#">velit esse</a> molestie consequat. Donec vel mauris quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.</p>
                        <p>Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla <a href="#">convallis egestas rhoncus</a>. Donec facilisis fermentum sem, ac viverra ante luctus vel.</p>
                    </div>
                </div>
                <div class="spacer-40"></div>
                <!-- Latest Causes -->
                <div class="carousel-wrapper">
                    <div class="row">
                        <ul class="owl-carousel carousel-fw" id="causes-slider" data-columns="5" data-autoplay="" data-pagination="yes" data-arrows="no" data-single-item="no" data-items-desktop="5" data-items-desktop-small="3" data-items-tablet="2" data-items-mobile="1">
                            <li class="item">
                                <div class="grid-item cause-grid-item small-business format-standard">
                                    <div class="grid-item-inner">
                                        <a href="single-cause.php" class="media-box">
                                            <img src="images/causeg1.jpg" alt="">
                                        </a>
                                        <div class="grid-item-content">
                                            <a class="cProgress" data-complete="88" data-color="F23827" data-toggle="tooltip" data-original-title="10 days left"><strong></strong></a>
                                            <h3 class="post-title"><a href="single-cause.php">Help small shopkeepers of Sunyani</a></h3>
                                            <div class="meta-data">Donated $26400 / <span class="cause-target">$30000</span></div>
                                        </div>
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#DonateModal">Donate Now</a>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="grid-item cause-grid-item small-business format-standard">
                                    <div class="grid-item-inner">
                                        <a href="single-cause.php" class="media-box">
                                            <img src="images/causeg2.jpg" alt="">
                                        </a>
                                        <div class="grid-item-content">
                                            <a class="cProgress" data-complete="52" data-color="F6BB42" data-toggle="tooltip" data-original-title="25 days left"><strong></strong></a>
                                            <h3 class="post-title"><a href="single-cause.php">Help relocate the refugees</a></h3>
                                            <div class="meta-data">Donated $21840 / <span class="cause-target">$40000</span></div>
                                        </div>
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#DonateModal">Donate Now</a>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="grid-item cause-grid-item small-business format-standard">
                                    <div class="grid-item-inner">
                                        <a href="single-cause.php" class="media-box">
                                            <img src="images/causeg5.jpg" alt="">
                                        </a>
                                        <div class="grid-item-content">
                                            <a class="cProgress" data-complete="75" data-color="8CC152" data-toggle="tooltip" data-original-title="65 days left"><strong></strong></a>
                                            <h3 class="post-title"><a href="single-cause.php">Save tigers from poachers</a></h3>
                                            <div class="meta-data">Donated $15000 / <span class="cause-target">$20000</span></div>
                                        </div>
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#DonateModal">Donate Now</a>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="grid-item cause-grid-item small-business format-standard">
                                    <div class="grid-item-inner">
                                        <a href="single-cause.php" class="media-box">
                                            <img src="images/causeg6.jpg" alt="">
                                        </a>
                                        <div class="grid-item-content">
                                            <a class="cProgress" data-complete="88" data-color="8CC152" data-toggle="tooltip" data-original-title="70 days left"><strong></strong></a>
                                            <h3 class="post-title"><a href="single-cause.php">Help rebuild Nepal</a></h3>
                                            <div class="meta-data">Donated $176000 / <span class="cause-target">$200000</span></div>
                                        </div>
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#DonateModal">Donate Now</a>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="grid-item cause-grid-item small-business format-standard">
                                    <div class="grid-item-inner">
                                        <a href="single-cause.php" class="media-box">
                                            <img src="images/causeg3.jpg" alt="">
                                        </a>
                                        <div class="grid-item-content">
                                            <a class="cProgress" data-complete="20" data-color="8CC152" data-toggle="tooltip" data-original-title="102 days left"><strong></strong></a>
                                            <h3 class="post-title"><a href="single-cause.php">Education for everyone</a></h3>
                                            <div class="meta-data">Donated $4000 / <span class="cause-target">$20000</span></div>
                                        </div>
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#DonateModal">Donate Now</a>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="grid-item cause-grid-item small-business format-standard">
                                    <div class="grid-item-inner">
                                        <a href="single-cause.php" class="media-box">
                                            <img src="images/causeg4.jpg" alt="">
                                        </a>
                                        <div class="grid-item-content">
                                            <a class="cProgress" data-complete="50" data-color="8CC152" data-toggle="tooltip" data-original-title="105 days left"><strong></strong></a>
                                            <h3 class="post-title"><a href="single-cause.php">Save water initiative</a></h3>
                                            <div class="meta-data">Donated $5000 / <span class="cause-target">$10000</span></div>
                                        </div>
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#DonateModal">Donate Now</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        
            <div class="spacer-50"></div>
            
            <div class="padding-tb75 lgray-bg">
            	<div class="container">
                	<div class="text-align-center">
                  		<h2 class="block-title block-title-center">Upcoming Events</h2>
                    </div>
                    <div class="spacer-20"></div>
                    <div class="carousel-wrapper">
                        <div class="row">
                            <ul class="owl-carousel carousel-fw" id="news-slider" data-columns="3" data-autoplay="" data-pagination="no" data-arrows="yes" data-single-item="no" data-items-desktop="3" data-items-desktop-small="2" data-items-tablet="1" data-items-mobile="1">
                                <li class="item">
                                    <div class="grid-item event-grid-item format-standard">
                                        <div class="grid-item-inner">
                                            <a href="single-event.php" class="media-box">
                                                <img src="images/event1.jpg" alt="">
                                            </a>
                                            <div class="grid-item-content">
                                                <span class="event-date">
                                                    <span class="date">14</span>
                                                    <span class="month">Jan</span>
                                                    <span class="year">2016</span>
                                                </span>
                                                <span class="meta-data">Thursday, 11:20 AM - 02:20 PM</span>
                                                <h3 class="post-title"><a href="single-event.php">Summer Camp: Students Get Together</a></h3>
                                                <ul class="list-group">
                                                    <li class="list-group-item">200<span class="badge">Attendees</span></li>
                                                    <li class="list-group-item">341 Magetic state, US<span class="badge">Location</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="item">
                                    <div class="grid-item event-grid-item format-standard">
                                        <div class="grid-item-inner">
                                            <a href="single-event.php" class="media-box">
                                                <img src="images/event2.jpg" alt="">
                                            </a>
                                            <div class="grid-item-content">
                                                <span class="event-date">
                                                    <span class="date">18</span>
                                                    <span class="month">Jan</span>
                                                    <span class="year">2016</span>
                                                </span>
                                                <span class="meta-data">Monday, 07:00 PM</span>
                                                <h3 class="post-title"><a href="single-event.php">Campaign: Fundraising for meals</a></h3>
                                                <ul class="list-group">
                                                    <li class="list-group-item">200<span class="badge">Attendees</span></li>
                                                    <li class="list-group-item">341 Magetic state, US<span class="badge">Location</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                             	</li>
                                <li class="item">
                                    <div class="grid-item event-grid-item format-standard">
                                        <div class="grid-item-inner">
                                            <a href="single-event.php" class="media-box">
                                                <img src="images/event3.jpg" alt="">
                                            </a>
                                            <div class="grid-item-content">
                                            <span class="event-date">
                                                <span class="date">26</span>
                                                <span class="month">Feb</span>
                                                <span class="year">2016</span>
                                            </span>
                                                <span class="meta-data">Friday, 01:00 PM</span>
                                                <h3 class="post-title"><a href="single-event.php">Campaign: Green Environment</a></h3>
                                                <ul class="list-group">
                                                    <li class="list-group-item">200<span class="badge">Attendees</span></li>
                                                    <li class="list-group-item">341 Magetic state, US<span class="badge">Location</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                             	</li>
                                <li class="item">
                                    <div class="grid-item event-grid-item format-standard">
                                        <div class="grid-item-inner">
                                            <a href="single-event.php" class="media-box">
                                                <img src="images/event4.jpg" alt="">
                                            </a>
                                            <div class="grid-item-content">
                                            <span class="event-date">
                                                <span class="date">02</span>
                                                <span class="month">Mar</span>
                                                <span class="year">2016</span>
                                            </span>
                                                <span class="meta-data">Wednesday, 10:00 AM</span>
                                                <h3 class="post-title"><a href="single-event.php">Campaign: Medical checkup camp</a></h3>
                                                <ul class="list-group">
                                                    <li class="list-group-item">200<span class="badge">Attendees</span></li>
                                                    <li class="list-group-item">341 Magetic state, US<span class="badge">Location</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                             	</li>
                                <li class="item">
                                    <div class="grid-item event-grid-item format-standard">
                                        <div class="grid-item-inner">
                                            <a href="single-event.php" class="media-box">
                                                <img src="images/event5.jpg" alt="">
                                            </a>
                                            <div class="grid-item-content">
                                                <span class="event-date">
                                                    <span class="date">02</span>
                                                    <span class="month">Mar</span>
                                                    <span class="year">2016</span>
                                                </span>
                                                <span class="meta-data">Wednesday, 01:30 PM</span>
                                                <h3 class="post-title"><a href="single-event.php">Tips: Rain water harvesting</a></h3>
                                                <ul class="list-group">
                                                    <li class="list-group-item">200<span class="badge">Attendees</span></li>
                                                    <li class="list-group-item">341 Magetic state, US<span class="badge">Location</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                             	</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="parallax parallax5 parallax-light text-align-center padding-tb100" style="background-image:url(images/parallax6.jpg)">
            	<div class="container">
                    <div class="carousel-wrapper">
                        <div class="row">
                            <ul class="owl-carousel carousel-fw" id="testimonials-slider" data-columns="1" data-autoplay="5000" data-pagination="no" data-arrows="yes" data-single-item="no" data-items-desktop="1" data-items-desktop-small="1" data-items-tablet="1" data-items-mobile="1">
                                <li class="item">
                                    <div class="testimonial-block">
                                        <blockquote>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                                        </blockquote>
                                        <div class="testimonial-avatar"><img src="images/story1.jpg" alt="" width="70" height="70"></div>
                                        <div class="testimonial-info">
                                            <div class="testimonial-info-in">
                                                <strong>Ada Ajimobi</strong>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="item">
                                    <div class="testimonial-block">
                                        <blockquote>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                                        </blockquote>
                                        <div class="testimonial-avatar"><img src="images/story2.jpg" alt="" width="70" height="70"></div>
                                        <div class="testimonial-info">
                                            <div class="testimonial-info-in">
                                                <strong>Chloe Lévesque</strong>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="spacer-75"></div>
            <!-- Latest Blog Posts -->
            <div class="container">
            	<div class="row">
                	<div class="col-md-4 col-sm-6 grid-item blog-grid-item format-standard">
                        <div class="grid-item-inner">
                            <a href="single-event.php" class="media-box">
                                <img src="images/post1.jpg" alt="">
                            </a>
                            <div class="grid-item-content">
                                <h3 class="post-title"><a href="single-post.php">A single person can change million lives</a></h3>
                                <span class="meta-data"><i class="fa fa-calendar"></i> Posted on 11th Dec, 2015</span>
                                <p>A blog post sample excerpt text which can be edited by editing the blog post page...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 grid-item blog-grid-item format-standard">
                        <div class="grid-item-inner">
                            <a href="single-event.php" class="media-box">
                                <img src="images/post2.jpg" alt="">
                            </a>
                            <div class="grid-item-content">
                                <h3 class="post-title"><a href="single-post.php">Donate your woolens this winter</a></h3>
                                <span class="meta-data"><i class="fa fa-calendar"></i> Posted on 11th Dec, 2015</span>
                                <p>A blog post sample excerpt text which can be edited by editing the blog post page...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 grid-item blog-grid-item format-standard">
                        <div class="grid-item-inner">
                            <a href="single-event.php" class="media-box">
                                <img src="images/post3.jpg" alt="">
                            </a>
                            <div class="grid-item-content">
                                <h3 class="post-title"><a href="single-post.php">How to survive the tough path of life</a></h3>
                                <span class="meta-data"><i class="fa fa-calendar"></i> Posted on 11th Dec, 2015</span>
                                <p>A blog post sample excerpt text which can be edited by editing the blog post page...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Site Footer -->
    <div class="site-footer parallax parallax3" style="background-image:url(images/parallax3.jpg)">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-4 col-sm-4">
                	<div class="widget footer_widget">
                    	<h4 class="widgettitle">About Alambana Foundation</h4>
                        <p><img src="images/logo.png" alt=""></p>
                        <p>Our mission is to provide access to education to financially disadvantaged students in order to transform their lives. By empowering disadvantaged individuals,
                             we hope to help close the socio-economic gap in India, creating a more just and united society.</p>
                        
                        <ul class="social-icons-rounded social-icons-colored">
                            <li class="facebook"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li class="youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                            <li class="vimeo"><a href="#"><i class="fa fa-vimeo"></i></a></li>
                            <li class="instagram"><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            	<div class="col-md-4 col-sm-4">
                	<div class="widget footer_widget widget_links">
                    	<h4 class="widgettitle">Blogroll</h4>
                        <ul>
                        	<li><a href="#">Become a volunteer</a></li>
                        	<li><a href="#">Our mission</a></li>
                        	<li><a href="#">Success stories</a></li>
                        	<li><a href="#">Meet our team</a></li>
                        </ul>
                    </div>
                </div>
            	<div class="col-md-4 col-sm-4">
                	<div class="widget footer_widget">
                    	<h4 class="widgettitle">Contact Us</h4>
                        <p style="color: white;">
                            Alambana Foundation - India Office<br>
                            4-222 Super Bazar Road<br>
                            Proddatur, 516360<br>
                            Andhra Pradesh, India<br>
                            +91 81-25262262
                        </p>
                        
                        <p>Email: <a href="mailto:admin@alambanafoundation.org" style="color: white;">admin@alambanafoundation.org</a></p>
   
                       <!-- <div class="twitter-widget" data-tweets-count="2"></div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Site Footer -->
    <div class="site-footer-bottom">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-6 col-sm-6">
                	<div class="copyrights-col-left">
                    	<p>&copy; 2023 Alambana Foundation. All Rights Reserved</p>
                    </div>
                </div>
            	<div class="col-md-6 col-sm-6"></div>
                	<div class="copyrights-col-right">
                    	<ul class="footer-menu">
                        	<li><a href="privacy-policy.php">Privacy policy</a></li>
                        	<li><a href="payment-terms.php">Payment terms</a></li>
                        	<li><a href="refund-policy.php">Refund policy</a></li>
                        </ul>
                    </div>
           	</div>
      	</div>
  	</div>
  	<a id="back-to-top"><i class="fa fa-angle-double-up"></i></a> 
</div>

<!-- Donate Form Modal -->
<div class="modal fade" id="DonateModal" tabindex="-1" role="dialog" data-backdrop="static">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<div class="row">
                    <div class="col-md-6 col-sm-6 donate-amount-option">
                        <h4>Choose an amount</h4>
                        <ul class="predefined-amount">
                            <li><label><input type="radio" name="donation-amount">$10</label></li>
                            <li><label><input type="radio" name="donation-amount">$20</label></li>
                            <li><label><input type="radio" name="donation-amount">$30</label></li>
                            <li><label><input type="radio" name="donation-amount">$50</label></li>
                            <li><label><input type="radio" name="donation-amount">$100</label></li>
                        </ul>
                    </div>
                    <span class="donation-choice-breaker">Or</span>
                    <div class="col-md-6 col-sm-6 donate-amount-option">
                        <h4>Enter your own</h4>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">$</span>
                            <input type="number" class="form-control">
                        </div>
                    </div>
               	</div>
      		</div>
      		<div class="modal-body">
       			<div class="row">
                	<div class="col-md-6 col-sm-6 donation-form-infocol">
                    	<h4>Address</h4>
                        <input type="text" class="form-control" placeholder="Address line 1">
                        <input type="text" class="form-control" placeholder="Address line 2">
       					<div class="row">
                			<div class="col-md-8 col-sm-8 col-xs-8">
                        		<input type="text" class="form-control" placeholder="State/City">
                            </div>
                			<div class="col-md-4 col-sm-4 col-xs-4">
                        		<input type="text" class="form-control" placeholder="Zipcode">
                            </div>
                    	</div>
       					<div class="row">
                			<div class="col-md-3 col-sm-3 col-xs-3">
                        		<label>Country</label>
                            </div>
                			<div class="col-md-9 col-sm-9 col-xs-9">
                                <select class="selectpicker">
                                    <option>United States</option>
                                    <option>Australia</option>
                                    <option>Netherlands</option>
                                </select>
                            </div>
                    	</div>
                    </div>
                	<div class="col-md-6 col-sm-6 donation-form-infocol">
                    	<h4>Personal info</h4>
       					<div class="row">
                			<div class="col-md-6 col-sm-6 col-xs-6">
                        		<input type="text" class="form-control" placeholder="First name">
                            </div>
                			<div class="col-md-6 col-sm-6 col-xs-6">
                        		<input type="text" class="form-control" placeholder="Last name">
                            </div>
                    	</div>
                        <input type="text" class="form-control" placeholder="Email address">
                        <input type="text" class="form-control" placeholder="Phone no.">
                        <label class="checkbox"><input type="checkbox"> Register me on this website</label>
                    </div>
                 </div>
      		</div>
      		<div class="modal-footer text-align-center">
        		<button type="button" class="btn btn-primary">Make your donation now</button>
                <div class="spacer-20"></div>
                <p class="small">Vestibulum quam nisi, pretium a nibh sit amet, consectetur hendrerit mi. Aenean imperdiet lacus sit amet elit porta, et malesuada erat bibendum. Cras sed nunc massa. Quisque tempor dolor sit amet tellus malesuada, malesuada iaculis eros dignissim. Aenean vitae diam id lacus fringilla maximus. Mauris auctor efficitur nisl, non blandit urna fermentum nec. Vestibulum quam nisi, pretium a nibh sit amet, consectetur hendrerit mi.</p>
      		</div>
    	</div>
  	</div>
</div>

<script src="js/jquery-2.1.3.min.js"></script> <!-- Jquery Library Call -->
<script src="vendor/magnific/jquery.magnific-popup.min.js"></script> <!-- Maginific Popup Plugin -->
<script src="js/ui-plugins.js"></script> <!-- UI Plugins -->
<script src="js/helper-plugins.js"></script> <!-- Helper Plugins -->
<script src="vendor/owl-carousel/js/owl.carousel.min.js"></script> <!-- Owl Carousel -->
<script src="js/bootstrap.js"></script> <!-- UI -->
<script src="js/init.js"></script> <!-- All Scripts -->
<script src="vendor/flexslider/js/jquery.flexslider.js"></script> <!-- FlexSlider -->
<script src="js/circle-progress.js"></script> <!-- Circle Progress Bars -->
<script src="vendor/countdown/js/jquery.countdown.min.js"></script> <!-- Jquery Timer -->
<script type="text/javascript">
// FrontPage Time Counter
var expiryDate = $('#counter').data('date');
var target = new Date(expiryDate),
finished = false,
availiableExamples = {
	set15daysFromNow: 15 * 24 * 60 * 60 * 1000,
	set5minFromNow  : 5 * 60 * 1000,
	set1minFromNow  : 1 * 60 * 1000
};
function callback(event) {
	$this = $(this);
	switch(event.type) {
		case "seconds":
		case "minutes":
		case "hours":
		case "days":
		case "weeks":
		case "daysLeft":
			$this.find('div span#'+event.type).php(event.value);
			if(finished) {
				$this.fadeTo(0, 1);
				finished = false;
			}

			break;
		case "finished":
			$this.fadeTo('slow', .5);
			finished = true;
			break;
	}
}
$('#counter').countdown(target.valueOf(), callback);
</script>
<script src="style-switcher/js/jquery_cookie.js"></script>
<script src="style-switcher/js/script.js"></script>
<!-- Style Switcher Start -->
<div class="styleswitcher visible-lg visible-md">
  <div class="arrow-box"><a class="switch-button"><span class="fa fa-cogs fa-lg"></span></a> </div>
  <h4>Color Skins</h4>
  <ul class="color-scheme">
    <li><a href="#" data-rel="colors/color1.css" class="color1" title="color1"></a></li>
    <li><a href="#" data-rel="colors/color2.css" class="color2" title="color2"></a></li>
    <li><a href="#" data-rel="colors/color3.css" class="color3" title="color3"></a></li>
    <li><a href="#" data-rel="colors/color4.css" class="color4" title="color4"></a></li>
    <li><a href="#" data-rel="colors/color5.css" class="color5" title="color5"></a></li>
    <li><a href="#" data-rel="colors/color6.css" class="color6" title="color6"></a></li>
    <li><a href="#" data-rel="colors/color7.css" class="color7" title="color7"></a></li>
    <li><a href="#" data-rel="colors/color8.css" class="color8" title="color8"></a></li>
    <li class="nomargin"><a href="#" data-rel="colors/color9.css" class="color9" title="color9"></a></li>
    <li class="nomargin"><a href="#" data-rel="colors/color10.css" class="color10" title="color10"></a></li>
    <li class="nomargin"><a href="#" data-rel="colors/color11.css" class="color11" title="color11"></a></li>
    <li class="nomargin"><a href="#" data-rel="colors/color12.css" class="color12" title="color12"></a></li>
  </ul>
  <h4>Layout</h4>
  <ul class="layouts">
    <li class="wide-layout"><a href="#" title="Wide">Wide</a></li>
    <li class="boxed-layout"><a href="#" title="Boxed">Boxed</a></li>
  </ul>
  <h4>Background Pattern</h4>
  <ul class="background-selector">
    <li><img alt="" src="style-switcher/backgrounds/patternst/ptt1.png" data-nr="0" width="20" height="20"></li>
    <li><img alt="" src="style-switcher/backgrounds/patternst/ptt2.png" data-nr="1" width="20" height="20"></li>
    <li><img alt="" src="style-switcher/backgrounds/patternst/ptt3.png" data-nr="2" width="20" height="20"></li>
    <li><img alt="" src="style-switcher/backgrounds/patternst/ptt4.png" data-nr="3" width="20" height="20"></li>
    <li><img alt="" src="style-switcher/backgrounds/patternst/ptt5.png" data-nr="4" width="20" height="20"></li>
    <li><img alt="" src="style-switcher/backgrounds/patternst/ptt6.png" data-nr="5" width="20" height="20"></li>
    <li><img alt="" src="style-switcher/backgrounds/patternst/ptt7.png" data-nr="6" width="20" height="20"></li>
    <li><img alt="" src="style-switcher/backgrounds/patternst/ptt8.png" data-nr="7" width="20" height="20"></li>
    <li><img alt="" src="style-switcher/backgrounds/patternst/ptt9.png" data-nr="8" width="20" height="20"></li>
    <li><img alt="" src="style-switcher/backgrounds/patternst/ptt10.png" data-nr="9" width="20" height="20"></li>
    <li><img alt="" src="style-switcher/backgrounds/patternst/ptt11.png" data-nr="10" width="20" height="20"></li>
    <li><img alt="" src="style-switcher/backgrounds/patternst/ptt12.png" data-nr="11" width="20" height="20"></li>
    <li><img alt="" src="style-switcher/backgrounds/patternst/ptt13.png" data-nr="12" width="20" height="20"></li>
    <li><img alt="" src="style-switcher/backgrounds/patternst/ptt14.png" data-nr="13" width="20" height="20"></li>
    <li><img alt="" src="style-switcher/backgrounds/patternst/ptt15.png" data-nr="14" width="20" height="20"></li>
    <li><img alt="" src="style-switcher/backgrounds/patternst/ptt16.png" data-nr="15" width="20" height="20"></li>
    <li><img alt="" src="style-switcher/backgrounds/patternst/ptt17.png" data-nr="16" width="20" height="20"></li>
    <li><img alt="" src="style-switcher/backgrounds/patternst/ptt18.png" data-nr="17" width="20" height="20"></li>
    <li><img alt="" src="style-switcher/backgrounds/patternst/ptt19.png" data-nr="18" width="20" height="20"></li>
    <li><img alt="" src="style-switcher/backgrounds/patternst/ptt20.png" data-nr="19" width="20" height="20"></li>
    <li><img alt="" src="style-switcher/backgrounds/patternst/ptt21.png" data-nr="20" width="20" height="20"></li>
    <li><img alt="" src="style-switcher/backgrounds/patternst/ptt22.png" data-nr="21" width="20" height="20"></li>
    <li><img alt="" src="style-switcher/backgrounds/patternst/ptt23.png" data-nr="22" width="20" height="20"></li>
    <li><img alt="" src="style-switcher/backgrounds/patternst/ptt24.png" data-nr="23" width="20" height="20"></li>
    <li><img alt="" src="style-switcher/backgrounds/patternst/ptt25.png" data-nr="24" width="20" height="20"></li>
    <li class="nomargin"><img alt="" src="style-switcher/backgrounds/patternst/ptt26.png" data-nr="25" width="20" height="20"></li>
    <li class="nomargin"><img alt="" src="style-switcher/backgrounds/patternst/ptt27.png" data-nr="26" width="20" height="20"></li>
    <li class="nomargin"><img alt="" src="style-switcher/backgrounds/patternst/ptt28.png" data-nr="27" width="20" height="20"></li>
    <li class="nomargin"><img alt="" src="style-switcher/backgrounds/patternst/ptt29.png" data-nr="28" width="20" height="20"></li>
    <li class="nomargin"><img alt="" src="style-switcher/backgrounds/patternst/ptt30.png" data-nr="29" width="20" height="20"></li>
  </ul>
  <small>*only for boxed layout</small>
  <h4>Background Image</h4>
  <ul class="background-selector1">
    <li><img alt="" src="style-switcher/backgrounds/images/img1-thumb.png" data-nr="0" width="20" height="20"></li>
    <li><img alt="" src="style-switcher/backgrounds/images/img2-thumb.png" data-nr="1" width="20" height="20"></li>
    <li><img alt="" src="style-switcher/backgrounds/images/img3-thumb.png" data-nr="2" width="20" height="20"></li>
    <li><img alt="" src="style-switcher/backgrounds/images/img4-thumb.png" data-nr="3" width="20" height="20"></li>
    <li><img alt="" src="style-switcher/backgrounds/images/img5-thumb.png" data-nr="4" width="20" height="20"></li>
  </ul>
  <small>*only for boxed layout</small> </div>
</body>
</html>