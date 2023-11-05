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
<link rel="icon" href="favicon.ico" type="image/x-icon">
<title>Change This Title With BLOG TItle!!!</title>
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
<body class="single-event">
<!--[if lt IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
<div class="body">
	<!-- Site Header Wrapper -->
    <?php load_common_page_header(2) ?>
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

  	<a id="back-to-top"><i class="fa fa-angle-double-up"></i></a></div>
<script src="js/jquery-2.1.3.min.js"></script> <!-- Jquery Library Call -->
<script src="vendor/magnific/jquery.magnific-popup.min.js"></script> <!-- PrettyPhoto Plugin -->
<script src="js/ui-plugins.js"></script> <!-- UI Plugins -->
<script src="js/helper-plugins.js"></script> <!-- Helper Plugins -->
<script src="vendor/owl-carousel/js/owl.carousel.min.js"></script> <!-- Owl Carousel -->
<script src="js/bootstrap.js"></script> <!-- UI -->
<script src="js/init.js"></script> <!-- All Scripts -->
<script src="vendor/flexslider/js/jquery.flexslider.js"></script> <!-- FlexSlider -->
<script src="js/circle-progress.js"></script> <!-- Circle Progress Bars -->
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