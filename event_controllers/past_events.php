<?php

if (!isset ($_SESSION)) {
    session_start();
}

include 'shared_resources.php';
include 'get_events.php';
include 'time_formatting.php';
require_once './header/index.php';
require_once './bootstrap.php';
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
    <link rel="icon" href="../favicon.ico" type="image/x-icon">
    <title>Events Calendar</title>
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
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-theme.css" rel="stylesheet" type="text/css">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <link href="../vendor/magnific/magnific-popup.css" rel="stylesheet" type="text/css">
    <link href="../vendor/owl-carousel/css/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="../vendor/owl-carousel/css/owl.theme.css" rel="stylesheet" type="text/css">
    <!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
    <link href="../css/custom.css" rel="stylesheet" type="text/css"><!-- CUSTOM STYLESHEET FOR STYLING -->
    <!-- Color Style -->
    <link class="alt" href="../colors/color1.css" rel="stylesheet" type="text/css">
    <link href="../style-switcher/css/style-switcher.css" rel="stylesheet" type="text/css">
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
        <!-- Banner Area -->
        <div class="hero-area">
            <div class="page-banner parallax" id="banner" style="background-image:url(../images/inside9.jpg);">
                <div class="container">
                    <div class="page-banner-text">
                        <h1 class="block-title">Past Events</h1>
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
            const storedImageUrl = localStorage.getItem('eventCalenderBanner');
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
                        localStorage.setItem('eventCalenderBanner', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
            <?php $events = get_events("past", 0, 100); ?>
        </script>
        <!-- Main Content -->
        <div id="main-container">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 content-block">
                            <ul class="events-list">
                                <?php foreach ($events as $event) { ?>
                                    <li class="event-list-item">
                                        <span class="event-date">
                                            <span class="date">
                                                <?php echo get_event_day($event["event_date_start"]); ?>
                                            </span>
                                            <span class="month">
                                                <?php echo get_event_month($event["event_date_start"]); ?>
                                            </span>
                                            <span class="year">
                                                <?php echo get_event_year($event["event_date_start"]); ?>
                                            </span>
                                        </span>
                                        <div class="event-list-cont">
                                            <span class="meta-data">
                                                <?php echo format_date($event["event_date_start"], $event["event_date_end"]); ?>
                                            </span>
                                            <h4 class="post-title"><a
                                                    href="single-event.php?id=<?php echo $event["id"]; ?>">
                                                    <?php echo $event["title"]; ?>
                                                </a></h4>
                                            <p>
                                                <?php echo $event["description"]; ?>
                                            </p>
                                            <a href="#" class="btn btn-default">Book Tickets</a>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                            </nav>
                        </div>

                        <!-- Sidebar -->
                        <div class="col-md-4 sidebar-block">
                            <div class="widget sidebar-widget widget_categories">
                                <h3 class="widgettitle">Event Categories</h3>
                                <ul>
                                    <?php
                                    $catagories = get_event_catagories();
                                    foreach ($catagories as $catagory) { ?>
                                        <li data-option-value=".<?php echo str_replace(" ", "-", $catagory); ?>"><a
                                                href="#"><span>
                                                    <?php echo $catagory; ?>
                                                </span></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="widget widget_recent_causes">
                                <h3 class="widgettitle">Latest Causes</h3>
                                <ul>
                                    <li>
                                        <a href="#" class="cause-thumb">
                                            <img src="images/cause1.jpg" alt="" class="img-thumbnail">
                                            <div class="cProgress" data-complete="88" data-color="42b8d4">
                                                <strong></strong>
                                            </div>
                                        </a>
                                        <h5><a href="single-cause.php">Help small shopkeepers of Sunyani</a></h5>
                                        <span class="meta-data">10 days left to achieve</span>
                                    </li>
                                    <li>
                                        <a href="#" class="cause-thumb">
                                            <img src="images/cause5.jpg" alt="" class="img-thumbnail">
                                            <div class="cProgress" data-complete="75" data-color="42b8d4">
                                                <strong></strong>
                                            </div>
                                        </a>
                                        <h5><a href="single-cause.php">Save tigers from poachers</a></h5>
                                        <span class="meta-data">32 days left to achieve</span>
                                    </li>
                                    <li>
                                        <a href="#" class="cause-thumb">
                                            <img src="images/cause6.jpg" alt="" class="img-thumbnail">
                                            <div class="cProgress" data-complete="88" data-color="42b8d4">
                                                <strong></strong>
                                            </div>
                                        </a>
                                        <h5><a href="single-cause.php">Help rebuild Nepal</a></h5>
                                        <span class="meta-data">10 days left to achieve</span>
                                    </li>
                                </ul>
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