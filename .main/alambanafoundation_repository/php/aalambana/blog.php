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
  <script src="js/modernizr.js"></script><!-- Modernizr -->
</head>

<body>
  <!--[if lt IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->


  <div class="body">
    <!-- Site Header Wrapper -->
    <div class="site-header-wrapper">

      <!-- Post Startup Content -->
      <!--?php include 'show-navbar.php'; ?-->
      
      <!--?php include 'admin_blogs.php'; ?-->
      <!--?php show_navbar(); ?-->
      <!--header class="inverse">
      <div class="container">
        <h1><span class="accent-text">Blog</span></h1>
      </div>
    </header-->
      <!-- Form Script -->
      <script>
        let show_form = () => {
          let form = document.getElementById("blog_creation_form");
          let show_button = document.getElementById("form_show_button");
          form.removeAttribute("hidden");
          show_button.setAttribute("hidden", "hidden");
        }
      </script>

      <!-- Site Header Wrapper -->
      <?php load_common_page_header() ?>
    </div>


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
    <div id="main-container">
      <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-md-8 content-block">
              <!-- USER PRIVILEGES ROLE (User/Admin from 'users' Table) -->
              <!--?php
                        if (isset($_SESSION['role'])) {
                          if ($_SESSION['role'] == 'admin') {
                            echo '<button id="form_show_button" onclick="show_form();">Create Post</button>';
                          }
                        }
                      ?-->
              <!-- Blog Create Post Button -->
              <?php echo '<button id="form_show_button" onclick="show_form();">Create Post</button>'; ?><br></br>
              <!-- Blog Form (Initially hidden) [Activates on button click] -->
              <form id="blog_creation_form" action="create_post.php" method="POST" enctype="multipart/form-data" hidden="hidden">
                <div id=blog_creation_left>
                  <label>Blog Title</label>
                  <br>
                  <input type="text" name="title" maxlength=100 required>
                  <br>
                  <label for="description">Description</label>
                  <br>
                  <textarea name="description" rows=9 cols=50 required></textarea>
                </div>
                <div id=blog_creation_right>
                  <label for="author">Author</label>
                  <br>
                  <input type="text" name="author" maxlength=50 required>
                  <br>
                  <label>Image(s)</label>`
                  <br>
                  <input type="file" name="file[]" accept="image/*" multiple="multiple">
                  <br>
                  <label>Video Link</label>
                  <br>
                  <input type="text" name="video_link" maxlength=100 placeholder="Optional">
                </div>
                <br>
                <input type="submit" name="create_post" value="Publish">
              </form>
              
              <!-- Blog Page TOC --> <?php fill_TOC() ?>   
              <!-- Blog Page Fill --> <?php fill_blog(); ?>
              <!-- Page Pagination --> <?php fill_blog_pagination(); ?>
              <!-- Page Tabs Menu--> <?php fill_blog_tabs(); ?>
                        </ul>
                      </div>
                    </div>
                    <div id="Tpopular" class="tab-pane">
                      <div class="widget recent_posts">
                        <ul>
                          <li>
                            <a href="single-post.php" class="media-box">
                              <img src="images/post2.jpg" alt="">
                            </a>
                            <h5><a href="single-post.php">How to survive the tough path of life</a></h5>
                            <span class="meta-data grid-item-meta">Posted on 06th Dec, 2015</span>
                          </li>
                          <li>
                            <a href="single-post.php" class="media-box">
                              <img src="images/post1.jpg" alt="">
                            </a>
                            <h5><a href="single-post.php">A single person can change million lives</a></h5>
                            <span class="meta-data grid-item-meta">Posted on 11th Dec, 2015</span>
                          </li>
                          <li>
                            <a href="single-post.php" class="media-box">
                              <img src="images/post3.jpg" alt="">
                            </a>
                            <h5><a href="single-post.php">Donate your woolens this winter</a></h5>
                            <span class="meta-data grid-item-meta">Posted on 11th Dec, 2015</span>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div id="Tcomments" class="tab-pane">
                      <div class="tag-cloud">
                        <a href="#">Water</a>
                        <a href="#">Students</a>
                        <a href="#">NYC</a>
                        <a href="#">Education</a>
                        <a href="#">Poverty</a>
                        <a href="#">Food</a>
                        <a href="#">Poor</a>
                        <a href="#">Business</a>
                        <a href="#">Love</a>
                        <a href="#">Help</a>
                        <a href="#">Savings</a>
                        <a href="#">Winter</a>
                        <a href="#">Soul</a>
                        <a href="#">Power</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </br></br>
                       
              <!-- Blog Widgets-->
              <div class="widget sidebar-widget widget_categories">
                <h3 class="widgettitle">Post Categories</h3>
                  <ul>
                    <li><a href="#">Education</a> (3)</li>
                    <li><a href="#">Environment</a> (1)</li>
                    <li><a href="#">Water</a> (4)</li>
                    <li><a href="#">Wild life</a> (2)</li>
                    <li><a href="#">Small business</a> (12)</li>
                  </ul>
                </div>
                <div class="widget sidebar-widget widget_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter your keywords">
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                    </span>
                  </div>
                </div>
                <div class="widget widget_testimonials">
                  <h3 class="widgettitle">Stories of change</h3>
                  <div class="carousel-wrapper">
                    <div class="row">
                      <ul class="owl-carousel carousel-fw" id="testimonials-slider" data-columns="1" data-autoplay="5000" data-pagination="no" data-arrows="yes" data-single-item="no" data-items-desktop="1" data-items-desktop-small="1" data-items-tablet="1" data-items-mobile="1">
                        <li class="item">
                          <div class="testimonial-block">
                            <blockquote>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                            </blockquote>
                            <div class="testimonial-avatar"><img src="images/story1.jpg" alt="" width="70" height="70"></div>
                            <div class="testimonial-info">
                              <div class="testimonial-info-in">
                                <strong>Ada Ajimobi</strong>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="item">
                          <div class="testimonial-block">
                            <blockquote>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                            </blockquote>
                            <div class="testimonial-avatar"><img src="images/story2.jpg" alt="" width="70" height="70"></div>
                            <div class="testimonial-info">
                              <div class="testimonial-info-in">
                                <strong>Chloe Lévesque</strong>
                              </div>
                            </div>
                          </div>
                        </li>
                      </ul>
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
      <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>
    </div>

    <!-- Libraries Loader -->
    <?php lib() ?>
    <!-- Style Switcher Start -->
    <?php style_switcher() ?>

</body>

</html>