<?php

  if(!isset($_SESSION)) { 
      session_start();
  } 

  include 'shared_resources.php';
  
  if (isset($_SESSION['role'])) {
    $userRole = $_SESSION['role'];
  }
?>

<!DOCTYPE HTML>
<html class="no-js">
<head>

<!-- Basic Page Needs
  ================================================== -->
<link rel="icon" href="favicon.ico" type="image/x-icon">
<title>Gallery</title>
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
        }
        .body-container img {
            max-width: 100%;
            height: auto;
        }
        .gallery {
          max-width: 800px;
          margin: 0 auto;
        }
        .gallery-container {
          margin-top: 20px;
        }
        .gallery-container h2 {
          margin-bottom: 15px;
        }
        .photos {
          display: flex;
          flex-wrap: wrap;
        }
        .photos img {
          width: calc(25% - 20px);
          margin: 10px;
          height: 140px;
          border: 2px solid red;
        }

        .about-section {
			padding: 50px 0;
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

        h2, h3 {
            font-weight: bold;
        }

    </style>
</head>
<body>
<!--[if lt IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
<div class="body">
	<!-- Site Header Wrapper -->
    <?php load_common_page_header(2) ?>
    <!-- Hero Area -->
    <div class="hero-area">
    	<div class="page-banner parallax" id="banner"  style="background-image:url(images/parallax6.jpg);">
        	<div class="container">
            	<div class="page-banner-text">
        			<h1 class="block-title">Gallery</h1>
					 <?php
                        if (isset($userRole) && $userRole === "admin") {
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
                    <h2>Photo Gallery</h2>
                    </div>
                </section>

                <div class="gallery">
    

    <div id="photoGallery">
      <div class="gallery-container">
        <h2>&nbsp Annadanam</h2>
        <div class="photos">
          <img src="images/Annadanam.png">
          <img src="images/1Annadanam.png">
          <img src="images/2Annadanam.png">
          <img src="images/3Annadanam.png">
        </div>
      </div>
      <br>
      <div class="gallery-container">
        <h2>&nbsp Netralayam</h2>
        <div class="photos">
          <img src="images/Netralayam.png">
          <img src="images/1Netralayam.png">
          <img src="images/2Netralayam.png">
          <img src="images/3Netralayam.jpg">
          <img src="images/4Netralayam.jpg">
          <img src="images/5Netralayam.jpg">
          <img src="images/6Netralayam.png">
          <img src="images/7Netralayam.jpg">
          <img src="images/8Netralayam.jpg">
          <img src="images/9Netralayam.jpg">
          <img src="images/10Netralayam.jpg">
          <img src="images/11Netralayam.jpg">
        </div>
      </div>
      <br>
      <div class="gallery-container">
        <h2>&nbsp LeapForward</h2>
        <div class="photos">
          <img src="images/2Annadanam.png">
          <img src="images/3Annadanam.png">
        </div>
      </div>
      <br>
      <div class="gallery-container">
        <h2>&nbsp OC Food Bank</h2>
        <div class="photos">
          <img src="images/1Netralayam.png">
          <img src="images/OCFoodBank.jpg">
          <img src="images/1OCFoodBank.jpg">
          <img src="images/2OCFoodBank.png">
          <img src="images/3OCFoodBank.jpg">
          <img src="images/4OCFoodBank.jpg">
          <img src="images/5OCFoodBank.jpg">
          <img src="images/6OCFoodBank.jpg">
          <img src="images/7OCFoodBank.jpg">
          <img src="images/8OCFoodBank.jpg">
          <img src="images/9OCFoodBank.jpg">
          <img src="images/10OCFoodBank.jpg">
          <img src="images/11OCFoodBank.jpg">
        </div>
      </div>
      <br>
      <div class="gallery-container">
        <h2>&nbsp Back to School Drive</h2>
        <div class="photos">
          <img src="images/2Netralayam.png">
          <img src="images/BTSD.png">
          <img src="images/1BTSD.png">
        </div>
      </div>
      <div class="gallery-container">
        <h2>&nbsp Down But Not Out</h2>
        <div class="photos">
          <img src="images/DBNO.jpeg">
          <img src="images/1DBNO.jpg">
          <img src="images/2DBNO.jpg">
          <img src="images/3DBNO.jpeg">
        </div>
      </div>
    </div>
  </div>

                
               

                

            
                
            </div>
        </div>
    </div><div class="spacer-30"></div>
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