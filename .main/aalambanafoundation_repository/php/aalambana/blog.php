<?php
if (!isset($_SESSION)) { 
    session_start();
} 

include 'shared_resources.php';
include 'blog_fill.php';

$current_page = isset($_GET['current_page']) ? intval($_GET['current_page']) : 1; // intval ensures the variable is an integer for security


// Check if the current page is blog.php and current_page parameter is not set
if (basename($_SERVER['PHP_SELF']) == 'blog.php' && !isset($_GET['current_page'])) {
    // Redirect to the same page with the current_page parameter
    header('Location: blog.php?current_page#1' );//. $current_page);
    exit(); // Ensure script stops execution after redirection
}
?>

<!DOCTYPE HTML>
<html class="no-js">
<head>
  <!-- Basic Page Needs
  ================================================== -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <!-- Include the favicon.ico file -->
  <?php generateFaviconLink() ?>
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
  <script> 
  window.onload = function() {
  if (window.location.pathname.includes("blog.php") && !window.location.search.includes("current_page")) {
    // Assuming you have the updated value of current_page in a variable called currentPage
    //window.location.href = "blog.php?current_page=" + 1;
    
  }
}
  </script>
  <?php load_common_page_scripts() ?>
</head>

<body>

  <div class="body">
    
    <!-- Site Header Wrapper -->
    <?php load_common_page_header() ?>
    
    <!-- Banner Area -->
    <div class="hero-area">
      <div class="page-banner parallax" style="background-image:url(images/inside7.jpg);">
        <div class="container">
          <div class="page-banner-text">
            <h1 class="block-title">Blog</h1>
          </div>
        </div>
      </div>
    </div>


    <!-- Blog Post Section -->
    <style>
    .content {
      display: flex;
      align-items: flex-start; /* Align items at the top */
    }
    #search_bar {
      width: 350px; /* Set a fixed width for the TOC */
      margin-right: 100px; /* Add margin between TOC and main content */
    }
    #blog_TOC {
      width: 250px; /* Set a fixed width for the TOC */
      margin-right: -110px; /* Add margin between TOC and main content */
    }
    #TOC_list {
      width: 250px; /* Set a fixed width for the TOC */
      margin-right: 100px; /* Add margin between TOC and main content */
    }
    #main-container {
      flex: 1; /* Allow the main container to take remaining space */
    }
    </style>
    <div class="content"><!--Extends Search bar / Stories tag at bottem-->
      <div class="row">

        <div class="content">
          <!-- Blog Page TOC -->
          <div id="blog_TOC">
          </div><ul id="TOC_list">
              <?php fill_TOC(); ?>
            </ul>
            
            <!-- Main Content -->
            <div id="main-container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 content-block">
                        <!-- Blog Page List --> <?php fill_blog_page_list(); ?>
                        <!-- Blog Page Fill --> <?php fill_blog(); ?>
                        <!-- Page Pagination --> <?php fill_blog_pagination(); ?>

                        </div>
                        <!-- Page Tabs Menu--> <?php fill_blog_tabs(); ?>
                                            
                            <div class="widget sidebar-widget widget_categories">
                              <h3 class="widgettitle">Post Categories</h3>
                                <ul>
                                  <li><a href="https://demo1.imithemes.com/html/born-to-give/blog.html#"><i class="fa fa-caret-right"></i> Education</a> (3)</li>
                                  <li><a href="https://demo1.imithemes.com/html/born-to-give/blog.html#"><i class="fa fa-caret-right"></i> Environment</a> (1)</li>
                                  <li><a href="https://demo1.imithemes.com/html/born-to-give/blog.html#"><i class="fa fa-caret-right"></i> Water</a> (4)</li>
                                  <li><a href="https://demo1.imithemes.com/html/born-to-give/blog.html#"><i class="fa fa-caret-right"></i> Wild life</a> (2)</li>
                                  <li><a href="https://demo1.imithemes.com/html/born-to-give/blog.html#"><i class="fa fa-caret-right"></i> Small business</a> (12)</li>
                                </ul>
                            </div></div></div>              
                            <br><br>
                            <div class="widget sidebar-widget widget_search" id="search_bar">
                              <div class="input-group">
                                  <input type="text" class="form-control" placeholder="Enter your keywords">
                                  <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                                  </span>
                              </div>
                            </div><br><br><br>
                            <div class="widget widget_testimonials">
                              <h3 class="widgettitle">Stories of change</h3>
                                <div class="carousel-wrapper" style="background: none;">
                                    <div class="row">
                                        <ul class="owl-carousel carousel-fw owl-theme" id="testimonials-slider" data-columns="1" data-autoplay="5000" data-pagination="no" data-arrows="yes" data-single-item="no" data-items-desktop="1" data-items-desktop-small="1" data-items-tablet="1" data-items-mobile="1" style="opacity: 1; display: block;">
                                            <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 780px; left: 0px; display: block; transition: all 1000ms ease 0s; transform: translate3d(0px, 0px, 0px);"><div class="owl-item" style="width: 390px;"><li class="item">
                                                <div class="testimonial-block">
                                                    <blockquote>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                                                    </blockquote>
                                                    <div class="testimonial-avatar"><img src="./story1.jpg" alt="" width="70" height="70"></div>
                                                    <div class="testimonial-info">
                                                        <div class="testimonial-info-in">
                                                            <strong>Ada Ajimobi</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li></div><div class="owl-item" style="width: 390px;"><li class="item">
                                                <div class="testimonial-block">
                                                    <blockquote>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                                                    </blockquote>
                                                    <div class="testimonial-avatar"><img src="./story2.jpg" alt="" width="70" height="70"></div>
                                                    <div class="testimonial-info">
                                                        <div class="testimonial-info-in">
                                                            <strong>Chloe Lévesque</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li></div></div></div>
                                            
                                        <div class="owl-controls clickable"><div class="owl-buttons"><div class="owl-prev"><i class="fa fa-chevron-left"></i></div><div class="owl-next"><i class="fa fa-chevron-right"></i></div></div></div></ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
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