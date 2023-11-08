<?php

    ob_start();
    if(!isset($_SESSION)) { 
        session_start();
    } 

    if ($_SESSION['role'] != 'admin'){
        header('Location:admin_events.php'); 
    }
    include('shared_resources.php'); 
    
    ob_end_flush();

// adding new event  
if (isset($_POST["Event_Date"])) {
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $Title = $_POST['Title'];
    $Description = $_POST['Description'];
    $Video_Link = $_POST['Video_Link'];
    $Event_Date = $_POST['Event_Date'];
    $Created_Time = date('Y-m-d H:i:s');
    $Modified_Time = $Created_Time;

    // SQL query to insert data into the events table
    $sql = "INSERT INTO events (Title, Description, Video_Link, Event_Date, Created_Time, Modified_Time)
        VALUES ('$Title', '$Description', '$Video_Link', '$Event_Date', '$Created_Time', '$Modified_Time')";

    mysqli_query($connection, $sql);

    // Get the ID of the last inserted record
    $Event_ID = mysqli_insert_id($connection);

    if (!is_dir('images/event_pictures')) {
        mkdir('images/event_pictures', 0777);
    }

    // Handle event picture uploads 
    $fileCount = count($_FILES['Location']['name']);
    if ($fileCount > 0) {
        for ($i = 0; $i < $fileCount; $i++) {
            $fileTmpName = $_FILES['Location']['tmp_name'][$i];
            $fileType = $_FILES['Location']['type'][$i];
            $guid = uniqid();
            $extension = pathinfo($_FILES['Location']['name'][$i], PATHINFO_EXTENSION);
            $FileLocation = $guid . '.' . $extension;
            $destination = 'images/event_pictures/' . $FileLocation;

            // SQL query to insert event picture data into the event_pictures table
            $sql = "INSERT INTO event_pictures (Event_Id, Location) VALUES ('$Event_ID', '$destination')";
            mysqli_query($connection, $sql);
            move_uploaded_file($fileTmpName, $destination);
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
                                    <label for="Title">Event Title</label>
                                    <input type="text" class="form-control" name="Title" id="Title">
                                </div>

                                <div class="form-group">
                                    <label for="Description">Event Description</label>
                                    <input type="text" class="form-control" name="Description" id="Description">
                                </div>

                                <div class="form-group">
                                    <label for="Video_Link">Video Link</label>
                                    <input type="text" class="form-control" name="Video_Link" id="Video_Link">
                                </div>

                                <div class="form-group">
                                    <label for="Event_Date">Event Date</label>
                                    <input type="datetime-local" class="form-control" name="Event_Date" id="Event_Date">
                                </div>


                                <div class="form-group">
                                    <label for="Location">Event Files</label>
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