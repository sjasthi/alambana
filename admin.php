
<?php 
    ob_start();
    session_start();

    if ($_SESSION['role'] != 'admin'){
        header('Location:index.php'); 
    }

    #require 'bin/functions.php';
    #require 'db_configuration.php';
    include('shared_resources.php'); 
    
    ob_end_flush();
?>
<!DOCTYPE html>
<html>


<!DOCTYPE HTML>
<html class="no-js">
<head>
<!-- Basic Page Needs
  ================================================== -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<!-- Include the favicon.ico file -->
<?php generateFaviconLink() ?>
<title>Register/Login Form</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<!-- Mobile Specific Metas
  ================================================== -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no">
<!-- CSS
================================================== -->
<?php css() ?>

<!-- SCRIPTS
  ================================================== -->
<?php load_common_page_scripts() ?>
</head>
  
    <!-- Site Header Wrapper -->
    <?php load_common_page_header(2) ?>

    <!-- Banner Area -->
    <div class="hero-area">
    	<div class="page-banner parallax" style="background-image:url(images/parallax6.jpg);">
        	<div class="container">
            	<div class="page-banner-text">
        			<h1 class="block-title">Admin</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content -->
    <div id="main-container">
    <div class="content">
        <div class="container">
          <div class="row">
                <div class="col-md-4 col-sm-4">
                      <div class="icon-box ibox-plain">
                          <div class="ibox-icon">
                              <i class="fa fa-windows"></i>
                          </div>
                          <h3>App Utility 1</h3>
                          <p>2 layout choices for Wide screen and Boxed layout with option to set patterns and images as background.</p>
                      </div>
                      <div class="spacer-20"></div>
                      <div class="icon-box ibox-plain">
                          <div class="ibox-icon">
                              <i class="fa fa-navicon"></i>
                          </div>
                          <h3>App Utility 2</h3>
                          <p>The main menu is ready for the multi columns mega menu which can have any kind of HTML/TEXT inside.</p>
                      </div>
                      <div class="spacer-20"></div>
                      <div class="icon-box ibox-plain">
                          <div class="ibox-icon">
                              <i class="fa fa-twitter"></i>
                          </div>
                          <h3>App Utility 3</h3>
                          <p>An easy to use Twitter feeds plugin is included in the template which can fetch any number of Tweets from your account.</p>
                      </div>
                  </div>
                  
          </div>
      </div>
  </div>

  <!-- Site Footer -->
  <?php load_common_page_footer() ?>
  <!-- Donate Form Modal -->
  <?php donate_dialog() ?>
  <!-- Libraries Loader -->
  <?php lib() ?>
</body>

</html>