<?php
if (!isset($_SESSION)) {
  session_start();
}

include 'shared_resources.php';
include 'get_blogs.php';
include 'feedback_fill.php';
include 'create_comment_post.php';
if (isset($_SESSION['role'])) {
  $userRole = $_SESSION['role'];
}

// Define the number of blogs per page (default to 3)
$blogsPerPage = isset($_GET['update_server_page_list_number']) ? intval($_GET['update_server_page_list_number']) : 3;

// Get the current page number from the URL parameters, default to 1 if not set
$current_page = isset($_GET['current_page']) ? intval($_GET['current_page']) : 1; // intval ensures the variable is an integer for security


// Check if the current page is blogs.php and current_page parameter is not set
if (basename($_SERVER['PHP_SELF']) == 'blogs.php' && !isset($_GET['current_page'])) {
  // Redirect to the same page with the current_page parameter
  header('Location: blogs.php?current_page#1');//. $current_page);
  exit(); // Ensure script stops execution after redirection
}
?>

<!DOCTYPE HTML>
<html>

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
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <!-- css
  ================================================== -->
  <?php css() ?>
  <!-- SCRIPTS
  ================================================== -->
  <?php load_common_page_scripts() ?>
</head>

<body>

  <div class="body">

    <!-- Site Header Wrapper -->
    <?php load_common_page_header(2) ?>
    <!-- Banner Area -->
    <main>
      <?php get_blogs(0, 10); ?>
    </main>
    <!-- Site Footer -->
    <?php load_common_page_footer() ?>
    <!-- Libraries Loader -->
    <?php lib() ?>
    <!-- Style Switcher Start -->
    <?php style_switcher() ?>

</body>

</html>