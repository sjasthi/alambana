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
<!-- Event Calendar Style addition -->
<link href="vendor/fullcalendar/fullcalendar.css" rel="stylesheet">
<link href="vendor/fullcalendar/fullcalendar.print.css" rel="stylesheet" media="print">
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
    <?php load_common_page_header() ?>
    <!-- Hero Area -->
    <div class="hero-area">
    	<div class="page-banner parallax" style="background-image:url(images/inside9.jpg);">
        	<div class="container">
            	<div class="page-banner-text">
        			<h1 class="block-title">Upcoming Events Calendar</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content -->
    <div id="main-container">
    	<div class="content">
            <div class="container">
            	<div id="calendar"></div>
           	</div>
        </div>
    </div>
    

    <script>
	$(document).ready(function() {
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		$('#calendar').fullCalendar({
			editable: false,
			height: 'auto',
        	minTime: '08:00:00',
        	maxTime: '20:00:00',
			eventLimit: true, // allow "more" link when too many events
			events: [
			{
				title: 'All Day Event',
				start: '2016-02-22'
			},
			{
				title: 'Long Event',
				start: '2016-01-07',
				end: '2016-01-12'
			},
			{
				id: 999,
				title: 'Repeating Event',
				start: '2015-12-31T16:00:00'
			},
			{
				id: 999,
				title: 'Repeating Event',
				start: '2015-06-16T16:00:00'
			},
			{
				title: 'Conference',
				start: '2016-02-11',
				end: '2016-02-13'
			},
			{
				title: 'Meeting',
				start: '2016-01-12T10:30:00',
				end: '2016-01-12T12:30:00'
			},
			{
				title: 'Lunch',
				start: '2016-03-12T12:00:00'
			},
			{
				title: 'Meeting',
				start: '2015-06-12T14:30:00',
				className: 'venue-shop-pleu'
			}
		]
		});
		
	});

    </script>
    <!-- Site Footer -->
    <?php load_common_page_footer() ?>
    <!-- Libraries Loader -->
    <?php lib() ?>
    <!-- Style Switcher Start -->
    <?php style_switcher() ?>
</body>
</html>