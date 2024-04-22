<?php
if (!isset ($_SESSION)) {
    session_start();
}

include 'shared_resources.php';
require_once "header/index.php";

if (isset ($_SESSION['role'])) {
    $userRole = $_SESSION['role'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Donation Confirmation | Aalambana Foundation</title>
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="style.css">
   <!-- Mobile Specific Metas
  ================================================== -->
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <!-- CSS
  ================================================== -->
    <?php css() ?>

    <!-- SCRIPTS
  ================================================== -->
    <?php load_common_page_scripts() ?>

    <?php generate_header(); ?>

  <style>
    h1 {
      text-align: center;
      margin-top: 150px;
    }
    p {
      text-align: center;
      margin: 20px 0;
    }
    a {
      color: #007bff;
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
    button {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      display: block;
      margin: 0 auto;
      width: fit-content;
      margin-bottom: 100px;
    }
    button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>

  <h1>Thank you for your donation!</h1>
  <section id="success">
    <p>
      We appreciate your business! A confirmation email will be sent to <span id="customer-email"></span>.
    </p>
    <p>
      If you have any questions, please email us at <a href="mailto:aalambanafoundation@gmail.com">aalambanafoundation@gmail.com</a>.
    </p>
  </section>

  <form method="post" action="index.php">
    <p>Return to Aalambana Foundation Home Page</p>
    <button>Return</button>
  </form>

  <!-- Site Footer -->
  <?php load_common_page_footer() ?>
  <!-- Libraries Loader -->
  <?php lib() ?>
  <!-- Style Switcher Start -->
  <?php style_switcher() ?>

</body>
</html>