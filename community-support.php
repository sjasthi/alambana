<?php

  if(!isset($_SESSION)) { 
      session_start();
  } 

  include 'shared_resources.php';
  include 'blog_fill.php';
  include 'feedback_fill.php';
  if (isset($_SESSION['role'])) {
    $userRole = $_SESSION['role'];
  }
?>

<!DOCTYPE HTML>
<html class="no-js">
<head>
<!-- Basic Page Needs
  ================================================== -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <?php generateFaviconLink() ?>
<title>Community Support</title>
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
  
   <style>
        /* Style for the custom button label */
        .custom-file-upload {
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border: 1px solid #007bff;
            border-radius: 5px;
        }

        /* Hide the actual file input element */
        #imageUpload {
            display: none;
        }
    </style>
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
    	<div class="page-banner parallax" id="banner" style="background-image:url(images/parallax6.jpg);">
        	<div class="container">
            	<div class="page-banner-text">
        			<h1 class="block-title">Our Causes</h1>
					 <?php
                        if (isset($userRole) && $userRole === "admin") {
                            // Display the "Change Image" button for admin users
							echo '<label for="imageUpload" class="custom-file-upload">Change Banner Image</label>';
                            echo '<input type="file" id="imageUpload" accept="image/*" multiple="multiple">';
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>
	
	<script>
		const imageUpload = document.getElementById('imageUpload');
		const banner = document.getElementById('banner');

		// Retrieve the stored image URL from local storage on page load
		const storedImageUrl = localStorage.getItem('communitySupportBanner');
		if (storedImageUrl) {
			banner.style.backgroundImage = `url(${storedImageUrl})`;
		}

		imageUpload.addEventListener('change', function () {
			const file = imageUpload.files[0];
			if (file && file.type.startsWith('image/')) {
				const reader = new FileReader();
				reader.onload = function (e) {
					banner.style.backgroundImage = `url(${e.target.result})`;

					// Store the selected image URL for Page 1 in local storage
					localStorage.setItem('communitySupportBanner', e.target.result);
				};
				reader.readAsDataURL(file);
			}
		});
	</script>
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
                                            <img src="images/causeg1.jpg" alt="">
                                        </a>
                                       	<div class="cause-progress"><a class="cProgress" data-complete="88" data-color="F23827" data-toggle="tooltip" data-original-title="10 days left" data-placement="left"><strong></strong></a></div>
                                    </div>
                                    <div class="col-md-8 col-sm-8">
                                        <div class="cause-list-item-cont">
                                            <h3 class="post-title"><a href="single-cause.php">Help small shopkeepers of Sunyani</a></h3>
                                            <p>Lorem ipsum dolor sit amet, consectet adipiscing elit. Nam malesuada dapi bus diam, ut fringilla purus efficitur  eget...</p>
                                            <div class="meta-data">Donated $26400 / <span class="cause-target">$30000</span></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="causes-list-item cause-item">
                            	<div class="row">
                                	<div class="col-md-4 col-sm-4 list-thumb">
                                        <a href="single-cause.php">
                                            <img src="images/causeg2.jpg" alt="">
                                        </a>
                                       	<div class="cause-progress"><a class="cProgress" data-complete="52" data-color="F6BB42" data-toggle="tooltip" data-original-title="25 days left" data-placement="left"><strong></strong></a></div>
                                    </div>
                                    <div class="col-md-8 col-sm-8">
                                        <div class="cause-list-item-cont">
                                            <h3 class="post-title"><a href="single-cause.php">Help relocate the refugees</a></h3>
                                            <p>Lorem ipsum dolor sit amet, consectet adipiscing elit. Nam malesuada dapi bus diam, ut fringilla purus efficitur  eget...</p>
                                            <div class="meta-data">Donated $21840 / <span class="cause-target">$40000</span></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="causes-list-item cause-item">
                            	<div class="row">
                                	<div class="col-md-4 col-sm-4 list-thumb">
                                        <a href="single-cause.php">
                                            <img src="images/causeg5.jpg" alt="">
                                        </a>
                                       	<div class="cause-progress"><a class="cProgress" data-complete="75" data-color="8CC152" data-toggle="tooltip" data-original-title="65 days left" data-placement="left"><strong></strong></a></div>
                                    </div>
                                    <div class="col-md-8 col-sm-8">
                                        <div class="cause-list-item-cont">
                                            <h3 class="post-title"><a href="single-cause.php">Save tigers from poachers</a></h3>
                                            <p>Lorem ipsum dolor sit amet, consectet adipiscing elit. Nam malesuada dapi bus diam, ut fringilla purus efficitur  eget...</p>
                                            <div class="meta-data">Donated $15000 / <span class="cause-target">$20000</span></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="causes-list-item cause-item">
                            	<div class="row">
                                	<div class="col-md-4 col-sm-4 list-thumb">
                                        <a href="single-cause.php">
                                            <img src="images/causeg6.jpg" alt="">
                                        </a>
                                       	<div class="cause-progress"><a class="cProgress" data-complete="88" data-color="8CC152" data-toggle="tooltip" data-original-title="70 days left" data-placement="left"><strong></strong></a></div>
                                    </div>
                                    <div class="col-md-8 col-sm-8">
                                        <div class="cause-list-item-cont">
                                            <h3 class="post-title"><a href="single-cause.php">Help rebuild Nepal</a></h3>
                                            <p>Lorem ipsum dolor sit amet, consectet adipiscing elit. Nam malesuada dapi bus diam, ut fringilla purus efficitur  eget...</p>
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
                            	<li><a href="#"><i class="fa fa-caret-right"></i>Education</a> (3)</li> <!-- Interesting find, adjusting these value types fixes the interactive need to talk to team-->
                            	<li><a href="#"><i class="fa fa-caret-right"></i>Environment</a> (1)</li>
                            	<li><a href="#"><i class="fa fa-caret-right"></i>Global warming</a> (6)</li>
                            	<li><a href="#"><i class="fa fa-caret-right"></i>Water</a> (4)</li>
                            	<li><a href="#"><i class="fa fa-caret-right"></i>Wild life</a> (2)</li>
                            	<li><a href="#"><i class="fa fa-caret-right"></i>Small business</a> (12)</li>
                            </ul>
                        </div>
                    </div>
                <div class="col-md-4 sidebar-block">
                    <!-- Side blog List (Lastest Postings) -->
                    <?php fill_blog_post_side_container_small() ?>
                </div>

                <div class="widget widget_testimonials">
                    <h3 class="widgettitle">Stories of change</h3>
                    <div class="carousel-wrapper">
                        <div class="row">
                            <?php fill_feedback_comments_carousel() ?>
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