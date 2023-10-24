<?php
require 'db_configuration.php'; // Include your database configuration file
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
?>

