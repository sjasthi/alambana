
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
<title>Aalambana Help</title>
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
<?php load_common_page_scripts() ?>

    <body>
		<?php load_common_page_header(2) ?>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">


		<h2 id="title">Aalambana Admin Help Center</strong></h2>
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

				body {
					text-align: center; /* Center align the text in the body */
				}

				#title {
					margin-top: 50px; /* Add margin to the top of the title for spacing */
				}

				.btn-container {
					display: flex;
					justify-content: center;
					margin-top: 20px; /* Add margin to the top of the button container for spacing */
				}

				.btn {
					margin: 0 10px; /* Add margin to the buttons for spacing */
				}
			</style>
		</head>
		<!-- admin documentation  -->
		<p>To access admin interface, users have to be logged in as an admin to see the admin button <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center custom-file-upload">Admin</button> at the top of the page in the tool bar.</p>
		<p>You can change page Banner's by clicking on this button <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center custom-file-upload">Change Banner Image</button> on each of the pages. </p>

	
	

		<!-- admin documentation end -->



	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <?php lib() ?>
    <?php style_switcher() ?>
</head>

<body>
    <div id="wrapper" style="min-height: 46vh; position: relative;">
        <!-- Your page content goes here -->
    </div>

    <?php load_common_page_footer() ?>
</body>

</body>

</html>