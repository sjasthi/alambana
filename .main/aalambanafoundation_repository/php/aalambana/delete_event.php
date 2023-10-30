<?php
require 'db_configuration.php';

$status = session_status();
if ($status == PHP_SESSION_NONE) {
    session_start();
}

$eventId = $_GET['event_id']; // Get the Event_Id from the URL parameter

$connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Prepare SQL queries to delete data based on event_id
$deleteEventQuery = "DELETE FROM events WHERE event_id='$eventId'";
$deletePicturesQuery = "DELETE FROM event_pictures WHERE event_id='$eventId'";


// Execute the delete queries
if (mysqli_query($connection, $deleteEventQuery) &&
    mysqli_query($connection, $deletePicturesQuery)) {
    
    echo "Event deleted successfully.";
} else {
    // Error occurred while deleting the event
    echo "Error: " . mysqli_error($connection);
}

mysqli_close($connection);

header('Location: events.php');
?>
