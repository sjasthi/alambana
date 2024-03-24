<?php

if (!isset ($_SESSION)) {
    session_start();
}

include 'shared_resources.php';
include 'feedback_fill.php';
require_once "header/index.php";
require_once "bootstrap.php";
set_up_bootstrap();
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
    <title>Our Impact</title>
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
    <script src="js/modernizr.js"></script><!-- Modernizr -->
</head>

<body>
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
                        <h1 class="block-title">Our Impact</h1>
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
            const storedImageUrl = localStorage.getItem('outImpactBanner');
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
                        localStorage.setItem('outImpactBanner', e.target.result);
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
                        <div class="col-md-8 content-block">
                            <p>To date, Aalambana Foundation has made charitable donations that total more than $30,000.
                                Some of the organizations that we support includes OC Food Bank, Wound Walk OC,
                                Grandma’s House of Hope, Orange County Rescue Mission, South County Outreach, Nagai
                                Narayanji Memorial Foundation and many others

                                By funding orphanages, meals, grocercies, enrichment, back to school drives, food
                                drives, enrichment, development activities, medical camps, mentoring and education
                                programs and providing scholarships, Aalambana Foundation is making a positive and
                                lasting impact on communities across many urban and rural areas</p>
                            <h3>There are multiple ways you can help others to change their lives</h3>
                            <ul class="checks">
                                <li>Start a workplace campaign</li>
                                <li>Youth involvement</li>
                                <li>Become a Volunteer</li>
                                <li>Become a partner</li>
                                <li>Representative Program</li>

                            </ul>
                        </div>

                        <div class="col-md-4 sidebar-block">
                            <div class="widget widget_donations">
                                <i class="fa fa-dollar fa-5x pull-left"></i>
                                <h4>What your single dollar can change</h4>
                                <form>
                                    <label>Name</label>
                                    <input type="text" class="form-control">
                                    <label>Amount (in USD)</label>
                                    <input type="text" class="form-control" placeholder="$">
                                    <button
                                        class="btn btn-default btn-ghost btn-light btn-rounded btn-block">Donate</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="spacer-50"></div>
                <div class="padding-tb45 parallax parallax-light parallax1 counters"
                    style="background-image:url(images/inside6.jpg)">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="fact-ico"> <i class="fa fa-dollar fa-4x"></i> </div>
                                <div class="timer" data-perc="9000"> <span class="count">1380089</span> </div>
                                <span class="fact">Amount raised</span>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="fact-ico"> <i class="fa fa-heart-o fa-4x"></i> </div>
                                <div class="timer" data-perc="96"> <span class="count">36</span> </div>
                                <span class="fact">Causes</span>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="fact-ico"> <i class="fa fa-bar-chart-o fa-4x"></i> </div>
                                <div class="timer" data-perc="1500"> <span class="count">1211</span> </div>
                                <span class="fact">Total members</span>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="fact-ico"> <i class="fa fa-hand-peace-o fa-4x"></i> </div>
                                <div class="timer" data-perc="1500"> <span class="count">61098</span> </div>
                                <span class="fact">People Impacted</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="padding-tb75 padding-b0">
                    <div class="container">
                        <div class="text-align-center">
                            <h2 class="block-title block-title-center">Some of the success stories</h2>
                        </div>
                        <div class="carousel-wrapper">
                            <div class="row">
                                <?php fill_feedback_comments_carousel() ?>
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