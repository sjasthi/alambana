<?php

  if(!isset($_SESSION)) { 
      session_start();
  } 

  include 'shared_resources.php';
  include 'blog_fill.php';
?>

<!DOCTYPE HTML>
<html class="no-js">
<head>
  <!-- Basic Page Needs
  ================================================== -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Aalambana - Blogs</title>
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
      <!-- Site Header Wrapper -->
      <?php load_common_page_header() ?>
    </div>


    <!-- Banner Area -->
    <div class="hero-area">
      <div class="page-banner parallax" style="background-image:url(images/inside7.jpg);">
        <div class="container">
          <div class="page-banner-text">
            <h1 class="block-title">Create a new Blog</h1>
          </div>
        </div>
      </div>
    </div>


    <!-- Blog Post Section -->
    <div id="main-container">
      <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-md-8 content-block">
              <!-- USER PRIVILEGES ROLE (User/Admin from 'users' Table) -->
              <!--?php
                        if (isset($_SESSION['role'])) {
                          if ($_SESSION['role'] == 'admin') {
                            echo '<button id="form_show_button" onclick="show_new_post_form();">Create Post</button>';
                          }
                        }
                      ?-->
              <!-- Blog Form (Initially hidden) [Activates on button click] -->
             
                
                  

                  <a href="blog-grid.php" class="btn btn-primary btn-lg">Go to Blogs</a>
                  <h1>Create a new Blog</h1>
              <form id="blog_creation_form" action="create_post.php" method="POST" enctype="multipart/form-data" hidden="hidden">
                <div class="form-group">
                  <label>Blog Title</label>
                  <input type="text" class="form-control" name="title" maxlength=100 required>
                  </div>
                  <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control" name="description" rows="5" required></textarea>
                </div>
                <div class="form-group">
                  <label for="author">Author</label>
                  <input type="text" class="form-control" name="author" maxlength=50 required>
                </div>
              <div class="form-group">
                <label>Image(s)</label>`
                  <input type="file" class="form-control" name="file[]" accept="image/*" multiple="multiple">
                      </div>
                      <div class="form-group">
                  <label>Video Link</label>
                  <input type="text" class="form-control" name="video_link" maxlength=100 placeholder="Optional">
                </div>
                <button type="submit" class="btn btn-primary">Publish</button>
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