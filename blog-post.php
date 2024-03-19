<?php

  if(!isset($_SESSION)) { 
      session_start();
  } 

  include 'shared_resources.php';
  include 'blog_fill.php';
  include 'create_post_story.php';
  include 'edit_post_story.php';
  include 'create_comment_post.php';

  $blogId = $_GET['blog_id']; // Get the Blog_Id from the URL parameter
  // DO NOT ALLOW ACCESS TO HIDDEN BLOG PAGES
  if (getBlogVisibilityStateFromDatabase($blogId)) header('Location:blogs.php'); 

  // Track page visitors
  increment_blog_page_visitor_count($blogId);

?>

<!DOCTYPE HTML>
<html class="no-js">
<head>
<!-- Basic Page Needs
  ================================================== -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- Include the favicon.ico file -->
<?php generateFaviconLink() ?>
<title><?php echo getTitleFromDatabase($blogId); ?></title>
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
        // Create / Edit blog form
        let show_edit_form = () => {
            let form = document.getElementById("blog_modifiy_form");
            let show_button = document.getElementById("form_show_button");
            form.removeAttribute("hidden");
            show_button.setAttribute("hidden", "hidden");
        }
        // DELETE BLOG PAGE SESSION BY USER
        function delete_blog_post(blog_id) {
            var confirmation = confirm("Are you sure you want to delete this post?");
            if (confirmation) {
                let blogID = blog_id;  // Replace with the value you want to save
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "delete_post.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                // Define the callback function to handle the response
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Output the server response to the console
                        console.log(xhr.responseText);
                        //location.reload();
                    }
                };
                // Send the request with the blogId as a parameter
                xhr.send("blog_id=" + blogID);

                // Redirect to blogs.php and Refresh page
                window.location.href = "blogs.php?";
             
                //window.location.href = window.location.href;
                //window.location.href = "delete_post.php?blog_id=" + blog_id; # Subjected to SQL Injection Issue (Security Issue)
                

            }
        }
        // HIDE BLOG PAGE SESSION BY USER
        function set_blog_post_visibility(blog_id) {
            var confirmation = confirm("Are you sure you want to delete this post?");
            if (confirmation) {
                let blogID = blog_id;  // Replace with the value you want to save
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "post_visibility.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                // Define the callback function to handle the response
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Output the server response to the console
                        console.log(xhr.responseText);
                        //location.reload();
                    }
                };
                // Send the request with the blogId as a parameter
                xhr.send("blog_id=" + blogID);

                setTimeout(function () {
                    // Redirect to blogs.php and Refresh page
                    window.location.href = "blogs.php?";
                }, 100);// Introduce a delay (milliseconds)

                //window.location.href = window.location.href;
                //window.location.href = "delete_post.php?blog_id=" + blog_id; # Subjected to SQL Injection Issue (Security Issue)
                

            }
        }
        function refresh_blog_post() {
            // Redirect to the PHP script that handles post deletion
            window.location.href = "blog-post.php?blog_id=<?php echo $blogId; ?>";
            
        }

        // GET SESSION ID OF BUTTON SUBMIT TO BLOG COMMENT
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
        let reply_blog_comment = (button_id) => {
            let form = document.getElementById("blog_reply_form" + button_id);
            let show_button = document.getElementById("form_show_reply_submit_button" + button_id);
            form.removeAttribute("hidden");
            show_button.setAttribute("hidden", "hidden");
            let set_value = button_id;
            save_button_id(button_id);
            get_number_of_elements("post-comment-parent-block");
        }

    
        // UPDATE SERVER COMMENT COUNT FOR PARENT (Set New Blog Entry Level)
        document.addEventListener("DOMContentLoaded", function () {
            let className = "post-comment-parent-block";

            // Count the number of elements with the specified class
            let elementCount = document.getElementsByClassName(className).length;

            // Make an AJAX request to update the server with the count
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "update_server_page_comment_count.php", true);
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
<body class="single-post">

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
        			<h1 class="block-title">Title - <?php echo getTitleFromDatabase($blogId);?></h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content -->
    <div id="main-container">
    	<div class="content">
            <a href="blogs.php" class="btn btn-primary" style="margin-left: 100px;">< Go to Blogs</a>
        	<div class="container">
                <!-- USER PRIVILEGES ROLE (User/Admin from 'users' Table) -->
                
                <?php
                $isRole = '';
                if (isset($_SESSION['role'])) {
                    $isRole = $_SESSION['role'];
                }
                if ((getUserHashFromDatabase($blogId)) || ($isRole == 'admin') ){ // Verify SESSION with Hash Code or is 'admin'
                    
                
                    // Check if the blog_id exists
                    $isBlogExists = checkIfBlogPostExists($blogId);

                    if ($isBlogExists) {
                        $aboutAuthor = getAboutFromDatabase($blogId);
                        // Blog exists, modify button name and function
                        echo '<button type="submit" class="btn btn-primary btn-lg" id="form_show_button"; onclick="show_edit_form();">Edit Post Story</button>';
                        
                        $formAction = edit_post_story($blogId); // Set the form action for editing
                        $postAction = "update_post_story";

                    } else {
                        $aboutAuthor =  '';
                        // Blog doesn't exist, default button name and function
                        echo '<button type="submit" class="btn btn-primary btn-lg" id="form_show_button"; onclick="show_edit_form();">Create Post Story</button>';
                        $formAction = create_post_story($blogId); // Set the form action for creating
                        $postAction = "create_post_story";

                    }echo '<button type="submit" class="btn btn-primary btn-lg" name="delete_post_button" style="margin-left: 10px;" onclick="set_blog_post_visibility(' . $blogId . ');">Delete Post</button>';
                    
                }
                
                ?>
                <br><br>
                <!-- Blog Form (Initially hidden) [Activates on button click] -->
                <form id="blog_modifiy_form" action="<?php echo $formAction; ?>" method="POST" enctype="multipart/form-data" hidden="hidden">
                    <div id="blog_creation_left">
                        <label>Blog</label>
                        <label for="paragraph">Paragraph</label>
                        <br>
                        <textarea name="paragraph" rows="9" cols="50" required><?php echo "Content of blog should be here"; ?></textarea>
                    </div>
                    <div id="blog_creation_right">
                        <label>Author Description</label>
                        <br>
                        <textarea type="text" name="about_author" maxlength="128" required rows="3" cols="50"><?php echo htmlspecialchars($aboutAuthor); ?></textarea><br><br>
                    </div>
                    <input type="submit" class="btn btn-primary btn-lg" name="<?php echo $postAction; ?>" value="Publish">
                </form>

                
            	<div class="row">
                	<div class="col-md-8 content-block">
                        <!-- Edit Post Blog Page --> 
                        <?php
                            $isRole = '';
                            if (isset($_SESSION['role'])) {
                                $isRole = $_SESSION['role'];
                            }
                            if ((getUserHashFromDatabase($blogId)) || ($isRole == 'admin') ){ // Verify SESSION with Hash Code or is 'admin'
                                echo '<li class="pull-left"><a href="edit_post.php?blog_id='. $blogId . '">&larr; Edit Post header</a></li><br><br>';
                            
                            }
                        
                        ?>
                        <!-- Pagination -->
                        <ul class="pager">
                            <li class="pull-left"><a href="blog-post.php?blog_id=<?php echo ($blogId-1); ?>">&larr; Prev Post</a></li>
                            <li class="pull-center"><a href="blog-post.php?blog_id=<?php echo ($blogId+1); ?>">Next Post &rarr;</a></li>
                        </ul>
                    	<!-- Fill Blog Page --> 
                        <?php fill_blog_story($blogId); ?>
                        </div>
            			<section class="post-comments" id="comments">
                             <!-- Get Count of Blog Comments for Page -->
                            <?php $comments_counter = get_blog_page_comment_count($blogId); ?>
              				<h3><i class="fa fa-comment"></i> Comments ( <?php echo $comments_counter ?> )</h3>
              				<ol class="comments">
                                <!-- Fill Blog Comments -->
                                <?php fill_blog_comments($blogId) ?>
                				
                            </ol>
                        </section> 
                        <section class="post-comment-form">
                            <h3><i class="fa fa-share"></i> Post a comment</h3>
                            <?php 
                                $formAction = create_comment_post($blogId); // Set the form action for creating new comment section
                                $submitAction = "create_comment_post";
                            ?>
                            <form id="blog_create_comment_form" action="<?php echo $formAction; ?>" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group">
                                    <?php if (!isset($_SESSION['role'])) { echo '
                                        <div class="col-md-4 col-sm-4">
                                            <input type="text" name="comment_name" maxlength="128" class="form-control input-lg" placeholder="Your name">
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <input type="email" name="comment_email" maxlength="128" class="form-control input-lg" placeholder="Your email">
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <input type="url" name="comment_url" maxlength="255" class="form-control input-lg" placeholder="Website (optional)">
                                        </div>';
                                    } ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                        	<textarea name="comment_paragraph" cols="50" rows="4" class="form-control input-lg" placeholder="Your comment"></textarea>
                                    	</div>
                                	</div>
                            	</div>
                            	<div class="row">
                                	<div class="form-group">
                                    	<div class="col-md-12">
                                        	<button type="submit" class="btn btn-primary btn-lg"; name="<?php echo $submitAction; ?>">Submit your comment</button>
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