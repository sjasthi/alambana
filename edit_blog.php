<?php

if (!isset($_GET['Blog_Id']) || !is_numeric($_GET['Blog_Id'])) {
    echo "Blog not found";
    sleep(3);
    header("Location: admin_blogs.php");
    exit();
}
//require 'db_configuration.php'; // Include your database configuration file
include 'shared_resources.php';
$connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
// adding new Blog  
if (isset($_POST["Created_Time"])) {

    $Blog_Id = $_GET['Blog_Id'];
    $Title = $_POST['Title'];
    $Description = $_POST['Description'];
    $Video_Link = $_POST['Video_Link'];
    $Modified_Time = date('Y-m-d H:i:s');

    $stmt = $connection->prepare("UPDATE blogs SET Title=?, Description=?, Video_Link=?, Modified_Time=? WHERE Blog_Id=?");
    $stmt->bind_param("ssssi", $Title, $Description, $Video_Link, $Modified_Time, $Blog_Id);
    $stmt->execute();
    echo "Blog updated successfully!";
    
    // Handle Blog picture uploads 
    $fileCount = count($_FILES['Location']['name']);
    if ($fileCount > 0) {

        // lets delete previous uploaded files 
        // you caan comment it out if you dont want 

        $sql = "SELECT * FROM blog_pictures WHERE Blog_Id = '{$Blog_Id}'"; // Modify this query to fetch Blogs data
        $result = $connection->query($sql)->fetch_all(MYSQLI_ASSOC);

        foreach ($result as $key => $value) {
            $file = $value['Location'];
            if (is_file($file)) {
                unlink($file);
            }
        }

        $sql = "DELETE FROM blog_pictures WHERE Blog_Id = '{$Blog_Id}'"; // Modify this query to fetch Blogs data
        $result = $connection->query($sql);

        if (!is_dir('images/blog_pictures')) {
            mkdir('images/blog_pictures', 0777);
        }

        for ($i = 0; $i < $fileCount; $i++) {
            $fileTmpName = $_FILES['Location']['tmp_name'][$i];
            $fileType = $_FILES['Location']['type'][$i];
            $guid = uniqid();
            $extension = pathinfo($_FILES['Location']['name'][$i], PATHINFO_EXTENSION);
            $FileLocation = $guid . '.' . $extension;
            $destination = 'images/blog_pictures/' . $FileLocation;

            // SQL query to insert Blog picture data into the Blog_pictures table
            $sql = "INSERT INTO blog_pictures (Blog_Id, Location) VALUES ('$Blog_Id', '$destination')";
            mysqli_query($connection, $sql);
            move_uploaded_file($fileTmpName, $destination);
        }
    }


    // Close the database connection
    mysqli_close($connection);

    // Redirect to a suitable page after successful insertion
    header("Location: admin_blogs.php");
    exit();
} else {
    $Blog_Id = $_GET['Blog_Id'];
    $sql = "SELECT * FROM blogs WHERE Blog_Id = '{$Blog_Id}'"; // Modify this query to fetch Blogs data
    $result = $connection->query($sql)->fetch_all(MYSQLI_ASSOC);

    if (count($result) == 0) {
        echo "Blog not found";
        sleep(3);
        header("Location: admin_blogs.php");
        exit();
    }
}
?>

<!DOCTYPE HTML>
<html class="no-js">

<head>
    <!-- Basic Page Needs
  ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Edit Blog/title>
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
    <?php css() ?>

    <!-- scripts
  ================================================== -->
    <?php load_common_page_scripts() ?>

</head>

<body>
    <div class="body">
        <!-- Site Header Wrapper -->
        <?php load_common_page_header(2) ?>
        <!-- Hero Area -->
        <div class="hero-area">
            <div class="page-banner parallax" style="background-image:url(images/inside9.jpg);">
                <div class="container">
                    <div class="page-banner-text">
                        <h1 class="block-title">Edit Blog</h1>
                    </div>
                </div>
            </div>
        </div>



        <!-- Main Content -->
        <div id="main-container">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <a href="admin_blogs.php" class="btn btn-primary">Go to Blogs</a>
                    </div>

                    <div class="row">
                        <br><br>
                        <div class="col-md-6 mx-auto">
                            <h1>Add new Blog</h1>
                            <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post"
                                enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="Title">Blog Title</label>
                                    <input value="<?php echo $result[0]['Title']; ?>" type="text" class="form-control"
                                        name="Title" id="Title">
                                </div>

                                <div class="form-group">
                                    <label for="Description">Blog Description</label>
                                    <input value="<?php echo $result[0]['Description']; ?>" type="text"
                                        class="form-control" name="Description" id="Description">
                                </div>

                                <div class="form-group">
                                    <label for="Video_Link">Video Link</label>
                                    <input value="<?php echo $result[0]['Video_Link']; ?>" type="text"
                                        class="form-control" name="Video_Link" id="Video_Link">
                                </div>

                                <div class="form-group">
                                    <label for="Location">Blog Files (Optinoal-Previous images will be deleted)</label>
                                    <input type="file" class="form-control" name="Location[]" multiple id="Location">
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>





     <!-- site footer -->
    <?php load_common_page_footer() ?>
    <!-- libraries loader -->
    <?php lib() ?>
    <!-- style switcher start -->
    <?php style_switcher() ?>


</body>

</html>