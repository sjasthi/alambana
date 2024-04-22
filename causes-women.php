<?php

if (!isset ($_SESSION)) {
    session_start();
}

include 'shared_resources.php';
//include 'blog_fill.php';
include 'feedback_fill.php';
require_once "header/index.php";

if (isset ($_SESSION['role'])) {
    $userRole = $_SESSION['role'];
}
?>

<!DOCTYPE HTML>
<html class="no-js">

<head>
<meta charset="UTF-8">
  <title>Education | Aalambana Foundation</title>
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
        <?php generate_header() ?>
        <!-- Hero Area -->
        <div class="hero-area">
            <div class="page-banner parallax" id="banner" style="background-image:url(images/women.jpg);">
                <div class="container">
                    <div class="page-banner-text">
                        <h1 class="block-title">Woman Empower</h1>
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
            const storedImageUrl = localStorage.getItem('womanEmpower');
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
                        localStorage.setItem('womanEmpower', e.target.result);
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
                            <ul class="causes-list cause-page-listing">
                                <li class="causes-list-item cause-item">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 list-thumb">
                                            <a href="single-cause.php">
                                                <img src="images/womenempowerment.png" alt="">
                                            </a>
                                            <div class="cause-progress"><a class="cProgress" data-complete="88"
                                                    data-color="F23827" data-toggle="tooltip"
                                                    data-original-title="10 days left"
                                                    data-placement="left"><strong></strong></a></div>
                                        </div>
                                        <div class="col-md-8 col-sm-8">
                                            <div class="cause-list-item-cont">
                                                <h3 class="post-title"><a href="single-cause.php">Empower Women</a></h3>
                                                <p>Empowering women means giving them the tools, opportunities, and
                                                    support to thrive and achieve their goals.</p>
                                                <div class="meta-data">Donated $26400 / <span
                                                        class="cause-target">$30000</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="causes-list-item cause-item">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 list-thumb">
                                            <a href="single-cause.php">
                                                <img src="images/commresour.jpg" alt="">
                                            </a>
                                            <div class="cause-progress"><a class="cProgress" data-complete="52"
                                                    data-color="F6BB42" data-toggle="tooltip"
                                                    data-original-title="25 days left"
                                                    data-placement="left"><strong></strong></a></div>
                                        </div>
                                        <div class="col-md-8 col-sm-8">
                                            <div class="cause-list-item-cont">
                                                <h3 class="post-title"><a href="community-support.php">Community Support
                                                        and Resources</a></h3>
                                                <p>Connect women with resources and support groups.</p>
                                                <div class="meta-data">Donated $21840 / <span
                                                        class="cause-target">$40000</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="causes-list-item cause-item">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 list-thumb">
                                            <a href="single-cause.php">
                                                <img src="images/advocacy.png" alt="">
                                            </a>
                                            <div class="cause-progress"><a class="cProgress" data-complete="75"
                                                    data-color="8CC152" data-toggle="tooltip"
                                                    data-original-title="65 days left"
                                                    data-placement="left"><strong></strong></a></div>
                                        </div>
                                        <div class="col-md-8 col-sm-8">
                                            <div class="cause-list-item-cont">
                                                <h3 class="post-title"><a href="single-cause.php">Advocacy and
                                                        Awareness</a></h3>
                                                <p>Raise awareness and encourage activism for gender equality.</p>
                                                <div class="meta-data">Donated $15000 / <span
                                                        class="cause-target">$20000</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="causes-list-item cause-item">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 list-thumb">
                                            <a href="single-cause.php">
                                                <img src="images/empower.jpg" alt="">
                                            </a>
                                            <div class="cause-progress"><a class="cProgress" data-complete="88"
                                                    data-color="8CC152" data-toggle="tooltip"
                                                    data-original-title="70 days left"
                                                    data-placement="left"><strong></strong></a></div>
                                        </div>
                                        <div class="col-md-8 col-sm-8">
                                            <div class="cause-list-item-cont">
                                                <h3 class="post-title"><a href="single-cause.php">Empowerment
                                                        Programs</a></h3>
                                                <p>Showcase initiatives and success stories.</p>
                                                <div class="meta-data">Donated $176000 / <span
                                                        class="cause-target">$200000</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
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
                        <div class="col-md-4 sidebar-block">
                            <div class="widget sidebar-widget widget_categories">
                                <h3 class="widgettitle">Cause Categories</h3>
                                <ul>
                                    <li><a href="#">Education</a> (3)</li>
                                    <li><a href="#">Environment</a> (1)</li>
                                    <li><a href="#">Global warming</a> (6)</li>
                                    <li><a href="#">Water</a> (4)</li>
                                    <li><a href="#">Wild life</a> (2)</li>
                                    <li><a href="#">Small business</a> (12)</li>
                                </ul>
                            </div>
                            <!-- Side blog List (Lastest Postings) -->
                            <?php //fill_blog_post_side_container_small()  ?>

                            <!-- <div class="widget widget_testimonials">
                                <h3 class="widgettitle">Stories of change</h3>
                                <div class="carousel-wrapper">
                                    <div class="row">
                                        <?php //fill_feedback_comments_carousel(); ?>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
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