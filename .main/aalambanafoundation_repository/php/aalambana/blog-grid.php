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
<title>Blog Grids</title>
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
<body>
<!--[if lt IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
<div class="body">
	<!-- Site Header Wrapper -->
    <?php load_common_page_header(2) ?>
    <!-- Hero Area -->
    <div class="hero-area">
    	<div class="page-banner parallax" style="background-image:url(images/inside7.jpg);">
        	<div class="container">
            	<div class="page-banner-text">
        			<h1 class="block-title">Blog</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content -->
    <div id="main-container">
    	<div class="content">
        	<div class="container">
                <ul class="grid-holder isotope gallery-items" data-sort-id="gallery">
                    <li class="col-md-4 col-sm-6 grid-item blog-grid-item format-standard">
                        <div class="grid-item-inner">
                            <a href="single-event.php" class="media-box">
                                <img src="images/post1.jpg" alt="">
                            </a>
                            <div class="grid-item-content">
                                <h3 class="post-title"><a href="single-post.php">A single person can change million lives</a></h3>
                                <span class="meta-data"><i class="fa fa-calendar"></i> Posted on 11th Dec, 2015</span>
                                <p>A blog post sample excerpt text which can be edited by editing the blog post page...</p>
                                <div class="tag-cloud">
                                    <i class="fa fa-tags"></i> 
                                    <a href="#">Water</a>
                                    <a href="#">Students</a>
                                    <a href="#">NYC</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="col-md-4 col-sm-6 grid-item blog-grid-item format-standard">
                        <div class="grid-item-inner">
                            <a href="single-event.php" class="media-box">
                                <img src="images/post2.jpg" alt="">
                            </a>
                            <div class="grid-item-content">
                                <h3 class="post-title"><a href="single-post.php">Donate your woolens this winter</a></h3>
                                <span class="meta-data"><i class="fa fa-calendar"></i> Posted on 11th Dec, 2015</span>
                                <p>A blog post sample excerpt text which can be edited by editing the blog post page...</p>
                                <div class="tag-cloud">
                                    <i class="fa fa-tags"></i> 
                                    <a href="#">Water</a>
                                    <a href="#">Students</a>
                                    <a href="#">NYC</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="col-md-4 col-sm-6 grid-item blog-grid-item format-standard">
                        <div class="grid-item-inner">
                            <a href="single-event.php" class="media-box">
                                <img src="images/post3.jpg" alt="">
                            </a>
                            <div class="grid-item-content">
                                <h3 class="post-title"><a href="single-post.php">How to survive the tough path of life</a></h3>
                                <span class="meta-data"><i class="fa fa-calendar"></i> Posted on 11th Dec, 2015</span>
                                <p>A blog post sample excerpt text which can be edited by editing the blog post page...</p>
                                <div class="tag-cloud">
                                    <i class="fa fa-tags"></i> 
                                    <a href="#">Water</a>
                                    <a href="#">Students</a>
                                    <a href="#">NYC</a>
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