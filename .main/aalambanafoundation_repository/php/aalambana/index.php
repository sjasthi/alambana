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

<!-- Include the favicon.ico file -->
<link rel="icon" href="favicon.ico" type="image/x-icon">
<title>Aalambana Foundation - Empowering Dreams through Education</title>
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

    <!-- Banner Area -->
    <div class="hero-area">
    	<!-- Start Banner Image Slider -->
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
    <?php load_common_page_footer() ?>
    <!-- Donate Form Modal -->
    <?php donate_dialog() ?>
    <!-- Libraries Loader -->
    <?php lib() ?>
    <!-- Style Switcher Start -->
    <?php style_switcher() ?>
    
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

</body>
</html>