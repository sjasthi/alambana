<?php
if (!isset($_GET["page"])) {
  header("Location: admin_blogs.php?page=1");
}
if ($_GET["page"] < 1) {
  header("Location: admin_blogs.php?page=1");
}
session_start();
require_once 'header/index.php';
require_once 'shared_resources.php';
require_once 'banner/index.php';
require_once 'blog_controllers/get_blogs.php';
$page_count = ceil(get_blog_count() / 10);
css();
?>

<!DOCTYPE HTML>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html, charset=utf-8">
  <title>Aalambana - Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, user-scalable=false;">
  <meta name="format-detection" content="telephone=no">
</head>

<body>
  <!-- Site Header Wrapper -->
  <?php
  generate_header();
  generate_banner("Blogs (Click to delete or edit)", "images/inside7.jpg");
  ?>
  <!-- Banner Area -->

  <main>
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
            window.location.href = 'admin_blogs.php?page=<?php echo $i; ?>';
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
            window.location.href = 'admin_blogs.php?page=<?php echo $i; ?>';
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
</body>

</html>