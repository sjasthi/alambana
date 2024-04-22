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

<!DOCTYPE HTML>
<html class="no-js">

<head>
    <!-- Basic Page Needs
  ================================================== -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Hunger</title>
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
            <div class="page-banner parallax" id="banner" style="background-image:url(images/parallax6.jpg);">
                <div class="container">
                    <div class="page-banner-text">
                        <h1 class="block-title">Hunger</h1>
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
    </div>
    <!-- Page 1 -->
    <script>
        const imageUpload = document.getElementById('imageUpload');
        const banner = document.getElementById('banner');

        // Retrieve the stored image URL from local storage on page load
        const storedImageUrl = localStorage.getItem('hungerBanner');
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
                    localStorage.setItem('hungerBanner', e.target.result);
                };
                reader.readAsDataURL(file);
            }
        });
    </script>


    <!-- Main Content -->
    <div id="main-container">
        <div class="content">
            <div class="container">
                <div class="grid-filter">
                    <div class="col-md-20 col-sm-15">
                        <p class="lead">Hunger is an issue we are passionate about at Aalambana Foundation,
                            and we are consciously picking organizations that cater to similar initiatives.
                            Organizations that we have been working with:
                        </p>
                    </div>
                    <div class="col-md-10 col-sm-10">
                        -OC Food Bank
                    </div>
                    <div class="col-md-10 col-sm-10">
                        -Wound Walk OC
                    </div>
                    <div class="col-md-10 col-sm-10">
                        -Grandma’s House of Hope
                    </div>
                    <div class="col-md-10 col-sm-10">
                        -Orange County Rescue Mission
                    </div>
                    <div class="col-md-10 col-sm-10">

                    </div>
                    <ul class="nav nav-pills sort-source" data-sort-id="gallery" data-option-key="filter">
                        <li data-option-value="*" class="active"><a href="#"><i class="fa fa-th"></i> <span>Show
                                    All</span></a></li>
                        <li data-option-value=".education"><a href="#"><span>Education</span></a></li>
                        <li data-option-value=".wild-life"><a href="#"><span>Wild Life</span></a></li>
                        <li data-option-value=".environment"><a href="#"><span>Environment</span></a></li>
                        <li data-option-value=".water"><a href="#"><span>Water</span></a></li>
                        <li data-option-value=".human-rights"><a href="#"><span>Human Rights</span></a></li>
                        <li data-option-value=".small-business"><a href="#"><span>Small Business</span></a></li>
                    </ul>
                </div>
                <div class="row">
                    <ul class="sort-destination isotope gallery-items" data-sort-id="gallery">
                        <li class="col-md-4 col-sm-6 grid-item cause-grid-item small-business format-standard">
                            <div class="grid-item-inner">
                                <a href="single-cause.php" class="media-box">
                                    <img src="images/causeg1.jpg" alt="">
                                </a>
                                <div class="grid-item-content">
                                    <a class="cProgress" data-complete="88" data-color="F23827" data-toggle="tooltip"
                                        data-original-title="10 days left"><strong></strong></a>
                                    <h3 class="post-title"><a href="single-cause.php">Help small shopkeepers of
                                            Sunyani</a></h3>
                                    <div class="meta-data">Donated $26400 / <span class="cause-target">$30000</span>
                                    </div>
                                    <a href="#" class="btn btn-primary" data-toggle="modal"
                                        data-target="#DonateModal">Donate Now</a>
                                </div>
                            </div>
                        </li>
                        <li class="col-md-4 col-sm-6 grid-item cause-grid-item human-rights format-standard">
                            <div class="grid-item-inner">
                                <a href="single-cause.php" class="media-box">
                                    <img src="images/causeg2.jpg" alt="">
                                </a>
                                <div class="grid-item-content">
                                    <a class="cProgress" data-complete="52" data-color="F6BB42" data-toggle="tooltip"
                                        data-original-title="25 days left"><strong></strong></a>
                                    <h3 class="post-title"><a href="single-cause.php">Help relocate the refugees</a>
                                    </h3>
                                    <div class="meta-data">Donated $21840 / <span class="cause-target">$40000</span>
                                    </div>
                                    <a href="#" class="btn btn-primary" data-toggle="modal"
                                        data-target="#DonateModal">Donate Now</a>
                                </div>
                            </div>
                        </li>
                        <li class="col-md-4 col-sm-6 grid-item cause-grid-item wild-life format-standard">
                            <div class="grid-item-inner">
                                <a href="single-cause.php" class="media-box">
                                    <img src="images/causeg5.jpg" alt="">
                                </a>
                                <div class="grid-item-content">
                                    <a class="cProgress" data-complete="75" data-color="8CC152" data-toggle="tooltip"
                                        data-original-title="65 days left"><strong></strong></a>
                                    <h3 class="post-title"><a href="single-cause.php">Save tigers from poachers</a></h3>
                                    <div class="meta-data">Donated $15000 / <span class="cause-target">$20000</span>
                                    </div>
                                    <a href="#" class="btn btn-primary" data-toggle="modal"
                                        data-target="#DonateModal">Donate Now</a>
                                </div>
                            </div>
                        </li>
                        <li
                            class="col-md-4 col-sm-6 grid-item cause-grid-item human-rights environment format-standard">
                            <div class="grid-item-inner">
                                <a href="single-cause.php" class="media-box">
                                    <img src="images/causeg6.jpg" alt="">
                                </a>
                                <div class="grid-item-content">
                                    <a class="cProgress" data-complete="88" data-color="8CC152" data-toggle="tooltip"
                                        data-original-title="70 days left"><strong></strong></a>
                                    <h3 class="post-title"><a href="single-cause.php">Help rebuild Nepal</a></h3>
                                    <div class="meta-data">Donated $176000 / <span class="cause-target">$200000</span>
                                    </div>
                                    <a href="#" class="btn btn-primary" data-toggle="modal"
                                        data-target="#DonateModal">Donate Now</a>
                                </div>
                            </div>
                        </li>
                        <li class="col-md-4 col-sm-6 grid-item cause-grid-item human-rights education format-standard">
                            <div class="grid-item-inner">
                                <a href="single-cause.php" class="media-box">
                                    <img src="images/causeg3.jpg" alt="">
                                </a>
                                <div class="grid-item-content">
                                    <a class="cProgress" data-complete="20" data-color="8CC152" data-toggle="tooltip"
                                        data-original-title="102 days left"><strong></strong></a>
                                    <h3 class="post-title"><a href="single-cause.php">Education for everyone</a></h3>
                                    <div class="meta-data">Donated $4000 / <span class="cause-target">$20000</span>
                                    </div>
                                    <a href="#" class="btn btn-primary" data-toggle="modal"
                                        data-target="#DonateModal">Donate Now</a>
                                </div>
                            </div>
                        </li>
                        <li
                            class="col-md-4 col-sm-6 grid-item cause-grid-item water environment human-rights format-standard">
                            <div class="grid-item-inner">
                                <a href="single-cause.php" class="media-box">
                                    <img src="images/causeg4.jpg" alt="">
                                </a>
                                <div class="grid-item-content">
                                    <a class="cProgress" data-complete="50" data-color="8CC152" data-toggle="tooltip"
                                        data-original-title="105 days left"><strong></strong></a>
                                    <h3 class="post-title"><a href="single-cause.php">Save water initiative</a></h3>
                                    <div class="meta-data">Donated $5000 / <span class="cause-target">$10000</span>
                                    </div>
                                    <a href="#" class="btn btn-primary" data-toggle="modal"
                                        data-target="#DonateModal">Donate Now</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Page Pagination -->
                <nav>
                    <ul class="pagination pagination-lg">
                        <li>
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li>
                            <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- Site Footer -->
    <?php load_common_page_footer() ?>
    <!-- Donation Dialog -->
    <?php donate_dialog() ?>
    <!-- Libraries Loader -->
    <?php lib() ?>
    <!-- Style Switcher Start -->
    <?php style_switcher() ?>
</body>

</html>