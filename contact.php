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
    <title>Contact Us</title>
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
        .body-container {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
    }
    h1 {
        color: #333;
        text-align: center;
    }
    p {
        color: gray;
        text-align: left;
    }
    .contact-info {
        margin-bottom: 20px;
        text-align: center;
    }
    .contact-info p {
        margin: 10px 0;
    }
    .contact-form {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
        color: #333;
    }
    .form-group input[type="text"],
    .form-group input[type="email"],
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .form-group textarea {
        resize: vertical;
        height: 150px;
    }
    .form-group button {
        padding: 10px 20px;
        background-color: blue;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .form-group button:hover {
        background-color: #555;
    }
    .email-icon {
    height: 18px;
}
.form-group label::after {
    content: '*';
    color: red;
    margin-left: 4px;
}
a {
    text-decoration: none;
    color: white;
}
    </style>
</head>

<body class="contact">
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
                        <h1 class="block-title">Contact us</h1>
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
            const storedImageUrl = localStorage.getItem('contactBanner');
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
                        localStorage.setItem(contactBanner);
                    };
                    reader.readAsDataURL(file);
                }
            });
        </script>
        <!-- Main Content -->
        <div id="main-container">
            <div class="content">
                <div class="container">
                <div id="contact" class="body-container">
        <h1>We've been waiting for you</h1>
        <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspWe want to hear from you. Let us know how we can help.</p>
        
        <div class="contact-info">
            <p><img src="images/call.png">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspPhone: <a href="tel:+1 (951) 821-6051">+1 (951) 821-6051</a></p>
            <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img class="email-icon" src="images/email.png">&nbsp Email: <a href="mailto:aalambanafoundation@gmail.com">aalambanafoundation@gmail.com</a></p>
        </div>
        
        <div class="contact-form">
            <form action="#" method="post">
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" id="firstName" name="firstName" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" id="lastName" name="lastName" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" pattern="[A-Za-z0-9._+\-']+@[A-Za-z0-9.\-]+\.[A-Za-z]{2,}" placeholder="a@a.uk" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" autocomplete="off" required></textarea>
                </div>
                <div class="form-group">
                    <center>&nbsp&nbsp&nbsp<button type="submit">Submit</button>&nbsp&nbsp&nbsp<button type="reset">Reset</button></center>
                    
                </div>
            </form>
        </div>
    </div>
                    
                    
                    </div>
                </div>
            </div>

            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-SpgMgJfnYGQYrkDIYKMuw0keyeNtqL0"></script>
            <!-- Google maps api -->
            <script type="text/javascript">
                var geocoder = new google.maps.Geocoder();
                var address = "2500 CityWest Blvd. - Suite 300 Houston, Texas - 77042 USA"; //Add your address here, all on one line.
                var latitude;
                var longitude;
                var color = "#42b8d4"; //Set your tint color. Needs to be a hex value.

                function getGeocode() {
                    geocoder.geocode({ 'address': address }, function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            latitude = results[0].geometry.location.lat();
                            longitude = results[0].geometry.location.lng();
                            initGoogleMap();
                        }
                    });
                }

                function initGoogleMap() {
                    var styles = [
                        {
                            stylers: [
                                { saturation: -100 }
                            ]
                        }
                    ];

                    var options = {
                        mapTypeControlOptions: {
                            mapTypeIds: ['Styled']
                        },
                        center: new google.maps.LatLng(latitude, longitude),
                        zoom: 13,
                        scrollwheel: false,
                        navigationControl: false,
                        mapTypeControl: false,
                        zoomControl: true,
                        disableDefaultUI: true,
                        mapTypeId: 'Styled'
                    };
                    var div = document.getElementById('contact-map');
                    var map = new google.maps.Map(div, options);
                    marker = new google.maps.Marker({
                        map: map,
                        draggable: false,
                        animation: google.maps.Animation.DROP,
                        position: new google.maps.LatLng(latitude, longitude)
                    });
                    var styledMapType = new google.maps.StyledMapType(styles, { name: 'Styled' });
                    map.mapTypes.set('Styled', styledMapType);

                    var infowindow = new google.maps.InfoWindow({
                        content: "<div class='iwContent'>" + address + "</div>"
                    });
                    google.maps.event.addListener(marker, 'click', function () {
                        infowindow.open(map, marker);
                    });


                    bounds = new google.maps.LatLngBounds(
                        new google.maps.LatLng(-84.999999, -179.999999),
                        new google.maps.LatLng(84.999999, 179.999999));

                    rect = new google.maps.Rectangle({
                        bounds: bounds,
                        fillColor: color,
                        fillOpacity: 0.2,
                        strokeWeight: 0,
                        map: map
                    });
                }
                google.maps.event.addDomListener(window, 'load', getGeocode);
            </script>

        <div class = "f">
            <!-- Site Footer -->
            <?php load_common_page_footer() ?>
            <!-- Libraries Loader -->
            <?php lib() ?>
            <!-- Style Switcher Start -->
            <?php style_switcher() ?>
        </div>
    </body>


</html>