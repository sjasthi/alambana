<?php
// adding new event  
if (isset($_POST["Event_Date"])) {
    require 'db_configuration.php'; // Include your database configuration file
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $Title = $_POST['Title'];
    $Description = $_POST['Description'];
    $Video_Link = $_POST['Video_Link'];
    $Event_Date = $_POST['Event_Date'];
    $Created_Time = date('Y-m-d H:i:s');
    $Modified_Time = $Created_Time;

    // SQL query to insert data into the events table
    $sql = "INSERT INTO events (Title, Description, Video_Link, Event_Date, Created_Time, Modified_Time)
        VALUES ('$Title', '$Description', '$Video_Link', '$Event_Date', '$Created_Time', '$Modified_Time')";

    mysqli_query($connection, $sql);

    // Get the ID of the last inserted record
    $Event_ID = mysqli_insert_id($connection);

    if (!is_dir('images/event_pictures')) {
        mkdir('images/event_pictures', 0777);
    }

    // Handle event picture uploads 
    $fileCount = count($_FILES['Location']['name']);
    if ($fileCount > 0) {
        for ($i = 0; $i < $fileCount; $i++) {
            $fileTmpName = $_FILES['Location']['tmp_name'][$i];
            $fileType = $_FILES['Location']['type'][$i];
            $guid = uniqid();
            $extension = pathinfo($_FILES['Location']['name'][$i], PATHINFO_EXTENSION);
            $FileLocation = $guid . '.' . $extension;
            $destination = 'images/event_pictures/' . $FileLocation;

            // SQL query to insert event picture data into the event_pictures table
            $sql = "INSERT INTO event_pictures (Event_Id, Location) VALUES ('$Event_ID', '$destination')";
            mysqli_query($connection, $sql);
            move_uploaded_file($fileTmpName, $destination);
        }
    }

    // Close the database connection
    mysqli_close($connection);

    // Redirect to a suitable page after successful insertion
    header("Location: admin_events.php");
}
?>

<!DOCTYPE HTML>
<html class="no-js">

<head>
    <!-- Basic Page Needs
  ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Born to give - Charity/Crowdfunding HTML5 Template</title>
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
    <!--[if lt IE 7]>
    <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
    <div class="body">
        <!-- Site Header Wrapper -->
        <div class="site-header-wrapper">
            <!-- Site Header -->
            <header class="site-header">
                <div class="container">
                    <div class="site-logo">
                        <a href="index.php" class="default-logo"><img src="images/logo.png" alt="Logo"></a>
                        <a href="index.php" class="default-retina-logo"><img src="images/logo@2x.png" alt="Logo"
                                width="199" height="30"></a>
                        <a href="index.php" class="sticky-logo"><img src="images/sticky-logo.png" alt="Logo"></a>
                        <a href="index.php" class="sticky-retina-logo"><img src="images/sticky-logo@2x.png" alt="Logo"
                                width="199" height="30"></a>
                    </div>
                    <a href="#" class="visible-sm visible-xs" id="menu-toggle"><i class="fa fa-bars"></i></a>
                    <div class="header-info-col"><i class="fa fa-phone"></i> +91 (81-ALAMBANA)</div>
                    <ul class="sf-menu dd-menu pull-right" role="menu">
                        <li><a href="index.php">Home</a>
                        </li>
                        <li><a href="about.php">About</a>
                            <ul>
                                <li><a href="about.php">Introduction</a></li>
                                <li><a href="team.php">Team</a></li>
                                <li><a href="our-impact.php">Our Impact</a></li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                        </li>
                        <li><a href="community-support.php">Community Support</a>
                            <ul>
                                <li><a href="causes-education.php">Education</a></li>
                                <li><a href="causes-hunger.php">Hunger Relief</a></li>
                                <li><a href="causes-women.php">Women Empowerment</a></li>
                            </ul>
                        </li>
                        <li><a href="events.php">Events</a>
                            <ul>
                                <li><a href="events-grid.php">Events Grid</a></li>
                                <li><a href="events-calendar.php">Events Calendar</a></li>
                                <li><a href="community-event.php">Community Events</a></li>
                            </ul>
                        </li>
                        <li><a href="gallery-caption-2cols.php">Gallery</a>
                            <ul>
                                <li><a href="gallery-caption-2cols.php">Gallery with Caption</a>
                                    <ul>
                                        <li><a href="gallery-caption-2cols.php">2 Columns</a></li>
                                        <li><a href="gallery-caption-3cols.php">3 Columns</a></li>
                                        <li><a href="gallery-caption-4cols.php">4 Columns</a></li>
                                    </ul>
                                </li>
                                <li><a href="gallery-2cols.php">Gallery without Caption</a>
                                    <ul>
                                        <li><a href="gallery-2cols.php">2 Columns</a></li>
                                        <li><a href="gallery-3cols.php">3 Columns</a></li>
                                        <li><a href="gallery-4cols.php">4 Columns</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="megamenu"><a href="javascrip:void(0)">Features</a>
                            <ul class="dropdown">
                                <li>
                                    <div class="megamenu-container container">
                                        <div class="row">
                                            <div class="col-md-3 megamenu-col">
                                                <span class="megamenu-sub-title"><i class="fa fa-bookmark"></i>
                                                    Features</span>
                                                <ul class="sub-menu">
                                                    <li><a href="shortcodes.php">Shortcodes</a></li>
                                                    <li><a href="typography.php">Typography</a></li>
                                                    <li><a href="privacy-policy.php">Privacy policy</a></li>
                                                    <li><a href="payment-terms.php">Payment terms</a></li>
                                                    <li><a href="refund-policy.php">Refund policy</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-3 megamenu-col">
                                                <span class="megamenu-sub-title"><i class="fa fa-newspaper-o"></i>
                                                    Latest news</span>
                                                <div class="widget recent_posts">
                                                    <ul>
                                                        <li>
                                                            <a href="single-post.php" class="media-box">
                                                                <img src="images/post1.jpg" alt="">
                                                            </a>
                                                            <h5><a href="single-post.php">A single person can change
                                                                    million lives</a></h5>
                                                            <span class="meta-data grid-item-meta">Posted on 11th Dec,
                                                                2015</span>
                                                        </li>
                                                        <li>
                                                            <a href="single-post.php" class="media-box">
                                                                <img src="images/post3.jpg" alt="">
                                                            </a>
                                                            <h5><a href="single-post.php">Donate your woolens this
                                                                    winter</a></h5>
                                                            <span class="meta-data grid-item-meta">Posted on 11th Dec,
                                                                2015</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-3 megamenu-col">
                                                <span class="megamenu-sub-title"><i class="fa fa-microphone"></i> Latest
                                                    causes</span>
                                                <ul class="widget_recent_causes">
                                                    <li>
                                                        <a href="#" class="cause-thumb">
                                                            <img src="images/cause1.jpg" alt="" class="img-thumbnail">
                                                            <div class="cProgress" data-complete="88"
                                                                data-color="42b8d4">
                                                                <strong></strong>
                                                            </div>
                                                        </a>
                                                        <h5><a href="single-cause.php">Help small shopkeepers of
                                                                Sunyani</a></h5>
                                                        <span class="meta-data">10 days left to achieve</span>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="cause-thumb">
                                                            <img src="images/cause5.jpg" alt="" class="img-thumbnail">
                                                            <div class="cProgress" data-complete="75"
                                                                data-color="42b8d4">
                                                                <strong></strong>
                                                            </div>
                                                        </a>
                                                        <h5><a href="single-cause.php">Save tigers from poachers</a>
                                                        </h5>
                                                        <span class="meta-data">32 days left to achieve</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-3 megamenu-col">
                                                <span class="megamenu-sub-title"><i class="fa fa-star"></i> Featured
                                                    Video</span>
                                                <div class="fw-video"><iframe
                                                        src="https://player.vimeo.com/video/62947247" width="500"
                                                        height="275"></iframe></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li><a href="blog.php">Blog</a>
                            <ul class="dropdown">
                                <li><a href="blog.php">Blog Classic</a></li>
                                <li><a href="blog-grid.php">Blog Grid</a></li>
                                <li><a href="single-post.php">Single Post</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </header>
        </div>
        <!-- Hero Area -->
        <div class="hero-area">
            <div class="page-banner parallax" style="background-image:url(images/inside9.jpg);">
                <div class="container">
                    <div class="page-banner-text">
                        <h1 class="block-title">Add event</h1>
                    </div>
                </div>
            </div>
        </div>



        <!-- Main Content -->
        <div id="main-container">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <a href="admin_events.php" class="btn btn-primary">Go to Events</a>
                    </div>

                    <div class="row">
                        <br><br>
                        <div class="col-md-6 mx-auto">
                            <h1>Add new Event</h1>
                            <form action="?" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="Title">Event Title</label>
                                    <input type="text" class="form-control" name="Title" id="Title">
                                </div>

                                <div class="form-group">
                                    <label for="Description">Event Description</label>
                                    <input type="text" class="form-control" name="Description" id="Description">
                                </div>

                                <div class="form-group">
                                    <label for="Video_Link">Video Link</label>
                                    <input type="text" class="form-control" name="Video_Link" id="Video_Link">
                                </div>

                                <div class="form-group">
                                    <label for="Event_Date">Event Date</label>
                                    <input type="datetime-local" class="form-control" name="Event_Date" id="Event_Date">
                                </div>


                                <div class="form-group">
                                    <label for="Location">Event Files</label>
                                    <input type="file" class="form-control" name="Location[]" multiple id="Location">
                                </div>



                                <div class="form-group">
                                    <button class="btn btn-primary">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>





        <!-- Site Footer -->
        <div class="site-footer parallax parallax3" style="background-image:url(images/parallax3.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="widget footer_widget">
                            <h4 class="widgettitle">About Born to Give</h4>
                            <p><img src="images/logo.png" alt=""></p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.
                                Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                            <ul class="social-icons-rounded social-icons-colored">
                                <li class="facebook"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                                <li class="vimeo"><a href="#"><i class="fa fa-vimeo"></i></a></li>
                                <li class="instagram"><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="widget footer_widget widget_links">
                            <h4 class="widgettitle">Blogroll</h4>
                            <ul>
                                <li><a href="#">Become a volunteer</a></li>
                                <li><a href="#">Our mission</a></li>
                                <li><a href="#">Success stories</a></li>
                                <li><a href="#">Meet our team</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="widget footer_widget">
                            <h4 class="widgettitle">Contact Us</h4>
                            <p style="color: white;">
                                Alambana Foundation - India Office<br>
                                4-222 Super Bazar Road<br>
                                Proddatur, 516360<br>
                                Andhra Pradesh, India<br>
                                +91 81-25262262
                            </p>

                            <p>Email: <a href="mailto:admin@alambanafoundation.org"
                                    style="color: white;">admin@alambanafoundation.org</a></p>

                            <!-- <div class="twitter-widget" data-tweets-count="2"></div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Site Footer -->
        <div class="site-footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="copyrights-col-left">
                            <p>&copy; 2023 Alambana Foundation. All Rights Reserved</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6"></div>
                    <div class="copyrights-col-right">
                        <ul class="footer-menu">
                            <li><a href="privacy-policy.php">Privacy policy</a></li>
                            <li><a href="payment-terms.php">Payment terms</a></li>
                            <li><a href="refund-policy.php">Refund policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>
    </div>
    <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a></div>
    <script src="js/jquery-2.1.3.min.js"></script> <!-- Jquery Library Call -->
    <script src="vendor/magnific/jquery.magnific-popup.min.js"></script> <!-- PrettyPhoto Plugin -->
    <script src="js/ui-plugins.js"></script> <!-- UI Plugins -->
    <script src="js/helper-plugins.js"></script> <!-- Helper Plugins -->
    <script src="vendor/owl-carousel/js/owl.carousel.min.js"></script> <!-- Owl Carousel -->
    <script src="js/bootstrap.js"></script> <!-- UI -->
    <script src="js/init.js"></script> <!-- All Scripts -->
    <script src="vendor/flexslider/js/jquery.flexslider.js"></script> <!-- FlexSlider -->
    <script src="js/circle-progress.js"></script> <!-- Circle Progress Bars -->
    <script src="style-switcher/js/jquery_cookie.js"></script>
    <script src="style-switcher/js/script.js"></script>
    <!-- Style Switcher Start -->
    <div class="styleswitcher visible-lg visible-md">
        <div class="arrow-box"><a class="switch-button"><span class="fa fa-cogs fa-lg"></span></a> </div>
        <h4>Color Skins</h4>
        <ul class="color-scheme">
            <li><a href="#" data-rel="colors/color1.css" class="color1" title="color1"></a></li>
            <li><a href="#" data-rel="colors/color2.css" class="color2" title="color2"></a></li>
            <li><a href="#" data-rel="colors/color3.css" class="color3" title="color3"></a></li>
            <li><a href="#" data-rel="colors/color4.css" class="color4" title="color4"></a></li>
            <li><a href="#" data-rel="colors/color5.css" class="color5" title="color5"></a></li>
            <li><a href="#" data-rel="colors/color6.css" class="color6" title="color6"></a></li>
            <li><a href="#" data-rel="colors/color7.css" class="color7" title="color7"></a></li>
            <li><a href="#" data-rel="colors/color8.css" class="color8" title="color8"></a></li>
            <li class="nomargin"><a href="#" data-rel="colors/color9.css" class="color9" title="color9"></a></li>
            <li class="nomargin"><a href="#" data-rel="colors/color10.css" class="color10" title="color10"></a></li>
            <li class="nomargin"><a href="#" data-rel="colors/color11.css" class="color11" title="color11"></a></li>
            <li class="nomargin"><a href="#" data-rel="colors/color12.css" class="color12" title="color12"></a></li>
        </ul>
        <h4>Layout</h4>
        <ul class="layouts">
            <li class="wide-layout"><a href="#" title="Wide">Wide</a></li>
            <li class="boxed-layout"><a href="#" title="Boxed">Boxed</a></li>
        </ul>
        <h4>Background Pattern</h4>
        <ul class="background-selector">
            <li><img alt="" src="style-switcher/backgrounds/patternst/ptt1.png" data-nr="0" width="20" height="20"></li>
            <li><img alt="" src="style-switcher/backgrounds/patternst/ptt2.png" data-nr="1" width="20" height="20"></li>
            <li><img alt="" src="style-switcher/backgrounds/patternst/ptt3.png" data-nr="2" width="20" height="20"></li>
            <li><img alt="" src="style-switcher/backgrounds/patternst/ptt4.png" data-nr="3" width="20" height="20"></li>
            <li><img alt="" src="style-switcher/backgrounds/patternst/ptt5.png" data-nr="4" width="20" height="20"></li>
            <li><img alt="" src="style-switcher/backgrounds/patternst/ptt6.png" data-nr="5" width="20" height="20"></li>
            <li><img alt="" src="style-switcher/backgrounds/patternst/ptt7.png" data-nr="6" width="20" height="20"></li>
            <li><img alt="" src="style-switcher/backgrounds/patternst/ptt8.png" data-nr="7" width="20" height="20"></li>
            <li><img alt="" src="style-switcher/backgrounds/patternst/ptt9.png" data-nr="8" width="20" height="20"></li>
            <li><img alt="" src="style-switcher/backgrounds/patternst/ptt10.png" data-nr="9" width="20" height="20">
            </li>
            <li><img alt="" src="style-switcher/backgrounds/patternst/ptt11.png" data-nr="10" width="20" height="20">
            </li>
            <li><img alt="" src="style-switcher/backgrounds/patternst/ptt12.png" data-nr="11" width="20" height="20">
            </li>
            <li><img alt="" src="style-switcher/backgrounds/patternst/ptt13.png" data-nr="12" width="20" height="20">
            </li>
            <li><img alt="" src="style-switcher/backgrounds/patternst/ptt14.png" data-nr="13" width="20" height="20">
            </li>
            <li><img alt="" src="style-switcher/backgrounds/patternst/ptt15.png" data-nr="14" width="20" height="20">
            </li>
            <li><img alt="" src="style-switcher/backgrounds/patternst/ptt16.png" data-nr="15" width="20" height="20">
            </li>
            <li><img alt="" src="style-switcher/backgrounds/patternst/ptt17.png" data-nr="16" width="20" height="20">
            </li>
            <li><img alt="" src="style-switcher/backgrounds/patternst/ptt18.png" data-nr="17" width="20" height="20">
            </li>
            <li><img alt="" src="style-switcher/backgrounds/patternst/ptt19.png" data-nr="18" width="20" height="20">
            </li>
            <li><img alt="" src="style-switcher/backgrounds/patternst/ptt20.png" data-nr="19" width="20" height="20">
            </li>
            <li><img alt="" src="style-switcher/backgrounds/patternst/ptt21.png" data-nr="20" width="20" height="20">
            </li>
            <li><img alt="" src="style-switcher/backgrounds/patternst/ptt22.png" data-nr="21" width="20" height="20">
            </li>
            <li><img alt="" src="style-switcher/backgrounds/patternst/ptt23.png" data-nr="22" width="20" height="20">
            </li>
            <li><img alt="" src="style-switcher/backgrounds/patternst/ptt24.png" data-nr="23" width="20" height="20">
            </li>
            <li><img alt="" src="style-switcher/backgrounds/patternst/ptt25.png" data-nr="24" width="20" height="20">
            </li>
            <li class="nomargin"><img alt="" src="style-switcher/backgrounds/patternst/ptt26.png" data-nr="25"
                    width="20" height="20"></li>
            <li class="nomargin"><img alt="" src="style-switcher/backgrounds/patternst/ptt27.png" data-nr="26"
                    width="20" height="20"></li>
            <li class="nomargin"><img alt="" src="style-switcher/backgrounds/patternst/ptt28.png" data-nr="27"
                    width="20" height="20"></li>
            <li class="nomargin"><img alt="" src="style-switcher/backgrounds/patternst/ptt29.png" data-nr="28"
                    width="20" height="20"></li>
            <li class="nomargin"><img alt="" src="style-switcher/backgrounds/patternst/ptt30.png" data-nr="29"
                    width="20" height="20"></li>
        </ul>
        <small>*only for boxed layout</small>
        <h4>Background Image</h4>
        <ul class="background-selector1">
            <li><img alt="" src="style-switcher/backgrounds/images/img1-thumb.png" data-nr="0" width="20" height="20">
            </li>
            <li><img alt="" src="style-switcher/backgrounds/images/img2-thumb.png" data-nr="1" width="20" height="20">
            </li>
            <li><img alt="" src="style-switcher/backgrounds/images/img3-thumb.png" data-nr="2" width="20" height="20">
            </li>
            <li><img alt="" src="style-switcher/backgrounds/images/img4-thumb.png" data-nr="3" width="20" height="20">
            </li>
            <li><img alt="" src="style-switcher/backgrounds/images/img5-thumb.png" data-nr="4" width="20" height="20">
            </li>
        </ul>
        <small>*only for boxed layout</small>
    </div>


    </script>
</body>

</html>