<?php

if (!isset ($_GET['Event_Id']) || !is_numeric($_GET['Event_Id'])) {
    echo "Event not found";
    sleep(3);
    header("Location: admin_events.php");
    exit();
}
//require 'db_configuration.php'; // Include your database configuration file
include 'shared_resources.php';
require_once './header/index.php';

$connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

if ($connection->connect_error) {
    die ("Connection failed: " . $connection->connect_error);
}
// adding new event  
if (isset ($_POST["Event_Date"])) {

    $Event_Id = $_GET['Event_Id'];
    $Title = $_POST['Title'];
    $Description = $_POST['Description'];
    $Video_Link = $_POST['Video_Link'];
    $Event_Date = $_POST['Event_Date'];
    $Modified_Time = date('Y-m-d H:i:s');

    $stmt = $connection->prepare("UPDATE events SET Title=?, Description=?, Video_Link=?, Event_Date=?, Modified_Time=? WHERE Event_Id=?");
    $stmt->bind_param("sssssi", $Title, $Description, $Video_Link, $Event_Date, $Modified_Time, $Event_Id);
    $stmt->execute();
    echo "Event updated successfully!";




    // Handle event picture uploads 
    $fileCount = count($_FILES['Location']['name']);
    if ($fileCount > 0) {

        // lets delete previous uploaded files 
        // you caan comment it out if you dont want 

        $sql = "SELECT * FROM event_pictures WHERE Event_Id = '{$Event_Id}'"; // Modify this query to fetch events data
        $result = $connection->query($sql)->fetch_all(MYSQLI_ASSOC);

        foreach ($result as $key => $value) {
            $file = $value['Location'];
            if (is_file($file)) {
                unlink($file);
            }
        }

        $sql = "DELETE FROM event_pictures WHERE Event_Id = '{$Event_Id}'"; // Modify this query to fetch events data
        $result = $connection->query($sql);

        if (!is_dir('images/event_pictures')) {
            mkdir('images/event_pictures', 0777);
        }

        for ($i = 0; $i < $fileCount; $i++) {
            $fileTmpName = $_FILES['Location']['tmp_name'][$i];
            $fileType = $_FILES['Location']['type'][$i];
            $guid = uniqid();
            $extension = pathinfo($_FILES['Location']['name'][$i], PATHINFO_EXTENSION);
            $FileLocation = $guid . '.' . $extension;
            $destination = 'images/event_pictures/' . $FileLocation;

            // SQL query to insert event picture data into the event_pictures table
            $sql = "INSERT INTO event_pictures (Event_Id, Location) VALUES ('$Event_Id', '$destination')";
            mysqli_query($connection, $sql);
            move_uploaded_file($fileTmpName, $destination);
        }
    }


    // Close the database connection
    mysqli_close($connection);

    // Redirect to a suitable page after successful insertion
    header("Location: admin_events.php");
    exit();
} else {
    $Event_Id = $_GET['Event_Id'];
    $sql = "SELECT * FROM events WHERE Event_Id = '{$Event_Id}'"; // Modify this query to fetch events data
    $result = $connection->query($sql)->fetch_all(MYSQLI_ASSOC);

    if (count($result) == 0) {
        echo "Event not found";
        sleep(3);
        header("Location: admin_events.php");
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
    <title>Born to give - Charity/Crowdfunding HTML5 Template</title>
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
    <script src="js/modernizr.js"></script><!-- Modernizr -->

</head>

<body>
    <!--[if lt IE 7]>
    <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
    <div class="body">
        <!-- Site Header Wrapper -->
        <?php generate_header(); ?>
        <!-- Hero Area -->
        <div class="hero-area">
            <div class="page-banner parallax" style="background-image:url(images/inside9.jpg);">
                <div class="container">
                    <div class="page-banner-text">
                        <h1 class="block-title">Add /Edit event</h1>
                    </div>
                </div>
            </div>
        </div>



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
                            <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post"
                                enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="Title">Event Title</label>
                                    <input value="<?php echo $result[0]['Title']; ?>" type="text" class="form-control"
                                        name="Title" id="Title">
                                </div>

                                <div class="form-group">
                                    <label for="Description">Event Description</label>
                                    <input value="<?php echo $result[0]['Description']; ?>" type="text"
                                        class="form-control" name="Description" id="Description">
                                </div>

                                <div class="form-group">
                                    <label for="Video_Link">Video Link</label>
                                    <input value="<?php echo $result[0]['Video_Link']; ?>" type="text"
                                        class="form-control" name="Video_Link" id="Video_Link">
                                </div>

                                <div class="form-group">
                                    <label for="Event_Date">Event Date</label>
                                    <input value="<?php echo $result[0]['Event_Date']; ?>" type="datetime-local"
                                        class="form-control" name="Event_Date" id="Event_Date">
                                </div>

                                <div class="form-group">
                                    <label for="Location">Event Files (Optinoal-Previous images will be deleted)</label>
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