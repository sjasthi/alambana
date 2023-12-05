<?php

  if(!isset($_SESSION)) { 
      session_start();
  } 

  include 'shared_resources.php';
  include 'feedback_fill.php';
  include 'blog_fill.php';
  include 'create_feedback_comment_post.php';

  //$feedbackId = $_GET['feedback_id']; // Get the feedback_Id from the URL parameter
  // DO NOT ALLOW ACCESS TO HIDDEN feedback PAGES
  //if (getfeedbackVisibilityStateFromDatabase($feedbackId)) header('Location:feedback.php'); 

  // Track page visitors
  //increment_feedback_page_visitor_count($feedbackId);

?>

<!DOCTYPE HTML>
<html class="no-js">
<head>
<!-- Basic Page Needs
  ================================================== -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- Include the favicon.ico file -->
<?php generateFaviconLink() ?>
<title>Feedback</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<!-- Mobile Specific Metas
  ================================================== -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no">
<!-- css
  ================================================== -->
  <?php css() ?>
<!-- SCRIPTS
  ================================================== -->
  <?php load_common_page_scripts() ?>
  <!-- MODIFY POST-->
    <script>
        // Create / Edit feedback form
        let show_edit_form = () => {
            let form = document.getElementById("feedback_modifiy_form");
            let show_button = document.getElementById("form_show_button");
            form.removeAttribute("hidden");
            show_button.setAttribute("hidden", "hidden");
        }
        
        

        // GET SESSION ID OF BUTTON SUBMIT TO feedback feedback
        let save_button_id = (button_id) => {
            let valueToSave = button_id;  // Replace with the value you want to save

            // Using AJAX to send the value to the server
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "save_value_to_session.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    console.log(xhr.responseText);  // Log the response from the server (optional)
                }
            };
            xhr.send("value=" + encodeURIComponent(valueToSave));
        };
        let reply_feedback_feedback = (button_id) => {
            let form = document.getElementById("feedback_reply_form" + button_id);
            let show_button = document.getElementById("form_show_reply_submit_button" + button_id);
            form.removeAttribute("hidden");
            show_button.setAttribute("hidden", "hidden");
            let set_value = button_id;
            save_button_id(button_id);
            get_number_of_elements("post-feedback-parent-block");
        }

    
        // UPDATE SERVER feedback COUNT FOR PARENT (Set New feedback Entry Level)
        document.addEventListener("DOMContentLoaded", function () {
            let className = "post-feedback-parent-block";

            // Count the number of elements with the specified class
            let elementCount = document.getElementsByClassName(className).length;

            // Make an AJAX request to update the server with the count
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "update_server_page_feedback_count.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    //var confirmation = confirm(xhr.responseText);
                    console.log("Server response:", xhr.responseText);
                }
            };

            // Send the count as a parameter
            xhr.send("elementCount=" + elementCount);
        });
    </script>

</head>
<body class="single-feedback-post">

<!--[if lt IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
<div class="body">
	<!-- Site Header Wrapper -->
    <?php load_common_page_header(2) ?>

    <!-- Banner Area -->
    <div class="hero-area">
    	<div class="page-banner parallax" style="background-image:url(images/inside8.jpg);">
        	<div class="container">
            	<div class="page-banner-text">
        			<h1 class="block-title">Welcome to our Customer Feedback Support</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content -->
    <div id="main-container">
    	<div class="content">
            <a href="index.php" class="btn btn-primary" style="margin-left: 100px;">< Go to Home</a>
        	<div class="container">
                <!-- USER PRIVILEGES ROLE (User/Admin from 'users' Table) -->
                
                
            			<section class="post-feedbacks" id="feedbacks">
                             <!-- Get Count of feedback feedbacks for Page -->
                            <?php $feedbacks_counter = get_feedback_page_comment_count(); ?>
              				<h3><i class="fa fa-feedback"></i> feedbacks ( <?php echo $feedbacks_counter ?> )</h3>
              				<ol class="feedbacks">
                                <!-- Fill feedback comments -->
                                <?php fill_feedback_comments() ?>
                				
                            </ol>
                        </section> 
                        <section class="post-feedback-form">
                            <h3><i class="fa fa-share"></i> Post a feedback</h3>
                            <?php 
                                $formAction = create_feedback_post(); // Set the form action for creating new feedback section
                                $submitAction = "create_feedback_post";
                            ?>
                            <form id="feedback_create_feedback_form" action="<?php echo $formAction; ?>" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group">
                                    <?php if (!isset($_SESSION['role'])) { echo '
                                        <div class="col-md-4 col-sm-4">
                                            <input type="text" name="feedback_name" maxlength="128" class="form-control input-lg" placeholder="Your name">
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <input type="email" name="feedback_email" maxlength="128" class="form-control input-lg" placeholder="Your email">
                                        </div>';
                                    } ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                        	<textarea name="feedback_paragraph" cols="50" rows="4" class="form-control input-lg" placeholder="Your feedback"></textarea>
                                    	</div>
                                	</div>
                            	</div>
                            	<div class="row">
                                	<div class="form-group">
                                    	<div class="col-md-12">
                                        	<button type="submit" class="btn btn-primary btn-lg"; name="<?php echo $submitAction; ?>">Submit your feedback</button>
                                    	</div>
                                	</div>
                            	</div>
                        	</form>
                    	</section>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Libraries Loader -->
    <?php lib() ?>
    <!-- Style Switcher Start -->
    <?php style_switcher() ?>
	<body>
    <div id="wrapper" style="min-height: 46vh; position: relative;">
        <!-- Your page content goes here -->
    </div>

    <?php load_common_page_footer() ?>
	</body>

</body>
</html>