<?php

  if(!isset($_SESSION)) { 
      session_start();
  } 

  include 'shared_resources.php';
  include 'blog_fill.php';
  include 'create_post_story.php';
  include 'edit_post_story.php';
  $blogId = $_GET['blog_id']; // Get the Blog_Id from the URL parameter
?>

<!DOCTYPE HTML>
<html class="no-js">
<head>
<!-- Basic Page Needs
  ================================================== -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Change This Title With BLOG TItle!!!</title>
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
  <!-- MODIFY POST-->
    <script>
        let show_edit_form = () => {
            let form = document.getElementById("blog_modifiy_form");
            let show_button = document.getElementById("form_show_button");
            form.removeAttribute("hidden");
            show_button.setAttribute("hidden", "hidden");
        }
        function delete_blog_post() {
        var confirmation = confirm("Are you sure you want to delete this post?");
        if (confirmation) {

            // Redirect to the PHP script that handles post deletion
            window.location.href = "delete_post.php?blog_id=<?php echo $blogId; ?>";
        }
    }
    </script>
</head>
<body class="single-post">
<!--[if lt IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
<div class="body">
	<!-- Site Header Wrapper -->
    <?php load_common_page_header() ?>

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
        	<div class="container">
                <!-- USER PRIVILEGES ROLE (User/Admin from 'users' Table) -->
                <!--?php
                            if (isset($_SESSION['role'])) {
                            if ($_SESSION['role'] == 'admin') {
                                echo '<button id="form_show_button" onclick="show_new_post_form();">Create Post</button>';
                            }
                            }
                        ?-->
                <!-- Blog Create Post Button -->
                <?php
                // Check if the blog_id exists
                $isBlogExists = checkIfBlogPostExists($blogId);

                if ($isBlogExists) {
                    $aboutAuthor = getAboutFromDatabase($blogId);
                    $storyDescription = getParagraphFromDatabase($blogId);
                    // Blog exists, modify button name and function
                    echo '<button id="form_show_button" onclick="show_edit_form();">Edit Post Story</button>';
                    
                    $formAction = edit_post_story($blogId); // Set the form action for editing
                    $submitAction = "update_post_story";

                } else {
                    $aboutAuthor =  '';
                    $storyDescription = '';
                    // Blog doesn't exist, default button name and function
                    echo '<button id="form_show_button" onclick="show_edit_form();">Create Post Story</button>';
                    $formAction = create_post_story($blogId); // Set the form action for creating
                    $submitAction = "create_post_story";

                }echo '<button id="delete_post_button" onclick="delete_blog_post();">Delete Post</button>'; // Add the Delete Post button
                ?>
                <br><br>
                <!-- Blog Form (Initially hidden) [Activates on button click] -->
                <form id="blog_modifiy_form" action="<?php echo $formAction; ?>" method="POST" enctype="multipart/form-data" hidden="hidden">
                    <div id="blog_creation_left">
                        <label>Blog</label>
                        <label for="paragraph">Paragraph</label>
                        <br>
                        <textarea name="paragraph" rows="9" cols="50" required><?php echo htmlspecialchars($storyDescription); ?></textarea>
                    </div>
                    <div id="blog_creation_right">
                        <label>Author Description</label>
                        <br>
                        <textarea type="text" name="about_author" maxlength="128" required rows="3" cols="50"><?php echo htmlspecialchars($aboutAuthor); ?></textarea><br><br>
                    </div>
                    <input type="submit" name="<?php echo $submitAction; ?>" value="Publish">
                </form>

                
            	<div class="row">
                	<div class="col-md-8 content-block">
                    	<!-- Blog Page Fill --> <?php fill_blog_story($blogId); ?>
                        <!-- Pagination -->
                        <ul class="pager">
                            <li class="pull-left"><a href="#">&larr; Prev Post</a></li>
                            <li class="pull-right"><a href="#">Next Post &rarr;</a></li>
                        </ul>
            			<section class="post-comments" id="comments">
              				<h3><i class="fa fa-comment"></i> Comments (4)</h3>
              				<ol class="comments">
                				<li>
                  					<div class="post-comment-block">
                    					<img src="images/user2.jpg" alt="avatar" class="img-thumbnail">
                                        <div class="post-comment-content">
                                            <a href="#" class="btn btn-default btn-xs pull-right">Reply</a>
                                            <h5>Robin Schmidt <span>says</span></h5>
                                            <span class="meta-data">Nov 23, 2013 at 7:58 pm</span>
                                            <p>There have been human health concerns associated with the consumption of dolphin meat in Japan after tests showed that dolphin meat contained high levels of mercury.</p>
                                      	</div>
                  					</div>
                				</li>
                				<li>
                                    <div class="post-comment-block">
                    					<img src="images/user1.jpg" alt="avatar" class="img-thumbnail">
                                        <div class="post-comment-content">
                                            <a href="#" class="btn btn-default btn-xs pull-right">Reply</a>
                                            <h5>Emma Paquette <span>says</span></h5>
                                            <span class="meta-data">Nov 23, 2013 at 7:58 pm</span>
                                            <p>Nicely said :)</p>
                                      	</div>
                                    </div>
                                    <ul>
                                        <li>
                                            <div class="post-comment-block">
                    							<img src="images/user2.jpg" alt="avatar" class="img-thumbnail">
                                                <div class="post-comment-content">
                                                    <a href="#" class="btn btn-default btn-xs pull-right">Reply</a>
                                                    <h5>Robin Schmidt <span>says</span></h5>
                                                    <span class="meta-data">Nov 23, 2013 at 7:58 pm</span>
                                                    <p>Étienne de Flacourt (1607-60), French governor of Madagascar, described eating unborn dolphin calves cut out of the womb of a caught dolphin cow in Histoire de la grande isle Madagascar (1661). He considered the meat more tender and delicate than veal and believed it to be among the best meats he had eaten.</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="post-comment-block">
                    							<img src="images/user2.jpg" alt="avatar" class="img-thumbnail">
                                                <div class="post-comment-content">
                                                    <a href="#" class="btn btn-default btn-xs pull-right">Reply</a>
                                                    <h5>Robin Schmidt <span>says</span></h5>
                                                    <span class="meta-data">Nov 23, 2013 at 7:58 pm</span>
                                                    <p>Real post, i love reading it all through</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="post-comment-block">
                    					<img src="images/user1.jpg" alt="avatar" class="img-thumbnail">
                                        <div class="post-comment-content">
                                            <a href="#" class="btn btn-default btn-xs pull-right">Reply</a>
                                            <h5>Emma Paquette <span>says</span></h5>
                                            <span class="meta-data">Nov 23, 2013 at 7:58 pm</span>
                                            <p>Dolphin meat is consumed in a small number of countries world-wide, which include Japan[125] and Peru (where it is referred to as chancho marino, or "sea pork").[126] While Japan may be the best-known and most controversial example, only a very small minority of the population has ever sampled it.</p>
                                      	</div>
                                    </div>
                                </li>
                            </ol>
                        </section>
                        <section class="post-comment-form">
                            <h3><i class="fa fa-share"></i> Post a comment</h3>
                            <form>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-4 col-sm-4">
                                            <input type="text" class="form-control input-lg" placeholder="Your name">
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <input type="email" class="form-control input-lg" placeholder="Your email">
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <input type="url" class="form-control input-lg" placeholder="Website (optional)">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                        	<textarea cols="8" rows="4" class="form-control input-lg" placeholder="Your comment"></textarea>
                                    	</div>
                                	</div>
                            	</div>
                            	<div class="row">
                                	<div class="form-group">
                                    	<div class="col-md-12">
                                        	<button type="submit" class="btn btn-primary btn-lg">Submit your comment</button>
                                    	</div>
                                	</div>
                            	</div>
                        	</form>
                    	</section>
                    </div>
                    
                    <!-- Sidebar -->
                    <div class="col-md-4 sidebar-block">
                        <div class="widget tabbed_content tabs">
                            <ul class="nav nav-tabs">
                                <li class="active"> <a data-toggle="tab" href="#Trecent">Recent</a> </li>
                                <li> <a data-toggle="tab" href="#Tpopular">Popular</a> </li>
                                <li> <a data-toggle="tab" href="#Tcomments">Tags</a> </li>
                            </ul>
                            <div class="tab-content">
                                <div id="Trecent" class="tab-pane active">
                                    <div class="widget recent_posts">
                                        <ul>
                                            <li>
                                                <a href="single-post.php" class="media-box">
                                                    <img src="images/post1.jpg" alt="">
                                                </a>
                                                <h5><a href="single-post.php">A single person can change million lives</a></h5>
                                                <span class="meta-data grid-item-meta">Posted on 11th Dec, 2015</span>
                                            </li>
                                            <li>
                                                <a href="single-post.php" class="media-box">
                                                    <img src="images/post3.jpg" alt="">
                                                </a>
                                                <h5><a href="single-post.php">Donate your woolens this winter</a></h5>
                                                <span class="meta-data grid-item-meta">Posted on 11th Dec, 2015</span>
                                            </li>
                                            <li>
                                                <a href="single-post.php" class="media-box">
                                                    <img src="images/post2.jpg" alt="">
                                                </a>
                                                <h5><a href="single-post.php">How to survive the tough path of life</a></h5>
                                                <span class="meta-data grid-item-meta">Posted on 06th Dec, 2015</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="Tpopular" class="tab-pane">
                                    <div class="widget recent_posts">
                                        <ul>
                                            <li>
                                                <a href="single-post.php" class="media-box">
                                                    <img src="images/post2.jpg" alt="">
                                                </a>
                                                <h5><a href="single-post.php">How to survive the tough path of life</a></h5>
                                                <span class="meta-data grid-item-meta">Posted on 06th Dec, 2015</span>
                                            </li>
                                            <li>
                                                <a href="single-post.php" class="media-box">
                                                    <img src="images/post1.jpg" alt="">
                                                </a>
                                                <h5><a href="single-post.php">A single person can change million lives</a></h5>
                                                <span class="meta-data grid-item-meta">Posted on 11th Dec, 2015</span>
                                            </li>
                                            <li>
                                                <a href="single-post.php" class="media-box">
                                                    <img src="images/post3.jpg" alt="">
                                                </a>
                                                <h5><a href="single-post.php">Donate your woolens this winter</a></h5>
                                                <span class="meta-data grid-item-meta">Posted on 11th Dec, 2015</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="Tcomments" class="tab-pane">
                                    <div class="tag-cloud">
                                        <a href="#">Water</a>
                                        <a href="#">Students</a>
                                        <a href="#">NYC</a>
                                        <a href="#">Education</a>
                                        <a href="#">Poverty</a>
                                        <a href="#">Food</a>
                                        <a href="#">Poor</a>
                                        <a href="#">Business</a>
                                        <a href="#">Love</a>
                                        <a href="#">Help</a>
                                        <a href="#">Savings</a>
                                        <a href="#">Winter</a>
                                        <a href="#">Soul</a>
                                        <a href="#">Power</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget sidebar-widget widget_categories">
                        	<h3 class="widgettitle">Post Categories</h3>
                            <ul>
                            	<li><a href="#">Education</a> (3)</li>
                            	<li><a href="#">Environment</a> (1)</li>
                            	<li><a href="#">Water</a> (4)</li>
                            	<li><a href="#">Wild life</a> (2)</li>
                            	<li><a href="#">Small business</a> (12)</li>
                            </ul>
                        </div>
                        <div class="widget sidebar-widget widget_search">
                        	<div class="input-group">
                          		<input type="text" class="form-control" placeholder="Enter your keywords">
                          		<span class="input-group-btn">
                            		<button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                          		</span>
                      		</div>
                        </div>
                        <div class="widget widget_testimonials">
                        	<h3 class="widgettitle">Stories of change</h3>
                            <div class="carousel-wrapper">
                                <div class="row">
                                    <ul class="owl-carousel carousel-fw" id="testimonials-slider" data-columns="1" data-autoplay="5000" data-pagination="no" data-arrows="yes" data-single-item="no" data-items-desktop="1" data-items-desktop-small="1" data-items-tablet="1" data-items-mobile="1">
                                        <li class="item">
                                            <div class="testimonial-block">
                                                <blockquote>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                                                </blockquote>
                                                <div class="testimonial-avatar"><img src="images/story1.jpg" alt="" width="70" height="70"></div>
                                                <div class="testimonial-info">
                                                    <div class="testimonial-info-in">
                                                        <strong>Ada Ajimobi</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="item">
                                            <div class="testimonial-block">
                                                <blockquote>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                                                </blockquote>
                                                <div class="testimonial-avatar"><img src="images/story2.jpg" alt="" width="70" height="70"></div>
                                                <div class="testimonial-info">
                                                    <div class="testimonial-info-in">
                                                        <strong>Chloe Lévesque</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
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
  	<a id="back-to-top"><i class="fa fa-angle-double-up"></i></a></div>

<!-- Donate Form Modal -->
<?php donate_dialog() ?>
<!-- Libraries Loader -->
<?php lib() ?>
<!-- Style Switcher Start -->
<?php style_switcher() ?>

</body>
</html>