<?php

ob_start();
if (!isset($_SESSION)) {
    session_start();
}

if ($_SESSION['role'] != 'admin') {
    header('Location:admin_events.php');
}
include('shared_resources.php');

ob_end_flush();

// adding new event  
if (isset($_POST["event_date"])) {
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $title = $_POST['title'];
    $description = $_POST['description'];
    $video_Link = $_POST['video_link'];
    $event_date = $_POST['event_date'];
    $created_time = date('Y-m-d H:i:s');
    $modified_time = $created_time;

    // SQL query to insert data into the events table
    $sql = "INSERT INTO events (title, description, video_link, event_date, created_time, modified_time)
        VALUES ('$title', '$description', '$video_link', '$event_date', '$created_time', '$modified_time')";

    mysqli_query($connection, $sql);

    // Get the ID of the last inserted record
    $event_id = mysqli_insert_id($connection);

    if (!is_dir('images/event_pictures')) {
        mkdir('images/event_pictures', 0777);
    }
    $user_id = $_SESSION['id'];
    // Handle event picture uploads 
    $file_count = count($_FILES['location']['name']);
    if ($file_count > 0) {
        for ($i = 0; $i < $file_count; $i++) {
            $file_tmp_name = $_FILES['location']['tmp_name'][$i];
            $file_type = $_FILES['location']['type'][$i];
            $guid = uniqid();
            $extension = pathinfo($_FILES['location']['name'][$i], PATHINFO_EXTENSION);
            $file_location = $guid . '.' . $extension;
            $destination = 'images/event_pictures/' . $file_location;

            // SQL query to insert event picture data into the event_pictures table
            $sql = "INSERT INTO pictures (user_id, event_id, location) VALUES ('$user_id', '$event_id', '$destination')";
            mysqli_query($connection, $sql);
            move_uploaded_file($file_tmp_name, $destination);
        }
    }

    // Close the database connection
    mysqli_close($connection);

    // Redirect to a suitable page after successful insertion
    header("Location: admin_events.php");
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
    <title>Add Event</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <!-- CSS
  ================================================== -->
    <?php css() ?>

    <!-- SCRIPTS
  ================================================== -->
    <?php load_common_page_scripts() ?>

</head>

<body>
    <div class="body">
        <!-- Site Header Wrapper -->
        <?php load_common_page_header(2) ?>

        <!-- Main Content -->
        <div id="main-container">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <a href="admin_events.php" class="btn btn-primary">Go to Events</a>
                    </div>

                    <div class="row">
                        <br><br>
                        <div class="col-md-6 mx-auto">
                            <h1>Add new Event</h1>
                            <form action="?" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="title">Event Title</label>
                                    <input type="text" class="form-control" name="title" id="title">
                                </div>

                                <div class="form-group">
                                    <label for="description">Event Description</label>
                                    <input type="text" class="form-control" name="description" id="description">
                                </div>

                                <div class="form-group">
                                    <label for="video_link">Video Link</label>
                                    <input type="text" class="form-control" name="video_link" id="video_link">
                                </div>

                                <div class="form-group">
                                    <label for="event_date">Event Date</label>
                                    <input type="datetime-local" class="form-control" name="event_date" id="event_date">
                                </div>

                                <div class="form-group"> this will be only for pictures, we'll have to come back to this
                                    <label for="location">Event Files</label>
                                    <input type="file" class="form-control" name="location[]" multiple id="location">
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


        <!-- Site Footer -->
        <?php load_common_page_footer(2) ?>
        <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>
    </div>
    <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a></div>
    <!-- Libraries Loader -->
    <?php lib() ?>
    <!-- Style Switcher Start -->
    <?php style_switcher() ?>


    </script>
</body>

</html>