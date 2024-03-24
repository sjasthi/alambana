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
    <title>Upcoming Events</title>
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
    <?php load_common_page_scripts(); ?>
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

    <div class="body">

        <!-- Site Header Wrapper -->
        <?php generate_header(); ?>
        <!-- Hero Area -->
        <div class="hero-area">
            <div class="page-banner parallax" id="banner" style="background-image:url(images/inside9.jpg);">
                <div class="container">
                    <div class="page-banner-text">
                        <h1 class="block-title">Upcoming Events</h1>
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

        <?php
        $events = get_events("upcoming", 0, 100);
        $event_catagories = get_event_catagories();
        ?>
        <!-- Main Content -->
        <div id="main-container">
            <div class="content">
                <div class="container">
                    <div class="grid-filter">
                        <ul class="nav nav-pills sort-source" data-sort-id="gallery" data-option-key="filter">
                            <li data-option-value="*" class="active"><a href="#"><i class="fa fa-th"></i> <span>Show
                                        All</span></a></li>
                            <?php foreach ($event_catagories as $catagory) { ?>
                                <li data-option-value=".<?php echo str_replace(" ", "-", $catagory); ?>"><a
                                        href="#"><span>
                                            <?php echo $catagory; ?>
                                        </span></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="row">
                        <ul class="sort-destination isotope gallery-items" data-sort-id="gallery">
                            <?php foreach ($events as $event) { ?>
                                <li
                                    class="col-md-4 col-sm-6 grid-item event-grid-item <?php echo str_replace(" ", "-", $event["catagory"]); ?> format-standard">
                                    <div class="grid-item-inner">
                                        <a href="single-event.php?id=<?php echo $event["id"]; ?>" class="media-box">
                                            <img src="../<?php echo $event["pic_location"]; ?>" alt="">
                                        </a>
                                        <div class="grid-item-content">
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
                                            <span class="meta-data">
                                                <?php echo format_date($event["event_date_start"], $event["event_date_end"]); ?>
                                            </span>
                                            <h3 class="post-title"><a href="single-event.php?id=<?php echo $event["id"]; ?>">
                                                    <?php echo $event["title"]; ?>
                                                </a></h3>
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <?php echo $event["attendees"]; ?><span class="badge">Attendees</span>
                                                </li>
                                                <li class="list-group-item">
                                                    <?php echo $event["location"]; ?><span class="badge">Location</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
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
        <!-- Libraries Loader -->
        <?php lib() ?>
        <!-- Style Switcher Start -->
        <?php style_switcher() ?>
</body>

</html>