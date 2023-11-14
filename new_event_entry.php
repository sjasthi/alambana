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
  <title>Aalambana - Event</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content=f"">
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
  <?php load_event_page_scripts() ?>
  <script>
    window.onload = function() {
      show_new_post_form(); // Call the function upon page load
    };
</script>

</head>

<body>

  <div class="body">
    <!-- Site Header Wrapper -->
    <div class="site-header-wrapper">
      <?php load_common_page_header() ?>
    </div>

    <!-- Banner Area -->
    <div class="hero-area">
      <div class="page-banner parallax" style="background-image:url(images/inside7.jpg);">
        <div class="container">
          <div class="page-banner-text">
            <h1 class="block-title">Create a new Event</h1>
          </div>
        </div>
      </div>
    </div>

    <!-- Event Form Section -->
    <div id="main-container">
      <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-md-8 content-block">
              <!-- USER PRIVILEGES ROLE (User/Admin from 'users' Table) -->
              <?php
                  if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                    echo '<button id="form_show_button" onclick="show_new_event_form();">Create Event</button>';
                  }
              ?>
              <!-- Event Form (Initially hidden) [Activates on button click] -->
              <form id="event_creation_form" action="create_event.php" method="POST" enctype="multipart/form-data" hidden="hidden">
                <label>Event Title</label>
                <br>
                <input type="text" name="title" maxlength=100 required>
                <br>
                <label>Description</label>
                <br>
                <textarea name="description" rows=9 cols=50 required></textarea>
                <br>
                <label>Video Link</label>
                <br>
                <input type="text" name="video_link" maxlength=200 placeholder="Optional">
                <br>
                <label>Event Date</label>
                <br>
                <input type="datetime-local" name="event_date" required>
                <br>
                <input type="submit" name="create_event" value="Publish">
              </form>
              
            </div>
          </div>
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
