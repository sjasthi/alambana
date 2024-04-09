<?php

if (!isset ($_SESSION)) {
    session_start();
}

include 'shared_resources.php';
require_once './header/index.php';

if (isset ($_SESSION['role'])) {
    $userRole = $_SESSION['role'];
}
?>

<!DOCTYPE HTML>
<html class="no-js">

<head>
    <!-- Basic Page Needs
  ================================================== -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Aalambana - Refund Policy</title>
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
    <style>
        /* Style for the custom button label */
        .custom-file-upload {
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border: 1px solid #007bff;
            border-radius: 5px;
        }

        /* Hide the actual file input element */
        #imageUpload {
            display: none;
        }
    </style>
</head>

<body>
    <!--[if lt IE 7]>
    <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
    <div class="body">
        <!-- Site Header Wrapper -->
        <?php generate_header(); ?>
        <!-- Hero Area -->
        <div class="hero-area">
            <div class="page-banner parallax" id="banner" style="background-image:url(images/inside7.jpg);">
                <div class="container">
                    <div class="page-banner-text">
                        <h1 class="block-title">Refund policy</h1>
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
        <script>
            const imageUpload = document.getElementById('imageUpload');
            const banner = document.getElementById('banner');

            // Retrieve the stored image URL from local storage on page load
            const storedImageUrl = localStorage.getItem('refundPolicyBanner');
            if (storedImageUrl) {
                banner.style.backgroundImage = `url(${storedImageUrl})`;
            }

            imageUpload.addEventListener('change', function () {
                const file = imageUpload.files[0];
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        banner.style.backgroundImage = `url(${e.target.result})`;

                        // Store the selected image URL for Page 1 in local storage
                        localStorage.setItem('refundPolicyBanner', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
        </script>
        <!-- Main Content -->
        <div id="main-container">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 sidebar-block">
                            <div class="widget sidebar-widget widget_links">
                                <h3 class="widgettitle">Pages</h3>
                                <ul>
                                    <li class="active"><a href="refund-policy.php">Refund policy</a></li>
                                    <li><a href="privacy-policy.php">Privacy policy</a></li>
                                    <li><a href="payment-terms.php">Payment terms</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8 content-block">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.
                                Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem
                                ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.
                                Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem
                                ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.
                                Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem
                                ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.
                                Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Donec
                                facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem ipsum
                                dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec
                                facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Donec
                                facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem ipsum
                                dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec
                                facilisis fermentum sem, ac viverra ante luctus vel.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.
                                Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem
                                ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.
                                Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem
                                ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.
                                Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem
                                ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.
                                Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Donec
                                facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem ipsum
                                dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec
                                facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Donec
                                facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem ipsum
                                dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec
                                facilisis fermentum sem, ac viverra ante luctus vel.</p>
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