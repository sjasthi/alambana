<?php
require 'db_configuration.php';

$status = session_status();
if ($status == PHP_SESSION_NONE) {
    session_start();
}

$connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

# Field Entries
if (isset($_POST['create_event'])) {
    $title = addslashes($_POST['title']);
    $description = addslashes($_POST['description']);
    $video_link = $_POST['video_link'];
    $event_date = $_POST['event_date'];
    $timestamp = date("Y-m-d H:i:s");
    
    $fileNameArray = [];
    for($i = 0; $i < count($_FILES['file']['name']); $i++) {
        $fileName = $_FILES['file']['name'][$i];
        $fileTMP = $_FILES['file']['tmp_name'][$i];
        $fileError = $_FILES['file']['error'][$i];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        if ($fileError === 0) {
            $fileNewName = uniqid('', true).".".$fileActualExt;
            $fileDestination = 'images/event_pictures/'.$fileNewName;
            move_uploaded_file($fileTMP, $fileDestination);
            array_push($fileNameArray, $fileDestination);
        } else {
            echo "There was an error uploading your file.";
        }
    }

    // Modification to MySQL Database
    $sql = "INSERT INTO events (Title, Description, Video_Link, Event_Date, Created_Time, Modified_Time) 
            VALUES ('$title', '$description', '$video_link', '$event_date', '$timestamp', '$timestamp');";

    if (!mysqli_query($connection, $sql)) {
        echo("Error description: " . mysqli_error($connection));
    } else {
        $last_id = mysqli_insert_id($connection);
        foreach($fileNameArray as $location){
            $sql = "INSERT INTO event_pictures VALUES (
                NULL,
                '$last_id',
                '$location');";

            if (!mysqli_query($connection, $sql)) {
                echo("Error description: " . mysqli_error($connection));
            }
        }
    }
}

mysqli_close($connection);

header('Location: events.php');
?>
