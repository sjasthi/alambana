<?php

if (!isset ($_SESSION)) {
  session_start();
}

include 'shared_resources.php';
require_once './header/index.php';
require_once './bootstrap.php';
set_up_bootstrap();
if (isset ($_SESSION['role'])) {
  $userRole = $_SESSION['role'];
}
?>

<!DOCTYPE HTML>
<html class="no-js">

<head>

  <!-- Basic Page Needs
  ================================================== -->
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <title>Donate</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <!-- Mobile Specific Metas
  ================================================== -->
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
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
  <!-- <style>
    body {
      font-size: 50px;
      /* Set the font size to make the text bigger */
      color: black;
      /* Set the text color to black */
      text-align: center;
      /* Center align the text */
    }
    .modal-body {
	    background:#f6f6f6;
	    padding-left:40px;
	    padding-right:40px;
    }
    .modal-header{
	    position:relative;
    }
    .modal-footer{
	    padding-left:70px;
	    padding-right:70px;
    }
  </style> -->

  <?php load_common_page_scripts() ?>

</head>

<body>
  <!--[if lt IE 7]>
  <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
  <div class="body">
    <!-- Site Header Wrapper -->
    <?php generate_header(); ?>
    <!-- Hero Area -->
    <div class="hero-area">
      <div class="page-banner parallax" id="banner" style="background-image:url(images/parallax6.jpg);">
      <div class="container">
        <div class="page-banner-text">
          <h1 class="block-title">Donate Below</h1>
          <?php
          if (isset ($userRole) && $userRole === "admin") {
            // Display the "Change Image" button for admin users
            echo '<label for="imageUpload" class="custom-file-upload">Change Banner Image</label>';
            echo '<input type="file" id="imageUpload" accept="image/*" multiple="multiple">';
          }
          ?>
        </div>
      </div>
    </div>

    <script>
      const imageUpload = document.getElementById('imageUpload');
      const banner = document.getElementById('banner');

      // Retrieve the stored image URL from local storage on page load
      const storedImageUrl = localStorage.getItem('aboutBanner');
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
            localStorage.setItem('aboutBanner', e.target.result);
          }:
          reader.readAsDataURL(file);
        }
      });
    </script>
    
    <!-- Main Content -->
    <div class="modal-content">
      <div class="modal-header">
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

    <!-- Site Footer -->
    <?php load_common_page_footer() ?>
    <!-- donate form modal -->
    <?php donate_dialog() ?>
    <!-- Libraries Loader -->
    <?php lib() ?>
    <!-- Style Switcher Start -->
    <?php style_switcher() ?>
</body>

</html>