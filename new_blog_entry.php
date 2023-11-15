<?php

  if(!isset($_SESSION)) { 
      session_start();
  } 

  include 'shared_resources.php';
  include 'blog_fill.php';
  if (isset($_SESSION['role'])) {
    $userRole = $_SESSION['role'];
  }
?>

<!DOCTYPE HTML>
<html class="no-js">
<head>
  <!-- Basic Page Needs
  ================================================== -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <!-- Include the favicon.ico file -->
  <?php generateFaviconLink() ?>
  <title>Aalambana - Blogs Entry</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <!-- Mobile Specific Metas
  ================================================== -->
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <!-- CSS
  ================================================== -->
  <?php css() ?>
  <!-- SCRIPTS
  ================================================== -->
  <?php load_common_page_scripts() ?>
  <script>
    window.onload = function() {
      show_new_post_form(); // Call the function upon page load
    };
</script>

</head>

<body>


  <div class="body">
    <!-- Site Header Wrapper -->
    <div class="site-header-wrapper">
      <!-- Site Header Wrapper -->
      <?php load_common_page_header(2) ?>
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
    </div>


    <!-- Banner Area -->
    <div class="hero-area">
      <div class="page-banner parallax" id="banner"  style="background-image:url(images/inside7.jpg);">
        <div class="container">
          <div class="page-banner-text">
            <h1 class="block-title">Create a new Blog</h1>
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
		const storedImageUrl = localStorage.getItem('newBlogEntryBanner');
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
					localStorage.setItem('newBlogEntryBanner', e.target.result);
				};
				reader.readAsDataURL(file);
			}
		});
	</script>

    <!-- Blog Post Section -->
    <div id="main-container">
      <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-md-8 content-block">
              <!-- USER PRIVILEGES ROLE (User/Admin from 'users' Table) -->
              <!--?php
                        if (isset($_SESSION['role'])) {
                          if ($_SESSION['role'] == 'admin') {
                            echo '<button id="form_show_button" onclick="show_new_post_form();">Create Post</button>';
                          }
                        }
                      ?-->
              <!-- Blog Form (Initially hidden) [Activates on button click] -->
              <form id="blog_creation_form" action="create_post.php" method="POST" enctype="multipart/form-data" hidden="hidden">
                <div id=blog_creation_left>
                  <label>Blog Title</label>
                  <br>
                  <input type="text" name="title" maxlength=100 required>
                  <br>
                  <label for="description">Description</label>
                  <br>
                  <textarea name="description" rows=9 cols=50 required></textarea>
                </div>
                <div id=blog_creation_right>
                  <label for="author">Author</label>
                  <br>
                  <input type="text" name="author" maxlength=50 required>
                  <br>
                  <label>Image(s)</label>`
                  <br>
                  <input type="file" name="file[]" accept="image/*" multiple="multiple">
                  <br>
                  <label>Video Link</label>
                  <br>
                  <input type="text" name="video_link" maxlength=100 placeholder="Optional">
                </div>
                <br>
                <input type="submit" class="btn btn-primary btn-lg" name="create_post" value="Publish">
              </form>
              
              
            
            
            </div>
          </div>
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