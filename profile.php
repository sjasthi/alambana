<?php

if (!isset($_SESSION)) {
  session_start();
}

include 'shared_resources.php';
require_once './header/index.php';
require_once './bootstrap.php';
set_up_bootstrap();
if (isset($_SESSION['role'])) {
  $userRole = $_SESSION['role'];
}
?>

<!DOCTYPE HTML>
<html class="no-js">

<head>
  <!-- Basic Page Needs
  ================================================== -->
  <meta http-equiv="Content-Type" content="text/html, charset=utf-8">
  <!-- Include the favicon.ico file -->
  <?php generateFaviconLink(); ?>
  <title>Aalambana - Blogs</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <!-- Mobile Specific Metas
  ================================================== -->
  <meta name="viewport" content="width=device-width, user-scalable=false;">
  <meta name="format-detection" content="telephone=no">
  <!-- css
  ================================================== -->
  <?php css(); ?>
  <!-- SCRIPTS
  ================================================== -->
  <?php load_common_page_scripts(); ?>
</head>

<body>
  <!--[if lt IE 7]>
  <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
  <div class="body">
    <!-- Site Header Wrapper -->
    <?php generate_header(); ?>
    <!-- Hero Area -->
    <br />
    <br />
    <br />
    <br />
    under development
    <a href="logout.php">Log Out</a>
    <?php lib() ?>
    <!-- Style Switcher Start -->
    <?php style_switcher() ?>
</body>

</html>