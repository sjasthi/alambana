<?Php

if (!isset ($_session)) {
    session_start();
}

include 'shared_resources.php';
include 'event_controllers/event_fill.php';
include 'feedback_fill.php';
require_once 'header/index.php';
require_once 'bootstrap.php';

set_up_bootstrap();

if (isset ($_SESSION['role'])) {
    $userRole = $_SESSION['role'];
}
?>

<!doctype html>
<html class="no-js">

<head>
    <!-- basic page needs
  ================================================== -->
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <!-- include the favicon.ico file -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>aalambana foundation - empowering dreams through education</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!-- mobile specific metas
  ================================================== -->
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <!-- css
  ================================================== -->
    <?php css() ?>

    <!-- scripts
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

        #imageUpload2 {
            display: none;
        }

        #imageUpload3 {
            display: none;
        }

        .carousel-item img {
            object-fit: cover;
            width: 100%;
            height: 416px;
        }

        #carouselExampleControls {
            margin-top: 84px;
        }
    </style>
</head>

<body>

    <div class="body">
        <!-- site header wrapper -->
        <?php generate_header() ?>
        <!-- banner area -->
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="images/cover_image.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h3 class="text-light">Together - We Can Serve Better</h3>
                        <button type="button" class="btn btn-primary">Donate Now</button>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/parallax6.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/slide3.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- end hero slider -->
    </div>
    <div class="accent-bg padding-tb20 cta-fw">
        <div class="container">
            <a href="community-support.php" class="btn btn-default btn-ghost btn-light btn-rounded pull-right">become a
                volunteer</a>
            <h4>let's start doing your bit for the world. Join us as a volunteer</h4>
        </div>
    </div>
    <!-- main content -->
    <div id="main-container">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <h4 class="accent-color short">why to join</h4>
                        <h1>your support can make a huge difference</h1>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <p>ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis
                            nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in
                            vulputate <a href="#">velit esse</a> molestie consequat. Donec vel mauris quam. Lorem
                            ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.</p>
                        <p>donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem
                            ipsum dolor sit amet, consectetur adipiscing elit. Nulla <a href="#">convallis egestas
                                rhoncus</a>. Donec facilisis fermentum sem, ac viverra ante luctus vel.</p>
                    </div>
                </div>
                <div class="spacer-40"></div>
                <!-- latest causes -->
                <div class="carousel-wrapper">
                    <div class="row">
                        <ul class="owl-carousel carousel-fw" id="causes-slider" data-columns="5" data-autoplay=""
                            data-pagination="yes" data-arrows="no" data-single-item="no" data-items-desktop="5"
                            data-items-desktop-small="3" data-items-tablet="2" data-items-mobile="1">
                            <li class="item">
                                <div class="grid-item cause-grid-item small-business format-standard">
                                    <div class="grid-item-inner">
                                        <a href="causes-women.php" class="media-box">
                                            <img src="images/causeg1.jpg" alt="">
                                        </a>
                                        <div class="grid-item-content">
                                            <a class="cprogress" data-complete="88" data-color="f23827"
                                                data-toggle="tooltip"
                                                data-original-title="10 days left"><strong></strong></a>
                                            <h3 class="post-title"><a href="causes-women.php">help small shopkeepers
                                                    of sunyani</a></h3>
                                            <div class="meta-data">Donated $26400 / <span
                                                    class="cause-target">$30000</span></div>
                                        </div>
                                        <a href="#" class="btn btn-primary" data-toggle="modal"
                                            data-target="#DonateModal">Donate now</a>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="grid-item cause-grid-item small-business format-standard">
                                    <div class="grid-item-inner">
                                        <a href="causes-hunger.php" class="media-box">
                                            <img src="images/causeg2.jpg" alt="">
                                        </a>
                                        <div class="grid-item-content">
                                            <a class="cprogress" data-complete="52" data-color="f6bb42"
                                                data-toggle="tooltip"
                                                data-original-title="25 days left"><strong></strong></a>
                                            <h3 class="post-title"><a href="causes-hunger.php">help relocate the
                                                    refugees</a></h3>
                                            <div class="meta-data">Donated $21840 / <span
                                                    class="cause-target">$40000</span></div>
                                        </div>
                                        <a href="#" class="btn btn-primary" data-toggle="modal"
                                            data-target="#DonateModal">Donate now</a>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="grid-item cause-grid-item small-business format-standard">
                                    <div class="grid-item-inner">
                                        <a href="single-cause.php" class="media-box">
                                            <img src="images/causeg5.jpg" alt="">
                                        </a>
                                        <div class="grid-item-content">
                                            <a class="cprogress" data-complete="75" data-color="8cc152"
                                                data-toggle="tooltip"
                                                data-original-title="65 days left"><strong></strong></a>
                                            <h3 class="post-title"><a href="single-cause.php">save tigers from
                                                    poachers</a></h3>
                                            <div class="meta-data">Donated $15000 / <span
                                                    class="cause-target">$20000</span></div>
                                        </div>
                                        <a href="#" class="btn btn-primary" data-toggle="modal"
                                            data-target="#DonateModal">Donate now</a>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="grid-item cause-grid-item small-business format-standard">
                                    <div class="grid-item-inner">
                                        <a href="single-cause.php" class="media-box">
                                            <img src="images/causeg6.jpg" alt="">
                                        </a>
                                        <div class="grid-item-content">
                                            <a class="cprogress" data-complete="88" data-color="8cc152"
                                                data-toggle="tooltip"
                                                data-original-title="70 days left"><strong></strong></a>
                                            <h3 class="post-title"><a href="single-cause.php">help rebuild nepal</a>
                                            </h3>
                                            <div class="meta-data">Donated $176000 / <span
                                                    class="cause-target">$200000</span></div>
                                        </div>
                                        <a href="#" class="btn btn-primary" data-toggle="modal"
                                            data-target="#DonateModal">Donate now</a>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="grid-item cause-grid-item small-business format-standard">
                                    <div class="grid-item-inner">
                                        <a href="causes-education.php" class="media-box">
                                            <img src="images/causeg3.jpg" alt="">
                                        </a>
                                        <div class="grid-item-content">
                                            <a class="cprogress" data-complete="20" data-color="8cc152"
                                                data-toggle="tooltip"
                                                data-original-title="102 days left"><strong></strong></a>
                                            <h3 class="post-title"><a href="causes-education.php">education for
                                                    everyone</a></h3>
                                            <div class="meta-data">Donated $4000 / <span
                                                    class="cause-target">$20000</span></div>
                                        </div>
                                        <a href="#" class="btn btn-primary" data-toggle="modal"
                                            data-target="#DonateModal">Donate now</a>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="grid-item cause-grid-item small-business format-standard">
                                    <div class="grid-item-inner">
                                        <a href="single-cause.php" class="media-box">
                                            <img src="images/causeg4.jpg" alt="">
                                        </a>
                                        <div class="grid-item-content">
                                            <a class="cprogress" data-complete="50" data-color="8cc152"
                                                data-toggle="tooltip"
                                                data-original-title="105 days left"><strong></strong></a>
                                            <h3 class="post-title"><a href="single-cause.php">save water
                                                    initiative</a></h3>
                                            <div class="meta-data">Donated $5000 / <span
                                                    class="cause-target">$10000</span></div>
                                        </div>
                                        <a href="#" class="btn btn-primary" data-toggle="modal"
                                            data-target="#DonateModal">Donate now</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="spacer-50"></div>
            <!-- latest event posts Box channel -->
            <?php fill_event_post_display_container(); ?>
            <!-- latest blog posts comments Box channel -->
            <div class="parallax parallax5 parallax-light text-align-center padding-tb100"
                style="background-image:url(images/cover_image.jpg)">
                <div class="container">
                    <div class="carousel-wrapper">
                        <div class="row">
                            <?php fill_feedback_comments_carousel(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="spacer-75"></div>
            <!-- latest blog posts Box channel -->
            <?php //fill_blog_post_display_container()            ?>


            <script type="text/javascript">

                // frontpage time counter
                var expirydate = $('#counter').data('date');
                var target = new date(expirydate),
                    finished = false,
                    availiableexamples = {
                        set15daysfromnow: 15 * 24 * 60 * 60 * 1000,
                        set5minfromnow: 5 * 60 * 1000,
                        set1minfromnow: 1 * 60 * 1000
                    };
                function callback(event) {
                    $this = $(this);
                    switch (event.type) {
                        case "seconds":
                        case "minutes":
                        case "hours":
                        case "days":
                        case "weeks":
                        case "daysleft":
                            $this.find('div span#' + event.type).php(event.value);
                            if (finished) {
                                $this.fadeto(0, 1);
                                finished = false;
                            }

                            break;
                        case "finished":
                            $this.fadeto('slow', .5);
                            finished = true;
                            break;
                    }
                }
                $('#counter').countdown(target.valueof(), callback);

                const imageUpload = document.getElementById('imageUpload');
                const banner1 = document.getElementById('banner1');

                // Retrieve the stored image URL from local storage on page load
                const storedImageUrl = localStorage.getItem('indexBanner1');
                if (storedImageUrl) {
                    banner1.style.backgroundImage = `url(${storedImageUrl})`;
                }

                imageUpload.addEventListener('change', function () {
                    const file = imageUpload.files[0];
                    if (file && file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            banner1.style.backgroundImage = `url(${e.target.result})`;

                            // Store the selected image URL for Page 1 in local storage
                            localStorage.setItem('indexBanner1', e.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                });

                const imageUpload2 = document.getElementById('imageUpload2');
                const banner2 = document.getElementById('banner2');

                // Retrieve the stored image URL from local storage on page load
                const storedImageUrl2 = localStorage.getItem('indexBanner2');
                if (storedImageUrl2) {
                    banner2.style.backgroundImage = `url(${storedImageUrl2})`;
                }

                imageUpload2.addEventListener('change', function () {
                    const file = imageUpload2.files[0];
                    if (file && file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            banner2.style.backgroundImage = `url(${e.target.result})`;

                            // Store the selected image URL for Page 1 in local storage
                            localStorage.setItem('indexBanner2', e.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                });
                const imageUpload3 = document.getElementById('imageUpload3');
                const banner3 = document.getElementById('banner3');

                // Retrieve the stored image URL from local storage on page load
                const storedImageUrl3 = localStorage.getItem('indexBanner3');
                if (storedImageUrl3) {
                    banner3.style.backgroundImage = `url(${storedImageUrl3})`;
                }

                imageUpload3.addEventListener('change', function () {
                    const file = imageUpload3.files[0];
                    if (file && file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            banner3.style.backgroundImage = `url(${e.target.result})`;

                            // Store the selected image URL for Page 1 in local storage
                            localStorage.setItem('indexBanner3', e.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            </script>

            <!-- site footer -->
            <?php load_common_page_footer() ?>
            <!-- donate form modal -->
            <?php donate_dialog() ?>
            <!-- libraries loader -->
            <?php lib() ?>
            <!-- style switcher start -->
            <?php style_switcher() ?>

</body>

</html>