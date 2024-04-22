<?php
session_start();

require_once 'shared_resources.php';
require_once 'blog_controllers/get_blogs.php';
require_once 'header/index.php';
require_once 'banner/index.php';
require_once 'user_controllers/get_user.php';

if (!isset($_GET["user_id"])) {
  $_GET["user_id"] = $_SESSION["id"];
}
if ($_SESSION["role"] === "User" && $_SESSION["id"] !== $_GET["user_id"]) {
  ?>
  <script>
    window.location.href = "profile_view.php?user_id=<?php echo $_GET["user_id"]; ?>";
  </script>
  <?php
}
css();
?>

<!DOCTYPE HTML>
<html class="no-js">

<head>
  <meta http-equiv="Content-Type" content="text/html, charset=utf-8">
  <title>Aalambana - My Profile</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, user-scalable=false;">
  <meta name="format-detection" content="telephone=no">
</head>

<body>
  <?php
  generate_header();
  generate_banner("My Profile", "images/inside7.jpg");
  ?>
  <main>
    <?php
    get_profile($_GET["user_id"], true);
    ?>
  </main>
  <!-- Site Footer -->
  <?php load_common_page_footer(); ?>
  <!-- Libraries Loader -->
  <?php lib(); ?>
  <!-- Style Switcher Start -->
  <?php style_switcher(); ?>
</body>

</html>