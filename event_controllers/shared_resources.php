<?php

use PhpOffice\PhpPresentation\Shape\Chart\Title;

require '../db_configuration.php';

$status = session_status();
if ($status == PHP_SESSION_NONE) {
    session_start();
}




//*************************************/
// Create Common Library Loader(s)

# CSS References
function css($pageClass = 0) { 
	?>
        <link href="http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
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
	<?php
	
	// Login CSS
    if ($pageClass == 1) {
        echo '<link href="../css/loginForm.css" rel="stylesheet">';
    }
    // Admin CSS
    if ($pageClass == 2) {
        echo '<link href="../css/admin_panel.css" rel="stylesheet" type="text/css">
            <link href="../css/" rel="stylesheet" type="text/css"><!-- CUSTOM STYLESHEET FOR STYLING -->';
    }
}

# Libraries (JavaScript)
function lib() { 
	?>
        <!-- Shared Site Libraries -->
        <script src="../js/jquery-2.1.3.min.js"></script> <!-- Jquery Library Call -->
        <script src="../js/bootstrap.js"></script> <!-- UI -->
        <script src="../js/ui-plugins.js"></script> <!-- UI Plugins -->
        <script src="../js/helper-plugins.js"></script> <!-- Helper Plugins -->
        <script src="../js/init.js"></script> <!-- All Scripts -->
        <script src="../js/circle-progress.js"></script> <!-- Circle Progress Bars -->
        <script src="../vendor/magnific/jquery.magnific-popup.min.js"></script> <!-- Maginific Popup Plugin -->
        <script src="../vendor/countdown/js/jquery.countdown.min.js"></script> <!-- Jquery Timer -->
        <script src="../vendor/owl-carousel/js/owl.carousel.min.js"></script> <!-- Owl Carousel -->
        <script src="../vendor/flexslider/js/jquery.flexslider.js"></script> <!-- FlexSlider -->

        <!-- Switcher Libraries -->
        <script src="../style-switcher/js/jquery_cookie.js"></script>
        <script src="../style-switcher/js/script.js"></script>

        <!-- Calendar Moment Function -->
        <script src="../vendor/fullcalendar/fullcalendar.min.js"></script>
        <script src="../vendor/fullcalendar/lib/moment.min.js"></script><!-- Calendar Moment Function -->
        <script src="../vendor/magnific/jquery.magnific-popup.min.js"></script> <!-- PrettyPhoto Plugin -->
	<?php 
}

//*************************************/
// Common Page Scripts
# Site Scripts
function load_common_page_scripts() { 
	?>
     <script src="../js/modernizr.js"></script><!-- Modernizr -->
        <script>
            // New Blog Form Script
            function show_new_post_form() {
                var targetPage = "../new_blog_entry.php";
    
                if (!isOnCurrentPage(targetPage)) {
                    redirectToPage(targetPage);
                } else {
                    // show_form() logic 
                    let form = document.getElementById("blog_creation_form");
                    let show_button = document.getElementById("form_show_button");
                    form.removeAttribute("hidden");
                    show_button.setAttribute("hidden", "hidden");
                }
            }
    
            function isOnCurrentPage(page) {
                // Check if the current URL contains the specified page
                return window.location.href.includes(page);
            }
    
            function redirectToPage(page) {
                window.location.href = page; // Redirect to the specified page
            }
    </script>
	<?php 
}

//*************************************/
// Common Page Elements
# Header Page Menu Element
function load_common_page_header($headType = 1) {
    # Site Header Wrapper / Menu Catagories
    ?>
    <style>
        .header-container {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .site-header-bar {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
            /* Adjust padding as needed */
        }

        .site-logo {
            /* Your site logo styles here */
            display: flex;
            align-items: center;
            margin-right: 20px;
            /* Adjust margin-right for spacing between logo and other elements */
        }

        .header-info-col {
            /* Adjust styles for the phone number */
            padding: 5px 100px;
            /* Adjust padding as needed */
            font-size: 14px;
            /* Adjust font size as needed */
            margin-left: 20px;
            /* Add margin for spacing between sign-in button and other elements */
            margin-top: 5px;
            Adjust margin-top to move the button down */ background-color: transparent;
            /* Set background color to transparent */
            border: none;
            /* Remove border */
            text-decoration: none;
            /* Remove underline style for links */
            cursor: pointer;
            /* Set cursor to pointer for better user experience */
        }

        .fa-signin {
            /* Adjust styles for the sign-in button container */
            margin-right: 20px;
            /* Add margin for spacing between sign-in button and other elements */
            background-color: transparent;
            /* Set background color to transparent */
            border: none;
            /* Remove border */
            color: #333;
            /* Set text color */
            text-decoration: none;
            /* Remove underline style for links */
            cursor: pointer;
            /* Set cursor to pointer for better user experience */
        }

        .small-button {
            padding: 1px 40px;
            /* Adjust padding as needed */
            font-size: 14px;
            /* Adjust font size as needed */
            margin-left: 20px;
            /* Add margin for spacing between sign-in button and other elements */
            margin-top: 5px;
            /* Adjust margin-top to move the button down */
            background-color: transparent;
            /* Set background color to transparent */
            border: none;
            /* Remove border */
            color: #333;
            /* Set text color */
            text-decoration: none;
            /* Remove underline style for links */
            cursor: pointer;
            /* Set cursor to pointer for better user experience */
        }
    </style>
    <!-- Site Header Wrapper -->
    <?php
    if ($headType == 1) {
        echo '<div class="site-header-wrapper">';
    } # Default Menu Bar (Transparent)
    if ($headType == 2) {
        echo '<div class="site-header-bar accent-bg padding-tb20 cta-fw">';
    } # Solid Menu Bar
    ?>
    <header class="site-header">
        <div class="header-container">
            <!-- Site Logo Image -->
            <div class="site-logo">

                <a href="../index.php" class="default-logo"><img src="../images/logo.png" alt="Logo"></a>
                <a href="../index.php" class="default-retina-logo"><img src="../images/logo@2x.png" alt="Logo" width="199"
                        height="30"></a>
                <a href="../index.php" class="sticky-logo"><img src="../images/sticky-logo.png" alt="Logo"></a>
                <a href="../index.php" class="sticky-retina-logo"><img src="../images/sticky-logo@2x.png" alt="Logo" width="199"
                        height="30"></a>
            </div>

            <!-- Site Main Menu -->
            <ul class="sf-menu dd-menu pull-left" role="menu">

                <li><a href="../index.php">Home</a></li>
                <li><a href="../about.php">About</a>
                    <ul>
                        <li><a href="../team.php">Team</a></li>
                        <li><a href="../our-impact.php">Our Impact</a></li>
                        <li><a href="../contact.php">Contact</a></li>
                    </ul>
                </li>
                <li><a href="../community-support.php">Community</a>
                    <ul>
                        <li><a href="../causes-education.php">Education</a></li>
                        <li><a href="../causes-hunger.php">Hunger Relief</a></li>
                        <li><a href="../causes-women.php">Women Empowerment</a></li>
                    </ul>
                </li>
                <li><a href="../events.php">Events</a>
                    <ul>
                        <li><a href="upcoming_events.php">Upcoming Events</a></li>
                        <li><a href="past_events.php">Past Events</a></li>
                    </ul>
                </li>
                <li><a href="../gallery-caption-2cols.php">Gallery</a>
                    <!-- HIDDEN GALLERY MENUS ---  <ul>
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
                        </ul>-->
                </li>
                <li><a href="../blogs.php">Blogs</a>
                    <ul>
                        <li><a href="../blogs.php">View Blogs</a></li>
                        <li><a href="../new_blog_entry.php">Post Blog</a></li>
                    </ul>
                </li>
                <li class="megamenu"><a href="javascrip:void(0)">Features</a>
                    <ul class="dropdown">
                        <li>
                            <div class="megamenu-container container">
                                <div class="row">
                                    <div class="col-md-3 megamenu-col">
                                        <span class="megamenu-sub-title"><i class="fa fa-bookmark"></i> Features</span>
                                        <ul class="sub-menu">
                                            <li><a href="../shortcodes.php">Donate Here</a></li>
                                            <li><a href="../typography.php">Typography</a></li>
                                            <li><a href="../privacy-policy.php">Privacy policy</a></li>
                                            <li><a href="../payment-terms.php">Payment terms</a></li>
                                            <li><a href="../refund-policy.php">Refund policy</a></li>
                                        </ul>
                                        <br><br>
                                        <ul class="sub-menu-feed">
                                            <li>
                                                <a href="../feedback-post.php" class="megamenu-sub-title">
                                                    <img src="../images/feedback.png" alt=""
                                                        style="width: 48px; height: 48px;">
                                            </li>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- Site Phone Number -->
            <a href="#" class="visible-sm visible-xs" id="menu-toggle"><i class="fa fa-bars"></i></a>
            <div class="header-info-col"><i class="fa fa-phone"></i> (951) 821-6051</div>

            <!-- Site Sign On Button -->
            <div class="fa-signin accent-bg padding-tb8 cta-fw">
                <?php
                if (isset ($_SESSION['role'])) { // Verify SESSION
                    // Only Users Logged In
                    if ($_SESSION['role'] == 'user') {
                        echo '<a href="../logout.php" class="header-info-col btn-default btn-ghost btn-light btn-rounded small-button">Logout (' . $_SESSION['first_name'] . ')</a>';
                        echo '<a href="../profilesettings.php" class="header-info-col btn-default btn-ghost btn-light btn-rounded small-button">Profilo</a>';
                    }
                    // Admin Logged In
                    elseif ($_SESSION['role'] == 'admin') {
                        echo '<a href="../logout.php" class="header-info-col btn-default btn-ghost btn-light btn-rounded small-button">Logout (' . $_SESSION['role'] . ')</a>';
                        echo '<a href="../admin_panel.php" class="header-info-col btn-default btn-ghost btn-light btn-rounded small-button">Admin</a>';
                    }
                } else {// None.
                    echo '<a href="../loginForm.php" class="header-info-col btn-default btn-ghost btn-light btn-rounded small-button">Sign in</a>';
                }
                ?>
            </div>
        </div>
    </header>
    </div>
    <?php
}
# Footer Page Element
function load_common_page_footer($footType = 1) {
    ?>
    <!-- Site Footer -->';
    <?php
    if ($footType == 1) {
        echo '<div class="site-footer parallax parallax3" style="background-image:url(../images/parallax3.jpg)">';
    } # Dynamic Footer Placement [Default]
    if ($footType == 2) {
        echo '<div class="site-footer-bottom" style="background-image:url(../images/parallax3.jpg)">';
    } # Static Footer 
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="widget footer_widget">
                    <h4 class="widgettitle">About Aalambana Foundation</h4>
                    <p><img src="../images/logo.png" alt=""></p>
                    <p>Our mission is to provide access to education to financially disadvantaged students in order to
                        transform their lives. By empowering disadvantaged individuals,
                        we hope to help close the socio-economic gap in India, creating a more just and united society.</p>

                    <ul class="social-icons-rounded social-icons-colored">
                        <li class="facebook"><a href="https://www.facebook.com/aalambanafb"><i
                                    class="fa fa-facebook-f"></i></a></li>
                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li class="youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                        <li class="vimeo"><a href="#"><i class="fa fa-vimeo"></i></a></li>
                        <li class="instagram"><a
                                href="https://www.instagram.com/aalambana.foundation/?igshid=klesjehfy70r"><i
                                    class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="widget footer_widget widget_links">
                    <h4 class="widgettitle">Blogroll</h4>
                    <ul>
                        <li><a href="../our-impact.php">Become a volunteer</a></li>
                        <li><a href="../about.php">Our mission</a></li>
                        <li><a href="../community-event.php">Success stories</a></li>
                        <li><a href="../team.php">Meet our team</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="widget footer_widget">
                    <h4 class="widgettitle">Contact Us</h4>
                    <p style="color: white;">
                        Aalambana Foundation - CA Office<br>
                        561 Orion Rd.<br>
                        Tustin CA 92782<br>
                        Californa, United States<br>
                        (951) 821-6051
                    </p>

                    <p>Email: <a href="mailto:aalambanafoundation@gmail.com"
                            style="color: white;">aalambanafoundation@gmail.com</a></p>

                    <!-- <div class="twitter-widget" data-tweets-count="2"></div>-->
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Site Footer Layer -->
    <div class="site-footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="copyrights-col-left">
                        <p>&copy; <span id="current-year"></span> Aalambana Foundation. All Rights Reserved</p>
                    </div>
                    <script>
                        // Get the current year
                        var currentYear = new Date().getFullYear();

                        // Set the current year in the HTML content
                        document.getElementById("current-year").textContent = currentYear;
                    </script>
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
    <?php

}
# Donation Dialog
function donate_dialog() {
	?>
    <!-- Donate Form Modal -->
    <div class="modal fade" id="DonateModal" tabindex="-1" role="dialog" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="row">
                        <div class="col-md-6 col-sm-6 donate-amount-option">
                            <h4>Choose an amount</h4>
                            <ul class="predefined-amount">
                                <li><label><input type="radio" name="donation-amount">$10</label></li>
                                <li><label><input type="radio" name="donation-amount">$20</label></li>
                                <li><label><input type="radio" name="donation-amount">$30</label></li>
                                <li><label><input type="radio" name="donation-amount">$50</label></li>
                                <li><label><input type="radio" name="donation-amount">$100</label></li>
                            </ul>
                        </div>
                        <span class="donation-choice-breaker">Or</span>
                        <div class="col-md-6 col-sm-6 donate-amount-option">
                            <h4>Enter your own</h4>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">$</span>
                                <input type="number" class="form-control">
                            </div>
                        </div>
                    </div>
              </div>
              <div class="modal-body">
                <div class="row">
                      <div class="col-md-6 col-sm-6 donation-form-infocol">
                          <h4>Address</h4>
                            <input type="text" class="form-control" placeholder="Address line 1">
                            <input type="text" class="form-control" placeholder="Address line 2">
                    <div class="row">
                          <div class="col-md-8 col-sm-8 col-xs-8">
                                <input type="text" class="form-control" placeholder="State/City">
                                </div>
                          <div class="col-md-4 col-sm-4 col-xs-4">
                                <input type="text" class="form-control" placeholder="Zipcode">
                                </div>
                          </div>
                    <div class="row">
                          <div class="col-md-3 col-sm-3 col-xs-3">
                                <label>Country</label>
                                </div>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                                    <select class="selectpicker">
                                        <option>United States</option>
                                        <option>Australia</option>
                                        <option>Netherlands</option>
                                    </select>
                                </div>
                          </div>
                        </div>
                      <div class="col-md-6 col-sm-6 donation-form-infocol">
                          <h4>Personal info</h4>
                    <div class="row">
                          <div class="col-md-6 col-sm-6 col-xs-6">
                                <input type="text" class="form-control" placeholder="First name">
                                </div>
                          <div class="col-md-6 col-sm-6 col-xs-6">
                                <input type="text" class="form-control" placeholder="Last name">
                                </div>
                          </div>
                            <input type="text" class="form-control" placeholder="Email address">
                            <input type="text" class="form-control" placeholder="Phone no.">
                            <label class="checkbox"><input type="checkbox"> Register me on this website</label>
                        </div>
                    </div>
              </div>
              <div class="modal-footer text-align-center">
                <button type="button" class="btn btn-primary">Make your donation now</button>
                    <div class="spacer-20"></div>
                    <p class="small">Vestibulum quam nisi, pretium a nibh sit amet, consectetur hendrerit mi. Aenean imperdiet lacus sit amet elit porta, et malesuada erat bibendum. Cras sed nunc massa. Quisque tempor dolor sit amet tellus malesuada, malesuada iaculis eros dignissim. Aenean vitae diam id lacus fringilla maximus. Mauris auctor efficitur nisl, non blandit urna fermentum nec. Vestibulum quam nisi, pretium a nibh sit amet, consectetur hendrerit mi.</p>
              </div>
          </div>
        </div>
    </div>
	<?php
}

//*************************************/
// Admin Controls
# Side Menu
function admin_side_menu() {
	?>
    <div class="a-side-menu">
        <div class="a-brand-name">
            <h1>Admin Panel</h1>
        </div>
        <ul>
            <li><a href="../admin_panel.php" img src="" alt="">Dashboard</a></li>
            <li><a href="../admin_events.php" img src="" alt="">Events</a></li>
            <li><a href="../admin_blogs.php" img src="" alt="">Blogs</a></li>
            <li><a href="../admin_users.php" img src="" alt="">Users</a></li>
            <li><a href="../community-support.php" img src="" alt="">Causes</a></li>
            <li><a href="../admin_help.php" img src="" alt="">Help</a></li>
            <li><a href="../admin_panel.php" img src="" alt="">Settings</a></li>
        </ul>
    </div>
	<?php
}


# Fav Icon
function generateFaviconLink() {
	?>
    <!-- Include the favicon.ico file -->
    <link rel="icon" href="../favicon.ico" type="image/x-icon">
	<?php
}


//*************************************/
// Extended Functions
# Style Switcher Start
function style_switcher() {
    if (isset ($_SESSION['role'])) { // Verify SESSION
        // Admin Logged In
        if ($_SESSION['role'] == 'admin') {
			?>
            <!-- Style Switcher Start -->
            <div class="styleswitcher visible-lg visible-md">
                <div class="arrow-box"><a class="switch-button"><span class="fa fa-cogs fa-lg"></span></a> </div>
                <h4>Color Skins</h4>
                <ul class="color-scheme">
                <li><a href="#" data-rel="../colors/color1.css" class="color1" title="color1"></a></li>
                <li><a href="#" data-rel="../colors/color2.css" class="color2" title="color2"></a></li>
                <li><a href="#" data-rel="../colors/color3.css" class="color3" title="color3"></a></li>
                <li><a href="#" data-rel="../colors/color4.css" class="color4" title="color4"></a></li>
                <li><a href="#" data-rel="../colors/color5.css" class="color5" title="color5"></a></li>
                <li><a href="#" data-rel="../colors/color6.css" class="color6" title="color6"></a></li>
                <li><a href="#" data-rel="../colors/color7.css" class="color7" title="color7"></a></li>
                <li><a href="#" data-rel="../colors/color8.css" class="color8" title="color8"></a></li>
                <li class="nomargin"><a href="#" data-rel="../colors/color9.css" class="color9" title="color9"></a></li>
                <li class="nomargin"><a href="#" data-rel="../colors/color10.css" class="color10" title="color10"></a></li>
                <li class="nomargin"><a href="#" data-rel="../colors/color11.css" class="color11" title="color11"></a></li>
                <li class="nomargin"><a href="#" data-rel="../colors/color12.css" class="color12" title="color12"></a></li>
                </ul>
                <h4>Layout</h4>
                <ul class="layouts">
                <li class="wide-layout"><a href="#" title="Wide">Wide</a></li>
                <li class="boxed-layout"><a href="#" title="Boxed">Boxed</a></li>
                </ul>
                <h4>Background Pattern</h4>
                <ul class="background-selector">
                <li><img alt="" src="../style-switcher/backgrounds/patternst/ptt1.png" data-nr="0" width="20" height="20"></li>
                <li><img alt="" src="../style-switcher/backgrounds/patternst/ptt2.png" data-nr="1" width="20" height="20"></li>
                <li><img alt="" src="../style-switcher/backgrounds/patternst/ptt3.png" data-nr="2" width="20" height="20"></li>
                <li><img alt="" src="../style-switcher/backgrounds/patternst/ptt4.png" data-nr="3" width="20" height="20"></li>
                <li><img alt="" src="../style-switcher/backgrounds/patternst/ptt5.png" data-nr="4" width="20" height="20"></li>
                <li><img alt="" src="../style-switcher/backgrounds/patternst/ptt6.png" data-nr="5" width="20" height="20"></li>
                <li><img alt="" src="../style-switcher/backgrounds/patternst/ptt7.png" data-nr="6" width="20" height="20"></li>
                <li><img alt="" src="../style-switcher/backgrounds/patternst/ptt8.png" data-nr="7" width="20" height="20"></li>
                <li><img alt="" src="../style-switcher/backgrounds/patternst/ptt9.png" data-nr="8" width="20" height="20"></li>
                <li><img alt="" src="../style-switcher/backgrounds/patternst/ptt10.png" data-nr="9" width="20" height="20"></li>
                <li><img alt="" src="../style-switcher/backgrounds/patternst/ptt11.png" data-nr="10" width="20" height="20"></li>
                <li><img alt="" src="../style-switcher/backgrounds/patternst/ptt12.png" data-nr="11" width="20" height="20"></li>
                <li><img alt="" src="../style-switcher/backgrounds/patternst/ptt13.png" data-nr="12" width="20" height="20"></li>
                <li><img alt="" src="../style-switcher/backgrounds/patternst/ptt14.png" data-nr="13" width="20" height="20"></li>
                <li><img alt="" src="../style-switcher/backgrounds/patternst/ptt15.png" data-nr="14" width="20" height="20"></li>
                <li><img alt="" src="../style-switcher/backgrounds/patternst/ptt16.png" data-nr="15" width="20" height="20"></li>
                <li><img alt="" src="../style-switcher/backgrounds/patternst/ptt17.png" data-nr="16" width="20" height="20"></li>
                <li><img alt="" src="../style-switcher/backgrounds/patternst/ptt18.png" data-nr="17" width="20" height="20"></li>
                <li><img alt="" src="../style-switcher/backgrounds/patternst/ptt19.png" data-nr="18" width="20" height="20"></li>
                <li><img alt="" src="../style-switcher/backgrounds/patternst/ptt20.png" data-nr="19" width="20" height="20"></li>
                <li><img alt="" src="../style-switcher/backgrounds/patternst/ptt21.png" data-nr="20" width="20" height="20"></li>
                <li><img alt="" src="../style-switcher/backgrounds/patternst/ptt22.png" data-nr="21" width="20" height="20"></li>
                <li><img alt="" src="../style-switcher/backgrounds/patternst/ptt23.png" data-nr="22" width="20" height="20"></li>
                <li><img alt="" src="../style-switcher/backgrounds/patternst/ptt24.png" data-nr="23" width="20" height="20"></li>
                <li><img alt="" src="../style-switcher/backgrounds/patternst/ptt25.png" data-nr="24" width="20" height="20"></li>
                <li class="nomargin"><img alt="" src="../style-switcher/backgrounds/patternst/ptt26.png" data-nr="25" width="20" height="20"></li>
                <li class="nomargin"><img alt="" src="../style-switcher/backgrounds/patternst/ptt27.png" data-nr="26" width="20" height="20"></li>
                <li class="nomargin"><img alt="" src="../style-switcher/backgrounds/patternst/ptt28.png" data-nr="27" width="20" height="20"></li>
                <li class="nomargin"><img alt="" src="../style-switcher/backgrounds/patternst/ptt29.png" data-nr="28" width="20" height="20"></li>
                <li class="nomargin"><img alt="" src="../style-switcher/backgrounds/patternst/ptt30.png" data-nr="29" width="20" height="20"></li>
                </ul>
                <small>*only for boxed layout</small>
                <h4>Background Image</h4>
                <ul class="background-selector1">
                <li><img alt="" src="../style-switcher/backgrounds/images/img1-thumb.png" data-nr="0" width="20" height="20"></li>
                <li><img alt="" src="../style-switcher/backgrounds/images/img2-thumb.png" data-nr="1" width="20" height="20"></li>
                <li><img alt="" src="../style-switcher/backgrounds/images/img3-thumb.png" data-nr="2" width="20" height="20"></li>
                <li><img alt="" src="../style-switcher/backgrounds/images/img4-thumb.png" data-nr="3" width="20" height="20"></li>
                <li><img alt="" src="../style-switcher/backgrounds/images/img5-thumb.png" data-nr="4" width="20" height="20"></li>
                </ul>
                <small>*only for boxed layout</small>
            </div>
			<?php
        }
    }
}
?>
