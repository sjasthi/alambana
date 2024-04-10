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
    <title>About Us</title>
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

        * {
            box-sizing: border-box;
        }

        .body-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            padding-top: 0;
            text-align: center;
        }

        .body-container img {
            max-width: 100%;
            height: auto;
        }

        .cause {
            display: flex;
            margin-bottom: 50px;
        }

        .cause img {
            width: 200px;
            height: auto;
            margin-right: 20px;
            border: 2px solid red;
        }

        .cause .description {
            flex: 1;
        }

        section {
            max-width: 1200px;
            margin: 0px auto;
            padding: 20px;
            padding-top: 0;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 1px solid black;
        }

        h2 {
            color: black;
        }

        p {
            line-height: 1.6;
            color: black;
        }

        .about-section {
            text-align: center;
            border: none;
            box-shadow: none;
        }

        .about-section h2 {
            margin-bottom: 20px;
        }

        .about-section p {
            font-size: 18px;
        }

        h2,
        h3 {
            font-weight: bold;
        }
        .content {
            padding: 32px 0;
        }
        .story-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 40px auto;
    max-width: 800px;
    margin-left: 250px;
  }
  .image {
    flex: 1;
    margin: 0 40px;
    text-align: center;
  }
  .image img {
    width: 200px; /* Adjust as needed */
    height: 100px;
    display: block;
    margin-bottom: 10px;
    cursor: pointer;
  
  }
  .image p {
    margin: 0;
    font-size: 12px;
  }

  .image a {
    text-decoration: none;
    color: inherit;
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
                        <h1 class="block-title">About us</h1>
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
            const storedImageUrl = localStorage.getItem('aboutBanner');
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
                        localStorage.setItem('aboutBanner', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
        </script>


        <!-- Main Content -->
        <div id="main-container">
            <div class="content">
                <div class="container">
                    <section class="about-section">
                        <div class="body-container">
                            <h2>Our Mission</h2>
                            <p>We will strive to bring together community members to serve the underprivileged better.
                            </p>
                        </div>
                    </section>


                    <section>
                        <h2>Welcome to Aalambana Foundation</h2>
                        <p>Aalambana Foundation is a 501 (c)(3) non-profit organization, founded in April 2020, with a
                            focus on women empowerment, supporting socioeconomically disadvantaged children, and
                            community betterment activities.</p>
                        <p>To date, Aalambana Foundation has made charitable donations that total more than $30,000.
                            Some of the organizations that we support includes OC Food Bank, Wound Walk OC, Grandma’s
                            House of Hope, Orange County Rescue Mission, South County Outreach, Nagai Narayanji Memorial
                            Foundation and many others</p>
                        <p>By funding orphanages, meals, grocercies, enrichment, back to school drives, food drives,
                            enrichment, development activities, medical camps, mentoring and education programs and
                            providing scholarships, Aalambana Foundation is making a positive and lasting impact on
                            communities across many urban and rural areas</p>
                        <p>Aalambana volunteers are fully committed to make a difference through meaningful advocacy,
                            outreach and community service activities.</p>
                        <p>Ultimately, we understand that every dollar that is donated to sponsor our activities
                            represents a donor’s legacy, a dream for lasting change and a chance to bring that dream to
                            life. We remain committed to support people from all walks of life regardless of race,
                            religion, income levels, cultural and political beliefs.</p>
                    </section>

                    <div class="spacer-30"></div>

                    <h2>Our Main Causes</h2>
                    <br />
                    <div class="cause">
                        <img src="images/women_empowerment.jpg">
                        <div class="description">
                            <h3>Women Empowerment</h3>
                            <p>Aalambana Foundation works to empower both women and girls by promoting gender equality,
                                providing them with resources, offer education, including other initiatives to help them
                                to be more independent and successful, and advocating against gender-based violence.</p>
                        </div>
                    </div>
                    <div class="cause">
                        <img src="images/Annadanam.png">
                        <div class="description">
                            <h3>Annadanam</h3>
                            <p>Aalambana Foundation supports orphanages and shelters by funding them monthly through
                                Annadanam, which involves offering food.</p>
                        </div>
                    </div>
                    <div class="cause">
                        <img src="images/Netralayam.png">
                        <div class="description">
                            <h3>Netralayam</h3>
                            <p>Netralayam is an organization dedicated to providing shelter, education, and life skills
                                training to visually impaired girls and women to help them find jobs and also become
                                self-sufficient and independent. Aalambana Foundation sponsors monthly groceries for the
                                residents of Netralayam.</p>
                        </div>
                    </div>
                    <div class="cause">
                        <img src="images/corrective-surgery.png">
                        <div class="description">
                            <h3>Corrective Surgeries</h3>
                            <p>Aalambana Foundation collaborates with the Nagai Narayanji Memorial Foundation (NNMF) to
                                identify, care for, and empower children with disabilities. Free screening camps are
                                conducted regularly to identify children who would benefit from corrective surgery.
                                Aalambana Foundation is committed to sponsoring these surgeries for some of those
                                children.
                        </div>
                    </div>
                    <div class="cause">
                        <img src="images/community_service.jpg">
                        <div class="description">
                            <h3>Community Service Activities</h3>
                            <p>They organize activities for the community to volunteer and participate that will benefit
                                the community, such as food drives, school drives, and more.</p>
                        </div>
                    </div>

                    <div class="spacer-20"></div>

                   

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
                        <div class="spacer-20"></div>
                        <div class="story-container">
                            <div class="image">
                            <a href="https://timesofindia.indiatimes.com/city/nagpur/los-angeles-to-walk-for-tribal-kids-in-maha/articleshow/103298759.cms" target="_blank">
                                                <img src="images/1image.webp">
                                                <p><b>Los Angeles to ‘walk’ for tribal kids in Maha</b></p></a>
                            </div>
                            <div class="image">
                            <a href="https://timesofindia.indiatimes.com/city/nagpur/los-angeles-to-walk-for-tribal-kids-in-maha/articleshow/103298759.cms" target="_blank">
                                                <img src="images/2image.webp">
                                                <p><b>Birthday money saved in US funds ops of Gadchiroli kids</b></p></a>
                            </div>
                            <div class="image">
                            <a href="https://www.nnmfindia.in/Felicitation_Walkathon_organized_Aalambana_Foundation.html" target="_blank">
                                                <img src="images/3img.jpg">
                                                <p><b>Felicitation and Walkathon organized by Aalambana Foundation</b></p></a>
                            </div>
                            </div>
                    </div>
                </div>
                <div class="spacer-30"></div>
            </div>
            </div>
        </div>
        <!-- Site Footer -->
        <?php load_common_page_footer() ?>
        <!-- donate form modal -->
        <?php donate_dialog() ?>
        <!-- Libraries Loader -->
        <?php lib() ?>
        <!-- Style Switcher Start -->
        <?php style_switcher() ?>
</body>

</html>