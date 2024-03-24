<?php
if (!isset ($_SESSION)) {
  session_start();
}

include 'shared_resources.php';
include 'blog_controllers/get_blogs.php';
include 'feedback_fill.php';
include 'create_comment_post.php';
require_once './header/index.php';
require_once './bootstrap.php';

set_up_bootstrap();
if (isset ($_SESSION['role'])) {
  $userRole = $_SESSION['role'];
}


// Check if the current page is blogs.php and current_page parameter is not set

?>

<!DOCTYPE HTML>
<html>

<style>
  .blog-container {
    margin: 16px auto 16px auto;
    max-width: 800px;
    text-align: center;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    border: 3px solid lightblue;
    border-radius: 16px;
  }

  .blog-container .info-container {
    display: flex;
    flex-direction: column;
  }

  .blog-container .info-container .author-container img {
    width: 36px;
    height: 36px;
    padding: 4px;
    background-color: lightblue;
    border-radius: 18px;
  }

  .blog-container .text-container {
    width: 100%;
  }
</style>

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
  <div class="body">

    <!-- Site Header Wrapper -->
    <?php generate_header();//load_common_page_header(2)   ?>
    <!-- Banner Area -->
    <div class="hero-area">
      <div class="page-banner parallax" id="banner" style="background-image:url(images/inside7.jpg);">
        <div class="container">
          <div class="page-banner-text">
            <h1 class="block-title">Blogs</h1>
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
    </div>
    <main>
      <?php get_blogs(0, 10); ?>
    </main>
    <!-- Site Footer -->
    <?php load_common_page_footer(); ?>
    <!-- Libraries Loader -->
    <?php lib(); ?>
    <!-- Style Switcher Start -->
    <?php style_switcher(); ?>
  </div>
</body>

</html>