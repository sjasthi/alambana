<?php
if (!isset ($_SESSION)) {
    session_start();
}

include 'shared_resources.php';
include 'blog_controllers/get_blogs.php';
include 'feedback_fill.php';
include 'create_comment_post.php';
require_once './header/index.php';
require_once './bootstrap.php';
set_up_bootstrap();
if (isset ($_SESSION['role'])) {
    $userRole = $_SESSION['role'];
}

// Define the number of blogs per page (default to 3)
$blogsPerPage = isset ($_GET['update_server_page_list_number']) ? intval($_GET['update_server_page_list_number']) : 3;

// Get the current page number from the URL parameters, default to 1 if not set
$current_page = isset ($_GET['current_page']) ? intval($_GET['current_page']) : 1; // intval ensures the variable is an integer for security


// Check if the current page is blogs.php and current_page parameter is not set
if (basename($_SERVER['PHP_SELF']) == 'blogs.php' && !isset ($_GET['current_page'])) {
    // Redirect to the same page with the current_page parameter
    header('Location: blogs.php?current_page#1');//. $current_page);
    exit(); // Ensure script stops execution after redirection
}
?>

<!DOCTYPE HTML>
<html>

<style>
    .blog-container {
        margin: 16px auto 16px auto;
        max-width: 800px;
        text-align: center;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        border: 3px solid lightblue;
        border-radius: 16px;
    }

    .blog-container .info-container {
        display: flex;
        flex-direction: column;
    }

    .blog-container .info-container .author-container img {
        width: 36px;
        height: 36px;
        padding: 4px;
        background-color: lightblue;
        border-radius: 18px;
    }

    .blog-container .text-container {
        width: 100%;
    }
</style>

<head>
    <!-- Basic Page Needs
  ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Include the favicon.ico file -->
    <?php generateFaviconLink(); ?>
    <title>Aalambana - Blogs</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <!-- css
  ================================================== -->
    <?php css(); ?>
    <!-- SCRIPTS
  ================================================== -->
    <?php load_common_page_scripts(); ?>
</head>

<body>

    <div class="body">

        <!-- Site Header Wrapper -->
        <?php generate_header(); ?>
        <!-- Banner Area -->
        <div class="hero-area">
            <div class="page-banner parallax" id="banner" style="background-image:url(images/inside7.jpg);">
                <div class="container">
                    <div class="page-banner-text">
                        <h1 class="block-title">Blog</h1>
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
        <main>
            <?php get_blog($_GET["id"], false); ?>
        </main>
        <!-- Site Footer -->
        <?php load_common_page_footer(); ?>
        <!-- Libraries Loader -->
        <?php lib(); ?>
        <!-- Style Switcher Start -->
        <?php style_switcher(); ?>

</body>

</html>