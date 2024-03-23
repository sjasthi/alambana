<?php

if(!isset($_SESSION)) { 
	session_start();
} 

include 'shared_resources.php';
include 'get_events.php';
include 'time_formatting.php';

$event = get_event_by_id( $_GET['id'] );
?>

<!DOCTYPE HTML>
<html class="no-js">
<head>
<!-- Basic Page Needs
  ================================================== -->
<link rel="icon" href="../favicon.ico" type="image/x-icon">
<title><?php echo $event["title"]; ?></title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<!-- Mobile Specific Metas
  ================================================== -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no">
<!-- CSS
  ================================================== -->
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="../css/bootstrap-theme.css" rel="stylesheet" type="text/css">
<link href="../css/style.css" rel="stylesheet" type="text/css">
<link href="../vendor/magnific/magnific-popup.css" rel="stylesheet" type="text/css">
<link href="../vendor/owl-carousel/css/owl.carousel.css" rel="stylesheet" type="text/css">
<link href="../vendor/owl-carousel/css/owl.theme.css" rel="stylesheet" type="text/css">
<!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
<link href="../css/custom.css" rel="stylesheet" type="text/css"><!-- CUSTOM STYLESHEET FOR STYLING -->
<!-- Color Style -->
<link class="alt" href="../colors/color1.css" rel="stylesheet" type="text/css">
<link href="../style-switcher/css/style-switcher.css" rel="stylesheet" type="text/css">
<!-- SCRIPTS
  ================================================== -->
<script src="../js/modernizr.js"></script><!-- Modernizr -->
</head>
<body class="single-event">
<!--[if lt IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
<div class="body">
	<!-- Site Header Wrapper -->
    <?php load_common_page_header(2) ?>
    <!-- Hero Area -->
    <div class="hero-area">
    	<div class="page-banner parallax" style="background-image:url(../images/inside9.jpg);">
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
					<h3><?php echo $event["title"]; ?></h3>
                    	<div class="post-media">
						<img src="../<?php echo $event["pic_location"] ?>" alt="">
                        </div>
                        <div class="row">
                        	<div class="col-md-6 col-sm-6">
                                <span class="event-date">
								<span class="date"><?php echo get_event_day( $event["event_date_start"] ); ?></span>
                                    <span class="month"><?php echo get_event_month( $event["event_date_start"] ); ?></span>
                                    <span class="year"><?php echo get_event_year( $event["event_date_start"] ); ?></span>
                                </span>
                                    <span class="meta-data"><?php echo format_date( $event["event_date_start"], $event["event_date_end"] ); ?></span>
                        		<a href="#" class="btn btn-primary btn-event-single-book">Book Tickets</a>
                      		</div>
                            <div class="col-md-6 col-sm-6">
                                <ul class="list-group">
								<li class="list-group-item"><?php echo $event["attendees"]; ?><span class="badge">Attendees</span></li>
								<li class="list-group-item"><?php echo $event["location"]; ?><span class="badge">Location</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="spacer-20"></div>
						<p class="lead"><?php echo $event["description"]; ?></p>
						<p><?php echo $event["information"]; ?></p>
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
							<?php
							$catagories = get_event_catagories();
							foreach($catagories as $catagory) { ?>
								<li data-option-value=".<?php echo str_replace( " ", "-", $catagory ); ?>"><a href="#"><span><?php echo $catagory; ?></span></a></li>
							<?php } ?>
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
</body>
</html>
