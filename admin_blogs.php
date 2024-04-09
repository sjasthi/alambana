<?php
ob_start();
if (!isset ($_SESSION)) {
  session_start();
}

if ($_SESSION['role'] != 'Administrator') {
  header('Location:blogs.php');
}

include ('shared_resources.php');
include ('blog_fill.php');
require_once "header/index.php";

ob_end_flush();
?>
<!DOCTYPE HTML>
<html>

<head>
  <!-- Basic Page Needs
  ================================================== -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <!-- Include the favicon.ico file -->
  <?php generateFaviconLink() ?>
  <title>Blogs [admin]</title>
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
  <?php css(2) ?>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <!-- SCRIPTS
  ================================================== -->
  <?php load_common_page_scripts() ?>


</head>

<body>
  <div>
    <?php generate_header(); ?>
    <main>
      <?php get_blogs(1, 10); ?>
    </main>
    <!-- Site Footer -->
    <?php load_common_page_footer(2) ?>
    <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>
  </div>
  <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a></div>
  <!-- Libraries Loader -->
  <?php lib() ?>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</body>

</html>