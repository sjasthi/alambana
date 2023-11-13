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
<title>Gallery Caption 3</title>
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
  <style>
        body {
            font-size: 50px; /* Set the font size to make the text bigger */
            color: black;    /* Set the text color to black */
			text-align: center; /* Center align the text */
        }
    </style>

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
	<?php
	
	$text = "To Be Implemented";
	?>
	<p><?php echo $text; ?></p>


    <?php lib() ?>
    <!-- Style Switcher Start -->
    <?php style_switcher() ?>
</body>
</html>