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
    <!-- Basic Page Needs
  ================================================== -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Education</title>
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

<body class="single-cause">
    <!--[if lt IE 7]>
    <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
    <div class="body">
        <!-- Site Header Wrapper -->
        <?php generate_header(); ?>
        <!-- Hero Area -->
        <div class="hero-area">
            <div class="page-banner parallax" id="banner" style="background-image:url(images/inside8.jpg);">
                <div class="container">
                    <div class="page-banner-text">
                        <h1 class="block-title">Education</h1>
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

        <!-- Page 2 -->
        <script>
            const imageUpload = document.getElementById('imageUpload');
            const banner = document.getElementById('banner');

            // Retrieve the stored image URL from local storage on page load
            const storedImageUrl = localStorage.getItem('educationImage');
            if (storedImageUrl) {
                banner.style.backgroundImage = `url(${storedImageUrl})`;
            }

            imageUpload.addEventListener('change', function () {
                const file = imageUpload.files[0];
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        banner.style.backgroundImage = `url(${e.target.result})`;

                        // Store the selected image URL for Page 2 in local storage
                        localStorage.setItem('educationImage', e.target.result);
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
                            <h3>Help rebuild Nepal</h3>
                            <div class="post-media">
                                <img src="images/cause-detail6.jpg" alt="">
                            </div>
                            <span class="label label-default">Cause progress</span>
                            <div class="progress">
                                <div style="width: 88%;" class="progress-bar progress-bar-primary"
                                    data-appear-progress-animation="88%" data-appear-animation-delay="100"> <span
                                        class="progress-bar-tooltip">88%</span> </div>
                            </div>
                            <div class="pull-left">Raised <strong>$176000</strong></div>
                            <div class="pull-right">Goal <strong class="accent-color">$200000</strong></div>
                            <div class="spacer-20"></div>
                            <div class="row">
                                <div class="col-md-5 col-sm-5">
                                    <p class="lead">Nepal has been seriously devastated by the recent earthquake. Over
                                        8,000 people have died (with death toll rising), thousands more are injured, and
                                        countless more have been displaced. Many homes, temples, and public monuments
                                        have been destroyed throughout the affected areas.</p>
                                </div>
                                <div class="col-md-7 col-sm-7">
                                    <ul class="list-group">
                                        <li class="list-group-item">Total Donors<span class="badge">2000</span></li>
                                        <li class="list-group-item">Days left to fundraising<span
                                                class="badge">10</span></li>
                                        <li class="list-group-item">Countries helping<span class="badge">130</span></li>
                                    </ul>
                                    <a href="#" class="btn btn-primary btn-block" data-toggle="modal"
                                        data-target="#DonateModal">Donate Now</a>
                                </div>
                            </div>
                            <p>Vestibulum quam nisi, pretium a nibh sit amet, consectetur hendrerit mi. Aenean imperdiet
                                lacus sit amet elit porta, et malesuada erat bibendum. Cras sed nunc massa. Quisque
                                tempor dolor sit amet tellus malesuada, malesuada iaculis eros dignissim. Aenean vitae
                                diam id lacus fringilla maximus. Mauris auctor efficitur nisl, non blandit urna
                                fermentum nec.</p>
                            <img src="images/nepal.jpg" alt="" class="align-left">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque massa ipsum,
                                efficitur a fermen tum sed, suscipit sit amet arcu. Ut ut finibus tortor, eu ultrices
                                turpis. Mauris vitae elit nec diam elementum elementum. Mauris ante quam, consequat ac
                                nibh placerat, lacinia sollicitudin mi. Duis facilisis nibh quam, sit amet interdum
                                tellus sollicitudin tempor. Curabitur aliquam erat in nisl lobortis, ut pellentesque
                                lectus viverra.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque massa ipsum,
                                efficitur a fermen tum sed, suscipit sit amet arcu. Ut ut finibus tortor, eu ultrices
                                turpis. Mauris vitae elit nec diam elementum elementum. Mauris ante quam, consequat ac
                                nibh placerat, lacinia sollicitudin mi. Duis facilisis nibh quam, sit amet interdum
                                tellus sollicitudin tempor. Curabitur aliquam erat in nisl lobortis, ut pellentesque
                                lectus viverra. Aenean sodales aliquet arcu at aliquam. Vestibulum quam nisi, pretium a
                                nibh sit amet, consectetur hendrerit mi. Aenean imperdiet lacus sit amet elit porta, et
                                malesuada erat bibendum. Cras sed nunc massa. Quisque tempor dolor sit amet tellus
                                malesuada, malesuada iaculis eros dignissim. Aenean vitae diam id lacus fringilla
                                maximus. Mauris auctor efficitur nisl, non blandit urna fermentum nec.</p>
                        </div>

                        <!-- Sidebar -->
                        <div class="col-md-4 sidebar-block">
                            <!-- Latest Events -->
                            <div class="widget events-calendar-widget">
                                <h3 class="widgettitle">Upcoming Events</h3>
                                <div class="events-calendar-widget-body">
                                    <ul class="events-compact-list">
                                        <li class="event-list-item">
                                            <span class="event-date">
                                                <span class="date">14</span>
                                                <span class="month">Jan</span>
                                                <span class="year">2016</span>
                                            </span>
                                            <div class="event-list-cont">
                                                <span class="meta-data">Thursday, 11:20 AM</span>
                                                <h4 class="post-title"><a href="#">Summer Camp: Students Get
                                                        Together</a></h4>
                                            </div>
                                        </li>
                                        <li class="event-list-item">
                                            <span class="event-date">
                                                <span class="date">18</span>
                                                <span class="month">Jan</span>
                                                <span class="year">2016</span>
                                            </span>
                                            <div class="event-list-cont">
                                                <span class="meta-data">Monday, 07:00 PM</span>
                                                <h4 class="post-title"><a href="#">Fundraising for meals</a></h4>
                                            </div>
                                        </li>
                                        <li class="event-list-item">
                                            <span class="event-date">
                                                <span class="date">26</span>
                                                <span class="month">Feb</span>
                                                <span class="year">2016</span>
                                            </span>
                                            <div class="event-list-cont">
                                                <span class="meta-data">Friday, 01:00 PM</span>
                                                <h4 class="post-title"><a href="#">Green Environment</a></h4>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
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
                            <?php fill_blog_post_side_container_small() ?>
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