<?php

  if(!isset($_SESSION)) { 
      session_start();
  } 

  include 'shared_resources.php';
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
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
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
</head>
<body class="contact">
<!--[if lt IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
<div class="body">
	<!-- Site Header Wrapper -->
    <?php load_common_page_header() ?>
    <!-- Hero Area -->
    <div class="hero-area">
    	<div class="page-banner parallax" style="background-image:url(images/inside7.jpg);">
        	<div class="container">
            	<div class="page-banner-text">
        			<h1 class="block-title">Contact us</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content -->
    <div id="main-container">
    	<div class="content">
        	<div class="container">
            	<div class="row">
                	<div class="col-md-3 col-sm-3 col-xs-6">
                    	<h4 class="block-title">Our Locations</h4>
                        <a href="mailto:help@borntogive.com">help@borntogive.com</a>
                        <a href="http://imithemes.com">http://borntogive.com</a>
                    </div>
                	<div class="col-md-3 col-sm-3 col-xs-6">
                        <address>
                            2500 CityWest Blvd.<br>
                            Suite 300 Houston,<br>
                            Texas - 77042<br>
                            USA
                            <br><br>
                            <strong>TEL:</strong> 1-800-7878-09<br>
                            <strong>FAX:</strong> 1-800-7878-08
                        </address>
                    </div>
                	<div class="col-md-3 col-sm-3 col-xs-6">
                        <address>
                            2500 Opera house.<br>
                            Andheri East,<br>
                            Mumbai - 400120<br>
                            India
                            <br><br>
                            <strong>TEL:</strong> 1-800-7878-09<br>
                            <strong>FAX:</strong> 1-800-7878-08
                        </address>
                    </div>
                	<div class="col-md-3 col-sm-3 col-xs-6">
                        <address>
                            1380 Solvan City<br>
                            Mechnilian,<br>
                            London - 77042<br>
                            UK
                            <br><br>
                            <strong>TEL:</strong> 1-800-7878-09<br>
                            <strong>FAX:</strong> 1-800-7878-08
                        </address>
                    </div>
                </div>
            </div>
            <div class="spacer-75"></div>
           	<div id="contact-map" style="width:100%;height:400px"></div>
            <div class="spacer-75"></div>
        	<div class="container">
            	<div class="row">
                	<div class="col-md-8 content-block">
                    	<form method="post" id="contactform" name="contactform" class="contact-form clearfix" action="mail/contact.php">
                        	<div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input type="text" id="fname" name="First Name"  class="form-control input-lg" placeholder="First name*">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" id="lname" name="Last Name"  class="form-control input-lg" placeholder="Last name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" id="email" name="email"  class="form-control input-lg" placeholder="Email*">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="phone" name="phone" class="form-control input-lg" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <textarea cols="6" rows="8" id="comments" name="comments" class="form-control input-lg" placeholder="Message"></textarea>
                                    </div>
                                    <input id="submit" name="submit" type="submit" class="btn btn-primary btn-lg pull-right" value="Submit now!">
                              	</div>
                           	</div>
                		</form>
                        <div class="clearfix"></div>
                        <div id="message"></div>
                    </div>
                    
                    <!-- Sidebar -->
                    <div class="col-md-4 sidebar-block">
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
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-SpgMgJfnYGQYrkDIYKMuw0keyeNtqL0"></script> <!-- Google maps api -->
    <script type="text/javascript">
    var geocoder = new google.maps.Geocoder();
    var address = "2500 CityWest Blvd. - Suite 300 Houston, Texas - 77042 USA"; //Add your address here, all on one line.
    var latitude;
    var longitude;
    var color = "#42b8d4"; //Set your tint color. Needs to be a hex value.

    function getGeocode() {
        geocoder.geocode( { 'address': address}, function(results, status) {
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
            map:map,
            draggable:false,
            animation: google.maps.Animation.DROP,
            position: new google.maps.LatLng(latitude,longitude)
        });
        var styledMapType = new google.maps.StyledMapType(styles, { name: 'Styled' });
        map.mapTypes.set('Styled', styledMapType);
        
        var infowindow = new google.maps.InfoWindow({
            content: "<div class='iwContent'>"+address+"</div>"
        });
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map,marker);
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
    <!-- Site Footer -->
    <?php load_common_page_footer() ?>
    <!-- Libraries Loader -->
    <?php lib() ?>
    <!-- Style Switcher Start -->
    <?php style_switcher() ?>
</body>
</html>