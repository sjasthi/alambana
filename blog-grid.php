<?php

if (!isset ($_SESSION)) {
    session_start();
}

include 'shared_resources.php';
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
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Blog Grids</title>
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
                        <h1 class="block-title">Blog</h1>
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
            const storedImageUrl = localStorage.getItem('blogGridBanner');
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
                        localStorage.setItem('blogGridBanner', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
        </script>
        <!-- Main Content -->
        <div id="main-container">
            <div class="content">
                <div class="container">
                    <ul class="grid-holder isotope gallery-items" data-sort-id="gallery">
                        <li class="col-md-4 col-sm-6 grid-item blog-grid-item format-standard">
                            <div class="grid-item-inner">
                                <a href="blogs.php" class="media-box">
                                    <img src="images/post1.jpg" alt="">
                                </a>
                                <div class="grid-item-content">
                                    <h3 class="post-title"><a href="blogs.php">A single person can change million
                                            lives</a></h3>
                                    <span class="meta-data"><i class="fa fa-calendar"></i> Posted on 11th Dec,
                                        2015</span>
                                    <p>A blog post sample excerpt text which can be edited by editing the blog post
                                        page...</p>
                                    <div class="tag-cloud">
                                        <i class="fa fa-tags"></i>
                                        <a href="#">Water</a>
                                        <a href="#">Students</a>
                                        <a href="#">NYC</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="col-md-4 col-sm-6 grid-item blog-grid-item format-standard">
                            <div class="grid-item-inner">
                                <a href="blogs.php" class="media-box">
                                    <img src="images/post2.jpg" alt="">
                                </a>
                                <div class="grid-item-content">
                                    <h3 class="post-title"><a href="blogs.php">Donate your woolens this winter</a></h3>
                                    <span class="meta-data"><i class="fa fa-calendar"></i> Posted on 11th Dec,
                                        2015</span>
                                    <p>A blog post sample excerpt text which can be edited by editing the blog post
                                        page...</p>
                                    <div class="tag-cloud">
                                        <i class="fa fa-tags"></i>
                                        <a href="#">Water</a>
                                        <a href="#">Students</a>
                                        <a href="#">NYC</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="col-md-4 col-sm-6 grid-item blog-grid-item format-standard">
                            <div class="grid-item-inner">
                                <a href="blogs.php" class="media-box">
                                    <img src="images/post3.jpg" alt="">
                                </a>
                                <div class="grid-item-content">
                                    <h3 class="post-title"><a href="blogs.php">How to survive the tough path of life</a>
                                    </h3>
                                    <span class="meta-data"><i class="fa fa-calendar"></i> Posted on 11th Dec,
                                        2015</span>
                                    <p>A blog post sample excerpt text which can be edited by editing the blog post
                                        page...</p>
                                    <div class="tag-cloud">
                                        <i class="fa fa-tags"></i>
                                        <a href="#">Water</a>
                                        <a href="#">Students</a>
                                        <a href="#">NYC</a>
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