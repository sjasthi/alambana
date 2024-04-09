<?php
// adding new event  
if (isset($_POST["Event_Id"])) {

    require 'db_configuration.php'; // Include your database configuration file
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $Event_Id = $_POST['Event_Id'];

    // lets delete previous uploaded files 

    $sql = "SELECT * FROM event_pictures WHERE Event_Id = '{$Event_Id}'"; // Modify this query to fetch events data
    $result = $connection->query($sql)->fetch_all(MYSQLI_ASSOC);

    foreach ($result as $key => $value) {
        $file = $value['Location'];
        if (is_file($file)) {
            unlink($file);
        }
    }

    $sql = "DELETE FROM events WHERE Event_Id = '{$Event_Id}'"; // Modify this query to fetch events data
    $result = $connection->query($sql);



    // Close the database connection
    mysqli_close($connection);

    // Redirect to a suitable page after successful insertion
    header("Location: admin_events.php");
    exit();
} else {
    header("Location: admin_events.php");
    exit();
}
?>