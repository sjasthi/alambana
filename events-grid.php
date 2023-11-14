
<?php

  if(!isset($_SESSION)) { 
      session_start();
  } 

  include 'shared_resources.php';
  if (isset($_SESSION['role'])) {
    $userRole = $_SESSION['role'];
  }
?>

<!DOCTYPE HTML>
<html class="no-js">
<head>
<!-- Basic Page Needs
  ================================================== -->
<link rel="icon" href="favicon.ico" type="image/x-icon">
<title>Upcoming Events</title>
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
    	<div class="page-banner parallax" id="banner" style="background-image:url(images/inside9.jpg);">
        	<div class="container">
            	<div class="page-banner-text">
        			<h1 class="block-title">Upcoming Events</h1>
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
		const storedImageUrl = localStorage.getItem('hungerBanner');
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
					localStorage.setItem('hungerBanner', e.target.result);
				};
				reader.readAsDataURL(file);
			}
		});
	</script>
    <!-- Main Content -->
    <div id="main-container">
    	<div class="content">
        	<div class="container">
                <div class="grid-filter">
                    <ul class="nav nav-pills sort-source" data-sort-id="gallery" data-option-key="filter">
                        <li data-option-value="*" class="active"><a href="#"><i class="fa fa-th"></i> <span>Show All</span></a></li>
                        <li data-option-value=".education"><a href="#"><span>Education</span></a></li>
                        <li data-option-value=".wild-life"><a href="#"><span>Wild Life</span></a></li>
                        <li data-option-value=".environment"><a href="#"><span>Environment</span></a></li>
                        <li data-option-value=".water"><a href="#"><span>Water</span></a></li>
                        <li data-option-value=".human-rights"><a href="#"><span>Human Rights</span></a></li>
                    </ul>
                </div>
                <div class="row">
                    <ul class="sort-destination isotope gallery-items" data-sort-id="gallery">
                        <li class="col-md-4 col-sm-6 grid-item event-grid-item education format-standard">
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
                        </li>
                        <li class="col-md-4 col-sm-6 grid-item event-grid-item human-rights format-standard">
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
                        </li>
                        <li class="col-md-4 col-sm-6 grid-item event-grid-item environment format-standard">
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
                        </li>
                        <li class="col-md-4 col-sm-6 grid-item event-grid-item human-rights format-standard">
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
                        </li>
                        <li class="col-md-4 col-sm-6 grid-item event-grid-item water format-standard">
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
                        </li>
                    </ul>
                </div>
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