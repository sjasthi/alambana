<?php
if (!isset ($_SESSION)) {
  session_start();
}
if (!isset ($_GET["page"])) {
  header("Location: blogs.php?page=1");
}
if ($_GET["page"] < 1) {
  header("Location: blogs.php?page=1");
}
include 'blog_controllers/get_blogs.php';
include 'shared_resources.php';
include 'feedback_fill.php';
include 'create_comment_post.php';
require_once './header/index.php';
require_once './bootstrap.php';

if (isset ($_SESSION['role'])) {
  $userRole = $_SESSION['role'];
}
$page_count = ceil(get_blog_count() / 10);
if ($_GET["page"] > $page_count) {
  //header("Location: blogs.php?page=$page_count");
  echo "<script>window.location.href='blogs.php?page=$page_count';</script>";
}
set_up_bootstrap();
// Check if the current page is blogs.php and current_page parameter is not set

?>

<!DOCTYPE HTML>
<html>

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
    <?php generate_header(); ?>
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
    <main style="text-align: center;">
      <div class="pages-container">
        <?php
        for ($i = 1; $i <= $page_count; $i++) {
          ?>
          <a class="page-number-container-top-<?php echo $i; ?>">
            <?php
            if ($i != $_GET["page"]) {
              echo "<p style='text-decoration: underline; margin: 4px; margin-top: 0;'>";
            }
            echo $i;
            if ($i != $_GET["page"]) {
              echo "</p>";
            }
            ?>
          </a>
          <script>
            const pageNumber<?php echo $i; ?>TopContainer = document.getElementsByClassName("page-number-container-top-<?php echo $i; ?>")[0];
            pageNumber<?php echo $i; ?>TopContainer.addEventListener("click", (event) => {
              window.location.href = 'blogs.php?page=<?php echo $i; ?>';
            });
          </script>
          <?php
        }
        ?>
      </div>
      <?php get_blogs(($_GET["page"] - 1) * 10, 10); ?>
      <div class="pages-container">
        <?php
        for ($i = 1; $i <= $page_count; $i++) {
          ?>
          <a class="page-number-container-<?php echo $i; ?>">
            <?php
            if ($i != $_GET["page"]) {
              echo "<p style='text-decoration: underline; margin: 4px; margin-top: 0;'>";
            } else {
              echo "<p style='margin: 4px; margin-top: 0;'>";
            }
            echo $i;
            echo "</p>";
            ?>
          </a>
          <script>
            const pageNumber<?php echo $i; ?>Container = document.getElementsByClassName("page-number-container-<?php echo $i; ?>")[0];
                      pageNumber<?php echo $i; ?>Container.addEventListener("click", (event) => {
              window.location.href = 'blogs.php?page=<?php echo $i; ?>';
            });
          </script>
          <?php
        }
        ?>
      </div>
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