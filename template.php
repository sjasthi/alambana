<?php
if (!isset($_GET["page"])) {
    header("Location: blogs.php?page=1");
}
if ($_GET["page"] < 1) {
    header("Location: blogs.php?page=1");
}
session_start();
require_once 'header/index.php';
require_once 'shared_resources.php';
include 'blog_controllers/get_blogs.php';
$page_count = ceil(get_blog_count() / 10);
css();
?>

<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html, charset=utf-8">
    <title>Aalambana - Template</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, user-scalable=false;">
    <meta name="format-detection" content="telephone=no">
</head>

<body>
    <!-- Site Header Wrapper -->
    <?php generate_header(); ?>
    <!-- Banner Area -->
    <div class="hero-area">
        <div class="page-banner parallax" id="banner" style="background-image:url(images/inside7.jpg);">
            <div class="container">
                <div class="page-banner-text">
                    <h1 class="block-title">Blogs</h1>
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
    <main>
        <div class="pages-container">
            <?php
            for ($i = 1; $i <= $page_count; $i++) {
                ?>
                <a class="page-number-container-top-<?php echo $i; ?>">
                    <?php
                    if ($i != $_GET["page"]) {
                        echo "<p style='text-decoration: underline; margin: 4px; margin-top: 0;'>";
                    }
                    echo $i;
                    if ($i != $_GET["page"]) {
                        echo "</p>";
                    }
                    ?>
                </a>
                <script>
                    const pageNumber<?php echo $i; ?>TopContainer = document.getElementsByClassName("page-number-container-top-<?php echo $i; ?>")[0];
                        pageNumber<?php echo $i; ?>TopContainer.addEventListener("click", (event) => {
                        window.location.href = 'blogs.php?page=<?php echo $i; ?>';
                    });
                </script>
                <?php
            }
            ?>
        </div>
        <?php get_blogs(($_GET["page"] - 1) * 10, 10); ?>
        <div class="pages-container">
            <?php
            for ($i = 1; $i <= $page_count; $i++) {
                ?>
                <a class="page-number-container-<?php echo $i; ?>">
                    <?php
                    if ($i != $_GET["page"]) {
                        echo "<p style='text-decoration: underline; margin: 4px; margin-top: 0;'>";
                    } else {
                        echo "<p style='margin: 4px; margin-top: 0;'>";
                    }
                    echo $i;
                    echo "</p>";
                    ?>
                </a>
                <script>
                    const pageNumber<?php echo $i; ?>Container = document.getElementsByClassName("page-number-container-<?php echo $i; ?>")[0];
                        pageNumber<?php echo $i; ?>Container.addEventListener("click", (event) => {
                        window.location.href = 'blogs.php?page=<?php echo $i; ?>';
                    });
                </script>
                <?php
            }
            ?>
        </div>
    </main>
</body>

</html>