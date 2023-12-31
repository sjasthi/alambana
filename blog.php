<?php
if (!isset($_SESSION)) { 
    session_start();
} 

include 'shared_resources.php';
include 'blog_fill.php';
include 'feedback_fill.php';
include 'create_comment_post.php';
if (isset($_SESSION['role'])) {
    $userRole = $_SESSION['role'];
  }

// Define the number of blogs per page (default to 3)
$blogsPerPage = isset($_GET['update_server_page_list_number']) ? intval($_GET['update_server_page_list_number']) : 3;

// Get the current page number from the URL parameters, default to 1 if not set
$current_page = isset($_GET['current_page']) ? intval($_GET['current_page']) : 1; // intval ensures the variable is an integer for security


// Check if the current page is blog.php and current_page parameter is not set
if (basename($_SERVER['PHP_SELF']) == 'blog.php' && !isset($_GET['current_page'])) {
    // Redirect to the same page with the current_page parameter
    header('Location: blog.php?current_page#1' );//. $current_page);
    exit(); // Ensure script stops execution after redirection
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
  <title>Aalambana - Blogs</title>
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
  <script> 
  window.onload = function() {
  if (window.location.pathname.includes("blog.php") && !window.location.search.includes("current_page")) {
    // Assuming you have the updated value of current_page in a variable called currentPage
    //window.location.href = "blog.php?current_page=" + 1;
    
  }
}
  </script>
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

  <div class="body">
    
    <!-- Site Header Wrapper -->
    <?php load_common_page_header(2) ?>
    
    <!-- Banner Area -->
    <div class="hero-area">
      <div class="page-banner parallax" id="banner" style="background-image:url(images/inside7.jpg);">
        <div class="container">
          <div class="page-banner-text">
            <h1 class="block-title">Blog</h1>
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
		const storedImageUrl = localStorage.getItem('blog_Banner');
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
					localStorage.setItem('blog_Banner', e.target.result);
				};
				reader.readAsDataURL(file);
			}
		});
	</script>

  

    <!-- Blog Post Section -->
    <style>
    .content {
      display: flex;
      align-items: flex-start; /* Align items at the top */
    }
    #search_bar {
      width: 350px; /* Set a fixed width for the TOC */
      margin-right: 100px; /* Add margin between TOC and main content */
    }
    #blog_TOC {
      width: 250px; /* Set a fixed width for the TOC */
      margin-right: -110px; /* Add margin between TOC and main content */
    }
    #TOC_list {
      width: 250px; /* Set a fixed width for the TOC */
      margin-right: 100px; /* Add margin between TOC and main content */
    }
    #main-container {
      flex: 1; /* Allow the main container to take remaining space */
    }
    </style>
    <div class="content"><!--Extends Search bar / Stories tag at bottem-->
      <div class="row">

        <div class="content">
          <!-- Blog Page TOC -->
          <div id="blog_TOC">
          </div><ul id="TOC_list">
              <?php fill_TOC(); ?>
            </ul>
            
            <!-- Main Content -->
            <div id="main-container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 content-block">
                        <!-- Blog Page List --> <?php fill_blog_page_list(); ?>
                        <!-- Blog Page Fill --> <?php fill_blog(); ?>
                        <!-- Page Pagination --> <?php fill_blog_pagination(); ?>

                        </div>
                        <!-- Page Tabs Menu--> <?php fill_blog_tabs(); ?>
                                            
                            <div class="widget sidebar-widget widget_categories">
                              <h3 class="widgettitle">Post Categories</h3>
                                <ul>
                                  <li><a href="#"><i class="fa fa-caret-right"></i> Education</a> (3)</li>
                                  <li><a href="#"><i class="fa fa-caret-right"></i> Environment</a> (1)</li>
                                  <li><a href="#"><i class="fa fa-caret-right"></i> Water</a> (4)</li>
                                  <li><a href="#"><i class="fa fa-caret-right"></i> Wild life</a> (2)</li>
                                  <li><a href="#"><i class="fa fa-caret-right"></i> Small business</a> (12)</li>
                                </ul>
                            </div></div></div>              
                            <br><br>
                            <div class="widget sidebar-widget widget_search" id="search_bar">
                              <div class="input-group">
                                  <input type="text" class="form-control" placeholder="Enter your keywords">
                                  <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                                  </span>
                              </div>
                            </div><br><br><br>
                            <div class="widget widget_testimonials">
                              <h3 class="widgettitle">Stories of change</h3>
                                <div class="carousel-wrapper" style="background: none;">
                                    <div class="row">
                                    <?php fill_feedback_comments_carousel() ?>
                                            
                                        <div class="owl-controls clickable"><div class="owl-buttons"><div class="owl-prev"><i class="fa fa-chevron-left"></i></div><div class="owl-next"><i class="fa fa-chevron-right"></i></div></div></div></ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
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